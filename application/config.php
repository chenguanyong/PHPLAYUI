<?php

return [

    'url_route_on' => true,// 开启路由
    'url_route_must'  =>  false,//是否强制路由
    'app_trace' =>  false,// 开启应用Trace调试
    'trace' => [
        'type' => 'html',// 在当前Html页面显示Trace信息,显示方式console、html
    ],
    'sql_explain' => false,// 是否需要进行SQL性能分析  
    'extra_config_list' => ['database', 'route', 'validate'],//各模块公用配置
    //临时关闭日志写入
    'log' => [
        'type' => 'test',
    ],

    'app_debug' => true,


	'default_module' => 'admin',//默认模块
    'default_filter' => ['strip_tags', 'htmlspecialchars'],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------
    'cache' => [
        
        'type'   => 'file',// 驱动方式        
        'path'   => CACHE_PATH,// 缓存保存目录        
        'prefix' => '',// 缓存前缀       
        'expire' => 0,// 缓存有效期 0表示永久缓存
        'host'   => '127.0.0.1',
        'port'   => 11211,
    ],

    'http_exception_template'    =>  [
        // 定义404错误的重定向页面地址
        404 => './template/home/default/public/404.html',
        // 还可以定义其它的HTTP status

    ],

    // +----------------------------------------------------------------------
    // | 缓存设置
    // +----------------------------------------------------------------------
    'auth_key' => 'JUD6FCtZsqrmVXc2apev4TRn3O8gAhxbSlH9wfPN', //默认数据加密KEY
    'pages'    => '10',//分页数 
    'salt'     => 'wZPb~yxvA!ir38&Z',//加密串 


    // +----------------------------------------------------------------------
    // | 数据库设置
    // +----------------------------------------------------------------------
    'data_backup_path'     => '../data/',   //数据库备份路径必须以 / 结尾；
    'data_backup_part_size' => '20971520',  //该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M
    'data_backup_compress' => '1',          //压缩备份文件需要PHP环境支持gzopen,gzwrite函数        0:不压缩 1:启用压缩
    'data_backup_compress_level' => '9',    //压缩级别   1:普通   4:一般   9:最高


    // +----------------------------------------------------------------------
    // | 极验验证,请到官网申请ID和KEY，http://www.geetest.com/
    // +----------------------------------------------------------------------
    'verify_type' => '0',   //验证码类型：0极验验证， 1数字验证码
    'gee_id'  => 'ca1219b1ba907a733eaadfc3f6595fad',
    'gee_key' => '9977de876b194d227b2209df142c92a0',
    'view_replace_str' => array(
        '__CSS__' => '/public/statisc/admin/css',
        '__JS__'  => '/public/statisc/admin/js',
        '__IMG__' => '/public/statisc/admin/images',
        '__CS__'  =>'/public/statisc/css',
        '__JSS__'  =>'/public/statisc/js',
        '__IMAGE__'  =>'/public/statisc/images',
        '__PLUG__'  =>'/public/statisc/plugins',
    ),


];