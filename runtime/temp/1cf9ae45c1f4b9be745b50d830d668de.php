<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:52:"./template/backmanager/default/mall/order\index.html";i:1493261804;s:54:"./template/backmanager/default/mall/public\header.html";i:1493166606;s:54:"./template/backmanager/default/mall/public\footer.html";i:1493166606;}*/ ?>
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
                        <h5>订单列表</h5>
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
                        <div class="row">
                            <div class="col-sm-8 m-b-xs">
                            	<a href="<?php echo url('order/index'); ?>" class="btn btn-w-m btn-primary" title=""><i class="fa fa-file-powerpoint-o"></i>  所有订单</a>
								<a href="<?php echo url('order/index'); ?>?Ostatus=0&type=1" class="btn btn-w-m btn-success" title=""><i class="fa fa-file-powerpoint-o"></i>  未处理订单</a>
								<a href="<?php echo url('order/index'); ?>?Sstatus=1&type=1" class="btn btn-w-m btn-info" title=""><i class="fa fa-file-powerpoint-o"></i>  已发货订单</a>
								<a href="<?php echo url('order/index'); ?>?Ostatus=0&Sstatus=0" class="btn btn-w-m btn-warning" title=""><i class="fa fa-file-powerpoint-o"></i>  
								历史订单</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                        <colgroup>
		                    <col width="40%">
		                    <col width="20%">
		                    <col width="15%">
		                    <col width="15%">
		                    <col width="10%">
		                </colgroup>
                                <thead>
                                    <tr>
                                        <th>宝贝</th>
                                        <th>单价</th>
                                        <th>数量</th>
                                        <th>实付款</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                             </table>
                        </div>
						<div class="table-responsive" >
						 	

						                <?php
						                foreach($list as $key=>$value){	
							 		    echo '<table class="table table-striped" style="width:99%">';
				                        echo ' <colgroup>';
						                echo '    <col width="40%">';
						                echo '    <col width="20%">';
						                echo '   <col width="15%">';
						                echo '   <col width="15%">';
						                echo '   <col width="10%">';
						                echo ' </colgroup>			';			 			
							 			echo '<tbody>';
							 			echo '<td>订单时间：' . $value["add_time"] . '</td>';
							 			echo '<td>订单编号：' . $value["order_sn"] . '</td>';
							 			echo '<td></td>';
							 			echo '<td>商家：' .$value["total_amount"] . '</td>';
							 			echo '<td>操作: <a data-id=' . $value["order_id"] . ' data-action="doDele" class="btn btn-default btn-xs" ><i class="fa fa-trash-o"></i>
                    </a></td>';
							 			echo '</tbody>';
										echo '<tbody style="background-color:#ffffff; ">';
										foreach($value["data"] as $key=>$values){	
							 			echo '<tr style="background-color:#ffffff;     border-bottom: 1px solid #e7eaec;">';
							 			echo '<td style="background-color:#ffffff;     border: 0px solid #e7eaec;"><img src="'.$values["goodsImg"].'" />' .  mb_substr($values["goods_name"],0,20) . '</td>';
							 			echo '<td style="background-color:#ffffff;    border: 0px solid #e7eaec;">' . $values["goods_price"] . '</td>';
							 			echo '<td style="background-color:#ffffff;    border: 0px solid #e7eaec;">' . $values["goods_num"] . '</td>';
										if($key == 0){
							 			echo '<td rowspan="' .count($value["data"]) . '" style="background-color:#ffffff;    border: 1px solid #e7eaec;">' . $value["order_amount"] . '</td>';
							 			echo '<td rowspan="' .count($value["data"]) . '" style="background-color:#ffffff;    border: 1px solid #e7eaec;"><a>评价</a></td>';										
										}

							 			echo '</tr>';
										}
										echo '</tbody>';
										echo '</table>';
									}
										?>
							
	
						</div>
							
                    </div>
                    		<div class="btn-group" id="demo1" style="float:right; margin-right:10px;">
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
            window.location="<?php echo url('order/index'); ?>?Ostatus=<?php echo $orderStatus; ?>&Sstatus=<?php echo $shippingStatus; ?>&page="+obj.curr;
          }
        }
  });
  $(document).on('click','[data-action=doDele]', function () {  
	  var id = $(this).data("id");
	  layer.confirm('您确定要删除订单？', {icon: 3, title:'提示'},function (){
		  $.ajax({
              url: "<?php echo url('Order/ajaxDeleOrder'); ?>" ,
              type: 'post',
              dataType: 'json',
              data: {id:id},
              success: function (data) {
                 if (data.code == 1) {
                	 window.location.href = "<?php echo url('Order/index'); ?>";
                  }
                else {
                      common.layerAlertE(data.msg, '提示');
                 }
                 layer.closeAll();
              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {
                  common.layerAlertE(textStatus, '提示');
                  layer.closeAll();
              }
          });
	  });
	  });

  });
  </script>
