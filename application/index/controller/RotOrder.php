<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

/**
 * 下单控制器
 */
class RotOrder extends Base
{
    /**
     * 首页
     */
    public function index()
    {
        $where = [
            ['uid','=',session('user_id')],
            ['addtime','between',strtotime(date('Y-m-d')).','.time()],
        ];
        $this->day_deal = Db::name('xy_convey')->where($where)->where('status','in',[1,3,5])->sum('commission');
        $this->lock_deal = Db::name('xy_users')->where('id',session('user_id'))->sum('freeze_balance');
        $this->price = $this->lock_deal+Db::name('xy_users')->where('id',session('user_id'))->sum('balance');
        $this->price_d = Db::name('xy_users')->where('id',session('user_id'))->sum('fudan_balance');

        $this->day_d_count = Db::name('xy_convey')->where($where)->where('is_fudan',0)->where('status','in',[0,1,3,5])->count('id');
        $this->day_l_count = Db::name('xy_convey')->where($where)->where('status',5)->count('num');//交易冻结单数
        $this->fudan_day_l_count = Db::name('xy_convey')->where($where)->where('is_fudan',1)->where('status','in',[0,1,3,5])->count('num');//交易冻结单数
        $this->day_2_count = Db::name('xy_convey')->where($where)->where('status',0)->count('num');//交易冻结单数
        $this->day_3_count = Db::name('xy_convey')->where($where)->where('status','in','1,3')->count('num');//交易冻结单数

        //var_dump($this->day_l_count);die;
        $this->team_num = Db::name('xy_reward_log')->where('uid',session('user_id'))->where('addtime','between',strtotime(date('Y-m-d')) . ',' . time())->where('status',1)->sum('num');//获取下级返佣数额
        $this->deal_count = Db::name('xy_users')->where('id',session('user_id'))->value('deal_count');
        $this->xy_msg = $a=Db::name('xy_index_msg')->where('id',9)->where('status',1)->value('content');

        //分类
        $type = input('get.type/d',1);
        //$this->cate = db('xy_goods_cate')->order('addtime asc')->select();
        $uid = session('user_id');
        $user = Db::name('xy_users')->where('id',$uid)->find();

        $this->level = Db::name('xy_level')->where('level',$user['level'])->find();

        $goods_cate = Db::name('xy_goods_cate')->select();
        foreach($goods_cate as $v){
            if($user['balance']>$v['min']){
                $this->cate=$v;
            }
        }

        //var_dump($this->cate);die;

        return $this->fetch();
    }

    public function isUserVip(Request $request){
        try{
            $user_id = session('user_id');
            if(!$user_id){
                return json(['code'=>0,'msg'=>'请登录后重试']);
            }
            //查询用户信息
            $user = Db::name('xy_users')->where('xy_u.id',$user_id)->alias('xy_u')
                ->join('xy_level xy_l','xy_u.level=xy_l.level')
                ->field('xy_u.id,xy_l.id as level_id,xy_l.is_credit')->find();
            if(!$user){
                return json(['code'=>0,'msg'=>'请开通会员后重试']);
            }

            if($user['is_credit']==0){
                return json(['code'=>0,'msg'=>'请提升会员等级后重试']);
            }
            return json(['code'=>1,'msg'=>'success','is_vip'=>1]);
        }catch (\Exception $e) {
            return json(['code' => 0, 'msg' => '请求错误']);
        }
    }


