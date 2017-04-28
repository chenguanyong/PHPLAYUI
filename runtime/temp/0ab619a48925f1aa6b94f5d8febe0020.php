<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:47:"./template/member/default/Index/index\link.html";i:1493166604;s:50:"./template/member/default/Index/public\header.html";i:1493166604;s:50:"./template/member/default/Index/public\footer.html";i:1493166604;}*/ ?>
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
    <link href="__css__/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="__css__/plugins/cropper/cropper.min.css" rel="stylesheet">
</head>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>推广链接</h5>
                </div>
                <div class="ibox-content">
					<p><?php echo $link; ?></p>
					<a href="<?php echo $link; ?>" >点击注册</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>二维码</h5>
                </div>
                <div id="code" class="ibox-content">

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
<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:17:11 GMT -->
</html>

<script type="text/javascript" src="__js__/jquery.qrcode.min.js"></script>
<script>
$("#code").qrcode({ 
    render: "table", //table方式 
    width: 200, //宽度 
    height:200, //高度 
    text: "<?php echo $link; ?>" //任意内容 
}); 
</script>