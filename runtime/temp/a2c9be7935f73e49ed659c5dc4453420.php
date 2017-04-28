<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"./template/member/default/Index/login\index.html";i:1493166604;s:50:"./template/member/default/Index/public\header.html";i:1493166604;s:50:"./template/member/default/Index/public\footer.html";i:1493166604;}*/ ?>
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

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">H+</h1>

            </div>
            <h3>欢迎使用 H+</h3>
            <form class="m-t" role="form" id="validate">
                <div for="loginName" class="form-group">
                    <input type="text" name="loginName" class="form-control" placeholder="用户名" >
                </div>
                <div for="loginPwd" class="form-group">
                    <input type="password" name="loginPwd" class="form-control" placeholder="密码">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录
                </button>
                <p class="text-muted text-center"> 
                    <small>welcome you </small>
                </p>
            </form>    
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

<script src="__js__/plugins/validate/jquery.validate.min.js"></script>
<script src="__js__/plugins/validate/messages_zh.min.js"></script>
<script >

    //验证
    $().ready(function() {
    // 在键盘按下并释放及提交后验证提交表单
      $("#validate").validate({
            rules: {
              loginName: {
                required: true,
              },
              loginPwd: {
                required: true,
              }
            },
        });
    });
    $.validator.setDefaults({
        submitHandler: function() {
            var name = document.getElementsByTagName('input');
            var loginName = name[0].value;
            var loginPwd = name[1].value;     
            $.ajax({
                url: '<?php echo url("login/login"); ?>',
                type: "POST",
                dataType: "json",
                data:{'loginName':loginName, 'loginPwd':loginPwd },
                success: function(data){
                    if(data.code == 1){
                        layer.open({
                            title: '提示'
                            ,content: data.msg
                            ,yes: function(){
                                window.location.href="<?php echo url('index/index'); ?>";
                            }
                        }); 
                    }else{
                        layer.alert(data.msg)
                    }
                },
            });           
        }
    })
</script>