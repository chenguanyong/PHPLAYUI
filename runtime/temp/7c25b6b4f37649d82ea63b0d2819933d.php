<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"./template/backmanager/default/mall/index\shop.html";i:1493263465;s:54:"./template/backmanager/default/mall/public\header.html";i:1493166606;s:54:"./template/backmanager/default/mall/public\footer.html";i:1493166606;}*/ ?>
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
                        <h3>宝贝页面</h3>

                    </div>
                    <div class="ibox-content">
						<div class="row">
							<div class="col-sm-5">
							<a class="col-sm-12"  title="图片1">
	                           <img alt="image"  src="<?php echo $shopInfo['goodsImg']; ?>" />
	                        </a>
							</div>
							<div class="col-sm-7">
				<div class="ibox float-e-margins">
				<div><?php echo $shopInfo['goodsName']; ?></div>
				<p>商品简介：<?php echo $shopInfo['goodsTips']; ?></p>
                    <div class="ibox-content">
                    <h1>价格: <small id="price"><?php echo $shopInfo['shopPrice']; ?></small></h1>
                    <form id="signupForm">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">数量：</label>
                                <div for="goodsSize" class="col-sm-8">
                                <input type='number' id="goodsSize" name="goodsSize"  class='form-control'>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">规格：</label>
                                <div for="goodsSpec" class="col-sm-8">
                                    <input id="goodsSpec" type="text" class="form-control" name="goodsSpec" required="" aria-required="true">
                                </div>
                            </div>
                            
							<div class="user-button">
		                           <div class="row">
		                               <div class="col-sm-6">
		                                   <button type="submit" data-href="<?php echo url('Order/ajaxBuildOrder'); ?>" id="goOrder" class="btn btn-primary btn-sm btn-block" data-goodsid="<?php echo $shopId; ?>"><i class="fa fa-envelope"></i>立即购买</button>
		                               </div>
		                               <div class="col-sm-6">
		                                   <button type="submit" data-href="<?php echo url('ShopCar/addCard'); ?>" id="addCar" class="btn btn-default btn-sm btn-block" data-goodsid="<?php echo $shopId; ?>"><i class="fa fa-coffee"></i>加入购物车</button>
		                               </div>
		                           </div>
		                    </div>
		                    </form>
                    </div>
                </div>
							</div>
						</div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <a class="btn btn btn-w-m btn-primary" href="<?php echo url('shopCar/index'); ?>">购物车</a>
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

	<script src="__js__/plugins/validate/jquery.validate.min.js"></script>
	<script src="__js__/plugins/validate/messages_zh.min.js"></script>
<script>

(function($){
	var url = null;
	var input={};
	var backurl=null;
	$(document).on("click","#goOrder",function(){
		var id = $(this).data("goodsid")
		var goodsSize= $("#goodsSize").val();
		 url = $(this).data("href");
		var price =$("#price").text();
		//alert(price);
		input={id:id,goodsSize:goodsSize,price:price};
		backurl = "<?php echo url('Order/orderinfo'); ?>?order_id=";
	});
	$(document).on("click","#addCar",function(){
		var id = $(this).data("goodsid")
		var goodsSize= $("#goodsSize").val();
		 url = $(this).data("href");
		var price =$("#price").text();
		input = {id:id,goodsSize:goodsSize,price:price};
	});
	$.validator.setDefaults({
	    submitHandler: function() {
	    	$.post(url,input,function(data){
	    		if(data.code == 1){
	    			if(backurl == null){
	    				alert(data.msg);
	    				return false;
	    			}else{
	    			window.location=backurl+data.data;}
	    		}else{
	    			alert(data.msg);
	    		}
	    		
	    	},"json");
	    	return false;
	    }
	    
	});

	$().ready(function() {
		// 在键盘按下并释放及提交后验证提交表单
		  $("#signupForm").validate({
			    rules: {
			    	goodsSize:{
			    		required:true,
			    		number:true,
				      },
				      goodsSpec: "required"
			    },
			    messages: {
			    	goodsSize: "请输入一个正确的商品数量",
			    	goodsSpec: "请输入一个正确的商品规格"
			    }
			});});
})(window.jQuery);


</script>

  
