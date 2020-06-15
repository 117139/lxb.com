<?php /*a:1:{s:66:"/www/wwwroot/lxb.com/application/index/view/ctrl/receive_site.html";i:1591938592;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>收货地址</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><link rel="stylesheet" href="/public/js/layer_mobile/need/layer.css"><script src="/public/js/layer_mobile/layer.js"></script><script src="/public/js/common.js"></script><style>
        body {
            background: rgb(248, 242, 242);
        }

        .site_list li {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            height: 3rem;
            padding: 0 .5rem;
            margin-bottom: .1rem;
            background: white;
        }

        .select {
            position: relative;
            color: rgb(239, 99, 98);
            padding-left: .6rem;
            margin: auto 0 auto .3rem;
            width: 3rem;
            font-size: .5rem;
        }

        .select::before {
            content: "";
            width: .4rem;
            height: .4rem;
            border-radius: 50%;
            border: 1px solid rgb(239, 99, 98);
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            margin: auto;
        }

        .default .select::before {
            background: rgb(239, 99, 98);
        }

        .site_info {
            width: 63%;
            margin: auto;
            height: 70%;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .site_info>p {
            display: flex;
        }

        .site_info>p:first-child>span:last-child {
            margin-left: 1.5rem;
        }

        .site_info>P:last-child {
            color: #888585;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .btn_container {
            margin: auto 0;
            color: #888585;
            font-size: .5rem;
            height: 70%;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .btn_container>div {
            width: 2rem;
            position: relative;
            padding-left: .7rem;

        }

        .btn_container>div::after {
            content: "";
            width: .7rem;
            height: .7rem;
            position: absolute;
            left: 0;
            background-size: 90%;
            background-repeat: no-repeat;
        }

        .compile::after {
            background-image: url(/public/img/compile.png);
        }

        .remove::after {
            background-image: url(/public/img/remove.png);
            background-size: 76% !important;
        }

        .add {
            position: absolute;
            width: 1.5rem;
            height: 1.2rem;
            top: 0;
            bottom: 0;
            right: .3rem;
            margin: auto;
            background-image: url(/public/img/add.png);
            background-size: 80%;
            background-repeat: no-repeat;
        }
        .no-data{
            height: 2rem;
            background: white !important;
        }
        .no-data>span{
            margin: auto;
            color: #777777;
        }
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>收货地址</span><div class="add" onclick="location.href=`./add_site.html`"></div></header><div class="container"><ul class="site_list"></ul></div></body><script>
    $(function() {
        // 获取地址列表数据
        $.ajax({
            url: urlPost("my/get_address"),
            type: "POST",
            dataType: "JSON",
            data: {},
            success: function(res) {
                var list = res.data || [];
                if (list.length == 0) {
                        console.log('ok')
                        $(".site_list").append('<li class="no-data"><span>还未添加收获地址</span></li>')
                    }
                if (res.code == 0) {
                    list.map(function(val) {
                        if (val.is_default == 1) {
                            //默认
                            $(".site_list").prepend(`
                            <li id="${val.id}" class="default"><div class="select"><span class="txt">默认</span></div><div class="site_info"><p><span>${val.name}</span><span>${val.tel}</span></p><p>${val.area ? val.area + " " + val.address : val.address}</p></div><div class="btn_container"><div class="compile">编辑</div><div class="remove">删除</div></div></li>
                            `)
                        } else {
                            $(".site_list").append(`
                            <li id="${val.id}" ><div class="select"><span class="txt">设为默认</span></div><div class="site_info"><p><span>${val.name}</span><span>${val.tel}</span></p><p>${val.area ? val.area + " " + val.address : val.address}</p></div><div class="btn_container"><div class="compile">编辑</div><div class="remove">删除</div></div></li>
                            `)
                        }

                    })
                }else{
                    $(".site_list").append('<img src="/public/img/empty1.png">')
                }
            },
            error: function(err) { console.log(err) }
        })
    })

    // 设置默认地址
    $(".site_list").on('click', 'li', function(e) {
        var li = $(e.target),
            id = $(e.target).attr('id') || $(e.target).parents('li').attr('id');
        $.ajax({
            url: urlPost("my/set_address"),
            type: "POST",
            dataType: "JSON",
            data: { id:id },
            success: function(res) {
                console.log(res)
                if (res.code == 0) {
                    if (li[0].tagName != "LI") {
                        $(e.target).parents('li').addClass('default').siblings().removeClass('default')
                    } else {
                        $(e.target).addClass('default').siblings().removeClass('default')
                    }
                    $('.txt').html('设为默认')
                    $('.default .txt').html('默认')
                    QS_toast.show(res.info, true)
                }
            },
            error: function(err) { console.log(err) }
        })
    })

    // 删除地址
    $(".site_list").on('click', '.remove', function(e) {
        e.stopPropagation()
        var id = $(e.target).attr('id') || $(e.target).parents('li').attr('id');
        layer.open({
            content: '您确定要删除该地址吗？',
            btn: ['确定', '取消'],
            yes: function (index) {
                $.ajax({
                    url: urlPost("my/del_address"),
                    type: "POST",
                    dataType: "JSON",
                    data: { id:id },
                    success: function(res) {
                        console.log(res)
                        if (res.code == 0) {
                            $(e.target).parents('li').remove()
                            layer.close(index);
                            QS_toast.show(res.info, true)
                        } else {
                            QS_toast.show(res.info, true)
                        }
                    },
                    error: function(err) { console.log(err) }
                })
            },
            no: (function() {
                layer.close();
            })
        });

    })

    // 编辑地址
    $(".site_list").on('click', '.compile', function(e) {
        e.stopPropagation()
        var site_id = $(e.target).parents('li').attr('id')
        sessionStorage.setItem("site_id", site_id);
        location.href = "./set_site.html"
    })
</script></html>