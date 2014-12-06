<?php
session_start();
include 'include/conn.php';
$t3 = $_GET["id"];
$isql=mysql_query("update product set p_click=p_click+1 where p_id=$t3");
$sql = mysql_query("select * from product where p_id=$t3");
while ($re = mysql_fetch_array($sql)) {
    $d_name = $re['p_name'];
    $d_price = $re['p_price'];
    $d_description = $re['p_desc'];
    $class = $re['p_class'];
    $sale=$re['p_sale'];
    $click=$re['p_click'];
    $amount=$re['p_amount'];
}
?>
<!DOCTYPE HTML>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<title>商品详细信息-<?php echo $d_name; ?></title>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
<link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/face.css" />
<script src="js/jquery-1.7.2.min.js" ></script>
<script src="js/html5.js" ></script>
<script src="js/jflow.plus.js" ></script>
<script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
<script src="js/checkbox.js"></script>
<script src="js/radio.js"></script>
<script src="js/selectBox.js"></script>
<script type="text/javascript" src="js/jquery.goup.min.js"></script>

<script>
            $(document).ready(function() {
                $("select").selectBox();
            });
        </script>
<script>
            $(document).ready(function() {
                $('#wrapper_tab a').click(function() {
                    if ($(this).attr('class') != $('#wrapper_tab').attr('class')) {
                        $('#wrapper_tab').attr('class', $(this).attr('class'));
                    }
                    return false;
                });
            });
        </script>
<!-- 表情  -->

<script type="text/javascript" src="js/face.js"></script>
</head>
<body>
<?php include 'include/top.php'; ?>
<div class="clear"></div>
<?php include 'include/nav_bar.php'; ?>
<div class="clear"></div>
<div class="container_12">
  <div class="grid_12">
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><a href="javascript:history.go(-1)">商品列表</a><span>&#8250;</span><span class="current">商品详细信息</span> </div>
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
        <h3>您可能关注的分类</h3>
        <nav class="left_menu">
          <ul>
            <?php include 'include/fav_class.php'; ?>
          </ul>
        </nav>
        <!-- .left_menu --> 
      </aside>
      <!-- #categories_nav --> 
      
      <!--<aside id="specials" class="specials">
                        <h3>热卖品</h3>

                        <ul>
                            <li>
                                <div class="prev">
                                    <a href="#"><img src="images/special1.png" alt="" title="" /></a>
                                </div>

                                <div class="cont">
                                    <a href="#">Honeysuckle Flameless Luminary Refill</a>
                                    <div class="prise">$75.00</div>
                                </div>
                            </li>

                            <li>
                                <div class="prev">
                                    <a href="#"><img src="images/special2.png" alt="" title="" /></a>
                                </div>

                                <div class="cont">
                                    <a href="#">Honeysuckle Flameless Luminary Refill</a>
                                    <div class="prise">$75.00</div>
                                </div>
                            </li>
                        </ul>
                    </aside>
                    --> 
      <!-- #specials --><!-- #newsletter_signup --><!-- #banners --> 
      
    </div>
    <!-- .sidebar -->
    
    <div id="content" class="grid_9">
      <h1 class="page_title"><?php echo "$d_name" ?></h1>
      <div class="product_page">
        <div class="grid_4 img_slid" id="products">
          <div class="preview slides_container">
            <div class="prev_bg"><img src="images/product/<?php echo $t3;?>.jpg" title="" alt="" width="300" height="300"></a> </div>
          </div>
          <!-- .prev --> 
          
        </div>
        <!-- .grid_4 -->
        
        <div class="grid_5">
          <div class="entry_content">
            <div class="review">
              <?php
                                    $ysql = mysql_query("select avg(r_price) avgP,avg(r_quality) avgQ from remark where p_id='$t3'");
                                    $re = mysql_fetch_array($ysql);
                                    $price_temp = $re['avgP'];
                                    $quality_temp = $re['avgQ'];
                                    $score = ($price_temp + $quality_temp) / 2;
                                                                        
                       if ($score == "0") {
                                        echo "<a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
                                    }
                                    elseif ($score >= "1"&&$score<"2") {
                                        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
                                    }
                                    elseif ($score >= "2"&&$score<"3") {
                                        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
                                    }
                                    elseif ($score >= "3"&&$score<"4") {
                                        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>
                                    <a href=\"#\"></a>";
                                    }
                                    elseif ($score >= "4"&&$score<"5") {
                                        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a href=\"#\"></a>";
                                    }
                                    elseif ($score == "5") {
                                        echo "<a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>
                                    <a class=\"plus\" href=\"#\"></a>";
                                    }
                                    ?>
              <span>
              <?php
                                        $xsql = mysql_query("select count(*) from remark where p_id='$t3'");
                                        $re = mysql_fetch_array($xsql);
                                        echo $re['count(*)'];
                                        ?>
              条评论</span><span>综合评分<?php echo $score;?></span> 
              <!--<a class="add_review" href="#">添加评论</a>--> 
            </div>
            <p></p>
            <div class="ava_price">
              <div class="availability_sku"> 库存: <span><?php echo $amount;?></span>
                <div class="sku"> 点击量: <span><?php echo $click;?></span> </div>
                <div class="sku"> 销量: <span><?php echo $sale;?></span> </div>
              </div>
              <!-- .availability_sku -->
              
              <div class="price">
                <div class="price_new">￥<?php echo "$d_price"; ?></div>
              </div>
              <!-- .price --> 
            </div>
            <!-- .ava_price -->
            
            <div class="block_cart">
              <div class="obn_like">
                <?php 
