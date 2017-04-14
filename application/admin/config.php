<?php

return [

    'url_route_on' => true,
    'url_route_must'  =>  false,
    //模板参数替换
    'view_replace_str' => array(
        '__js__'   =>'/template/backmanager/default/statisc/js',
        '__css__'   =>'/template/backmanager/default/statisc/css',
        '__img__'   =>'/template/backmanager/default/statisc/img',
        '__lay__'   =>'/template/backmanager/default/statisc/layui',
        '__font__'   =>'/template/backmanager/default/statisc/Font-Awesome/css',
        '__CSS__' => '/public/statisc/admin/css',
        '__JS__'  => '/public/statisc/admin/js',
        '__IMG__' => '/public/statisc/admin/images',
        '__CS__'  =>'/public/statisc/css',
        '__JSS__'  =>'/public/statisc/js',
        '__IMAGE__'  =>'/public/statisc/images',
        '__PLUG__'  =>'/public/statisc/plugins',
    ),
    'template' => [
        // 模板引擎类型 支持 php think 支持扩展
        // 'view_path'    => './application/admin/view/default/',
        'view_path'    => './template/backmanager/default/admin/',
        //'theme_name'   =>'default',
        'theme_name'   =>'',
    ],
];
