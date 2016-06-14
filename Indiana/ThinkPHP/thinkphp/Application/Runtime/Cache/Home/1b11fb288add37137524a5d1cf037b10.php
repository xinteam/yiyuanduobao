<?php if (!defined('THINK_PATH')) exit();?><table border='1'>
<th>用户</th>
<th>权限</th>
<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
		<td><?php echo ($v["u_name"]); ?></td>
		<td><?php echo ($v["r_name"]); ?></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<select id='change' onchange="change();">
	<?php if(is_array($info)): foreach($info as $key=>$v): ?><option value='<?php echo ($v["u_id"]); ?>'><?php echo ($v["u_name"]); ?></option><?php endforeach; endif; ?>
</select>
<div id='list'>
</div>
<script>
	//查看每个用户的权限
	function change(){
		var val = document.getElementById('change').value;
		//创建ajax对象
		var ajax = new XMLHttpRequest();
		//与服务器建立连接
		ajax.open('get','/thinkphp_3.2.3_full/index.php/Home/Rbac/role/val/'+val,true);
		//发送请求
		ajax.send();
		//回调函数
		ajax.onreadystatechange = function(){
			//判断
			if(ajax.readyState==4 && ajax.status==200){
				document.getElementById('list').innerHTML = ajax.responseText;
			}
		}
	}
</script>