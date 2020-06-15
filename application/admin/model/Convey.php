<?php

namespace app\admin\model;

use think\Model;
use think\Db;

class Convey extends Model
{

    protected $table = 'xy_convey';

    /**
     * 创建订单
     *
     * @param int $uid
     * @return array
     */
    public function create_order($uid,$cid=1,$is_credit=0)
    {
        $add_id = Db::name('xy_member_address')->where('uid',$uid)->where('is_default',1)->value('id');//获取收款地址信息s
        if(!$add_id) return ['code'=>1,'info'=>'还没有设置收货地址'];
        $uinfo = Db::name('xy_users')->field('deal_status,balance,level')->find($uid);
        if($uinfo['deal_status']!=2) return ['code'=>1,'info'=>'抢单已终止'];
        if($is_credit){
            $min = $uinfo['balance']*config('app.deal_fudan_min_num');
            $max = $uinfo['balance']*config('app.deal_fudan_max_num');
        }else{
            $min = $uinfo['balance']*config('deal_min_num')/100;
            $max = $uinfo['balance']*config('deal_max_num')/100;
        }

        $goods = $this->rand_order($min,$max,$cid);


        $level = $uinfo['level'];
        if($is_credit&&!$level){
            return json(['code'=>1,'info'=>'请开通会员后重试']);
        }else{
            !$uinfo['level'] ? $level = 0 : '';
        }
        //TODO::
        $ulevel = Db::name('xy_level')->where('level',$level)->find();
        if ($uinfo['balance'] < $ulevel['num_min']) {
            return ['code'=>1,'info'=>'会员等级余额不足!'];
        }

        $id = getSn('UB');
        Db::startTrans();
        $res = Db::name('xy_users')->where('id',$uid)
            ->update(['deal_status'=>3,'deal_time'=>strtotime(date('Y-m-d')),'deal_count'=>$is_credit==1?Db::raw('fudan_deal_count+1'):Db::raw('deal_count+1')]);//将账户状态改为交易中
        //通过商品id查找 佣金比例
        $cate = Db::name('xy_goods_cate')->find($goods['cid']);;

        if($is_credit==0){
            if($goods['num'] > $uinfo['balance']) return ['code'=>1,'info'=>'可用余额不足!'];
        }


        //var_dump($cate,123,$goods);die;

        $res1 = Db::name($this->table)
                ->insert([
                    'id'            => $id,
                    'uid'           => $uid,
                    'num'           => $goods['num'],
                    'addtime'       => time(),
                    'endtime'       => time()+config('deal_timeout'),
                    'add_id'        => $add_id,
                    'goods_id'      => $goods['id'],
                    'goods_count'   => $goods['count'],
                    'is_fudan'=>$is_credit?1:0,
                    //'commission'    => $goods['num']*config('vip_1_commission'),
                    //'commission'    => $goods['num']*$cate['bili'],  //交易佣金按照分类
                    'commission'    => $is_credit?$goods['num']*$ulevel['fudan_bili']:$goods['num']*$ulevel['bili'],  //交易佣金按照会员等级
                ]);
        if($res && $res1){
            Db::commit();
            return ['code'=>0,'info'=>'抢单成功!','oid'=>$id];
        }else{
            Db::rollback();
            return ['code'=>1,'info'=>'抢单失败!请稍后再试'];
        }
    }

    /**
     * 随机生成订单
     */
    private function rand_order($min,$max,$cid)
    {
        $num = mt_rand($min,$max);//随机交易额
        $goods = Db::name('xy_goods_list')
                ->orderRaw('rand()')
                ->where('goods_price','between',[$num/10,$num])
                ->where('cid','=',$cid)
                ->find();

        if (!$goods) {
            echo json_encode(['code'=>1,'info'=>'抢单失败, 该分类库存不足!']);die;
        }

        $count = round($num/$goods['goods_price']);//
        if($count*$goods['goods_price']<$min||$count*$goods['goods_price']>$max){
            self::rand_order($min,$max,$cid);
        }
        return ['count'=>$count,'id'=>$goods['id'],'num'=>$count*$goods['goods_price'],'cid'=>$goods['cid']];
    }

