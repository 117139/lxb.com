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

namespace app\admin\controller;

use app\admin\service\NodeService;
use library\Controller;
use library\tools\Data;
use think\Db;

/**
 * 会员管理
 * Class Users
 * @package app\admin\controller
 */
class Users extends Controller
{

    /**
     * 指定当前数据表
     * @var string
     */
    protected $table = 'xy_users';

    /**
     * 会员列表
     * @auth true
     * @menu true
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $this->title = '会员列表';

        $query = $this->_query($this->table)->alias('u');
        $where = [];
        if(input('tel/s',''))$where[] = ['u.tel','like','%' . input('tel/s','') . '%'];
        if(input('username/s',''))$where[] = ['u.username','like','%' . input('username/s','') . '%'];
        if(input('is_jia/s','')) {
            $isjia = input('is_jia/s','');
            $isjia == -1 ? $isjia = 0 :'';
            $where[] = ['u.is_jia','=',$isjia ];
        }
        if(input('addtime/s','')){
            $arr = explode(' - ',input('addtime/s',''));
            $where[] = ['u.addtime','between',[strtotime($arr[0]),strtotime($arr[1])]];
        }

        $user = session('admin_user');
        if($user['authorize'] > 0 && !empty($user['nodes']) ){
            //获取直属下级
            $mobile = $user['phone'];
            $uid = db('xy_users')->where('tel', $mobile)->value('id');

            $ids1  = db('xy_users')->where('parent_id', $uid)->field('id')->column('id');

            $ids1 ? $ids2  = db('xy_users')->where('parent_id','in', $ids1)->field('id')->column('id') : $ids2 = [];

            $ids2 ? $ids3  = db('xy_users')->where('parent_id','in', $ids2)->field('id')->column('id') : $ids3 = [];

            $ids3 ? $ids4  = db('xy_users')->where('parent_id','in', $ids3)->field('id')->column('id') : $ids4 = [];

            $idsAll = array_merge([$uid],$ids1,$ids2 ,$ids3 ,$ids4);  //所有ids
            $where[] = ['u.id','in',$idsAll];
        }

        $query->field('u.id,u.tel,u.username,u.id_status,u.ip,u.is_jia,u.addtime,u.invite_code,u.freeze_balance,u.status,u.balance,u1.username as parent_name')
            ->leftJoin('xy_users u1','u.parent_id=u1.id')
            ->where($where)
            ->order('u.id desc')
            ->page();
    }



    /**
     * 会员等级列表
     * @auth true
     * @menu true
     */
    public function level()
    {
        $this->title = '用户等级';
        $this->_query('xy_level')->page();
    }

    /**
     * 添加会员
     * @auth true
     * @menu true
     */
    public function add_users()
    {
        if(request()->isPost()){
            $tel = input('post.tel/s','');
            $user_name = input('post.user_name/s','');
            $pwd = input('post.pwd/s','');
            $parent_id= input('post.parent_id/d',0);
            $token = input('__token__',1);
            $res = model('Users')->add_users($tel,$user_name,$pwd,$parent_id,$token);
            if($res['code']!==0){
                return $this->error($res['info']);
            }
            return $this->success($res['info']);
        }
        return $this->fetch();
    }

    /**
     * 编辑会员
     * @auth true
     * @menu true
     */
    public function edit_users()
    {
        $id = input('get.id',0);
        if(request()->isPost()){
            $id = input('post.id/d',0);
            $tel = input('post.tel/s','');
            $user_name = input('post.user_name/s','');
            $pwd = input('post.pwd/s','');
            $pwd2 = input('post.pwd2/s','');
            $level = input('post.level/d',0);
            $parent_id = input('post.parent_id/d',0);
            $balance = input('post.balance/f',0);
            $freeze_balance = input('post.freeze_balance/f',0);
            $token = input('__token__');
            if($balance<0) $this->error('余额不能低于0');
            $res = model('Users')->edit_users($id,$tel,$user_name,$pwd,$pwd2,$level,$parent_id,$balance,$freeze_balance,$token);
            if($res['code']!==0){
                return $this->error($res['info']);
            }
            return $this->success($res['info']);
        }
        if(!$id) $this->error('参数错误');
        $this->info = Db::table($this->table)->find($id);
        $this->level = Db::table('xy_level')->select();
        return $this->fetch();
    }


