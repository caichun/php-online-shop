<?php
session_start();
include 'include/conn.php';
include 'include/cut_str.php';
if ($_GET['word']) {
    $word = $_GET['word'];
} else {
        echo "<script>alert('没有输入搜索内容!');history.go(-1);</script>";
    exit;
}
?>
<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="images/favicon.html">
<meta name="description" content="">
<meta name="keywords" content="">
<title>搜索结果-<?php echo $_GET['word'];?></title>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.2.min.js" ></script>
<script src="js/html5.js" ></script>
<script src="js/jflow.plus.js" ></script>
<script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
<script src="js/checkbox.js"></script>
<script src="js/radio.js"></script>
<script src="js/selectBox.js"></script>
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
                $("select").selectBox();
            });
        </script>
</head>
<body>
<?php include 'include/top.php'; ?>
<div class="clear"></div>
<?php include 'include/nav_bar.php'; ?>
<div class="clear"></div>
<div class="container_12">
  <div class="grid_12">
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><span class="current">搜索结果</span> </div>
    <!-- .breadcrumbs --> 
  </div>
  <!-- .grid_12 --> 
</div>
<!-- .container_12 -->

<div class="clear"></div>
<section id="main">
  <div class="container_12">
  <div id="sidebar" class="grid_3">
    <aside id="categories_nav">
      <h3>分类</h3>
      <nav class="left_menu">
        <ul>
          <?php include 'include/fav_class.php'; ?>
        </ul>
      </nav>
      <!-- .left_menu --> 
    </aside>
    <!-- #categories_nav --><!-- #shop_by --> 
    
    <!-- <aside id="specials" class="specials">
                        <h3>热卖品</h3>

                        <ul>
                            <li>
                                <div class="prev">
                                    <a href="product_page.html"><img src="images/special1.png" alt="" title="" /></a>
                                </div>

                                <div class="cont">
                                    <a href="product_page.html">zzz</a>
                                    <div class="prise">$75.00</div>
                                </div>   
                            </li>

                            <li>
                                <div class="prev">
                                    <a href="product_page.html"><img src="images/special2.png" alt="" title="" /></a>
                                </div>

                                <div class="cont">
                                    <a href="product_page.html">zzz</a>
                                    <div class="prise">$75.00</div>
                                </div>   
                            </li>
                        </ul>
                    </aside>
                    --><!-- #specials --><!-- #newsletter_signup --> 
  </div>
  <!-- .sidebar -->
  
  <div id="content" class="grid_9">
    <h1 class="page_title">搜索结果（<?php echo $_GET['word'];?>）</h1>
    <div class="options">
      <div class="show"> 每页显示
        <select onchange="document.location.href=this.value;">
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=2" <?php if(isset($_GET['perpage'])){if($_GET['perpage']=="2"){echo "selected=\"selected\"";}}?>>2</option>
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=3" <?php if(isset($_GET['perpage'])){if($_GET['perpage']=="3"){echo "selected=\"selected\"";}}?>>3</option>
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=4" <?php if(isset($_GET['perpage'])){if($_GET['perpage']=="4"){echo "selected=\"selected\"";}}?>>4</option>
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=5" <?php if(isset($_GET['perpage'])){if($_GET['perpage']=="5"){echo "selected=\"selected\"";}}?>>5</option>
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=6" <?php if(!isset($_GET['perpage'])||$_GET['perpage']=="6"){echo "selected=\"selected\"";}?>>6</option>
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=8" <?php if(isset($_GET['perpage'])){if($_GET['perpage']=="8"){echo "selected=\"selected\"";}}?>>8</option>
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=10" <?php if(isset($_GET['perpage'])){if($_GET['perpage']=="10"){echo "selected=\"selected\"";}}?>>10</option>
          <option value="?word=<?php echo $word;?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>&perpage=12" <?php if(isset($_GET['perpage'])){if($_GET['perpage']=="12"){echo "selected=\"selected\"";}}?>>12</option>
        </select>
        条记录 </div>
      <!-- .show -->
      <div class="sort"> 按
        <select onchange="document.location.href=this.value;">
          <option value="?word=<?php echo $word;?>&sort=price<?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?>" <?php if(isset($_GET['sort'])){if($_GET['sort']=="price"){echo "selected=\"selected\"";}}?>>价格</option>
          <option value="?word=<?php echo $word;?>&sort=sale<?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?>" <?php if(isset($_GET['sort'])){if($_GET['sort']=="sale"){echo "selected=\"selected\"";}}?>>销量</option>
          <option value="?word=<?php echo $word;?>&sort=click<?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?>" <?php if(!isset($_GET['sort'])||$_GET['sort']=="click"){echo "selected=\"selected\"";}?>>点击量</option>
          <option value="?word=<?php echo $word;?>&sort=name<?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?>" <?php if(isset($_GET['sort'])){if($_GET['sort']=="name"){echo "selected=\"selected\"";}}?>>名称</option>
        </select>
        排序 </div>
      <!-- .sort --> 
    </div>
    <!-- .options -->
    
    <?php
 if(!isset($_GET['perpage'])){
                    	$perpagenum =6 ; //定义每页显示几条
                    }
                    else{
                    	$perpagenum=$_GET['perpage'];
                    }

