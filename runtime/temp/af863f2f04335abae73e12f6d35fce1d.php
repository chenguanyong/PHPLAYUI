<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:54:"./template/admin/default\currencytree\addCurrency.html";i:1490604053;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
            <label class="layui-form-label">选择父节点</label>
            <div class="layui-input-block" onclick="giveQx();">
                <input name="pid" autocomplete="off"  disabled="disabled" value=<?php echo $node; ?>  placeholder="选择父节点" class="layui-input" type="text" required  style="width:50%" lay-verify="title">
            	
            </div>
            
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">节点名称</label>
            <div class="layui-input-block">
                <input name="title" autocomplete="off"  placeholder="节点名称" class="layui-input" type="text" required value="<?php echo $data['name']; ?>" style="width:50%"  lay-verify="title">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">css</label>
            <div class="layui-input-block">
                <input name="css" autocomplete="off"  placeholder="输入css" class="layui-input" type="text" required value="<?php echo $data['css']; ?>" style="width:50%"  lay-verify="required">
                
            </div>
        </div>


        <div class="layui-form-item">

            <a class="layui-btn layui-btn-small do-action" data-type="doGoBack" data-href=""><i class="fa fa-mail-reply"></i>返回上一页</a>
            <button id="sub_button" class="layui-btn" data-key=<?php echo $key_ids; ?> data-id="<?php echo $nodeid; ?>" data-type=<?php echo $type; ?> lay-submit="" lay-filter="add-role" data-href="/index.php/admin/Currencytree/ajaxAddCurrency">提交</button>
        </div>

    </form>
</div>
<!-- 节点树 -->
<div class="zTreeDemoBackground left" style="display: none" id="role">
    <input type="hidden" id="nodeid" value="">
    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-2">
            <ul id="treeTypes" class="ztree"></ul>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4" style="margin-bottom: 15px">
            <input type="button" value="确认分配" class="btn btn-primary" id="postform"/>
        </div>
    </div>
</div>
<div class="shang_box" style="display: none;">
    <div class="shang_tit">
        <p>继续努力!</p>
    </div>
    
</div>
<script src="__js__/global.js"></script>

</body>
</html>
<script src="__js__/jquery.min.js?v=2.1.4"></script>
<link rel="stylesheet" href="__js__/zTree/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="__js__/zTree/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="__js__/zTree/jquery.ztree.excheck-3.5.js"></script>
<script type="text/javascript" src="__js__/zTree/jquery.ztree.exedit-3.5.js"></script>

<script type="text/javascript">
    zNodes = '';
    var index = '';
    var index2 = '';
    //分配权限
    function giveQx(){
        
        //加载层
        index2 = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
        //获取权限信息
        $.getJSON('../Ajax/getCurrencyList', {'type' : 'get', 'id' : 1}, function(res){
            layer.close(index2);
            if(res.code == 1){
                zNodes = res.data;  //将字符串转换成obj

                //页面层
                index = layer.open({
                    type: 1,
                    area:['300px', '500px'],
                    title:'节点列表',
                    skin: 'layui-layer-demo', //加上边框
                    content: $('#role')
                });
                //设置位置
                layer.style(index, {
                    top: '150px'
                });
                
            	function zTreeOnCheck(event, treeId, treeNode) {
            	    //alert(treeNode.tId + ", " + treeNode.name + "," + treeNode.checked);
            		var treeObj = $.fn.zTree.getZTreeObj("treeTypes");
            		treeObj.checkAllNodes(false);
            	    if(treeNode.checked){
            	    	treeNode.checked = false;
            	    }else{
            	    	treeNode.checked = true;
            	    }
            	}

                //设置zetree
                var setting = {
                    check:{
                        enable:true
                    },
                    data: {
                        simpleData: {
                            enable: true
                        }
                    },
                    callback: {
        				onCheck: zTreeOnCheck
        			}

                };

                $.fn.zTree.init($("#treeTypes"), setting, zNodes);
                var zTree = $.fn.zTree.getZTreeObj("treeTypes");
                zTree.expandAll(false);
                //init_tree();
                //var treeObj = $.fn.zTree.getZTreeObj("treeTypes");
                zTree.checkAllNodes(false);                 
                var nodes = zTree.transformToArray(zTree.getNodes());
                var userid = <?php echo $key_ids; ?>;        
                for (var a in nodes) {            
                       if (userid == nodes[a].id) {
                           nodes[a].checked = true;             
                           break;
                       }
                       }
                zTree.refresh();
            }else{
                layer.alert(res.msg);
            }

        });
    }

    //确认分配权限
    $("#postform").click(function(){
        var zTree = $.fn.zTree.getZTreeObj("treeTypes");
        var nodes = zTree.getCheckedNodes(true);
        var Nodeid = nodes[0].id;
        var Nodestring = nodes[0].name;
        $("#sub_button").attr('data-id',Nodeid);
        $("[name=pid]").attr('value',Nodestring);
        layer.close(index);

    });
    
  

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
            var nodeid = $(this).data('id');
            data.field.type=type;
            data.field.id=id;
            data.field.nodeid=nodeid;
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
                                window.location.href="<?php echo url('Currencytree/index'); ?>";
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
