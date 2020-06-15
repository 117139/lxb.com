<?php /*a:1:{s:67:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\ctrl\set.html";i:1578925446;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>Document</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
        .list li {
            display: flex;
            height: 2.1rem;
            line-height: 2.1rem;
            border-top: 1px solid #eaeaea;
        }

        .list li div {
            margin: auto 0;
        }

        .list li .icon {
            width: 1.5rem;
            height: 1.5rem;
            margin: auto 1rem;
            display: flex;
        }

        .icon>i {
            display: block;
            width: 1rem;
            height: 1rem;
            background-size: 100%;
            background-repeat: no-repeat;
            margin: auto;
        }

        .list li .right {
            width: 1.2rem;
            height: 1.7rem;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url(/public/img/right.png);
            margin: auto 1rem auto auto;
        }

        .list li:nth-child(1) .icon>i {
            background-position: 2px 0px;
            background-size: 78%;
            background-image: url(/public/img/set_xg.png);
        }

        .list li:nth-child(2) .icon>i {
            background-position: 2px 0px;
            background-size: 78%;
            background-image: url(/public/img/set_tx.png);
        }

        .list li:nth-child(3) .icon>i {
            background-size: 74%;
            background-position: 2px 0px;
            background-image: url(/public/img/set_sj.png);
        }

        .list li:nth-child(4) .icon>i {
            background-image: url(/public/img/set_qc.png);
        }
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>设置</span></header><div class="container"><div class="co"></div><ul class="list"><li onclick="location.href=`<?php echo url('ctrl/edit_pwd'); ?>`"><div class="icon" style="background: rgb(133, 179, 107);"><i></i></div><div>修改密码</div><div class="right"></div></li><li onclick="location.href=`<?php echo url('ctrl/edit_deposit_pwd'); ?>`"><div class="icon" style="background:rgb(147, 92, 175)"><i></i></div><div>交易密码</div><div class="right"></div></li><li  onclick="location.href=`<?php echo url('my/bind_tel'); ?>`"><div class="icon" style="background: rgb(236, 90, 90);"><i></i></div><div>手机绑定</div><div class="right"></div></li><li class="clean"><div class="icon" style="background: rgb(45, 190, 195);"><i></i></div><div>清除缓存</div><div class="right"></div></li></ul></div></body><script>
    $('.clean').click(function() {
        layer.open({
            type: 2
            , content: '正在清理',
            time:2,
            shadeClose: false,
        });
        var timer = setTimeout(function() {
            QS_toast.show('缓存清除成功',true)
        }, 2000);
    })
</script></html>