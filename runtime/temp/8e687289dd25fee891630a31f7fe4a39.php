<?php /*a:1:{s:64:"/www/wwwroot/lxb.com/application/index/view/ctrl/lixibao_ru.html";i:1581756546;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title><?php echo htmlentities($title); ?></title><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" href="/public/css/ui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
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
             background: #8723e9;
             font-size: 15px;
             line-height: 45px;
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
        .user_info {
            height: 2rem;
            line-height: 2rem;
            display: flex;
            padding: 0 .5rem;
            border-bottom: 1px solid #eeeeee;
        }
        .user_info>.input {
            margin-left: 1rem;
            width: 60%;
            border: none;
            outline: none;
        }
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span><?php echo htmlentities($title); ?></span><div class="add" style="font-size: 12px;line-height: 2rem;position: absolute;right: 14px;" onclick="location.href=`/index/support/detail/7.html?id=7`">规则</div></header><div class="container"><div class="rech_main"><h6>请选择转入金额</h6><ul><li data-price="100"><a href="javascript:void(0)">100元</a></li><li data-price="500"><a href="javascript:void(0)">500元</a></li><li data-price="1000"><a href="javascript:void(0)">1000元</a></li></ul><div id="form1" class="" data-callback="1" name="form1" method="post" action=""><div class="rech_sea"><!--<span class="money">自定义金额：</span><input type="text" name="price" id="price" placeholder="充值金额">--></div><div class="user_info"><div><div class="icon2" style="padding-left: 30px">金额</div></div><input class="input" type="text" name="price" id="price" placeholder="请输入金额" ></div><div style="padding: 20px;font-size: 12px;text-align: left;padding-left:40px"><p style="padding: 4px 0;">日利率: <?php echo htmlentities($rililv); ?></p>
                    可用余额: <?php echo htmlentities($yue); ?><a href="javascript:void(0)" onclick="return tixianAll(<?php echo htmlentities($yue); ?>)" style="margin-left:20px">全部转入</a></div></div></div><div class="pay-menu" style="padding-left: 10%;margin-top: 30px;"><div class="rech_botton"><a href="javascript:void(0)" class="blue_btn recharge_btn" style="display: block;color:#fff">
                    确定转入
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

            var type = 'ru';
            $.ajax({
                type:"POST",
                url:"<?php echo url('lixibao_ru'); ?>",
                data :{price:price,type:type},
                dataType:"json",
                async : false,
                success:function(coordinates){
                    result = coordinates;
                    if (result.code!=0) {
                        QS_toast.show(result.info, true);
                        return false;
                    }else{
                        QS_toast.show(result.info, true);
                        var linkTime = setTimeout(function() {
                            window.location.reload();
                        }, 1800);
                        return false;
                    }
                },
                error:function(data){
                    console.log('error'+data.status)
                }
            });



        })
    })

    function tixianAll(price)
    {
        $('#price').val(price);
    }
</script></html>