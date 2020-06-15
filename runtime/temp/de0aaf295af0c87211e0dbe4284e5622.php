<?php /*a:1:{s:65:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\my\invite.html";i:1578925444;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>我要分享</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/common.js"></script><style>
        .btn{
            text-align: center;
            position: fixed;
            bottom: 60vh;left: 0;right: 0;
            margin: auto;
            color: white;
        }
        .container>img{
            width: 100vw;
            height: 100%;
        }
        .container{
            padding-bottom: 0;
            height: 100vh;
        }
    </style></head><body><header><div class="back" onclick="history.back(-1)"></div><span>我要分享</span></header><div class="container"><img src="<?php echo htmlentities($pic); ?>" onerror="this.src='/public/img/userqr1.png'" alt=""></div></body></html>