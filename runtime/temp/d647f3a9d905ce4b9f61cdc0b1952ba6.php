<?php /*a:2:{s:73:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\deal\edit_cate.html";i:1591696966;s:63:"D:\phpstudy_pro\WWW\www.sc.com\application\admin\view\main.html";i:1575947686;}*/ ?>
<div class="layui-card layui-bg-gray"><style>
        .uploadimage{
            width: 25%!important;
        }
    </style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><form onsubmit="return false;" id="GoodsForm" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off"><div class="layui-card-body think-box-shadow padding-left-40"><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">分类名称</span><input name="name" required class="layui-input" value="<?php echo htmlentities($info['name']); ?>" placeholder="请输入分类名称"><input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>"><input type="hidden" name="_csrf_" value="<?php echo systoken('admin/deal/edit_cate'); ?>"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">比例</span><input name="bili" required class="layui-input" value="<?php echo htmlentities($info['bili']); ?>" placeholder="请输入比例"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">简介</span><input name="cate_info" required class="layui-input" value="<?php echo htmlentities($info['cate_info']); ?>" placeholder="请输入简介"></label></div><div class="layui-form-item layui-row layui-col-space15"><label class="layui-col-xs9 relative"><span class="color-green">最低金额限制</span><input name="min" required class="layui-input" value="<?php echo htmlentities($info['min']); ?>" placeholder="请输入金额"></label></div><div class="layui-form-item"><span class="color-green label-required-prev">分类LOGO(不用修改)</span><table class="layui-table"><thead><tr><th class="text-center">展示图片</th></tr><tr><td width="90px" class="text-center"><input name="cate_pic" value="<?php echo htmlentities($info['cate_pic']); ?>" type="hidden"></td></tr></thead></table><script>$('[name="cate_pic"]').uploadOneImage();</script></div><div class="layui-form-item block"></div><div class="layui-form-item text-center"><button class="layui-btn" type="submit">保存</button><button class="layui-btn layui-btn-danger" ng-click="hsitoryBack()" type="button">取消编辑</button></div></div></form></div><script>
    window.form.render();

</script></div>