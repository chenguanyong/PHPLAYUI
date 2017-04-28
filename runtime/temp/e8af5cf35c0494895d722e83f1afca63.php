<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:54:"./template/backmanager/default/mall/order\invoice.html";i:1493282767;s:54:"./template/backmanager/default/mall/public\header.html";i:1493166606;s:54:"./template/backmanager/default/mall/public\footer.html";i:1493166606;}*/ ?>
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
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox-content p-xl">
                    <div class="row">
                        <div class="col-sm-6">
                        </div>

                        <div class="col-sm-6 text-right">
                            <h4>单据编号：</h4>
                            <h4 class="text-navy"><?php echo $order['order_sn']; ?></h4>
                            <address>
                                        <strong><?php echo $order['consignee']; ?></strong><br>
                             中国-<?php echo $province; ?>-<?php echo $city; ?>-<?php echo $district; ?>- <?php echo $order['address']; ?> <br>
                                        <abbr title="Phone">总机：</abbr><?php echo $order['mobile']; ?>
                                    </address>
                            <p>
                                <span><strong>日期：</strong><?php echo $order['add_time']; ?></span>
                            </p>
                        </div>
                    </div>
<div><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  修改地址
</button></div>
                    <div class="table-responsive m-t">
                        <table class="table invoice-table">
                            <thead>
                                <tr>
                                    <th>商品名称</th>
                                    <th>数量</th>
                                    <th>单价</th>
                                    <th>时间</th>
                                    <th>备注</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    foreach($goods as $value){
										echo "<tr>";
										echo '<td>'. $value["goods_name"] .'</td>';
										echo "<td>" . $value["goods_num"] . "</td>";
										echo "<td>" . $value["goods_price"] . "</td>";	
										echo "<td>" . $value["member_goods_price"] . "</td>";	
										echo "<td>" . $value["sku"] . "</td>";
										echo '</tr>';		
									}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /table-responsive -->
<div class="row">
                        <div class="col-sm-6">

                        </div>

                        <div class="col-sm-6 text-right">
                            <h4>使用积分</h4>
                            <h4 class="text-navy">52</h4>
							<p>使用优惠卷</p>	
                            <p>
                             		  使用折扣
                            </p>
                        </div>
                    </div>
                    <table class="table invoice-total">
                        <tbody>
                            <tr>
                                <td><strong>总计</strong>
                                </td>
                                <td>&yen;<?php echo $order['goods_price']; ?></td>
                            </tr>                        
                            <tr>
                                <td><strong>邮费</strong>
                                </td>
                                <td>&yen;<?php echo $order['shipping_price']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>应付</strong>
                                </td>
                                <td>&yen;<?php echo $order['order_amount']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button class="btn btn-primary"><i class="fa fa-dollar"></i> 去付款</button>
                    </div>

                    <div class="well m-t"><strong>注意：</strong> 请在30日内完成付款，否则订单会自动取消。
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">请选择地址</h4>
      </div>
      <div class="modal-body">
<div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>收货人</th>
                                    <th>手机号</th>
                                    <th>地址</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($address) || $address instanceof \think\Collection): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr id="<?php echo $vo['addressId']; ?>">
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $vo['userName']; ?></td>
                                    <td><?php echo $vo['userPhone']; ?></td>
                                    <td><?php echo $vo['userAddress']; ?></td>
                                </tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" id="save" class="btn btn-primary">保存</button>
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
	
	$(document).on("click","td input[type=checkbox]",function (){
		
		if(!$(this).is(':checked')){
			$("td input[type=checkbox]").prop('checked',false);
		}else{
			$("td input[type=checkbox]").prop('checked',false);
			$(this).prop('checked',true);
		}
		
	});
	$("#save").on("click",function(){
		var id = $("td :checked").parent("td").parent("tr").attr("id");
    	$.post("<?php echo url('Order/editAddress'); ?>",{id:id,order:<?php echo $order['order_id']; ?>},function(data){
    		if(data.code == 1){
    			window.location="<?php echo url('Order/orderinfo'); ?>?order_id="+data.data;
    		}else{
    			alert(data.msg);
    		}
    		
    	},"json");
		
	});
	
	
	
})(window.jQuery);


</script>
