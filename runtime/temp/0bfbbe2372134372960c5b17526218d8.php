<?php /*a:1:{s:70:"D:\phpstudy_pro\WWW\www.sc.com\application\index\view\ctrl\czrand.html";i:1582937608;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>充值</title><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" href="/public/css/ui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
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

        #bank_site {
            margin-right: auto;
            margin-left: 1rem;
            width:80%;
        }

        .user_info {
            height: 2rem;
            line-height: 2rem;
            display: flex;
            padding: 0 .5rem;
            border-bottom: 1px solid #eeeeee;
        }

        .user_info>div:first-child {
            width: 20%;
            height: 100%;
            display: flex;
        }

        .icon {
            width: 1.2rem;
            height: 1.2rem;
            background-size: cover;
            background-repeat: no-repeat;
            margin: auto 0 auto auto;
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

        .btn {
            width: 90%;
            height: 2rem;
            line-height: 2rem;
            text-align: center;
            color: white;
            margin: 1rem auto 0;
            border-radius: 5px;
            background: #8BC34A;
        }

        .file_container {
            margin-top: 2rem;
        }

        .file {
            width: 60%;
            margin: 0 auto;
            height: 6rem;
            background: #dedede;
            position: relative;
        }

        .file::before {
            content: "";
            height: 1px;
            width: 3rem;
            background: white;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        .file::after {
            content: "";
            width: 1px;
            height: 3rem;
            background: white;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
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
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>充值</span></header><div class="container"><div class="user_box"><div class="user_info"><input type="text" placeholder="请填写充值金额" id="user_num"></div></div><div class="btn">充值</div></div></body><script>    var submit =true;


    // 提交资料
    $('.btn').click(function() {
       var num = $("#user_num").val();
       if (num == "") {
            QS_toast.show('请填写充值金额', true)
        } else {
            var data = {num:num}
            if(submit){
                var indexD = layer.open({
                    type: 2
                    ,shadeClose:false
                    ,content: '提交中...'
                });
                sumit=false;
                $.ajax({
                url:urlPost("ctrl/czrand_ok"),
                type:"POST",
                dataType:"JSON",
                data:data,
                success:function(res){
                    window.location.href = "<?php echo url('ctrl/recharge_before'); ?>";
                },
                error:function(err){console.log(err)}
        		 }); 
            }
        }
    })

    function selectText(textbox, startIndex, stopIndex) {
        textbox.setSelectionRange(startIndex, stopIndex);
        textbox.focus();
    }
</script></html>