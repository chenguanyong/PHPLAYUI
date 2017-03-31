<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./template/admin/default\data\import.html";i:1489988957;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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

</style>
<div class="main-wrap">
    <blockquote class="layui-elem-quote fhui-admin-main_hd">
        <h2>数据库还原</h2>
    </blockquote>

    <div class="y-role">
        <!--工具栏-->
        <div id="floatHead" class="toolbar-wrap">
            <div class="toolbar">
                <div class="box-wrap">
                    <a class="menu-btn"></a>
                    <div class="l-list">

                        <a class="layui-btn layui-btn-small do-action" data-type="doRefresh" data-href=""><i class="fa fa-refresh fa-spin"></i>刷新</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/工具栏-->
        <!--文字列表-->
        <div class="fhui-admin-table-container">
            <form id="export-form" method="post" action="<?php echo url('export'); ?>">
                <table class="layui-table" lay-skin="line">
                    <colgroup>
                        <col width="15%">
                        <col width="10%">
                        <col width="5%">
                        <col width="10%">
                        <col width="12%">
                        <col width="8%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                    <tr>

                        <th >备份名称</th>
                        <th >卷数</th>
                        <th >压缩</th>
                        <th >数据大小</th>
                        <th >备份时间</th>
                        <th >状态</th>
                        <th >操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(!(empty($data) || ($data instanceof \think\Collection && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr class="long-td">
                                <td><?php echo date('Ymd-His',$vo['time']); ?></td>
                                <td><?php echo $vo['part']; ?></td>
                                <td><?php echo $vo['compress']; ?></td>
                                <td><?php echo format_bytes($vo['size']); ?></td>
                                <td><?php echo $key; ?></td>
                                <td>-</td>
                                <td>
                                    <a class="layui-btn layui-btn-small db-import"  href="<?php echo url('revert',['time'=>$vo['time']]); ?>">还原</a>
                                    <a class="layui-btn layui-btn-small do-action" data-type="doDelOne" data-href="<?php echo url('del',['time'=>$vo['time']]); ?>">删除</a>


                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <td colspan="7" class="text-center"> 暂无备份数据</td>
                        <?php endif; ?>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
</div>
<div class="shang_box" style="display: none;">
    <div class="shang_tit">
        <p>继续努力!</p>
    </div>
    
</div>
<script src="__js__/global.js"></script>

</body>
</html>
<!--<script src="__JS__/jquery.min.js?v=2.1.4"></script>-->
<script>

    layui.use(['layer','common'], function () {
        var $ = layui.jquery
                , layer = layui.layer;
        $(".db-import").click(function () {
            var self = this, status = ".";
            $.get(self.href, success, "json");
            window.onbeforeunload = function () { return "正在还原数据库，请不要关闭！";};
            return false;
            function success(data) {
                if (data.code) {
                    if (data.data.gz) {
                        data.msg += status;
                        if (status.length === 5) {
                            status = ".";
                        } else {
                            status += ".";
                        }
                    }
                    $(self).parent().prev().text(data.msg);
                    if (data.data.part) {
                        $.get(self.href, {"part": data.data.part, "start": data.data.start}, success, "json");
                    } else {
                        window.onbeforeunload = function () {return null;};
                    }
                } else {
                    layer.alert(data.msg,0);
                }
            }
        });
    });
</script>
>