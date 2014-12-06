<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';

 if(!preg_match("/^[\w]{1}[\w\.\-_]*@[\w]{1}[\w\-_\.]*\.[\w]{2,4}$/i",$_POST['email'])){
 echo "<script>alert('邮箱地址不合法!');history.go(-1);</script>";
 exit;
  }
  
   if(!preg_match("/^[\d_a-zA-Z]{6,12}$/",$_POST['password'])){
 echo "<script>alert('密码长度必须为6-30位!');history.go(-1);</script>";
 exit;
  }

if ($_POST['old_password']) {

    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "<script>alert('两次密码不相同!');history.go(-1);</script>";
        exit;
    }
    $sql = mysql_query("select * from users where u_id='" . $_SESSION['user_id'] . "' and u_password='" . md5($_POST['old_password']) . "'");
    $num = mysql_num_rows($sql);
    if (!$num) {
        echo "<script>alert('原密码不正确!');history.go(-1);</script>";
    } else {
        if ($_POST['password'] && $_POST['confirm_password']) {
            $isql = "update users set u_password='" . md5($_POST['password']) . "' where u_id='" . $_SESSION['user_id'] . "'";
            mysql_query($isql);
        }
    }
}
$nsql = "update users set u_email='" . $_POST['email'] . "',u_phone='" . $_POST['phone'] . "' where u_id='" . $_SESSION['user_id'] . "'";
mysql_query($nsql);
if (mysql_error()) {
    echo "<script>alert('账户信息修改失败!');history.go(-1);</script>";
} else {
    echo "<script>alert('账户信息修改成功!');history.go(-1);</script>";
}
?>