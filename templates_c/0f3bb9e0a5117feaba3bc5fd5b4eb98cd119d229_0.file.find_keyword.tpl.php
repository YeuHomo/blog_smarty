<?php
/* Smarty version 3.1.30, created on 2017-04-26 10:59:48
  from "D:\blog\templates\find_keyword.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59000d24e066c8_08200660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f3bb9e0a5117feaba3bc5fd5b4eb98cd119d229' => 
    array (
      0 => 'D:\\blog\\templates\\find_keyword.tpl',
      1 => 1493175581,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59000d24e066c8_08200660 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <a href="#"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
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
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <?php echo '<script'; ?>
>
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

    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
