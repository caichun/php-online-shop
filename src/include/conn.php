<?php
header("Content-type:text/html;charset=UTF-8");
$conn=@mysql_connect("localhost","root","123456") or die('数据库连接失败！');
@mysql_select_db("food") or die('没有找到数据库！');
mysql_query("set names utf8");

function mysql_open()
{
$conn=@mysql_connect("localhost","root","123456") or die('数据库连接失败！');
@mysql_select_db("food") or die('没有找到数据库！');
mysql_query("set names utf8");
return $conn;
}
?>