    /**
     * 处理订单
     *
     * @param string $oid      订单号
     * @param int    $status   操作      1会员确认付款 2会员取消订单 3后台强制付款 4后台强制取消
     * @param int    $uid      用户ID    传参则进行用户判断
     * @param int    $uid      收货地址
     * @return array
     */
    public function do_order($oid,$status,$uid='',$add_id='')
    {
        $info = Db::name('xy_convey')->find($oid);
        if(!$info) return ['code'=>1,'info'=>'订单号不存在'];
        if($uid && $info['uid']!=$uid) return ['code'=>1,'info'=>'参数错误，请确认订单号!'];
        if(!in_array($info['status'],[0,5])) return ['code'=>1,'info'=>'该订单已处理！请刷新页面'];

        //TODO 判断余额是否足够
        $userPrice = Db::name('xy_users')->where('id',$info['uid'])->value('balance');
        if($info['is_fudan']==0){
            if ($userPrice < $info['num']) return ['code'=>1,'info'=>'账户可用余额不足!'];
        }


        //$tmp = ['endtime'=>time(),'status'=>$status];
        $tmp = ['endtime'=>time()+config('deal_feedze'),'status'=>$info['is_fudan']==0?1:5];
        $add_id?$tmp['add_id']=$add_id:'';
        Db::startTrans();
        $res = Db::name('xy_convey')->where('id',$oid)->update($tmp);
        if(in_array($status,[1,3])){
            //确认付款
            try {
                $res1 = Db::name('xy_users')
                        ->where('id', $info['uid']);
                    if($info['is_fudan']==0){
                        $res1 = $res1->dec('balance',$info['num']);
                        if(Db::name('xy_users')
                            ->where('id', $info['uid'])->value('freeze_balance')>=$info['commission']){
                            $res1 =$res1->dec('freeze_balance',$info['commission'])
                            ->update(['deal_status' => 2,'status'=>1,]);//普通单，冻结资金减佣金
                        }else{
                            $res1 = $res1->update(['deal_status' => 2,'status'=>1,'freeze_balance'=>0 ]);
                        }

                    }else {
                        //单子金额-余额=补齐金额，佣金冻结
                        $res1 = $res1->inc('freeze_balance', $info['commission'])
                            ->inc('fudan_balance',$info['num']-$userPrice)
                        ->update(['deal_status' => 1,'status'=>1]); //冻结商品金额 + 佣金
                        Db::name('xy_convey')->where('id',$oid)->update(['fudan_balance'=>$info['num']-$userPrice]);
                    }
            } catch (\Throwable $th) {
                Db::rollback();
                return ['code'=>1,'info'=>'请检查账户余额!'];
            }
            $res2 = Db::name('xy_balance_log')->insert([
                'uid'           => $info['uid'],
                'oid'           => $oid,
                'num'           => $info['num'],
                'type'          => 2,
                'status'        => 2,
                'addtime'       => time()
            ]);
            if($status==3) Db::name('xy_message')->insert(['uid'=>$info['uid'],'type'=>2,'title'=>'系统通知','content'=>'交易订单'.$oid.'已被系统强制付款，如有疑问请联系客服','addtime'=>time()]);
            //系统通知
            if($res && $res1 && $res2){
                Db::commit();
                $c_status = Db::name('xy_convey')->where('id',$oid)->value('c_status');
                //判断是否已返还佣金
                //if($c_status===0) $this->deal_reward($info['uid'],$oid,$info['num'],$info['commission']);
                return ['code'=>0,'info'=>'操作成功!'];
            }else {
                Db::rollback();
                return ['code'=>1,'info'=>'操作失败'];
            }
        }elseif (in_array($status,[2,4])) {
            $res1 = Db::name('xy_users')->where('id',$info['uid'])->update(['deal_status'=>1]);
            if($status==4) {
                Db::name('xy_message')->insert(['uid'=>$info['uid'],'type'=>2,'title'=>'系统通知','content'=>'交易订单'.$oid.'已被系统强制取消，如有疑问请联系客服','addtime'=>time()]);
                Db::name('xy_convey')->where('id',$oid)->update(['status'=>4]);
            }
            //系统通知
            if($res && $res1!==false){
                Db::commit();
                return ['code'=>0,'info'=>'操作成功!'];
            }else {
                Db::rollback();
                return ['code'=>1,'info'=>'操作失败','data'=>$res1];
            }
        }
    }

    /**
     * 交易返佣
     *
     * @return void
     */
    public function deal_reward($uid,$oid,$num,$cnum)
    {
        $res = Db::name('xy_users')->where('id',$uid)->where('status',1)->setInc('balance',$num+$cnum);
        if($res){
                $res1 = Db::name('xy_balance_log')->insert([
                    //记录返佣信息
                    'uid'       => $uid,
                    'oid'       => $oid,
                    'num'       => $num+$cnum,
                    'type'      => 3,
                    'addtime'   => time()
                ]);
                //将订单状态改为已返回佣金
                Db::name('xy_convey')->where('id',$oid)->update(['c_status'=>1]);
                Db::name('xy_reward_log')->insert(['oid'=>$oid,'uid'=>$uid,'num'=>$num,'addtime'=>time(),'type'=>2]);//记录充值返佣订单
                 /************* 发放交易奖励 *********/
                    $userList = model('admin/Users')->parent_user($uid,5);
                    if($userList){
                        foreach($userList as $v){
                            if($v['status']===1){
                                Db::name('xy_reward_log')
                                ->insert([
                                    'uid'       => $v['id'],
                                    'sid'       => $uid,
                                    'oid'       => $oid,
                                    'num'       => $num*config($v['lv'].'_d_reward'),
                                    'lv'        => $v['lv'],
                                    'type'      => 2,
                                    'status'    => 1,
                                    'addtime'   => time(),
                                ]);
                            }
                        }
                    }
                 /************* 发放交易奖励 *********/
        }else{
            $res1 = Db::name('xy_convey')->where('id',$oid)->update(['c_status'=>2]);//记录账号异常
        }
    }
}