
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="style/font/css/font-awesome.min.css">
    <script type="text/javascript" src="style/js/jquery.js"></script>
    <script type="text/javascript" src="style/js/ch-ui.admin.js"></script>
    <script src="layer/layer.js"></script>
    <script src="../laydate/laydate.js"></script>
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
        <form action="../article_list_smarty.php" method="post">
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
                    <td>开始日：<input type="text" name="start" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"></td>
                    <td>结束日：<input type="text" name="end" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"></td>

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


                        <{foreach from=$list item="v"}>

                        <tr>
                            <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                            <td class="tc"><{$v['id']}></td>
                            <td>
                                <a href="#"><{$v['art_title']}></a>
                            </td>
                            <td><{$v['art_editor']}></td>
                            <td> <img src="<{$v['art_thumb']}>" width="40px"></td>
                            <td><{$v['art_time']}></td>

                            <td>
                                <a href="../article_update_smarty.php?id=<{$v['id']}>">修改</a>
                                <a onclick="_del(<{$v['id']}>)">删除</a>
                            </td>
                        </tr>

                    <{/foreach}>
                        </table>
        <div class="page_nav">
        <div>
            <a class="first" href="../article_list_smarty.php?pageNow=1">第一页</a>
            <a class="prev" href="../article_list_smarty.php?pageNow=<{$pageNow-1}>" onclick="_prev()">上一页</a>
            <{for $i=1;$i<=$pageCount;$i++}>
            <a href="../article_list_smarty.php?pageNow=<{$i}>"><{$i}></a>
            <{/for}>
            <a class="next" onclick="_next()">下一页</a>
            <a class="end" href="../article_list_smarty.php?pageNow=<{$pageCount}>">最后一页</a>
            <span class="rows"><{$rowCount}> 条记录</span>
        </div>
        </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>

        function _prev() {
            if(<{$pageNow}>==1){
                alert('已经是第一页了！');
                return;
            }

            $('.prev').attr('href','../article_list_smarty.php?pageNow=<{$pageNow-1}>');
        }

        function _next() {
            if(<{$pageNow}> == <{$pageCount}>)
            {
                alert('已经是最后一页了！');
                return;
            }
            $('.next').attr('href','../article_list_smarty.php?pageNow=<{$pageNow+1}>');
        }



        function _del(id=<{$v['id']}>) {
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
                            location.href = 'article_list_smarty.php';//成功跳转到页面
                        });
                    },
                    error: function (xhr, status) { //如果失败，执行
                        console.log(xhr);   //在控制台显示错误的原因以及返回值
                        console.log(status);
                    }
                });
            });
        }

        function _find() {


            var start = {
                elem: '#start',
                format: 'YYYY/MM/DD hh:mm:ss',
                min: '2016-06-16 23:59:59', //设定最小日期为当前日期
                max: '2099-06-16 23:59:59', //最大日期
                istime: true,
                istoday: false,
                choose: function (datas) {
                    end.min = datas; //开始日选好后，重置结束日的最小日期
                    end.start = datas;//将结束日的初始值设定为开始日
                }
            };
            var end = {
                elem: '#end',
                format: 'YYYY/MM/DD hh:mm:ss',
                min: '2016-06-16 23:59:59',
                max: '2099-06-16 23:59:59',
                istime: true,
                istoday: false,
                choose: function (datas) {
                    start.max = datas; //结束日选好后，重置开始日的最大日期
                }
            };
            laydate(start);
            laydate(end);
        }
    </script>
</body>
</html>