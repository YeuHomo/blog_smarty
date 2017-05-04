<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/css/ch-ui.admin.css">
    <link rel="stylesheet" href="style/font/css/font-awesome.min.css">
    <script type="text/javascript" src="style/js/jquery.js"></script>
    <script src="layer/layer.js"></script>
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
                    <p class="lg" name="id"><{$data['id']}></p>
                </td>
            </tr>

            <tr>
                <th width="120"><i class="require">*</i>分类：</th>
                <td>
                    <select name="cate_parent" class="lg">
                        <option value="">==请选择==</option>

                        <{if $data['cate_pid'] eq 0}>

                            <option value="<{$data['id']}>" selected><{$data['cate_name']}></option>
                        <{/if}>

                        <{foreach from=$list_p item='v'}>
                            <{if $data['cate_pid'] eq $v['id']}>
                                <option value="<{$v['id']}>" selected><{$v['name']}></option>
                            <{else}>
                                <option value="<{$v['id']}>"><{$v['name']}></option>
                            <{/if}>

                        <{/foreach}>
                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>分类名称：</th>
                <td>
                    <input type="text" class="lg" name="cate_name" value="<{$data['cate_name']}>">
                    <p>标题可以写30个字</p>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>分类标题：</th>
                <td>
                    <input type="text" class="lg" name="cate_title" value="<{$data['cate_title']}>">
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
<script>

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
</script>
</body>
</html>


