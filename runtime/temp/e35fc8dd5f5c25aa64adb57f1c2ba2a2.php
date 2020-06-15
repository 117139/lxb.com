<?php /*a:2:{s:71:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\rot_order\index.html";i:1592208039;s:68:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\public\floor.html";i:1591612976;}*/ ?>
<html><head><meta charset="utf-8"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><title>抢单页面</title><link rel="stylesheet" type="text/css" href="http://lxb.com/statics/css/hui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/ui.js"></script><script src="/public/js/layer_mobile/layer.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><style>
        #yongjin{
            position: relative;
            top: -60px;
            right:10px;;
            text-align: right;
						padding-top: 5px;
        }
        #yongjin span{
            display: inline-block;
            background: #0035A0;
            padding:2px 5px;
            font-size: 12px;
            border-radius: 14px;
            color: #fff;
        }
        .loading {
            width: 2rem;
            height: 2rem;
            margin: auto;
            background-image: url(/public/img/load.png);
            background-size: 100%;
            background-repeat: no-repeat;
            animation: load 2s linear infinite;

        }
				.hui-common-title-txt{
					color: #795611;
					font-weight: bold;
				}
				.hui-common-title-line{
					background: #795611;
				}
				.user-wallet li{
					width: 33.333%;
					padding: 0;
					margin: 1rem 0;
				}
				.user-wallet li span,.user-wallet li h3{
					font-size: 13px;
					color: #795611;
				}
				.user-wallet li:first-child:after {
					display: none;
				} 
				.user-wallet li {
					border-right: 1px solid #795611;
					-webkit-box-sizing: border-box;
					-moz-box-sizing: border-box;
					box-sizing: border-box;
				}
				.user-wallet li:nth-child(3n){
					border-right: 0;
				}
				.index_marqueen{
					box-shadow:0px 1px 9px 0px rgba(159,159,159,0.71);border-radius:30px;
				}
				.btn_bg{
					background-repeat: no-repeat;
					background-size: 100% 100%;
					position: relative;
				}
				.btn_yj{
					position: absolute;
					left: 50%;
					margin-left: 60px;
					font-size: 15px;
					color: #fff;
				}
				.beizhu_tip{
					width:82%;margin-left:5%;background-color:#FFD072;margin-top:1rem;padding:1rem 1rem 1rem 1rem;font-size:0.6rem;
					border-radius: 6px;
				}
        @keyframes load {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
				header{
					    background: #0035A0!important;
				}
    </style></head><body><header class="hui-header"><!-- <div id="hui-back"></div> --><h1 style=""><?php if(isset($level['name'])): ?><?php echo htmlentities($level['name']); ?><?php endif; ?></h1></header><div class="hui-wrap" style="
    background-image: linear-gradient(180deg,#FEEECB,#FFD789);
"><div class="hui-common-title" style="margin-top:15px;"><div class="hui-common-title-line"></div><div class="hui-common-title-txt">今日佣金￥ <?php echo htmlentities(sprintf('%.2f',$day_deal)); ?></div><div class="hui-common-title-line"></div></div><div id="yongjin"><span>佣金<?php echo htmlentities($cate['bili']*100); ?>%</span></div><div class="user-wallet" style="background: rgba(0,0,0,0);"><ul><li><a href="<?php echo url('order/index'); ?>"><span>今日已抢单数</span><h3><?php echo htmlentities((isset($day_d_count) && ($day_d_count !== '')?$day_d_count:0)); ?>/<?php echo htmlentities($level['order_num']); ?></h3></a></li><li><a href="<?php echo url('order/index'); ?>"><span>今日信用单数</span><h3><?php echo htmlentities((isset($fudan_day_l_count) && ($fudan_day_l_count !== '')?$fudan_day_l_count:0)); ?>/<?php echo htmlentities($level['fudan_order_num']); ?></h3></a></li><li><a href="<?php echo url('order/index'); ?>"><span>今日冻结单数</span><h3><?php echo htmlentities((isset($day_l_count) && ($day_l_count !== '')?$day_l_count:0)); ?></h3></a></li></ul><ul><li><a href="<?php echo url('order/index'); ?>"><span>今日待处理单数</span><h3><?php echo htmlentities((isset($day_2_count) && ($day_2_count !== '')?$day_2_count:0)); ?></h3></a></li><li><a href="<?php echo url('order/index'); ?>"><span>今日完成单数</span><h3><?php echo htmlentities((isset($day_3_count) && ($day_3_count !== '')?$day_3_count:0)); ?></h3></a></li><li><a href="<?php echo url('ctrl/wallet'); ?>"><span>信用单未补齐金额</span><h3>￥ <?php echo htmlentities(sprintf('%.2f',$price_d)); ?></h3></a></li></ul><ul><li><a href="<?php echo url('ctrl/wallet'); ?>"><span>当前余额</span><h3>￥ <?php echo htmlentities(sprintf('%.2f',$price)); ?></h3></a></li><li><a href="<?php echo url('ctrl/junior2'); ?>"><span>团队总佣金</span><h3>￥ <?php echo htmlentities(sprintf('%.2f',$team_num)); ?></h3></a></li><li><a href="<?php echo url('ctrl/junior2'); ?>"><span>信用单佣金</span><h3>￥ <?php echo htmlentities(sprintf('%.2f',$team_num)); ?></h3></a></li></ul></div></div><div style="background:#FFF; padding:0px 15px; margin:10px;" class="hui-flex index_marqueen"><div style="height:46px; width:20px;"><img src="http://lxb.com/statics/img/spiker.png" width="20" style="padding:13px 0px;"></div><div class="hui-scroll-news" id="scrollnew1"><div class="hui-scroll-news-items     ">恭喜用户181****8896获得佣金0.66元</div><div class="hui-scroll-news-items     ">恭喜用户181****8896获得佣金0.76元</div></div></div><div style="padding:28px;margin-top: 0rem;"><button type="button" class="hui-button hui-button-large self_btn" id="btn1" style=" background-color: #0035A0; color: #fff;" data-open="1">开启自动抢单</button><!-- <button type="button" class="hui-button hui-button-large" id="btn2" style="margin-top:20px;">停止抢单</button> --></div><div style="padding:0 28px 10px;margin-top: 0rem;"><button type="button" class="hui-button hui-button-large self_btn2 btn_bg" id="btn2"
		 style=" background-image:url('http://lxb.com/public/img/order/order_bg.png'); color: #0035A0;" data-open="1">开启信用抢单
        <span class="btn_yj">佣金<?php echo htmlentities($level['fudan_bili']*100); ?>%</span></button><!-- <button type="button" class="hui-button hui-button-large" id="btn2" style="margin-top:20px;">停止抢单</button> --></div><div class="beizhu_tip" style=""><div style="color:#0035A0;text-align: center;font-weight: bold;">
        备注说明
    </div><div style="color: #0035A0;"><?php echo $xy_msg; ?></div></div><div class="hui-fooer-line"></div><style>
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
</script><!-- 隐藏域数值 --><input type="hidden" name="qd_time_intvel" value="10"><input type="hidden" name="type" value="1"><script src="/statics/js/hui.js" type="text/javascript" charset="utf-8"></script><script src="/public/js/swiper.min.js"></script><script type="text/javascript">
    hui.scrollNews(scrollnew1);
    // hui.scrollNews(scrollnew2, 8000);
</script><script type="text/javascript">
    var submit = true, status = false, timer = null, ajaxT = null,lay=0;

    $('#btn2').click( function() {
        $.ajax({
            url:"<?php echo url('isUserVip'); ?>",
            data:{},
            type:"POST",
            success:(res)=>{
                if(res.code==1){
                    if(res.is_vip===1){
                        layer.open({
                            content: '抢单中...<br/><div class="loading"></div>'
                            , btn: ['停止抢单',],
                            shadeClose: false
                            , yes: function (index) {
                                lay=index;
                                clearTimeout(ajaxT);//清除抢单请求
                                QS_toast.show('已停止抢单', true);
                                layer.close(index)
                            }
                        });

                        // 延时发送抢单请求
                        ajaxT = setTimeout( function() {
                            $.ajax({
                                url: "<?php echo url('submit_fudan_order'); ?>",
                                type: "POST",
                                dataType: "JSON",
                                data: {cid:"<?php echo htmlentities($cate['id']); ?>"},
                                success: function(res) {
                                    console.log(res)
                                    status = true;
                                    if (res.code == 0) {
                                        QS_toast.show(res.info, true);
                                        layer.close(lay)
                                        sessionStorage.setItem('oid', res.oid);
                                        var timer = setTimeout(function() {
                                            location.href = "<?php echo url('ctrl/order_info'); ?>"
                                        }, 1800)
                                    } else {
                                        QS_toast.show(res.info, true)
                                        layer.closeAll()
                                    }

                                },
                                error: function(err) { console.log(err) }
                            })
                        },5000)
                    }else{
                        layer.open({
                            content:res.msg,
                            btn:['确认'],
                            yse:(index)=>{
                                layer.close(index)
                            }
                        });
                    }
                }else{
                    layer.open({
                        content:res.msg,
                        btn:['确认'],
                        yse:(index)=>{
                            layer.close(index)
                        }
                    });
                }
            },
            error:(err)=>{
                layer.open({
                    content:'请求错误',
                    btn:['确认'],
                    yse:(index)=>{
                        layer.close(index)
                    }
                });
            }
        });
    });

    $('.self_btn').click( function() {
        layer.open({
            content: '抢单中...<br/><div class="loading"></div>'
            , btn: ['停止抢单',],
            shadeClose: false
            , yes: function (index) {
                lay=index;
                clearTimeout(ajaxT);//清除抢单请求
                QS_toast.show('已停止抢单', true);
                layer.close(index)
            }
        });

        // 延时发送抢单请求
        ajaxT = setTimeout( function() {
            $.ajax({
                url: "<?php echo url('submit_order'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {cid:"<?php echo htmlentities($cate['id']); ?>"},
                success: function(res) {
                    console.log(res)
                    status = true;
                    if (res.code == 0) {
                        QS_toast.show(res.info, true);
                        layer.close(lay)
                        sessionStorage.setItem('oid', res.oid);
                        var timer = setTimeout(function() {
                            location.href = "<?php echo url('ctrl/order_info'); ?>"
                        }, 1800)
                    } else {
                        QS_toast.show(res.info, true)
                        layer.close(lay)
                    }

                },
                error: function(err) { console.log(err) }
            })
        },5000)
    })
</script><script type="text/javascript">    // hui('#btn2').click(function(){
    //     if(!window.plus){
    //         hui.alert('停止抢单');
    //         return false;
    //     }
    //     hui.h5Loading(false, '加载中...',{round:2, padding:'20px', textalign:'right'});
    //     setTimeout(function(){hui.h5Loading(true);}, 2000);
    // });
</script></body></html>