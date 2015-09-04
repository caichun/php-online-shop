<?php

session_start();
header("Content-type:text/html;charset=UTF-8");
include '../include/conn.php';
$nsql = "select max(p_id) from product;";
$result = mysql_query($nsql);
while ($row = mysql_fetch_array($result)) {
    $maxid = $row['max(p_id)'];
}
$id = $maxid + 1;
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



$sql = "insert into product(p_id,p_name,p_class,p_class_2,p_price,p_amount,p_desc) values('$id','$name','$class','$class2','$price','$amount','$description')";
mysql_query($sql);
if(!mysql_error()) {


    echo"<script>alert('添加成功');history.go(-1);</script>";
} else {
    echo"<script>alert('添加失败');history.go(-1);</script>";
}
?>