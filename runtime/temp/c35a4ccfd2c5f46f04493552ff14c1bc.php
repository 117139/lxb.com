<?php /*a:1:{s:74:"E:\phpstudy_pro\WWW\lxb.com\application\index\view\ctrl\deposit_admin.html";i:1591938517;}*/ ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" /><title>提现管理</title><link rel="stylesheet" href="/public/css/style.css"><script src="/static/plugs/jquery/jquery.min.js"></script><script src="/public/js/ui.js"></script><link rel="stylesheet" href="/public/css/ui.css"><script src="/public/js/common.js"></script><style>
        .list li {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-bottom: .1rem solid rgb(248, 242, 242);
            padding: .3rem 1rem;
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
    </style></head><body><header><div class="back" onclick="window.history.back(-1)"></div><span>提现管理</span><div class="add" style="font-size: 12px" onclick="location.href=`./deposit_before.html`">提现</div></header><div class="container"><ul class="list"></ul></div></body><script>
    var page =1;
    $(function() {
        list(page)
    })

    function list(page) {
        $.ajax({
            url: urlPost("ctrl/get_deposit"),
            type: "POST",
            dataType: "JSON",
            data: { page,num:15 },
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
                            status="待处理"
                        }else if(val.status==2){
                            status="提现成功"
                        }else if(val.status==3){
                            status="提现未通过"
                        }
                        $('.list').append(`
                            <li id="${val.id}"><div><p>${val.id}</p><p>${timeTransform(val.addtime)}</p></div><div><p style="color:${val.status==3?'#fd0a0a':"#059fce"}">${status}</p><p class="money">${val.num}</p></div></li>
                        `)
                    })
                }else{
                    $(".list").append('<img src="/public/img/empty1.png">')
                }
            },
            error: function(err) { console.log(err) }
        })
    }
</script></html>