<?php

//查询数据
include 'mysql/mysql_conn.php';

$sql = "SELECT * FROM blog_article";
$res = @mysqli_query($link,$sql);
//遍历结果集
while($result = @mysqli_fetch_assoc($res)){
    $list[] = array(
        'id' => $result['id'],
        'title' => $result['art_title'],
        'editor' => $result['art_editor'],  //文章作者
        'time' => $result['art_time'],      //创建时间
        'thumb' => $result['art_thumb'],    //文章缩略图
        'content' =>$result['art_content']  //文章内容

    );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="../style/font/css/font-awesome.min.css">
    <script type="text/javascript" src="../style/js/jquery.js"></script>
    <script type="text/javascript" src="../style/js/ch-ui.admin.js"></script>
    <script src="../layer/layer.js"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 文章列表
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->


    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">ID</th>
                        <th>文章标题</th>
                        <th>作者</th>
                        <th>缩略图</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>


                    <?php
                        foreach ($list as $k => $v) {
                    ?>
                        <tr>
                            <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                            <td class="tc"><?php echo $v['id'] ?></td>
                            <td>
                                <a href="#"><?php echo $v['title'] ?></a>
                            </td>
                            <td><?php echo $v['editor'] ?></td>
                            <td> <img src="<?php echo $v['thumb'] ?>" width="40px"></td>
                            <td><?php echo $v['time'] ?></td>

                            <td>
                                <a href="article_update_page.php?id=<?php echo $v['id'] ?>">修改</a>
                                <a onclick="_del(<?php echo $v['id'] ?>)">删除</a>
                            </td>
                        </tr>

                    <?php
                        }
                    ?>
                        </table>
        <div class="page_nav">
        <div>
        <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a>
        <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a>
        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
        <span class="current">8</span>
        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
        <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>
        <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a>
        <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>
        <span class="rows">11 条记录</span>
        </div>
        </div>
                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>
        function _del(id) {
            layer.confirm('您确定要删除吗？', {
                btn: ['是的','不是'] //按钮
            }, function(){
                $.ajax({
                    type: 'GET', //请求类型
                    url: 'article_del.php', //提交URL地址
                    dataType: 'json',   //返回格式
                    data: {id: id}, //数据
                    success: function (data) { //如果成功，执行
                        if(data.status != 0){
                            layer.msg(data.message,{icon:5});
                            return;
                        }
                        layer.msg(data.message, {
                            icon: 6,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function() {
                            location.href = 'article_list_page.php';//成功跳转到页面
                        });
                    },
                    error: function (xhr, status) { //如果失败，执行
                        console.log(xhr);   //在控制台显示错误的原因以及返回值
                        console.log(status);
                    }
                });
            });
        }

    </script>

</body>
</html>