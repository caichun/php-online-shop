<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/filter.php';
include '../include/conn.php';
include '../include/create_id.php';


$user_id=$_SESSION['user_id'];
$product_id=$_GET['product_id'];

$isql=mysql_query("select * from favourite where p_id='$product_id' and u_id='$user_id'");
$num=mysql_num_rows($isql);
if($num){
echo "<script>alert('已经收藏该商品!');history.go(-1);</script>";
exit;
}
$fav_id=getRandOnlyId();
$sql="insert into favourite(f_id,u_id,p_id) values('$fav_id','$user_id','$product_id')";
mysql_query($sql);



 if (mysql_error()) {
       echo "<script>alert('收藏商品失败!');history.go(-1);</script>";
    } else {
      echo "<script>alert('收藏商品成功!');history.go(-1);</script>";
    }