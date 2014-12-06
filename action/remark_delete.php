<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';
$remark_id=$_GET['remark_id'];
$sql="delete from remark where r_id='$remark_id'";
        mysql_query($sql);
     if(mysql_error()){
        echo "<script>alert('删除评论失败!');history.go(-1);</script>";
     }
     else{
     	echo "<script>alert('删除评论成功!');history.go(-1);</script>";
     }



?>