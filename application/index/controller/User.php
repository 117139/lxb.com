<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2019 
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 

// +----------------------------------------------------------------------

namespace app\index\controller;

use library\Controller;
use think\Db;

/**
 * 登录控制器
 */
class User extends Controller
{

    protected $table = 'xy_users';

    /**
     * 空操作 用于显示错误页面
     */
    public function _empty($name){

        return $this->fetch($name);
    }

    //用户登录页面
    public function login()
    {
        if(session('user_id')) $this->redirect('index/index');
        return $this->fetch();
    }

    //用户登录接口
    public function do_login()
    {
        // $this->applyCsrfToken();//验证令牌
        $tel = input('post.tel/s','');
        if(!is_mobile($tel)){
            return json(['code'=>1,'info'=>'手机号码格式不正确']);
        }
        $num = Db::table($this->table)->where(['tel'=>$tel])->count();
        if(!$num){
            return json(['code'=>1,'info'=>'账号不存在']);
        }

        $pwd         = input('post.pwd/s', ''); 
        $keep        = input('post.keep/b', false);    

        $userinfo = Db::table($this->table)->field('id,pwd,salt,pwd_error_num,allow_login_time,status,login_status,headpic')->where('tel',$tel)->find();
        if(!$userinfo)return json(['code'=>1,'info'=>'用户不存在']);
        if($userinfo['status'] != 1)return json(['code'=>1,'info'=>'用户已被禁用']);
        //if($userinfo['login_status'])return ['code'=>1,'info'=>'此账号已在别处登录状态'];
        if($userinfo['allow_login_time'] && ($userinfo['allow_login_time'] > time()) && ($userinfo['pwd_error_num'] > config('pwd_error_num')))return ['code'=>1,'info'=>'密码连续错误次数太多，请'.config('allow_login_min').'分钟后再试'];  
        if($userinfo['pwd'] != sha1($pwd.$userinfo['salt'].config('pwd_str'))){
            Db::table($this->table)->where('id',$userinfo['id'])->update(['pwd_error_num'=>Db::raw('pwd_error_num+1'),'allow_login_time'=>(time()+(config('allow_login_min') * 60))]);
            return json(['code'=>1,'info'=>'密码错误']);  
        }

        $ip = $this->get_client_ip();
        
        Db::table($this->table)->where('id',$userinfo['id'])->update(['pwd_error_num'=>0,'allow_login_time'=>0,'login_status'=>1,'ip'=>$ip]);
        session('user_id',$userinfo['id']);
        session('avatar',$userinfo['headpic']);

        cookie('user_id',$userinfo['id']);
        cookie('avatar',$userinfo['headpic']);



        if($keep){
            Cookie::forever('user_id',$userinfo['id']);
            Cookie::forever('tel',$tel);
            Cookie::forever('pwd',$pwd);
        }
        return json(['code'=>0,'info'=>'登录成功!']);  
    }

    /**
     * 用户注册接口
     */
    public function do_register()
    {
        $tel = input('post.tel/s','');
        // $user_name   = input('post.user_name/s', '');    
        $user_name = '';    //交给模型随机生成用户名
        $verify      = input('post.verify/d', '');       //短信验证码
        $pwd         = input('post.pwd/s', '');
        $pwd2        = input('post.deposit_pwd/s', '');
        $invite_code = input('post.invite_code/s', '');     //邀请码
        //if(!$invite_code) return json(['code'=>1,'info'=>'邀请码不能为空']);

        if(config('app.verify')){
            $verify_msg = Db::table('xy_verify_msg')->field('msg,addtime')->where(['tel'=>$tel,'type'=>1])->find();
            //if(!$verify_msg)return json(['code'=>1,'info'=>'验证码不存在']);
            //if($verify != $verify_msg['msg'])return json(['code'=>1,'info'=>'验证码错误']);
            //if(($verify_msg['addtime'] + (config('app.zhangjun_sms.min')*60)) < time())return json(['code'=>1,'info'=>'验证码已失效']);
        }

        $pid = 0;
        if($invite_code) {
            $parentinfo = Db::table($this->table)->field('id,status')->where('invite_code',$invite_code)->find();
            if(!$parentinfo) return json(['code'=>1,'info'=>'邀请码不存在']);
            if($parentinfo['status'] != 1) return json(['code'=>1,'info'=>'该推荐用户已被禁用']);

            $pid = $parentinfo['id'];
        }

        $res = model('admin/Users')->add_users($tel,$user_name,$pwd,$pid,'',$pwd2);
        return json($res);
    }


    public function logout(){
        \Session::delete('user_id');
        $this->redirect('login');
    }

    /**
     * 重置密码
     */
    public function do_forget()
    {
        if(!request()->isPost()) return json(['code'=>1,'info'=>'错误请求']);
        $tel = input('post.tel/s','');
        $pwd = input('post.pwd/s','');
        $verify = input('post.verify/d',0);
        if(config('app.verify')){
            $verify_msg = Db::table('xy_verify_msg')->field('msg,addtime')->where(['tel'=>$tel,'type'=>2])->find();
            if(!$verify_msg)return json(['code'=>1,'info'=>'验证码不存在']);
            if($verify != $verify_msg['msg'])return json(['code'=>1,'info'=>'验证码错误']);
            if(($verify_msg['addtime'] + (config('app.zhangjun_sms.min')*60)) < time())return json(['code'=>1,'info'=>'验证码已失效']);
        }
        $res = model('admin/Users')->reset_pwd($tel,$pwd);
        return json($res);
    }

    public function register()
    {
        $param = \Request::param(true);
        $this->invite_code = isset($param[1]) ? trim($param[1]) : '';  
        return $this->fetch();
    }

    /*  public function reset_qrcode()
    {
        $uinfo = Db::name('xy_users')->field('id,invite_code')->select();
        foreach ($uinfo as $v) {
            $model = model('admin/Users');
            $model->create_qrcode($v['invite_code'],$v['id']);
        }
        return '重新生成用户二维码图片成功';
    } */

    /**
     * 获取客户端IP地址
     * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    function get_client_ip($type = 0,$adv=false)
    {
        $type = $type ? 1 : 0;
        static $ip = NULL;
        if ($ip !== NULL) return $ip[$type];
        if ($adv) {//高级模式获取(防止伪装)
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos = array_search('unknown', $arr);
                if (false !== $pos) unset($arr[$pos]);
                $ip = trim($arr[0]);
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u", ip2long($ip));
        $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
}