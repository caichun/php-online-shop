<?php
header("Content-type:text/html;charset=UTF-8");
/*用于过滤用户是否登录*/
if(!isset($_SESSION['user_id'])){
     echo "<script>alert('您未登录,请先登录!');history.go(-1);</script>";
  exit;
  }
?>