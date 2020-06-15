<?php /*a:3:{s:64:"/www/wwwroot/lxb.com/application/admin/view/deal/goods_list.html";i:1591755463;s:53:"/www/wwwroot/lxb.com/application/admin/view/main.html";i:1575947686;s:66:"/www/wwwroot/lxb.com/application/admin/view/deal/goods_search.html";i:1578206546;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("add_goods")): ?><button data-open='<?php echo url("add_goods"); ?>' data-title="添加公告" class='layui-btn'>添加商品</button><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">商品名称</label><div class="layui-input-inline"><input name="title" value="<?php echo htmlentities((app('request')->get('title') ?: '')); ?>" placeholder="请输入商品名称" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">分类</label><div class="layui-input-inline"><select name="cid" id="selectList"><option value="">所有分类</option><?php foreach($cate as $key=>$vo): ?><option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form><script>
        var test = "<?php echo htmlentities((app('request')->get('cid') ?: '0')); ?>";
        $("#selectList").find("option[value="+test+"]").prop("selected",true);

        form.render()
    </script></fieldset><table class="layui-table margin-top-15" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='text-left nowrap'>商品ID</th><th class='text-left nowrap'>商品名称</th><th class='text-left nowrap'>商品价格</th><th class='text-left nowrap'>店铺名称</th><th class='text-left nowrap'>添加时间</th><th class='text-left nowrap'>状态</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><?php echo htmlentities($vo['id']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['goods_name']); ?></td><td class='text-left nowrap'>¥<?php echo htmlentities($vo['goods_price']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['shop_name']); ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['addtime'])); ?></td><td class='text-left nowrap'><?php if(auth("edit_goods")): ?><a class="layui-btn layui-btn-xs layui-btn" data-open="<?php echo url('edit_goods',['id'=>$vo['id']]); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" style='background:green;'>编辑</a><?php endif; if(auth("del_goods")): ?><a class="layui-btn layui-btn-xs layui-btn" style='background:red;' onClick="del_goods(<?php echo htmlentities($vo['id']); ?>)">删除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><script>
    function del_goods(id){
         layer.confirm("确认要删除吗，删除后不能恢复",{ title: "删除确认" },function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('del_goods'); ?>",
                data: {
                    'id': id,
                    '_csrf_': "<?php echo systoken('admin/deal/del_goods'); ?>"
                },
                success:function (res) {
                    layer.msg(res.info,{time:2500});
                    location.reload();
                }
            });
        },function(){});
    }
</script></div></div>