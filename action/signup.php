<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';
include '../include/create_id.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$phone = $_POST['phone'];
date_default_timezone_set('Asia/Shanghai');
$date = date('Y-m-d H:i:s');
$email=$_POST['email'];

$user_id = getRandOnlyId();
$nsql = "select u_name from users where u_name = '$username'";
$result = mysql_query($nsql);
$num = mysql_num_rows($result);
if ($num) {
    echo "<script>alert('用户名已存在注册失败');history.go(-1);</script>";
} else {
    $isql = "insert into users(u_name,u_id,u_password,u_phone,u_email,u_date,u_isadmin) values('$username','$user_id','$password','$phone','$email','$date','0')";
     mysql_query($isql);
       if (mysql_error()) {
            echo "<script>alert('注册失败!');history.go(-1);</script>";         
    } else {
            echo "<script>alert('注册成功!');location='../index.php';</script>";
    }
}
?>