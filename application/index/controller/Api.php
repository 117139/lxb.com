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
use epay\AlipaySubmit;
use epay\AlipayNotify;

/**
 * 支付控制器
 */
class Api extends Controller
{

    public $BASE_URL = "https://bapi.app";
    public $appKey = '';
    public $appSecret = '';

    const POST_URL = "https://pay.bbbapi.com/";


    public function __construct()
    {
        $this->appKey = config('app.bipay.appKey');
        $this->appSecret = config('app.bipay.appSecret');
    }

    public function bipay()
    {

        $oid = isset($_REQUEST['oid']) ? $_REQUEST['oid']: '';
        if ($oid) {
            $r = db('xy_recharge')->where('id',$oid)->find();
            if ($r) {
                $server_url = $_SERVER['SERVER_NAME']?"http://".$_SERVER['SERVER_NAME']:"http://".$_SERVER['HTTP_HOST'];
                $notifyUrl = $server_url.url('/index/api/bipay_notify');
                $returnUrl = $server_url.url('/index/api/bipay_return');
                $price = $r['num'] * 100;
                $res = $this->create_order($oid,$price,'用户充值',$notifyUrl, $returnUrl);

                if ($res && $res['code']==200) {
                    $url = $res['data']['pay_url'];
                    $this->redirect($url);
                }
            }
        }
    }

    public function bipay_return()
    {
        return $this->fetch();
    }


    public function bipay_notify()
    {

        $content = file_get_contents('php://input');
        $post    = (array)json_decode($content, true);
        file_put_contents("bipay_notify.log",$content."\r\n",FILE_APPEND);

        if (!$post['order_id']) {
            die('fail');
        }
        $oid = $post['order_id'];
        $r = db('xy_recharge')->where('id',$oid)->find();
        if (!$r) {
            die('fail');
        }
        if ($post['order_state']!=1) {
            die('fail');
        }

        if ($r['status'] == 2){
            die('SUCCESS');
        }

        if ($post['order_state']) {
            $res = Db::name('xy_recharge')->where('id',$oid)->update(['endtime'=>time(),'status'=>2]);
            $oinfo = $r;
            $res1 = Db::name('xy_users')->where('id',$oinfo['uid'])->setInc('balance',$oinfo['num']);
            $res2 = Db::name('xy_balance_log')
                ->insert([
                    'uid'=>$oinfo['uid'],
                    'oid'=>$oid,
                    'num'=>$oinfo['num'],
                    'type'=>1,
                    'status'=>1,
                    'addtime'=>time(),
                ]);
            /************* 发放推广奖励 *********/
            $uinfo = Db::name('xy_users')->field('id,active')->find($oinfo['uid']);
            if($uinfo['active']===0){
                Db::name('xy_users')->where('id',$uinfo['id'])->update(['active'=>1]);
                //将账号状态改为已发放推广奖励
                $userList = model('Users')->parent_user($uinfo['id'],3);
                if($userList){
                    foreach($userList as $v){
                        if($v['status']===1 && ($oinfo['num'] * config($v['lv'].'_reward') != 0)){
                            Db::name('xy_reward_log')
                                ->insert([
                                    'uid'=>$v['id'],
                                    'sid'=>$uinfo['id'],
                                    'oid'=>$oid,
                                    'num'=>$oinfo['num'] * config($v['lv'].'_reward'),
                                    'lv'=>$v['lv'],
                                    'type'=>1,
                                    'status'=>1,
                                    'addtime'=>time(),
                                ]);
                        }
                    }
                }
            }
            /************* 发放推广奖励 *********/
            die('SUCCESS');
        }
    }


    public function create_order(
        $orderId, $amount, $body, $notifyUrl, $returnUrl, $extra = '', $orderIp = '', $amountType = 'CNY', $lang = 'zh_CN')
    {
        $reqParam = [
            'order_id' => $orderId,
            'amount' => $amount,
            'body' => $body,
            'notify_url' => $notifyUrl,
            'return_url' => $returnUrl,
            'extra' => $extra,
            'order_ip' => $orderIp,
            'amount_type' => $amountType,
            'time' => time() * 1000,
            'app_key' => $this->appKey,
            'lang' => $lang
        ];
        $reqParam['sign'] = $this->create_sign($reqParam, $this->appSecret);
        $url = $this->BASE_URL . '/api/v2/pay';

        return $this->http_request($url, 'POST', $reqParam);
    }

