<?php /*a:1:{s:65:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\my\msg.html";i:1578925446;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>我的消息</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><style>
        .msg-list li{
            min-height: 2.5rem;
            position: relative;
        }
       .msg-list li .txt{
            line-height: 2.5rem;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            border-bottom: 1px solid #eeeeee;
            
        }
       .msg-list li .txt i{
            position: absolute;
            width: .3rem;
            height: .3rem;
            border-radius: 50%;
            background: red;
            top: .7rem;
            left: .5rem;
        }
        .cont{
            line-height: 2rem;
            display: none;
            padding: 0 1rem;
            font-size: .6rem;
            color: #777777;
            border-bottom: 1px solid #eeeeee;
        }
        .active .cont{
            display: block;
        }
       .right{
            width: 1rem;
            height: 1.2rem;
            top: 0;bottom: 0;
            margin: auto 0;
            background-image: url(/public/img/right.png);
            background-size: cover;
            background-repeat: no-repeat;
            transition: all .1s linear;
        }
        .active span{
            transform: rotate(90deg)
        }
        .txt p{
            width: 70%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }  
    </style></head><body><header><div class="back" onclick="history.back(-1)"></div><span>我的消息</span></header><div class="container"><ul class="msg-list"><?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data='<?php echo htmlentities($vo['id']); ?>' read='<?php echo htmlentities($vo['rid']); ?>' ><div class="txt"><?php if(empty($vo['rid']) || (($vo['rid'] instanceof \think\Collection || $vo['rid'] instanceof \think\Paginator ) && $vo['rid']->isEmpty())): ?><i class='read'></i><?php endif; ?><p><?php echo htmlentities($vo['title']); ?></p><span class="right"></span></div><div class="cont"><p><?php echo $vo['content']; ?></p><p>通知时间:<?php echo htmlentities(date('Y-m-d H:i',!is_numeric($vo['addtime'])? strtotime($vo['addtime']) : $vo['addtime'])); ?></p></div></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></body><script>
     $('.msg-list li').click(function(){    
            var _this = $(this);
            if(!$(this).hasClass('active')){
                var id = $(this).attr('data');
                var read = $(this).attr('read');
                if(!read){
                    $.ajax({
                        type : "POST",
                        url : "<?php echo url('my/reads'); ?>",
                        dataType: "json",
                        data : {'id': id},
                        success : function(result) { 
                            _this.children('.txt').children('.read').remove();
                        },
                    });  
                }
            }
            $(this).toggleClass('active');
              
        })
</script></html>