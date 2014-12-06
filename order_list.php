<?php
session_start();
include 'include/filter.php';
include 'include/conn.php';
$sql=mysql_query("select * from order_list where u_id='".$_SESSION['user_id']."'");
$num=mysql_num_rows($sql);
if(!$num){
         echo "<script>alert('您还没有订单!');history.go(-1);</script>";
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

        <title>订单列表</title>

      
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
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><span class="current">订单</span> </div>
    <!-- .breadcrumbs --> 
  </div>
  <!-- .grid_12 --> 
</div>
<!-- .container_12 -->


        <div class="clear"></div>

        <section id="main" class="entire_width">


            <div class="container_12">


                <div class="grid_12">
                    <h1 class="page_title">我的订单</h1>

                    <table class="order_list">
                        <tr>
                            <th class="num">序号</th>
                            <th class="bg id">订单号</th>
                            <th class="date">下单时间</th>
                            <th class="bg price">总金额</th>
                            <th class="status">订单状态</th>
                            <th class="bg close"> </th>
                        </tr>

                        <?php
                 
                        $msql = mysql_query("select * from order_list where u_id='".$_SESSION['user_id']."'");
                        while ($re = mysql_fetch_array($msql)) {
                           $order_id[]=$re['o_id'];
                           $order_date[]=$re['o_date'];
                           $order_price[]=$re['o_price'];
                           $order_status[]=$re['o_status'];                       
                           
				   
                        }
                                for ($i = 0; $i < count($order_id); $i++) {
                                    $num=$i+1;
									
if($order_status[$i]=="0"){
$order_status2[$i]="未付款";}						
elseif($order_status[$i]=="1"){
$order_status2[$i]="已付款";}
elseif($order_status[$i]=="2"){
$order_status2[$i]="已发货";}
elseif($order_status[$i]=="3"){
$order_status2[$i]="已成交";}	
									
									?>
                             <tr>
                            <td class="num"><?php echo $num;?></td>
                            <td class="bg id"><a href="order_view.php?order_id=<?php echo $order_id[$i];?>"><?php echo $order_id[$i];?></a></td>
                            <td class="date"> <?php echo $order_date[$i];?> </td>
                            <td class="bg price">￥<?php echo $order_price[$i];?></td>
                            <td class="status"><?php echo $order_status2[$i];?></td>
                            <td class="bg close"><a title="删除" class="close" href="action/order_delete.php?order_id=<?php echo $order_id[$i];?>" onclick="if(confirm('确实要删除此条记录吗？')) return true;else return false; "></a></td>
                        </tr>
                            <?php    }
                           
                     
                        
                            ?>


                        </table>
                       

                    </div><!-- .grid_12 -->

                    <div id="content_bottom">



                        <div class="clear"></div>
                    </div><!-- #content_bottom --><!-- .carousel -->

                </div><!-- .container_12 -->
            </section><!-- #main -->

      

            <?php include 'include/footer.php'; ?>

    </body>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
