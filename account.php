<?php
session_start();
include 'include/filter.php';
include 'include/conn.php';
?>
<!DOCTYPE HTML>
<html>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="UTF-8">

        <meta name="description" content="">
        <meta name="keywords" content="">

        <title>账户信息</title>

        
        <link href="css/style.css" media="screen" rel="stylesheet" type="text/css">
        <link href="css/grid.css" media="screen" rel="stylesheet" type="text/css">

        <script src="js/jquery-1.7.2.min.js" ></script>
        <script src="js/html5.js" ></script>
        <script src="js/jflow.plus.js"></script>
        <script src="js/jquery.carouFredSel-5.2.2-packed.js"></script>
        <script src="js/checkbox.js"></script>
        <script src="js/radio.js"></script>
        <script src="js/selectBox.js"></script>
        
        <script language="JavaScript" type="text/javascript" src="js/from_ck.js"></script>

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

       <div class="clear"></div>
<div class="container_12">
  <div class="grid_12">
    <div class="breadcrumbs"> <a href="index.php">首页</a><span>&#8250;</span><span class="current">账户信息</span> </div>
    <!-- .breadcrumbs --> 
  </div>
  <!-- .grid_12 --> 
</div>
<!-- .container_12 -->

       <section id="main" class="entire_width">
            <div class="container_12">      
                <div id="content">
                    <div class="grid_12">
                        <h1 class="page_title">账户信息</h1>
                    </div><!-- .grid_12 -->

                    <!-- .grid_6 -->
<?php
$sql=mysql_query("select * from users where u_id='".$_SESSION['user_id']."'");
while ($row = mysql_fetch_array($sql)) {
$date=$row['u_date'];
$email=$row['u_email'];
$phone=$row['u_phone'];

}
?>
                    <div class="grid_6">
                        <form class="registed" action="action/account_edit.php" method="post" name="formUser">
                            <h2>修改信息</h2>

                            <p>&nbsp;</p>

                            <div class="email">
                                <strong>用户名:</strong>
                                <p><?php echo $_SESSION['username'];?></p>
                                </div><!-- .email -->
                                
                                <div class="email">
                                <strong>注册日期:</strong>
                                <p><?php echo $date;?></p>
                                </div><!-- .email -->

                            <div class="password">
                                <strong>原密码:</strong><br/>
                                <input type="password" id="old_password" name="old_password" value="" /><SPAN 
                                       id=old_password_notice >*</SPAN>

                               </div><!-- .password -->
                            <div class="password">
                                <strong>新密码:</strong><br/>
                               <input type="password" id="password" name="password" onBlur="check_password(this)" 
                                       onkeyup="checkIntensity(this.value)" class="" value="" /><SPAN 
                                       id=password_notice >*</SPAN>
                                        <!--<TR>
                                    <TD><TABLE cellSpacing=0 cellPadding=1 width=50 border=0>
                                            <TBODY>
                                                <TR align=middle>
                                                    <TD id=pwd_lower width="33%">弱</TD>
                                                    <TD id=pwd_middle width="33%">中</TD>
                                                    <TD id=pwd_high width="33%">强</TD>
                                                </TR>
                                            </TBODY>
                                        </TABLE></TD>
                                </TR>-->
                            </div><!-- .password -->
                             <div class="password">
                                <strong>确认密码:</strong><br/>
                                <input type="password" id="confirm_password" name="confirm_password" onBlur="check_conform_password(this)" class="" value="" /> <SPAN id=conform_password_notice >*</SPAN>
                            </div><!-- .password -->
                            <div class="email">
                                <strong>email:</strong><br/>
                                <input name="email" id="email" onBlur="checkEmail(this)" type="text" class=""  value="<?php echo $email;?>" /><SPAN id=email_notice >*</SPAN>
                            </div><!-- .email -->
                            <div class="email">
                                <strong>手机:</strong><br/>
                                <input name="phone" type="text" class=""  value="<?php echo $phone;?>" />
                            </div><!-- .email -->
                            



                            <div class="submit">										
                                <input type="submit" value="确认修改 " />
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
