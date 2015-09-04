<?php
session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';

$product_id=$_GET['product_id'];
$sql = "delete from product where p_id='$product_id'";
     mysql_query($sql);
 if(!mysql_error()){
 echo"<script>alert('删除成功');history.go(-1);</script>";}
        else{
            echo"<script>alert('删除失败');history.go(-1);</script>";
            
        }

?>