<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';

$id = $_POST['product_id'];
$name = $_POST['name'];
$classname=$_POST['classname'];
$temp=explode("|",$classname);
$class=$temp[0];
$class2=$temp[1];
$price = $_POST['price'];
$amount = $_POST['amount'];
$description = $_POST['description'];

if (!empty($_FILES["pic"]["name"])) {
    if ($_FILES['pic']['type'] == "image/jpeg" || $_FILES['pic']['type'] == "image/pjpeg") {
        if ($_FILES['pic']['error'] > 0)     //判断上传是否出错
            echo "错误：" . $_FILES['pic']['error'];  //输出错误信息
        else {
            $tmp_filename = $_FILES['pic']['tmp_name'];
            $filename = $_FILES['pic']['name'];
            $file_ext = strtolower(trim(array_pop(explode('.', $filename))));
            $dir = '../images/product/';
            $filepath = $dir . $id . '.' . $file_ext;

            if (is_uploaded_file($tmp_filename)) {   //判断是否通过HTTP POST上传
                //上传并移动文件
                if (move_uploaded_file($tmp_filename, $filepath)) {
                    echo "文件上传成功！";
                    //输出文件大小
                } else
                    echo "上传文件失败！";
            }
        }
    }
    else {
        echo"<script>alert('文件格式只能是JPG');history.go(-1);</script>";
        exit;
    }
}



$sql = "update product set p_name='$name',p_class='$class',p_class_2='$class2',p_price='$price',p_amount='$amount',p_desc='$description' where p_id='$id'";
mysql_query($sql);
if(!mysql_error()) {


    echo"<script>alert('修改成功');history.go(-1);</script>";
} else {
    echo"<script>alert('修改失败');history.go(-1);</script>";
}
?>