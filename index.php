<?php

//判断session中的username是否为空
//include "username_check_session.php";

include_once('smarty_install.php');

//判断用户是否登录
if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
    //登录状态
    $smarty->display('index.tpl');
}else{
    //非登录状态
    //display显示页面
    $smarty->display('login.tpl');
}

?>