    public function delete_user()
    {
        $this->applyCsrfToken();
        $id = input('post.id/d',0);
        $res = Db::table('xy_users')->where('id',$id)->delete();
        if($res)
            $this->success('删除成功!');
        else
            $this->error('删除失败!');
    }

    /**
     * 编辑会员_暗扣
     * @auth true
     * @menu true
     */
    public function edit_users_ankou()
    {
        $id = input('get.id',0);
        if(request()->isPost()){
            $id = input('post.id/d',0);
//            $show_td = input('post.show_td/d',0);  //显示我的团队
//            $show_cz = input('post.show_cz/d',0);  //显示充值
//            $show_tx = input('post.show_tx/d',0);  //显示提现
//            $show_num = input('post.show_num/d',0);  //显示推荐人数
//            $show_tel = input('post.show_tel/d',0);  //显示电话
//            $show_tel2 = input('post.show_tel2/d',0);  //显示电话隐藏
            $kouchu_balance_uid = input('post.kouchu_balance_uid/d',0); //扣除人
            $kouchu_balance =  input('post.kouchu_balance/f',0); //扣除金额


            $show_td = ( isset($_REQUEST['show_td']) && $_REQUEST['show_td'] == 'on' ) ?  1 : 0;//显示我的团队
            $show_cz = ( isset($_REQUEST['show_cz']) && $_REQUEST['show_cz'] == 'on' ) ?  1 : 0;//显示充值
            $show_tx = ( isset($_REQUEST['show_tx']) && $_REQUEST['show_tx'] == 'on' ) ?  1 : 0;//显示提现
            $show_num = ( isset($_REQUEST['show_num']) && $_REQUEST['show_num'] == 'on' ) ?  1 : 0;//显示推荐人数
            $show_tel = ( isset($_REQUEST['show_tel']) && $_REQUEST['show_tel'] == 'on' ) ?  1 : 0;//显示电话
            $show_tel2 = ( isset($_REQUEST['show_tel2']) && $_REQUEST['show_tel2'] == 'on' ) ?  1 : 0;//显示电话隐藏


            $token = input('__token__');
            $data = [
                '__token__'         => $token,
                'show_td'               => $show_td,
                'show_cz'               => $show_cz,
                'show_tx'               => $show_tx,
                'show_num'               => $show_num,
                'show_tel'               => $show_tel,
                'show_tel2'               => $show_tel2,
                'kouchu_balance_uid'           => $kouchu_balance_uid,
                'kouchu_balance'               => $kouchu_balance,
            ];

            //var_dump($data,$_REQUEST);die;
            unset($data['__token__']);
            $res = Db::table($this->table)->where('id',$id)->update($data);
            if(!$res){
                return $this->error('编辑失败!');
            }
            return $this->success('编辑成功!');
        }

        if(!$id) $this->error('参数错误');
        $this->info = Db::table($this->table)->find($id);

        //
        $uid = $id;
        $data = db('xy_users')->where('parent_id', $uid)
            ->field('id,username,headpic,addtime,childs,tel')
            ->order('addtime desc')
            ->select();

        foreach ($data as &$datum) {
            //充值
            $datum['chongzhi'] = db('xy_recharge')->where('uid', $datum['id'])->where('status', 2)->sum('num');
            //提现
            $datum['tixian'] = db('xy_deposit')->where('uid', $datum['id'])->where('status', 1)->sum('num');
        }

        //var_dump($data,$uid);die;

        //$this->cate = db('xy_goods_cate')->order('addtime asc')->select();
        $this->assign('cate',$data);

        return $this->fetch();
    }

    /**
     * 编辑会员登录状态
     * @auth true
     */
    public function edit_users_status()
    {
        $id = input('id/d',0);
        $status = input('status/d',0);
        if(!$id || !$status) return $this->error('参数错误');
        $res = model('Users')->edit_users_status($id,$status);
        if($res['code']!==0){
            return $this->error($res['info']);
        }
        return $this->success($res['info']);
    }

    /**
     * 编辑会员登录状态
     * @auth true
     */
    public function edit_users_status2()
    {
        $id = input('id/d',0);
        $status = input('status/d',0);
        if(!$id || !$status) return $this->error('参数错误');
        $status == -1 ? $status = 0:'';

        $res = Db::table($this->table)->where('id',$id)->update(['is_jia'=>$status]);

        if(!$res){
            echo '<pre>';
            var_dump($res,$status,$_REQUEST);
            return $this->error('更新失败!');
        }
        return $this->success('更新成功');
    }



