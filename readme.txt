1���޸�hosts�ļ���
127.0.0.1 change.com

2������httpd.conf
LoadModule rewrite_module modules/mod_rewrite.so

3������httpd-vhosts.conf,�ڸ��ļ�����������
<VirtualHost *:80>
    ServerName change.com 
    DocumentRoot  "D:/phpcode"
    #�������û�ӭ����
    DirectoryIndex index.html index.php index.htm index.html
    <Directory "D:/phpcode">
        Options Indexes FollowSymLinks
        #������˸����Լ���ҳ��
        AllowOverride None
        #���÷���Ȩ��
        Require all granted 
    </Directory>
</VirtualHost>
4�����ʵ�ַ��
http://change.com/ceadmin
�û�����admin  ���� 123456