<?php /*a:1:{s:77:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\ctrl\recharge_woaipay.html";i:1592207618;}*/ ?>

<!DOCTYPE html><html><head><title>
    在线充值
</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0"/><meta content="yes" name="apple-mobile-web-app-capable"/><meta content="black" name="apple-mobile-web-app-status-bar-style"/><meta content="telephone=no" name="format-detection"/><style>
        * {
            margin: 0;
            padding: 0;
        }
        .pay .w-pay-money span {
            font-size: 12px;
            font-weight: normal;
        }

        .pay .w-pay-type img {
            position: absolute;
            left: 1px;
            top: 6px;
        }

        .pay .w-pay-selected img, .w-pay-type:hover img {
            left: 0;
            top: 5px;
        }

        .pay .w-pay-bankLogo img {
            position: absolute;
            left: 2px;
            top: 2px;
            display: block;
            width: 50px;
            height: 45px;
        }

        .pay .w-pay-bankLogo:hover img {
            left: 1px;
            top: 1px;
        }


        .pay .z-sel s,.z-initsel s,.z-Btn-ok b{background:url(/static/woaipay/member-icon.png);background-size:40px auto;}

        .pay, .pay button, .pay input, .pay select, .pay textarea {
            font-size: 12px;
            font-family: arial, 微软雅黑;
        }

        :focus {
            outline: 0;
        }

        .pay img {
            border: 0;
        }

        .pay  ul, li {
            list-style: none;
        }

        .pay div, .pay ul, .pay li, .pay dl, .pay dt, .pay dd, .pay table, .pay td, .pay input {
            font-size: 12px;
        }

        input, select, textarea {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            -webkit-appearance: none;
            border: 0;
            border-radius: 0;
        }

        .clearfix:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        .clearfix {
            display: inline-block;
        }

        * html .clearfix {
            height: 1%;
        }

        .clearfix {
            display: block;
        }


        a {
            color: #000;
            text-decoration: none;
            outline: medium none;
        }

        a:hover {
            color: #C00;
        }

        .orange {
            color: #f60;
        }


        h1, h2, h3, h4, b {
            font-weight: normal;
        }

        .m-round {
            border: 1px solid #DCDCDC;
            border-radius: 5px;
            background: #fff;
            box-shadow: 1px 1px 1px #e7e7e7;
        }



        .z-HReturn s, .z-HReturn b {
            background: url(/static/woaipay/mainIcon.png);
            background-size: 80px auto;
        }




        .orgBtn {
            display: block;
            width: 100%;
            -webkit-box-sizing: border-box;
            height: 43px;
            line-height: 43px;
            text-align: center;
            color: #fff !important;
            border-radius: 5px;
            font-size: 18px;
        }

        .orgBtn {

            border: 1px solid #ef6000;
            /* background: #4eaf00; */
						background: #0035A0;
            max-width:250px;
            margin: 25px auto;
        }
        .z-sort i, .z-RCornerBtn i {
            width: 5px;
            height: 34px;
            display: inline-block;
            background-position: 0 -110px;
            background-color: #f60;
            position: absolute;
            left: 0;
            top: 0;
        }



        .g-header {
            height: 44px;
            background: #f60;
            border-bottom: 1px solid #e35b00;
            background-image: linear-gradient(135deg, #a26cd2 10%, #7a01f3 100%);
						background: #0035A0;
            position: relative;
        }

        .g-header h2 {
            text-align: center;
            color: #fff;
            line-height: 44px;
            text-shadow: 1px 1px 0 #C04D00;
        }

        .g-header .head-l, .g-header .head-r {
            position: absolute;
            top: 6px;
        }

        .g-header .head-r .z-shop {
            margin-left: 3px;
        }

        .g-header .head-l {
            left: 3px;
        }

        .z-HReturn {
            height: 33px;
            line-height: 33px;
            padding-left: 15px;
            display: inline-block;
            position: relative;
        }

        .z-HReturn b {
            display: inline-block;
            background-position: right -196px;
            padding: 0 11px 0 5px;
            color: #fff;
        }

        .z-HReturn s {
            width: 15px;
            height: 33px;
            background-position: 0 -162px;
            display: inline-block;
            position: absolute;
            left: 0;
            top: 0;
            overflow: hidden;
        }

        .g-header .head-r {
            right: 6px;
        }



        .g-member {
            background: #F4F4F4;
            padding: 10px 5px;
        }

        .g-Total {
            background: #F4F4F4;
            border-bottom: 1px solid #DCDCDC;
            line-height: 30px;
            padding: 5px 10px 0;
            font-size: 14px;
        }

        .g-Recharge ul:after {
            content: "\0020";
            display: block;
            height: 0;
            clear: both;
        }

        .g-Recharge ul {
            zoom: 1;
        }

        .g-Recharge li {
            width: 33%;
            float: left;
            margin-bottom: 10px;
        }

        .g-Recharge li:nth-child(3n-1) {
            width: 34%;
            text-align: center;
        }

        .g-Recharge li:nth-child(3n-3) {
            text-align: right;
        }

        .g-Recharge li a,.z-initsel, .g-Recharge li b {
            color: #959595;
            width: 90%;
            line-height: 30px;
            display: inline-block;
            background: #fff;
            border-radius: 3px;
            text-align: center;
            border: 1px solid #EAEAEA;
            box-shadow: 1px 1px 1px #EDEDED;
            position: relative;
        }

        .g-Recharge li a.z-sel s{
            width: 18px;
            height: 18px;
            position: absolute;
            right: -1px;
            bottom: -1px;
            display: inline-block;
            background-position: 0 0;
        }
        .z-initsel s {
            width: 18px;
            height: 18px;
            position: absolute;
            right: -1px;
            bottom: -1px;
            display: inline-block;
            background-position: 0 0;
        }
        #ulBankList li a.z-initsel {
            border: 1px solid #F60;
            color: #666;
        }
        .g-Recharge li a.z-sel {
            border: 1px solid #F60;
            color: #666;
        }

        .g-Recharge li input {
            color: #959595;
        }


        .g-Recharge li .z-initsel input {
            color: #666;
        }

        .g-Recharge li .z-init {
            width: 90%;
            padding: 7px 0;
            text-align: center;
            border: none;
        }

        .f-Recharge-btn {
            display: block;
        }


        .g-pay-ment {
            overflow: hidden;
        }

        .g-pay-ment li {
            line-height: 35px;
            border-top: 1px dotted #CBCBCB;
            max-height: 70px;
            padding: 5px 0px 20px 0px;
            overflow: hidden;
            margin-top: -1px;
            float: left;
        }
        .g-pay-ment li a{
            width:100%;
            max-width: 150px;
        }
        .g-pay-ment li img{
            width:100%;
            max-width: 150px;
            vertical-align: middle;
            border: 1px solid #EAEAEA;

        }


        a:link {
            text-decoration: none;
        }

        　　 a:active {
            text-decoration: blink
        }

        　　 a:hover {
            text-decoration: underline;
        }

        　　 a:visited {
            text-decoration: none;
        }

        *, :after, :before {
            /* -webkit-box-sizing: border-box; */
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        button, html input[type=button], input[type=reset], input[type=submit] {
            -webkit-appearance: button;
            cursor: pointer;
        }
        .z-HLeft{
            position: absolute;
            left: 3%;
            top: 28%;
            color: #fff;
            font-size:0.9rem;

        }
    </style></head><body><div id="loadingPicBlock" style="max-width: 720px;margin:0 auto;" class="pay"><header class="g-header"><a href="javascript:history.back(-1);" class="z-HLeft" data-dismiss="modal" aria-hidden="true"><s></s><b>返回</b></a><div class="head-r"><a href="/" class="z-HReturn" data-dismiss="modal" aria-hidden="true"><s></s><b>首页</b></a></div></header><div class="g-Total gray9">请选择需要充值的金额</div><section class="clearfix g-member"><div class="g-Recharge"><ul id="ulOption"><!--注意修改金额 需要同时修改前面的值 money="10" --><li money="10"><a href="javascript:;">10元<s></s></a></li><li money="20"><a href="javascript:;">20元<s></s></a></li><li money="50"><a href="javascript:;" class="z-sel">50元<s></s></a></li><!--class="z-sel" 表示默认选中50元--><li money="100"><a href="javascript:;">100元<s></s></a></li><li money="200"><a href="javascript:;">200元<s></s></a></li><li money="500"><a href="javascript:;">500元<s></s></a></li></ul></div><form action="<?php echo url('ctrl/recharge_do'); ?>" method="post"><article class="clearfix mt10 m-round g-pay-ment g-bank-ct"><ul id="ulBankList"><li class="gray6" style="width: 100%;padding: 5px 0px 0px 10px;height: 50px;">您选择充值：<label
                            class="input" style="border: 1px solid #EAEAEA;height: 35px;font-size:30px;"><input type="text" name="price" id="price" placeholder="如：50" value="50"
                               style="width: 170px;color: red;font-size:20px;"><!--默认输入金额值50--></label> 元
                    </li><li paytype="alipay" class="gray9" type="alipay" style="width: 33%"><a href="javascript:;" class="z-initsel"><img src="/static/woaipay/alipay.jpg"><s></s></a></li><li paytype="wxpay" class="gray9" type="wxpay" style="width: 33%"><a href="javascript:;"><img src="/static/woaipay/weixin.jpg"><s></s></a></li><li paytype="qqpay" class="gray9" type="qqpay" style="width: 33%"><a href="javascript:;"><img src="/static/woaipay/qqpay.jpg"><s></s></a></li></ul></article><input type="hidden" id="type" value="woaipay" name="type"><input type="hidden" id="pay_type" value="alipay" name="pay_type"><div class="mt10 f-Recharge-btn"><button id="btnSubmit" type="submit" href="javascript:;" class="orgBtn">确认支付</button></div></form></section><script src="/static/plugs/jquery/jquery.min.js"></script><script language="javascript" type="text/javascript">        $(function () {
            var c;
            var g = false;
            var a = null;
            var e = function () {
                $("#ulOption > li").each(function () {
                    var n = $(this);
                    n.click(function () {
                        g = false;
                        c = n.attr("money");
                        n.children("a").addClass("z-sel");
                        n.siblings().children().removeClass("z-sel").removeClass("z-initsel");
                        var needMoney = parseFloat(n.attr("money")).toFixed(2);
                        if (needMoney <= 0)needMoney = 0.01;
                        $("#price").val(needMoney);
                    })
                });
                $("#ulBankList > li").each(function (m) {
                    var n = $(this);
                    n.click(function () {
                        if (m < 2)return;
                        $("#pay_type").val(n.attr("payType"));
                        n.children("a").addClass("z-initsel");
                        n.siblings().children().removeClass("z-initsel");
                    })
                });

            };
            e()
        });

    </script></div></body></html>