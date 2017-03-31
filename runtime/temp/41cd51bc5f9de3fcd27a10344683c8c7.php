<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"./template/admin/default\menu\add_rule.html";i:1489988957;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
        <h2>添加菜单</h2>
    </blockquote>
    <form  class="layui-form layui-form-pane" id="formrec" method="post" role="form">

        <div class="layui-form-item">
            <label class="layui-form-label">默认顶级</label>
            <div class="layui-input-inline" style="width: 30%">
                <select data-val="true" lay-filter="pid" name="pid"  lay-verify="required">
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
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input name="title" autocomplete="off" value="" placeholder="菜单名称" class="layui-input" type="text" required  lay-verify="title">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">节点</label>
            <div class="layui-input-block">
                <input name="name" autocomplete="off" value="" placeholder="模块/控制器/方法" class="layui-input" type="text" required  lay-verify="required">
                <span>如：admin/user/adduser (一级节点添加“#”即可)</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">css样式</label>
            <div class="layui-input-block">
                <input name="css" autocomplete="off" value="" placeholder="输入菜单名称前显示的CSS样式" class="layui-input" type="text">
                <span>如fa fa-user</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input name="sort" lay-verify="number" autocomplete="off" value="0" placeholder="输入顺序" class="layui-input" type="text" style="width: 50%;">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">是否启用</label>
            <div class="layui-input-block">
                <input checked="checked" name="status" lay-skin="switch" lay-filter="switchTest" title="是" type="checkbox">
            </div>
        </div>
        <div class="layui-form-item">

            <a class="layui-btn layui-btn-small do-action" data-type="doGoBack" data-href=""><i class="fa fa-mail-reply"></i>返回上一页</a>
            <button class="layui-btn" lay-submit="" lay-filter="add-role" data-href=<?php echo url('add_rule'); ?>>提交</button>
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
                    return '菜单分类不能为空';
                }
            }
            ,title:function(value){
                if(value == ""){
                    return '菜单名称不能为空';
                }
            }

        });

        //监听提交
        form.on('submit(add-role)', function(data){
            var sub=true;
            var url=$(this).data('href');
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
                                common.layerAlertS(data.msg, '提示');
                                window.location.href="<?php echo url('menu/index'); ?>";
                            }
                            else {
                                common.layerAlertE(data.msg, '提示');
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
