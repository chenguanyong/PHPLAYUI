<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:52:"./template/backmanager/default/admin/order\view.html";i:1493166606;s:55:"./template/backmanager/default/admin/public\header.html";i:1493166606;s:55:"./template/backmanager/default/admin/public\footer.html";i:1493166606;}*/ ?>
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
        <h2>订单详情</h2>
    </blockquote>
    <div class="y-role">
    <form class="layui-form">
    	<div class="fhui-admin-table-container">
		<table class="layui-table" lay-skin="line">
		  <colgroup>
		    <col width="15%">
		    <col width="15%">
		    <col width="20%">
		    <col width="20%">
		  </colgroup>

		  <tbody>
		    <tr>
		      <td>订单编号</td>
		      <td><?php echo $orderInfo['order_sn']; ?></td>
		      <td>订单总金额</td>
		      <td><?php echo $orderInfo['total_amount']; ?></td>
		    </tr>
		    <tr>
		      <td>收货人</td>
		      <td><?php echo $orderInfo['consignee']; ?></td>
		      <td>手机</td>
		      <td><?php echo $orderInfo['mobile']; ?></td>
		    </tr>
		    <tr>
		      <td>邮政编码</td>
		      <td><?php echo $orderInfo['zipcode']; ?></td>
		      <td>订单状态</td>
		      <td>
                           <?php echo $orderInfo['order_status']; ?>
		      </td>
		    </tr>
		    <tr>
		      <td>商品发货状态</td>
		      <td>
                            <?php echo $orderInfo['shipping_status']; ?>
		      </td>
		      <td>支付状态</td>
		      <td>
                <?php echo $orderInfo['pay_status']; ?>
		      </td>
		    </tr>
		    <tr>
		      <td>地址</td>
		      <td><?php echo $orderInfo['address']; ?></td>
		      <td>物流名称</td>
		      <td><?php echo $orderInfo['shipping_name']; ?></td>
		    </tr>
		    <tr>
		      <td>订单类型</td>
		      <td>
                 <?php echo $orderInfo['order_prom_type']; ?>
		      </td>
		      <td>用户备注</td>
		      <td><?php echo $orderInfo['user_note']; ?></td>
		    </tr>		    
		  </tbody>
		</table> 
		<div class="layui-form-item" >
            <div class="layui-input-block">
                <a class="layui-btn layui-btn-small do-action" data-type="doGoBack" data-href=""><i class="fa fa-mail-reply"></i>返回上一页</a>
            </div>
        </div>
	</form>
		<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
		  <legend>商品列表</legend>
		</fieldset>
		            <table class="layui-table">
                <colgroup>
               		<col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="5%">
                    <col width="5%">
                    <col width="5%">
                    <col width="20%">
                </colgroup>
                <thead>
                <tr>

                    <th>商品</th>
                    <th>单价</th>
                    <th>数量</th>
                    <th>实付金额</th>
                    <th>赠送积分</th>
                    <th>状态</th>
                    <th>操作</th>

                </tr>
                </thead>

                <script id="arlist" type="text/html">

                    {{# for(var i=0;i<d.length;i++){  }}

                    <tr class="long-td">
                        <td>{{d[i].goods_name}}</td>
                        <td>{{d[i].market_price}}</td>
						<td>{{d[i].goods_num}}</td>
						<td>{{d[i].member_goods_price}}</td>
						<td>{{d[i].give_integral}}</td>
                        <td>
                            
                                {{# if(d[i].is_send==1){ }}
已发货
                                {{# }else if(d[i].is_send==2){ }}
已换货
                                {{# }else if(d[i].is_send==2){ }}
已退货
                        	    {{# }else{ }}
未发货
								{{# } }}
                        </td>
                        <td>

                        </td>
                    </tr>
                    {{# } }}
                </script>
                <tbody id="article_list"></tbody>
            </table>
		  	
    	</div>
    </div>
</div>
<?php echo $count; ?>
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
    var url='<?php echo url("Order/orderView"); ?>?id=<?php echo $val; ?>';
    var allpages='<?php echo $allpage; ?>';
    layui.use(['layer', 'laypage', 'icheck','laytpl','laypage','form','common'], function () {
        var $ = layui.jquery
                , layer = layui.layer
                , common = layui.common, form = layui.form();
        laytpl =layui.laytpl;
        laypage = layui.laypage;

        common.Ajaxpage();

    });
</script>
