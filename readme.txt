1、修改hosts文件：
127.0.0.1 change.com

2、开启httpd.conf
LoadModule rewrite_module modules/mod_rewrite.so

3、开启httpd-vhosts.conf,在该文件中增加如下
<VirtualHost *:80>
    DocumentRoot "E:/Zend/workspaces/DefaultWorkspace/phpce"
    ServerName change.com
</VirtualHost>
4、访问地址：
http://change.com/ceadmin
用户名：admin  密码 123456