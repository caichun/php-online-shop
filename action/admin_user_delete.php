<?php
session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';

$user_id=$_GET['user_id'];
$sql = "delete from users where u_id='$user_id'";
     mysql_query($sql);
 if(!mysql_error()){
 echo"<script>alert('删除成功');history.go(-1);</script>";}
        else{
            echo"<script>alert('删除失败');history.go(-1);</script>";
        }

?>