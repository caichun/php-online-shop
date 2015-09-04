<?php
header("Content-type:text/html;charset=UTF-8");
/*用于过滤用户是否登录*/
if(isset($_SESSION['user_id'])){
   
  $sql=mysql_query("select * from users where u_id='".$_SESSION['user_id']."'");
  while($re=mysql_fetch_array($sql)){
  $isadmin=$re['u_isadmin'];
  }
  if($isadmin=="0"){
  echo "<script>alert('非法操作!');history.go(-1);</script>";
    }
  }
  else{
  echo "<script>alert('非法操作!');history.go(-1);</script>";
  }
?>