<?php
session_start();
include 'include/conn.php';
?>
<!DOCTYPE HTML>
<html>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="UTF-8">

        <meta name="description" content="">
        <meta name="keywords" content="">

        <title>支付订单</title>

        
        <link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
        <link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">

        <script src="js/jquery-1.7.2.min.js" ></script>
        <script src="js/html5.js" ></script>
        <script src="js/jflow.plus.js"></script>
        <script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
        <script src="js/checkbox.js"></script>
        <script src="js/radio.js"></script>
        <script src="js/selectBox.js"></script>

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
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><a href="cart_view.php">购物车</a><span>&#8250;</span><span class="current">支付订单</span> </div>
    <!-- .breadcrumbs --> 
  </div>
  <!-- .grid_12 --> 
</div>
<!-- .container_12 -->
        <div class="clear"></div>

        <section id="main" class="entire_width">
            <div class="container_12">      
                <div id="content">
                    <div class="grid_12">
                        <h1 class="page_title">支付订单</h1>
                    </div><!-- .grid_12 -->

                    <!-- .grid_6 -->
<?php
$sql=mysql_query("select * from order_list where o_id='".$_GET['order_id']."'");
while ($row = mysql_fetch_array($sql)) {
$date=$row['o_date'];
$price=$row['o_price'];


}
?>
                    <div class="grid_6">
                        <form class="registed" action="action/pay.php" method="post">
                            <h2></h2>

                            <p>&nbsp;</p>
                            <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>" />
                            <div class="email">
                                <strong>订单号:</strong>
                                <p><?php echo $_GET['order_id'];?></p>
                                </div><!-- .email -->
                                
                                <div class="email">
                                <strong>生成日期:</strong>
                                <p><?php echo $date;?></p>
                                </div><!-- .email -->
                                
                                <div class="email">
                                <strong>总金额:</strong>
                                <p>￥<?php echo $price;?></p>
                                </div><!-- .email -->

                            <div class="email">
                                <strong>选择银行</strong><br/>
				<input class="niceRadio" type="radio" />
				<img src="images/bank/abc_1301.png" width="125" height="28">
<input class="niceRadio" type="radio" />
<img src="images/bank/bcom_1301.png" width="125" height="28"><br/>
<input class="niceRadio" type="radio" />
<img src="images/bank/boc_1301.png" width="125" height="28">
<input class="niceRadio" type="radio" />
<img src="images/bank/ccb_1301.png" width="125" height="28"><br/>
<input class="niceRadio" type="radio" />
<img src="images/bank/ceb_1301.png" width="125" height="28">
<input class="niceRadio" type="radio" />
<img src="images/bank/cib_1301.png" width="125" height="28"><br/>
<input class="niceRadio" type="radio" />
<img src="images/bank/cmb_1301.png" width="125" height="28">
<input class="niceRadio" type="radio" />
<img src="images/bank/cmbc_1301.png" width="125" height="28"><br/>
<input class="niceRadio" type="radio" />
<img src="images/bank/gdb_1301.png" width="125" height="28">
<input class="niceRadio" type="radio" />
<img src="images/bank/hxb_1301.png" width="125" height="28">

                          </div><!-- .password -->
                           <div class="email">
                                <strong>银行账户:</strong><br/>
                                <input type="text" name="username" value="" />
                             </div><!-- .email -->
                             <div class="email">
                                <strong>账户姓名:</strong><br/>
                                <input type="text" name="name" value="" />
                             </div><!-- .email -->
                             <div class="email">
                                <strong>账户密码:</strong><br/>
                                <input type="password" name="password" value="" />
                             </div><!-- .email -->
                            <div class="submit">										
                                <input type="submit" value="确认支付" name="submit"/>
                            </div><!-- .submit -->
                        </form><!-- .registed -->
                    </div><!-- .grid_6 -->
                </div><!-- #content -->

                <div class="clear"></div>
            </div><!-- .container_12 -->
        </section><!-- #main -->

        <div class="clear"></div>

        <?php include 'include/footer.php'; ?>

    </body>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</html>