  /**
    *提交抢单
    */
    public function submit_order()
    {
        $tmp = $this->check_deal();
        if($tmp) return json($tmp);
        $res = check_time(9,22);
        //if($res) return json(['code'=>1,'info'=>'禁止在9:00~22:00以外的时间段执行当前操作!']);

        $res = check_time(config('order_time_1'),config('order_time_2'));
        $str = config('order_time_1').":00  - ".config('order_time_2').":00";
        if($res) return json(['code'=>1,'info'=>'禁止在'.$str.'以外的时间段执行当前操作!']);

        $uid = session('user_id');
        $add_id = db('xy_member_address')->where('uid',$uid)->where('is_default',1)->value('id');//获取收款地址信息
        if(!$add_id) return json(['code'=>1,'info'=>'还没有设置收货地址']);
        //检查交易状态
        $fudan_balance = Db::name('xy_users')->where('id',session('user_id'))->sum('fudan_balance');
        if($fudan_balance>0){
            $to_day_date = date('Y-m-d');
//            $to_day_date = '2020-06-12';
            //查询今天是否有信用单，有 将未补齐金额-今天的信用单未补齐金额=0，可以下单，!=0
            $to_day_convey = Db::name('xy_convey')->where('uid',$uid)->where('is_fudan',1)
            ->where('status',5)->whereRaw('FROM_UNIXTIME(ADDTIME,\'%Y-%m-%d\')=\''.$to_day_date.'\'')
            ->sum('fudan_balance');
            if($to_day_convey>0&&($num = $fudan_balance-$to_day_convey)>0){
                //查询今天之前的信用单，对比未补齐金额与今天是否一致
                $to_day_convey = Db::name('xy_convey')->where('uid',$uid)->where('is_fudan',1)
                    ->where('status',5)->whereRaw('FROM_UNIXTIME(ADDTIME,\'%Y-%m-%d\')!=\''.$to_day_date.'\'')
                    ->sum('fudan_balance');
                if($to_day_convey==$num){
                    return json(['code'=>1,'info'=>'您的信用单还有'.$to_day_convey.'尚未补齐']);
                }
            }else{

                $to_day_convey = Db::name('xy_convey')->where('uid',$uid)->where('is_fudan',1)
                    ->where('status',5)->whereRaw('FROM_UNIXTIME(ADDTIME,\'%Y-%m-%d\')!=\''.$to_day_date.'\'')
                    ->fetchSql()->sum('fudan_balance');

                if($to_day_convey==$fudan_balance){
                    return json(['code'=>1,'info'=>'您的信用单还有'.$to_day_convey.'尚未补齐']);
                }
            }

        }
        // $sleep = mt_rand(config('min_time'),config('max_time'));
        $res = db('xy_users')->where('id',$uid)->update(['deal_status'=>2]);//将账户状态改为等待交易
        if($res === false) return json(['code'=>1,'info'=>'抢单失败，请稍后再试！']);
        // session_write_close();//解决sleep造成的进程阻塞问题
        // sleep($sleep);
        //
        $cid = input('post.cid/d',1);
        $count = db('xy_goods_list')->where('cid','=',$cid)->count();
        

        if($count < 1) return json(['code'=>1,'info'=>'抢单失败，商品库存不足！']);


        $res = model('admin/Convey')->create_order($uid,$cid);
        return json($res);
    }

    /**
     * 停止抢单
     */
    public function stop_submit_order()
    {
        $uid = session('user_id');
        $res = db('xy_users')->where('id',$uid)->where('deal_status',2)->update(['deal_status'=>1]);
        if($res){
            return json(['code'=>0,'info'=>'操作成功!']);
        }else{
            return json(['code'=>1,'info'=>'操作失败!']);
        }
    }


    /**
     *提交抢单
     */
    public function submit_fudan_order()
    {
        $tmp = $this->check_deal(1);
        if($tmp) return json($tmp);
        $res = check_time(9,22);
        //if($res) return json(['code'=>1,'info'=>'禁止在9:00~22:00以外的时间段执行当前操作!']);

        $res = check_time(config('order_time_1'),config('order_time_2'));
        $str = config('order_time_1').":00  - ".config('order_time_2').":00";
        if($res) return json(['code'=>1,'info'=>'禁止在'.$str.'以外的时间段执行当前操作!']);

        $uid = session('user_id');
        $add_id = db('xy_member_address')->where('uid',$uid)->where('is_default',1)->value('id');//获取收款地址信息
        if(!$add_id) return json(['code'=>1,'info'=>'还没有设置收货地址']);
        //检查交易状态
        $date = date('Y-m-d');
        $freeze_balance = Db::name('xy_convey')->where('uid',session('user_id'))->where('is_fudan',1)
            ->where('status','in','0,5')->count('id');
        $user = Db::name('xy_users')->where('id',$uid)->value('level');
        $level = Db::name('xy_level')->where('level',$user)->value('arrears_times');
        if($freeze_balance>=$level){
            return json(['code'=>1,'info'=>'信用单欠款次数已达上限，请补齐后重试']);
        }
//        if($freeze_balance>0){
//            return json(['code'=>1,'info'=>'您的信用单还有'.$freeze_balance.'尚未补齐']);
//        }
        // $sleep = mt_rand(config('min_time'),config('max_time'));
        $res = db('xy_users')->where('id',$uid)->update(['deal_status'=>2]);//将账户状态改为等待交易
        if($res === false) return json(['code'=>1,'info'=>'抢单失败，请稍后再试！']);
        // session_write_close();//解决sleep造成的进程阻塞问题
        // sleep($sleep);
        //
        $cid = input('post.cid/d',1);
        $count = db('xy_goods_list')->where('cid','=',$cid)->count();


        if($count < 1) return json(['code'=>1,'info'=>'抢单失败，商品库存不足！']);


        $res = model('admin/Convey')->create_order($uid,$cid,1);
        return json($res);
    }

    /**
     * 停止抢单
     */
    public function stop_submit_fudan_order()
    {
        $uid = session('user_id');
        $res = db('xy_users')->where('id',$uid)->where('deal_status',2)->update(['deal_status'=>1]);
        if($res){
            return json(['code'=>0,'info'=>'操作成功!']);
        }else{
            return json(['code'=>1,'info'=>'操作失败!']);
        }
    }

}