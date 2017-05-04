<?php
/* Smarty version 3.1.30, created on 2017-04-24 16:36:03
  from "D:\blog\index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fdb8f3248178_00402728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '953e7ac5886f4a7cc54559034b1d1bf62cdcc9c2' => 
    array (
      0 => 'D:\\blog\\index.php',
      1 => 1493022932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fdb8f3248178_00402728 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>//判断session中的username是否为空
//include "username_check_session.php";

include_once('smarty_install.php');

//判断用户是否登录
if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
    //登录状态
    $smarty->display('index.php');
}else{
    //非登录状态
    //display显示页面
    $smarty->display('login.php');
}

<?php echo '?>';?>

<?php }
}
