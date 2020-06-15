<?php /*a:2:{s:72:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\support\index.html";i:1591692775;s:71:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\public\floor.html";i:1591612976;}*/ ?>
<html><head><meta charset="utf-8"><meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable = 0"><title>客服</title><link rel="stylesheet" type="text/css" href="http://www.sc.com/statics/css/hui.css"><link href="http://www.sc.com/statics/css/userstyle.css" rel="stylesheet" type="text/css"><script src="/static/plugs/jquery/jquery.min.js"></script><link href="http://www.sc.com/statics/css/base.css" rel="stylesheet"><link href="http://www.sc.com/statics/css/user.css" rel="stylesheet"><script src="/public/js/common.js"></script><style>
        .btn{width: 50%;
            line-height: 1.4rem;
            font-size: .56rem;
            color: #fff;
            text-align: center;
            background-color: #0035A0;
            border-radius: .7rem;
            display: block;
            margin: 0 auto 20px;}
        .kfcon{
            padding: 7px;
            border-radius: 5px;
            background-color: #fff1c9;
            color: #ff8405;
            width: 100%;
            text-align: center;
            border: 0.5px solid #ffde7e;
        }
        .transfer-save{ width: 100%;
            overflow: hidden;
            /* position: absolute; */
            /* background-color: #7669fd; */
            left: 0;
            bottom: .5rem;}

        .jq22-coll-title h2 {
            position: relative;
            font-size: 15px;
            font-weight: normal;
            color: #0035A0;
            padding-left: 0.5rem;
        }
        .jq22-coll-title h2:after {
            content: '';
            position: absolute;
            z-index: 0;
            top: 3px;
            left: 0;
            width: 3px;
            height: 15px;
            background: #0035A0;
            border-radius: 5px;
        }
        .jq22-coll-title {
            padding: 15px;
        }
				header{
					    background: #0035A0!important;
				}
    </style></head><body><header class="header"><div class="header-return"><a href="javascript:history.go(-1);"></a></div><div class="logo" style="color: #fff">客服</div></header><section class="container" style="padding-bottom: 80px"><div class="no-content" style="padding:1rem;padding-bottom: 5px;"><div style="float: left;width: 50%;"><img class="" src="http://www.sc.com/public/img/kefu-mm.png" alt="" style="margin-left:10%;width: 80%;"></div><div><div class="transfer-save" style="width: 50%;"><?php foreach($list as $key=>$vo): ?><a href="https://kefu.ziyun.com.cn/vclient/chat/?websiteid=164862&wc=a1e007" class="btn" style="" id="lxkf">联系客服</a><?php endforeach; ?></div></div></div><div class="jq22-coll-title"><h2>帮助文档</h2></div><div class="article-box"><?php foreach($msg as $key=>$vo): ?><a href="<?php echo url('detail',array('id'=>$vo['id'])); ?>?id=<?php echo htmlentities($vo['id']); ?>" class="article-list"><h3><?php echo htmlentities($vo['title']); ?></h3><p><?php  echo date('Y-m-d H:i:s', $vo['addtime']);  ?></p><em class="remind"></em></a><?php endforeach; ?><!--<a href="" class="article-list">--><!--<h3>平台简介</h3>--><!--<p>2019-12-5 20:51:42</p>--><!--<em class="remind"></em>--><!--</a>--><!--<a href="" class="article-list">--><!--<h3>规则说明</h3>--><!--<p>2019-12-7 11:16:52</p>--><!--<em class="remind"></em>--><!--</a>--><!--<a href="" class="article-list">--><!--<h3>合作代理</h3>--><!--<p>2019-12-7 11:22:12</p>--><!--</a>--><!--<a href="" class="article-list">--><!--<h3>常见问题</h3>--><!--<p>2019-12-7 11:40:32</p>--><!--</a>--><input type="hidden" name="kefu" value=""></div></section><style>
    @font-face {
        font-family: "iconfont";
        src: url('//at.alicdn.com/t/font_1463191_xdm42ti8gyp.eot?t=1571290693237');
        /* IE9 */
        src: url('//at.alicdn.com/t/font_1463191_xdm42ti8gyp.eot?t=1571290693237#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('data:application/x-font-woff2;charset=utf-8;base64,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') format('woff2'), url('//at.alicdn.com/t/font_1463191_xdm42ti8gyp.woff?t=1571290693237') format('woff'), url('//at.alicdn.com/t/font_1463191_xdm42ti8gyp.ttf?t=1571290693237') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+ */ url('//at.alicdn.com/t/font_1463191_xdm42ti8gyp.svg?t=1571290693237#iconfont') format('svg');
        /* iOS 4.1- */
    }

    .iconfont {
        font-family: "iconfont" !important;
        font-size: 18px;
        font-style: normal;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    #footer-logo{
        text-align: center;
        text-align: -webkit-center;

    }

    .icon-dianji:before {
        content: "\e600";
    }

    .icon-shouye:before {
        content: "\e615";
    }

    .icon-tubiao-:before {
        content: "\e64f";
    }

    .icon-weibiaoti-:before {
        content: "\e614";
    }

    .icon-dingdan-yichenggong:before {
        content: "\e68d";
    }
    .hui-footer-text{padding-top:0}
    .floor-active div{color:#8c1bab}
</style><div id="hui-footer" style="height:50px;padding:2px 0;"><a href="<?php echo url('index/home'); ?>" id="nav-home" class=""><div class=" mui-active"></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://www.sc.com/public/img/home.png"/></div><div class="hui-footer-text">首页</div></a><a href="<?php echo url('order/index'); ?>" id="nav-news"><div class=""></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://www.sc.com/public/img/jilu.png"/></div><div class="hui-footer-text">记录</div></a><div style="width:20%; text-align:center;">
        &nbsp;
    </div><a href="<?php echo url('support/index'); ?>" id="nav-forum" ><div class=""></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://www.sc.com/public/img/kefu-b.png"/></div><div class="hui-footer-text">客服</div></a><a href="<?php echo url('my/index'); ?>" id="nav-my"><div class=""></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://www.sc.com/public/img/my.png"/></div><div class="hui-footer-text">我的</div></a></div><a href="<?php echo url('rot_order/index',array('type'=>1)); ?>" id="footer-logo"><div id="footer-logo2" style="height: 54px;"><img src="http://www.sc.com/public/img/home-.png" style="height: 40px;width:40%;margin-top:10px"></div></a><script src="/public/js/common.js"></script><script>
    $(".floor li").click(function(){
        $(this).addClass('floor-active').siblings().removeClass('floor-active')
    })
</script><script type="text/javascript">
    $(function() {
        $('#hui-footer a').eq(2).addClass("floor-active")
    })

</script></body></html>