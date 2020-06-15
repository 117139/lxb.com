<?php /*a:1:{s:71:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\ctrl\junior2.html";i:1581839538;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>我的团队</title><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" type="text/css" href="http://www.sc.com/statics/css/hui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><style>
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
        .info_name,.info_store,.money,.info_num{font-size: 12px}
        .info_data{display: inline-block}
        .info_data>p,.info_money>p{
            margin-bottom: 3px;
        }
        .info_img img{max-height: 60px}
        .info_img{background: none;height: auto}

        .sticky-icon3 {
            font-size: 11px;
            line-height: 18px;
            background: #20a1de;
            color: #fff;
            position: absolute;
            left: -5px;
            top: -5px;
            z-Index: 2;
            padding: 0 2em;
            -webkit-transform-origin: left bottom;
            -moz-transform-origin: left bottom;
            transform-origin: left bottom;
            -webkit-transform: translate(29.29%,-100%) rotate(45deg);
            -moz-transform: translate(29.29%,-100%) rotate(45deg);
            transform: translate(29.29%,-100%) rotate(-45deg);
            text-indent: 0;
        }
    </style></head><body style="background: #fff"><header><div class="back" onclick="window.history.back(-1)"></div><span>我的团队</span></header><div class="container mescroll" style="padding-top: 4rem;" id="mescroll"><nav><p class="nav_active">一代</p><p>二代</p><p>三代</p></nav><div class="cont"><div style="display: block;"><ul class="list wait_list" onclick="return false"><!-- 待处理订单 --></ul></div><div><ul class="list freeze_list"><!-- 冻结订单 --></ul></div><div><ul class="list make_list"><!-- 完成订单 --></ul></div></div><div id="footer" style="position: fixed;bottom: 0;width: 100%;height:70px;border-top: 1px solid #ccc;"><div style="display: block;"><ul class="list wait_list2"><li id="" style="padding: 0 15px;border-bottom: 0"><div class="order_info"><div class="info_img"><span class="sticky-icon" style="font-size: 17px">统计</span></div><div class="info_data"><p class="info_name">充值: <span id="chongzhi2">0</span></p><p class="info_store">提现: <span id="tixian2">0</span></p></div><div class="info_money"><p class="money" style="">推荐人数: <span id="num">0</span></p><p class="money" style="color:#00d44b">推荐人数: <span id="num2">0</span></p></div></div></li><!-- 待处理订单 --></ul></div></div></div><script>
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

        console.log(_ind);

        if (_ind == 1) {
            if (fcont == 0) {
                //fcont = 1;
                freeze(fpage);//冻结订单
            }
        } else if (_ind == 2) {
            if (mcont == 0) {
                //mcont = 1;
                make(mpage);//完成订单
            }
        }else if (_ind == 0) {
            if (mcont == 0) {
                wait(mpage);//完成订单
            }
        }
    });




    //        $(".freeze_list").on('click', 'li', function(e) {
    //            var id = $(e.target).attr('id') || $(e.target).parents('li').attr("id");
    //            sessionStorage.setItem('oid', id);
    //            location.href = "<?php echo url('ctrl/order_info'); ?>"
    //        });

    // 待处理订单请求
    function wait(page) {
        $.ajax({
            url: urlPost("ctrl/get_user"),
            type: "POST",
            dataType: "JSON",
            data: { page:page, type: 1 },
            success: function(res) {
                console.log(res);
                if (res.code == 0) {
                    var list = res.data;
                    $('#chongzhi2').text(res.other.chongzhi);
                    $('#tixian2').text(res.other.tixian);
                    $('#num').text(res.other.xiaji);
                    $('#num2').text(res.other.xiaji);
                    if (page != 1 && list.length == 0) {
                        QS_toast.show('没有更多的数据了..', true)
                    }
                    if (page == 1 && list.length == 0) {
                        $(".wait_list").append('<li class="no-data">暂无数据...</li>')
                    }
                    if (page==1) {
                        $(".wait_list").html('');
                    }
                    list.map(function(val) {
                        $(".wait_list").append(`
                                <li id="${val.id}"><div class="order_info"><div class="info_img"><img src="${val.headpic}" alt=""></div><div class="info_data"><p class="info_name">姓名:${val.username}</p><p class="info_store">充值:${val.chongzhi}</p><p class="info_store">提现:${val.tixian}</p></div><div class="info_money"><p class="money" style="">电话:${val.tel}</p><p class="money" style="color:#00d44b">推荐人数: ${val.childs}</p><p><span class="info_num">注册时间:${val.addtime}</span></p></div></div></li>
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
            url: urlPost("ctrl/get_user"),
            type: "POST",
            dataType: "JSON",
            data: { page:page, type: 2 },
            success: function(res) {
                console.log(res);
                $('#chongzhi2').text(res.other.chongzhi);
                $('#tixian2').text(res.other.tixian);
                $('#num').text(res.other.xiaji);
                $('#num2').text(res.other.xiaji);
                if (res.code == 0) {
                    var list = res.data;
                    if (page != 1 && list.length == 0) {
                        QS_toast.show('没有更多的数据了..', true)
                    }
                    if (page == 1 && list.length == 0) {
                        $(".freeze_list").append('<li class="no-data">暂无数据...</li>')
                    }
                    if (page==1) {
                        $(".freeze_list").html('');
                    }
                    list.map(function(val) {
                        $(".freeze_list").append(`
                                <li id="${val.id}"><div class="order_info"><div class="info_img"><img src="${val.headpic}" alt=""></div><div class="info_data"><p class="info_name">姓名:${val.username}</p><p class="info_store">充值:${val.chongzhi}</p><p class="info_store">提现:${val.tixian}</p></div><div class="info_money"><p class="money" style="">电话:${val.tel}</p><p class="money" style="color:#00d44b">推荐人数: ${val.childs}</p><p><span class="info_num">注册时间:${val.addtime}</span></p></div></div></li>
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
            url: urlPost("ctrl/get_user"),
            type: "POST",
            dataType: "JSON",
            data: { page:page, type: 3 },
            success: function(res) {
                console.log(res);
                if (res.code == 0) {
                    var list = res.data;

                    $('#chongzhi2').text(res.other.chongzhi_all+'('+res.other.chongzhi+'+'+res.other.chongzhi4+'+'+res.other.chongzhi5+')');
                    $('#tixian2').text(res.other.tixian_all+'('+res.other.tixian+'+'+res.other.tixian4+'+'+res.other.tixian5+')');
                    $('#num').text(res.other.xiaji);
                    $('#num2').text(res.other.xiaji);


                    if (page != 1 && list.length == 0) {
                        QS_toast.show('没有更多的数据了..', true)
                    }
                    if (page == 1 && list.length == 0) {
                        $(".make_list").append('<li class="no-data">暂无数据...</li>')
                    }
                    if (page==1) {
                        $(".make_list").html('');
                    }
                    list.map(function(val) {
                        $(".make_list").append(`
                                <li id="${val.id}"><div class="order_info"><div class="info_img"><img src="${val.headpic}" alt=""></div><div class="info_data"><p class="info_name">姓名:${val.username}</p><p class="info_store">充值:${val.chongzhi}</p><p class="info_store">提现:${val.tixian}</p></div><div class="info_money"><p class="money" style="">电话:${val.tel}</p><p class="money" style="color:#00d44b">推荐人数: ${val.childs}</p><p><span class="info_num">注册时间:${val.addtime}</span></p></div></div></li>
                            `)
                    })
                }
            },
            error: function(err) { console.log(err) }
        })
    }
</script></body></html>