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

  <title>编辑用户</title>

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
	      <a href="index.php">首页</a><span>&#8250;</span><a href="admin_index.php">管理后台</a><span>&#8250;</span><span class="current">编辑用户</span>
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
				   <li><a href="admin_order_list.php">订单列表</a></li>
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
	      <h1 class="page_title">编辑用户</h1>

		<div class="product_page">
			<div class="related">
			<?php 
			$sql=mysql_query("select * from users where u_id='".$_GET['user_id']."'");
			while($re=mysql_fetch_array($sql)){
				$username=$re['u_name'];
				$password=$re['u_password'];
				$phone=$re['u_phone'];
				$email=$re['u_email'];
				}
			?>
            <form class="add_comments" method="post" action="action/admin_user_edit.php">
		<input type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>" />

			<div class="nickname">
				<strong>用户名</strong><br/>
				<input type="text" name="username" class="" value="<?php echo $username;?>" />
			</div><!-- .nickname -->
            <div class="clear"></div>
            <div class="nickname">
				<strong>密码</strong><br/>
				<input type="password" name="password" class="" value="<?php echo $password;?>" />
			</div><!-- .nickname -->
            <div class="clear"></div>
            <div class="nickname">
				<strong>手机号</strong><br/>
				<input type="text" name="phone" class="" value="<?php echo $phone;?>" />
			</div><!-- .nickname -->
            <div class="clear"></div>
			<div class="nickname">
				<strong>邮箱</strong><br/>
				<input type="text" name="email" class="" value="<?php echo $email;?>" />
			</div><!-- .nickname -->
            <div class="clear"></div>
		
			<input type="submit" value="修改" />
		</form><!-- .add_comments -->
            

				
	   </div><!-- .product_page --></div><!-- #content -->

      <div class="clear"></div>

    </div><!-- .container_12 -->
  </section><!-- #main -->

  <div class="clear"></div>

<?php include 'include/footer.php'; ?>

</body>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
