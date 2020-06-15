<?php /*a:1:{s:69:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\ctrl\edit_pwd.html";i:1592207146;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>修改密码</title><script src="/static/plugs/jquery/jquery.min.js"></script><link rel="stylesheet" href="/public/css/style.css"><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><style>
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

        .swith {
            position: relative;
            height: 2rem;
            display: flex;
        }

        .swith>label {
            float: right;
            margin: auto 3.5rem auto auto;
            font-size: .5rem;
            color: #777777;
        }

        .swith>label::before {
            content: "";
            position: absolute;
            height: 1rem;
            width: 2rem;
            border-radius: 50px;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ddd;
            right: 1rem;
            top: 0;
            bottom: 0;
            margin: auto;
            transition: background-color .0s linear .2s;
        }

        .swith>label::after {
            content: "";
            height: 1rem;
            width: 1rem;
            border-radius: 50%;
            background: white;
            background-clip: padding-box;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .4);
            position: absolute;
            right: 2rem;
            top: 0;
            bottom: 0;
            margin: auto;
            transition: right .2s linear;
        }

        .swith>input {
            display: none;
        }

        .swith>input:checked+label::after {
            right: 1rem;
        }

        .swith>input:checked+label::before {
            background: #00bcd4;
        }

        .btn {
            margin: 2rem auto;
            width: 90%;
            height: 2rem;
            line-height: 2rem;
            border-radius: 7px;
            /* background: #00bcd4; */
						background: #0035A0;
            text-align: center;
            color: white;
        }
    </style></head><body><header><div class="back" onclick="history.back(-1)"></div><span>修改密码</span></header><div class="container"><div class="form"><p class="form_title">原密码:</p><div class="input_box"><input type="password" placeholder="请输入原密码" id="old"></div></div><div class="form"><p class="form_title">新密码:</p><div class="input_box"><input type="password" placeholder="请输入新密码" id="new"></div></div><div class="form"><p class="form_title">确认密码:</p><div class="input_box"><input type="password" placeholder="再次输入新密码" id="again"></div></div><div class="btn">提交</div></div></body><!-- <script src="/public/js/vconsole.min.js"></script> --><script>
    //  var vConsole = new VConsole();
    var submit = true
    $('.btn').click(function() {
        var old_pwd = $('#old').val(),
            new_pwd = $('#new').val(),
            again = $('#again').val();
        if (old_pwd == "") {
            QS_toast.show('请输入原密码', true)
        } else if (new_pwd == "") {
            QS_toast.show('请输入新密码', true)
        } else if (again == "") {
            QS_toast.show('请再次输入新密码', true)
        } else if (again!=new_pwd) {
            QS_toast.show('两次密码不一致', true)
        } else {
            if (submit) {
                submit = false;
                $.ajax({
                    url: urlPost("ctrl/set_pwd"),
                    type: "POST",
                    dataType: "JSON",
                    data: {old_pwd:old_pwd,new_pwd:new_pwd},
                    success: function(res) {
                        console.log(res)
                        if (res.code == 0) {
                            QS_toast.show('修改成功', true);
                            var timer = setTimeout(function() {
                                history.back(-1)
                            }, 1500)
                        } else {
                            QS_toast.show(res.info, true);
                            submit = true;
                        }
                    },
                    error: function(err) { console.log(err); submit = true }
                })
            }
        }
    })
</script></html>