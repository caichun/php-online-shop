<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/filter.php';
include '../include/conn.php';
include '../include/create_id.php';



    $cart_id = getRandOnlyId();
    if(isset($_GET['quantity'])){
	$quantity = $_GET['quantity'];
	}
	else{
	$quantity="1";
	}
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['user_id'];
    $nsql = "select * from cart where p_id='$product_id'";
    $num = mysql_num_rows(mysql_query($nsql));

if (!$num) {
    $msql = "insert into cart(c_id,p_id,u_id,c_quantity) values('$cart_id','$product_id','$user_id','$quantity')";
    mysql_query($msql);
  
} else {
    $sql = "update cart set c_quantity=c_quantity+'$quantity' where p_id='$product_id' and u_id='$user_id' ";
    mysql_query($sql);
   
}


  if (mysql_error()) {
        echo "<script>alert('添加商品失败!');history.go(-1);</script>";
    } else {
         echo "<script>alert('添加商品成功!');history.go(-1);</script>";
    }
unset($_SESSION['product_id']);
?>