if(isset($_SESSION['user_id'])){
$isql=mysql_query("select * from favourite where u_id='".$_SESSION['user_id']."' and p_id='$t3'");
$num=  mysql_num_rows($isql);
if($num){
    ?>
                
                  <input type="hidden" name="product_id" value="<?php echo $t3;?>" />
                  <span onmouseenter="this.innerHTML='<a href=action/fav_delete.php?product_id=<?php echo $t3;?>>取消此收藏</a>'" onmouseleave="this.innerHTML='已收藏'">已收藏</span>
               
                <?php }
else{?>
                
                  <div class="like"><a href="javascript:void(0)" onclick="location.href='action/fav_add.php?product_id=<?php echo $t3;?>'" class="like">添加到收藏</a></div>
               
                <?php }
}else{?>
                
                     <div class="like"><a href="javascript:void(0)" onclick="location.href='action/fav_add.php?product_id=<?php echo $t3;?>'" class="like">添加到收藏</a></div>
               
                <?php }?>
              </div>
              <form name="addtocart" method="get" action="action/cart_add.php">
                <div class="cart"> <a href="javascript:void(0)" onclick="addtocart.submit();" class="bay">加入购物车</a>
                  <input type="hidden" name="product_id" value="<?php echo $t3;?>"/>
                  <input type="text" name="quantity" class="number" value="1" />
                  <span>数量:</span> </div>
              </form>
              <div class="clear"></div>
            </div>
            <!-- .block_cart --> 
            
          </div>
          <!-- .entry_content --> 
          
        </div>
        <!-- .grid_5 -->
        
        <div class="clear"></div>
        <div class="grid_9" >
          <div id="wrapper_tab" class="tab1"> <a href="#" class="tab1 tab_link">详细信息</a> <a href="#" class="tab2 tab_link">评论</a> <!--暂未开放的功能<a href="#" class="tab3 tab_link">成交记录</a>-->
            <div class="clear"></div>
            <div class="tab1 tab_body">
              <p style="font-size:17px"><?php echo nl2br($d_description); ?></p>
              <div class="clear"></div>
            </div>
            <!-- .tab1 .tab_body -->
            
            <div class="tab2 tab_body">
              <h4>用户评论</h4>
              <ul class="comments">
                <?php
                                        $nsql = mysql_query("select * from remark where p_id='$t3'");
                                        $num = mysql_num_rows($nsql);
                                        if (!$num) {
                                            echo "该商品还没有评论";
                                        } else {
                                            while ($re = mysql_fetch_array($nsql)) {
                                                $date[] = $re['r_date'];
                                                $quality[] = $re['r_quality'];
                                                $price[] = $re['r_price'];
                                                //$text[] = $re['r_text'];
												$text[]= preg_replace("/\[em_([0-9]*)\]/","<img src=\"images/face/$1.gif\"/>",$re['r_text']);

                                                $msql = mysql_query("select * from users where u_id='" . $re['u_id'] . "'");
                                                while ($re_ = mysql_fetch_array($msql)) {
                                                    $username[] = $re_['u_name'];
                                                }
                                            }
                                            for ($i = 0; $i < count($date); $i++) { ?>
                <li>
                  <div class="autor"><?php echo $username[$i];?></div>
                  ,
                  <time datetime="2012-11-03"><?php echo $date[$i];?></time>
                  <div class="evaluation">
                  <div class="quality">
                    <?php    if ($quality[$i] == "1") {
                                                    echo "<strong>质量</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a  href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                } elseif ($quality[$i] == "2") {
                                                    echo "<strong>质量</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                } elseif ($quality[$i] == "3") {
                                                    echo "<strong>质量</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                } elseif ($quality[$i] == "4") {
                                                    echo "<strong>质量</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                } elseif ($quality[$i] == "5") {
                                                    echo "<strong>质量</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                </div>";
                                                }
                                                echo "<div class=\"price\">";

                                                if ($price[$i] == "1") {
                                                    echo "<strong>价格</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                }
                                                if ($price[$i] == "2") {
                                                    echo "<strong>价格</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                } elseif ($price[$i] == "3") {
                                                    echo "<strong>价格</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                } elseif ($price[$i] == "4") {
                                                    echo "<strong>价格</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a href=\"#\"></a>
                                                </div>";
                                                } elseif ($price[$i] == "5") {
                                                    echo "<strong>价格</strong>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                    <a class=\"plus\" href=\"#\"></a>
                                                </div>";
                                                }
                                                ?>
                    <div class="clear"></div>
                  </div>
                  <!-- .evaluation -->
                  <p><?php echo $text[$i];?></p>
                </li>
                <?php   }
                                        }
                                        ?>
              </ul>
              <!-- .comments -->
              
              <form class="add_comments" name="addremark" method="post" action="action/remark_add.php">
                <h4>添加评论</h4>
                <div class="evaluation">
                  <div class="quality"> <strong>质量</strong>
                    <input class="niceRadio" type="radio" name="quality" value="1" />
                    <span class="eva_num">1</span>
                    <input class="niceRadio" type="radio" name="quality" value="2" />
                    <span class="eva_num">2</span>
                    <input class="niceRadio" type="radio" name="quality" value="3" />
                    <span class="eva_num">3</span>
                    <input class="niceRadio" type="radio" name="quality" value="4" />
                    <span class="eva_num">4</span>
                    <input class="niceRadio" type="radio" name="quality" value="5" />
                    <span class="eva_num">5</span> </div>
                  <div class="price"> <strong>价格</strong>
                    <input class="niceRadio" type="radio" name="price" value="1" />
                    <span class="eva_num">1</span>
                    <input class="niceRadio" type="radio" name="price" value="2" />
                    <span class="eva_num">2</span>
                    <input class="niceRadio" type="radio" name="price" value="3" />
                    <span class="eva_num">3</span>
                    <input class="niceRadio" type="radio" name="price" value="4" />
                    <span class="eva_num">4</span>
                    <input class="niceRadio" type="radio" name="price" value="5" />
                    <span class="eva_num">5</span> </div>
                  <div class="clear"></div>
                </div>
                <!-- .evaluation -->
                
                <div class="clear"></div>
                <input type="hidden" name="product_id" value="<?php echo $t3;?>" />
                <div class="text_review"> <strong>评论内容</strong><br/>
                  <textarea name="text" id="saytext"></textarea>
                  <span class="emotion">表情</span> </div>
                <!-- .text_review -->
                <input type="submit" value="提交" />
              </form>
              <!-- .add_comments -->
              
              <div class="clear"></div>
            </div>
            <!-- .tab2 .tab_body -->
           <!--   暂未开放的功能
            <div class="tab3 tab_body">
              <h4>Custom Tab</h4>
              <div class="clear"></div>
            </div>
			-->
            <!-- .tab3 .tab_body -->
            <div class="clear"></div>
          </div>
          ​<!-- #wrapper_tab -->
          <div class="clear"></div>
        </div>
        <!-- .grid_9 -->
        
        <div class="clear"></div>
        <div class="related">
          <div class="c_header">
            <div class="grid_7">
              <h2>同类产品</h2>
            </div>
            <!-- .grid_7 -->
            
            <div class="grid_2"></div>
            <!-- .grid_2 --> 
          </div>
          <!-- .c_header -->
          
          <div class="list_carousel">
            <ul id="list_product" class="list_product">
              <?php
$sql = mysql_query("select * from product where p_class='$class' order by rand() limit 3");
while ($re = mysql_fetch_array($sql)) {
    $name_1[] = $re['p_name'];
    $price_1[] = $re['p_price'];
    $id_1[] = $re['p_id'];
}
for ($i = 0; $i < 3; $i++) { ?>
              <li class="">
                <div class="grid_3 product">
                  <div class="prev"> <a href="product_detail.php?id=<?php echo $id_1[$i];?>"><img src="images/product/<?php echo $id_1[$i];?>.jpg" alt="" title="" /></a> </div>
                  <!-- .prev -->
                  <h3 class="title"><?php echo $name_1[$i];?></h3>
                  <div class="cart">
                    <div class="price">
                      <div class="vert">
                        <div class="price_new">￥<?php echo $price_1[$i];?></div>
                      </div>
                    </div>
                    <a href="javascript:window.location.reload()" class="obn" title="刷新"></a>
                    
                
                      <a href="javascript:void(0)" onclick="location.href='action/fav_add.php?product_id=<?php echo $id_1[$i];?>'" class="like" title="添加到收藏"></a>
                    
                    
                      
                      <a href="javascript:void(0)" onclick="location.href='action/cart_add.php?product_id=<?php echo $id_1[$i];?>'" class="bay" title="添加到购物车"></a>
                    
                  </div>
                  <!-- .cart --> 
                </div>
                <!-- .grid_3 --> 
              </li>
              <?php }
?>
            </ul>
            <!-- #list_product --> 
          </div>
          <!-- .list_carousel --> 
        </div>
        <!-- .carousel --> 
      </div>
      <!-- .product_page -->
      <div class="clear"></div>
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
