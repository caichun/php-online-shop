<?php
session_start();
include 'include/filter.php';
include 'include/conn.php';
$sql=mysql_query("select * from favourite where u_id='".$_SESSION['user_id']."'");
$num=mysql_num_rows($sql);
if(!$num){
       echo "<script>alert('您还没有收藏!');history.go(-1);</script>";
     exit;
}
?>
<!DOCTYPE HTML>
<html>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="UTF-8">

        <meta name="description" content="">
        <meta name="keywords" content="">

        <title>收藏</title>


        <link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
        <link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">

        <script src="js/jquery-1.7.2.min.js" ></script>
        <script src="js/html5.js" ></script>
        <script src="js/jflow.plus.js" ></script>
        <script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
        <script src="js/checkbox.js"></script>
        <script src="js/radio.js"></script>
        <script src="js/selectBox.js"></script>
		<script src="js/general.js"></script>



    </head>
    <body>
        <?php include 'include/top.php'; ?>

        <div class="clear"></div>

        <?php include 'include/nav_bar.php'; ?>
        <div class="clear"></div>
<div class="container_12">
  <div class="grid_12">
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><span class="current">收藏</span> </div>
    <!-- .breadcrumbs --> 
  </div>
  <!-- .grid_12 --> 
</div>
<!-- .container_12 -->


        <div class="clear"></div>

        <section id="main" class="entire_width">
            <div class="container_12">
                <div class="grid_12">
                    <h1 class="page_title">收藏</h1>
                    <form name="edit" action="action/cart_quantity_edit.php" method="get">
                        <table class="favourite">
                            <tr>
                                <th class="images"></th>
                                <th class="bg id"><span class="edit">商品ID </span></th>
                                <th class="name">商品名称 </th>
                                <th class="bg price">单价</th>
                                <th class="fav_count">收藏人数</th>
                                <th class="bg remark_count">评论人数</th>
                                <th class="close"> </th>
                            </tr>

                            <?php
                            $sql = mysql_query("select * from favourite where u_id='" . $_SESSION['user_id'] . "'");
                            while ($re = mysql_fetch_array($sql)) {
                                $product_id[] = $re['p_id'];
                                $isql = mysql_query("select * from product where p_id='" . $re['p_id'] . "'");
                                while ($re_ = mysql_fetch_array($isql)) {
                                    $name[] = $re_['p_name'];
                                    $price[] = $re_['p_price'];
                                }
                               
                                $ysql = mysql_query("select count(*) from remark where p_id='" . $re['p_id'] . "'");
                                $row = mysql_fetch_array($ysql);
                                $remark_count[] = $row['count(*)'];

                                $zsql = mysql_query("select count(*) from favourite where p_id='" . $re['p_id'] . "'");
                                $row = mysql_fetch_array($zsql);
                                $fav_count[] = $row['count(*)'];
                                 
                              
                            }

                            for ($i = 0; $i < count($product_id); $i++) {
                                ?>

                                <tr>
                                    <td class="images"><a href="product_detail.php?id=<?php echo $product_id[$i]; ?>">
                                            <img src="images/product/<?php echo $product_id[$i]; ?>.jpg" alt="<?php echo $name[$i]; ?>"></a></td>
                                    <td class="bg id"><?php echo $product_id[$i]; ?></td>
                                    <td class="name"><?php echo $name[$i];?></td>
                                    <td class="bg price">￥<?php echo $price[$i]; ?></td>
                                    <td class="fav_count"><?php echo $fav_count[$i];?></td>
                                    <td class="bg remark_count"><?php echo $remark_count[$i]; ?></td>
                                    <td class="close"><a title="删除" class="close" href="action/fav_delete.php?product_id=<?php echo $product_id[$i];?>" onclick="if (confirm('确实要删除此条记录吗？'))
                                                return true;
                                            else
                                                return false;
                                                         "></a></td>
                                </tr>
                            <?php }
                            ?>

                        </table></form>
                </div><!-- .grid_12 -->

                <div id="content_bottom"><!-- .grid_4 -->

                    <div class="clear"></div>
                </div><!-- #content_bottom -->


            </div><!-- .container_12 -->
        </section><!-- #main -->

        <div class="clear"></div>

        <?php include 'include/footer.php'; ?>

    </body>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