    /**
     * @return {
     * bapp_id: "2019081308272299266f",
     * order_id: "1565684838",
     * order_state: 0,
     * body: "php-sdk sample",
     * notify_url: "https://sdk.b.app/api/test/notify/test",
     * order_ip: "",
     * amount: 1,
     * amount_type: "CNY",
     * amount_btc: 0,
     * pay_time: 0,
     * create_time: 1565684842076,
     * order_type: 2,
     * app_key: "your_app_key",
     * extra: ""
     * }
     */
    public function get_order($orderId)
    {
        $reqParam = [
            'order_id' => $orderId,
            'time' => time() * 1000,
            'app_key' => $this->appKey
        ];
        $reqParam['sign'] = $this->create_sign($reqParam, $this->appSecret);
        $url = $this->BASE_URL . '/api/v2/order';
        return $this->http_request($url, 'GET', $reqParam);
    }

    public function is_sign_ok($params)
    {
        $sign = $this->create_sign($params, $this->appSecret);
        return $params['sign'] == $sign;
    }

    public function create_sign($params, $appSecret)
    {
        $signOriginStr = '';
        ksort($params);
        foreach ($params as $key => $value) {
            if (empty($key) || $key == 'sign') {
                continue;
            }
            $signOriginStr = "$signOriginStr$key=$value&";
        }
        return strtolower(md5($signOriginStr . "app_secret=$appSecret"));
    }

