1���޸�hosts�ļ���
127.0.0.1 change.com

2������httpd.conf
LoadModule rewrite_module modules/mod_rewrite.so

3������httpd-vhosts.conf,�ڸ��ļ�����������
<VirtualHost *:80>
    DocumentRoot "E:/Zend/workspaces/DefaultWorkspace/phpce"
    ServerName change.com
</VirtualHost>
4�����ʵ�ַ��
http://change.com/ceadmin
�û�����admin  ���� 123456