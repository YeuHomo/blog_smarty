<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/24
 * Time: 19:20
 */

include_once ('smarty_install.php');

if($_GET['act'] == 'add'){
    $sql = "SELECT * FROM blog_category WHERE cate_pid=0";
    $res = @mysqli_query($link,$sql);

    while($result = @mysqli_fetch_assoc($res)){
        $list_p[] = array(
            'id' => $result['id'],
            'name' => $result['cate_name'],
        );
        $smarty->assign("list_p",$list_p);

    }
    $smarty->display('cate_add_page.tpl');
}else{

    header('Content-type:text/json');
    if($_GET){

        $parent = $_GET['cate_parent']?strip_tags($_GET['cate_parent']):'';
        $name = $_GET['cate_name']?strip_tags($_GET['cate_name']):'';
        $title = $_GET['cate_title']?strip_tags($_GET['cate_title']):'';

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

        $sql = "INSERT INTO blog_category(cate_name,cate_title,cate_pid) VALUES( '$name', '$title', '$parent')";
        $result = mysqli_query($link,$sql);

        if($result){
            $data = array('status'=>0,'message'=>'添加成功！');
            die(json_encode($data));

        }else{
            $data = array('status'=>5,'message'=>'添加失败！');
            die(json_encode($data));
        }

    }
    $smarty->display('cate_add_page.tpl');

}


