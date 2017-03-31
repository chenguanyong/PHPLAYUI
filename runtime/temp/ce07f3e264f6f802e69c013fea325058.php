<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:45:"./template/admin/default\image\editImage.html";i:1490759277;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Language" content="zh-cn" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="Fhua" />
    <meta name="Copyright" content="BLIT" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0,initial-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>后台管理</title>
    <link href="__lay__/css/layui.css" rel="stylesheet" />
    <link href="__css__/style.css" rel="stylesheet" />
    <link href="__font__/font-awesome.css" rel="stylesheet" />

    <script src="__lay__/layui.js"></script>

</head>
<body>
<style>
    .site-demo-upload,
    .site-demo-upload img{width: 200px; height: 200px; border-radius: 100%;}
    .site-demo-upload{position: relative; background: #e2e2e2;}
    .site-demo-upload .site-demo-upbar{position: absolute; top: 50%; left: 50%; margin: -18px 0 0 -56px;}
    .site-demo-upload .layui-upload-button{background-color: rgba(0,0,0,.2); color: rgba(255,255,255,1);}
    .upload-img{
        margin-left: 95px;
        margin-top: 10px;
    }
    .upload-img img{
        margin-top: -38px;
    }
</style>
<script>
    function getRadioVal(rval){
        if(rval == 1){
            $("#integral_count").removeAttr("readonly");
            $("#gold_count").attr("readonly","readonly");
        }else{
            $("#integral_count").attr("readonly","readonly");
            $("#gold_count").removeAttr("readonly");
        }
    }
</script>
<div class="main-wrap">
    <blockquote class="layui-elem-quote fhui-admin-main_hd">
        <h2>修改图片</h2>
    </blockquote>
    <form class="layui-form" action="add_article">

        <div class="layui-form-item">
            <label class="layui-form-label"> 是否推荐</label>
            <div class="layui-input-block">

<?php

if($data['Isrecommend']== 1){
echo '<input type="radio" name="is_recommend"  value="1" title="是" lay-filter="is_recommend" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>';
echo '<input type="radio" name="is_recommend" value="0" title="否" lay-filter="is_recommend" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>';
}else{
echo '<input type="radio" name="is_recommend"  value="1" title="是" lay-filter="is_recommend" ><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>';
echo '<input type="radio" name="is_recommend" value="0" title="否" lay-filter="is_recommend" checked=""><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>';

}


?>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"> 是否热点</label>
            <div class="layui-input-block">

<?php

if($data['Ishot']== 1){
echo '<input type="radio" name="type"  value="1" title="是" lay-filter="type" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>原创</span></div>';
echo '<input type="radio" name="type" value="0" title="否" lay-filter="type" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>转载</span></div>';
}else{
echo '<input type="radio" name="type"  value="1" title="是" lay-filter="type" ><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>原创</span></div>';
echo '<input type="radio" name="type" value="0" title="否" lay-filter="type" checked=""><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>转载</span></div>';
}


?>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"> 审核状态</label>
            <div class="layui-input-block">
<?php

if($data['Isstatus']== 1){
echo '<input type="radio" name="is_status"  value="1" title="是" lay-filter="is_status" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>';
echo '<input type="radio" name="is_status" value="0" title="否" lay-filter="is_status" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>';
}else{
echo '<input type="radio" name="is_status"  value="0" title="是" lay-filter="is_status" ><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>';
echo '<input type="radio" name="is_status" value="1" title="否" lay-filter="is_status" checked="" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>';

}


?>
               

            </div>
        </div>



        <div class="layui-form-item">
            <div class="layui-input-block">
                <button id="submit" class="layui-btn" data-id=<?php echo $id; ?> lay-submit="" lay-filter="demo1" data-href="/index.php/admin/Image/ajaxeditImage">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

</div>


<div class="shang_box" style="display: none;">
    <div class="shang_tit">
        <p>继续努力!</p>
    </div>
    
</div>
<script src="__js__/global.js"></script>

</body>
</html>
<script>

    layui.use(['form', 'layedit', 'laydate','upload'], function(){
        var $ = layui.jquery;
        $form = $('form');
        var form = layui.form()
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;

        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
                }
            }
            ,nav_id: function (value) {
                if(value == ""){
                    return "请选择文章分类";
                }
            }
            ,integral:function(value){

                if((!/^(\+)?\d+$/.test( value ))){
                    return "只能大于0的合法数";
            }
            }
            ,content: function(value){
                layedit.sync(editIndex);
            }
        });



        //监听提交
        form.on('submit(demo1)', function(data){
           // layer.alert(JSON.stringify(data.field), {
             //   title: '最终的提交信息'
            //})
            var sub=true;
            var url=$(this).data('href');

           data.field.id =$(this).attr('data-id');
            if(url){
                if(sub){
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: data.field,
                        success: function (data) {
                           if (data.state == 1) {
                               // location.href = rturl;
                                //common.layerAlertS(data.msg, '提示');
                                
                                window.location.href="<?php echo url('Image/index'); ?>";
                            }
                            else {
                               // common.layerAlertE(data.msg, '提示');
                            }
                        },
                        beforeSend: function () {
                        //    // 一般是禁用按钮等防止用户重复提交
                            $(data.elem).attr("disabled", "true").text("提交中...");
                        },
                        //complete: function () {
                        //    $(sbbtn).removeAttr("disabled");
                        //},
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                           // common.layerAlertE(textStatus, '提示');
                        }
                    });
                }
            }else{
                common.layerAlertE('链接错误！', '提示');
            }
            
            return false;
        });


    });
</script>