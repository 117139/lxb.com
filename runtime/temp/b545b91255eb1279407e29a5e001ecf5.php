<?php /*a:1:{s:90:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\index\view\ctrl\recharge_admin.html";i:1579583394;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>充值管理</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><style>
        .list li {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-bottom: .1rem solid rgb(248, 242, 242);
            padding: .3rem .5rem;
            font-size: .7rem;
            height: 3rem;
        }

        .list li>div {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .money{
            color:#8BC34A
        }
        .top>p:first-child{
            color: #777777;
        }
        .add {
            position: absolute;
            width: 2rem;
            line-height: 2rem;
            top: 0;
            bottom: 0;
            right: .3rem;
            margin: auto;
            /*background-image: url(/public/img/add.png);*/
            background-size: 80%;
            background-repeat: no-repeat;
        }
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>充值管理</span><div class="add" style="font-size: 12px" onclick="location.href=`./recharge_before.html`">充值</div></header><div class="container"><ul class="list"></ul></div></body><script>
    var page =1,listHeight=$('.list').height();
    $(function() {
        list(page)
    })

    $(".list").scroll(function () {
            var nScrollHight = $(this)[0].scrollHeight;; 
            var nScrollTop = $(this)[0].scrollTop;; 
            if (nScrollTop + listHeight >= nScrollHight){
                page++;
                list(page);
            }
        })

    function list(page) {
        $.ajax({
            url: urlPost("order/get_recharge_order"),
            type: "POST",
            dataType: "JSON",
            data: { page,num:13 },
            success: function(res) {
                console.log(res)
                if (res.code == 0) {
                    let list = res.data;
                    if (page != 1 && list.length == 0) {
                        QS_toast.show('没有更多的数据了..', true)
                    }
                    list.map(function(val){
                        let status = "";
                        if(val.status==1){
                            status="充值中"
                        }else if(val.status==2){
                            status="充值成功"
                        }else if(val.status==3){
                            status="充值失败"
                        }
                        $('.list').append(`
                            <li id="${val.id}"><div class="top"><p>${val.id}</p><p>${timeTransform(val.addtime)}</p></div><div class="bot"><p style="color:${val.status==3?'#fd0a0a':"#059fce"}">${status}</p><p class="money">${val.num}</p></div></li>
                        `)
                    })
                }
            },
            error: function(err) { console.log(err) }
        })
    }
</script></html>