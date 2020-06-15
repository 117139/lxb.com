<?php /*a:1:{s:82:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\index\view\user\forget.html";i:1591026647;}*/ ?>
<html><head><meta charset="UTF-8"><title>忘记密码</title><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><link rel="stylesheet" href="/public/css/style2.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style type="text/css">
        .aui-flex-box input{
            padding-left:1rem;
        }

        .aui-jop-chang img{
            width: 6rem;
            height: 6rem;
            border-radius: 22%;
        }
    </style></head><body><section class="aui-flexView"><section class="aui-scrollView"><div class="aui-jop-chang" style="height: 150px"><img src="http://127.0.0.27/public/img/logo.png" alt="" style="border-radius: 50%"></div><div class="aui-jop-top"><div class="aui-jop-top-box" style="margin-top: 2rem;"><div class="aui-flex b-line"><div class="aui-form-item"><img src="/statics/img/iphone.png" alt=""></div><div class="aui-flex-box"><input type="text" name="tel" id="tel" placeholder="请输入手机号码"></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://127.0.0.27/statics/img/yz.svg" alt=""></div><div class="aui-flex-box"><input type="text" id="verify" placeholder="请填写验证码"></div><div class="aui-psd"><div style="background: none;border: none;" class="verify_btn" type="button" >获取验证码</div></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://127.0.0.27/statics/img/user_icon_5.svg" alt=""></div><div class="aui-flex-box"><input type="password" id="pwd" placeholder="请填写登录密码"></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="http://127.0.0.27/statics/img/user_icon_5.svg" alt=""></div><div class="aui-flex-box"><input type="password" id="again_pwd" placeholder="请再次输入密码"></div></div><div class="aui-form-button" id="login"><button class="register_btn">确认</button></div></div></div><div class="aui-register"><a href="<?php echo url('user/login'); ?>">去登录</a></div></section><!-- <footer class="aui-footer-link"><a href="javascript:;" class="aui-tabBar-item aui-tabBar-item-active">登录即代表阅读并同意 <em>用户协议</em></a></footer> --><script>
        var t = 60, clock = null;


        $(".register_btn").click(function() {
            var tel = $('#tel').val(),
                pwd = $('#pwd').val(),
                again_pwd = $('#again_pwd').val(),
                verify = $('#verify').val();
            if (tel == "") {
                QS_toast.show("请输入手机号", true)
            }
            else if(verify==""){
                QS_toast.show("请输入验证码", true)
            }
            else if (pwd == "") {
                QS_toast.show("请输入密码", true)
            } else if (again_pwd != pwd) {
                QS_toast.show("两次密码不一致", true)
            } else {
                $.ajax({
                    url: "do_forget",
                    type: "POST",
                    dataType: "JSON",
                    data: { tel:tel, pwd:pwd, verify:verify },
                    success: function(res) {
                        console.log(res)
                        if (res.code == 0) {
                            QS_toast.show(res.info, true)
                            var timer = setTimeout(function() {
                                location.href = "<?php echo url('user/login'); ?>"
                            }, 1800)
                        } else {
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
                data: { tel:tel ,type:2},
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
                $(".verify_btn").text('获取验证码2').css('color', '#de5a57');
            }
        }
    </script></section></body></html>
