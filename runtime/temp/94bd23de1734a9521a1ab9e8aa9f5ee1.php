<?php /*a:1:{s:83:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\index\view\ctrl\my_data.html";i:1591030707;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>个人资料</title><style>
        .data_item {
            width: 90%;
            margin: auto;
            display: flex;
            height: 2rem;
            line-height: 2rem;
            position: relative;
        }

        .data_item>p:last-child {
            width: 80%;
            text-align: center;
        }

        .head {
            width: 1.3rem;
            height: 1.3rem;
            border-radius: 50%;
            overflow: hidden;
            margin: auto 1rem auto auto;
        }

        .right {
            width: 1.2rem;
            height: 1.7rem;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url(/public/img/right.png);
            margin: auto 0 auto 0;
        }

        .form_container {
            border-top: 1px solid #f3f3f3;
            margin-top: 1rem;
        }

        .form {
            width: 90%;
            margin: .5rem auto;
            display: flex;
            height: 1.5rem;
        }

        .form .form_title {
            line-height: 1.5rem;
            width: 20%;
        }

        .input_box {
            height: 100%;
            border: 1px solid #e2dcdc;
            border-radius: 3px;
            width: 80%;
        }

        .input_box input {
            border: none;
            outline: none;
            height: 100%;
            width: 100%;
            text-indent: 10px;
        }

        .input_box input::placeholder {
            color: #a7a7a7;
        }

        .btn {
            width: 90%;
            margin: 4rem auto 0;
            height: 2rem;
            text-align: center;
            line-height: 2rem;
            background: #8BC34A;
            border-radius: 6px;
            color: white;
            font-size: .8rem;
        }

        #file,#file_wx,#file_zfb {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
        }
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>个人资料</span></header><div class="container" style="padding-top: 2.5rem;"><div class="data_item"><p class="form_title">账号:</p><p class="user">-</p></div><div class="data_item" id="head"><p class="form_title">头像:</p><div class="head"><img src="" id="headImg" alt=""></div><input type="file" name="" id="file"><div class="right"></div></div><div class="form_container"><div class="form"><p class="form_title">姓名:</p><div class="input_box"><input type="text" placeholder="请输入昵称" id="name2"></div></div><div class="form"><p class="form_title">昵称:</p><div class="input_box"><input type="text" placeholder="请输入昵称" id="name"></div></div><div class="form"><p class="form_title">个签:</p><div class="input_box"><input type="text" placeholder="请输入个性签名" id="signature"></div></div></div><h4 style="border-bottom: 1px solid #ccc;padding-left: 10px;margin-top: 30px">收款码</h4><div class="data_item" id="head_wx" style="height: auto;"><p class="form_title">微信:</p><div class="head" style="height: 100px;width:100px"><img src="" id="headImg_wx" alt=""></div><input type="file" name="" id="file_wx"><div class="right"></div></div><hr><div class="data_item" id="head_zfb" style="height: auto;"><p class="form_title">支付宝:</p><div class="head" style="height: 100px;width:100px"><img src="" id="headImg_zfb" alt=""></div><input type="file" name="" id="file_zfb"><div class="right"></div></div><div class="btn">确定</div></div></body><script>
    var src = "";
    var src_wx = "";
    var src_zfb = "";
    $(function() {
        // 默认资料
        $.ajax({
            url: urlPost("my/do_my_info"),
            type: "GET",
            dataType: "JSON",
            data: {},
            success: function(res) {
                console.log(res)
                if (res.code == 0) {
                    $('.user').html(res.data.username)
                    $("#headImg").attr('src', res.data.headpic)
                    $("#headImg_wx").attr('src', res.data.wx_ewm)
                    $("#headImg_zfb").attr('src', res.data.zfb_ewm)
                    $("#name").val(res.data.nickname)
                    $("#name2").val(res.data.username)
                    $("#signature").val(res.data.sign)
                }
            },
            error: function(err) { console.log(err) }
        })

    })

    // 上传照片
    $('#file').change(function () {
        var file = $("#file").get(0).files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            $("#headImg").attr("src", reader.result);
            console.log(reader.result)
            src = reader.result;
        }
    })

    // 上传微信二维码照片
    $('#file_wx').change(function () {
        var file = $("#file_wx").get(0).files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            $("#headImg_wx").attr("src", reader.result);
            src_wx = reader.result;
        }
    })
    // 上传微信二维码照片
    $('#file_zfb').change(function () {
        var file = $("#file_zfb").get(0).files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            $("#headImg_zfb").attr("src", reader.result);
            src_zfb = reader.result;
        }
    });//
    var submit = true;
    // 修改个人资料
    $(".btn").click(function() {
        var data = {
            nickname: $("#name").val(),
            username: $("#name2").val(),
            sign: $("#signature").val(),
            headpic: src,
            wx_ewm:src_wx,
            zfb_ewm:src_zfb
        }
        if (submit) {
            submit = false;
            $.ajax({
                url: urlPost("my/do_my_info"),
                type: "POST",
                dataType: "JSON",
                data:data,
                success: function(res) {
                    console.log(res)
                    if (res.code == 0) {
                        QS_toast.show(res.info, true)
                        var timer = setTimeout(function() {
                            history.back(-1)
                        }, 1800)
                    } else {
                        submit = true;
                    }
                },
                error: function(err) { console.log(err) }
            })
        }

    })
</script></html>
