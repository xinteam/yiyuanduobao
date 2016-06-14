<?php if (!defined('THINK_PATH')) exit();?><meta charset='utf-8'>
<table border='1'>
	<th>id</th>
	<th>姓名</th>
	<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($v["u_id"]); ?></td>
			<td onclick="fun(<?php echo ($v["u_id"]); ?>,this,'<?php echo ($v["u_name"]); ?>');"><?php echo ($v["u_name"]); ?></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<script>
	//ajax及时更改
	function fun(id,obj,val){
		//alert(val)
		//alert(id)
		//val = obj.innerHTML;
		obj.innerHTML = '';
		//创建一个新的input标签
		var inp = document.createElement('input');
		//改变input元素为text
		inp.setAttribute("type","text");
		inp.value = val;
		aa = inp.value;
		//在td中追加一个文本框
		obj.appendChild(inp);
		inp.select();
		inp.onblur=function(){
			//obj.innerHTML
			//创建ajax对象
			/*var xml = new XMLHttpRequest();
			//与服务器建立连接
			xml.open('get','/thinkphp_3.2.3_full/index.php/Home/Index/update/id/'+id+'/val/'+aa,true);
			//发送请求
			xml.send();
			//回调函数
			xml.onreadystatechange = function(){
				if(xml.readyState==4 && xml.status==200){
					alert(xml.reponseText);
					
				}
			}*/
		}
		
		/*document.getElementById('x'+id).style.display='none';
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

		}*/
	}
</script>