<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:53:"./template/backmanager/default/admin/order\index.html";i:1493166606;s:55:"./template/backmanager/default/admin/public\header.html";i:1493166606;s:55:"./template/backmanager/default/admin/public\footer.html";i:1493166606;}*/ ?>
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
        <h2>订单列表</h2>
    </blockquote>
    <div class="y-role">
        <!--工具栏-->
        <div id="floatHead" class="toolbar-wrap">
            <div class="toolbar">
                <div class="box-wrap">
                    <a class="menu-btn"></a>
                    <div class="l-list">
                        <a class="layui-btn layui-btn-small do-action" data-type="doRefresh" data-href=""><i class="fa fa-refresh fa-spin"></i>刷新</a>
                    	<a class="layui-btn layui-btn-small "  href="<?php echo url('Order/index'); ?>?Pstatus=1&type=1"><i class="fa fa-navicon fa-spin"></i>未付款</a>
                    	<a class="layui-btn layui-btn-small "  href="<?php echo url('Order/index'); ?>?Sstatus=0&type=2"><i class="fa fa-navicon fa-spin"></i>未发货</a>
                    	<a class="layui-btn layui-btn-small "  href="<?php echo url('Order/index'); ?>"><i class="fa fa-navicon fa-spin"></i>全部订单</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/工具栏-->
        <!--文字列表-->
        <div class="fhui-admin-table-container">

            <table class="layui-table">
                <colgroup>
                    <col width="5%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="5%">
                    <col width="10%">
                    <col width="5%">
                    <col width="20%">
                </colgroup>
                <thead>
                <tr>

                    <th>订单ID</th>
                    <th>订单编号</th>
                    <th>收货人</th>
                    <th>订单状态</th>
                    <th>发货状态</th>
                    <th>创建时间</th>
                    <th>支付状态</th>
                    
                    <th>操作</th>

                </tr>
                </thead>

                <script id="arlist" type="text/html">

                    {{# for(var i=0;i<d.length;i++){  }}

                    <tr class="long-td">
                        <td>{{d[i].order_id}}</td>
                        <td>{{d[i].order_sn}}</td>
						<td>{{d[i].consignee}}</td>
                        <td>
                                {{# if(d[i].order_status==1){ }}
已完成
                                {{# }else{ }}
未完成
                                {{# } }}</td>
						<td>
                                {{# if(d[i].shipping_status==1){ }}
已发货
                                {{# }else{ }}
未发货
                                {{# } }}

</td>
						<td>{{d[i].add_time}}</td>
                        <td>
                            
                                {{# if(d[i].pay_status==1){ }}
已支付
                                {{# }else{ }}
未支付
                                {{# } }}
                            
                        </td>
                        <td>
                            
                                <a  class="layui-btn layui-btn-small " data-type="doSendGood" data-url="<?php echo url('ajaxSendGoods'); ?>"  data-id="{{d[i].order_id}}">
                                    <i class="icon-edit  fa fa-pencil-square-o"></i>发货
                                </a>
                                <a class="layui-btn layui-btn-small" data-type="doRefund" data-url="<?php echo url('orderDele'); ?>" data-id="{{d[i].order_id}}">
                                    <i class="icon-edit  fa fa-pencil-square-o"></i>批准退货
                                </a>
                                <a class="layui-btn layui-btn-small" data-type="doView" data-url="<?php echo url('orderView'); ?>" data-id="{{d[i].order_id}}">
                                    <i class="icon-edit  fa fa-pencil-square-o"></i>查看
                                </a>
                        </td>
                    </tr>
                    {{# } }}
                </script>
                <tbody id="article_list"></tbody>
            </table>

        </div>
        <div id="AjaxPage" style="margin-top: -57px;float: right;"></div>
        <div style="float: right;margin-top: -9px;margin-right: 13px;">
            共<?php echo $count; ?>条数据，<span id="allpage"></span>
        </div>
    </div>
</div>
<!-- 添加会员 -->

<div style="display:none" id="dodelete" class="layui-layer-content"><i class="layui-layer-ico layui-layer-ico3"></i>此操作不可逆，请再次确认是否要操作。</div>
<div class="shang_box" style="display: none;">
    <div class="shang_tit">
        <p>继续努力!</p>
    </div>
    
</div>
<script src="__js__/global.js"></script>

</body>
</html>
<script src="__PLUG__/jquery.min.js?v=2.1.4"></script>
<script>

    var laytpl,laypage;
    var url='<?php echo url("Order/index"); ?>?Ostatus=<?php echo $orderStatus; ?>&Sstatus=<?php echo $shippingStatus; ?>&Pstatus=<?php echo $pay_status; ?>&type=<?php echo $type; ?>';
    var allpages='<?php echo $allpage; ?>';
    layui.use(['layer', 'laypage', 'icheck','laytpl','laypage','form','common'], function () {
        var $ = layui.jquery
                , layer = layui.layer
                , common = layui.common, form = layui.form();
        laytpl =layui.laytpl;
        laypage = layui.laypage;

        common.Ajaxpage();

        //加载单选框样式
        $(("[type='checkbox']")).iCheck({
            checkboxClass: 'icheckbox_square-green',
        });
        //全选
        $(document).on('ifChanged','.selected-all', function (event) {
            // alert(1);
            var $input = $('.layui-table tbody tr td').find('input');
            $input.iCheck(event.currentTarget.checked ? 'check' : 'uncheck');
        });
      	$(document).on('click','[data-type=doView]', function () {  
            var id = $(this).data("id");
     		  window.location = '<?php echo url("orderView"); ?>?id='+id;
    	  });
    	  $(document).on('click','[data-type=doRefund]', function () {  
    		  var id = $(this).data("id");
    		  var url = $(this).data("url");
    		  var that = this; 
    		  layer.confirm('您确定要批准退款？', {icon: 3, title:'提示'},function (){
    			  $.ajax({
	                  url: url ,
	                  type: 'post',
	                  dataType: 'json',
	                  data: {id:id},
	                  success: function (data) {
	                     if (data.code == 1) {
	                    	 window.location.href = '/index.php/admin/Order/index';
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

    	  $(document).on('click','[data-type=doSendGood]', function () {
    		  var id = $(this).data("id");
    		  var url = $(this).data("url");
    		  var that = this; 
    		  layer.confirm('您确定要发货？', {icon: 3, title:'提示'},function (){
    			  $.ajax({
	                  url: url ,
	                  type: 'post',
	                  dataType: 'json',
	                  data: {id:id},
	                  success: function (data) {
	                     if (data.code == 1) {
	                    	 window.location.href = '/index.php/admin/Order/index';
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
