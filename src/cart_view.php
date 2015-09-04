<?php
session_start();
include 'include/filter.php';
include 'include/conn.php';
$sql=mysql_query("select * from cart where u_id='".$_SESSION['user_id']."'");
$num=mysql_num_rows($sql);
if(!$num){
       echo "<script>alert('购物车为空!');history.go(-1);</script>";
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

        <title>购物车</title>

        
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

        <section id="main" class="entire_width">
            <div class="container_12">
                <div class="grid_12">
                    <h1 class="page_title">购物车</h1>
                    <form name="edit" action="action/cart_quantity_edit.php" method="post">
                        <table class="cart_product">
                            <tr>
                                <th class="images"></th>
                                <th class="bg name">商品名称</th>
                                <th class="edit"> </th>
                                <th class="bg price">单价</th>
                                <th class="qty">数量</th>
                                <th class="bg subtotal">总价</th>
                                <th class="close"> </th>
                            </tr>

                            <?php
                            $_SESSION['cart_product_id']=serialize($cart_product_id);
                            for ($i = 0; $i < count($cart_product_id); $i++) {

                                $sum_price[$i] = $cart_quantity[$i] * $cart_price[$i];
                            }
                            $total_price = array_sum($sum_price);
                            $_SESSION['total_price']=$total_price;
                            for ($i = 0; $i < count($cart_product_id); $i++) { ?>

                             <tr>
                            <td class="images"><a href="product_detail.php?id=<?php echo $cart_product_id[$i];?>">
	<img src="images/product/<?php echo $cart_product_id[$i];?>.jpg" alt="<?php echo $cart_name[$i];?>"></a></td>
                            <td class="bg name"><?php echo $cart_name[$i];?></td>
                            <td class="edit"><a href="javascript:void(0)" onclick="javascript:edit.submit();">修改</a></td>
                            <td class="bg price">￥<?php echo $cart_price[$i];?></td>
                            <td class="qty"><input type="text" name="quantity_<?php echo $cart_product_id[$i];?>" value="<?php echo $cart_quantity[$i];?>" /></td>
                            <td class="bg subtotal">￥<?php echo $sum_price[$i];?></td>
                            <td class="close"><a title="删除" class="close" href="action/cart_product_delete.php?product_id=<?php echo $cart_product_id[$i];?>" onclick="if(confirm('确实要删除此条记录吗？')) return true;else return false; "></a></td>
                        </tr>
                        <?php    }
                           ?>
                            <tr>
                                <td colspan="7" class="cart_but">
                                     <!--<button class="continue" onclick="location.href="javascript:history.go(-1)""><span>icon</span>继续购物</button>
                                     -->
                                    <button class="update" onClick="this.form.submit()"><span>icon</span>更新购物车</button>

                                </td>
                            </tr>
                        </table></form>
                </div><!-- .grid_12 -->

                <div id="content_bottom">

                    <div class="grid_4">
                        <div class="bottom_block total">
                            <table class="subtotal">
                                <tr class="grand_total">
                                    <td>总价</td><td class="price">￥<?php echo $total_price; ?></td>
                                </tr>
                            </table>
                            <button class="checkout" onclick="location.href='order_create.php'">下一步</button>

                        </div><!-- .total -->
                    </div><!-- .grid_4 -->

                    <div class="clear"></div>
                </div><!-- #content_bottom -->


            </div><!-- .container_12 -->
        </section><!-- #main -->

        <div class="clear"></div>

<?php include 'include/footer.php'; ?>

    </body>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
