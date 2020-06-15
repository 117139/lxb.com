<?php /*a:2:{s:64:"/www/wwwroot/lxb.com/application/admin/view/deal/goods_cate.html";i:1578196404;s:53:"/www/wwwroot/lxb.com/application/admin/view/main.html";i:1575947686;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("add_goods")): ?><button data-open='<?php echo url("add_cate"); ?>' data-title="添加分类" class='layui-btn'>添加分类</button><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><table class="layui-table margin-top-15" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='text-left nowrap'>分类ID</th><th class='text-left nowrap'>分类名称</th><th class='text-left nowrap'>比例</th><th class='text-left nowrap'>简介</th><th class='text-left nowrap'>添加时间</th><th class='text-left nowrap'>状态</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><?php echo htmlentities($vo['id']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['name']); ?></td><td class='text-left nowrap'>¥<?php echo htmlentities($vo['bili']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['cate_info']); ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['addtime'])); ?></td><td class='text-left nowrap'><?php if(auth("edit_goods")): ?><a class="layui-btn layui-btn-xs layui-btn" data-open="<?php echo url('edit_cate',['id'=>$vo['id']]); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" style='background:green;'>编辑</a><?php endif; if(auth("del_goods")): ?><a class="layui-btn layui-btn-xs layui-btn" style='background:red;' onClick="del_goods(<?php echo htmlentities($vo['id']); ?>)">删除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div><script>
    function del_goods(id){
         layer.confirm("确认要删除吗，删除后不能恢复",{ title: "删除确认" },function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('del_cate'); ?>",
                data: {
                    'id': id,
                    '_csrf_': "<?php echo systoken('admin/deal/del_cate'); ?>"
                },
                success:function (res) {
                    layer.msg(res.info,{time:2500});
                    location.reload();
                }
            });
        },function(){});
    }
</script></div></div>