    private function http_request($url, $method = 'GET', $params = [])
    {
        $curl = curl_init();

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
            $jsonStr = json_encode($params);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonStr);
        } else if ($method == 'GET') {
            $url = $url . "?" . http_build_query($params, '', '&');
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


        $output = curl_exec($curl);

        if (curl_errno($curl) > 0) {
            return [];
        }
        curl_close($curl);
        $json = json_decode($output, true);

        //var_dump($output,curl_errno($curl));die;

        return $json;
    }


    //----------------------------------------------------------------
    //  paysapi
    //----------------------------------------------------------------

    public function pay(){

        $oid = isset($_REQUEST['oid']) ? $_REQUEST['oid']: '';
        if ($oid) {
            $r = db('xy_recharge')->where('id',$oid)->find();
            if ($r) {

                //var_dump($r);die;

                $server_url = $_SERVER['SERVER_NAME']?"http://".$_SERVER['SERVER_NAME']:"http://".$_SERVER['HTTP_HOST'];
                $notify_url = $server_url.url('/index/api/pay_notify');
                $return_url = $server_url.url('/index/api/bipay_return');
                $price = $r['num'];


                $uid   = config('app.paysapi.uid');    //"此处填写Yipay的uid";
                $token = config('app.paysapi.token');;     //"此处填写Yipay的Token";

                $orderid = $r['id'];
                $goodsname= '用户充值';
                $istype =  config('app.paysapi.istype');
                $orderuid = session('user_id');

                $key = md5($goodsname. $istype . $notify_url . $orderid . $orderuid . $price . $return_url . $token. $uid);

                $data = array(
                    'goodsname'=>$goodsname,
                    'istype'=>$istype,
                    'key'=>$key,
                    'notify_url'=>$notify_url,
                    'orderid'=>$orderid,
                    'orderuid'=>$orderuid,
                    'price'=>$price,
                    'return_url'=>$return_url,
                    'uid'=>$uid
                );
                $this->assign('data',$data);
                $this->assign('post_url',self::POST_URL);
                return $this->fetch();
            }
        }

    }


    /**
     * notify_url接收页面
     */
    public function pay_notify(){

        $paysapi_id = $_POST["paysapi_id"];
        $orderid = $_POST["orderid"];
        $price = $_POST["price"];
        $realprice = $_POST["realprice"];
        $orderuid = $_POST["orderuid"];
        $key = $_POST["key"];

        file_put_contents(APP_PATH.'/../paysapi_notify.log', json_encode($_REQUEST)."\r\n",FILE_APPEND);


        //校验传入的参数是否格式正确，略
        $d = $payType = array();
        if ($orderid) {
            $out_trade_no = $orderid;
            //$res = Db::name('xy_recharge')->where('id',$oid)->update(['endtime'=>time(),'status'=>2]);

            //$d = M('recharge')->where(array('order_no'=>$out_trade_no))->find();
            //$payType = M('pay_type')->find($d['payment_type']);

        }
        $token = config('app.paysapi.token');;
        $temps = md5($orderid . $orderuid . $paysapi_id . $price . $realprice . $token);

        if ($temps != $key){
            return exit("key值不匹配");
        }else{
            //校验key成功
            $oid = $orderid;
            $r = db('xy_recharge')->where('id',$oid)->find();
            $res = Db::name('xy_recharge')->where('id',$oid)->update(['endtime'=>time(),'status'=>2]);
            $oinfo = $r;

            if ($oinfo['is_vip']) {
                $res1 = Db::name('xy_users')->where('id',$oinfo['uid'])->update(['level'=>$oinfo['level']]);
            }else{
                $res1 = Db::name('xy_users')->where('id',$oinfo['uid'])->setInc('balance',$oinfo['num']);
            }

            //$res1 = Db::name('xy_users')->where('id',$oinfo['uid'])->setInc('balance',$oinfo['num']);
            $res2 = Db::name('xy_balance_log')
                ->insert([
                    'uid'=>$oinfo['uid'],
                    'oid'=>$oid,
                    'num'=>$oinfo['num'],
                    'type'=>1,
                    'status'=>1,
                    'addtime'=>time(),
                ]);
            if ($oinfo['is_vip']) {
                goto end;
            }

            /************* 发放推广奖励 *********/
            $uinfo = Db::name('xy_users')->field('id,active')->find($oinfo['uid']);
            if($uinfo['active']===0){
                Db::name('xy_users')->where('id',$uinfo['id'])->update(['active'=>1]);
                //将账号状态改为已发放推广奖励
                $userList = model('Users')->parent_user($uinfo['id'],3);
                if($userList){
                    foreach($userList as $v){
                        if($v['status']===1 && ($oinfo['num'] * config($v['lv'].'_reward') != 0)){
                            Db::name('xy_reward_log')
                                ->insert([
                                    'uid'=>$v['id'],
                                    'sid'=>$uinfo['id'],
                                    'oid'=>$oid,
                                    'num'=>$oinfo['num'] * config($v['lv'].'_reward'),
                                    'lv'=>$v['lv'],
                                    'type'=>1,
                                    'status'=>1,
                                    'addtime'=>time(),
                                ]);
                        }
                    }
                }
            }

            end:
            /************* 发放推广奖励 *********/
            die('SUCCESS');

        }
    }


    /**
     * @地址      woaipay
     * @说明
     * @参数       @参数 @参数
     */
    public function woaipay()
    {
        $oid = isset($_REQUEST['oid']) ? $_REQUEST['oid']: '';
        if ($oid) {
            $r = db('xy_recharge')->where('id', $oid)->find();
            if ($r) {
                //
                $notify_url = 'http://' . $_SERVER['SERVER_NAME'] . "/index/api/epay_notify_url";
                //需http://格式的完整路径，不能加?id=123这类自定义参数
                //页面跳转同步通知页面路径
                $return_url = 'http://' . $_SERVER['SERVER_NAME'] . "/index/api/bipay_return";
                //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
                $out_trade_no =  $r['id'];;//商户订单号//商户网站订单系统中唯一订单号，必填

                //支付方式
                $type = $r['pay_type'];
                //商品名称
                $name = '会员充值';
                //付款金额
                $money = $r['num'];;
                //站点名称
                $sitename = '接单宝';
                //必填

                //订单描述
                //签名方式 不需修改
                $alipay_config = config('epay_config');
                $alipay_config['sign_type']    = strtoupper('MD5');
                //字符编码格式 目前支持 gbk 或 utf-8
                $alipay_config['input_charset']= strtolower('utf-8');
                //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
                $alipay_config['transport']    = 'http';
                //支付API地址
                $alipay_config['apiurl']    = 'http://vip.321zf.cn/';

                /************************************************************/

                //构造要请求的参数数组，无需改动
                $parameter = array(
                    "pid" => trim($alipay_config['partner']),
                    "type" => $type,
                    "notify_url"	=> $notify_url,
                    "return_url"	=> $return_url,
                    "out_trade_no"	=> $out_trade_no,
                    "name"	=> $name,
                    "money"	=> $money,
                    "sitename"	=> $sitename
                );

                //var_dump($alipay_config);die;

                //建立请求
                $alipaySubmit = new AlipaySubmit($alipay_config);
                $html_text = $alipaySubmit->buildRequestForm($parameter);
                echo $html_text;

            }
        }
    }


    public function epay_notify_url()
    {

        $alipay_config = config('epay_config');
        $alipay_config['sign_type']    = strtoupper('MD5');

        //字符编码格式 目前支持 gbk 或 utf-8
        $alipay_config['input_charset']= strtolower('utf-8');
        //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
        //支付API地址
        $alipay_config['apiurl']    = 'http://vip.321zf.cn/';
        //计算得出通知验证结果
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();

        file_put_contents(APP_PATH.'/../epay_notify.log', json_encode($_REQUEST)."\r\n",FILE_APPEND);


        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
            //商户订单号
            $out_trade_no = $_GET['out_trade_no'];
            //彩虹易支付交易号
            $trade_no = $_GET['trade_no'];
            //交易状态
            $trade_status = $_GET['trade_status'];
            //支付方式
            $type = $_GET['type'];


            if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //付款完成后，支付宝系统发送该交易状态通知

                $oid = $out_trade_no;
                $r = db('xy_recharge')->where('id',$oid)->find();
                $res = Db::name('xy_recharge')->where('id',$oid)->update(['endtime'=>time(),'status'=>2]);
                $oinfo = $r;
                if ($oinfo['is_vip']) {
                    $res1 = Db::name('xy_users')->where('id',$oinfo['uid'])->update(['level'=>$oinfo['level']]);
                }else{
                    $res1 = Db::name('xy_users')->where('id',$oinfo['uid'])->setInc('balance',$oinfo['num']);
                }

                //$res1 = Db::name('xy_users')->where('id',$oinfo['uid'])->setInc('balance',$oinfo['num']);
                $res2 = Db::name('xy_balance_log')
                    ->insert([
                        'uid'=>$oinfo['uid'],
                        'oid'=>$oid,
                        'num'=>$oinfo['num'],
                        'type'=>1,
                        'status'=>1,
                        'addtime'=>time(),
                    ]);

                if ($oinfo['is_vip']) {
                    goto end;
                }
                /************* 发放推广奖励 *********/
                $uinfo = Db::name('xy_users')->field('id,active')->find($oinfo['uid']);
                if($uinfo['active']===0){
                    Db::name('xy_users')->where('id',$uinfo['id'])->update(['active'=>1]);
                    //将账号状态改为已发放推广奖励
                    $userList = model('Users')->parent_user($uinfo['id'],3);
                    if($userList){
                        foreach($userList as $v){
                            if($v['status']===1 && ($oinfo['num'] * config($v['lv'].'_reward') != 0)){
                                Db::name('xy_reward_log')
                                    ->insert([
                                        'uid'=>$v['id'],
                                        'sid'=>$uinfo['id'],
                                        'oid'=>$oid,
                                        'num'=>$oinfo['num'] * config($v['lv'].'_reward'),
                                        'lv'=>$v['lv'],
                                        'type'=>1,
                                        'status'=>1,
                                        'addtime'=>time(),
                                    ]);
                            }
                        }
                    }
                }
                /************* 发放推广奖励 *********/


            }

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            end:
            echo "success";		//请不要修改或删除

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "fail";
        }
    }



}