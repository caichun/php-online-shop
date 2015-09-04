<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/filter.php';
include '../include/conn.php';
include '../include/create_id.php';

$user_id=$_SESSION['user_id'];
$product_id=$_POST['product_id'];
date_default_timezone_set('Asia/Shanghai');
$date = date('Y-m-d H:i:s');
$quality=$_POST['quality'];
$price=$_POST['price'];
$text=$_POST['text'];
$remark_id=getRandOnlyId();

$sql="insert into remark(r_id,u_id,p_id,r_text,r_quality,r_price,r_date) values('$remark_id','$user_id','$product_id','$text','$quality','$price','$date')";
mysql_query($sql);
 if (mysql_error()) {
            echo "<script>alert('添加评论失败!');history.go(-1);</script>";
    } else {
          echo "<script>alert('添加评论成功!');history.go(-1);</script>";
    }