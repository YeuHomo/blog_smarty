<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24
 * Time: 20:33
 */

include_once("smarty_install.php");

if($_GET) {
    $id = $_GET['id'];

    if ($id == '') {
        echo '无法获得id';
        return;
    }
    $sql = "SELECT * FROM blog_category WHERE id='{$id}'";
    $result = @mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($result);

    $smarty->assign("data", $data);


    $sql_p = "SELECT * FROM blog_category WHERE cate_pid=0";
    $res = @mysqli_query($link, $sql);

    while ($result = @mysqli_fetch_assoc($res)) {
        $list_p[] = array(
            'id' => $result['id'],
            'name' => $result['cate_name'],
        );
        $smarty->assign("list_p", $list_p);
    }


}else{

    header('Content-type:text/json');
    $id = $_POST['id']?strip_tags($_POST['id']):'';
    $parent = $_POST['cate_parent']?strip_tags($_POST['cate_parent']):'';
    $name = $_POST['cate_name']?strip_tags($_POST['cate_name']):'';
    $title = $_POST['cate_title']?strip_tags($_POST['cate_title']):'';

    if($id == ''){
        $data = array('status' =>6,'message' =>'无法获取id');
        die(json_encode($data));
    }

    if($name == ''){
        $data = array('status' =>1,'message' =>'分类名称不能为空');
        die(json_encode($data));
    }

    if($title == ''){
        $data = array('status' =>2,'message' =>'分类标题不得为空！');
        die(json_encode($data));
    }

    if($parent == ''){
        $parent=0;
    }

    if(strlen($name)>30){
        $data = array('status' =>3,'message' =>'分类名称不得超过30字！');
        die(json_encode($data));
    }

    if(strlen($title)>300){
        $data = array('status' =>4,'message' =>'分类标题不得超过300字！');
        die(json_encode($data));
    }

    include 'mysql/mysql_conn.php';
    $sql = "UPDATE blog_category SET cate_name='{$name}',cate_title='{$title}',cate_pid='{$parent}' WHERE id='{$id}'";
    $result = @mysqli_query($link,$sql);

    if($result){
        $data = array('status'=>0,'message'=>'修改成功！');
        die(json_encode($data));

    }else{
        $data = array('status'=>5,'message'=>'修改失败！');
        die(json_encode($data));
    }
}

$smarty->display("cate_update_page.tpl");