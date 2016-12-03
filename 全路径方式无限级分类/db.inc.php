<?php 

$db_host='localhost';
$db_user='root';
$db_passwd='root';
$db_name='imooc';

$link=mysql_connect($db_host,$db_user,$db_passwd) or die(mysql_error());
mysql_select_db($db_name, $link) or die(mysql_error());

mysql_query("set names utf8") or die("编码设置错误");