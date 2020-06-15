<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class My extends Base
{
    protected $msg = ['__token__'  => '请不要重复提交！'];
    /**
     * 首页
     */
    public function index()
    {
        $this->info = db('xy_users')->field('username,tel,level,id,headpic,balance,freeze_balance,lixibao_balance,invite_code,show_td')->find(session('user_id'));
        $this->lv3 = [0,config('vip_3_num')];
        $this->lv2 = [0,config('vip_2_num')];
        $this->sell_y_num = db('xy_convey')->where('status','in','1,3')
            ->where('uid',session('user_id'))->sum('commission');

        $level = $this->info['level'];
        !$level ? $level = 0 :'';

        $this->level_name = db('xy_level')->where('level',$level)->value('name');

        $this->rililv = config('lxb_bili')*100 .'%' ;
        $this->lxb_shouyi = db('xy_lixibao')->where('status',1)->where('uid',session('user_id'))->sum('num');

        return $this->fetch();
    }

    /**
     * 获取收货地址
     */
    public function get_address()
    {
        $id = session('user_id');
        $data = db('xy_member_address')->where('uid',$id)->select();
        if($data)
            return json(['code'=>0,'info'=>'获取成功','data'=>$data]);
        else
            return json(['code'=>1,'info'=>'暂未数据']);
    }

    /**
     * 添加收货地址
     */
    public function add_address()
    {
        if(request()->isPost()){
            $uid = session('user_id');
            $name = input('post.name/s','');
            $tel = input('post.tel/s','');
            $address = input('post.address/s','');
            $area = input('post.area/s','');
            $token = input("token");//获取提交过来的令牌
            $data = ['__token__' => $token];
            $validate   = \Validate::make($this->rule,$this->msg);
            if (!$validate->check($data)) {
                return json(['code'=>1,'info'=>$validate->getError()]);
            }
            $data = [
                'uid'       => $uid,
                'name'      => $name,
                'tel'       => $tel,
                'area'      => $area,
                'address'   => $address,
                'addtime'   => time()
            ];
            $tmp = db('xy_member_address')->where('uid',$uid)->find();
            if(!$tmp) $data['is_default']=1;
            $res = db('xy_member_address')->insert($data);
            if($res)
                return json(['code'=>0,'info'=>'操作成功']);
            else
                return json(['code'=>1,'info'=>'操作失败']);
        }
        return json(['code'=>1,'info'=>'错误请求']);
    }

    /**
     * 编辑收货地址
     */
    public function edit_address()
    {
        if(request()->isPost()){
            $uid        = session('user_id');
            $name       = input('post.name/s','');
            $tel        = input('post.tel/s','');
            $address    = input('post.address/s','');
            $area       = input('post.area/s','');
            $id         = input('post.id/d',0);

            $info = db('xy_member_address')->find($id);
            if(!$info) return json(['code'=>1,'info'=>'收货地址不存在，请刷新再试']);
            if($info['uid']!=session('user_id')) return json(['code'=>1,'info'=>'参数错误']);

            $res = db('xy_member_address')
                ->where('id',$id)
                ->update([
                    'uid'       => $uid,
                    'name'      => $name,
                    'tel'       => $tel,
                    'area'      => $area,
                    'address'   => $address,
                    'addtime'   => time()
                ]);
            if($res)
                return json(['code'=>0,'info'=>'操作成功']);
            else
                return json(['code'=>1,'info'=>'操作失败']);
        }elseif (request()->isGet()) {
            $id = input('id/d',0);
            $info = db('xy_member_address')->find($id);
            if(!$info) return json(['code'=>1,'info'=>'收货地址不存在，请刷新再试']);
            if($info['uid']!=session('user_id')) return json(['code'=>1,'info'=>'参数错误']);
            return json(['code'=>0,'info'=>'请求成功','data'=>$info]);
        }
    }

    /**
     * 设置默认收货地址
     */
    public function set_address()
    {
        if(request()->isPost()){
            $id = input('post.id/d',0);
            Db::startTrans();
            $res = db('xy_member_address')->where('uid',session('user_id'))->update(['is_default'=>0]);
            $res1 = db('xy_member_address')->where('id',$id)->update(['is_default'=>1]);
            if($res && $res1){
                Db::commit();
                return json(['code'=>0,'info'=>'操作成功']);
            }else{
                Db::rollback();
                return json(['code'=>1,'info'=>'操作失败']);
            }
        }
        return json(['code'=>1,'info'=>'错误请求']);
    }

    /**
     * 删除收货地址
     */
    public function del_address()
    {
        if(request()->isPost()){
            $id = input('post.id/d',0);
            $info = db('xy_member_address')->find($id);
            if($info['is_default']==1){
                return json(['code'=>1,'info'=>'不能删除默认收货地址']);
            }
            $res = db('xy_member_address')->where('id',$id)->delete();
            if($res)
                return json(['code'=>0,'info'=>'操作成功']);
            else
                return json(['code'=>1,'info'=>'操作失败']);
        }
        return json(['code'=>1,'info'=>'错误请求']);
    }

    public function get_bot(){
        $data = model('admin/Users')->get_botuser(session('user_id'),3);
        halt($data);
    }

    /**
     * 用户账号充值
     */
    public function user_recharge()
    {
        $tel = input('post.tel/s','');
        $num = input('post.num');
        $pic = input('post.pic/s','');
        $real_name = input('post.real_name/s','');
        $uid = session('user_id');

        //if(!$pic || !$num || !$tel || !$real_name) return json(['code'=>1,'info'=>'参数错误']);
        //if(!is_mobile($tel)) return json(['code'=>1,'info'=>'手机号码格式不正确']);

        //if (is_image_base64($pic))
        //    $pic = '/' . $this->upload_base64('xy',$pic);  //调用图片上传的方法
       // else
        //    return json(['code'=>1,'info'=>'图片格式错误']);
        $id = getSn('SY');
        $res = db('xy_recharge')
                ->insert([
                    'id'        => $id,
                    'uid'       => $uid,
                    'tel'       => $tel,
                    'real_name' => $real_name,
                    'pic'       => $pic,
                    'num'       => $num,
                    'addtime'   => time()
                ]);
        if($res) {
            $uinfo = db('xy_users')->field('pwd,salt,tel,username,is_jia')->find($uid);
            if ($uinfo['is_jia']) {
                Db::name('xy_recharge')->where('id', $id)->update(['endtime' => time(), 'status' => 2]);
                $res2 = Db::name('xy_balance_log')
                    ->insert([
                        'uid' => $uid,
                        'oid' => $id,
                        'num' => $num,
                        'type' => 1,
                        'status' => 1,
                        'addtime' => time(),
                    ]);
                $res1 = Db::name('xy_users')->where('id', $uid)->setInc('balance', $num);
                /************* 发放推广奖励 *********/
                $uinfo = Db::name('xy_users')->field('id,active')->find($uid);
                if ($uinfo['active'] === 0) {
                    Db::name('xy_users')->where('id', $uinfo['id'])->update(['active' => 1]);
                    //将账号状态改为已发放推广奖励
                    $userList = model('Users')->parent_user($uinfo['id'], 3);
                    if ($userList) {
                        foreach ($userList as $v) {
                            if ($v['status'] === 1 && ($num * config($v['lv'] . '_reward') != 0)) {
                                Db::name('xy_reward_log')
                                    ->insert([
                                        'uid' => $v['id'],
                                        'sid' => $uid,
                                        'oid' => $id,
                                        'num' => $num * config($v['lv'] . '_reward'),
                                        'lv' => $v['lv'],
                                        'type' => 1,
                                        'status' => 1,
                                        'addtime' => time(),
                                    ]);
                            }
                        }
                    }
                }
                /************* 发放推广奖励 *********/
            }


            return json(['code' => 0, 'info' => '提交成功']);
        }else {
            return json(['code' => 1, 'info' => '提交失败，请稍后再试']);
        }
    }




    /**
     * 用户账号充值2
     */
    public function user_recharge2()
    {
        $id = input('post.oid/s','');
        $pic = input('post.pic/s','');
        $uid = session('user_id');

        //if(!$pic || !$id) return json(['code'=>1,'info'=>'参数错误']);

        //if (is_image_base64($pic))
        //    $pic = '/' . $this->upload_base64('xy',$pic);  //调用图片上传的方法
        //else
        //    return json(['code'=>1,'info'=>'图片格式错误']);


        $res = db('xy_recharge')->where('id',$id)->update(['pic'=> ""]);
        if($res){
            return json(['code' => 0, 'info' => '提交成功']);
        }else {
            return json(['code' => 1, 'info' => '提交失败，请稍后再试']);
        }

    }

    //邀请界面
    public function invite()
    {
        $uid = session('user_id');
        $this->assign('pic','/upload/qrcode/user/'.($uid%20).'/'.$uid.'-1.png');
        return $this->fetch();
    }

    //我的资料
    public function do_my_info()
    {
        if(request()->isPost()){
            $headpic    = input('post.headpic/s','');
            $wx_ewm    = input('post.wx_ewm/s','');
            $zfb_ewm    = input('post.zfb_ewm/s','');
            $nickname   = input('post.nickname/s','');
            $username   = input('post.username/s','');
            $sign       = input('post.sign/s','');
            $data = [
                'username'  => $username,
                'nickname'  => $nickname,
                'signiture' => $sign
            ];

            if($headpic){
                $headpic = '/' . $this->upload_base64('xy',$headpic);  //调用图片上传的方法
                $data['headpic'] = $headpic;
            }

            if($wx_ewm){
                $wx_ewm = '/' . $this->upload_base64('xy',$wx_ewm);  //调用图片上传的方法
                $data['wx_ewm'] = $wx_ewm;
            }

            if($zfb_ewm){
                $zfb_ewm = '/' . $this->upload_base64('xy',$zfb_ewm);  //调用图片上传的方法
                $data['zfb_ewm'] = $zfb_ewm;
            }




            $res = db('xy_users')->where('id',session('user_id'))->update($data);
            if($res!==false){
                if($headpic) session('avatar',$headpic);
                return json(['code'=>0,'info'=>'操作成功']);
            }else{
                return json(['code'=>1,'info'=>'操作失败']);
            }
        }elseif(request()->isGet()){
            $info = db('xy_users')->field('username,headpic,nickname,signiture sign,wx_ewm,zfb_ewm')->find(session('user_id'));
            return json(['code'=>0,'info'=>'请求成功','data'=>$info]);
        }
    }

    // 消息
    public function msg()
    {
        $this->info = db('xy_message')
        ->alias('m')
        // ->leftJoin('xy_users u','u.id=m.sid')
        ->leftJoin('xy_reads r','r.mid=m.id and r.uid='.session('user_id'))
        ->field('m.*,r.id rid')
        ->where('m.uid','in',[0,session('user_id')])
        ->order('addtime desc')
        ->select();
        return $this->fetch();
    }

    //记录阅读情况
    public function reads()
    {
        if(\request()->isPost()){
            $id = input('post.id/d',0);
            db('xy_reads')->insert(['mid'=>$id,'uid'=>session('user_id'),'addtime'=>time()]);
            return $this->success('成功');
        }
    }

    //修改绑定手机号
    public function reset_tel()
    {
        $pwd = input('post.pwd','');
        $verify = input('post.verify/s','');
        $tel = input('post.tel/s','');
        $userinfo = Db::table('xy_users')->field('id,pwd,salt')->find(session('user_id'));
        if($userinfo['pwd'] != sha1($pwd.$userinfo['salt'].config('pwd_str'))) return json(['code'=>1,'info'=>'登录密码错误']);
        if(config('app.verify')){
            $verify_msg = Db::table('xy_verify_msg')->field('msg,addtime')->where(['tel'=>$tel,'type'=>3])->find();
            if(!$verify_msg) return json(['code'=>1,'info'=>'验证码不存在']);
            if($verify != $verify_msg['msg']) return json(['code'=>1,'info'=>'验证码错误']);
            if(($verify_msg['addtime'] + (config('app.zhangjun_sms.min')*60)) < time())return json(['code'=>1,'info'=>'验证码已失效']);
        }
        $res = db('xy_users')->where('id',session('user_id'))->update(['tel'=>$tel]);
        if($res!==false)
            return json(['code'=>0,'info'=>'操作成功']);
        else
            return json(['code'=>1,'info'=>'操作失败']);
    }

    //团队佣金列表
    public function get_team_reward()
    {
        $uid = session('user_id');
        $lv = input('post.lv/d',1);
        $num = Db::name('xy_reward_log')->where('uid',$uid)->where('addtime','between',strtotime(date('Y-m-d')) . ',' . time())->where('lv',$lv)->where('status',1)->sum('num');

        if($num) return json(['code'=>0,'info'=>'请求成功','data'=>$num]);
        return json(['code'=>1,'info'=>'暂无数据']);
    }
}
