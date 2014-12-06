<?php
session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';

$user_id=$_POST['user_id'];
$password=md5($_POST['password']);
$phone=$_POST['phone'];
$email=$_POST['email'];

$sql = "update users set u_password='$password',u_phone='$phone',u_email='$email' where u_id='$user_id'";
        mysql_query($sql);
         if(!mysql_error()){
         echo"<script>alert('修改成功');history.go(-1);</script>";}
         else{
             echo"<script>alert('修改失败');history.go(-1);</script>";
         }
?>