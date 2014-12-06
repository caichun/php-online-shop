<?php
session_start();
include 'include/conn.php';
include 'include/admin_filter.php';
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="UTF-8">

  <meta name="description" content="">
  <meta name="keywords" content="">

  <title>已处理订单</title>

  <link rel="shortcut icon" href="favicon.ico">
  <link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
  <link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">

  <script src="js/jquery-1.7.2.min.js" ></script>
  <script src="js/html5.js" ></script>
  <script src="js/jflow.plus.js" ></script>
  <script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
  <script src="js/checkbox.js"></script>
  <script src="js/radio.js"></script>
  <script src="js/selectBox.js"></script>
  <script>
	$(document).ready(function() {
		$("select").selectBox();
	});
  </script>


  
  <script>
       $(document).ready(function(){
	      $("button").click(function(){
		     $(this).addClass('click')
	      });
       })
  </script>

</head>
 <body>
        <?php include 'include/top.php'; ?>

        <div class="clear"></div>

        <?php include 'include/nav_bar.php'; ?>

        <div class="clear"></div>

        <div class="container_12">
    <div class="grid_12">
       <div class="breadcrumbs">
	      <a href="index.php">首页</a><span>&#8250;</span><a href="admin_index.php">管理后台</a><span>&#8250;</span><span class="current">已处理订单</span>
       </div><!-- .breadcrumbs -->
    </div><!-- .grid_12 -->
  </div><!-- .container_12 -->

  <div class="clear"></div>

  <section id="main">
    <div class="container_12">
       <div id="sidebar" class="grid_3">
	      <aside id="categories_nav">
	        <h3>用户管理</h3>

		     <nav class="left_menu">
			    <ul>
				   <li><a href="admin_user_list.php">用户列表</a></li>
								  
			    </ul>
		     </nav><!-- .left_menu -->
	      </aside><!-- #categories_nav -->
          <aside id="categories_nav">
	        <h3>商品管理</h3>

		     <nav class="left_menu">
			    <ul>
				   <li><a href="admin_product_list.php">商品列表</a></li>
				   <li><a href="admin_product_add.php">添加商品</a></li>
				  
			    </ul>
		     </nav><!-- .left_menu -->
	      </aside><!-- #categories_nav -->
          <aside id="categories_nav">
	        <h3>订单管理</h3>

		     <nav class="left_menu">
			    <ul>
				   <li class="current"><a href="admin_order_list.php">订单列表</a></li>
				   <li><a href="admin_order_unhandled.php">未处理订单</a></li>
                   <li><a href="admin_order_handled.php">已处理订单</a></li>
				  
			    </ul>
		     </nav><!-- .left_menu -->
	      </aside><!-- #categories_nav -->
          <aside id="categories_nav">
	        <h3>评论管理</h3>

		     <nav class="left_menu">
			    <ul>
				   <li><a href="admin_remark_list.php">评论列表</a></li>
				 				  
			    </ul>
		     </nav><!-- .left_menu -->
	      </aside><!-- #categories_nav -->
       </div><!-- .sidebar -->

       <div id="content" class="grid_9">
	      <h1 class="page_title">已处理订单</h1>

		<div class="product_page">
			<div class="related">
				
			  <table class="order_admin">
	      <tr>
		     <th class="id">订单号</th>
		     <th class="bg class">下单人</th>
		     <th class="name">下单日期</th>
		     <th class="bg price">订单金额</th>
		     <th class="status">订单状态</th>
		     <th class="bg close"></th>
	      </tr>
	      <?php
$sql = mysql_query("select * from order_list where o_status='2' or o_status='3'");

$num=mysql_num_rows($sql);
if(!$num){
         echo "<script>alert('没有已处理订单!');history.go(-1);</script>";
     exit;
}

while ($re = mysql_fetch_array($sql)) {
    $id[] = $re['o_id'];
    $name[] = $re['o_name'];
    $price[] = $re['o_price'];
    $date[] = $re['o_date'];  
	$status[]=$re['o_status'];
    

	}
    
    for ($i = 0; $i < count($id); $i++) { 
	if($status[$i]=="0"){
$status2[$i]="未付款";}						
elseif($status[$i]=="1"){
$status2[$i]="已付款";}
elseif($status[$i]=="2"){
$status2[$i]="已发货";}
elseif($status[$i]=="3"){
$status2[$i]="已成交";}	
	
	
	?>
          <tr>
		     <td class="id"><?php echo $id[$i];?></td>
		     <td class="bg username"><?php echo $name[$i];?></td>
		     <td class="date"><?php echo $date[$i];?></td>
		     <td class="bg price">￥<?php echo $price[$i];?></td>
		     <td class="status"><?php echo $status2[$i];?></td>
		     <td class="bg close"><a title="删除" class="close" href="action/admin_order_delete.php?order_id=<?php echo $id[$i];?>" onclick="if(confirm('确实要删除此条记录吗？')) return true;else return false; "></a></td>
	      </tr>
	      <?php 
}?>
	     
       </table>
            

				
	   </div><!-- .product_page --></div><!-- #content -->

      <div class="clear"></div>

    </div><!-- .container_12 -->
  </section><!-- #main -->

  <div class="clear"></div>

<?php include 'include/footer.php'; ?>

</body>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
