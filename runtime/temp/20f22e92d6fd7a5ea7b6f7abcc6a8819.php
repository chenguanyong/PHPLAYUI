<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"./template/admin/default\article\index.html";i:1489988957;s:43:"./template/admin/default\public\header.html";i:1489988957;s:43:"./template/admin/default\public\footer.html";i:1489988957;}*/ ?>
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
        <h2>文章列表</h2>
    </blockquote>
    <div class="y-role">
        <!--工具栏-->
        <div id="floatHead" class="toolbar-wrap">
            <div class="toolbar">
                <div class="box-wrap">
                    <a class="menu-btn"></a>
                    <div class="l-list">
                        <a href="javascript:;" class="layui-btn layui-btn-small do-action" data-type="doAdd" data-href="<?php echo url('article/add_article'); ?>"><i class="fa fa-plus"></i>新增</a>
                        <a class="layui-btn layui-btn-small do-action" data-type="doDelete" data-href="/UserManager/DelUser"><i class="fa fa-trash-o"></i>删除</a>
                        <a class="layui-btn layui-btn-small do-action" data-type="doRefresh" data-href=""><i class="fa fa-refresh fa-spin"></i>刷新</a>
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
                    <col width="5%">
                    <col width="12%">
                    <col width="5%">
                    <col width="5%">
                    <col width="6%">
                    <col width="6%">
                    <col width="5%">
                    <col width="5%">
                    <col width="5%">
                    <col width="5%">
                    <col width="9%">
                    <col width="5%">
                    <col width="15%">
                </colgroup>
                <thead>
                <tr>
                    <th>

                          <!--  <input type="checkbox" id="selected-all" style="position: absolute; opacity: 0;">-->
                        <input type="checkbox" class="selected-all" id="selected-all">

                    </th>
                    <th>id </th>
                    <th>标题</th>
                    <th>分类</th>
                    <th>封面</th>
                    <th>浏览量</th>
                    <th>下载数</th>
                    <th>积分</th>
                    <th>金币</th>
                    <th>推荐</th>
                    <th>热门</th>
                    <th>创建时间</th>
                    <th style="text-align:center">状态</th>

                    <th>操作</th>
                </tr>
                </thead>
                <script id="arlist" type="text/html">
                    {{# for(var i=0;i<d.length;i++){  }}
                    <tr class="long-td">
                        <td>
                            <input ids="3031" name="ck" type="checkbox" value="true">

                            <!--<input id="ck" ids="3031" name="ck" type="checkbox" value="true">
                            <input name="ck" type="hidden" value="false">-->
                        </td>
                        <td>{{d[i].id}}</td>
                        <td>{{d[i].title}}</td>
                        <td>{{d[i].cate_name}}</td>
                        <td>
                            <!-- <img src="/public/{{d[i].image}}" height="60px;" width="80px" onerror="this.src='__IMG__/no_img.jpg'"/>-->
                            <a class="avatar" href="/UserManager/UserModify?type=Edit&amp;fid=3031">
                                <img src="http://q.qlogo.cn/qqapp/101235792/3DC0A1C44E35263F3C44E95D0BEBF7DD/100">
                            </a>
                        </td>
                        <td>{{d[i].browse_count}}</td>
                        <td>{{d[i].down_count}}</td>
                        <td>{{d[i].integral_count}}</td>
                        <td>{{d[i].gold_count}}</td>
                        <td class="text-danger">
                            {{# if(d[i].is_recommend==1){ }}
                            <span>是</span>
                            {{# }else{ }}
                            否
                            {{# } }}

                        <td class="text-danger">
                            {{# if(d[i].is_hot == 1){ }}
                            <span>是</span>
                            {{# }else{ }}
                            <span>否</span>
                            {{# } }}
                        </td>
                        <td>{{d[i].create_time}}</td>
                        <td>
                            {{# if(d[i].is_status==1){ }}
                            <a href="javascript:;" class="change_status"  data-id="{{d[i].id}}">
                                <div class="layui-unselect layui-form-switch layui-form-onswitch"><i></i></div>

                            </a>
                            {{# }else{ }}
                            <a href="javascript:;" class="change_status" data-id="{{d[i].id}}">

                                <div class="layui-unselect layui-form-switch"><i></i></div>
                            </a>
                            {{# } }}
                        </td>
                        <td>
                            <!-- <a href="javascript:;" onclick="edit_article({{d[i].id}})" class="btn btn-primary btn-xs btn-outline">
                                 <i class="fa fa-paste"></i> 编辑</a>&nbsp;&nbsp;
                             <a href="javascript:;" onclick="del_article({{d[i].id}})" class="btn btn-danger btn-xs btn-outline">
                                 <i class="fa fa-trash-o"></i> 删除</a>-->

                            <a  class="layui-btn layui-btn-small do-action" data-type="doEdit" data-href="<?php echo url('edit_article'); ?>" data-id="{{d[i].id}}">
                                <i class="icon-edit  fa fa-pencil-square-o"></i>编辑
                            </a>
                            <a class="layui-btn layui-btn-small do-action" data-type="doDelOne" data-href="<?php echo url('del_article'); ?>" data-id="{{d[i].id}}">
                                <i class="icon-edit  fa fa-pencil-square-o"></i>删除
                            </a>
                        </td>
                    </tr>
                    {{# } }}
                </script>
                <tbody id="article_list">

                </tbody>
            </table>

        </div>
        <div id="AjaxPage" style="margin-top: -57px;float: right;"></div>
        <div style="float: right;margin-top: -9px;margin-right: 13px;">
            共<?php echo $count; ?>条数据，<span id="allpage"></span>
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
    var url='<?php echo url("article/index"); ?>';
    var allpages='<?php echo $allpage; ?>';
    layui.use(['layer', 'laypage','common', 'icheck','laytpl'], function () {
        var $ = layui.jquery
                , layer = layui.layer
                , common = layui.common;
        laytpl =layui.laytpl;
        laypage = layui.laypage;

        common.Ajaxpage();

        //加载单选框样式
       $(("[type='checkbox']")).iCheck({
            checkboxClass: 'icheckbox_square-green',

        });
        $(document).on('click','.change_status', function () {
            var id=$(this).attr('data-id');
            var obs=$(this);
            $.ajax({
                url: '<?php echo url("article_state"); ?>',
                dataType: "json",
                data:{'id':id},
                type: "POST",
                success: function(data){


                    if(data.code == 1){
                        obs.find('div').removeClass('layui-form-onswitch');
                    }else{
                        obs.find('div').addClass('layui-form-onswitch');
                    }
                },
                error:function(ajaxobj)
                {
                    if(ajaxobj.responseText!='')
                        alert(ajaxobj.responseText);
                }
            });

        });
      /*  //表格行点击勾选
        $('.layui-table tbody tr').on('click', function () {
            var $this = $(this);
            var $input = $this.children('td').eq(0).find('input');
            $input.on('ifChecked', function (e) {
                $this.css('background-color', '#EEEEEE');
            });
            $input.on('ifUnchecked', function (e) {
                $this.removeAttr('style');
            });
            $input.iCheck('toggle');
        }).find('input').each(function () {
            var $this = $(this);
            $this.on('ifChecked', function (e) {
                $this.parents('tr').css('background-color', '#EEEEEE');
            });
            $this.on('ifUnchecked', function (e) {
                $this.parents('tr').removeAttr('style');
            });
        });*/
        //全选
        $(document).on('ifChanged','.selected-all', function (event) {
           // alert(1);
            var $input = $('.layui-table tbody tr td').find('input');
            $input.iCheck(event.currentTarget.checked ? 'check' : 'uncheck');
        });

    });
</script>
