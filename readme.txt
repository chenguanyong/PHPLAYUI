1、修改hosts文件：
127.0.0.1 change.com

2、开启httpd.conf
LoadModule rewrite_module modules/mod_rewrite.so

3、开启httpd-vhosts.conf,在该文件中增加如下
<VirtualHost *:80>
    ServerName change.com 
    DocumentRoot  "D:/phpcode"
    #这里配置欢迎界面
    DirectoryIndex index.html index.php index.htm index.html
    <Directory "D:/phpcode">
        Options Indexes FollowSymLinks
        #不许别人更改自己的页面
        AllowOverride None
        #设置访问权限
        Require all granted 
    </Directory>
</VirtualHost>
4、访问地址：
http://change.com/ceadmin
用户名：admin  密码 123456