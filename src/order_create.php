<?php
session_start();
include 'include/conn.php';
?>
<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<title>订单</title>

<link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.2.min.js" ></script>
<script src="js/html5.js" ></script>
<script src="js/jflow.plus.js" ></script>
<script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
<script src="js/checkbox.js"></script>
<script src="js/radio.js"></script>
<script src="js/selectBox.js"></script>

</head>
<body>
<?php include 'include/top.php'; ?>
<div class="clear"></div>
<?php include 'include/nav_bar.php'; ?>
<div class="clear"></div>
<div class="container_12">
  <div class="grid_12">
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><a href="cart_view.php">购物车</a><span>&#8250;</span><span class="current">订单</span> </div>
    <!-- .breadcrumbs --> 
  </div>
  <!-- .grid_12 --> 
</div>
<!-- .container_12 -->
<div class="clear"></div>
<section id="main" class="entire_width">
  <div class="container_12">
    <h1 class="page_title">收货人地址</h1>
    <div class="grid_4">
      <div class="bottom_block estimate">
        <h3>收货人地址</h3>
        <p>输入您的收获地址</p>
        <form name="" action="action/order_create.php" method="post">
          <p> <strong>收货人姓名</strong><br/>
            <input type="text" name="name" value="" />
          </p>
          <p> <strong>详细地址</strong><br/>
            <input type="text" name="address" value="" />
          </p>
          <p> <strong>联系电话</strong><br/>
            <input type="text" name="phone" value="" />
          </p>
          <p> <strong>备注</strong><br/>
            <input type="text" name="ps" value="" />
          </p>
          <input type="submit" id="get_estimate" value="确认并生成订单" />
        </form>
      </div>
      <!-- .estimate --> 
    </div>
    <!-- .grid_4 -->
    
    <div id="content_bottom">
      <div class="clear"></div>
    </div>
    <!-- #content_bottom -->
    <div class="clear"></div>

  <!-- .container_12 --> 
</section>
<!-- #main -->

<div class="clear"></div>
<?php include 'include/footer.php'; ?>
</body>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</html>
