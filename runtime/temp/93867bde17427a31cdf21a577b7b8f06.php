<?php /*a:1:{s:81:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\index\view\user\login.html";i:1580211574;}*/ ?>
<html><head><meta charset="UTF-8"><title>用户登录</title><meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"><meta content="yes" name="apple-mobile-web-app-capable"><meta content="black" name="apple-mobile-web-app-status-bar-style"><meta content="telephone=no" name="format-detection"><link rel="stylesheet" href="/public/css/style2.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style type="text/css">
        .aui-flex-box input{
            padding-left:1rem;
        }

        .aui-jop-chang img{
            width: 6rem;
            height: 6rem;
            border-radius: 22%;
        }
    </style></head><body><section class="aui-flexView"><section class="aui-scrollView"><div class="aui-jop-chang"><img src="http://127.0.0.27/public/img/logo.png" alt=""></div><div class="aui-jop-top"><div class="aui-jop-top-box" style="margin-top: 2rem;"><div class="aui-flex b-line"><div class="aui-form-item"><img src="/statics/img/iphone.png" alt=""></div><div class="aui-flex-box"><input type="text" name="tel" id="tel" placeholder="请输入手机号码"></div></div><div class="aui-flex b-line"><div class="aui-form-item"><img src="/statics/img/psd.png" alt=""></div><div class="aui-flex-box"><input type="password" name="pwd" id="pwd" placeholder="请输入密码"></div><div class="aui-psd"><a href="./forget.html">忘记密码</a></div></div><div class="aui-form-button" id="login"><button>登录</button></div><div class="aui-register aui-register-a"><a style="display: inline-block;width:50%" href="<?php echo config('app_url'); ?>">下载App</a><a style="display: inline-block;width:50%" href="./register.html">注册账号</a></div></div></div></section><!-- <footer class="aui-footer-link"><a href="javascript:;" class="aui-tabBar-item aui-tabBar-item-active">登录即代表阅读并同意 <em>用户协议</em></a></footer> --><script type="text/javascript">        $("#login").click(function() {
            var tel = $('#tel').val(),
                pwd = $('#pwd').val();
            if (tel == "") {
                QS_toast.show("请输入账号", true)
            }
            else if (pwd == "") {
                QS_toast.show("请输入密码", true)
            } else {
                $.ajax({
                    url: "<?php echo url('do_login'); ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: { tel:tel, pwd:pwd },
                    success: function(res) {
                        console.log(res)
                        if(res.code==0){
                            QS_toast.show(res.info,true)
                            var timer = setTimeout(function(){
                                location.href="<?php echo url('index/home'); ?>"
                            },1800)
                        }else{
                            QS_toast.show(res.info,true)
                        }
                    },
                    error: function(err) { console.log(err) }
                })
            }

        })
    </script></section></body></html>