<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:47:"./template/admin/default\currencytree\list.html";i:1490844725;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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

    <div class="y-role">
        <!--工具栏-->
        <div id="floatHead" class="toolbar-wrap">
            <div class="toolbar">
                <div class="box-wrap">
                    <a class="menu-btn"></a>
                    <div class="l-list">

                        <a href="javascript:;" id="add" data-id=<?php echo $val; ?> data-what=<?php echo $content; ?> class="layui-btn layui-btn-small " >  <i class="fa fa-plus"></i>添加节点</a>

                        <a class="layui-btn layui-btn-small do-action" data-type="doRefresh" data-href=""><i class="fa fa-refresh fa-spin"></i>刷新</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/工具栏-->
        <!--文字列表-->
        <div class="fhui-admin-table-container">

            <table class="layui-table" style="width:100%">
                <colgroup>
                    <col width="5%">
                    <col width="25%">
                    <col width="5%">

                    
                    <col width="10%">
                    <col width="30%">
                </colgroup>
                <thead>
                <tr>

                    <th>id </th>
                    <th>节点名称</th>
                    
                    <th>父ID</th>
                    <th>图片</th>
                    <th>操作</th>

                </tr>
                </thead>

                <tbody id="article_list">
<?php
foreach($lists as $value){
echo '<tr class="long-td" data-id="' . $value['id'] . '">';
echo '<td>' .$value['id'] . '</td>';
echo '<td>' .$value['name'] . '</td>';

echo '<td>' .$value['parentID'] . '</td>';
echo '<td>' .$value['css'] . '</td>';
echo '<td>';

echo '<a class="layui-btn layui-btn-mini "  data-type="doEdit"  >';
echo '<i class="icon-edit  fa fa-pencil-square-o"></i>修改';
echo '</a>';
echo '<a  class="layui-btn layui-btn-mini " data-type="doAdd"  >';
echo '<i class="icon-edit  fa fa-pencil-square-o"></i>添加';
echo '</a>';
echo '<a class="layui-btn layui-btn-mini " data-type="doDelOne"  data-id="' . $value['id'] . '">';
echo '<i class="icon-edit  fa fa-pencil-square-o"></i>删除';
echo '</a>';
echo '<a class="layui-btn layui-btn-mini " data-type="doMove"  data-id="' . $value['id'] . '" data-order="' . $value['orderby'] . '">';
echo '<i class="icon-edit  fa fa-pencil-square-o"></i>上移';
echo '</a>';
echo '<a class="layui-btn layui-btn-mini " data-type="doDown"  data-id="' . $value['id'] . '" data-order="' . $value['orderby'] . '">';
echo '<i class="icon-edit  fa fa-pencil-square-o"></i>下移';
echo '</a>';
echo '</td>';
echo '</tr>';

}
?>
                </tbody>
            </table>

        </div>
        <div style="float: right;margin-top: -50px;margin-right: 13px;">
            <div id="demo1" style="float: right"></div>
        </div>
        
    </div>
