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

        <title>登录</title>

        
        <link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
        <link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">

        <script src="js/jquery-1.7.2.min.js" ></script>
        <script src="js/html5.js" ></script>
        <script src="js/jflow.plus.js"></script>
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
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><span class="current">登录</span> </div>
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
                        <h1 class="page_title">登录或者创建一个账户</h1>
                    </div><!-- .grid_12 -->

                    <div class="grid_6 new_customers">
                        <h2>新用户</h2>
                        <p>您可以创建一个新的账户</p>
                        <div class="clear"></div>
                        <button class="account" onclick="location.href = 'signup.php'">注册</button>
                    </div><!-- .grid_6 -->

                    <div class="grid_6">
                        <form class="registed" action="action/login.php" method="post">
                            <h2>已注册用户</h2>

                            <p>如果你已经注册，请登录.</p>

                            <div class="email">
                                <strong>用户名:</strong><br/>
                                <input type="text" name="username" class="" value="" />
                            </div><!-- .email -->

                            <div class="password">
                                <strong>密码:</strong><br/>
                                <input type="password" name="password" class="" value="" />
                            </div><!-- .password -->

                            <div class="remember">
                                <input class="niceCheck" type="checkbox" name="Remember_password" />
                                <span class="rem">记住密码</span>
                            </div><!-- .remember -->

                            <div class="submit">										
                                <input type="submit" value="登录" />
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
