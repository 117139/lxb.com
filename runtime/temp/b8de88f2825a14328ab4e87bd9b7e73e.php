<?php /*a:2:{s:64:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\my\index.html";i:1591863392;s:68:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\public\floor.html";i:1591612976;}*/ ?>
<html lang="en"><head><meta charset="UTF-8"><title>个人中心</title><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" type="text/css" href="http://lxb.com/statics/css/hui.css"><link href="http://lxb.com/statics/css/userstyle.css" rel="stylesheet" type="text/css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/static/plugs/layui/layui.all.js"></script><script src="/static/plugs/require/require.js"></script><script src="/static/admin.js"></script><script src="/public/js/common.js"></script><style type="text/css">
				header{
					
						background: #0035A0!important;
				}
        body{font-size: 13px}
        .aui-palace a{

            margin-bottom:2rem;

        }
        .aui-take-head{
					height:140px}
				.aui-take-head,.user_index_top {
					background: #0035A0!important;
				}


        .wrap-flex-row {
            display: flex;
            display: -webkit-flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .mytool .openvip {
            position: relative;
            width: 48%;
            background: #fcd66b;
            background: linear-gradient(90deg,#ffe8bf,#fcd66b);
            color: #bf9955;
            border-radius: 2vw;
            margin: 3vw 0;
        }
        .mytool .text {
             margin: 5vw 3vw;  font-size: 12px;
         }
        .mytool .text span {
             font-size: 12px;
         }
        .mytool .sharefriend {
            position: relative;
            width: 48%;
            background: #fcd66b;
            background: linear-gradient(90deg,#cddcff,#5f97fc);
            color: #5a92d1;
            border-radius: 2vw;
            margin: 3vw 0;
        }
        .mytool .corner {
            position: absolute;
            right: 0;
            bottom: 0;
            height: 8vw;
            width:auto;
        }
        .aui-flex-three{padding: 1.0rem;margin-bottom: 0}

        *{font-size: 12px}
        .aui-palace-grid-text h2{font-size: 12px}
        .aui-take-button button{font-size: 12px;padding:5px 10px;background: #FFFFFF;color: #0035A0;line-height: 20px;}
        .aui-palace-grid{width:25%}



        .user_index_top .usermes{
            width:92%;
            border-top: 16px solid #f4f4f4;
            background: #fff;
            padding:12px;
						-webkit-box-sizing: border-box;
						-moz-box-sizing: border-box;
						box-sizing: border-box;
            margin:0px auto;
            top: 25px;
            border-radius: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .user_index_top .usermes .u-data-g{
            color:#795611;
        }
        .user_index_top .usermes .mesBox{
            text-align: center;
        }
        .user_index_top .usermes .mesBox .num{
            font-size: 16px;
            color: #795611;
        }

        .user_index_top .usermes .mesBox a{
            padding:0 5px;
            width:60px;
            text-align: center;
            line-height: 26px;
            color: #fff;
            border-radius: 2rem;
            /* border: 1px #fff  solid; */
            background:#0035A0!important;
            display: inline-block;


        }
        .user_index_top .text{color:#795611;}
				.aui-flex-box span{
					color: #795611;
				}
				.icon-pic{
					width: 26px;
					height: 20px;
					background-size: contain;
					margin-right: 5px;
				}
				.aui-flex-two,.user_index_top .wrap-flex-row {
						border-top: 0;
					  background-image: -moz-linear-gradient( 0deg, rgb(254,238,205) 0%, rgb(255,215,135) 100%);
					  background-image: -webkit-linear-gradient( 0deg, rgb(254,238,205) 0%, rgb(255,215,135) 100%);
					  background-image: -ms-linear-gradient( 0deg, rgb(254,238,205) 0%, rgb(255,215,135) 100%);
				}
				.aui-go-button button{
					background:linear-gradient(90deg,rgba(254,253,249,1) 0%,rgba(255,241,216,1) 100%);
					text-align: center;
					padding: 0.15rem 0.45rem 0.15rem 0.45rem;
				}
				.aui-go-button button:after{
					display: none;
				}
				.u-data-g{
					width: 1px;
					height: 32px;
					background: #795611;
				}
				.goto{
					background-size: cover;
					background-position: center;
					background-repeat: no-repeat;
				}
				.logout_btn{
					width: 80%;
					height: 35px;
					margin-left:10%;text-align: center;
					background-size: cover;
					background-position: center;
					
					-webkit-border-radius:5px ;
					-moz-border-radius:5px ;
					border-radius: 5px;
				}
				.aui-palace-grid-icon img{
					width: auto;
					height: auto;
					max-width: 30px;
					max-height: 30px;
				}
    </style></head><body><header><span>我的</span><div class="add" style="font-size: 12px;position: fixed;right: 10px;line-height: 40px" onclick="location.href=`/index/ctrl/set.html`"><img src="/public/img/set2.png" alt="" style="width: 30px;margin-top: 6px;"></div></header><section class="aui-flexView" style="margin-top: 40px"><section class="aui-scrollView"><div class="aui-take-head"><div class="aui-flex aui-flex-one" style="top:0"><div class="aui-take-user"><img src="<?php echo htmlentities($info['headpic']); ?>" alt="" onerror="this.src='/public/img/head.png'" style="height: 100%;"></div><div class="aui-flex-box"><span style="color: #fff;"><i class="icon icon-phone"></i><?php echo htmlentities($info['tel']); ?></span></div><div class="aui-take-button my_data"><button data-copy="<?php echo htmlentities($info['invite_code']); ?>" class="level level2"><i class="icon icon-pic" style="background-image:url('http://lxb.com/public/img/my/my_qian.png');"></i>邀请码：<?php echo htmlentities($info['invite_code']); ?></button></div></div><div class="aui-flex aui-flex-two"><div class="aui-flex-box"><h3><span><img src="http://lxb.com/statics/img/8.png"><?php echo htmlentities($level_name); ?></span><span style="float: right;font-size: 11px;color: #795611;padding-right: 10px;">开通优惠</span></h3></div><a href="/index/ctrl/vip.html" style="display:block"><div class="aui-go-button"><button style="font-size: 12px">升级会员</button></div></a></div></div><div class="user_index_top " style="background: -webkit-linear-gradient(left,#27a6fa,#8e71f5);margin-top: -1px;height:62px"><div class="usermes wrap-flex-row" style="border-radius: 0"><div class="mesBox"><div class="text"><?php echo htmlentities($sell_y_num); ?></div><div class="num">收益</div></div><span class="u-data-g"></span><div class="mesBox"><div class="text"><?php echo htmlentities($info['balance']); ?></div><div class="num">余额</div></div><span class="u-data-g"></span><div class="mesBox"><div class="text"><?php echo htmlentities($info['freeze_balance']); ?></div><div class="num">冻结</div></div><span class="u-data-g"></span><div class="mesBox goto"><!--<a href="<?php echo url('ctrl/recharge_before'); ?>">充值</a>--><a href="<?php echo url('ctrl/czrand'); ?>">充值</a></div><div class="mesBox goto"><a href="<?php echo url('ctrl/deposit_before'); ?>">提现</a></div><div style="clear: both;"></div></div><div class="usermes wrap-flex-row"><div class="mesBox" onclick="window.location.href = `<?php echo url('ctrl/lixibao'); ?>`"><div class="text"><?php echo htmlentities($rililv); ?></div><div class="num">日利率</div></div><span class="u-data-g"></span><div class="mesBox" onclick="window.location.href = `<?php echo url('ctrl/lixibao'); ?>`"><div class="text"><?php echo htmlentities($info['lixibao_balance']); ?></div><div class="num" >利息宝</div></div><span class="u-data-g"></span><div class="mesBox" onclick="window.location.href = `<?php echo url('ctrl/lixibao'); ?>`"><div class="text"><?php echo htmlentities($lxb_shouyi); ?></div><div class="num">累计收益</div></div><span class="u-data-g"></span><div class="mesBox goto"><a  href="<?php echo url('ctrl/lixibao_ru'); ?>">转入</a></div><div class="mesBox goto"><a  href="<?php echo url('ctrl/lixibao_chu'); ?>">转出</a></div><div style="clear: both;"></div></div></div><div style="height: 60px"></div><!--<div class="aui-flex aui-flex-three">--><!--<div class="aui-flex-box aui-flex-box-info">--><!--<h4>余额(元)<br><em><?php echo htmlentities($info['balance']); ?></em></h4>--><!--</div>--><!--<div class="aui-flex-box">--><!--<h4>冻结余额 <br><em><?php echo htmlentities($info['freeze_balance']); ?></em></h4>--><!--</div>--><!--</div>--><div class="aui-take-item" style="background: none;margin:0 1rem"><div class="mytool wrap-flex-row"><a class="openvip goto" href="<?php echo url('ctrl/junior'); ?>" style="background-image:url('http://lxb.com/public/img/my/my_btn1.png'); "><div class="text wrap-flex-column" style="color: #fff;">我的团队
                        <span style="color: #fff;">躺着也有收益</span></div><!-- <img src="http://lxb.com/statics/img/vip-jb.png" class="corner"> --></a><a class="sharefriend goto" href="<?php echo url('my/invite'); ?>" style="background-image:url('http://lxb.com/public/img/my/my_btn2.png'); "><div class="text wrap-flex-column" style="color: #000;">
                        邀请好友
                        <span style="color: #000;">有钱一起赚</span></div><!-- <img src="http://lxb.com/statics/img/yq-jb.png" class="corner"> --></a></div></div><div class="aui-take-item" style="margin-top: 0"><div class="aui-flex"><div class="aui-flex-box"><h1 style="color: #795611;">常用功能</h1></div></div><div class="aui-palace"><?php
                if($info['show_td']){
                ?><a href="<?php echo url('ctrl/junior2'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon"><img src="/public/img/my/my_cy_btn1.png" alt=""></div><div class="aui-palace-grid-text"><h2>我的团队</h2></div></a><?php
                }
                ?><a href="<?php echo url('ctrl/wallet'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon"><img src="/public/img/my/my_cy_btn2.png" alt=""></div><div class="aui-palace-grid-text"><h2>我的钱包</h2></div></a><a href="<?php echo url('ctrl/my_data'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon"><img src="/public/img/my/my_cy_btn3.png" alt=""></div><div class="aui-palace-grid-text"><h2>个人资料</h2></div></a><a href="<?php echo url('ctrl/recharge_admin'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon"><img src="/public/img/my/my_cy_btn4.png" alt=""></div><div class="aui-palace-grid-text"><h2>充值管理</h2></div></a><a href="<?php echo url('ctrl/deposit_admin'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon"><img src="/public/img/my/my_cy_btn5.png" alt=""></div><div class="aui-palace-grid-text"><h2>提现</h2></div></a><a href="<?php echo url('ctrl/team_bgk'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon"><img src="/public/img/my/my_cy_btn6.png" alt=""></div><div class="aui-palace-grid-text"><h2>团队佣金</h2></div></a><a href="<?php echo url('ctrl/receive_site'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon"><img src="/public/img/my/my_cy_btn7.png" alt=""></div><div class="aui-palace-grid-text"><h2>地址管理</h2></div></a><!--<a href="<?php echo url('ctrl/set'); ?>" class="aui-palace-grid">--><!--<div class="aui-palace-grid-icon">--><!--<img src="/public/img/set.png" alt="">--><!--</div>--><!--<div class="aui-palace-grid-text">--><!--<h2>设置</h2>--><!--</div>--><!--</a>--><a href="<?php echo url('ctrl/bank'); ?>" class="aui-palace-grid"><div class="aui-palace-grid-icon" style="padding-top:5px;"><img src="/public/img/my/my_cy_btn8.png" alt=""></div><div class="aui-palace-grid-text"><h2>银行卡绑定</h2></div></a><a href="javascript:void(0)" id="exit" class="aui-palace-grid logout_btn" style="background-image:url('http://lxb.com/public/img/my/logout.png');"></a></div></div><div style="height:0px;"></div></section></section><div class="hui-fooer-line"></div><style>
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
</style><div id="hui-footer" style="height:50px;padding:2px 0;"><a href="<?php echo url('index/home'); ?>" id="nav-home" class=""><div class=" mui-active"></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://lxb.com/public/img/home.png"/></div><div class="hui-footer-text">首页</div></a><a href="<?php echo url('order/index'); ?>" id="nav-news"><div class=""></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://lxb.com/public/img/jilu.png"/></div><div class="hui-footer-text">记录</div></a><div style="width:20%; text-align:center;">
        &nbsp;
    </div><a href="<?php echo url('support/index'); ?>" id="nav-forum" ><div class=""></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://lxb.com/public/img/kefu-b.png"/></div><div class="hui-footer-text">客服</div></a><a href="<?php echo url('my/index'); ?>" id="nav-my"><div class=""></div><div style="text-align: center;margin: 5px"><img style="width: 20px;height:21px;display:inline" src="http://lxb.com/public/img/my.png"/></div><div class="hui-footer-text">我的</div></a></div><a href="<?php echo url('rot_order/index',array('type'=>1)); ?>" id="footer-logo"><div id="footer-logo2" style="height: 54px;"><img src="http://lxb.com/public/img/home-.png" style="height: 40px;width:40%;margin-top:10px"></div></a><script src="/public/js/common.js"></script><script>
    $(".floor li").click(function(){
        $(this).addClass('floor-active').siblings().removeClass('floor-active')
    })
</script><script>
    $(function() {
        $('#hui-footer a').eq(3).addClass("floor-active")
    })

    $("#exit").click(function(){
        layer.open({
            content: '确定退出登录吗？'
            , btn: ['确定','取消'],
            shadeClose: false
            , yes: function (index) {
                location.href="<?php echo url('user/logout'); ?>"
            },
            no:function(){
                layer.close();
            }
        });
    })
</script></body></html>