$total = mysql_fetch_array(mysql_query("select count(*) from product where p_name like '%$word%'")); //查询数据库中一共有多少条数据   

$Total = $total[0];
$Totalpage = ceil($Total / $perpagenum); //上舍，取整   
if (!isset($_GET['page']) || !intval($_GET['page']) || $_GET['page'] > $Totalpage) {//page可能的四种状态   
    $page = 1;
} else {
    $page = $_GET['page']; //如果不满足以上四种情况，则page的值为$_GET['page']   
}
$startnum = ($page - 1) * $perpagenum; //开始条数   
?>
    <div class="listing_product">
      <?php
if(!isset($_GET['sort'])){
	$sql = mysql_query("select * from product where p_name like '%$word%' order by p_click desc limit $startnum,$perpagenum");
}
else{
$sort="p_".$_GET['sort'];                         
 $sql = mysql_query("select * from product where p_name like '%$word%' order by $sort desc limit $startnum,$perpagenum");

}
$num=mysql_num_rows($sql);
if(!$num){
 echo "<script>alert('未找到任何记录!');history.go(-1);</script>";
 exit;
}
while ($re = mysql_fetch_array($sql)) {
    $name[] = preg_replace("/($word)/i", "<font color=red><b>\\1</b></font>", $re['p_name']);
    $price[] = $re['p_price'];
    $id[] = $re['p_id'];
    $description[] = $re['p_desc'];

    $ysql = mysql_query("select avg(r_price) avgP,avg(r_quality) avgQ,count(*) from remark where p_id='" . $re['p_id'] . "'");
    $re_ = mysql_fetch_array($ysql);
    $price_temp[] = $re_['avgP'];
    $quality_temp[] = $re_['avgQ'];
    $remark_count[] = $re_['count(*)'];

    $zsql = mysql_query("select count(*) from favourite where p_id='" . $re['p_id'] . "'");
    $re = mysql_fetch_array($zsql);
    $fav_count[] = $re['count(*)'];
}
for ($i = 0; $i < count($name); $i++) {
    $score[$i] = ($price_temp[$i] + $quality_temp[$i]) / 2;
    ?>
      <div class="product_li">
        <div class="grid_3">
          <div class="prev"> <a href="product_detail.php?id=<?php echo $id[$i]; ?>"><img class="lazy img-responsive" data-original="images/product/<?php echo $id[$i]; ?>.jpg" alt="" title="" /></a> </div>
          <!-- .prev --> 
        </div>
        <!-- .grid_3 -->
        <div class="grid_4">
          <div class="entry_content"> <a href="product_detail.php?id=<?php echo $id[$i]; ?>">
            <h3 class="title"><?php echo $name[$i]; ?></h3>
            </a>
            <div class="review">
              <?php
    if ($score[$i] == "0") {
        echo "<a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
    } elseif ($score[$i] >= "1" && $score[$i] < "2") {
        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
    } elseif ($score[$i] >= "2" && $score[$i] < "3") {
        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
    } elseif ($score[$i] >= "3" && $score[$i] < "4") {
        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
    } elseif ($score[$i] >= "4" && $score[$i] < "5") {
        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>";
    } elseif ($score[$i] == "5") {
        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>";
    }
    ?>
              <span><?php echo $remark_count[$i]; ?> 条评论</span><span><?php echo $fav_count[$i]; ?> 人收藏</span></div>
            <p><?php echo utf8_substr($description[$i], 0, 40) . "..."; ?></p>
            <a class="more" href="product_detail.php?id=<?php echo $id[$i]; ?>">查看更多</a> </div>
          <!-- .entry_content --></div>
        <!-- .grid_4 -->
        <div class="grid_2">
          <div class="cart">
            <div class="price">
            
            
              <div class="price_new">￥<?php echo $price[$i]; ?></div>
              </div>
              <a href="javascript:void(0)" onclick="location.href='action/cart_add.php?product_id=<?php echo $id[$i];?>'" class="bay">添加到购物车</a>
          
            <a href="javascript:window.location.reload()" class="obn" title="刷新"></a> <a href="javascript:void(0)" onclick="location.href='action/fav_add.php?product_id=<?php echo $id[$i];?>'" class="like" title="添加到收藏"></a> </div>
          <!-- .cart --> 
        </div>
        <!-- .grid_2 --> 
      </div>
      <!-- .grid_2 -->
      <div class="clear"> </div>
      <?php }
