<?php /*a:1:{s:61:"/www/wwwroot/lxb.com/application/index/view/ctrl/deposit.html";i:1582892365;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>充值</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
        .form {
            height: 2rem;
            line-height: 2rem;
            color: rgb(240, 98, 96);
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            padding: 0 .5rem;
            border-bottom: 1px solid #eeeeee;
        }

        .form>div:nth-child(2) {
            margin-right: auto;
            margin-left: 1rem;
            max-width: 60%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .form_title {
            font-size: .5rem;
            width: 20%;
        }

        .copy_btn {
            color: #60aef0;
            width: 10%;
            text-align: center;
            height: 2rem;
            line-height: 2rem;
        }

        #bank_site {
            overflow-x: scroll !important;
            text-overflow: initial;
            white-space: initial;
        }

        .user_info {
            height: 2rem;
            line-height: 2rem;
            display: flex;
            padding: 0 .5rem;
            border-bottom: 1px solid #eeeeee;
        }

        .user_info>div:first-child {
            width: 20%;
            height: 100%;
            display: flex;
        }

        .icon {
            width: 1.3rem;
            height: 1.3rem;
            background-size: cover;
            background-repeat: no-repeat;
            margin: auto 0 auto auto;
            background-position: -1px 0px;
        }

        .user_info>.input {
            margin-left: 1rem;
            width: 60%;
            border: none;
            outline: none;
        }

        .user_box>.user_info:nth-child(1) .icon {
            background-image: url(/public/img/name.png);
        }

        .user_box>.user_info:nth-child(2) .icon {
            background-image: url(/public/img/phone.png);
            background-size: 80%;
            background-position: 4px 0px;
            width: 1.4rem;
            height: 1.4rem;
        }

        .user_box>.user_info:nth-child(3) .icon {
            background-image: url(/public/img/bank1.png);
        }

        .user_box>.user_info:nth-child(4) .icon {
            background-size: 90%;
            background-position: 3px 0px;
            width: 1.6rem;
            background-image: url(/public/img/card.png);
        }

        .user_box>.user_info:nth-child(5) .icon {
            background-position: 0px 0px;
            background-image: url(/public/img/money.png);
        }

        .btn {
            width: 90%;
            height: 2rem;
            line-height: 2rem;
            text-align: center;
            color: white;
            margin: 3rem auto 0;
            border-radius: 5px;
            background: #8BC34A;
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
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>提现</span></header><div class="container"><div class="user_box"><div class="user_info"><div><div class="icon"></div></div><input class="input" type="text" placeholder="请输入开户人" id="name" ></div><div class="user_info"><div><div class="icon"></div></div><input class="input" type="text" placeholder="请输入开户人联系方式" id="tel" ></div><div class="user_info"><div><div class="icon"></div></div><input class="input" type="text" placeholder="请输入银行名称" id="bank" ></div><div class="user_info"><div><div class="icon"></div></div><input class="input" type="text" placeholder="请输入银行卡号" id="bank_card" ></div><div class="user_info"><div><div class="icon"></div></div><input class="input" type="text" placeholder="请输入提现金额" id="num"></div><p style="padding-left: 20px;font-size: 12px">实际到账:  <span id="num2"></span></p></div><div style="padding: 20px;font-size: 12px">
            可用余额: <?php echo htmlentities($user['balance']); ?><a href="javascript:void(0)" onclick="return tixianAll(<?php echo htmlentities($user['balance']); ?>)" style="margin-left:20px">全部提现</a><p style="margin-top:5px">当前等级手续费: <?php echo htmlentities($shouxu*100); ?>% <a href="/index/ctrl/vip"  style="margin-left:20px">去升级</a></p><p style="margin-top:5px">微众客提现到账时间:T+到账</p></div><div class="share"><div id="container"><div class="confirm"><div class="box"><div class='input-radiu'><input placeholder='请输入交易密码' type='text' id='pwd2' class='int'><p style="margin-top:5px">提现到账时间:T+1到账</p></div></div><div class="btn-cont"><div id="off">取消</div><div id="on" data-start="0">确认</div></div></div></div></div><div class="btn">确定</div></div></body><script>
    var bk_id = "", submit = true,num=0,shouxu='';
    $(function() {
        $.ajax({
            url: urlPost("ctrl/do_deposit"),
            type: "GET",
            dataType: "JSON",
            data: {},
            success: function(res) {
                console.log(res)
                if (res.code == 0) {
                    var data = res.data;

                    $("#name").val(data.username)
                    $("#tel").val(data.tel)
                    $("#bank").val(data.bankname)
                    $("#bank_card").val(data.cardnum)
                    bk_id = data.id;
                    shouxu = data.shouxu;

                    if (bk_id =="" || bk_id==0) {
                        //询问框
                        layer.confirm('未绑定银行卡,前往绑定？', {
                            btn: ['取消','前往绑定'] //按钮
                        }, function(){
                            window.location.href="/index/ctrl/bank";
                        }, function(){

                        });
                    }
                }else {
                    //询问框
                    layer.open({
                        content: res.info
                        ,btn: ['返回']
                        ,yes: function(index){
                            layer.close(index);
                            history.back(-1)
                        }
                    });
                }
            },
            error: function(err) { console.log(err); submit = true }
        })
    });

    $("#num").bind("input propertychange",function(event){
        var v = $("#num").val();

        $('#num2').html(v - (v * shouxu) )
    });


    $("#pwd2").on('focus',function(){
        document.body.scrollIntoView(true);
    })
    $("#off").click(function() {
        $('.share').hide()
    })

    $('.btn').click(function() {
        num = $("#num").val();
        if (num == "") {
            QS_toast.show("请输入提现金额", true)
        } else {
            $('.share').show();
        }
    })


    function tixianAll(price)
    {
        $('#num').val(price);
        $('#num2').html(price-price*shouxu);
    }

    $("#off").click(function() {
        layer.closeAll();
    });

    $("#on").click(function() {
        if ($('#on').attr('data-start') == 1) {
            return false;
        }
        var index2 = layer.open({
            type: 2
            ,shade: true
            ,time:  10
            ,shadeClose:false
        });

        if ($("#pwd2").val() == "") {
            QS_toast.show("请输入交易密码", true)
        }

        //验证交易密码
        $.ajax({
            url: urlPost("order/check_pwd2"),
            type: "POST",
            dataType: "JSON",
            data: { pwd2: $("#pwd2").val() },
            success: function(res) {
                console.log(res);
                $("#pwd2").val('');
                if (res.code == 0) {
                    // 发起提现请求
                    $.ajax({
                        url: urlPost("ctrl/do_deposit"),
                        type: "POST",
                        dataType: "JSON",
                        data: { num:num, bk_id:bk_id },
                        success: function(res) {
                            console.log(res)
                            if (res.code == 0) {
                        $('.share').hide();
                                QS_toast.show('提现申请已提交！到账方式：T+1', true)
                                var timer = setTimeout(function() {
                                    history.back(-1)
                                }, 1500)
                            } else {
                                QS_toast.show(res.info, true)
                                submit = true;
                            }

                            $('#on').attr('data-start',0);
                            layer.close(index2);
                        },
                        error: function(err) {
                            console.log(err); submit = true;
                            $('#on').attr('data-start',0);
                            layer.close(index2);
                        }
                    })
                } else {
                    QS_toast.show(res.info, true);
                    $('#on').attr('data-start',0);
                    layer.close(index2);
                }
                //$('#on').attr('data-start',0);
            },
            error: function(err) {
                console.log(err)
                $('#on').attr('data-start',0);
                layer.close(index2);
                $("#pwd2").val('');
            }
        })
    }) 
</script></html>