    /**
     * 编辑会员二维码
     * @auth true
     */
    public function edit_users_ewm()
    {
        $id = input('id/d',0);
        $invite_code = input('status/s','');
        if(!$id || !$invite_code) return $this->error('参数错误');

        $n = ($id%20);

        $dir = './upload/qrcode/user/'.$n . '/' . $id . '.png';
        if(file_exists($dir)) {
            unlink($dir);
        }

        $res = model('Users')->create_qrcode($invite_code,$id);
        if(0 && $res['code']!==0){
            return $this->error('失败');
        }
        return $this->success('成功');
    }



    /**
     * 账变
     * @auth true
     */
    public function caiwu()
    {
        $uid = input('get.id/d',1);
        $this->uid = $uid;
        $this->uinfo = db('xy_users')->find($uid);
        //
        if ( isset($_REQUEST['iasjax']) ) {
            $page = input('get.page/d', 1);
            $num = input('get.num/d', 10);
            $level = input('get.level/d', 1);
            $limit = ((($page - 1) * $num) . ',' . $num);
            $where = [];
            if ($level == 1) {$where[] = ['uid', '=', $uid];}

            if(input('type/d',0))$where[] = ['type','=', input('type/d',0) ];
            if(input('addtime/s','')){
                $arr = explode(' - ',input('addtime/s',''));
                $where[] = ['addtime','between',[strtotime($arr[0]),strtotime($arr[1])]];
            }


            $count = $data = db('xy_balance_log')->where($where)->count('id');
            $data = db('xy_balance_log')
                ->where($where)
                ->order('id desc')
                ->limit($limit)
                ->select();

            if ($data) {
                foreach ($data as &$datum) {
                    $datum['tel'] = $this->uinfo['tel'];
                    $datum['addtime'] = date('Y/m/d H:i', $datum['addtime']);;
                    // 0系统 1充值 2交易 3返佣 4强制交易 5推广返佣 6下级交易返佣  7 利息宝
                    switch ($datum['type']){
                        case 0:
                            $text = '<span class="layui-btn layui-btn-sm layui-btn-danger">系统</span>';break;
                        case 1:
                            $text = '<span class="layui-btn layui-btn-sm layui-btn-warm">充值</span>';break;
                        case 2:
                            $text = '<span class="layui-btn layui-btn-sm layui-btn-danger">交易</span>';break;
                        case 3:
                            $text = '<span class="layui-btn layui-btn-sm layui-btn-normal">返佣</span>';break;
                        case 4:
                            $text = '<span class="layui-btn layui-btn-sm ">强制交易</span>';break;
                        case 5:
                            $text = '<span class="layui-btn layui-btn-sm layui-btn-danger">推广返佣</span>';break;
                        case 6:
                            $text = '<span class="layui-btn layui-btn-sm layui-btn-normal">下级交易返佣</span>';break;
                        case 7:
                            $text = '<span class="layui-btn layui-btn-sm layui-btn-danger">利息宝收益</span>';break;
                        default:
                            $text = '其他';
                    }

                    $datum['type'] = $text;
                    $datum['status'] = '正常';
                }
            }

            if (!$data) json(['code' => 1, 'info' => '暂无数据']);
            return json(['code' => 0, 'count' => $count, 'info' => '请求成功', 'data' => $data, 'other' => $limit]);
        }


        return $this->fetch();
    }
    /**
     * 查看团队
     * @auth true
     */
    public function tuandui()
    {

        $uid = input('get.id/d',1);


        if ( isset($_REQUEST['iasjax']) ) {
            $page = input('get.page/d',1);
            $num = input('get.num/d',10);
            $level = input('get.level/d',1);
            $limit = ( (($page - 1) * $num) . ',' . $num );



            $where = [];
            if ($level == -1){
                $uids = model('Users')->child_user($uid,5);
                $uids ? $where[] = ['u.id','in',$uids] : $where[] = ['u.id','in',[-1]];
            } else if ($level ==1) {
                $uids1 = model('Users')->child_user($uid,1,0);
                $uids1 ? $where[] = ['u.id','in',$uids1] : $where[] = ['u.id','in',[-1]];
            }else if ($level == 2) {
                $uids2 = model('Users')->child_user($uid,2,0);
                $uids2 ? $where[] = ['u.id','in',$uids2] : $where[] = ['u.id','in',[-1]];
            }else if ($level == 3) {
                $uids3 = model('Users')->child_user($uid,3,0);
                $uids3 ? $where[] = ['u.id','in',$uids3] : $where[] = ['u.id','in',[-1]];
            }else if ($level == 4) {
                $uids4 = model('Users')->child_user($uid,4,0);
                $uids4 ? $where[] = ['u.id','in',$uids4] : $where[] = ['u.id','in',[-1]];
            }else if ($level == 5) {
                $uids5 = model('Users')->child_user($uid,5,0);
                $uids5 ? $where[] = ['u.id','in',$uids5] : $where[] = ['u.id','in',[-1]];
            }

            if(input('tel/s',''))$where[] = ['u.tel','like','%' . input('tel/s','') . '%'];
            if(input('username/s',''))$where[] = ['u.username','like','%' . input('username/s','') . '%'];
            if(input('addtime/s','')){
                $arr = explode(' - ',input('addtime/s',''));
                $where[] = ['u.addtime','between',[strtotime($arr[0]),strtotime($arr[1])]];
            }

            $count = $data = db('xy_users')->alias('u')->where($where)->count('id');
            $query = db('xy_users')->alias('u');
            $data = $query->field('u.id,u.tel,u.username,u.id_status,u.childs,u.ip,u.is_jia,u.addtime,u.invite_code,u.freeze_balance,u.status,u.balance,u1.username as parent_name')
                ->leftJoin('xy_users u1','u.parent_id=u1.id')
                ->where($where)
                ->order('u.id desc')
                ->limit($limit)
                ->select();

            if ($data) {
                //
                $uid1s = model('Users')->child_user($uid,1,0);
                $uid2s = model('Users')->child_user($uid,2,0);
                $uid3s = model('Users')->child_user($uid,3,0);
                $uid4s = model('Users')->child_user($uid,4,0);
                $uid5s = model('Users')->child_user($uid,5,0);

                foreach ($data as &$datum) {
                    //佣金
                    $datum['yj'] = db('xy_convey')->where('status',1)->where('uid',$datum['id'])->sum('num');
                    $datum['cz'] = db('xy_recharge')->where('status',2)->where('uid',$datum['id'])->sum('num');
                    $datum['tx'] = db('xy_deposit')->where('status',2)->where('uid',$datum['id'])->sum('num');
                    $datum['addtime'] = date('Y/m/d H:i', $datum['addtime']);;
                    $datum['jb'] = '三级';
                    $color = '#92c7ef';


                    if (in_array($datum['id'],$uid1s)  ){
                        $datum['jb'] = '一级';
                        $color = '#1E9FFF';
                    }
                    if (in_array($datum['id'],$uid2s)  ){
                        $datum['jb'] = '二级';
                        $color = '#2b9aec';
                    }
                    if (in_array($datum['id'],$uid3s)  ){
                        $datum['jb'] = '三级';
                        $color = '#1E9FFF';
                    }
                    if (in_array($datum['id'],$uid4s)  ){
                        $datum['jb'] = '四级';
                        $color = '#76c0f7';
                    }
                    if (in_array($datum['id'],$uid5s)  ){
                        $datum['jb'] = '五级';
                        $color = '#92c7ef';
                    }

                    $datum['jb'] = '<span class="layui-btn layui-btn-xs layui-btn-danger" style="background: '.$color.'">'.$datum['jb'].'</span>';
                }
            }
            //var_dump($page,$limit);die;

            if(!$data) json(['code'=>1,'info'=>'暂无数据']);
            return json(['code'=>0,'count'=>$count,'info'=>'请求成功','data'=>$data,'other'=>$limit]);
        }else{
            //
            $this->uid = $uid;
            $this->uinfo = db('xy_users')->find($uid);

        }



        return $this->fetch();
    }


