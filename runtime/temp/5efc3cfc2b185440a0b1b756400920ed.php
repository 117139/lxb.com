<?php /*a:2:{s:66:"/www/wwwroot/lxb.com/application/admin/view/deal/deal_console.html";i:1582716194;s:53:"/www/wwwroot/lxb.com/application/admin/view/main.html";i:1575947686;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><form onsubmit="return false;" data-auto="true" method="post" class='layui-form layui-card' autocomplete="off"><div class="layui-tab layui-tab-card"><ul class="layui-tab-title"><li class="layui-this">基础设置</li><li>利息宝设置</li></ul><div class="layui-tab-content" style=""><div class="layui-tab-item layui-show"><div class="layui-card-body padding-40 layui-col-md8"><label class="layui-form-item block relative"><span class="color-green margin-right-10">收款银行卡号</span><input name="master_cardnum" required value="<?php echo config('master_cardnum'); ?>" class="layui-input"></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">收款人</span><input name="master_name" required value="<?php echo config('master_name'); ?>" class="layui-input"></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">所属银行</span><input name="master_bank" required value="<?php echo config('master_bank'); ?>" class="layui-input"></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">银行地址</span><input name="master_bk_address" required value="<?php echo config('master_bk_address'); ?>" class="layui-input"></label><hr/><label class="layui-form-item block relative"><span class="color-green margin-right-10">交易所需余额</span><!-- <span class="nowrap color-desc">StoreTitle</span> --><input name="deal_min_balance" required value="<?php echo config('deal_min_balance'); ?>" class="layui-input"><input type="hidden" name="_csrf_" value="<?php echo systoken('admin/deal/deal_console'); ?>"><p class="help-block">交易所需余额</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">未订单的支付等待时长（秒）</span><!-- <span class="nowrap color-desc">OrderWaitTime</span> --><input name="deal_timeout" required placeholder="请输入订单支付等待时长" value="<?php echo config('deal_timeout'); ?>" class="layui-input"><p class="help-block">订单支付等待时长，新下订单未在此时间内容完成支付将会被自动取消</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">匹配范围</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><div id="deal_rule" style="position:relative; margin: 10px 0px;" class="demo-slider"></div><div id="test-slider-tips2" style="position:relative; margin: 10px 0px;" class="help-block">匹配范围：<?php echo config('deal_min_num'); ?>% ~ <?php echo config('deal_max_num'); ?>%</div><input type="hidden" name="deal_min_num" id='min' value="<?php echo config('deal_min_num'); ?>"><input type="hidden" name="deal_max_num" id='max' value="<?php echo config('deal_max_num'); ?>"></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">当日交易次数限制</span><input name="deal_count" required value="<?php echo config('deal_count'); ?>" class="layui-input"><p class="help-block">当日交易次数限制</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">奖励交易次数</span><input name="deal_reward_count" required value="<?php echo config('deal_reward_count'); ?>" class="layui-input"><p class="help-block">奖励交易次数</p></label><!--<label class="layui-form-item margin-top-20 block relative">--><!--<span class="color-green margin-right-10">直推会员推广佣金</span>--><!--&lt;!&ndash; <span class="nowrap color-desc">OrderClearTime</span> &ndash;&gt;--><!--<input name="1_reward" max="1" min="0" step="0.01" required value="<?php echo config('1_reward'); ?>" type="number" class="layui-input">--><!--<p class="help-block">推广佣金</p>--><!--</label>--><!--<label class="layui-form-item margin-top-20 block relative">--><!--<span class="color-green margin-right-10">上两级会员推广佣金</span>--><!--&lt;!&ndash; <span class="nowrap color-desc">OrderClearTime</span> &ndash;&gt;--><!--<input name="2_reward" max="1" min="0" step="0.01" required value="<?php echo config('2_reward'); ?>" type="number" class="layui-input">--><!--<p class="help-block">推广佣金</p>--><!--</label>--><!--<label class="layui-form-item margin-top-20 block relative">--><!--<span class="color-green margin-right-10">上三级会员推广佣金</span>--><!--&lt;!&ndash; <span class="nowrap color-desc">OrderClearTime</span> &ndash;&gt;--><!--<input name="3_reward" max="1" min="0" step="0.01" required value="<?php echo config('3_reward'); ?>" type="number" class="layui-input">--><!--<p class="help-block">推广佣金</p>--><!--</label>--><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">普通会员交易佣金</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><input name="vip_1_commission" max="1" min="0" step="0.01" required value="<?php echo config('vip_1_commission'); ?>" type="number" class="layui-input"><p class="help-block">交易佣金</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">上一级会员交易佣金</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><input name="1_d_reward" max="1" min="0" step="0.01" required value="<?php echo config('1_d_reward'); ?>" type="number" class="layui-input"><p class="help-block">交易佣金</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">上二级会员交易佣金</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><input name="2_d_reward" max="1" min="0" step="0.01" required value="<?php echo config('2_d_reward'); ?>" type="number" class="layui-input"><p class="help-block">交易佣金</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">上三级会员交易佣金</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><input name="3_d_reward" max="1" min="0" step="0.01" required value="<?php echo config('3_d_reward'); ?>" type="number" class="layui-input"><p class="help-block">交易佣金</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">上四级会员交易佣金</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><input name="4_d_reward" max="1" min="0" step="0.01" required value="<?php echo config('4_d_reward'); ?>" type="number" class="layui-input"><p class="help-block">交易佣金</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">上五级会员交易佣金</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><input name="5_d_reward" max="1" min="0" step="0.01" required value="<?php echo config('5_d_reward'); ?>" type="number" class="layui-input"><p class="help-block">交易佣金</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">冻结时间</span><!-- <span class="nowrap color-desc">OrderClearTime</span> --><input name="deal_feedze" required value="<?php echo config('deal_feedze'); ?>" class="layui-input"><p class="help-block">冻结时间</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">允许违规次数</span><input name="deal_error" required placeholder="请输入已发货订单自动确认收货时长" value="<?php echo config('deal_error'); ?>" class="layui-input"><p class="help-block">允许违规次数</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">提交订单延时时间(单位/秒)</span><p>
                            远程主机分配时间: <input name="deal_zhuji_time" style="width:100px;display: inline-block" required placeholder="" value="<?php echo config('deal_zhuji_time'); ?>" class="layui-input">
                            等待商家响应时间 <input name="deal_shop_time" style="width:100px;display: inline-block" required placeholder="" value="<?php echo config('deal_shop_time'); ?>" class="layui-input"></p><p class="help-block">时间由2部分组成,默认都是5秒,总共10秒</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">app下载地址</span><input name="app_url" required placeholder="请输入app下载地址" value="<?php echo config('app_url'); ?>" class="layui-input"><p class="help-block">app下载地址</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">版本号</span><input name="version" required placeholder="请输入版本" value="<?php echo config('version'); ?>" class="layui-input"><p class="help-block">版本号</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">提现时间</span><input style="width: 120px;display: inline-block" name="tixian_time_1" required placeholder="提现开始时间" value="<?php echo config('tixian_time_1'); ?>" class="layui-input">
                        -
                        <input style="width: 120px;display: inline-block" name="tixian_time_2" required placeholder="提现结束时间" value="<?php echo config('tixian_time_2'); ?>" class="layui-input"><p class="help-block">只支持整点, 如08:00-20:00,请直接输入 8 - 20</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">抢单时间</span><input style="width: 120px;display: inline-block" name="order_time_1" required placeholder="抢单开始时间" value="<?php echo config('order_time_1'); ?>" class="layui-input">
                        -
                        <input style="width: 120px;display: inline-block" name="order_time_2" required placeholder="抢单结束时间" value="<?php echo config('order_time_2'); ?>" class="layui-input"><p class="help-block">只支持整点, 如08:00-20:00,请直接输入 8 - 20</p></label><label class="layui-form-label label-required">是否显示弹幕</label><div class="layui-input-block"><input type="checkbox" name="show_dm" lay-skin="switch" lay-text="ON|OFF" <?php echo config('show_dm')? 'checked=""':'' ?>><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div></div></div></div><div class="layui-tab-item"><div class="layui-card-body padding-40 layui-col-md8"><label class="layui-form-item block relative"><span class="color-green margin-right-10">日利率</span><input name="lxb_bili" required value="<?php echo config('lxb_bili'); ?>" class="layui-input"><p class="help-block">利息宝日利率, 直接写小数,没有百分号</p></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">转入最小额度</span><input name="lxb_ru_min" required value="<?php echo config('lxb_ru_min'); ?>" class="layui-input"><p class="help-block">利息宝转入额度最低</p></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">转入最大额度</span><input name="lxb_ru_max" required value="<?php echo config('lxb_ru_max'); ?>" class="layui-input"><p class="help-block">利息宝转入额度最高</p></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">转出到余额时间</span><input name="lxb_time" required value="<?php echo config('lxb_time'); ?>" class="layui-input"><p class="help-block">转出到余额,实际到账时间 /小时</p></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">上一级会员收益比例</span><input name="lxb_sy_bili1" required value="<?php echo config('lxb_sy_bili1'); ?>" class="layui-input"></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">上两级会员收益比例</span><input name="lxb_sy_bili2" required value="<?php echo config('lxb_sy_bili2'); ?>" class="layui-input"></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">上三级会员收益比例</span><input name="lxb_sy_bili3" required value="<?php echo config('lxb_sy_bili3'); ?>" class="layui-input"></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">上四级会员收益比例</span><input name="lxb_sy_bili4" required value="<?php echo config('lxb_sy_bili4'); ?>" class="layui-input"></label><label class="layui-form-item block relative"><span class="color-green margin-right-10">上五级会员收益比例</span><input name="lxb_sy_bili5" required value="<?php echo config('lxb_sy_bili5'); ?>" class="layui-input"></label></div></div></div><div class="layui-form-item text-center margin-top-20"><button class="layui-btn" type="submit">保存配置</button></div></div></form><script>
    layui.use('slider', function(){
      var $ = layui.$
      ,slider = layui.slider,
      min = "<?php echo config('deal_min_num'); ?>",
      max = "<?php echo config('deal_max_num'); ?>";
      //默认滑块
      //开启范围选择
      slider.render({
        elem: '#deal_rule'
        ,value: [min,max] //初始值
        ,range: true //范围选择
        ,change: function(vals){
          $('#test-slider-tips2').html('匹配范围：'+ vals[0] + '% ~ '+ vals[1]+'%');
          $('#min').val(vals[0]);
          $('#max').val(vals[1]);
        }
      });      
    });

    window.form.render();
</script></div></div>