?>
      
      <!-- .listing_product -->
      <?php
$per = $page - 1; //上一页   
$next = $page + 1; //下一页   
?>
      <div class="pagination">
        <ul>
          <?php if ($page == "1") { ?>
          <li class="prev"><span>&#8592;<span></li>
          <?php
                                                for ($n = 1; $n <= $Totalpage; $n++) {
                                                    if ($n == $page) {
                                                        ?>
          <li class="curent"><a href="?word=<?php echo $word;?>&page=<?php echo $n; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>"><?php echo $n; ?></a></li>
          <?php } else {
                                                        ?>
          <li><a href="?word=<?php echo $word;?>&page=<?php echo $n; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>"><?php echo $n; ?></a></li>
          <?php
                                                    }
                                                }
                                                if ($Totalpage == "1") {
                                                    ?>
          <li class="next"><span>&#8594;</span></li>
          <?php } else { ?>
          <li class="next"><a href="?word=<?php echo $word;?>&page=<?php echo $next; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>">&#8594;</a></li>
          <?php }
                                            } elseif ($page == $Totalpage) {
                                                ?>
          <li class="prev"><a href="?word=<?php echo $word;?>&page=<?php echo $per; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>">&#8592;</a></li>
          <?php for ($n = 1; $n <= $Totalpage; $n++) {
                                                    if ($n == $page) {
                                                        ?>
          <li class="curent"><a href="?word=<?php echo $word;?>&page=<?php echo $n; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>"><?php echo $n; ?></a></li>
          <?php } else { ?>
          <li><a href="?word=<?php echo $word;?>&page=<?php echo $n; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>"><?php echo $n; ?></a></li>
          <?php }
                                                }
                                                ?>
          <li class="next"><span>&#8594;</span></li>
          <?php } else { ?>
          <li class="prev"><a href="?word=<?php echo $word;?>&page=<?php echo $per; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>">&#8592;</a></li>
          <?php for ($n = 1; $n <= $Totalpage; $n++) {
                                                    if ($n == $page) {
                                                        ?>
          <li class="curent"><a href="?word=<?php echo $word;?>&page=<?php echo $n; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>"><?php echo $n; ?></a></li>
          <?php } else { ?>
          <li><a href="?word=<?php echo $word;?>&page=<?php echo $n; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>"><?php echo $n; ?></a></li>
          <?php }
    }
    ?>
          <li class="next"><a href="?word=<?php echo $word;?>&page=<?php echo $next; ?><?php if(isset($_GET['perpage'])){echo "&perpage=".$_GET['perpage']."";}?><?php if(isset($_GET['sort'])){echo "&sort=".$_GET['sort']."";}?>">&#8594;</a></li>
          <?php }
?>
        </ul>
      </div>
      <!-- .pagination --> 
      <br>
      <br>
      <br>
      <p class="pagination_info">每页显示 <?php echo $perpagenum; ?> 条记录（共 <?php echo $Total; ?> 条）</p>
      <p class="pagination_info">当前第 <?php echo $page; ?> 页（共 <?php echo $Totalpage; ?> 页）</p>
    </div>
    <!-- #content -->
    
    <div class="clear"></div>
  </div>
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
