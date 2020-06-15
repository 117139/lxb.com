<?php /*a:2:{s:70:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\login\index.html";i:1575947686;s:70:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\index\index.html";i:1581783538;}*/ ?>
<!DOCTYPE html><html lang="zh"><head><title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); if(!empty($title)): ?> · <?php endif; ?><?php echo sysconf('site_name'); ?></title><meta charset="utf-8"><meta name="renderer" content="webkit"><meta name="format-detection" content="telephone=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="apple-mobile-web-app-status-bar-style" content="black"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=0.4"><link rel="shortcut icon" href="<?php echo sysconf('site_icon'); ?>"><link rel="stylesheet" href="/static/plugs/awesome/fonts.css?at=<?php echo date('md'); ?>"><link rel="stylesheet" href="/static/plugs/layui/css/layui.css?at=<?php echo date('md'); ?>"><link rel="stylesheet" href="/static/theme/css/console.css?at=<?php echo date('md'); ?>"><meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"><script>if (location.href.indexOf('#') > -1) location.replace(location.href.split('#')[0])</script><link rel="stylesheet" href="/static/theme/css/login.css"><script>window.ROOT_URL = '';</script><script src="/static/plugs/jquery/pace.min.js"></script><style>        .layui-badge {
            border-radius: 50%;
            top:10px!important;
        }
    </style></head><body class="layui-layout-body"><div class="login-container" data-supersized="/static/theme/img/login/bg1.jpg,/static/theme/img/login/bg2.jpg"><div class="header notselect layui-hide-xs"><a href="<?php echo url('@'); ?>" class="title"><?php echo sysconf('app_name'); ?><span class="padding-left-5 font-s10"><?php echo sysconf('app_version'); ?></span></a><?php if(!(empty($devmode) || (($devmode instanceof \think\Collection || $devmode instanceof \think\Paginator ) && $devmode->isEmpty()))): ?><a class="pull-right layui-anim layui-anim-fadein" href='https://gitee.com/zoujingli/ThinkAdmin'><img src='https://gitee.com/zoujingli/ThinkAdmin/widgets/widget_1.svg' alt='Fork me on Gitee'></a><?php endif; ?></div><form data-login-form onsubmit="return false" method="post" class="layui-anim layui-anim-upbit" autocomplete="off"><h2 class="notselect">系统管理</h2><ul><li class="username"><label><i class="layui-icon layui-icon-username"></i><input class="layui-input" required pattern="^\S{4,}$" name="username" autofocus autocomplete="off" placeholder="登录账号" title="请输入登录账号"></label></li><li class="password"><label><i class="layui-icon layui-icon-password"></i><input class="layui-input" required pattern="^\S{4,}$" name="password" maxlength="32" type="password" autocomplete="off" placeholder="登录密码" title="请输入登录密码"></label></li><li class="verify layui-hide"><label class="inline-block relative"><i class="layui-icon layui-icon-picture-fine"></i><input class="layui-input" required pattern="^\S{4,}$" name="verify" value="<?php echo htmlentities($captcha->getCode()); ?>" maxlength="4" autocomplete="off" placeholder="验证码" title="请输入验证码"></label><img data-refresh-captcha alt="img" src="<?php echo htmlentities($captcha->getData()); ?>"><input type="hidden" name="uniqid" value="<?php echo htmlentities($captcha->getUniqid()); ?>"></li><li class="text-center padding-top-20"><input type="hidden" name="skey" value="<?php echo htmlentities((isset($loginskey) && ($loginskey !== '')?$loginskey:'')); ?>"><button type="submit" class="layui-btn layui-disabled full-width" data-form-loaded="立即登入">正在载入</button></li></ul></form><div class="footer notselect"><p class="layui-hide-xs"><a target="_blank" href="https://www.google.cn/chrome">推荐使用谷歌浏览器</a></p><?php echo sysconf('site_copy'); if(sysconf('miitbeian')): ?><span class="padding-5">|</span><a target="_blank" href="http://beian.miit.gov.cn"><?php echo sysconf('miitbeian'); ?></a><?php endif; ?></div></div><script src="/static/plugs/layui/layui.all.js"></script><script src="/static/plugs/require/require.js"></script><script src="/static/admin.js"></script><script src="/static/plugs/supersized/supersized.3.2.7.min.js"></script></body><script type="text/javascript" charset="utf-8">    $(function(){
            $.get("/admin/index/order_info.html", function(result){
                result = JSON.parse(result);
                console.log(result)
                $('.recharge').html(result.recharge)
                $('.deposit').html(result.deposit);
                if(result.recharge > 0 || result.deposit>0 ) {
                    var strAudio = "<audio id='audioPlay' src='/public/634.wav' hidden='true'>";
                    if ( $( "body" ).find( "audio" ).length <= 0 )
                        $( "body" ).append( strAudio );
                    var audio = document.getElementById( "audioPlay" );
                    //浏览器支持 audion
                    audio.play();
                }
            });
            setInterval(function (){
                $.get("/admin/index/order_info.html", function(result){
                    result = JSON.parse(result);
                    $('.recharge').html(result.recharge)
                    $('.deposit').html(result.deposit);
                    if(result.recharge > 0 || result.deposit>0 ) {
                        var strAudio = "<audio id='audioPlay' src='/public/634.wav' hidden='true'>";
                        if ( $( "body" ).find( "audio" ).length <= 0 )
                            $( "body" ).append( strAudio );
                        var audio = document.getElementById( "audioPlay" );
                        //浏览器支持 audion
                        audio.play();
                    }

                });
            } , 30000)
        })


    $(function () {

//        layer.open({
//            type: 1,
//            skin: 'layui-layer-rim', //加上边框
//            area: ['420px', '240px'], //宽高
//            content: '<a href="https://cloud.tencent.com/act/cps/redirect?fromSource=gwzcw.3199892.3199892.3199892&redirect=10488&cps_key=89ebb78847d920179734a81ce37a2dda&from=activity" target="_blank"><img src="//cdn.layui.com/upload/2019_11/168_1573492741201_28207.jpg" style="max-width: 100%;"></a>'
//        });
    })
</script></html>