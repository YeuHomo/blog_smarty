<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/ch-ui.admin.css">
    <link rel="stylesheet" href="style/font/css/font-awesome.min.css">
    <script type="text/javascript" src="style/js/jquery.js"></script>
    <script src="layer/layer.js"></script>
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


<div class="result_wrap">
    <form action="javascript:;" method="post">
        <table class="add_tab">
            <tbody>

            <tr>
            <th><i class="require">*</i>文章ID：</th>
            <td>
                <p><{$data['id']}></p>
            </td>
            </tr>


            <tr>
                <th width="120"><i class="require">*</i>分类：</th>
                <td>
                    <select name="cate_id">
                        <option value="">==请选择==</option>
                        <{foreach from=$list item="v"}>
                            <{if $data['cate_id'] eq $v['cate_id']}>
                                <option value="<{$v['cate_id']}>" selected><{$v['cate_name']}></option>
                            <{else}>
                                <option value="<{$v['cate_id']}>"><{$v['cate_name']}></option>
                        <{/if}>
                        <{/foreach}>

                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>文章标题：</th>
                <td>
                    <input type="text" class="lg" name="art_title" value="<{$data['art_title']}>">
                    <p>标题可以写30个字</p>
                </td>
            </tr>
            <tr>
                <th>作者：</th>
                <td>
                    <input type="text" name="art_author" value="<{$data['art_editor']}>">
                </td>
            </tr>
            <tr>
                <th>缩略图：</th>
                <td>
                    <input type="text" size="50" name="art_thumb" value="<{$data['art_thumb']}>">
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <script src="uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
                    <link rel="stylesheet" type="text/css" href="uploadify/uploadify.css">
                    <script type="text/javascript">
                        $(function() {
                            $('#file_upload').uploadify({
                                'buttonText' : '图片上传',
                                'formData'     : {
                                    'timestamp' : '<{$timestamp}>',
                                    'token'     : '<{$a}>'
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
                    </script>
                    <style>
                        .uploadify{display:inline-block;}
                        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                    </style>
                    <img src="<{$data['art_thumb']}>" id="art_thumb_img" width="50px">
                </td>
                <br>

            </tr>

            <tr>
                <th>文章内容：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
                    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
                    <script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
                    <script id="editor" name="art_content" type="text/plain" style="width:860px;height:500px;"><{$data['art_content']}></script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor');
                    </script>
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
                    <input type="submit" value="提交" onclick="_updateArticle()">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

<script>

    function _updateArticle() {
        var id = $('p:first').html();
        var cate_id = $('select[name=cate_id]').val();
        var title = $('input[name=art_title]').val();
        var author = $('input[name=art_author]').val();
        var thumb = $('input[name=art_thumb]').val();
        var content = ue.getContent();
//
//        alert(id+content+thumb);


        $.ajax({
            type:'POST',
            url :'article_update_smarty.php',
            dataType:'json',
            data:{id:id,cate_id:cate_id,title:title,author:author,thumb:thumb,content:content},
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
</script>
</body>
</html>