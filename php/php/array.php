<?php
include "redbird_array.php";
	echo "一、索引型数组：" . "</br>";
	$测试数组 =  array("a","b","c");

	echo $测试数组[0] . "</br>";
	echo $测试数组[1] . "</br>";
	echo $测试数组[2] . "</br>";

	echo "用循环输出结果：" . "</br>";
	$计次= 0;
	while($计次 < 取成员数($测试数组)){
		echo $测试数组[$计次] . "</br>";
		$计次 = $计次 + 1;
	}


	echo "二、关联型数组：" . "</br>";
	$测试数组2 =  array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
	echo $测试数组2["Peter"] . "</br>";
	echo $测试数组2["Ben"] . "</br>";
	echo $测试数组2["Joe"] . "</br>";
	echo 搜索键名($测试数组2,"37") . "</br>";

	echo "用循环输出结果：" . "</br>";
	$全部键名 = 取全部键名($测试数组2);
	$计次2= 0;
	while($计次2 < 取成员数($全部键名)){
		$键名 = $全部键名[$计次2];
		echo $测试数组2[$键名] . "</br>";
		$计次2 = $计次2 + 1;
	}
?>