    /**
     * 封禁/解封会员
     * @auth true
     */
    public function open()
    {
        $uid = input('post.id/d',0);
        $status = input('post.status/d',0);
        $type = input('post.type/d',0);
        $info=[];
        if ($uid) {
            if (!$type) {
                $status2 = $status ? 0 : 1;
                $res = db('xy_users')->where('id',$uid)->update(['status'=>$status2]);
                return json(['code'=>1,'info'=>'请求成功','data'=>$info]);
            }else{
                //

                $wher  =[] ;
                $wher2 =[] ;


                $ids1 = db('xy_users')->where('parent_id', $uid)->field('id')->column('id');
                $ids1 ? $wher[] = ['parent_id','in',$ids1] : '';

                $ids2 = db('xy_users')->where($wher)->field('id')->column('id');
                $ids2 ? $wher2[] = ['parent_id','in',$ids2] :'';

                $ids3 = db('xy_users')->where($wher2)->field('id')->column('id');

                $idsAll = array_merge([$uid],$ids1,$ids2 ,$ids3);  //所有ids
                $idsAll = array_filter($idsAll);

                $wherAll[]= ['id','in',$idsAll];
                $users = db('xy_users')->where($wherAll)->field('id')->select();

                //var_dump($users);die;
                $status2 = $status ? 0 : 1;
                foreach ($users as $item) {
                    $res = db('xy_users')->where('id',$item['id'])->update(['status'=>$status2]);
                }

                return json(['code'=>1,'info'=>'请求成功','data'=>$info]);
            }


        }

        return json(['code'=>1,'info'=>'暂无数据']);
    }


