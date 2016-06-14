<?php if (!defined('THINK_PATH')) exit();?><form action='/thinkphp_3.2.3_full/index.php/Home/Role/update/' method='post'>
请选择角色：<select name='user'>
			<?php if(is_array($arr_user)): $i = 0; $__LIST__ = $arr_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["u_id"]); ?>'><?php echo ($vo["u_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select><br/>
请选择权限：<br><?php if(is_array($arr_role)): foreach($arr_role as $key=>$v): ?><input type='checkbox' checked name='role[]' value="<?php echo ($v["r_id"]); ?>"><?php echo ($v["name"]); ?><br><?php endforeach; endif; ?>
			<input type='submit' value='确定'>
			</form>