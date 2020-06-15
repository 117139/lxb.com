<?php /*a:1:{s:70:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\ctrl\recharge2.html";i:1592207800;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>充值</title><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" href="/public/css/ui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
        .rech_main{
            width:100%;
            text-align:center;
            display:inline-block;
        }


        .rech_main h6{
            margin: 20px;
            font-size:16px;
            color:#7552e6;
        }


        .rech_main ul{
            margin:0px auto;
            display: inline-block;
        }

        .rech_main ul li{
            float:left;
            width:85px;
            padding:15px;
            margin:5px;
            background-color:#704eea;
        }

        .rech_main ul li a{
            color:#fff;
        }

        .rech_main .rech_sea {
            display:inline-block;
            margin-top:10px;
        }

        .rech_main .rech_sea .money {
            font-size: 16px;
        }

        .rech_main .rech_sea input{
            width: 100px;
            background: #fff;
            border: 1px solid #CCCCCC;
            font-size: 16px;
            height: 30px;
            border-radius: 4px;
            margin: 10px 0px;
            text-align:center

        }.pay-menu .rech_botton {
             width: 90%;
             height: 50px;
             margin-bottom: 10px;
             border-radius: 6px;
             color: #fff;
             /* background: #4eaf00; */
						 background: #0035A0;
             font-size: 15px;
             line-height: 45px;
						 height: 2rem;
						 line-height: 2rem;
             text-align: center;
         }a {
              text-decoration: none;
          }
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

        .form>input {
            border: none;
            outline: none;
            margin-right: auto;
            color: rgb(240, 98, 96);
            margin-left: 1rem;
            width:70%;
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
        .file {
            width: 60%;
            margin: 0 auto;
            height: 8rem;
            padding:10px;
            margin-top: 10px;
            margin-bottom: 10px;
            background: #dedede;
            position: relative;
        }

    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span><?php echo htmlentities($title); ?></span></header><div class="container"><div class="rech_main"><h6>请选择充值金额</h6><ul><li data-price="100"><a href="javascript:void(0)">100元</a></li><li data-price="500"><a href="javascript:void(0)">500元</a></li><li data-price="1000"><a href="javascript:void(0)">1000元</a></li></ul><div id="form1" class="" data-callback="1" name="form1" method="post" action=""><div class="rech_sea"><span class="money">自定义金额：</span><input type="text" name="price" id="price" placeholder="充值金额"></div></div></div><div class="pay-menu" style="padding-left: 10%;margin-top: 30px;"><div class="rech_botton"><a href="javascript:void(0)" class="blue_btn recharge_btn" style="display: block;color:#fff">
                    确定充值
                </a></div></div></div></body><script>    $(function(){
        /*金额数值 切换*/
        $('.rech_main>ul>li').click(function(){
            $(this).css("background-color","#4eaf00").children().css("color","#fff");
            $(this).siblings().css("background-color","#704eea").children().css("color","#fff");
            $('#price').val($(this).attr('data-price'));
        });


        $('.recharge_box label').click(function(){
            $('.recharge_box label span').removeClass('active');
            $(this).find('span').addClass('active');
            var payment_type = $(this).attr('data-key');
            $('#payment_type').val(payment_type);
        });

        $('.cancel').click(function () {
            $('.recharge_box').hide();
        });

        $('#submit').click(function () {
            layer.open({
                content: '充值中,请稍后刷新余额!'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
            $('.recharge_box').hide();
        });


        $('.recharge_btn').click(function(){
            var price = $('#price').val();
            if(price==''){
                QS_toast.show('请选择充值金额', true);
                return false;
            }
            if(isNaN(price)){
                QS_toast.show('价格必须为数字', true);
                return false;
            }
            if( price < 0){
                QS_toast.show('价格必须大于0', true);
                return false;
            }





            var type = "<?php echo htmlentities($type); ?>";

            $.ajax({
                type:"POST",
                url:"<?php echo url('recharge_do'); ?>",
                data :{price:price,type:type},
                dataType:"json",
                async : false,
                success:function(coordinates){
                    result = coordinates;
                    if (result.code!=0) {
                        QS_toast.show(result.info, true);
                        return false;
                    }else{
                        if (result.info.redirect) {
                            window.location.href = result.info.redirect;
                            return false;
                        }

                        layer.open({
                            anim: 'up'
                            ,shadeClose:false
                            ,content: '<div>' +
                            '<div class="form"><div class="form_title">订单号</div><input type="text" id="bank_name" value="'+result.info.id+'" readonly=""></div>' +
                            '<div class="form"><div class="form_title">订单金额</div><input type="text" id="bank_name" value="'+result.info.num+'" readonly=""></div>' +
                            '<div class="file"><img src="'+result.info.ewm+'" alt="" class="voucher_img"></div>' +
                            '<div>' +
                            '<p>1 保存二维码图片.</p>' +
                            '<p>2 打开支付宝/微信,扫一扫.</p>' +
                            '<p>3 选取刚刚保存的图片.</p>' +
                            '<p>4 输入金额,进行付款.</p>' +
                            '</div>' +
                            '</div>'
                            ,btn: ['确认', '取消']
                        });

                        return false;
                    }
                },
                error:function(data){
                    console.log('error'+data.status)
                }
            });



        })
    })
</script></html>