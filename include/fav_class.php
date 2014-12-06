<?php
                               $favclass[0]= '<li><a href="product_list.php?class=1&class_2=1">肉干肉脯/豆干/熟食</a></li>';
                               $favclass[1]= '<li><a href="product_list.php?class=1&class_2=2">膨化食品</a></li>';
                                $favclass[2]= '<li><a href="product_list.php?class=1&class_2=3">鱿鱼丝/鱼干/海味即食</a></li>';
                                
                                $favclass[3]= '<li><a href="product_list.php?class=2&class_2=1">饼干</a></li>';
                               $favclass[4]= '<li><a href="product_list.php?class=2&class_2=2">威化</a></li>';
                               $favclass[5]= '<li><a href="product_list.php?class=2&class_2=3">传统糕点</a></li>';
                               $favclass[6]= '<li><a href="product_list.php?class=2&class_2=4">西式糕点</a></li>';
                                
                               $favclass[7]= '<li><a href="product_list.php?class=3&class_2=1">纯牛奶</a></li>';
                               $favclass[8]= '<li><a href="product_list.php?class=3&class_2=2">酸奶</a></li>';
                               $favclass[9]= '<li><a href="product_list.php?class=3&class_2=3">豆奶</a></li>';
                                
                               $favclass[10]= '<li><a href="product_list.php?class=4&class_2=1">巧克力</a></li>';
                               $favclass[11]= '<li><a href="product_list.php?class=4&class_2=2">糖果零食</a></li>';
                                
                               $favclass[12] ='<li><a href="product_list.php?class=5&class_2=1">水</a></li>';
                              $favclass[13]= '<li><a href="product_list.php?class=5&class_2=2">果汁</a></li>';
                               $favclass[14]= '<li><a href="product_list.php?class=5&class_2=3">碳酸饮料</a></li>';
                               $favclass[15] ='<li><a href="product_list.php?class=5&class_2=4">功能饮料</a></li>';
                               $favclass[16]= '<li><a href="product_list.php?class=5&class_2=5">乳品</a></li>';
                                
                               $favclass[17]= '<li><a href="product_list.php?class=6&class_2=1">速溶咖啡</a></li>';
                               $favclass[18]= '<li><a href="product_list.php?class=6&class_2=2">咖啡豆</a></li>';
                               $favclass[19]='<li><a href="product_list.php?class=6&class_2=3">咖啡伴侣</a></li>';
                                
                               $favclass[20]= '<li><a href="product_list.php?class=7&class_2=1">调味料</a></li>';
                               $favclass[21]= '<li><a href="product_list.php?class=7&class_2=2">调味油</a></li>';
                               $favclass[22]= '<li><a href="product_list.php?class=7&class_2=3">料酒</a></li>';
                                
                               $favclass[23]= '<li><a href="product_list.php?class=8&class_2=1">方便面</a></li>';
                               $favclass[24]= '<li><a href="product_list.php?class=8&class_2=2">罐头</a></li>';
                               $favclass[25]= '<li><a href="product_list.php?class=8&class_2=3">火腿肠</a></li>';
                               $favclass[26]= '<li><a href="product_list.php?class=8&class_2=4">其他速食</a></li>';
                                
                               $favclass[27]= '<li><a href="product_list.php?class=9&class_2=1">食用油</a></li>';
                               $favclass[28]= '<li><a href="product_list.php?class=9&class_2=2">米类</a></li>';
                               $favclass[29]= '<li><a href="product_list.php?class=9&class_2=3">粉丝</a></li>';
                                $favclass[30]='<li><a href="product_list.php?class=9&class_2=4">干货</a></li>';
                                
                                $favclass[31]='<li><a href="product_list.php?class=10&class_2=1">传统滋补</a></li>';
                                $favclass[32]='<li><a href="product_list.php?class=10&class_2=2">西洋滋补</a></li>';
                              $favclass_temp=array_rand($favclass,6);
                              for($i=0;$i<count($favclass_temp);$i++){
                                  echo $favclass[$favclass_temp[$i]];
                              }
                                ?>