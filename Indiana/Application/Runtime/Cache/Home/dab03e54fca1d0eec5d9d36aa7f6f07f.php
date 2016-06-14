<?php if (!defined('THINK_PATH')) exit();?><meta charset='utf-8'>
<table border='1'>
	<th>id</th>
	<th>姓名</th>
	<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($v["u_id"]); ?></td>
			<td onclick="fun(<?php echo ($v["u_id"]); ?>);"><span id='x<?php echo ($v["u_id"]); ?>'><?php echo ($v["u_name"]); ?></span><input type='hidden' id='y<?php echo ($v["u_id"]); ?>' value="<?php echo ($v["u_name"]); ?>"></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<script>
	//ajax及时更改
	function fun(id){
		document.getElementById('x'+id).style.display='none';
		document.getElementById('y'+id).type='text';
		document.getElementById('y'+id).onblur=function(){
		var val = document.getElementById('y'+id).value;
			//创建ajax对象
			var xml = new XMLHttpRequest();
			//与服务器建立连接
			xml.open('get','/thinkphp_3.2.3_full/index.php/Home/Index/update/id/'+id+'/val/'+val,true);
			//发送请求
			xml.send();
			//回调函数
			xml.onreadystatechange = function(){
				if(xml.readyState==4 && xml.status==200){
					if(xml.responseText==true){
						document.getElementById('x'+id).style.display='block';
						document.getElementById('x'+id).innerHTML = val;
						document.getElementById('y'+id).type='hidden';
					}
				}
			}

		}
	}
</script>