<?php
/* Smarty version 3.1.30, created on 2017-04-26 13:56:34
  from "D:\blog\templates\cate_list_page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590036922fc979_86720604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67555b379a9a47e38cc74f80640c9703dd04dc87' => 
    array (
      0 => 'D:\\blog\\templates\\cate_list_page.tpl',
      1 => 1493186091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590036922fc979_86720604 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="../style/font/css/font-awesome.min.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="../style/js/jquery.js"><?php echo '</script'; ?>
>
<!--    <?php echo '<script'; ?>
 type="text/javascript" src="style/js/ch-ui.admin.js"><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
 src="../layer/layer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../laydate/laydate.js"><?php echo '</script'; ?>
>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">博客管理</a> &raquo; 所有分类
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    <div class="search_wrap">
        <form action="../cate_list.php" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                                <option value="">==请选择==</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_p']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                                <option value="../cate_list.php?act=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td>

                    </td>
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
                    <a onclick="_alldel()"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

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
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    <tr>
                        <td class="tc">
                            <input type="checkbox" name="abc" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
                        </td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">

                        </td>
                        <td class="tc"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
                        <td>
                            <a href="#"><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</a>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_title'];?>
</td>

                        <td>
                            <a href="../cate_update_smarty.php?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">修改</a>
                            <a onclick="_cadel(<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
)">删除</a>
                        </td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </table>


            <div class="page_nav">
            <div>
            <a class="first" href="../cate_list.php?pageNow=1">第一页</a>
            <a class="prev" href="../cate_list.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value-1;?>
" onclick="_prev()">上一页</a>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 1;
if ($_smarty_tpl->tpl_vars['i']->value <= $_smarty_tpl->tpl_vars['pageCount']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value <= $_smarty_tpl->tpl_vars['pageCount']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                <a href="../cate_list.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                <?php }
}
?>

            <a class="next" onclick="_next()">下一页</a>
            <a class="end" href="../cate_list.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
">最后一页</a>
            <span class="rows"><?php echo $_smarty_tpl->tpl_vars['rowCount']->value;?>
 条记录</span>
            </div>
            </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <?php echo '<script'; ?>
>
        function _prev() {
            if(<?php echo $_smarty_tpl->tpl_vars['pageNow']->value;?>
==1){
                alert('已经是第一页了！');
            }
        }

        function _next() {
            if(<?php echo $_smarty_tpl->tpl_vars['pageNow']->value;?>
 == <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
)
            {
                alert('已经是最后一页了！');
                return;
            }
                $('.next').attr('href','../cate_list.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value+1;?>
');
        }

        function _cadel(id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
) {
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

        $(function(){
            $('.list_tab').find('th').find('[type=checkbox]').click(function(){
                $('.list_tab').find('td').find('[type=checkbox]').prop('checked',$(this).prop('checked'));
            });
        });


        function _alldel() {
            //获取选中的单选框
            //选中的单选框的ID和数据库的ID相同
            //调用_del()函数将获得的ID删除;
            var max =
            for(var i=1;i<= max;i++) {
                if ($('#id'+i).is(':checked')) {
                    $.ajax({
                        type: 'GET', //请求类型
                        url: 'cate_del.php', //提交URL地址
                        dataType: 'json',   //返回格式
                        data: {id: i}, //数据
                        success: function (data) { //如果成功，执行
                            if (data.status != 0) {
                                layer.msg(data.message, {icon: 5});
                                return;
                            }
                            layer.msg(data.message, {
                                icon: 6,
                                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                            }, function () {
                                location.href = 'cate_list_page.php';//成功跳转到页面
                            });
                        },
                        error: function (xhr, status) { //如果失败，执行
                            console.log(xhr);   //在控制台显示错误的原因以及返回值
                            console.log(status);
                        }
                    });
                }
            }
        }

    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