</div>
<!--  -->
<div id="addtree" class="main-wrap" style="display:none">
    <blockquote class="layui-elem-quote fhui-admin-main_hd">
        <h2 id="tan_title"></h2>
    </blockquote>
    
    <form  class="layui-form layui-form-pane" id="formrec" method="post" role="form">

        <div class="layui-form-item">
            <label class="layui-form-label">选择父节点</label>
            <div class="layui-input-block" >
                <input name="nodename" autocomplete="off"  disabled="disabled"   placeholder="选择父节点" class="layui-input" type="text" required   lay-verify="title">
            	
            </div>
            
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">节点名称</label>
            <div class="layui-input-block">
                <input name="title" autocomplete="off"  placeholder="节点名称" class="layui-input" type="text" required    lay-verify="title">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">css</label>
            <div class="layui-input-block">
                <input name="css" autocomplete="off"  placeholder="输入css" class="layui-input" type="text" required    lay-verify="required">
                
            </div>
        </div>


        <div class="layui-form-item" style="display:none">

            <a class="layui-btn layui-btn-small do-action" data-type="doGoBack" data-href=""><i class="fa fa-mail-reply"></i>返回上一页</a>
            <button id="submit" class="layui-btn"   lay-submit="" lay-filter="add-role" data-href="/index.php/admin/Currencytree/ajaxAddCurrency">提交</button>
        </div>

    </form>
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
$('[data-type=doDelOne]').on('click',function (){
	
	
//alert($(this).data('id'));
$.ajax({
    url: '<?php echo url("admin/Currencytree/ajaxDeleCurrency"); ?>',
    dataType: "json",
    data:{'id':$(this).data('id')},
    type: "POST",
    success: function(data){


        if(data.state == 1){
            
            layer.msg('成功',{icon:1,time:1500,shade: 0.1,});
           	window.location.href="/index.php/admin/Currencytree/getCurrenyListByPage?id=<?php echo $val; ?>";
        }else{
            
            layer.msg('失败',{icon:2,time:1500,shade: 0.1,});
        }
    },
    error:function(ajaxobj)
    {
        if(ajaxobj.responseText!=''){}
            //alert(ajaxobj.responseText);
    }
});

})
	
	
	

    zNodes = '';
    var index = '';
    var index2 = '';
    //分配权限
    function giveQx(id){
        $("#nodeid").val(id);
        //加载层
        index2 = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
        //获取权限信息
        $.getJSON('./giveAccess', {'type' : 'get', 'id' : id}, function(res){
            layer.close(index2);
            if(res.code == 1){
                zNodes = JSON.parse(res.data);  //将字符串转换成obj

                //页面层
                index = layer.open({
                    type: 1,
                    area:['350px', '600px'],
                    title:'权限分配',
                    skin: 'layui-layer-demo', //加上边框
                    content: $('#role')
                });
                //设置位置
                layer.style(index, {
                    top: '150px'
                });

                //设置zetree
                var setting = {
                    check:{
                        enable:true
                    },
                    data: {
                        simpleData: {
                            enable: true
                        }
                    }
                };

                $.fn.zTree.init($("#treeType"), setting, zNodes);
                var zTree = $.fn.zTree.getZTreeObj("treeType");
                zTree.expandAll(true);

            }else{
                layer.alert(res.msg);
            }

        });
    }



        layui.use(['laypage', 'layer','form','common'], function(){
        	  var laypage = layui.laypage
        	  ,layer = layui.layer,form = layui.form(),common=layui.common ,$ = layui.jquery;
        	  
        	  laypage({
        	    cont: 'demo1'
        	    ,pages: <?php echo $allpage; ?>//总页数
        	    ,groups: 5 //连续显示分页数
        	    ,curr:<?php echo $Nowpage; ?>
        	    
        	  });
              $('[data-page]').on("click",function(){
              	//alert("sdf");
              	window.location.href="/index.php/admin/CurrencyTree/getCurrenyListByPage?id=<?php echo $val; ?>&page="+$(this).data('page');
              });
              
              //触发事件
          	  var active = {
          	    setTop: function(){
          	      var that = this; 
          	      //多窗口模式，层叠置顶
          	      layer.open({
          	        type: 1 //此处以iframe举例
          	        ,title: false,
          	      	closeBtn: 0,
          	        shade: 0,
          	      	shadeClose: true
          	        ,content: $('#addtree')
          	        ,btn: ['确定', '关闭'] //只是为了演示
          	        ,yes: function(){
          	        	layer.closeAll();
          	        	$('#submit').click();
          	        }
          	        ,btn2: function(){
          	          layer.closeAll();
          	        } 
          	      });
          	    }
          	  };
              $('#add').on('click', function(){
             	 $('#tan_title').text('添加节点');
              	 var tr = $(this).parent('td').parent('tr');
              	 $('[name=nodename]').val($('#add').data('what'));
              	 $('[name=nodename]').attr('data-id',$('#add').data('id'));
              	 $('[name=title]').val('');
              	 $('[name=css]').val('');
              	 $('#submit').data('type',1); //
              	 $('#submit').attr('data-key',tr.data('id'));
                   var othis = $(this), method = 'setTop';
                   active[method] ? active[method].call(this, othis) : '';
                 });
        	$('[data-type=doEdit]').on('click', function(){
        	 $('#tan_title').text('修改节点');
          	 var tr = $(this).parent('td').parent('tr');
          	 $('[name=nodename]').val($('#add').data('what'));
          	 $('[name=nodename]').attr('data-id',$('#add').data('id'));
          	 $('[name=title]').val(tr.children().eq(1).text());
          	 $('[name=css]').val(tr.children().eq(3).text());
          	 $('#submit').data('type',2); //
          	 $('#submit').attr('data-key',tr.data('id'));
          	 var othis = $(this), method = 'setTop';
              active[method] ? active[method].call(this, othis) : '';
            });
        $('[data-type=doAdd]').on('click', function(){
	       	 $('#tan_title').text('添加节点');
	      	 var tr = $(this).parent('td').parent('tr');
	      	 $('[name=nodename]').val(tr.children().eq(1).text());
	      	 $('[name=nodename]').attr('data-id',tr.data('id'));
          	 $('[name=title]').val('');
          	 $('[name=css]').val('');
          	 $('#submit').data('type',1);
             var othis = $(this), method = 'setTop';
             active[method] ? active[method].call(this, othis) : '';
           });
        //自定义验证规则
        form.verify({
            pid: function(value){
                if(value == ""){
                    return '节点不能为空';
                }
            }
            ,title:function(value){
                if(value == ""){
                    return '节点名称不能为空';
                }
            }

        });

        //监听提交
        form.on('submit(add-role)', function(data){
            var sub=true;
            var url=$(this).data('href');
            var type =$(this).data('type');
            var id = $(this).data('key');
            var nodeid =  $('[name=nodename]').data('id');
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
                                parent.location.href="<?php echo url('Currencytree/index'); ?>";
                            }
                            else {
                                common.layerAlertE(data.msg, '提示');
                            }
                        },
                        beforeSend: function () {
                        //    // 一般是禁用按钮等防止用户重复提交
                          
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
        $('[data-type=doMove]').on("click",function(){
			var id = $(this).data("id");
			var order = $(this).data("order");
			var indexs = 0;
			//alert(order);
        	$('tr').each(function (index){
        		
        		if($(this).data('id') == id){
        			
        			indexs = index;
        			return false;
        		}
        	});
        	if(indexs-1 == 0){layer.msg('到顶了');return false;}
        	//$('tbody').find('tr').eq(indexs-1);
        	$($('tbody').find('tr').eq(indexs-1)).insertBefore($('tbody').find('tr').eq(indexs-2));
          	var order2 = $('tbody').find('tr').eq(indexs-2).find('[data-order]').attr('data-order');
          	if(order2 == order){
          		
          		order -=1;
          	}else {
          		
          		order =order - (order2-order)-1;
          	}
          	ajax_order(id,order);
          });
        $('[data-type=doDown]').on("click",function(){
			var id = $(this).data("id");
			var order = $(this).data("order");
			var indexs = 0;
			var length = $('tbody').children('tr').toArray().length;
			//alert(order);
        	$('tr').each(function (index){
        		
        		if($(this).data('id') == id){
        			
        			indexs = index;
        			return false;
        		}
        	});
        	//$('tbody').find('tr').eq(indexs-1);
        	if(indexs == length){layer.msg('到低了');return false;}
        	$($('tbody').find('tr').eq(indexs-1)).insertAfter($('tbody').find('tr').eq(indexs));
          	var order2 = $('tbody').find('tr').eq(indexs).find('[data-order]').attr('data-order');
          	if(order2 == order){
          		
          		order +=1;
          	}else {
          		
          		order = (order2-order)+order+1;
          	}
          	ajax_order(id,order);
        });
        
        function ajax_order(id,orders){
        	
        	$.ajax({
        	    url: '/index.php/admin/Currencytree/ajaxOrder',
        	    dataType: "json",
        	    data:{'id':id,'order':orders},
        	    type: "POST",
        	    success: function(data){


        	        if(data.state == 1){
        	            
        	            layer.msg('成功',{icon:1,time:1500,shade: 0.1,});
        	           	window.location.href="/index.php/admin/CurrencyTree/getCurrenyListByPage?id=<?php echo $val; ?>";
        	        }else{
        	            
        	            layer.msg('失败',{icon:2,time:1500,shade: 0.1,});
        	        }
        	    },
        	    error:function(ajaxobj)
        	    {
        	        if(ajaxobj.responseText!=''){}
        	            //alert(ajaxobj.responseText);
        	    }
        	});
        	
        }
</script>
