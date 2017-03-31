<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"./template/admin/default\data\index.html";i:1489988957;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
        <h2>数据库备份</h2>
    </blockquote>
    <div class="y-role">
        <!--工具栏-->
        <div id="floatHead" class="toolbar-wrap">
            <div class="toolbar">
                <div class="box-wrap">
                    <a class="menu-btn"></a>
                    <div class="l-list">

                        <a class="layui-btn layui-btn-small" id="export"><i class="fa fa-trash-o"></i>立即备份</a>
                        <a class="layui-btn layui-btn-small" url="<?php echo url('optimize'); ?>" id="optimize" ><i class="fa fa-trash-o"></i>优化表</a>

                        <a class="layui-btn layui-btn-small"  url="<?php echo url('repair'); ?>" id="repair" ><i class="fa fa-trash-o"></i>修复表</a>
                        <a class="layui-btn layui-btn-small do-action" data-type="doRefresh" data-href=""><i class="fa fa-refresh fa-spin"></i>刷新</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/工具栏-->
        <!--文字列表-->
        <div class="fhui-admin-table-container">
            <form id="export-form" method="post" action="<?php echo url('export'); ?>">
            <table class="layui-table">
                <colgroup>
                    <col width="5%">
                    <col width="8%">
                    <col width="8%">
                    <col width="10%">
                    <col width="12%">

                    <col width="8%">

                    <col width="15%">

                </colgroup>
                <thead>
                <tr>
                    <th><input class="i-checks checkbox check-all" checked="chedked" type="checkbox"></th>
                    <th>表名</th>
                    <th>数据量</th>
                    <th>数据大小</th>
                    <th>创建时间</th>
                    <th>备份状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(!(empty($data) || ($data instanceof \think\Collection && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><input class="ids i-checks" checked="chedked" type="checkbox" name="ids[]" value="<?php echo $vo['name']; ?>"></td>
                            <td><?php echo $vo['name']; ?></td>
                            <td>【<?php echo $vo['rows']; ?>】 条记录</td>
                            <td><?php echo format_bytes($vo['data_length']); ?></td>
                            <td><?php echo $vo['create_time']; ?></td>
                            <td id="info">等待备份...</td>
                            <td>
                                <a class="layui-btn layui-btn-small" href="<?php echo url('optimize',['ids'=>$vo['name']]); ?>"><i class="icon-edit  fa fa-pencil-square-o"></i>优化表</a>
                                <a class="layui-btn layui-btn-small" href="<?php echo url('repair',['ids'=>$vo['name']]); ?>"><i class="icon-edit  fa fa-pencil-square-o"></i>修复表</a>

                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <td colspan="7" class="text-center"> 暂未发现数据库表! </td>
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
<script>
    /**
     * [user_state 文章状态]
     * @param  {[type]} val [description]
     * @Author
     */

    var laytpl,laypage;


    layui.use(['layer', 'laypage','common', 'icheck'], function () {
        var $ = layui.jquery
                , layer = layui.layer
                , common = layui.common;

        laypage = layui.laypage;



        //加载单选框样式
        $(("[type='checkbox']")).iCheck({
            checkboxClass: 'icheckbox_square-green',

        });
        //全选的实现
        $('.check-all').on('ifChecked', function (event) {
            $('input[name="ids[]"]').iCheck('check');
        });
        $('.check-all').on('ifUnchecked', function (event) {
            $('input[name="ids[]"]').iCheck('uncheck');
        });




    });

</script>
<script src="__js__/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript">

    //全选的实现
    $('.check-all').on('ifChecked', function (event) {
        $('input[name="ids[]"]').iCheck('check');
    });
    $('.check-all').on('ifUnchecked', function (event) {
        $('input[name="ids[]"]').iCheck('uncheck');
    });
    $(function () {

        (function ($) {
            var $form = $("#export-form"), $export = $("#export"), tables, $optimize = $("#optimize"), $repair = $("#repair");
            $optimize.add($repair).click(function () {
                $.post($(this).attr('url'), $form.serialize(), function (data) {
                    if (data.code) {
                        layer.msg(data.msg,{icon:1,time:2000,shade: 0.1,});
                    } else {
                        layer.msg(data.msg,{icon:2,time:2000,shade: 0.1,});
                    }
                });
                return false;
            });

            $export.click(function () {
                $export.parent().children().prop('disabled', true);
                $export.html("正在发送备份请求...");
                $.post(
                        $form.attr("action"),
                        $form.serialize(),
                        function (data) {
                            if (data.code) {
                                tables = data.data.tables;
                                $export.html(data.msg + "开始备份，请不要关闭本页面！");
                                backup(data.data.tab);
                                window.onbeforeunload = function () {
                                    return "正在备份数据库，请不要关闭！";
                                };
                            } else {
                                layer.msg(data.msg,{icon:2,time:2000,shade: 0.1,});
                                $export.html("立即备份");
                                setTimeout(function () {
                                    $export.parent().children().prop('disabled', false);
                                }, 1500);
                            }
                        });
                return false;
            });

            function backup(tab, status) {
                status && showmsg(tab.id, "开始备份...(0%)");
                $.get($form.attr("action"), tab, function (data) {
                    if (data.code) {
                        showmsg(tab.id, data.msg);
                        if (!$.isPlainObject(data.data.tab)) {
                            $export.parent().children().prop('disabled', false);
                            $export.html("备份完成，点击重新备份");
                            window.onbeforeunload = function () {
                                return null;
                            };
                            return;
                        }
                        backup(data.data.tab, tab.id != data.data.tab.id);
                    } else {
                        layer.msg(data.msg, 0);
                        $export.html("立即备份");
                        setTimeout(function () {
                            $export.parent().children().prop('disabled', false);
                        }, 1500);
                    }
                });
            }

            function showmsg(id, msg) {
                $form.find("input[value=" + tables[id] + "]").closest("tr").find("#info").html(msg);
            }
        })(jQuery);
    });

</script>
