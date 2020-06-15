<?php /*a:2:{s:69:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\index\home.html";i:1591696486;s:71:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\public\floor.html";i:1591612976;}*/ ?>
<html><head><meta charset="utf-8"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><title>首页</title><link rel="stylesheet" href="/public/css/swiper.min.css"><link rel="stylesheet" href="/public/css/style.css"><link href="http://www.sc.com/statics/css/index_style.css" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="http://www.sc.com/statics/css/hui.css"><link rel="stylesheet" type="text/css" href="/tpl/Public/js/barrager/css/barrager.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/common.js"></script><script src="/tpl/Public/js/barrager/js/jquery.barrager.js"></script><script src="/static/plugs/layui/layui.all.js"></script><style type="text/css">
        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
				html{
					margin: 0 auto;
				}
				.container{
					padding: 40px 12px;
					background-position: center;
					background-repeat: no-repeat;
					background-size: contain;
					margin-top: 0;
					padding-bottom: 5px;
					border-radius: 12px;
					overflow: hidden;
				}
        .swiper-container {
            height: 9rem;
						border-radius: 12px;
						overflow: hidden;
        }
				
        .swiper-pagination-bullet {
            width: .25rem;
            height: .25rem;
            background: white;
            opacity: 1;
        }

        .swiper-pagination-bullet.swiper-pagination-bullet-active {
            background: rgb(255, 210, 2);
        }

        .flex_container {
            margin: .6rem;
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            padding: 0 1rem;
            font-size: .7rem;
            text-align: center;
						color: #323232;
        }
				.flex_container p{
					margin-top: 8px;
						color: #323232;
				}
        .icon_cont {
            width: 2.5rem;
            height: 2.5rem;
            /*background: red;*/
            border-radius: 50%;
            margin: auto;
            display: flex;
            padding: 10px;
        }

        .tab_nav {
            height: 2rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            border-top: 1px solid #f7f7f7;
            border-bottom: 1px solid #f7f7f7;
            padding: 0 .5rem;
        }

        .tab_nav li {
            margin: auto 0;
            height: 1.9rem;
            line-height: 1.9rem;
        }

        .tab_nav li.nav_active {
            position: relative;
            color: #00bcd4;
            border-bottom: 2px solid #00bcd4;
        }

        .icon_cont > i {
            display: block;
            width: 1.4rem;
            height: 1.4rem;
            margin: auto;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .flex_container .flex_item:nth-child(1) .icon_cont > i {
            background-image: url(/public/img/cz1.png);
        }

        .flex_container .flex_item:nth-child(2) .icon_cont > i {
            background-image: url(/public/img/xx.png);
        }

        .flex_container .flex_item:nth-child(3) .icon_cont > i {
            background-image: url(/public/img/kf.png);
        }

        .flex_container .flex_item:nth-child(4) .icon_cont > i {
            background-image: url(/public/img/sz.png);
        }

        .tab_cont > div {
            display: none;
        }

        .goQiangDan .hui-media-content em {
            position: relative;
            top: -10px;
            right: -80px;
        }

        .hui-media-list li {
						min-height: 100px;
            max-height: 150px;
            padding: 5px;
        }

        .hui-media-list img {
            width: 90%
        }


        .hui-media-list li:nth-child(4n+4) {
            background-image: linear-gradient(45deg, #989CCF, #175ADB);
            color: black;
            box-shadow: 0 3px 12px #717AC0;
        }

        /*弹窗*/
        .pop-background {
            position: fixed;
            left: 0px;
            bottom: 0px;
            right: 0px;
            top: 0px;
            z-index: 999999;
            background: rgba(0, 0, 0, 0.5);
        }

        .flex {
            width: 100%;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            align-content: center;
            flex-wrap: nowrap;
        }

        .fw {
            flex-wrap: wrap;
        }

        .ggnotice {
            width: 70%;
            max-width: 400px;
            height: auto;
            min-height: 220px;
            align-items: flex-start;
            align-content: flex-start;
            position: relative;
            background: linear-gradient(rgb(255, 255, 255), rgb(255, 239, 230));
            border-radius: 4%;
        }

        .ggnotice-img {
            width: 100%;
            transform: translateY(-19.6%);
        }

        .ggnotice-html {
            width: 90%;
            min-height: 100px;
            color: rgb(53, 53, 53);
            line-height: 24px;
            font-size: 14px;
            margin-top: -20px;
            padding: 10px 5%;
        }

        .close-img {
            position: absolute;
            width: 32px;
            height: 32px;
            bottom: 0px;
            left: 50%;
            transform: translate(-50%, 150%);
        }

        .page_index_ckxxnr {
            display: block;
            width: 100%;
            height: 2.5rem;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            line-height: 2.5rem;
            bottom: 0px;
            color: rgb(165, 32, 250);
        }

        /**/
        .row .col {
            float: left;
            box-sizing: border-box;
        }

        .row .col.s6 {
            width: 49%;
            margin-left: auto;
            left: auto;
            right: auto;
						padding: 12px!important;
        }

        .row .col.s8 {
            /* width: 66.6666666667%; */
            margin-left: auto;
            left: auto;
            right: auto;
        }

        .chart-child .s8 p span {
            font-size: 13px;
						color: #fff;
        }
				.chart-child .s8 p span span{
					font-size: 15px;
						color: #fff;
				}

        /*首页项目统计*/
        .home-chart h3 {
            font-size: 18px;
        }

        .chart-child {
            height: 70px;
            /*background: linear-gradient(90deg, #8570d8 30%, #fff);*/
            /*-webkit-border-radius: 5px;*/
            /*-moz-border-radius: 5px;*/
            border-radius: 5px;
            padding: 5px !important;
            background-repeat:no-repeat;
            background-size:100% 100%;
            -moz-background-size:100% 100%;
        }


        .chart-child:nth-of-type(2) {
            background: linear-gradient(90deg, #f7718e 30%, #fff);
						background-repeat:no-repeat;
						background-size:100% 100%;
						-moz-background-size:100% 100%;
            margin-bottom: 10px;
        }

        .chart-child:nth-of-type(3) {
            background: linear-gradient(90deg, #54d5e2 30%, #fff);
						background-repeat:no-repeat;
						background-size:100% 100%;
						-moz-background-size:100% 100%;
        }

        .chart-child:nth-of-type(4) {
            background: linear-gradient(90deg, #38f 30%, #fff);
						background-repeat:no-repeat;
						background-size:100% 100%;
						-moz-background-size:100% 100%;
        }

        .chart-child .s8, .chart-child h3 {
            color: #fff;
        }

        .chart-child .s8>span {
            font-size: 15px;
            color: #fff;
        }
				.chart-child .s8>span+span{
					font-size: 13px;
					margin-left: 10px;
				}
        .chart-child .s8 p {
            font-size: 12px;
            margin: 0;
            color: #fff;
						margin-bottom: 10px;
        }

        .chart-child .s4 img {
            width: 40px;
            height: 40px;
            margin-top: 9px;
            border-radius: 50%;
        }

        .chart-child .s8, .chart-child h3 {
            color: #fff !important;
        }
        .hui-media-list ul li a,.icon_cont{
            background-repeat:no-repeat;
            background-size:100% 100%;
            -moz-background-size:100% 100%;
        }
        .chart-child1{
            margin-right: 1%!important;
        }
        .chart-child2{
            margin-left: 1%!important;
        }
        .hot{
            padding: 0!important;
            box-shadow:0 0 0 !important;
            background-color: #ffffff!important;
            background-image: none!important;
            color: #ffffff!important;
        }
        /*首页项目统计*/
				.hui-media-content{
					width: 70%;
				}
				.dis_flex{
					display: -webkit-box;  /* 老版本语法: Safari, iOS, Android browser, older WebKit browsers. */
					display: -moz-box;     /* 老版本语法: Firefox (buggy) */
					display: -ms-flexbox;  /* 混合版本语法: IE 10 */
					display: -webkit-flex; /* 新版本语法: Chrome 21+ */
					display: flex;         /* 新版本语法: Opera 12.1, Firefox 22+ */
				}
				.flex_w{
				    flex-wrap: wrap;
				}
				.ju_c{
					justify-content: center;
				}
				.ju_b{
					justify-content: space-between;
				}
				.fd_c{
					flex-direction: column;
				}
				.ju_a{
					justify-content: space-around;
				}
				.aic{
					align-items: center;
				}
				.flex_1{
					flex: 1;
					-webkit-flex: 1;
					-ms-flex: 1;
				}
				.index_yj{
					padding-right: 10px;
				}
				.index_yj span{
					font-size: 13px;
					color: #000;
					margin: 2px auto;
				}
				header{
					background: #0035A0;
				}
				.hui-wrap{
					background: #fff;
				}
				.index_marqueen{
					box-shadow:0px 1px 9px 0px rgba(159,159,159,0.71);border-radius:30px;
				}
    </style></head><body><header><span>首页</span></header><div class="pop-background flex" id="myModal" style="top: -4000px;"><div class="ggnotice flex fw" style="max-height:300px"><img src="/public/img/topnotice.png" class="ggnotice-img"
             style="height:100%;width:100%;max-width: 100%;max-height: 100%;max-height:100px"><div class="ggnotice-html"><p style="margin-left:0cm; margin-right:0cm; text-align:center"><span
                style="font-size:12pt"><span style="font-family:宋体"><strong><span style="font-size:13.5pt"><span
                class="modelTitle" style="font-family:宋体"><?php echo htmlentities($notice['title']); ?></span></span></strong></span></span></p><p style="font-size:12px"><?php

                    echo substr(strip_tags($notice['content']),0,200);

                ?></p><p><a class="page_index_ckxxnr" href="/index/support/detail/6.html?id=6">查看详细内容 </a></p></div><img src="/public/img/close_notice.png" class="close-img"></div></div><div class="hui-wrap"><div class="container" style="background-image:url('http://www.sc.com/public/img/index/index_bg.png');"><!-- 轮播图 --><div class="swiper-container "><div class="swiper-wrapper "><?php if($banner): if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><a href="<?php echo htmlentities($vo['url']); ?>"><img src="<?php echo htmlentities($vo['image']); ?>" alt="/public/img/bg.jpg"></a></div><?php endforeach; endif; else: echo "" ;endif; else: ?><?php endif; ?></div><div class="swiper-pagination"></div></div></div><div style="background:#FFF; padding:0px 15px; margin:10px;" class="hui-flex index_marqueen"><div style="height:46px; width:20px;"><img src="http://www.sc.com/statics/img/spiker.png" width="20" style="padding:13px 0px;"></div><div class="hui-scroll-news" id="scrollnew1"><div class="hui-scroll-news-items hui-scroll-news-h0">恭喜用户181****8896获得佣金0.66元</div><div class="hui-scroll-news-items     ">恭喜用户131****8006获得佣金0.76元</div><div class="hui-scroll-news-items     ">恭喜用户181****8896获得佣金0.76元</div><div class="hui-scroll-news-items     ">恭喜用户181****8000获得佣金0.76元</div><div class="hui-scroll-news-items     ">恭喜用户151****8570获得佣金0.76元</div><div class="hui-scroll-news-items     ">恭喜用户181****8409获得佣金0.76元</div></div></div><div class="flex_container"><div class="flex_item" id="cz" onclick="location.href=`<?php echo url('ctrl/recharge_before'); ?>`"><div class="icon_cont" style="background-image:url('http://www.sc.com/public/img/index/chongzhi.png');"></div><p>充值</p></div><div class="flex_item" id="info" onclick="location.href=`<?php echo url('my/msg'); ?>`"><div class="icon_cont" style="background-image:url('http://www.sc.com/public/img/index/tongzhi.png');"></div><p>我的消息</p></div><div class="flex_item" id="support" onclick="location.href=`<?php echo url('support/index'); ?>`"><div class="icon_cont" style="background-image:url('http://www.sc.com/public/img/index/kefu.png');"></div><p>在线客服</p></div><div class="flex_item" id="set" onclick="location.href=`<?php echo url('ctrl/set'); ?>`"><div class="icon_cont" style="background-image:url('http://www.sc.com/public/img/index/shezhi.png');"></div><p>设置</p></div></div><a style="padding: 10px;display: block" href="/index/ctrl/vip"><img src="/public/img/banner.png" alt="" width="100%" style="height: auto"></a><div class="b-seller segments home-chart" style="margin-top: 0px;display:block"><div class="container" style="padding:3%"><div class="row"><div class="col s6 chart-child chart-child1" style="background-image: url('http://www.sc.com/public/img/chart-child1.png')"><div class="col s8"><p><span>今日 <span>商品</span> 数</span></p><span id="taskCount">136</span><span>较昨日 <i class="fa fa-arrow-up"></i> 0.3%</span></div></div><div class="col s6 chart-child chart-child2" style="background-image: url('http://www.sc.com/public/img/chart-child2.png')"><div class="col s8 "><p><span>今日 <span>用户</span> 数</span></p><span id="memberCount">99</span><span>较昨日 <i class="fa fa-arrow-down"></i> 1.3%</span></div></div><div class="col s6 chart-child chart-child1" style="background-image: url('http://www.sc.com/public/img/chart-child3.png')"><div class="col s8 "><p><span>今日 <span>金额</span> 数</span></p><span id="moneyCount">10</span><span>较昨日 <i class="fa fa-arrow-down"></i> 0.05%</span></div></div><div class="col s6 chart-child chart-child2" style="background-image: url('http://www.sc.com/public/img/chart-child4.png')"><div class="col s8 "><p><span>今日 <span>成交</span> 数</span></p><span id="applyCount">96</span><span>较昨日 <i class="fa fa-arrow-up"></i> 0.01%</span></div></div><div style="clear: both"></div></div></div></div><div class="jq22-coll-title" style="padding-top:5px;"><h2>热门专区</h2></div><div class="hui-media-list" style="padding:11px;padding-top: 0"><ul><?php foreach($cate as $key=>$vo): ?><li class="hot"><a class="goQiangDan" data-id="1" data-price="<?php echo htmlentities($uinfo['balance']); ?>" data-min="<?php echo htmlentities($vo['min']); ?>" style="background-image: url('<?php echo htmlentities($vo['cate_pic']); ?>')"
                   onclick="return hoto(this)" href="<?php echo url('rot_order/index',array('type'=>1)); ?>?type=<?php echo htmlentities($vo['id']); ?>"><div class="hui-media-list-img"></div><div class="hui-media-content dis_flex fd_c ju_b"><div class="dis_flex aic ju_b" style="margin-top:10px"><p style="color:black;font-size: 1.4rem;"><?php echo htmlentities($vo['name']); ?></p><div class="dis_flex aic fd_c index_yj"><span>佣金:<?php echo htmlentities($vo['bili']*100); ?>%</span><span>可抢单数:<?php echo htmlentities($vo['bili']*100); ?></span></div></div><p style="margin-bottom: 10px;"><span style="color:black"><?php echo htmlentities($vo['cate_info']); ?></span></p><!-- <em>佣金:<?php echo htmlentities($vo['bili']*100); ?>%</em> --></div></a></li><?php endforeach; ?></ul></div></div><div class="hui-fooer-line"></div><style>
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
</script><script src="/statics/js/hui.js" type="text/javascript" charset="utf-8"></script><script type="text/javascript">
    hui.scrollNews(scrollnew1);
    // hui.scrollNews(scrollnew2, 8000);
</script><script type="text/javascript">
    // 点击切换函数可以根据实际业务需求编写业务代码
    function changeDom(index) {
        index--;
        var html = ['1122', '平台会员抢单佣金根据不同的平台入驻有所差别.订单金额为平台随机默认您的账户余额的百分之十到百分之七十之间生成订单,每个账户每天限制60个订单', '平台用户可以通过推荐新人成为平台的代理,代理可以获得额外的动态奖励,直推一级用户奖励为一级用户每天所得佣金的16%,二级用户奖励为二级用户每天所得佣金的8%,详情可在APP内直接咨询在线客服', '问题',];
        hui('#domsIn').html(html[index] + '.');
        hui('#cate a').eq(index).addClass('hui-segment-active').siblings().removeClass('hui-segment-active');
    }

    function hoto(obj) {
        var price = $(obj).data('price');
        var min = $(obj).data('min');
        var cid = $(obj).data('cid');

        if (price < min) {
            alert('您的余额不足,无法进入当前模块进行抢单');
            return false;
        }
    }
</script><script src="/public/js/swiper.min.js"></script><script type="text/javascript" src="/statics/js/jquery.flexslider-min.js"></script><script type="text/javascript">
    $(document).ready(function () {
        $('.flexslider').flexslider({
            directionNav: true,
            pauseOnAction: false
        });
    });

    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: true,
        pagination: {
            el: '.swiper-pagination',
        }
    })
</script><script>
    // 获取弹窗
    var modal = document.getElementById('myModal');

    $(document).ready(function () {
        console.log($('.modelTitle').text())
        if (getCookie('notice') == '23' || $('.modelTitle').text() == "") {
            modal.style.display = "none";
        } else {
            modal.style.top = "0";
        }
    });


    // 获取 <span> 元素，用于关闭弹窗 that closes the modal
    var span = document.getElementsByClassName("close-img")[0];

    // 点击 <span> (x), 关闭弹窗
    span.onclick = function () {
        modal.style.display = "none";
        setCookie('notice', 23);
    };

    // 在用户点击其他地方时，关闭弹窗
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            setCookie('notice', 23);
        }
    }

    function setCookie(name, value) {
        var mins = 60;
        var exp = new Date();
        exp.setTime(exp.getTime() + mins * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
    }

    function getCookie(name) {
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        if (arr = document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }
    $('#hui-footer a').eq(0).addClass("floor-active");
</script><script>
    var show_dm = "<?php echo config('show_dm'); ?>";
    var cHeight = $(window).height();
    $(function () {
        if (show_dm == 'on') {
            startBarrager();
        }


        //
        //
        //边缘弹出
//        layer.open({
//            type: 1
//            ,offset: 'rb' //具体配置参考：offset参数项
//            ,content: '<a href="https://cloud.tencent.com/act/cps/redirect?fromSource=gwzcw.3199892.3199892.3199892&redirect=10488&cps_key=89ebb78847d920179734a81ce37a2dda&from=activity"><div style="padding: 20px 10px;">腾讯云服务器1H2G 99/年,抓紧上车      </div></a>'
//            ,btn: ['火速围观']
//            ,area: ['180px', '180px']
//            ,btnAlign: 'c' //按钮居中
//            ,shade: 0 //不显示遮罩
//            ,yes: function(){
//                layer.closeAll();
//            }
//        });
        //-----------------------------------------------------
    });


    /**
     * @ 说明 弹幕消息
     * @ user fang 1044766678@qq.com
     * @type {number}
     */
    function startBarrager() {

        $.ajaxSettings.async = false;
        $.getJSON("/index/Index/getDanmu", function (data) {

            //每条弹幕发送间隔
            var looper_time = 3 * 1000;
            var items = data;

            //弹幕总数
            var total = data.length;
            //是否首次执行
            var run_once = true;
            //弹幕索引
            var index = 0;
            //先执行一次
            barrager();

            function barrager() {
                if (run_once) {
                    //如果是首次执行,则设置一个定时器,并且把首次执行置为false
                    looper = setInterval(barrager, looper_time);
                    run_once = false;
                }
                //发布一个弹幕

                items[index].bottom = getRandom(cHeight - 250, cHeight - 40);
                $('body').barrager(items[index]);
                //索引自增
                index++;
                //所有弹幕发布完毕，清除计时器。
                if (index == total) {
                    clearInterval(looper);
                    return false;
                }
            }
        });
    }

    function getRandom(iStart, iEnd) {
        var iChoice = iStart - iEnd + 1;
        return Math.abs(Math.floor(Math.random() * iChoice)) + iStart;
    }
</script></body></html>
