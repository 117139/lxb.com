<?php /*a:2:{s:82:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\index\view\order\index.html";i:1578925444;s:83:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\index\view\public\floor.html";i:1578925444;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>收单</title><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" type="text/css" href="http://127.0.0.27/statics/css/hui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><style>
        nav {
            position: fixed;
            top: 2rem;
            left: 0;
            right: 0;
            margin: auto;
            max-width: 750px;
            width: 100%;
            background: white;
            display: flex;
            height: 2rem;
            line-height: 2rem;
            justify-content: space-between;
            flex-direction: row;
            border-bottom: 1px solid #eeeeee;
        }

        .nav_active {
            color: #00bcd4;
            border-bottom: 1px solid #00bcd4;
        }

        nav>p {
            width: 33%;
            text-align: center;
        }

        .cont>div {
            display: none;
        }

        .list {
            height: 77vh;
            overflow-y: scroll;
        }

        .list>li {
            font-size: .5rem;
            border-bottom: .1rem solid rgb(248, 242, 242);
            padding: .5rem 1rem;
        }

        .order_info {
            margin-top: .5rem;
            display: flex;
        }

        .info_img {
            width: 3rem;
            height: 3rem;
            background: #eeeeee;
        }

        .info_data {
            max-width: 55%;
            margin: 0 0 0 1rem;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .info_store,
        .money {
            color: #00bcd4;
        }

        .info_money {
            margin-left: auto;
            text-align: right;
        }
        .no-data{
            border: none !important;
            text-align: center;
        }
        .info_name,.order_num{color:#000;font-size: 13px}
        .info_name,.info_store,.money{font-size: 12px}
    </style></head><body style="background: #fff"><header><span>收单列表</span></header><div class="container mescroll" style="padding-top: 4rem;" id="mescroll"><nav><p class="nav_active">待处理</p><p>冻结中</p><p>已完成</p></nav><div class="cont"><div style="display: block;"><ul class="list wait_list"><!-- 待处理订单 --></ul></div><div><ul class="list freeze_list"><!-- 冻结订单 --></ul></div><div><ul class="list make_list"><!-- 完成订单 --></ul></div></div></div><style>
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
</style><div id="hui-footer" style="height:50px;padding:2px 0;"><a href="<?php echo url('index/home'); ?>" id="nav-home" class=""><div class="hui-footer-icons hui-icons-home iconfont icon-shouye mui-active"></div><div class="hui-footer-text">首页</div></a><a href="<?php echo url('order/index'); ?>" id="nav-news"><div class="hui-footer-icons hui-icons-news iconfont icon-dingdan-yichenggong"></div><div class="hui-footer-text">记录</div></a><div style="width:20%; text-align:center;">
        &nbsp;
    </div><a href="<?php echo url('support/index'); ?>" id="nav-forum" ><div class="hui-footer-icons hui-icons-forum iconfont icon-tubiao-"></div><div class="hui-footer-text">客服</div></a><a href="<?php echo url('my/index'); ?>" id="nav-my"><div class="hui-footer-icons hui-icons-my iconfont icon-weibiaoti-"></div><div class="hui-footer-text">我的</div></a></div><a href="<?php echo url('rot_order/index',array('type'=>1)); ?>" id="footer-logo"><div id="footer-logo2" style="height: 54px;"><img src="http://127.0.0.27/statics/img/qd.png" style="height: 40px;width:40%;margin-top:10px"></div></a><script src="/public/js/common.js"></script><script>
    $(".floor li").click(function(){
        $(this).addClass('floor-active').siblings().removeClass('floor-active')
    })
</script><script>
        var page = 1,fpage=1,mpage=1, listHeight = $('.list').height(),fcont = 0, mcont = 0;
        $(function() {
            $('#hui-footer a').eq(1).addClass("floor-active")
            wait(page); // 待处理订单
        });

        // 待处理订单滚动加载
        $(".wait_list").scroll(function () {
            var nScrollHight = $(this)[0].scrollHeight;
            var nScrollTop = $(this)[0].scrollTop;
            if (nScrollTop + listHeight >= nScrollHight) {
                page++;
                wait(page);
            }
        });

        // 冻结订单滚动加载
        $(".freeze_list").scroll(function () {
            var nScrollHight = $(this)[0].scrollHeight;
            var nScrollTop = $(this)[0].scrollTop;
            if (nScrollTop + listHeight >= nScrollHight) {
                page++;
                freeze(page);
            }
        });

        // 完成订单滚动加载
        $(".make_list").scroll(function () {
            var nScrollHight = $(this)[0].scrollHeight;
            var nScrollTop = $(this)[0].scrollTop;
            if (nScrollTop + listHeight >= nScrollHight) {
                page++;
                make(page);
            }
        });

        // tab切换
        $('nav>p').click(function () {
            var _ind = $(this).index();
            $(this).addClass("nav_active").siblings().removeClass("nav_active");
            $(".cont>div").eq(_ind).show().siblings().hide();
            if (_ind == 1) {
                if (fcont == 0) {
                    fcont = 1;
                    freeze(fpage);//冻结订单
                }
            } else if (_ind == 2) {
                if (mcont == 0) {
                    mcont = 1;
                    make(mpage);//完成订单
                }
            }
        });



        // 待处理订单跳转详情
        $(".wait_list").on('click', 'li', function(e) {
            var id = $(e.target).attr('id') || $(e.target).parents('li').attr("id");
            sessionStorage.setItem('oid', id);
            location.href = "<?php echo url('ctrl/order_info'); ?>"
        });

//        $(".freeze_list").on('click', 'li', function(e) {
//            var id = $(e.target).attr('id') || $(e.target).parents('li').attr("id");
//            sessionStorage.setItem('oid', id);
//            location.href = "<?php echo url('ctrl/order_info'); ?>"
//        });

        // 待处理订单请求
        function wait(page) {
            $.ajax({
                url: urlPost("order/order_list"),
                type: "POST",
                dataType: "JSON",
                data: { page:page, type: 1 },
                success: function(res) {
                    console.log(res);
                    if (res.code == 0) {
                        var list = res.data;
                        if (page != 1 && list.length == 0) {
                            QS_toast.show('没有更多的数据了..', true)
                        }
                        if (page == 1 && list.length == 0) {
                            $(".wait_list").append('<li class="no-data">暂无数据...</li>')
                        }
                        list.map(function(val) {
                            $(".wait_list").append(`
                                <li id="${val.id}"><div class="order_num">${val.id}</div><div class="order_info"><div class="info_img"><img src="${val.goods_pic}" alt=""></div><div class="info_data"><p class="info_name">${val.goods_name}</p><p class="info_store">${val.shop_name}</p><p class="info_store">订单超时:${val.endtime}</p></div><div class="info_money"><p class="money" style="margin-bottom: .5rem;">￥${val.goods_price}</p><p class="money" style="margin-bottom: .5rem;color:#00d44b">￥${val.commission}</p><p>x<span class="info_num">${val.goods_count}</span></p></div></div></li>
                            `)
                        })
                    }
                },
                error: function(err) { console.log(err) }
            })
        }

        // 冻结订单请求
        function freeze(page) {
            $.ajax({
                url: urlPost("order/order_list"),
                type: "POST",
                dataType: "JSON",
                data: { page:page, type: 2 },
                success: function(res) {
                    console.log(res);
                    if (res.code == 0) {
                        var list = res.data;
                        if (page != 1 && list.length == 0) {
                            QS_toast.show('没有更多的数据了..', true)
                        }
                        if (page == 1 && list.length == 0) {
                            $(".freeze_list").append('<li class="no-data">暂无数据...</li>')
                        }
                        list.map(function(val) {
                            $(".freeze_list").append(`
                                <li id="${val.id}"><div class="order_num">${val.id}</div><div class="order_info"><div class="info_img"><img src="${val.goods_pic}" alt=""></div><div class="info_data"><p class="info_name">${val.goods_name}</p><p class="info_store">${val.shop_name}</p><p class="info_store">冻结期:${val.endtime}</p></div><div class="info_money"><p class="money" style="margin-bottom: .5rem;">￥${val.goods_price}</p><p class="money" style="margin-bottom: .5rem;color:#00d44b">￥${val.commission}</p><p>x<span class="info_num">${val.goods_count}</span></p></div></div></li>
                            `)
                        })
                    }
                },
                error: function(err) { console.log(err) }
            })
        }

        // 完成订单请求
        function make(page) {
            $.ajax({
                url: urlPost("order/order_list"),
                type: "POST",
                dataType: "JSON",
                data: { page:page, type: 3 },
                success: function(res) {
                    console.log(res);
                    if (res.code == 0) {
                        var list = res.data;
                        if (page != 1 && list.length == 0) {
                            QS_toast.show('没有更多的数据了..', true)
                        }
                        if (page == 1 && list.length == 0) {
                            $(".make_list").append('<li class="no-data">暂无数据...</li>')
                        }
                        list.map(function(val) {
                            $(".make_list").append(`
                                <li id="${val.id}"><div class="order_num">${val.id}</div><div class="order_info"><div class="info_img"><img src="${val.goods_pic}" alt=""></div><div class="info_data"><p class="info_name">${val.goods_name}</p><p class="info_store">${val.shop_name}</p></div><div class="info_money"><p class="money" style="margin-bottom: .5rem;">￥${val.goods_price}</p><p class="money" style="margin-bottom: .5rem;color:#00d44b">￥${val.commission}</p><p>x<span class="info_num">${val.goods_count}</span></p></div></div></li>
                            `)
                        })
                    }
                },
                error: function(err) { console.log(err) }
            })
        }
    </script></body></html>