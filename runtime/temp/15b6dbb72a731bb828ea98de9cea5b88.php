<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./template/admin/default\user\useradd.html";i:1489988957;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
        <h2>添加管理员</h2>
    </blockquote>
    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">管理员名称</label>
            <div class="layui-input-inline">
                <input class="layui-input" type="text" name="username" placeholder="管理员名称"  lay-verify="title">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">管理员角色</label>
            <div class="layui-input-inline">
                <select name="groupid"  lay-verify="required">

                    <option value="">请选择</option>
                    <?php if(!empty($role)): if(is_array($role) || $role instanceof \think\Collection): if( count($role)==0 ) : echo "" ;else: foreach($role as $key=>$vo): ?>
                    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </select>

            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input class="layui-input" type="password" name="password" placeholder="密码"  lay-verify="required">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">真实姓名</label>
            <div class="layui-input-inline">
                <input class="layui-input" type="text" name="real_name" placeholder="真实姓名"  lay-verify="required">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-inline">
                <input type="checkbox" checked="" name="status" lay-skin="switch" lay-filter="switchTest" title="开关"><div class="layui-unselect layui-form-switch layui-form-onswitch"><i></i></div>
            </div>
        </div>


        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="add-role" data-href="<?php echo url('userAdd'); ?>">立即提交</button>
                <a class="layui-btn layui-btn-small do-action" data-type="doGoBack" data-href=""><i class="fa fa-mail-reply"></i>返回上一页</a>
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
    layui.use(['form','common'], function(){
        var $ = layui.jquery
                ,common=layui.common
                ,form = layui.form();
        //自定义验证规则
        form.verify({
            title:function(value){
                if(value == ""){
                    return '管理员名称不能为空';
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
                                window.location.href="<?php echo url('user/index'); ?>";
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
