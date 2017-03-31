<?php
use think\Route;
//Route::rule('ceadmin','admin/Login/index');//登录界面
Route::rule('search/index','home/Search/index');//搜索
Route::rule('source/:id','home/Article/details');//文章详情
Route::rule('login','home/User/login');//登录
Route::rule('reg','home/User/reg');//注册
Route::rule('forget','home/User/forget');//忘记密码
Route::rule('user/do_findpwd','home/User/do_findpwd');//发送验证
Route::rule('resetPassword','home/User/resetPassword');//重置密码
Route::rule('user/doResetPassword','home/User/doResetPassword');//重置密码

Route::rule('help/:id','home/Help/index');//帮助列表
Route::rule('user/do_login','home/User/do_login');//验证登录
Route::rule('user/logout','home/User/logout');//用户退出
Route::rule('setting','home/Setting/index');//个人中心
Route::rule('setting/info','home/Setting/info');//我的主页
Route::rule('setting/avatar','home/Setting/avatar');//头像设置
Route::rule('setting/verify','home/Setting/verify');//邮箱验证
Route::rule('setting/change_pwd','home/Setting/change_pwd');//密码修改页面modify_pwd
Route::rule('setting/modify_pwd','home/Setting/modify_pwd');//密码保存验证
Route::rule('setting/get_city','home/Setting/get_city');//获取城市列表
Route::rule('setting/save_settings','home/Setting/save_settings');//保存个人设置
Route::rule('ajax/upload_avatar','home/Ajax/upload_avatar');//头像上传
Route::rule('ajax/is_login','home/Ajax/is_login');//用户是否登录
Route::rule('ajax/gocollect','home/Ajax/gocollect');//用户收藏
Route::rule('ajax/downloadZipBox','home/Ajax/downloadZipBox');//弹出下载窗口
Route::rule('ajax/comment','home/Ajax/comment');//用户评论
Route::rule('account/amount','home/Account/amount');//充值页面
Route::rule('account/record','home/Account/record');//充值记录

/*
 * 用户充值
 */
Route::rule('pay','home/Pay/index');//前往充值

Route::rule('pay/returanUrl','home/Pay/returanUrl');//充值回调
Route::rule('pay/notifyUrl','home/Pay/notifyUrl');//充值回调

Route::rule('setting/downloads','home/Setting/downloads');//我的下载
Route::rule('setting/comments','home/Setting/comments');//我的评论
Route::rule('setting/collect','home/Setting/collect');//我的收藏
Route::rule('setting/points','home/Setting/points');//我的积分
Route::rule('message','home/Message/index');//我的消息
Route::get('article/<id>-<aid>-<type>-<hot>','home/Article/index',[],['id'=>'\d+','aid'=>'\d+','type'=>'\d+','hot'=>'\d+']);//文章列表
Route::rule('js','home/Article/index?id=2');//js 特效
Route::rule('php','home/Article/index?id=3');//php
Route::rule('templates','home/Article/index?id=4');//模板

/*
 * 用户下载
 */
Route::rule('down/zip','home/Down/zip');//下载验证
Route::rule('down/zip','home/Down/zip');//下载


