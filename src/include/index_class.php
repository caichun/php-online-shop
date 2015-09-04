<?php
for($p=1;$p<12;$p++){

$list_product_n[$p]="list_product".$p;
    
$next_c_n[$p]="next_c".$p;

$prev_c_n[$p]="prev_c".$p;



$n=$p-1;
$sql_n[$p]=mysql_query("select * from product where p_class='$n' order by rand() limit 5");
$sql_n[1]=mysql_query("select * from product order by rand() limit 5");

}
$class_name=array("","您可能喜欢的商品","休闲零食","饼干/糕点","牛奶乳品","糖果/巧克力","饮料饮品","咖啡","厨房调料","方便素食","粮油/干货","保健品");

?>