    //查看图片
    public function picinfo(){
        $this->pic = input('get.pic/s','');
        if(!$this->pic)return;
        $this->fetch();
    }

    /**
     * 客服管理
     * @auth true
     * @menu true
     */
    public function cs_list()
    {
        $this->title = '客服列表';
        $where = [];
        if(input('tel/s',''))$where[] = ['tel','like','%' . input('tel/s','') . '%'];
        if(input('username/s',''))$where[] = ['username','like','%' . input('username/s','') . '%'];
        if(input('addtime/s','')){
            $arr = explode(' - ',input('addtime/s',''));
            $where[] = ['addtime','between',[strtotime($arr[0]),strtotime($arr[1])]];
        }
        $this->_query('xy_cs')
            ->where($where)
            ->page();
    }

    /**
     * 添加客服
     * @auth true
     * @menu true
     */
    public function add_cs()
    {
        if(request()->isPost()){
            $this->applyCsrfToken();
            $username = input('post.username/s','');
            $tel = input('post.tel/s','');
            $pwd = input('post.pwd/s','');
            $qq = input('post.qq/d',0);
            $wechat = input('post.wechat/s','');
            $url = input('post.url/s','');
            $qr_code = input('post.qr_code/s','');
            $time = input('post.time');
            $arr = explode('-', $time);
            $btime = substr($arr[0],0,5);
            $etime = substr($arr[1],1,5);
            $data = [
                'username'  => $username,
                'tel'       => $tel,
                'pwd'       => $pwd,    //需求不明确，暂时以明文存储密码数据
                'qq'        => $qq,
                'url'    => $url,
                'wechat'    => $wechat,
                'qr_code'   => $qr_code,
                'btime'     => $btime,
                'etime'     => $etime,
                'addtime'   => time(),
            ];
            $res = db('xy_cs')->insert($data);
            if($res) return $this->success('添加成功');
            return $this->error('添加失败，请刷新再试');
        }
        return $this->fetch();
    }

    /**
     * 客服登录状态
     * @auth true
     */
    public function edit_cs_status()
    {
        $this->applyCsrfToken();
        $this->_save('xy_cs', ['status' => input('post.status/d',1)]);
    }

    /**
     * 编辑客服信息
     * @auth true
     * @menu true
     */
    public function edit_cs()
    {
        if(request()->isPost()){
            $this->applyCsrfToken();
            $id = input('post.id/d',0);
            $username = input('post.username/s','');
            $tel = input('post.tel/s','');
            $pwd = input('post.pwd/s','');
            $qq = input('post.qq/d',0);
            $wechat = input('post.wechat/s','');
            $url = input('post.url/s','');
            $qr_code = input('post.qr_code/s','');
            $time = input('post.time');
            $arr = explode('-', $time);
            $btime = substr($arr[0],0,5);
            $etime = substr($arr[1],1,5);
            $data = [
                'username'  => $username,
                'tel'       => $tel,
                'qq'        => $qq,
                'url'       => $url,
                'wechat'    => $wechat,
                'qr_code'   => $qr_code,
                'btime'     => $btime,
                'etime'     => $etime,
            ];
            if($pwd) $data['pwd'] = $pwd;
            $res = db('xy_cs')->where('id',$id)->update($data);
            if($res!==false) return $this->success('编辑成功');
            return $this->error('编辑失败，请刷新再试');
        }
        $id = input('id/d',0);
        $this->list = db('xy_cs')->find($id);
        return $this->fetch();
    }

