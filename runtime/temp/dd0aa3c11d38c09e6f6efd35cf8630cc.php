<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"./template/admin/default\article\index_cate.html";i:1489988957;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
        <h2>文章分类列表</h2>
    </blockquote>

    <div class="y-role">
        <!--工具栏-->
        <div id="floatHead" class="toolbar-wrap">
            <div class="toolbar">
                <div class="box-wrap">
                    <a class="menu-btn"></a>
                    <div class="l-list">
                        <a class="layui-btn layui-btn-small do-action" data-type="doAdd" data-href="<?php echo url('add_cate'); ?>"><i class="fa fa-plus"></i>新增</a>

                        <a class="layui-btn layui-btn-small do-action" data-type="doRefresh" data-href=""><i class="fa fa-refresh fa-spin"></i>刷新</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/工具栏-->
        <!--文字列表-->
        <div class="fhui-admin-table-container">
            <form action="/_Admin/Nav_list" class="form-horizontal" id="formrec" method="post" role="form">
                <table class="layui-table" lay-skin="line">
                    <colgroup>

                        <col width="5%">
                        <col width="15%">
                        <col width="8%">
                        <col width="5%">

                        <col width="15%">
                    </colgroup>
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>分类名称</th>

                        <th>是否启用</th>
                        <th>排序</th>

                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list) || $list instanceof \think\Collection): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
                        <tr>

                            <td><?php echo $v['id']; ?></td>
                            <td><?php echo $v['cate_name']; ?></td>

                            <td>

                                <?php if($v['status'] == 1): ?>

                                <a href="javascript:;" class="change_status" data-id="<?php echo $v['id']; ?>"> <div class="layui-unselect layui-form-switch layui-form-onswitch"><i></i></div> </a>
                                <?php else: ?>

                                <a href="javascript:;" class="change_status" data-id="<?php echo $v['id']; ?>"> <div class="layui-unselect layui-form-switch"><i></i></div> </a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $v['sort']; ?></td>


                            <td>
                                <a class="layui-btn layui-btn-small do-action" data-type="doEdit" data-href="<?php echo url('edit_cate',['id'=>$v['id']]); ?>"><i class="icon-edit  fa fa-pencil-square-o"></i>编辑</a>
                                <a class="layui-btn layui-btn-small do-action" data-type="doDelOne" data-href="<?php echo url('del_cate'); ?>" data-id="<?php echo $v['id']; ?>"><i class="icon-edit  fa fa-pencil-square-o"></i>删除</a>
                            </td>
                        </tr>
                        <?php if(is_array($v['cate_sub_list']) || $v['cate_sub_list'] instanceof \think\Collection): if( count($v['cate_sub_list'])==0 ) : echo "" ;else: foreach($v['cate_sub_list'] as $key=>$item): ?>
                        <tr>

                            <td><?php echo $v['id']; ?></td>
                            <td>&nbsp;&nbsp;<span class="folder-line"></span><?php echo $item['cate_name']; ?></td>

                            <td>

                                <?php if($item['status'] == 1): ?>

                                    <a href="javascript:;" class="change_status" data-id="<?php echo $item['id']; ?>"> <div class="layui-unselect layui-form-switch layui-form-onswitch"><i></i></div> </a>
                                <?php else: ?>

                                <a href="javascript:;" class="change_status" data-id="<?php echo $item['id']; ?>"> <div class="layui-unselect layui-form-switch"><i></i></div> </a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $item['sort']; ?></td>


                            <td>
                                <a class="layui-btn layui-btn-small do-action" data-type="doEdit" data-href="<?php echo url('edit_cate',['id'=>$item['id']]); ?>"><i class="icon-edit  fa fa-pencil-square-o"></i>编辑</a>
                                <a class="layui-btn layui-btn-small do-action" data-type="doDelOne" data-href="<?php echo url('del_cate'); ?>" data-id="<?php echo $item['id']; ?>"><i class="icon-edit  fa fa-pencil-square-o"></i>删除</a>
                            </td>
                        </tr>

                        <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>


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

    layui.use(['layer','common'], function () {
        var $ = layui.jquery
                , layer = layui.layer;

        $(document).on('click','.change_status', function () {
            var id=$(this).attr('data-id');

            var obs=$(this);
            $.ajax({
                url: '<?php echo url("cate_state"); ?>',
                dataType: "json",
                data:{'id':id},
                type: "POST",
                success: function(data){


                    if(data.code == 1){
                        obs.find('div').removeClass('layui-form-onswitch');
                        layer.msg(data.msg,{icon:2,time:1500,shade: 0.1,});
                    }else{
                        obs.find('div').addClass('layui-form-onswitch');
                        layer.msg(data.msg,{icon:2,time:1500,shade: 0.1,});
                    }
                },
                error:function(ajaxobj)
                {
                    if(ajaxobj.responseText!='')
                        alert(ajaxobj.responseText);
                }
            });

        });
    });
</script>