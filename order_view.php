<?php
session_start();
include 'include/conn.php';
include 'include/filter.php';
$sql=mysql_query("select * from order_list where o_id='".$_GET['order_id']."'");
$num=mysql_num_rows($sql);
if(!$num){
     echo "<script>alert('该订单不存在或已被删除!');history.go(-1);</script>";
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


                <div class="grid_12">
                    <h1 class="page_title">订单信息</h1>

                    <table class="order_detail">
                        <tr>
                            <th class="images"></th>
                            <th class="bg name">商品名称</th>
                            <th class="price">单价</th>
                            <th class="bg quantity">数量</th>
                            <th class="totalprice">总价</th>

                        </tr>

                        <?php
                 
                        $msql = mysql_query("select * from order_detail where o_id='".$_GET['order_id']."'");
                        while ($re = mysql_fetch_array($msql)) {
                            $order_product_id[] = $re['p_id'];
                            $order_quantity[] = $re['o_quantity'];

                            $lsql = mysql_query("select * from product where p_id='".$re['p_id']."'");
                            while ($re_ = mysql_fetch_array($lsql)) {
                                $order_product_name[] = $re_['p_name'];
                                $order_product_price[] = $re_['p_price'];
                                
                            }
                            
                        }
                         for ($i = 0; $i < count($order_product_id); $i++) {
                                $sum_price[] = array();
                                $sum_price[$i] = $order_quantity[$i] * $order_product_price[$i];
                            }
                                for ($i = 0; $i < count($order_product_id); $i++) { ?>
                               <tr>
                            <td class="images"><a href="product_detail.php?id=<?php echo $order_product_id[$i];?>"><img src="images/product/<?php echo $order_product_id[$i];?>.jpg" alt="<?php echo $order_product_name[$i];?>"></a></td>
                            <td class="bg name"><?php echo $order_product_name[$i];?></td>
                            <td class="price">￥<?php echo $order_product_price[$i];?></td>
                            <td class="bg quantity"><?php echo $order_quantity[$i];?></td>
                            <td class="totalprice">￥<?php echo $sum_price[$i];?></td>
                           
                        </tr>
                               <?php }
                           
                        
                        $qsql = mysql_query("select * from order_list where o_id='".$_GET['order_id']."'");
                        while ($re = mysql_fetch_array($qsql)) {
                            $order_name = $re['o_name'];
                            $order_address = $re['o_address'];
                            $order_phone = $re['o_phone'];
                            $order_ps = $re['o_ps'];
                            $order_date = $re['o_date'];
                            $order_price=$re['o_price'];
							$order_status=$re['o_status'];
                        }
						
						
						
						if($order_status=="0"){
$order_status2="未付款";}						
elseif($order_status=="1"){
$order_status2="已付款";}
elseif($order_status=="2"){
$order_status2="已发货";}
elseif($order_status=="3"){
$order_status2="已成交";}	
                            ?>


                        </table>
                        <table class="order_detail2">
                            <tr>
                                <th class="temp">收货人姓名</th>
                                <th class="bg temp2"><?php echo $order_name; ?></th>
                            </tr>
                            <tr>
                                <td class="temp">收货人地址</td>
                                <td class="bg temp2"><?php echo $order_address; ?></td>
                            </tr>
                            <tr>
                                <td class="temp">联系电话</td>
                                <td class="bg temp2"><?php echo $order_phone; ?></td>
                            </tr>
                            <tr>
                                <td class="temp">备注</td>
                                <td class="bg temp2"><?php echo $order_ps; ?></td>
                            </tr>
                            <tr>
                                <td class="temp">生成时间</td>
                                <td class="bg temp2"><?php echo $order_date; ?></td>
                            </tr>
							<tr>
                                <td class="temp">订单状态</td>
                                <td class="bg temp2"><?php echo $order_status2; ?></td>
                            </tr></table>

                    </div><!-- .grid_12 -->

                    <div id="content_bottom">



                        <div class="grid_4">
                            <div class="bottom_block total">
                                <table class="subtotal">
                                    <tr class="grand_total">
                                        <td>总价</td><td class="price">￥<?php echo $order_price;?></td>
                                    </tr>
                                </table>
                             <?php if($order_status=="0"){	?>						 
								<button class="checkout" onclick="location.href='pay.php?order_id=<?php echo $_GET['order_id'];?>'">下一步</button>
								<button class="checkout" onclick="location.href='action/order_delete.php?order_id=<?php echo $_GET['order_id'];?>'">撤销订单</button>
                                <?php }?>
								
								<?php if($order_status=="2"){		?>					 
								<button class="checkout" onclick="location.href='action/order_confirm.php?order_id=<?php echo $_GET['order_id'];?>'">确认收货</button>
                                <?php }?>
								
                                
                               </div><!-- .total -->
                        </div><!-- .grid_4 -->

                        <div class="clear"></div>
                    </div><!-- #content_bottom --><!-- .carousel -->

                </div><!-- .container_12 -->
            </section><!-- #main -->

      

            <?php include 'include/footer.php'; ?>

    </body>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
