<?php /*a:1:{s:78:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\ctrl\deposit_before.html";i:1579576854;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>提现</title><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" href="/public/css/ui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
        .form {
            /*height: 80px;*/
            /*line-height: 80px;*/
            color: rgb(240, 98, 96);
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            padding: 0 .5rem;
            border-bottom: 1px solid #eeeeee;
            min-height: 60px;
            padding-top: 10px;
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
            width: 10%;
        }

        .copy_btn {
            color: #60aef0;
            width: 10%;
            text-align: center;
            height: 2rem;
            line-height: 2rem;
        }



        .user_info>div:first-child {
            width: 20%;
            height: 100%;
            display: flex;
        }


        .user_info>input {
            margin-left: 1rem;
            width: 60%;
            border: none;
            outline: none;
        }

        .user_box>.user_info:nth-child(1) .icon {
            background-image: url(/public/img/name.png);
        }

        .user_box>.user_info:nth-child(2) .icon {
            background-image: url(/public/img/phone.png);
            background-size: 80%;
            background-position: 4px 0px;
            width: 1.4rem;
            height: 1.4rem;
        }

        .user_box>.user_info:nth-child(3) .icon {
            background-image: url(/public/img/je.png);
        }


        .file input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            opacity: 0;
            z-index: 233;
        }

        .file img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            z-index: 230;
        }
        .wrin{
            padding:0 .3rem;
            color:red;
            width:90%;
            margin:.5rem auto;
        }
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>选择提现方式</span></header><div class="container"><div class="form_box"><?php
        $pay = array(
            ['name'=>'微信','url'=>url('ctrl/deposit_wx'),'ico'=>'/public/img/wx.png'],
            ['name'=>'支付宝','url'=>url('ctrl/deposit_zfb'),'ico'=>'/public/img/alipay.png'],
            ['name'=>'银行卡','url'=>url('ctrl/deposit'),'ico'=>'/public/img/card.png'],

        );

        foreach($pay as $key=>$vo): ?><a href="<?php echo htmlentities($vo['url']); ?>" class="form"><div class="form_title"><img src="<?php echo htmlentities($vo['ico']); ?>" alt="" style="width: 40px; height:40px"></div><!-- <div id="bank_name">测试银行</div> --><input type="text" id="bank_name" value="<?php echo htmlentities($vo['name']); ?>" readonly><div class="copy_btn">></div></a><?php endforeach; ?></div><p class="wrin"></p><!--<div class="btn">提交</div>--></div></body><script>    var submit =true;
    // 复制信息
    $('.copy_btn').click(function () {
        // let txt = $(this).siblings('input');
        // txt.select();
        // document.execCommand('copy');
        var val = $(this).siblings('input').attr('id');
        copyNum(val)
    })

    // 上传凭证
    $('#voucher').change(function () {
        var file = $("#voucher").get(0).files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            $(".voucher_img").attr("src", reader.result);
            pic = reader.result;
        }
    })

    // 提交资料
    $('.btn').click(function() {
        var real_name = $("#user_name").val(),
            tel = $("#user_phone").val(),
            num = $("#user_num").val(),
            pic = $('.voucher_img').attr('src');
        if (real_name == "") {
            QS_toast.show('请填写充值姓名', true)
        } else if (tel=="") {
            QS_toast.show('请填写充值手机号', true)
        } else if (!(/^1[3456789]\d{9}$/.test(tel))) {
            QS_toast.show('请填写正确的手机号', true)

        } else if (num == "") {
            QS_toast.show('请填写充值金额', true)
        } else if (pic == "" || pic == null) {
            QS_toast.show('请上传充值凭证', true)
        } else {
            var data = {real_name:real_name,tel:tel,num:num,pic:pic}
            if(submit){
                var indexD = layer.open({
                    type: 2
                    ,shadeClose:false
                    ,content: '提交中...'
                });
                sumit=false;
                $.ajax({
                    url:urlPost("my/user_recharge"),
                    type:"POST",
                    dataType:"JSON",
                    data:data,
                    success:function(res){
                        console.log(res)
                        if(res.code==0){

                            QS_toast.show(res.info,true);
                            layer.close(indexD);
                            var timer = setTimeout(function(){
                                window.location.href = "<?php echo url('ctrl/wallet'); ?>";
                            },1500)
                        }else{
                            submit=true;
                            QS_toast.show(res.info,true)
                        }
                    },
                    error:function(err){console.log(err)}
                })
            }
        }
    })

    function copyNum(val) {
        var NumClip = document.getElementById(val);
        var NValue = NumClip.value;
        var valueLength = NValue.length;
        selectText(NumClip, 0, valueLength);
        if (document.execCommand('copy', false, null)) {
            document.execCommand('copy', false, null)// 执行浏览器复制命令
            QS_toast.show('复制成功', true)
        } else {
            var copyDOM = document.getElementById(val);  //要复制文字的节点
            var range = document.createRange();
            // 选中需要复制的节点
            range.selectNode(copyDOM);
            // 执行选中元素
            window.getSelection().addRange(range);
            // 执行 copy 操作
            var successful = document.execCommand('copy');
            try {
                var msg = successful ? 'successful' : 'unsuccessful';

                console.log('copy is' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
            }
            // 移除选中的元素
            window.getSelection().removeAllRanges();
            QS_toast.show('复制成功', true)

        }
    }
    function selectText(textbox, startIndex, stopIndex) {
        textbox.setSelectionRange(startIndex, stopIndex);
        textbox.focus();
    }
</script></html>