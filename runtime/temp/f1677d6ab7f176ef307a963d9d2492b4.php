<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./template/admin/default\image\addImage.html";i:1490866462;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
    .site-demo-upload,
    .site-demo-upload img{width: 200px; height: 200px; border-radius: 100%;}
    .site-demo-upload{position: relative; background: #e2e2e2;}
    .site-demo-upload .site-demo-upbar{position: absolute; top: 50%; left: 50%; margin: -18px 0 0 -56px;}
    .site-demo-upload .layui-upload-button{background-color: rgba(0,0,0,.2); color: rgba(255,255,255,1);}
    .upload-img{
        margin-left: 95px;
        margin-top: 10px;
    }
    .upload-img img{
        margin-top: -38px;
    }
</style>
<script>
    function getRadioVal(rval){
        if(rval == 1){
            $("#integral_count").removeAttr("readonly");
            $("#gold_count").attr("readonly","readonly");
        }else{
            $("#integral_count").attr("readonly","readonly");
            $("#gold_count").removeAttr("readonly");
        }
    }
</script>
<div class="main-wrap">
    <blockquote class="layui-elem-quote fhui-admin-main_hd">
        <h2>添加图片</h2>
    </blockquote>
    <form class="layui-form" action="add_article">

        <div class="layui-form-item layui-form-text">
            		<label class="layui-form-label">上传图片</label>
                    <input type="file" name="file" class="layui-upload-file" id="upload-image">
                    <input type="hidden" id="image" name="image" >

                    <input type="file" name="file" class="layui-upload-file" id="upload-images">
                    <input type="hidden" id="images" name="images" >
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label" style="float:left">缩略图</label>

            
            	<ul id="small" class="layui-nav" style="float:left; width:50%; background-color:#ffffff">
                
				</ul>
           
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label" style="float:left">大图</label>

            
            	
                <ul id="big" class="layui-nav" style="float:left; width:50%;background-color:#ffffff">
                
				</ul>

           
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label"> 是否推荐</label>
            <div class="layui-input-block">

                <input type="radio" name="is_recommend"  value="1" title="是" lay-filter="is_recommend" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>
                <input type="radio" name="is_recommend" value="0" title="否" lay-filter="is_recommend" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>

            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"> 是否热点</label>
            <div class="layui-input-block">

                <input type="radio" name="type"  value="1" title="是" lay-filter="type" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>原创</span></div>
                <input type="radio" name="type" value="0" title="否" lay-filter="type" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>转载</span></div>

            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"> 审核状态</label>
            <div class="layui-input-block">

                <input type="radio" name="is_status"  value="1" title="是" lay-filter="is_status" checked=""><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>是</span></div>
                <input type="radio" name="is_status" value="0" title="否" lay-filter="is_status" ><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>否</span></div>

            </div>
        </div>



        <div class="layui-form-item">
            <div class="layui-input-block">
                <button id="submit" class="layui-btn" data-nodeid=<?php echo $nodeid; ?> lay-submit="" lay-filter="demo1" data-href="/index.php/admin/Image/ajaxAddImage">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

</div>
<!-- yincang -->
<div id="yincang"></div>
<div id="tong" class="hide layui-layer-wrap" style="display: none;"><img id='imageid' style="width:100%;height:100%"></div>
<div class="shang_box" style="display: none;">
    <div class="shang_tit">
        <p>继续努力!</p>
    </div>
    
</div>
<script src="__js__/global.js"></script>

</body>
</html>
<script src="__js__/jquery.min.js?v=2.1.4"></script>
<script>


var imagedata = [];
var bigimagedata = [];
    layui.use(['form', 'layedit', 'laydate','upload'], function(){
    	 var $ = layui.jquery, layer = layui.layer;
    	//var $ = layui.jquery;
        $form = $('form');
        var form = layui.form()
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;
  	  //触发事件
  	  var active = {
  	    setTop: function(){
  	      var that = this; 
  	      //多窗口模式，层叠置顶
  	      layer.open({
  	        type: 1 //此处以iframe举例
  	        ,title: false,
  	      closeBtn: 0,
  	    skin: 'layui-layer-nobg',
  	        shade: 0,
  	      shadeClose: true
  	        ,content: $('#tong')
  	        ,btn: ['确定', '关闭',"删除"] //只是为了演示
  	        ,yes: function(){
  	        	layer.closeAll(); 
  	        }
  	        ,btn2: function(){
  	         	 layer.closeAll();
  	        } ,btn3: function(){
  	          	layer.closeAll();
  	          var id = $("#yincang").attr('data-id');
  	          var type = $("#yincang").attr('data-type');
  	          if(type == 1){
  	        	imagedata[id] = 0;
  	        	$("[data-imagesid="+id+"]").detach(); 
  	          }else{
  	        	bigimagedata[id] = 0;
  	        	$("[data-imageid="+id+"]").detach(); 
  	          }
  	        }
  	      });
  	    }
  	  };

        //上传图片
        layui.upload({
            url: "<?php echo url('Upload/upload'); ?>?type=1" //上传接口
            ,before: function(input){
                //返回的参数item，即为当前的input DOM对象
                console.log('图片上传中');
            }
            ,title:'上传缩略图'
            ,elem: '#upload-image' //指定原始元素，默认直接查找class="layui-upload-file"
            ,method: 'post' //上传接口的http类型
            ,ext: 'jpg|png|gif'
            ,type:'images'
            ,success: function(data){ //上传成功后的回调
                //console.log(res)
                if(data.status == 1){
                    $("#image").val('/public/upload/image/images/' +data.image_name);
                    //$("#img_path").attr('src', '/public/upload/image/images/' + data.image_name).show();
                    $('<li  data-image class="layui-nav-item"><img data-imagesid='+imagedata.length+' data-type="1" data-method="setTop" style="width:60px; height:60px;" src="'+'/public/upload/image/images/' + data.image_name+'\"/></li>').prependTo("#small");

	            	tempdata = {};
	            	tempdata.imagename = '/public/upload/image/images/' +data.image_name;
	            	tempdata.name = data.info.name;
	            	tempdata.size = data.info.size;
	                }else{
	                    alert(data.error_info);
	                }
                //data.info.imagename=data.image_name;
                imagedata[imagedata.length] = tempdata;
                $('img').on('click', function(){
                  	 //alert('sds');
                  	  $("#yincang").attr("data-id",$(this).data('imagesid'));
  					  $("#yincang").attr("data-type",$(this).data('type'));
                  	  $('#imageid').attr('src',$(this).attr('src')).show();
                      var othis = $(this), method = othis.data('method');
                      active[method] ? active[method].call(this, othis) : '';
                    });              
            }
        });
        layui.upload({
            url: "<?php echo url('Upload/upload'); ?>?type=1" //上传接口
            ,before: function(input){
                //返回的参数item，即为当前的input DOM对象
                console.log('图片上传中');
            }
            ,title:'上传大图'
            ,elem: '#upload-images' //指定原始元素，默认直接查找class="layui-upload-file"
            ,method: 'post' //上传接口的http类型
            ,ext: 'jpg|png|gif'
            ,type:'images'
            ,success: function(data){ //上传成功后的回调
                //console.log(res)
                if(data.status == 1){
                    $("#images").val('/public/upload/image/images/' +data.image_name);
                    $("#img_paths").attr('src', '/public/upload/image/images/' + data.image_name).show();
                    $('<li  data-image class="layui-nav-item" ><img data-imageid='+bigimagedata.length+' data-type="0" data-method="setTop" style="width:60px; height:60px;" src="'+'/public/upload/image/images/' + data.image_name+'\"/></li>').prependTo("#big");
                }else{
                    alert(data.error_info);
                }
            	tempdata = {};
            	tempdata.imagename = '/public/upload/image/images/' +data.image_name;
            	tempdata.name = data.info.name;
            	tempdata.size = data.info.size;
                //data.info.imagename=data.image_name;
                bigimagedata[bigimagedata.length] = tempdata;
                $('img').on('click', function(){
               	// alert('sds');
               	      $("#yincang").attr("data-id",$(this).data('imageid'));
  					  $("#yincang").attr("data-type",$(this).data('type'));
               	  $('#imageid').attr('src',$(this).attr('src'));
                   var othis = $(this), method = othis.data('method');
                   active[method] ? active[method].call(this, othis) : '';
                 });
                
            }
        });




        var editIndex = layedit.build('LAY_demo_editor', {
            //hideTool: ['image']
            uploadImage: {
                url: '<?php echo url("upload/uploadImage"); ?>'
                ,type: 'post'

            }
            //,tool: []
            //,height: 100
        });
 
        //监听提交
        form.on('submit(demo1)', function(data){
           // layer.alert(JSON.stringify(data.field), {
             //   title: '最终的提交信息'
            //})
            var sub=true;
            var url=$(this).data('href');
            var small = '[';
            var big = '[';
			for( x in imagedata){
				if(imagedata[x].imagename == "undefined"){continue;}
				small =small+'{"imagename":"'+imagedata[x].imagename+'","name":"'+imagedata[x].name+'","size":"'+imagedata[x].size+'"},';
			}
			small = small.substr(0,small.length-1)+']';
			//console.log(small);
			for( x in bigimagedata){
				if(imagedata[x].imagename == "undefined"){continue;}
				big =big+'{"imagename":"'+bigimagedata[x].imagename+'","name":"'+bigimagedata[x].name+'","size":"'+bigimagedata[x].size+'"},';
			}
			big = big.substr(0,big.length-1)+']';
			data.field.big = big;
			data.field.small = small;
           	data.field.nodeID =$(this).attr('data-nodeid');
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
                                //common.layerAlertS(data.msg, '提示');
                                
                                window.location.href="<?php echo url('Image/index'); ?>";
                            }
                            else {
                               // common.layerAlertE(data.msg, '提示');
                            }
                        },
                        beforeSend: function () {
                        //    // 一般是禁用按钮等防止用户重复提交
                            $(data.elem).attr("disabled", "true").text("提交中...");
                        },
                        //complete: function () {
                        //    $(sbbtn).removeAttr("disabled");
                        //},
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                           // common.layerAlertE(textStatus, '提示');
                        }
                    });
                }
            }else{
                common.layerAlertE('链接错误！', '提示');
            }
            
            return false;
        });


    });
    layui.use('layer', function(){ //独立版的layer无需执行这一句
    	  var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
    	  
    
    	  

    	  
    	});   

    
</script>