<?php
/* Smarty version 3.1.30, created on 2017-04-24 16:35:22
  from "D:\blog\login.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fdb8cac78441_35854116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f823b3cb578bca1d45a05298519cde66e8cb88db' => 
    array (
      0 => 'D:\\blog\\login.php',
      1 => 1492587450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fdb8cac78441_35854116 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="style/font/css/font-awesome.min.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="style/js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="layer/layer.js"><?php echo '</script'; ?>
>
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			<p style="color:red">用户名错误</p>
			<form action="javascript:;" method="post">
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="tools/code/getCode.php" alt="" onclick="this.src='tools/code/getCode.php?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆" onclick="_login()"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.houdunwang.com" target="_blank">http://www.houdunwang.com</a></p>
		</div>
	</div>

    <?php echo '<script'; ?>
>
        function _login() {
            var username = $('input[name=username]').val();
            var password = $('input[name=password]').val();
            var code = $('input[name=code]').val();

            $.ajax({
                type: 'POST', //请求类型
                url: 'login_check.php', //提交URL地址
                dataType: 'json',   //返回格式
                data: {username:username,password:password,code:code}, //数据
                success: function (data) { //如果成功，执行
                    if(data.status != 0){   //返回状态不为0时，显示对应的错误
                        layer.msg(data.message,{icon:5,time: 2000});
                        return;
                    }
                    layer.msg(data.message, {
                        icon: 1,
                        time: 1000
                    }, function() {
                        location.href = 'index.php';//成功跳转到页面
                    });
                },
                error: function (xhr, status) { //如果失败，执行
                    console.log(xhr);   //在控制台显示错误的原因以及返回值
                    console.log(status);
                }
            });
        }


    <?php echo '</script'; ?>
>

</body>
</html>

<?php }
}
