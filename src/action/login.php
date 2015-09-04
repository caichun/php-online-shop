<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';

if (!isset($_GET['user'])) {
    if(!$_POST['username']&&!$_POST['password']){
        echo "<script>alert('没有输入用户名或密码!');history.go(-1);</script>";
    }
    else{
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "select * from users where u_name='$username' and u_password='$password'";
        $query = mysql_query($sql);
        $row = mysql_num_rows($query);
        if ($row) {
            $_SESSION['username'] = $username;
            $nsql = mysql_query("select u_id from users where u_name='$username'");
            $re = mysql_fetch_array($nsql);
            $_SESSION['user_id'] = $re["u_id"];

          echo "<script>alert('登录成功!');history.go(-2);</script>";
        } else {
          echo "<script>alert('登录失败!');history.go(-1);</script>";
        }
    } 
}else {
        if ($_GET['user'] == "admin") {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $sql = "select * from users where u_name='$username' and u_password='$password' and u_isadmin='1'";
            $query = mysql_query($sql);
            $row = mysql_num_rows($query);
            if ($row) {
                $_SESSION['username'] = $username;
                $nsql = mysql_query("select u_id from users where u_name='$username'");
                $re = mysql_fetch_array($nsql);
                $_SESSION['user_id'] = $re["u_id"];
                echo "<script language='javascript'>alert('登陆成功');location='../admin/index.php';</script>";
            } else {
                echo "<script language='javascript'>alert('登录失败');history.go(-1);</script>";
            }
        }
    }
	?>