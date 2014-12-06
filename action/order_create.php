<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';
include '../include/create_id.php';
date_default_timezone_set('Asia/Shanghai');

$order_name = $_POST['name'];
$order_address = $_POST['address'];
$order_phone = $_POST['phone'];
$order_ps = $_POST['ps'];
$order_id = date('ymdHis').rand(1000,2000);
$order_user_id = $_SESSION['user_id'];

$order_date = date('Y-m-d H:i:s');
$order_price = $_SESSION['total_price'];


$isql = "insert into order_list(o_id,u_id,o_price,o_status,o_address,o_name,o_date,o_ps,o_phone) values('$order_id','$order_user_id','$order_price','0','$order_address','$order_name','$order_date','$order_ps','$order_phone')";
mysql_query($isql);

$nsql=mysql_query("select * from cart where u_id='" . $_SESSION['user_id'] . "'");

while ($re = mysql_fetch_array($nsql)) {
$order_product_id[]=$re['p_id'];
$order_quantity[]=$re['c_quantity'];
 }


 for($i=0;$i<count($order_product_id);$i++){
     $msql[$i]="insert into order_detail(o_id,p_id,o_quantity) values('$order_id','$order_product_id[$i]','$order_quantity[$i]')";
     mysql_query($msql[$i]);
 }
     if (mysql_error()) {
    echo "<script>alert('订单生成失败!');history.go(-1);</script>";
} else {   
     $sql="delete from cart where u_id='".$_SESSION['user_id']."'";
    mysql_query($sql);
     echo "<script>alert('订单生成成功!');location='../order_view.php?order_id=$order_id'</script>";

}
 



 
 
 
?>