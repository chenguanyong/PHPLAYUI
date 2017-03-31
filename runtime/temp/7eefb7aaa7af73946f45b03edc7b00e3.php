<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"./template/admin/default\dictionaries\adddic.html";i:1490318660;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
<div class="main-wrap">
    <blockquote class="layui-elem-quote fhui-admin-main_hd">
        <h2><?php echo $title; ?></h2>
    </blockquote>
    <form  class="layui-form layui-form-pane" id="formrec" method="post" role="form">

        <div class="layui-form-item">
            <label class="layui-form-label">默认顶级</label>
            <div class="layui-input-inline" style="width: 30%">
                <select value=<?php echo $data['pid']; ?> data-val="true" lay-filter="pid" name="pid"  lay-verify="required">
                    <option selected="selected" value="0">默认顶级</option>
                    <?php if(is_array($admin_rule) || $admin_rule instanceof \think\Collection): if( count($admin_rule)==0 ) : echo "" ;else: foreach($admin_rule as $key=>$v): ?>
                        <option value="<?php echo $v['id']; ?>">
                            <?php if($v['pid'] == 0): else: if($v['lvl'] == 2): ?>　├<?php else: ?>　　├<?php endif; endif; ?><?php echo $v['title']; ?>
                        </option>

                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>

            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">子典名称</label>
            <div class="layui-input-block">
                <input name="title" autocomplete="off"  placeholder="字典名称" class="layui-input" type="text" required value="<?php echo $data['name']; ?>"  lay-verify="title">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">编码</label>
            <div class="layui-input-block">
                <input name="bianma" autocomplete="off"  placeholder="输入编码" class="layui-input" type="text" required value="<?php echo $data['bianma']; ?>"  lay-verify="required">
                
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
                <input name="bz" autocomplete="off"  placeholder="输入备注" class="layui-input" value="<?php echo $data['bz']; ?>" type="text">
               
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">是否启用</label>
            <div class="layui-input-block">
                <input checked="<?php echo $data['state']; ?>" name="status" lay-skin="switch" lay-filter="switchTest" title="是" type="checkbox">
            </div>
        </div>
        <div class="layui-form-item">

            <a class="layui-btn layui-btn-small do-action" data-type="doGoBack" data-href=""><i class="fa fa-mail-reply"></i>返回上一页</a>
            <button class="layui-btn" data-key=<?php echo $key_id; ?> data-type=<?php echo $type; ?> lay-submit="" lay-filter="add-role" data-href="/index.php/admin/Dictionaries/ajaxaddDic">提交</button>
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

    layui.use(['form','common'], function(){
        var $ = layui.jquery
                ,common=layui.common
        ,form = layui.form();
        //自定义验证规则
        form.verify({
            pid: function(value){
                if(value == ""){
                    return '字典分类不能为空';
                }
            }
            ,title:function(value){
                if(value == ""){
                    return '字典名称不能为空';
                }
            }

        });

        //监听提交
        form.on('submit(add-role)', function(data){
            var sub=true;
            var url=$(this).data('href');
            var type =$(this).data('type');
            var id = $(this).data('key');
            data.field.type=type;
            data.field.id=id;
            if(url){
                if(sub){
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: data.field,
                        success: function (data) {
                           // if (data.state == 1) {
                               // location.href = rturl;
                              //  common.layerAlertS(data.msg, '提示');
                                window.location.href="<?php echo url('Dictionaries/index'); ?>";
                            //}
                           // else {
                              //  common.layerAlertE(data.msg, '提示');
                           /// }
                        },
                        beforeSend: function () {
                        //    // 一般是禁用按钮等防止用户重复提交
                            $(data.elem).attr("disabled", "true").text("提交中...");
                        },
                        //complete: function () {
                        //    $(sbbtn).removeAttr("disabled");
                        //},
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            common.layerAlertE(textStatus, '提示');
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
