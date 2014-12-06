<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';
 
 if($_POST['submit']){
 $order_id=$_POST['order_id'];
 $sql=mysql_query("select * from order_detail where o_id='$order_id'");
 while($re=mysql_fetch_array($sql)){
 $product_id[]=$re['p_id'];
 $quantity[]=$re['o_quantity'];
   }
   for($i=0;$i<count($product_id);$i++){
   $nsql[$i]="update product set p_amount=p_amount-'$quantity[$i]',p_sale=p_sale+'$quantity[$i]' where p_id='$product_id[$i]'";
   mysql_query($nsql[$i]);
   
   }
   $msql=mysql_query("update order_list set o_status='1' where o_id='$order_id'");
   
   
   if(!mysql_error()){
   echo "<script>alert('支付成功!');location='../order_list.php';</script>";
   }
   else{
   echo "<script>alert('支付失败');history.go(-1);</script>";
   }
 }
?>