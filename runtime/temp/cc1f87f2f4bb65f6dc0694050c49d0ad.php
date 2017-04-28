<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:54:"./template/backmanager/default/mall/shopping\list.html";i:1493189243;s:54:"./template/backmanager/default/mall/public\header.html";i:1493166606;s:54:"./template/backmanager/default/mall/public\footer.html";i:1493166606;}*/ ?>
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
    .ibox-content {
        padding-left: 0px;
        transition: .1s linear;
    }
    .table tr th{text-align: center;}
    .table tr td{text-align: center;}
    .wrapper-content {
        background-color: #fff;
        padding-top: 0;
    }
</style>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>商品列表</h5>
	            </div>
	            <div class="ibox-content">
					<div class="row">

						<div class="col-xs-12 col-sm-12">
							
								<div class="row">
									<?php if(is_array($shop) || $shop instanceof \think\Collection): if( count($shop)==0 ) : echo "" ;else: foreach($shop as $k=>$vo): ?>
										<div class="col-xs-6 col-sm-3 col-md-3">
											<!-- #section:pages/search.thumb -->
											<div class="thumbnail search-thumbnail">
												<a onclick="parent.location='<?php echo url('mall/Index/shop'); ?>?id=<?php echo $vo['goodsId']; ?>';"><img class="media-object"  alt="100%x200" src='<?php echo $vo['goodsImg']; ?>'  style="height: 200px; width: 100%; display: block;"></a>
												<div class="caption">
													<div class="clearfix">
														<span class="pull-right label label-grey info-label">London</span>
									
														<div class="pull-left bigger-110">
															<i class="ace-icon fa fa-star orange2"></i>
									
															<i class="ace-icon fa fa-star orange2"></i>
									
															<i class="ace-icon fa fa-star orange2"></i>
									
															<i class="ace-icon fa fa-star-half-o orange2"></i>
									
															<i class="ace-icon fa fa-star light-grey"></i>
														</div>
													</div>
									
													<h3 class="search-title">
														<a href="#" class="blue">￥ <?php echo $vo['shopPrice']; ?></a>
													</h3>
													<p><?php echo $vo['goodsName']; ?></p>
													<p><?php echo $vo['goodsTips']; ?></p>
												</div>
											</div>
									
											<!-- /section:pages/search.thumb -->
										</div>

									<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>

						</div>
 <div class="btn-group" id="demo1" style="clear:both;float:right; margin-right:10px;">
                            </div>
					</div>
				</div>
			</div>
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


<script src="__LAY__/layui.js"></script>
<script >
  layui.use(['laypage', 'layer'], function(){
  var laypage = layui.laypage
  ,layer = layui.layer;
  
  laypage({
    cont: 'demo1'
    ,pages: <?php echo $allpage; ?> //总页数
    ,groups: 5 //连续显示分页数
    ,curr:<?php echo $Nowpage; ?>
    ,jump: function(obj, first){
        if(!first){
            window.location="<?php echo url('mall/Shopping/goodsList'); ?>?id=<?php echo $val; ?>&page="+obj.curr;
          }
        }
  });
  });
</script>