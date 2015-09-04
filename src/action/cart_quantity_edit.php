<?php
session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';
$data=unserialize($_SESSION['cart_product_id']);
for($i=0;$i<count($data);$i++){
    $quantity[$i]=$_POST["quantity_".$data[$i].""];
    $sql[$i]="update cart set c_quantity='$quantity[$i]' where p_id='$data[$i]' and u_id='".$_SESSION['user_id']."'";
mysql_query($sql[$i]);
      
}

 if(mysql_error()){
      echo "<script>alert('修改数量失败!');history.go(-1);</script>";
 }
         else{
             echo "<script>alert('修改数量成功!');history.go(-1);</script>";
         }

?>