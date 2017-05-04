<?php
/* Smarty version 3.1.30, created on 2017-04-25 11:00:17
  from "D:\blog\templates\article_add_page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58febbc1eb0783_79159439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3952c595f253ba371e63f77b353db0727a6eb5ef' => 
    array (
      0 => 'D:\\blog\\templates\\article_add_page.tpl',
      1 => 1493089214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58febbc1eb0783_79159439 (Smarty_Internal_Template $_smarty_tpl) {
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
    <style type="text/css">
        div{
            width:100%;
        }
        .edui-default{line-height: 28px;}
        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
        {overflow: hidden; height:18px;}
        div.edui-box{overflow: hidden; height:22px;}

    </style>
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>快捷操作</h3>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="#"><i class="fa fa-plus"></i>新增文章</a>
            <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
            <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="javascript:;" method="post">
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>分类：</th>
                <td>
                    <select name="cate_id">
                        <option value="">==请选择==</option>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>

                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</option>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>文章标题：</th>
                <td>
                    <input type="text" class="lg" name="art_title">
                    <p>标题可以写30个字</p>
                </td>
            </tr>
            <tr>
                <th>作者：</th>
                <td>
                    <input type="text" name="art_author">
                </td>
            </tr>
            <tr>
                <th>缩略图：</th>
                <td>
                    <input type="text" size="50" name="art_thumb">
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <?php echo '<script'; ?>
 src="uploadify/jquery.uploadify.min.js" type="text/javascript"><?php echo '</script'; ?>
>
                    <link rel="stylesheet" type="text/css" href="uploadify/uploadify.css">
                    <?php echo '<script'; ?>
 type="text/javascript">
                        $(function() {
                            alert(123);
                            $('#file_upload').uploadify({
                                'buttonText' : '图片上传',
                                'formData'     : {
                                    'timestamp' : '<?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
',
                                    'token'     : '<?php echo $_smarty_tpl->tpl_vars['a']->value;?>
'
                                },
                                'swf'      : "uploadify/uploadify.swf",
                                'uploader' : "uploadify/uploadify.php",
                                //回调成功
                                'onUploadSuccess' : function(file, data, response) {
                                    //php返回图片路径
                                    $('input[name=art_thumb]').val(data);
                                    //设置图片的路径
                                    $('#art_thumb_img').attr('src',''+data).removeAttr('style');
//                                    alert(data);
                                }
                            });
                        });
                    <?php echo '</script'; ?>
>
                    <style>
                        .uploadify{display:inline-block;}
                        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                    </style>
                    <img src="" id="art_thumb_img" width="50px" style='display:none'>
                </td>
                <br>

            </tr>

            <tr>
                <th>文章内容：</th>
                <td>
                    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> <?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 id="editor" name="art_content" type="text/plain" style="width:860px;height:500px;"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type="text/javascript">
                        var ue = UE.getEditor('editor');
                    <?php echo '</script'; ?>
>
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交" onclick="_addArticle()">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

<?php echo '<script'; ?>
>
    function _addArticle() {
        var cate_id = $('select[name=cate_id]').val();
        var title = $('input[name=art_title]').val();
        var author = $('input[name=art_author]').val();
        var thumb = $('input[name=art_thumb]').val();
        var content = ue.getContent();


        $.ajax({
            type:'POST',
            url :'article_add_smarty.php',
            dataType:'json',
            data:{cate_id:cate_id,title:title,author:author,thumb:thumb,content:content},
            success:function (data) {
                if(data.status !=0 ){
                    layer.msg(data.message,{icon:0,time: 2000});
                    return;
                }
                layer.msg(data.message, {
                    icon: 1,
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                }, function() {
                    location.href = 'article_list_smarty.php';//成功跳转到页面
                });
            },
            error:function (xhr,status) {
                console.log(xhr);
                console.log(status);
            }

        });
    }
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
