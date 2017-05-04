<?php

include_once('smarty_install.php');

$sql4 = "SELECT * FROM blog_category WHERE cate_pid=0";
$res4 = @mysqli_query($link,$sql4);


$list_p = array();
while($result = @mysqli_fetch_assoc($res4)){
    $list_p[] = $result;
}
$smarty->assign("list_p",$list_p);

if($_GET) {

    if ($_GET['act'] == 'list') {

        //4.发送sql语句并得到结果进行处理
        //4.1分页[分页要发出两个sql语句，一个是获得$rowCount,一个是通过sql的limit获得分页结果。所以我们会获得两个结果集，在命名的时候要记得区分。分页四个值 两个sql语句）。]
        $pageSize = 10;//每页显示多少条记录
        $rowCount = 0;//共有多少条记录
        $pageNow = 1;//希望显示第几页
        $pageCount = 0;//一共有多少页  [分页共有这个四个指标，缺一不可。由于$rowCount可以从服务器获得的，所以可以给予初始值为0；$pageNow希望显示第几页，这里最好是设置为0；$pageSize是每页显示多少条记录，这里根据网站需求提前制定。
        //$pageCount=ceil($rowCount/$pageSize）,既然$rowCount可以初始值为0，那么$pageCount当然也就可以设置为0.四个指标，两个0 ，一个1，另一个为网站需求。]
        //4.15根据分页链接来修改$pageNow的值
        if (!empty($_GET['pageNow'])) {
            $pageNow = $_GET['pageNow'];
        }//[根据分页链接来修改$pageNow的值。]
        $sql1 = 'select count(id) from blog_category';
        $res1 = mysqli_query($link, $sql1);
        //4.11取出行数
        if ($row = mysqli_fetch_row($res1)) {
            $rowCount = $row[0];
        }//[取得$rowCount,，进了我们就知道了$pageCount这两个指标了。]
        //4.12计算共有多少页
        $pageCount = ceil($rowCount / $pageSize);
        $pageStart = ($pageNow - 1) * $pageSize;


        //4.13发送带有分页的sql结果
        $sql2 = "select * from blog_category limit $pageStart,$pageSize";//[根据$sql语句的limit 后面的两个值（起始值，每页条数），来实现分页。以及求得这两个值。]
        $res2 = mysqli_query($link, $sql2) or die('无法获取结果集' . mysqli_error());

        $list = array();
        while ($row = mysqli_fetch_assoc($res2)) {
            $list[] = $row;
        }
        $smarty->assign('list', $list);
        $smarty->assign('rowCount', $rowCount);
        $smarty->assign('pageCount', $pageCount);
        $smarty->assign('pageNow', $pageNow);

    }else {

        $id = $_GET['act'];
        $sql = "SELECT * FROM blog_category WHERE cate_pid='{$id}'";
        $result = mysqli_query($link, $sql);

        $list = array();
        while ($res = @mysqli_fetch_assoc($result)) {
            $list[] = $res;
        }
        $smarty->assign('list', $list);
    }
}

if($_POST) {
    $keywords = $_POST['keywords'];

    $sql = "SELECT * FROM blog_category WHERE  cate_title like '%{$keywords}%'";
    $result = mysqli_query($link, $sql);

    $list = array();
    while ($res = @mysqli_fetch_assoc($result)) {
        $list[] = $res;
    }
    $smarty->assign('list', $list);
}
    $smarty->display('cate_list_page.tpl');