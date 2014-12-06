
<div class="container_12">
    <div id="top">
        <div class="grid_3"><!-- .phone_top -->
        </div><!-- .grid_3 -->

        <div class="grid_6">
            <div class="welcome">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "欢迎您游客， 您可以  <a href=\"login.php\">登录</a>或<a href=\"signup.php\">创建一个账户</a>";
                } else {
                    echo "欢迎您，";
                    echo $_SESSION['username'];
                    echo " ";
                    echo "<a href=\"action/logout.php\">退出</a>";
                     $sql=mysql_query("select * from users where u_id='".$_SESSION['user_id']."'");
  while($re=mysql_fetch_array($sql)){
  $isadmin=$re['u_isadmin'];
  }
  if($isadmin=="1"){
      echo " ";echo "您好，管理员";echo " ";
      echo "<a href=\"admin_index.php\">进入管理后台</a>";
  }
                }
                ?>
            </div><!-- .welcome -->
        </div><!-- .grid_6 -->


    </div><!-- #top -->

    <div class="clear"></div>

    <header id="branding">
        <div class="grid_3">
            <hgroup>
                <h1 id="site_logo" ><a href="index.php" title=""><img src="images/logo.png" /></a></h1>
                <h2 id="site_description">Campus Online food supermarket</h2>
            </hgroup>
        </div><!-- .grid_3 -->

        <div class="grid_3">
            <form class="search" method="get" action="search.php">
                <input type="text" name="word" class="entry_form" value="" placeholder="搜索..."/>
            </form>
        </div><!-- .grid_3 -->

        <div class="grid_6">
            <ul id="cart_nav">
                <li>
                    <a class="cart_li" href="cart_view.php">购物车 <span></span></a>
                    <ul class="cart_cont">
                        <li class="no_border"><p>最近添加的商品</p></li>
                        <?php
                        if (!isset($_SESSION['user_id'])) {
                            echo "没有用户登录，无法查看购物车";
                        } else {
                            $sql = mysql_query("select * from cart where u_id='" . $_SESSION['user_id'] . "'");
                            $num = mysql_num_rows($sql);
                            if (!$num) {
                                echo "购物车没有商品";
                            } else {
                                while ($re = mysql_fetch_array($sql)) {
                                    $cart_product_id[] = $re['p_id'];
                                    $cart_quantity[] = $re['c_quantity'];
                                  
                                    $nsql = mysql_query("select * from product where p_id='".$re['p_id']."'");
                                        while ($re_ = mysql_fetch_array($nsql)) {
                                        $cart_name[] = $re_['p_name'];
                                        $cart_price[] = $re_['p_price'];
                                    }
									
							}
            for ($i = 0; $i < count($cart_product_id); $i++) {?>

       <li>
       <a href="product_detail.php?id=<?php echo $cart_product_id[$i];?>" class="prev_cart">
        <div class="cart_vert">
        <img src="images/product/<?php echo $cart_product_id[$i];?>.jpg" alt="" title="" /></div></a>
           <div class="cont_cart"><h4><?php echo $cart_name[$i];?></h4>
             <div class="price"><?php echo $cart_quantity[$i];?> x￥<?php echo $cart_price[$i];?></div>
                  </div>
                  <a title="删除" class="close" href="action/cart_product_delete.php?product_id=<?php echo $cart_product_id[$i];?>" onclick="if(confirm('确实要删除此条记录吗？')) return true;else return false; "></a>
                  <div class="clear"></div>
                  </li>
                             <?php       }
                                } ?>
                                
                          <li class="no_border">
                            <a href="cart_view.php" class="view_cart">查看购物车</a>
                            <a href="order_list.php" class="checkout">查看订单</a></li>
                      
                             <?php   }
                      
							
                        
                        ?>



                    </ul>
                </li>
            </ul>

            <nav class="private">
                <ul>
                    <li><a href="account.php">账户</a></li>
                    <li class="separator">|</li>
                    <li><a href="favourite.php">收藏</a></li>
                    <li class="separator">|</li>
                    <li><a href="order_list.php">订单</a></li>
                    <li class="separator">|</li>
                    <li><a href="remark.php">评论</a></li>
                </ul>
            </nav><!-- .private -->
        </div><!-- .grid_6 -->
    </header><!-- #branding -->
</div><!-- .container_12 -->