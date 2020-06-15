<?php /*a:2:{s:70:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\users\level.html";i:1591697715;s:63:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\main.html";i:1575947686;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("add_users")): ?><!--<button data-modal='<?php echo url("add_users"); ?>' data-title="添加等级" class='layui-btn'>添加等级</button>--><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><table class="layui-table margin-top-15" lay-filter="tab" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th lay-data="{field:'id',width:80}" class='text-left nowrap'>ID</th><th lay-data="{field:'name',width:80}" class='text-left nowrap'>名称</th><th lay-data="{field:'num',width:80}" class='text-left nowrap'>会员价格</th><th lay-data="{field:'bili',width:80}" class='text-left nowrap'>佣金比例</th><th lay-data="{field:'fudan_bili',width:80}" class='text-left nowrap'>信用单佣金比例</th><th lay-data="{field:'num_min',width:120}" class='text-left nowrap'>最小余额</th><th lay-data="{field:'order_num',width:80}" class='text-left nowrap'>接单次数</th><th lay-data="{field:'fudan_order_num',width:80}" class='text-left nowrap'>信用单接单次数</th><th lay-data="{field:'arrears_times',width:80}" class='text-left nowrap'>信用单欠款次数</th><th lay-data="{field:'tixian_ci',width:80}" class='text-left nowrap'>提现次数</th><th lay-data="{field:'tixian_min',width:110}" class='text-left nowrap'>提现最小金额</th><th lay-data="{field:'tixian_max',width:110}" class='text-left nowrap'>提现最大金额</th><th lay-data="{field:'addtime',width:200}" class='text-left nowrap'>注册时间</th><th lay-data="{field:'edit',width:280,fixed: 'right'}" class='text-left nowrap'>操作</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><?php echo htmlentities($vo['id']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['name']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['num']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['bili']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['fudan_bili']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['num_min']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['order_num']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['fudan_order_num']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['arrears_times']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['tixian_ci']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['tixian_min']); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['tixian_max']); ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['addtime'])); ?></td><td class='text-left nowrap'><a data-dbclick class="layui-btn layui-btn-xs" data-title="会员等级" data-modal='<?php echo url("admin/users/edit_users_level"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编辑</a><a class="layui-btn layui-btn-xs layui-btn" onClick="del_user(<?php echo htmlentities($vo['id']); ?>)" style='background:red;'>删除</a></td></tr><?php endforeach; ?></tbody></table><script>        function del_user(id){
            layer.confirm("确认要删除吗，删除后不能恢复",{ title: "删除确认" },function(index){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('delete_user'); ?>",
                    data: {
                        'id': id,
                        '_csrf_': "<?php echo systoken('admin/users/delete_user'); ?>"
                    },
                    success:function (res) {
                        layer.msg(res.info,{time:2500});
                        location.reload();
                    }
                });
            },function(){});
        }
    </script><script>        var table = layui.table;
        //转换静态表格
        var limit = Number('<?php echo htmlentities(app('request')->get('limit')); ?>');
        if(limit==0) limit=20;
        table.init('tab', {
            cellMinWidth:120,
            skin: 'line,row',
            size: 'lg',
            limit: limit
        });
    </script><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div>