    /**
     * 客服调用代码
     * @auth true
     * @menu true
     */
    public function cs_code()
    {
        if(request()->isPost()){
            $this->applyCsrfToken();
            $code = input('post.code');
            $res = db('xy_script')->where('id',1)->update(['script'=>$code]);
            if($res!==false){
                $this->success('操作成功!');
            }
            $this->error('操作失败!');
        }
        $this->code = db('xy_script')->where('id',1)->value('script');
        return $this->fetch();
    }

    /**
     * 编辑银行卡信息
     * @auth true
     * @menu true
     */
    public function edit_users_bk()
    {
        if(request()->isPost()){
            $this->applyCsrfToken();
            $id = input('post.id/d',0);
            $tel = input('post.tel/s','');
            $site = input('post.site/s','');
            $cardnum = input('post.cardnum/s','');
            $bankname = input('post.bankname/s','');
            $username = input('post.username/s','');
            $res = db('xy_bankinfo')->where('id',$id)->update(['tel'=>$tel,'site'=>$site,'cardnum'=>$cardnum,'username'=>$username,'bankname'=>$bankname]);
            if($res!==false){
                return $this->success('操作成功');
            }else{
                return $this->error('操作失败');
            }
        }
        $this->bk_info = Db::name('xy_bankinfo')->where('uid',input('id/d',0))->select();
        if(!$this->bk_info) $this->error('没有数据');
        return $this->fetch();
    }



    /**
     * 编辑会员等级
     * @auth true
     * @menu true
     */
    public function edit_users_level()
    {
        if(request()->isPost()){
            $this->applyCsrfToken();
            $id    = input('post.id/d',0);
            $name  = input('post.name/s','');
            $level = input('post.level/d',0);
            $num   = input('post.num/s','');
            $order_num   = input('post.order_num/s','');
            $bili   = input('post.bili/s','');
            $tixian_ci   = input('post.tixian_ci/s','');
            $tixian_min   = input('post.tixian_min/s','');
            $tixian_max   = input('post.tixian_max/s','');
            $auto_vip_xu_num   = input('post.auto_vip_xu_num/s','');
            $num_min   = input('post.num_min/s','');
            $tixian_nim_order   = input('post.tixian_nim_order/d',0);
            $tixian_shouxu   = input('post.tixian_shouxu/f',0);
            $is_credit = input('post.is_credit/s');
            $fudan_order_num = input('post.fudan_order_num/d');
            $arrears_times=input('post.arrears_times/d');
            $fudan_bili = input('post.fudan_bili/f');


            $cate = Db::name('xy_goods_cate')->select();

            $cids = [];
            foreach ($cate as $item) {
                $k = 'cids'.$item['id'];
                if (isset($_REQUEST[$k]) && $_REQUEST[$k]=='on') {
                    $cids[]= $item['id'];
                }
            }

            $cidsstr = implode(',',$cids);
            //var_dump($cidsstr);die;

            $res = db('xy_level')->where('id',$id)->update(
                [
                    'name' => $name,
                    'level'=> $level,
                    'num'  => $num,
                    'order_num'=>$order_num,
                    'bili'=>$bili,
                    'tixian_ci'=>$tixian_ci,
                    'tixian_min'=>$tixian_min,
                    'tixian_max'=>$tixian_max,
                    'num_min'=>$num_min,
                    'cids' => $cidsstr,
                    'tixian_nim_order' => $tixian_nim_order,
                    'auto_vip_xu_num' => $auto_vip_xu_num,
                    'tixian_shouxu' => $tixian_shouxu,
                    'is_credit'=>$is_credit,
                    'fudan_order_num'=>$fudan_order_num,
                    'arrears_times'=>$arrears_times,
                    'fudan_bili'=>$fudan_bili,

                ]);
            if($res!==false){
                return $this->success('操作成功');
            }else{
                return $this->error('操作失败');
            }
        }
        $this->bk_info = Db::name('xy_level')->where('id',input('id/d',0))->select();
        $this->cate = Db::name('xy_goods_cate')->select();
        if(!$this->bk_info) $this->error('没有数据');
        return $this->fetch();
    }

}