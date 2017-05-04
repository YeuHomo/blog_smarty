<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/26
 * Time: 10:47
 */

include_once "smarty_install.php";

if($_GET['act']=='find'){

    $keywords = $_GET['keywords'];

    $sql = "SELECT * FROM blog_category WHERE  cate_title like '%{$keywords}%'";
    $result = mysqli_query($link,$sql);

    $list = array();
    while($res = @mysqli_fetch_assoc($result)) {
        $list[] = $res;
    }

    $smarty->assign('list',$list);
}else{
    $id = $_GET['act'];
    $sql = "SELECT * FROM blog_category WHERE cate_pid='{$id}'";
    $result = mysqli_query($link,$sql);

    $list = array();
    while($res = @mysqli_fetch_assoc($result)) {
        $list[] = $res;
    }

    $smarty->assign('list',$list);
}


$smarty->display("cate_list_page.tpl");