<?php /*a:3:{s:81:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\admin\view\user\index.html";i:1575947686;s:75:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\admin\view\main.html";i:1575947686;s:88:"D:\wamp64\www\tp\jiahoumendaima\shangcheng\application\admin\view\user\index_search.html";i:1575947686;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("add")): ?><button data-modal='<?php echo url("add"); ?>' data-title="添加用户" class='layui-btn layui-btn-sm layui-btn-primary'>添加用户</button><?php endif; if(auth("remove")): ?><button data-action='<?php echo url("remove"); ?>' data-rule="id#{key}" data-csrf="<?php echo systoken('remove'); ?>" data-confirm="确定要删除这些用户吗？" class='layui-btn layui-btn-sm layui-btn-primary'>删除用户</button><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">用户账号</label><div class="layui-input-inline"><input name="username" value="<?php echo htmlentities((app('request')->get('username') ?: '')); ?>" placeholder="请输入用户名" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">联系手机</label><div class="layui-input-inline"><input name="phone" value="<?php echo htmlentities((app('request')->get('phone') ?: '')); ?>" placeholder="请输入联系手机" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">联系邮箱</label><div class="layui-input-inline"><input name="mail" value="<?php echo htmlentities((app('request')->get('mail') ?: '')); ?>" placeholder="请输入联系邮箱" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">使用状态</label><div class="layui-input-inline"><select class="layui-select" name="status"><?php foreach([''=>'-- 全部状态 --','0'=>'已禁用的账号','1'=>'使用中的账号'] as $k=>$v): if(app('request')->get('status') == $k.""): ?><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">登录时间</label><div class="layui-input-inline"><input data-date-range name="login_at" value="<?php echo htmlentities((app('request')->get('login_at') ?: '')); ?>" placeholder="请选择登录时间" class="layui-input"></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><script>form.render()</script><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><label><input data-auto-none data-check-target='.list-check-box' type='checkbox'></label></th><th class='text-left nowrap'>用户账号</th><th class='text-left nowrap'>联系手机</th><th class='text-center nowrap'>登录次数</th><th class='text-center nowrap'>使用状态</th><th class='text-left nowrap'>创建时间</th><th class='text-left nowrap'>登录时间</th><th class='text-left nowrap'></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr data-dbclick><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></label></td><td class='text-left nowrap'><?php echo htmlentities((isset($vo['username']) && ($vo['username'] !== '')?$vo['username']:'')); ?></td><td class='text-left nowrap'><?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:'-')); ?></td><td class='text-center nowrap'><?php echo htmlentities((isset($vo['login_num']) && ($vo['login_num'] !== '')?$vo['login_num']:0)); ?></td><td class='text-center nowrap'><?php if($vo['status'] == '0'): ?><span class="color-red">已禁用</span><?php else: ?><span class="color-green">使用中</span><?php endif; ?></td><td class='text-left nowrap'><?php echo htmlentities(format_datetime($vo['create_at'])); ?></td><td class='text-left nowrap'><?php if($vo['login_num']>0): ?><?php echo htmlentities(format_datetime($vo['login_at'])); else: ?> - <?php endif; ?></td><td class='text-left nowrap'><?php if(auth("pass")): ?><a class="layui-btn layui-btn-normal layui-btn-sm" data-title="设置密码" data-modal='<?php echo url("pass"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>密 码</a><?php endif; if(auth("edit")): ?><a data-dbclick class="layui-btn layui-btn-sm" data-title="编辑用户" data-modal='<?php echo url("edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编 辑</a><?php endif; if($vo['status'] == 1 and auth("forbid")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('forbid'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#0" data-csrf="<?php echo systoken('forbid'); ?>">禁 用</a><?php elseif($vo['status'] == 0 and auth("resume")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('resume'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#1" data-csrf="<?php echo systoken('resume'); ?>">启 用</a><?php endif; if(auth("remove")): ?><a class="layui-btn layui-btn-sm layui-btn-danger" data-confirm="确定要删除该用户吗？" data-action="<?php echo url('remove'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" data-csrf="<?php echo systoken('remove'); ?>">删 除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div>