<?php
/* Smarty version 3.1.30, created on 2017-04-25 10:26:46
  from "D:\blog\templates\cate_update_page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58feb3e6c18470_07112842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f000ce6b6eb04558e1fcc9b02794edaf5ece2c16' => 
    array (
      0 => 'D:\\blog\\templates\\cate_update_page.tpl',
      1 => 1493087192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58feb3e6c18470_07112842 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/ch-ui.admin.css">
    <link rel="stylesheet" href="style/font/css/font-awesome.min.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="style/js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="layer/layer.js"><?php echo '</script'; ?>
>
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 修改商品
</div>
<!--面包屑导航 结束-->


<div class="result_wrap">
    <form class='edit_form' action="javascript:;" method="post">
        <table class="add_tab">
            <tbody>

            <tr>
                <th><i class="require">*</i>ID：</th>
                <td>
                    <p class="lg" name="id"><?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
</p>
                </td>
            </tr>

            <tr>
                <th width="120"><i class="require">*</i>分类：</th>
                <td>
                    <select name="cate_parent" class="lg">
                        <option value="">==请选择==</option>

                        <?php if ($_smarty_tpl->tpl_vars['data']->value['cate_pid'] == 0) {?>

                            <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['data']->value['cate_name'];?>
</option>
                        <?php }?>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_p']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['cate_pid'] == $_smarty_tpl->tpl_vars['v']->value['id']) {?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php } else { ?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php }?>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>分类名称：</th>
                <td>
                    <input type="text" class="lg" name="cate_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cate_name'];?>
">
                    <p>标题可以写30个字</p>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>分类标题：</th>
                <td>
                    <input type="text" class="lg" name="cate_title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['cate_title'];?>
">
                    <p>标题可以写300个字</p>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input type="button" class="back" value="提交" onclick="_update()" id="sub" disabled="true">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<?php echo '<script'; ?>
>

    $(document).ready(function () {
            $('.lg').change(function () {
                $('#sub').removeClass('back').attr('disabled',false);
            });
    });

    function _update() {

        var id = $('p[name=id]').html();
        var cate_parent = $('select[name=cate_parent]').val();
        var cate_name = $('input[name=cate_name]').val();
        var cate_title = $('input[name=cate_title]').val();


        $.ajax({
            type: 'POST', //请求类型
            url: 'cate_update_smarty.php', //提交URL地址
            dataType: 'json',   //返回格式
            data: {id:id,cate_parent:cate_parent,cate_name:cate_name,cate_title:cate_title}, //数据
            //           data: $('.edit_form').serialize(), //数据
            success: function (data) { //如果成功，执行
                if(data.status !=0){
                    layer.msg(data.message,{icon:5});
                    return;
                }
                layer.msg(data.message, {
                    icon: 6,
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                }, function() {
                    location.href = 'cate_list.php';//成功跳转到页面
                });
            },
            error: function (xhr, status) { //如果失败，执行
                console.log(xhr);   //在控制台显示错误的原因以及返回值
                console.log(status);
            }
        });
    }
<?php echo '</script'; ?>
>
</body>
</html>


<?php }
}
