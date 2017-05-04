<?php
/* Smarty version 3.1.30, created on 2017-04-26 14:20:55
  from "D:\blog\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59003c479c92d5_69241793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce45c5531550cda38358aca77b52bd0c491e69ad' => 
    array (
      0 => 'D:\\blog\\templates\\index.tpl',
      1 => 1493187594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59003c479c92d5_69241793 (Smarty_Internal_Template $_smarty_tpl) {
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
 type="text/javascript" src="style/js/ch-ui.admin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="layer/layer.js"><?php echo '</script'; ?>
>
</head>
<body>
<!--头部 开始-->
<div class="top_box">
    <div class="top_left">
        <div class="logo">后台管理模板</div>
        <ul>
            <li><a href="#" class="active">首页</a></li>
            <li><a href="#">管理页</a></li>
        </ul>
    </div>
    <div class="top_right">
        <ul>
            <li>管理员：<?php echo '<?php ';?>echo $_SESSION['username']<?php echo '?>';?></li>
            <li><a href="pass.php" target="main">修改密码</a></li>
            <li><a onclick="_logout()">退出</a></li>
        </ul>
    </div>
</div>
<!--头部 结束-->

<!--左侧导航 开始-->
<div class="menu_box">
    <ul>
        <li>
            <h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
            <ul class="sub_menu">
                <li><a href="../cate_add_smarty.php?act=add" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
                <li><a href="../cate_list.php?act=list" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
                <li><a href="../article_add_smarty.php?act=add" target="main"><i class="fa fa-fw fa-list-alt"></i>添加文章</a></li>
                <li><a href="../article_list_smarty.php" methods="GET" target="main"><i class="fa fa-fw fa-image"></i>文章列表</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
            <ul class="sub_menu">
                <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
                <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>
            </ul>
        </li>
        <li>
            <h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
            <ul class="sub_menu">
                <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--左侧导航 结束-->

<!--主体部分 开始-->
<div class="main_box">
    <iframe src="info.php" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
<!--主体部分 结束-->

<!--底部 开始-->
<div class="bottom_box">
    CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
</div>
<!--底部 结束-->


<?php echo '<script'; ?>
>
    function _logout() {
        layer.msg('你确定要退出吗？', {
            time: 0 //不自动关闭
            ,btn: ['是的', '不要']
            ,yes: function(){
                location.href='logout.php';
            }
        });
    }


<?php echo '</script'; ?>
>
</body>
</html><?php }
}
