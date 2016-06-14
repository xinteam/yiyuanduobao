<?php if (!defined('THINK_PATH')) exit(); if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="/thinkphp_3.2.3_full/Public/<?php echo ($vo["s_tupian"]); ?>" width='200px' height='200px'><br>
<?php echo ($vo["s_price"]); ?><br>
<?php echo ($vo["s_content"]); endforeach; endif; else: echo "" ;endif; ?>
<br>
<form action='/thinkphp_3.2.3_full/index.php/Home/Index/uploads' method='post' enctype="multipart/form-data">
<input type='hidden' name='s_id' value="<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["s_id"]); endforeach; endif; else: echo "" ;endif; ?>">
评论内容:<textarea id='content' name='p_content' cols='20' rows='5'></textarea><br/>
<div id='aa'>
<input type='button' value='增加' id='MyFile' onclick="add();"><input type='file' name='myfile[]'>
</div>
<input type='submit' value='评论'>

<script>
	function add() {  
	var odiv = document.getElementById("aa");
	//alert(odiv)
	var str = "<div><input type='button' value='增加' onclick='add();'><input name='myfile[]' type='file' /></div>";
	odiv.insertAdjacentHTML("beforeEnd",str);
	}

	/*function del(obj){
		//alert(obj);
		var odiv = document.getElementById("aa");
		var grand = document.getElementById("grand");
		var str = "<div><input type='button' value='增加' onclick='add();'><input name='File' type='file' /><input type='button' value='减少' onclick='del(this)'></div>";
		father = obj.parentNode.parentNode;
		grand.removeChild(obj.parentNode.parentNode);
	}*/
</script>
</form>