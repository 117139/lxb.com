<?php /*a:2:{s:70:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\help\banner.html";i:1577679488;s:63:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\main.html";i:1575947686;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><!--<form onsubmit="return false;" id="GoodsForm" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off">--><!--<div class="layui-card-body think-box-shadow padding-left-40">--><!--<div class="layui-form-item">--><!--<span class="color-green label-required-prev">轮播展示图片</span>--><!--<table class="layui-table">--><!--<thead>--><!--<tr>--><!--<th class="text-left">展示图片</th>--><!--</tr>--><!--<tr>--><!--<td width="auto" class="text-left"><input name="image" type="hidden" value="<?php echo htmlentities((isset($info['image']) && ($info['image'] !== '')?$info['image']:'')); ?>"></td>--><!--</tr>--><!--</thead>--><!--</table>--><!--<script> $('[name="image"]').uploadMultipleImage()</script>--><!--</div>--><!--<div class="layui-form-item text-center">--><!--<button class="layui-btn" type="submit">保存图片</button>--><!--<button class="layui-btn layui-btn-danger" ng-click="hsitoryBack()" type="button">取消编辑</button>--><!--</div>--><!--</div>--><!--</form>--><div class="think-box-shadow"><a class="layui-btn layui-btn layui-btn" data-open="<?php echo url('add_banner',['id'=>0]); ?>" data-value="id#0" style='background:green;'>新增</a><table class="layui-table margin-top-15" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='text-left nowrap'>图片</th><th class='text-left nowrap'>url</th><?php if(auth("edit_home_msg")): ?><th class='text-left nowrap'>操作</th><?php endif; ?></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><img src="<?php echo htmlentities($vo['image']); ?>" alt="" width="100"></td><td class='text-left nowrap'><?php echo htmlentities($vo['url']); ?></td><td class='text-left nowrap'><?php if(auth("edit_home_msg")): ?><a class="layui-btn layui-btn-xs layui-btn" data-open="<?php echo url('edit_banner',['id'=>$vo['id']]); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" style='background:green;'>编辑</a><a class="layui-btn layui-btn-xs layui-btn" onClick="del_message(<?php echo htmlentities($vo['id']); ?>)" style='background:red;'>删除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table></div><script>
    function del_message(id){
        layer.confirm("确认要删除吗，删除后不能恢复",{ title: "删除确认" },function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('del_banner'); ?>",
                data: {
                    'id': id,
                    '_csrf_': "<?php echo systoken('admin/help/del_banner'); ?>"
                },
                success:function (res) {
                    layer.msg(res.info,{time:2500});
                    location.reload();
                }
            });
        },function(){});
    }
</script></div></div>