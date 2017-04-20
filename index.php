<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
if (!defined('__PUBLIC__')) {
    $_public = rtrim(dirname(rtrim($_SERVER['SCRIPT_NAME'], '/')), '/');
    define('__PUBLIC__', (('/' == $_public || '\\' == $_public) ? '' : $_public));
}
// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 定义上传目录
define('UPLOAD_PATH', __DIR__ . '/public');
// 定义应用缓存目录
define('RUNTIME_PATH', __DIR__ . '/runtime/');
// 开启调试模式
define('APP_DEBUG', true);
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';
