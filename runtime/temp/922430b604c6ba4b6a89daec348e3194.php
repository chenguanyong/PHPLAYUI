<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"./template/backmanager/default/mall/shop_car\index.html";i:1493346018;s:54:"./template/backmanager/default/mall/public\header.html";i:1493166606;s:54:"./template/backmanager/default/mall/public\footer.html";i:1493166606;}*/ ?>
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

<body class="gray-bg" >
   <div class="wrapper wrapper-content">
        <div class="row">
           <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>购物车</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_basic.html#">选项1</a>
                                </li>
                                <li><a href="table_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th></th>
                                        <th>商品</th>
                                        <th>价格</th>
                                        <th>时间</th>
                                        <th>数量</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach($list as $value){
										echo "<tr>";
										echo '<td><input data-id=' . $value["id"] . ' type="checkbox" /></td>';
										echo "<td><img style='width:80px;height:80px' src='" . $value["goodsImg"] . "'>" . $value["goods_name"] . "</td>";
										echo "<td>" . $value["goods_price"] . "</td>";	
										echo "<td>" . date('Y-m-d',$value["add_time"]) . "</td>";	
										echo "<td><input type='number' value='" . $value["goods_num"] . "' class='form-control'></td>";
									}?>

                                </tbody>
                            </table>
                        </div>
                        
                        <table class="table invoice-total">
                        <tbody>
                            <tr>
                                <td><strong>已选择：</strong>
                                </td>
                                <td id="allshop">0</td>
                            </tr>
                            <tr>
                                <td><strong>总计</strong>
                                </td>
                                <td  >¥<span id="price">0</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <a data-href="<?php echo url('Order/ajaxBuildOrderByCar'); ?>" class="btn btn-w-m btn-primary" id="jiesuan">去结算</a>
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


<script>
(function ($){
	$(document).on("click","#jiesuan",function(){
		var id = $(this).data("goodsid")
		var goodsSize= $("#goodsSize").val();
		var url = $(this).data("href");
		var price =$("#price").text();
		var json = "";
		var size = "";
		if($("tbody tr td :checked").length == 0){
			parent.layer.alert('请选择一个宝贝');
			return false;
			}
		$("tbody tr td :checked").each(function(){
			
			json = $(this).attr("data-id") + "," + json;
			 sizes = $(this).parent("td").parent("tr").find("[type=number]").val();
			size = size + "_" +sizes;	
		});
		//alert(price);
		if(url !=null){
		$.post(url,{json:json,price:price,size:size},function(data){
			
			if(data.code == 1){
				//alert(data.msg);
				window.location = "<?php echo url('Order/orderinfo'); ?>?order_id="+data.data;
			}else{
				alert(data.msg);
			}
		},"json");
		}
	});
	$(document).on("click","tbody tr td input[type=checkbox]",function (){
		
		var allprice = 0;
		var allshop = 0;
		$("tbody tr td :checked").each(function (){
			var price = $(this).parent("td").parent("tr").children("td").eq(2).text();
			
			var size = $(this).parent("td").parent("tr").find("[type=number]").val();
			allprice = parseFloat(price) * size +allprice;
		});
		
		allshop = $("tbody tr td :checked").length;
		$("#price").text(allprice);
		$("#allshop").text(allshop);
	});
})(window.jQuery);


</script>
  
