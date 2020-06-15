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
 * 应用入口
 * Class Index
 * @package app\index\controller
 */
class Index extends Base
{
    /**
     * 入口跳转链接
     */
    public function index()
    {
        $this->redirect('home');
    }


    public function home()
    {
        $this->info = Db::name('xy_index_msg')->field('content')->select();
        $this->uinfo = Db::name('xy_users')->find(session('user_id'));
        $this->banner = Db::name('xy_banner')->select();
        $this->notice = db('xy_index_msg')->where('id',6)->find();
        $this->assign('pic','/upload/qrcode/user/'.(session('user_id')%20).'/'.session('user_id').'-1.png');
        $this->cate = db('xy_goods_cate')->order('id asc')->select();
        return $this->fetch();
    }

    //获取首页图文
    public function get_msg()
    {
        $type = input('post.type/d',1);
        $data = Db::name('xy_index_msg')->find($type);
        if($data)
            return json(['code'=>0,'info'=>'请求成功','data'=>$data]);
        else
            return json(['code'=>1,'info'=>'暂无数据']);
    }




    //获取首页图文
    public function getTongji()
    {
        $type = input('post.type/d',1);
        $data = array();

        $data['user'] = db('xy_users')->where('status',1)->where('addtime','between',[strtotime(date('Y-m-d'))-24*3600,time()])->count('id');
        $data['goods'] = db('xy_goods_list')->count('id');;
        $data['price'] = db('xy_convey')->where('status',1)->where('endtime','between',[strtotime(date('Y-m-d')),time()])->sum('num');
        $user_order = db('xy_convey')->where('status',1)->where('addtime','between',[strtotime(date('Y-m-d')),time()])->count('id');
        $data['num'] = $user_order;

        if($data){
            return json(['code'=>0,'info'=>'请求成功','data'=>$data]);
        } else {
            return json(['code' => 1, 'info' => '暂无数据']);
        }
    }

    public function getInfo() {
        dump(1);die;
        $uinfo = model('admin/users')->infoById(session('user_id'));
        dump($uinfo);die;
        if($uinfo){
            return json(['code'=>0,'info'=>'请求成功','data'=>$uinfo]);
        } else {
            return json(['code' => 1, 'info' => '暂无数据']);
        }
    }

    function getDanmu()
    {
        $barrages=    //弹幕内容
            array(
                array(
                    'info'   => '用户173***4985开通会员成功',
                    'href'   => '',

                ),
                array(
                    'info'   => '用户136***1524开通会员成功',
                    'href'   => '',
                    'color'  =>  '#ff6600'

                ),
                array(
                    'info'   => '用户139***7878开通会员成功',
                    'href'   => '',
                    'bottom' => 450 ,
                ),
                array(
                    'info'   => '用户159***7888开通会员成功',
                    'href'   => '',
                    'close'  =>false,

                ),array(
                'info'   => '用户151***7799开通会员成功',
                'href'   => '',

                )
            );

        echo   json_encode($barrages);
    }

}
