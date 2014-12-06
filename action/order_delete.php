<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';
$order_id=$_GET['order_id'];
$sql="delete from order_list where o_id='$order_id' and u_id='".$_SESSION['user_id']."'";
        mysql_query($sql);
        $isql="delete from order_detail where o_id='$order_id'";
        mysql_query($isql);
     if(mysql_error()){
        echo "<script>alert('删除订单失败!');history.go(-1);</script>";
     }
     else{
          echo "<script>alert('删除订单成功!');history.go(-1);</script>";
     }



?>

