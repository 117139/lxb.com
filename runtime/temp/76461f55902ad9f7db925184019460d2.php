<?php /*a:2:{s:84:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\admin\view\help\home_msg.html";i:1576044894;s:75:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\admin\view\main.html";i:1575947686;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><table class="layui-table margin-top-15" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='text-left nowrap'>类型</th><th class='text-left nowrap'>正文内容</th><th class='text-left nowrap'>更新时间</th><th class='text-left nowrap'>最后编辑</th><?php if(auth("edit_home_msg")): ?><th class='text-left nowrap'>操作</th><?php endif; ?></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='text-left nowrap'><?php echo htmlentities($vo['title']); ?></td><td class='text-left nowrap'><?php echo $vo['content']; ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['addtime'])); ?></td><td class='text-left nowrap'><?php echo htmlentities($vo['author']); ?></td><td class='text-left nowrap'><?php if(auth("edit_home_msg")): ?><a class="layui-btn layui-btn-xs layui-btn" data-open="<?php echo url('edit_home_msg',['id'=>$vo['id']]); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" style='background:green;'>编辑</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table></div></div></div>