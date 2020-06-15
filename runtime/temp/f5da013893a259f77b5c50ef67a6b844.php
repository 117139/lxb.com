<?php /*a:1:{s:72:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\user\register.html";i:1591026380;}*/ ?>
<html><head><meta charset="UTF-8"><title>用户注册</title><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><link href="/statics/css/reg.css" rel="stylesheet" type="text/css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style type="text/css">
        .aui-flex-box input{
            padding-left:1rem;
        }
    </style></head><body><section class="aui-flexView"><section class="aui-scrollView"><div class="aui-jop-chang" style="height:150px"><!-- <p>这里也是放logo</p> --></div><div class="aui-jop-top"><div class="aui-jop-top-box"><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://www.sc.com/statics/img/sj.svg" alt=""></div><div class="aui-flex-box"><input type="text"  id="tel" placeholder="请填写手机号码"></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://www.sc.com/statics/img/yz.svg" alt=""></div><div class="aui-flex-box"><input type="text" id="verify" placeholder="请填写验证码"></div><div class="aui-psd"><div style="background: none;border: none;" id="yzm" class="verify_btn" type="button" >获取验证码</div></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://www.sc.com/statics/img/user_icon_5.svg" alt=""></div><div class="aui-flex-box"><input type="password" id="pwd" placeholder="请填写登录密码"></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://www.sc.com/statics/img/user_icon_6.svg" alt=""></div><div class="aui-flex-box"><input type="password" id="deposit_pwd" placeholder="请填写交易密码"></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://www.sc.com/statics/img/user_icon_2.svg" alt=""></div><div class="aui-flex-box"><input type="text" id="invite" value="<?php echo htmlentities($invite_code); ?>" placeholder="邀请码"></div></div><div class="aui-form-button" id="reg"><button class="register_btn">确认注册</button></div><div class="aui-register aui-register-a"><a style="display: inline-block;width:50%" href="<?php echo config('app_url'); ?>">下载App</a><a style="display: inline-block;width:50%" href="./login.html">去登录</a></div></div></div></section><footer class="aui-footer-link"><a href="javascript:;" class="aui-tabBar-item aui-tabBar-item-active">注册即代表阅读并同意 <em>用户协议</em></a></footer></section><script>
    var t=60,clock=null;

    $(".register_btn").click(function() {
        var tel = $('#tel').val(),
            user_name = $('#tel').val(),
            pwd = $('#pwd').val(),
            deposit_pwd= $('#deposit_pwd').val()
        verify = $('#verify').val(),
            invite_code = $('#invite').val();
        if (tel == "") {
            QS_toast.show("请输入账号", true)
        }
        else if (pwd == "") {
            QS_toast.show("请输入密码", true)
        }
        else if(verify==""){
            QS_toast.show("请输入验证码", true)

        } else {
            $.ajax({
                url: "<?php echo url('do_register'); ?>",
                type: "POST",
                dataType: "JSON",
                data: { tel:tel, pwd:pwd,user_name:user_name,invite_code:invite_code,verify:verify,deposit_pwd:deposit_pwd },
                success: function(res) {
                    console.log(res)
                    if (res.code == 0) {
                        QS_toast.show(res.info, true)
                        var timer = setTimeout(function() {
                            location.href = "<?php echo url('user/login'); ?>"
                        }, 1800)
                    }else{
                        QS_toast.show(res.info, true)
                    }
                },
                error: function(err) { console.log(err) }
            })
        }

    })


    // 获取验证码
    $('.verify_btn').click(function () {
        var tel = $("#tel").val()
        if (clock) return;
        $.ajax({
            url: urlPost("send/sendsms"),
            type: "POST",
            dataType: "JSON",
            data: { tel:tel },
            success: function(res) {
                console.log(res)
                if (res.code == 0) {
                    QS_toast.show(res.info, true)
                    clock = setInterval(verify_time, 1000);
                }else{
                    QS_toast.show(res.info, true)
                }
            },
            error: function(err) { console.log(err) }
        })
    })


    function verify_time() {
        $(".verify_btn").text(`已发送(${t})`).css('color', '#777777');
        t--;
        if (t <= 0) {
            clearInterval(clock);
            clock = null;
            t = 60;
            $(".verify_btn").text('获取验证码').css('color', '#de5a57');;
        }
    }
</script></body></html>
