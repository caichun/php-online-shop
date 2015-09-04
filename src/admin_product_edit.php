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

  <title>编辑商品</title>

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
	      <a href="index.php">首页</a><span>&#8250;</span><a href="admin_index.php">管理后台</a><span>&#8250;</span><span class="current">编辑商品</span>
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
<?php
$sql=  mysql_query("select * from product where p_id='".$_GET['product_id']."'");
while($re=  mysql_fetch_array($sql)){
                                $name = $re['p_name'];
                                $class = $re['p_class'];
                                $class2 = $re['p_class_2'];
                                $price = $re['p_price'];
                                $amount = $re['p_amount'];
                                $description = $re['p_desc'];
                                include 'include/classname.php';
}
?>
       <div id="content" class="grid_9">
	      <h1 class="page_title">编辑商品</h1>

		<div class="product_page">
			<div class="related">
			<form class="add_comments" method="post" enctype="multipart/form-data" action="action/admin_product_edit.php">
		<input type="hidden" name="product_id" value="<?php echo $_GET['product_id'];?>" />

			<div class="nickname">
				<strong>商品名称</strong><br/>
				<input type="text" name="name" class="" value="<?php echo $name;?>" />
			</div><!-- .nickname -->
            <div class="clear"></div>
                                    <div class="nickname">
				<strong>商品分类</strong><br/>
                                <span>该商品目前分类：<?php echo $classname[$class][$class2];?></span><br/>
                                <span>请选择新的分类：</span><br/>
				<select name="classname">
					<option value="1|1">肉干肉脯/豆干/熟食</option>
					<option value="1|2">膨化食品</option>
                                        <option value="1|3">鱿鱼丝/鱼干/海味即食</option>
					<option value="2|1">饼干</option>
                                        <option value="2|2">威化</option>
					<option value="2|3">传统糕点</option>
                                        <option value="2|4">西式糕点</option>
					<option value="3|1">纯牛奶</option>
                                        <option value="3|2">酸奶</option>
					<option value="3|3">豆奶</option>
                                        <option value="4|1">巧克力</option>
					<option value="4|2">糖果零食</option>
                                        <option value="5|1">水</option>
					<option value="5|2">果汁</option>
                                        <option value="5|3">碳酸饮料</option>
					<option value="5|4">功能饮料</option>
                                        <option value="5|5">乳品</option>
					<option value="6|1">速溶咖啡</option>
                                        <option value="6|2">咖啡豆</option>
					<option value="6|3">咖啡伴侣</option>
                                        <option value="7|1">调味料</option>
					<option value="7|2">调味油</option>
                                        <option value="7|3">料酒</option>
					<option value="8|1">方便面</option>
                                        <option value="8|2">罐头</option>
					<option value="8|3">火腿肠</option>
                                        <option value="8|4">其他速食</option>
					<option value="9|1">食用油</option>
                                        <option value="9|2">米类</option>
					<option value="9|3">粉丝</option>
                                        <option value="9|4">干货</option>
					<option value="10|1">传统滋补</option>
                                        <option value="10|2">西洋滋补</option>
					</select>
			</div>
                        <div class="clear"></div>
            <div class="nickname">
				<strong>商品单价</strong><br/>
				<input type="text" name="price" class="" value="<?php echo $price;?>" />
			</div><!-- .nickname -->
            <div class="clear"></div>
            <div class="nickname">
				<strong>库存</strong><br/>
				<input type="text" name="amount" class="" value="<?php echo $amount;?>" />
			</div><!-- .nickname -->
                        <div class="clear"></div>
                        <div class="nickname">
				<strong>图片</strong><br/>
                                <span>该商品原图片：<img src="images/product/<?php echo $_GET['product_id'];?>.jpg" height="200" width="200"/></span><br/>
                                <span>请选择新图片:</span><br/>
                                <input type="file" name="pic" class="" value="" />
			</div><!-- .nickname -->
                        <div class="clear"></div>
                        <div class="nickname"><strong>详细信息</strong><br/>
				<textarea name="description" style="width:600px;height:150px;margin-left:20px;"><?php echo nl2br($description);?></textarea>
			</div>
                        <div class="clear"></div>

                         
		
			<input type="submit" value="提交" name="up"/>
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
