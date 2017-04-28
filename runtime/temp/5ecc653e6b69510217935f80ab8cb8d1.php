<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"./template/backmanager/default/mall/shopping\index.html";i:1493186081;s:54:"./template/backmanager/default/mall/public\header.html";i:1493166606;s:54:"./template/backmanager/default/mall/public\footer.html";i:1493166606;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>H+ 后台主题UI框架 - 主页</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="__css__/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="__css__/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="__css__/animate.min.css" rel="stylesheet">
    <link href="__css__/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="__LAYCSS__/layui.css" rel="stylesheet">
</head>

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
        <h2>商品分类列表</h2>
    </blockquote>
    <div style=" float:left; width:20%; border:1px solid #ddd">
	    <div class="zTreeDemoBackground left" style="overflow:auto; max-height:500px;">
		    <div class="form-group">
		        <div class="col-sm-5 col-sm-offset-2">
		            <ul id="currency_tree" class="ztree"  ></ul>
		        </div>
		    </div>
		</div>
	</div>
	
	<div class="layui-tab-item layui-show">
	<iframe id="goods_list" name='goods_list' src="<?php echo url('mall/Shopping/goodsList'); ?>?id=0"  style="height:600px; float:left; border:0px; width:75%"></iframe>
	</div>

	
</div>

   <script src="__js__/jquery.min.js?v=2.1.4"></script>
    <script src="__js__/bootstrap.min.js?v=3.3.6"></script>
    <script src="__js__/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="__js__/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="__js__/plugins/layer/layer.min.js"></script>
    <script src="__js__/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="__js__/contabs.min.js"></script>
    <script src="__js__/plugins/pace/pace.min.js"></script>
</body>

</html>

<link rel="stylesheet" href="__PLUG__/zTree/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="__PLUG__/zTree/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="__PLUG__/zTree/jquery.ztree.excheck-3.5.js"></script>
<script type="text/javascript" src="__PLUG__/zTree/jquery.ztree.exedit-3.5.js"></script>

<script type="text/javascript">	
	var zNodes = '';
	var setting = {
				async: {
					enable: true,
					url:"<?php echo url('goodcats/getGoodTree'); ?>",
					autoParam:["id", "name=n", "level=lv"],
					otherParam:{"otherParam":"zTreeAsyncTest"},
					dataFilter: filter
				},
				callback: {
					onClick: zTreeOnClick
				}
			};
	function zTreeOnClick(event, treeId, treeNode) {
	    $("#goods_list").attr("src","<?php echo url('mall/Shopping/goodsList'); ?>?id="+treeNode.id);
	};

	function filter(treeId, parentNode, childNodes) {
		if (!childNodes) return null;
		for (var i=0, l=childNodes.length; i<l; i++) {
			childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
		}
		return childNodes;
	}

	$(document).ready(function(){
		$.fn.zTree.init($("#currency_tree"), setting);
	});
</script>
