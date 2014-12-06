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

  <title>管理后台主页</title>

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
	      <a href="index.php">首页</a><span>&#8250;</span><span class="current">管理后台</span>
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
	      <h1 class="page_title">管理后台主页</h1>
<?php
function getSystem(){
$sys = $_SERVER['HTTP_USER_AGENT'];
if(stripos($sys, "NT 6.1"))
   $os = "Windows 7";
elseif(stripos($sys, "NT 6.0"))
   $os = "Windows Vista";
elseif(stripos($sys, "NT 5.1"))
   $os = "Windows XP";
elseif(stripos($sys, "NT 5.2"))
   $os = "Windows Server 2003";
elseif(stripos($sys, "NT 5"))
   $os = "Windows 2000";
elseif(stripos($sys, "NT 4.9"))
   $os = "Windows ME";
elseif(stripos($sys, "NT 4"))
   $os = "Windows NT 4.0";
elseif(stripos($sys, "98"))
   $os = "Windows 98";
elseif(stripos($sys, "95"))
   $os = "Windows 95";
elseif(stripos($sys, "Mac"))
   $os = "Mac";
elseif(stripos($sys, "Linux"))
   $os = "Linux";
elseif(stripos($sys, "Unix"))
   $os = "Unix";
elseif(stripos($sys, "FreeBSD"))
   $os = "FreeBSD";
elseif(stripos($sys, "SunOS"))
   $os = "SunOS";
elseif(stripos($sys, "BeOS"))
   $os = "BeOS";
elseif(stripos($sys, "OS/2"))
   $os = "OS/2";
elseif(stripos($sys, "PC"))
   $os = "Macintosh";
elseif(stripos($sys, "AIX"))
   $os = "AIX";
else
   $os = "未知操作系统";
  
return $os;
}

// --------------------------------------------------
// 分析返回用户网页浏览器名称
// --------------------------------------------------
function getBrowser(){
$sys = $_SERVER['HTTP_USER_AGENT'];
if(stripos($sys, "NetCaptor") > 0)
   $exp = "NetCaptor";
elseif(stripos($sys, "Firefox/") > 0){
   preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
   $exp = "Mozilla Firefox ".$b[1];
}elseif(stripos($sys, "MAXTHON") > 0){
   preg_match("/MAXTHON\s+([^;)]+)+/i", $sys, $b);
   preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
   $exp = $b[0]." (IE".$ie[1].")";
}elseif(stripos($sys, "MSIE") > 0){
   preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
   $exp = "Internet Explorer ".$ie[1];
}elseif(stripos($sys, "Netscape") > 0)
   $exp = "Netscape";
elseif(stripos($sys, "Opera") > 0)
   $exp = "Opera";
else
   $exp = "未知浏览器";
  
return $exp;
}


$isql=mysql_query("select count(*) from product");
$re=mysql_fetch_array($isql);
$product_count=$re['count(*)'];

$isql=mysql_query("select count(*) from order_list");
$re=mysql_fetch_array($isql);
$order_count=$re['count(*)'];

$isql=mysql_query("select count(*) from favourite");
$re=mysql_fetch_array($isql);
$fav_count=$re['count(*)'];

$isql=mysql_query("select count(*) from remark");
$re=mysql_fetch_array($isql);
$remark_count=$re['count(*)'];
?>
		<div class="product_page">
			<div class="related">
				<div class="c_header"><!-- .grid_7 --><!-- .grid_2 -->
			   <table>
			        <tr>
			          <td width="27%" class="bg">操作系统</td>
			          <td width="33%"><?php echo getSystem();?></td>
			          <td width="27%" class="bg">总订单数</td>
			          <td width="13%"><?php echo $order_count;?></td>
		            </tr>
			        <tr>
			          <td class="bg">浏览器</td>
			          <td><?php echo getBrowser();?></td>
			          <td class="bg">总评论数</td>
			          <td><?php echo $remark_count;?></td>
		            </tr>
			        <tr>
			          <td class="bg">总商品数</td>
			          <td><?php echo $product_count;?></td>
			          <td class="bg">总收藏数</td>
			          <td><?php echo $fav_count;?></td>
		            </tr>
		          </table>
			      
        
	    
              </div><!-- .c_header -->

				
	   </div><!-- .product_page --></div><!-- #content -->

      <div class="clear"></div>

    </div><!-- .container_12 -->
  </section><!-- #main -->

  <div class="clear"></div>

<?php include 'include/footer.php'; ?>

</body>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
