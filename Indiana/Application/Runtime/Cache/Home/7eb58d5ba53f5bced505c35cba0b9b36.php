<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>123快购登陆</title>
    <link rel="stylesheet" href="http://www.123kg.cn/statics/templates/yungoucms/css/login-page.css"/>
</head>

<body>
<div class="top">
    <div class="top-box">
        <a class="logo" href="../index.htm" tppabs="http://www.123kg.cn/"></a>

        <div class="r">
            <a href="../index.htm" tppabs="http://www.123kg.cn/">返回首页</a>
            <span>|</span>
            <a href="../help/1.htm" tppabs="http://www.123kg.cn/help/1">帮助中心</a>
        </div>
    </div>
</div>

<div class="center-box">
    <div class="login-box">
        <div class="login-form">
            <div class="BT">
            	<span>
                	<a href="javascript:if(confirm('http://www.123kg.cn/register/?channel=  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ������, �����������, ����Ŀ����ֹͣ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.123kg.cn/register/?channel='" tppabs="http://www.123kg.cn/register/?channel=">立即注册</a>
                    <a href="http://www.123kg.cn/member/finduser/findpassword">忘记密码？</a>
                </span>
            </div>
            <form class="form" method="post" action="" id="export">
                <div class="tips hide">
                    账户名与密码不匹配，请重新输入
                </div>
                <div class="inp-txt">
                    <input class="txt l" type="text" name="username"/>
                    <a class="del-txt1 l hide" href=""></a>
                </div>
                <div class="inp-pwd">
                    <input class="pwd l" type="password" name="password"/>
                    <a class="del-txt2 l hide" href=""></a>
                </div>
                <div class="inp-code">
                    <input class="code l" type="text" style="position: absolute;" name="verify"/>
                    <img
                            style="position: relative;width: 80px;
    height: 40px;margin-left: 190px;float: left;" alt="验证码"
                            src="../api/checkcode/image/53_27/index.htm.png" tppabs="http://www.123kg.cn/api/checkcode/image/53_27/" class="code_img"
                            id="codeImg" onclick="this.src=this.src+'?'">
                </div>
                <a class="btn">立即登录</a>
                <input type="hidden" name="login_value" value="" id="login_value_id" />
                <span class="coop" style="text-align: center;">使用合作账号登录：</span>
												<span class="QQ-icon" style="cursor:pointer;"></span>
				            </form>
        </div>
        <div class="shadow"></div>
    </div>
</div>

<div class="bottom">
    Copyright © 版权所有深圳市一二三快购电子商务有限公司粤ICP备15071180号
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    地址：深圳市南山区粤兴二道武汉大学产学研基地A501-1
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    热线：0755-86581853
</div>
<script type="text/javascript" src="/yiyuanduobao/Indiana/Public/statics/templates/yungoucms/js/jquery-1.9.1.min.js" tppabs="http://www.123kg.cn/statics/templates/yungoucms/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$('.QQ-icon').click(function(){
		window.location='http://bad_redirect';
	});
$('.btn').click(function(){
$('#login_value_id').val('login');
    $('#export').submit();

});
</script>
</body>
</html>