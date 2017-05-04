<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="../style/font/css/font-awesome.min.css">
    <script type="text/javascript" src="../style/js/jquery.js"></script>
<!--    <script type="text/javascript" src="style/js/ch-ui.admin.js"></script>-->
    <script src="../layer/layer.js"></script>
    <script src="../laydate/laydate.js"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">博客管理</a> &raquo; 所有分类
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox"></th>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>分类名称</th>
                        <th>分类描述</th>
                        <th>操作</th>
                    </tr>

                    <{foreach from=$list item="v"}>
                    <tr>
                        <td class="tc">
                            <input type="checkbox" name="abc" id="<{$v['id']}>">
                        </td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="<{$v['id']}>">

                        </td>
                        <td class="tc"><{$v['id']}></td>
                        <td>
                            <a href="#"><{$v['cate_name']}></a>
                        </td>
                        <td><{$v['cate_title']}></td>

                        <td>
                            <a href="../cate_update_smarty.php?id=<{$v['id']}>">修改</a>
                            <a onclick="_cadel(<{$v['id']}>)">删除</a>
                        </td>
                    </tr>
                    <{/foreach}>
                </table>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>
        function _cadel(id=<{$v['id']}>) {
            layer.confirm('您确定要删除吗？', {
                btn: ['是的', '不是'] //按钮
            }, function () {
                $.ajax({
                    type: 'GET', //请求类型
                    url: 'cate_del.php', //提交URL地址
                    dataType: 'json',   //返回格式
                    data: {id: id}, //数据
                    success: function (data) { //如果成功，执行
                        if (data.status != 0) {
                            layer.msg(data.message, {icon: 5});
                            return;
                        }
                        layer.msg(data.message, {
                            icon: 6,
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }, function () {

                            location.href = 'cate_list.php';//成功跳转到页面
                        });
                    },
                    error: function (xhr, status) { //如果失败，执行
                        console.log(xhr);   //在控制台显示错误的原因以及返回值
                        console.log(status);
                    }
                });
            }, function () {
                layer.msg('不删除你乱按啥', {
                    icon: 5,
                    time: 2000, //2s后自动关闭
                    btn: ['大哥我错了', '哦']
                });
            });
        }

    </script>
</body>
</html>
