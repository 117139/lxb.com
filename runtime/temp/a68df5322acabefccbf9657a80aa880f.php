<?php /*a:1:{s:69:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\ctrl\add_site.html";i:1592207306;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>添加收货地址</title><link rel="stylesheet" href="/public/css/style.css"><link rel="stylesheet" href="/public/css/ui.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/common.js"></script><style>
        .form {
            height: 2.2rem;
            line-height: 2.2rem;
            display: flex;
            padding: 0 .5rem;
            border-bottom: 1px solid #eeeeee;
        }

        .form_title {
            color: black;
            width: 25%;
            font-weight: 500;
        }

        .form input {
            border: none;
            outline: none;
        }

        .btn {
            width: 90%;
            height: 2rem;
            line-height: 2rem;
            text-align: center;
            color: white;
            margin: 5rem auto 0;
            border-radius: 5px;
            /* background: #8BC34A; */
						background: #0035A0;
        }
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>添加收货地址</span></header><div class="container"><div class="form"><div class="form_title">收货人姓名</div><input type="text" id="name" placeholder="请填写姓名"></div><div class="form"><div class="form_title">地区</div><div class="area" id="area_s" style="color: #777777;">请选择收货地址</div><input type="hidden" name="" id="area"></div><div class="form"><div class="form_title">详细地址</div><input type="text" placeholder="请填写详细地址" id="site"></div><div class="form"><div class="form_title">手机</div><input type="text" placeholder="请填写手机号" id="phone"></div><div class="btn">确定</div></div></body><script src="/public/js/city.js"></script><script src="/public/js/picker.min.js"></script><script src="/public/js/index.js"></script><script src="/public/js/ui.js"></script><script>
    $(".btn").click(function() {
        var name = $("#name").val(),//姓名
            area = $('#area').val(),//地区
            site = $('#site').val(),//详细地址
            phone = $('#phone').val();//手机号
        if (name == "") {
            QS_toast.show('请输入收货人姓名', true)
        } else if (area == "") {
            QS_toast.show('请选择收货地址', true)
        } else if (site == "") {
            QS_toast.show('请填写详细收货地址', true)
        } else if (phone == "") {
            QS_toast.show('请输入手机号', true)
        } else if (!(/^1[3456789]\d{9}$/.test(phone))) {
            $('#phone').val("")
            QS_toast.show('手机号码有误', true)
        } else {
            var token = "<?php echo htmlentities(app('request')->token()); ?>";
            var data = { name:name, tel: phone, address: site, area:area,token:token }
            $.ajax({
                url: urlPost('my/add_address'),
                type: "POST",
                dataType: "JSON",
                data:data,
                success: function(res) {
                    console.log(res)
                    if (res.code == 0) {
                        QS_toast.show(res.info, true);
                        var timer = setTimeout(function() {
                            history.back(-1)
                        }, 1800)
                    } else {
                        QS_toast.show(res.info, true)
                    }
                },
                error: function(err){
                    console.log(err)
                }
            })
        }
    })
</script></html>