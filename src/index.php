<?php
session_start();
include 'include/conn.php';
include 'include/index_class.php';
?>
<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
<meta charset="UTF-8">

<meta name="description" content="">
<meta name="keywords" content="">

<title>首页</title>

<link href="css/style.css" media="screen" rel="stylesheet"
	type="text/css">
<link href="css/grid.css" media="screen" rel="stylesheet"
	type="text/css">

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/html5.js"></script>
<script src="js/jflow.plus.js"></script>
<script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
<script type="text/javascript" src="js/jquery.goup.min.js"></script>

  <script src="js/jquery.lazyload.min.js"></script>
  <script type="text/javascript" charset="utf-8">
  $(function() {
     $("img.lazy").lazyload({
         effect : "fadeIn"
     });
  });
  </script>

<script>
            $(document).ready(function() {
                $("#myController").jFlow({
                    controller: ".control", // must be class, use . sign
                    slideWrapper: "#jFlowSlider", // must be id, use # sign
                    slides: "#slider", // the div where all your sliding divs are nested in
                    selectedWrapper: "jFlowSelected", // just pure text, no sign
                    width: "994px", // this is the width for the content-slider
                    height: "300px", // this is the height for the content-slider
                    duration: 400, // time in miliseconds to transition one slide
                    prev: ".slidprev", // must be class, use . sign
                    next: ".slidnext", // must be class, use . sign
                    auto: true
                });
            });
        </script>
<script>
    $(function() {
      $('#list_product1').carouFredSel({
        prev: '#prev_c1',
        next: '#next_c1',
        auto: false
      });
          $('#list_product2').carouFredSel({
        prev: '#prev_c2',
        next: '#next_c2',
        auto: false
      });
          $('#list_product3').carouFredSel({
        prev: '#prev_c3',
        next: '#next_c3',
        auto: false
      });
          $('#list_product4').carouFredSel({
        prev: '#prev_c4',
        next: '#next_c4',
        auto: false
      });
          $('#list_product5').carouFredSel({
        prev: '#prev_c5',
        next: '#next_c5',
        auto: false
      });
          $('#list_product6').carouFredSel({
        prev: '#prev_c6',
        next: '#next_c6',
        auto: false
      });
          $('#list_product7').carouFredSel({
        prev: '#prev_c7',
        next: '#next_c7',
        auto: false
      });
          $('#list_product8').carouFredSel({
        prev: '#prev_c8',
        next: '#next_c8',
        auto: false
      });
          $('#list_product9').carouFredSel({
        prev: '#prev_c9',
        next: '#next_c9',
        auto: false
      });
          $('#list_product10').carouFredSel({
        prev: '#prev_c10',
        next: '#next_c10',
        auto: false
      });
          $('#list_product11').carouFredSel({
        prev: '#prev_c11',
        next: '#next_c11',
        auto: false
      });
      $(window).resize();
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
<!-- 
<div class="slidprev"><span>Prev</span></div>
<div class="slidnext"><span>Next</span></div>
 -->
<div id="slider">
<div id="slide1"><img src="images/content/slide1.jpg" alt="" title="" />

</div>

<div id="slide2"><img src="images/content/slide2.jpg" alt="" title="" />

</div>

<div id="slide3"><img src="images/content/slide3.jpg" alt="" title="" />

</div>
</div>
<!-- .slider -->
<div id="myController">
<div class="control"><span>1</span></div>
<div class="control"><span>2</span></div>
<div class="control"><span>3</span></div>
</div>


</div>
<!-- .grid_12 --></div>
<!-- .container_12 -->

<div class="clear"></div>

<section id="main" class="home">
<div class="container_12">

    <?php 
for($i=1;$i<12;$i++){
    
?>
<div class="carousel">
<div class="c_header">
<div class="grid_10">
<h2><?php echo $class_name[$i];?></h2>
</div>
<!-- .grid_10 -->
<div class="grid_2"><a id="<?php echo $next_c_n[$i];?>" class="next arows" href="#"><span>Next</span></a>
<a id="<?php echo $prev_c_n[$i];?>" class="prev arows" href="#"><span>Prev</span></a></div>
<!-- .grid_2 --></div>
<!-- .c_header -->
<div class="list_carousel">
<ul id="<?php echo $list_product_n[$i];?>" class="list_product">
<?php
$sql = $sql_n[$i];
while ($re = mysql_fetch_array($sql)) {
	$name_[$i][] = $re['p_name'];
	$price_[$i][] = $re['p_price'];
	$id_[$i][] = $re['p_id'];
}
for ($j = 0; $j < 5; $j++) {?>
	<li class="">
	<div class="grid_3 product">
	<div class="prev"><a
		href="product_detail.php?id=<?php echo $id_[$i][$j];?>"><img
		class="lazy img-responsive" data-original="images/product/<?php echo $id_[$i][$j];?>.jpg" alt="" title="" /></a>
	</div>
	<!-- .prev -->
	<h3 class="title"><?php echo $name_[$i][$j];?></h3>
	<div class="cart">
	<div class="price">
	<div class="vert">
	<div class="price_new">￥<?php echo $price_[$i][$j];?></div>
	</div>
	</div>
	<a href="javascript:window.location.reload()" class="obn" title="刷新"></a>
	
        <a href="javascript:void(0)" onclick="location.href='action/fav_add.php?product_id=<?php echo $id_[$i][$j];?>'" class="like" title="添加到收藏"></a> 
       
	
        <a href="javascript:void(0)" onclick="location.href='action/cart_add.php?product_id=<?php echo $id_[$i][$j];?>'" class="bay" title="添加到购物车"></a></div>
		
	<!-- .cart --></div>
	<!-- .grid_3 --></li>
		<?php     }
		?>
</ul>
<!-- #list_product2 --></div>
<!-- .list_carousel --></div>
<!-- .carousel -->

<div class="clear"></div>


<?php
}
?>

<!-- #content_bottom --></div>
<!-- .container_12 -->
</section>
<!-- #main -->

<div class="clear"></div>
<!--GoUP DIV-->
<div id="goup"></div>
		<?php include 'include/footer.php'; ?>

</body>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</html>
