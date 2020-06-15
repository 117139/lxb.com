<?php /*a:1:{s:71:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\ctrl\lixibao.html";i:1581431676;}*/ ?>
<html><head><meta charset="utf-8"><meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable = 0"><title>利息宝</title><link href="http://www.sc.com/statics/css/base.css" rel="stylesheet"><link href="http://www.sc.com/statics/css/funding.css" rel="stylesheet"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/common.js"></script><style>
        .add {
            position: absolute;
            width: 1.0rem;
            line-height: 1.8rem;
            top: 0;
            bottom: 0;
            right: .3rem;
            margin: auto;
            /* background-image: url(/public/img/add.png); */
            background-size: 80%;
            background-repeat: no-repeat;
        }
        .vpay-account .vpay-account-details li{
            width:33.3%;
        }
        .vpay-account .vpay-account-details li:nth-of-type(2):after{
            width: 1px;
            height: .8rem;
            content: '';
            background: rgba(255, 255, 255, .3);
            position: absolute;
            right: 0;
            top: .9rem;
        }
    </style></head><body><header class="header"><div class="header-return"><a href="javascript:history.go(-1);"></a></div><div class="logo">利息宝</div><div class="add" style="font-size: 12px" onclick="location.href=`/index/support/detail/7.html?id=7`">规则</div></header><section class="container vpay-container"><div class="vpay-account"><div class="vpay-account-balance"><span>利息宝(元)</span><h1><?php echo htmlentities($balance_total); ?></h1></div><div class="vpay-account-details"><ul><li><a href=""><span>可提现金额</span><h3><?php echo htmlentities($balance); ?></h3></a></li><li><a href=""><span>日利率</span><h3><?php echo htmlentities($rililv); ?></h3></a></li><li><a href=""><span>总收益</span><h3><?php echo htmlentities($balance_shouru); ?></h3></a></li></ul></div></div><div class="vpay-record"><div class="tab-title tab-title-s"><div class="tab-item"><div class="lava" style="left: 0px;width:100%" ></div><span class="active" style="width: 100%;">收益记录</span></div></div><div class="tab-content vpay-list" style="left: 0px;"><div><div class="record-list"><div class="record-list-title"><span>时间</span><span>当日收益</span><span>收益类型</span></div><?php if($shouyi): if(is_array($shouyi) || $shouyi instanceof \think\Collection || $shouyi instanceof \think\Paginator): $i = 0; $__LIST__ = $shouyi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="record-list-content"><span><?php echo date('Y/m/d H:i', $vo['addtime']); ?></span><span><b class="record-red"><?php echo htmlentities($vo['num']); ?></b></span><span><?php echo $vo['type']; ?></span></div><?php endforeach; endif; else: echo "" ;endif; else: ?><?php endif; ?><!-- <div class="load-no-more"><span>没有更多了</span></div> --></div></div><!-- <div><div class="no-content"><i></i><p>没有找到相关记录</p></div></div> --></div></div></section><div class="vpay-toolbar"><a href="<?php echo url('ctrl/lixibao_ru'); ?>">转入</a><a href="<?php echo url('ctrl/lixibao_chu'); ?>">转出</a></div><script src="http://www.sc.com/statics/js/main.js"></script><script>
    $(function () {

        setTimeout(function (){
            $('.tab-item .active').prev().click();
            $('.tab-item .active').prev().trigger("click");

        }, 3000);
    })
</script></body></html>