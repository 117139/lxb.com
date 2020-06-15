<?php /*a:1:{s:64:"/www/wwwroot/lxb.com/application/index/view/ctrl/order_info.html";i:1582461142;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>订单详情</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
        .container>div {
            padding: .5rem 1rem;
        }

        .site {
            border-bottom: .3rem solid rgb(248, 242, 242);
        }

        .site>div:first-child {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            margin-bottom: .5rem;
        }

        .site>div:last-child {
            position: relative;
        }

        .site>div:last-child::after {
            content: "";
            width: 1rem;
            height: 1rem;
            position: absolute;
            right: 0;
            background-image: url(/public/img/right.png);
            ;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .location {
            width: 75%;
            display: inline-block;
        }

        .order {
            font-size: .5rem;
            border-bottom: .3rem solid rgb(248, 242, 242);
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
            color: #FDC003;
        }

        .info_money {
            margin-left: auto;
            text-align: right;
        }

        .data_cont {
            border-bottom: .3rem solid rgb(248, 242, 242);
            text-align: right;
        }

        .data_cont>p {
            margin-bottom: .2rem;
        }

        .container>p {
            border-bottom: .1rem solid rgb(248, 242, 242);
            text-align: right;
            padding: .3rem 1rem;
        }

        .data_cont>p span:last-child {
            color: #FDC003;
            margin-left: .1rem;
        }

        .btn {
            margin: 2rem 1rem;
            height: 2.2rem;
            line-height: 2.2rem;
            border-radius: 5px;
            background: #7669fd;
            text-align: center;
            color: white;
            padding: 0 !important;
        }

        .input-radiu {
            width: 70%;
            border: 1px solid #b9adad;
            border-radius: 50px;
            margin: auto;
            height: 1.5rem;
        }

        .input-radiu input {
            border: none;
            outline: none;
            background: transparent;
            height: 100%;
            text-align: center;
            color: #777777;
        }

        .QS-toast {
            z-index: 19891016 !important;
        }

        .share {
            background-color: rgba(0, 0, 0, .7);
            position: fixed;
            top: 0;
            width: 100%;
            height: 100vh;
            z-index: 1000;
            display: none;
        }

        #container {
            display: flex;
            width: 100vw;
            height: 100vh;
        }

        .confirm {
            margin: auto;
            background: white;
            width: 90%;
            border-radius: 5px;
            ;
            overflow: hidden;
        }

        .box {
            padding: 50px 30px;
            line-height: 22px;
            text-align: center;
        }

        .btn-cont {
            width: 100%;
            height: 50px;
            line-height: 50px;
            border-top: 1px solid #D0D0D0;
            background-color: #F2F2F2;
            display: flex;
        }

        .btn-cont>div {
            width: 50%;
            text-align: center;
            font-size: .7rem;
        }

        #on {
            color: #40AFFE;
            border-left: 1px solid #d0d0d0;
        }
        .data_title{text-align: left}
        .data_money,.return{text-align: right}
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>订单详情</span></header><div class="container"><div style="background: linear-gradient(135deg, #a26cd2  10%, #7a01f3 100%)"><div style="margin-top: 5px;font-weight: 500;color: white;font-size: 18px">等待买家确认</div><div style="color: white;font-size: 14px;margin-top: 10px;margin-bottom: 20px">
                您的订单将于<span id="timer">0分0秒</span>后进入超时状态
            </div></div><div class="site"><div style="padding-left: 40px"><p>收件人:<span class="user">-</span></p><p class="tel">-</p></div><div style="padding-left: 40px">收货地址: <span class="location">-</span></div></div><div style="position: relative;display: inline-block;top: -70px;"><img src="/public/img/address.png" alt="" style="width: 30px;height:30px"></div><div class="order" style="margin-top: -70px"><div class="order_info" ><div class="info_img2"><img src="/public/img/tb.png" alt="" style="width: 30px;height: 30px;"></div><div class="info_data"><p class="info_store" style="margin-top: 6px;font-size: 15px">-</p></div></div></div><div class="order"><div class="order_info"><div class="info_img"><img src="" alt=""></div><div class="info_data"><p class="info_name">-</p><div style="color: white;font-size: 14px;padding-top:2px;border-radius: 4px;width: 70px;height: 25px;text-align: center;background-color: #00B83F">官方担保</div></div><div class="info_money"><p class="money" style="margin-bottom: .5rem;">￥-.--</p><p>x<span class="info_num">-</span></p></div></div></div><div style="font-size: 13px;border-bottom: .3rem solid rgb(248, 242, 242);"><div style="float: left;width: 15%;margin-top: 10px"><img src="/public/img/profit.png" style="width: 30px;height: 30px" alt=""></div><div style="float: left;width: 70%;margin-top: 8px"><div style="font-weight: 600">可赚佣金</div><div style="color: #9c9c9c;font-size: 12px;margin-top: 3px">
                    提交订单后，平台会预支付定金给刷单用户</div></div><div style="float: right;width: 14%;margin-top: 15px" class="brokerage">￥-.--</div><div style="clear: both;"></div></div><p><span class="data_title">您可用余额:</span><span class="usable_num">-.--</span></p><div><div style="color: #9c9c9c;"><div style="float: left;">订单号</div><div style="float: right;" class="order_num">-</div></div><div style="clear: both;padding-top: 10px;color: #9c9c9c;"><div style="float: left;">预计返还</div><div style="float: right;" class="return">￥-.--</div></div><div style="clear: both;padding-top: 10px"><div style="float: left;">订单总价</div><div style="float: right;" class="data_money">￥-.--</div></div></div><input type="hidden" id="endtime" value="1"><div class="btn">提交订单</div></div><div class="share"><div id="container"><div class="confirm"><div class="box"><div class='input-radiu'><input placeholder='请输入交易密码' type='password' id='pwd2' class='int'></div></div><div class="btn-cont"><div id="off">取消</div><div id="on">确认</div></div></div></div></div></body><script>    var o=document.getElementById('timer');
    //在文档中根据id查找元素 并显示在页面
    function leftTimer(){
        console.log(123)
        var now=new Date();
        //创建一个新日期
        var endDate=new Date($("#endtime").val());

        //创建一个指定日期
        var leftTime = (endDate.getTime()-now.getTime())/1000;

        console.log(leftTime)

        if(leftTime > 0){

            // var days = parseInt(leftTime/60/60/24);
            //计算剩余的天数
//        var hours = parseInt(leftTime/60/60);
            //计算剩余的小时
            var minutes = parseInt(leftTime/60%60);
            //计算剩余的分钟
            var seconds = parseInt(leftTime%60);
            //计算剩余的秒数
            //拼接
            time =minutes+"分"+seconds+"秒";

            o.innerHTML=time;//将时间显示到div中
        }else {

            time ="0分0秒";
            o.innerHTML=time;//将时间显示到div中
        }
        //使两个日期都转换成毫秒 再让指定日期减去当前日期
        //计算出来的毫秒数除以1000 计算剩余秒数

    }












    var oid = sessionStorage.getItem('oid'),//订单ID
        add_id = "", submit = true;
    var url3 = '1';


    $(function() {
        $.ajax({
            url: urlPost("order/order_info"),
            type: "POST",
            dataType: "JSON",
            data: { id: oid },
            success: function(res) {
                console.log(res)
                var data = res.data,
                    total = ((Number(data.num) * 100 + Number(data.commission) * 100) / 100).toFixed(2)
                if (res.code == 0) {
                    $('.user').html(data.name);//收件人
                    $('.tel').html(data.tel);//电话
                    $('.location').html(data.address);//收件地址
                    $('.info_img>img').attr('src', data.goods_pic);//商品图片
                    $(".order_num").html(data.oid);//订单编号
                    $(".info_name").html(data.goods_name);//商品名
                    $(".info_store").html(data.shop_name);//店铺名
                    $('.money').html("￥" + data.goods_price);//商品单价
                    $('.info_num').html(data.goods_count);//商品数量
                    $(".data_money").html("￥" + data.num);//商品总价
                    $('.usable_num').html(data.balance);//可用余额
                    $('#endtime').val(data.endtime);//佣金
                    $('.brokerage').html("￥" + data.commission);//佣金
                    $('.return').html("￥" + total)//返还金额
                    url3 = data.cid;
                    add_id = data.add_id;

                    setInterval(leftTimer,1000);
                }
            },
            error: function(err) { console.log(err) }
        })
    })

    $("#pwd2").on('blur',function(){
        document.body.scrollIntoView(true);
    })

    // 选择收货地址
    $(".site").click(function()  {
        location.href = "./receive_site.html"
    })

    $("#off").click(function() {
        $('.share').hide()
    });


    var zhujiTime = "<?php echo config('deal_zhuji_time'); ?>";
    var shopTime = "<?php echo config('deal_shop_time'); ?>";

    zhujiTime = zhujiTime *1000;
    shopTime = shopTime *1000;

   // 提交订单
   $(".btn").click(function() {
        // $('.share').show()
        // 弱智需求要15秒提交成功
        var i = 0;
        layer.open({
            type: 2
            , content: '订单提交中',
            time: zhujiTime,
            shadeClose: false,
        });
        var timer = setInterval(function() {
            i++;
            if (i == 1) {
                layer.open({
                    type: 2
                    , content: '远程主机正在分配',
                    time: zhujiTime,
                    shadeClose: false,
                })
            } else if (i == 2) {
                layer.open({
                    type: 2
                    , content: '等待商家系统响应',
                    time: shopTime,
                    shadeClose: false,
                })
                var ajaxT = setTimeout(function(){
                    $.ajax({
                    url: urlPost("order/do_order"),
                    type: "POST",
                    dataType: "JSON",
                    data: { oid:oid, add_id:add_id },
                    success: function(res) {
                        console.log(res)
                        if (res.code == 0) {
                            QS_toast.show('订单提交成功', true);
                            clearInterval(timer)
                            var linkTime = setTimeout(function() {
                                location.href = "<?php echo url('rot_order/index'); ?>"+'?type='+url3
                            }, 1800);
                        }
                        sumbit = true;
                    },
                    error: function(err) { console.log(err); sumbit = true; }
                })
                },shopTime)
            }      
        }, zhujiTime)
    })

    $("#on").click(function() {
        if (submit) {
            submit = false;
            //验证交易密码
            $.ajax({
                url: urlPost("order/check_pwd2"),
                type: "POST",
                dataType: "JSON",
                data: { pwd2: $("#pwd2").val() },
                success: function(res) {
                    console.log(res)
                    if (res.code == 0) {
                        layer.open({
                            type: 2
                            , content: '订单提交中',
                            time: 2,
                            shadeClose: false,
                        });
                        var timer = setTimeout(function() {
                            $('.share').hide()
                            $.ajax({
                                url: urlPost("order/do_order"),
                                type: "POST",
                                dataType: "JSON",
                                data: { oid:oid, add_id:add_id },
                                success: function(res) {
                                    console.log(res)
                                    if (res.code == 0) {
                                        QS_toast.show('订单提交成功', true);
                                        var timer = setInterval(function() {
                                            location.href = "<?php echo url('rot_order/index'); ?>"
                                        }, 1800);
                                    }
                                    sumbit = true;
                                },
                                error: function(err) { console.log(err); sumbit = true; }
                            })
                        }, 2000)
                    } else {
                        QS_toast.show(res.info, true)
                    }
                },
                error: function(err) { console.log(err) }
            })

        }
    })
</script></html>