<?php



if($t1 == "0") {
echo "所有商品";
    }
elseif ($t1 == "1") {
	echo "休闲零食";
	if ($t2 == "1") {
		echo "-肉干肉脯/豆干/熟食";
	} elseif ($t2 == "2") {
		echo "-膨化食品";
	} elseif ($t2 == "3") {
		echo "-鱿鱼丝/鱼干/海味即食";
	}
} elseif ($t1 == "2") {
	echo "饼干/糕点";
	if ($t2 == "1") {
		echo "-饼干";
	}
	elseif($t2=="2"){
		echo "-威化";
	}
	elseif($t2=="3"){
		echo "-传统糕点";
	}
	elseif($t2=="4"){
		echo "-西式糕点";
	}
}
elseif ($t1 == "3") {
	echo "牛奶乳品";
	if ($t2 == "1") {
		echo "-纯牛奶";
	}
	elseif($t2=="2"){
		echo "-酸奶";
	}
	elseif($t2=="3"){
		echo "-豆奶";
	}
	
}
elseif ($t1 == "4") {
	echo "糖果/巧克力";
	if ($t2 == "1") {
		echo "-巧克力";
	}
	elseif($t2=="2"){
		echo "-糖果零食";
	}
	
}
elseif ($t1 == "5") {
	echo "饮料饮品";
	if ($t2 == "1") {
		echo "-水";
	}
	elseif($t2=="2"){
		echo "-果汁";
	}
	elseif($t2=="3"){
		echo "-碳酸饮料";
	}
	elseif($t2=="4"){
		echo "-功能饮料";
	}
	elseif($t2=="5"){
		echo "-乳品";
	}
}
elseif ($t1 == "6") {
	echo "咖啡";
	if ($t2 == "1") {
		echo "-速溶咖啡";
	}
	elseif($t2=="2"){
		echo "-咖啡豆";
	}
	elseif($t2=="3"){
		echo "-咖啡伴侣";
	}
	
}
elseif ($t1 == "7") {
	echo "厨房调料";
	if ($t2 == "1") {
		echo "-调味料";
	}
	elseif($t2=="2"){
		echo "-调味油";
	}
	elseif($t2=="3"){
		echo "-料酒";
	}
	
}
elseif ($t1 == "8") {
	echo "方便速食";
	if ($t2 == "1") {
		echo "-方便面";
	}
	elseif($t2=="2"){
		echo "-罐头";
	}
	elseif($t2=="3"){
		echo "-火腿肠";
	}
	elseif($t2=="4"){
		echo "-其他速食";
	}
}
elseif ($t1 == "9") {
	echo "粮油/干货";
	if ($t2 == "1") {
		echo "-食用油";
	}
	elseif($t2=="2"){
		echo "-米类";
	}
	elseif($t2=="3"){
		echo "-粉丝";
	}
	elseif($t2=="4"){
		echo "-干货";
	}
}
elseif ($t1 == "10") {
	echo "保健品";
	if ($t2 == "1") {
		echo "-传统滋补";
	}
	elseif($t2=="2"){
		echo "-西洋滋补";
	}
	
}
?>