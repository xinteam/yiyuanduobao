<?php if (!defined('THINK_PATH')) exit();?><table border='1'>
	<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
			<td><?php echo ($v["r_name"]); ?></td>
		</tr><?php endforeach; endif; ?>
<table>