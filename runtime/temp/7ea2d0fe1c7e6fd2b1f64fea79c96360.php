<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./template/admin/default\image\index.html";i:1490750856;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
    .layui-form-switch {
        padding-left: 0px;
        transition: .1s linear;
    }
    .layui-table tr th{text-align: center;}
    .layui-table tr td{text-align: center;}
</style>
<div class="main-wrap">
    <blockquote class="layui-elem-quote fhui-admin-main_hd">
        <h2>图片列表</h2>
    </blockquote>
    <div style=" float:left; width:20%; border:1px solid #ddd">
	    <div class="zTreeDemoBackground left" style="overflow:auto; max-height:500px;">
	    
		    <div class="form-group">
		    <a class="layui-btn layui-btn-small do-action" style="background:#5FB878"
		     data-type="doRefresh" data-href=""><i class="fa fa-refresh fa-spin"></i>刷新</a>
		        <div class="col-sm-5 col-sm-offset-2">
		            <ul id="Image_tree" class="ztree" ></ul>
		        </div>
		    </div>
		</div>
	</div>
	<div class="layui-tab-item layui-show">
	<iframe name='list_image' src="/index.php/admin/Image/getImageListByPage?id=2"  style="height: 602px; float:left; border:0px; width:75%"></iframe>
</div></div>
<!-- 角色分配 -->

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
    //giveQx();
    		var setting = {
			async: {
				enable: true,
				url:"../Image/ajaxGetImageData",
				autoParam:["id", "name=n", "level=lv"],
				otherParam:{"otherParam":"zTreeAsyncTest"},
				dataFilter: filter
			}
		};

		function filter(treeId, parentNode, childNodes) {
			if (!childNodes) return null;
			for (var i=0, l=childNodes.length; i<l; i++) {
				childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
			}
			return childNodes;
		}

		$(document).ready(function(){
			$.fn.zTree.init($("#Image_tree"), setting);
		});
	
</script>
