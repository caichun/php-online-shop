<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';

unset($_SESSION['username']);
    unset($_SESSION['user_id']);
echo "<script>alert('注销登录成功!');history.go(-1);</script>";
	
	?>