<?php
include "redbird_wangluo.php";
$网络操作1 = new redbird_wangluo();
	$网络操作1->设置header("Cache-Control: no-cache");
	$网络操作1->设置cookie("TestCookie","TestValue",3600);

	if($网络操作1->取提交方式() == "GET" ){
		$get= $网络操作1->取get数据("test");
		echo $get . "</br>";
		if($get == "a" ){
			echo "get参数正确" . "</br>";
		}else{
			echo "get参数错误" . "</br>";
		}
	}else{
		$post= $网络操作1->取post数据("test2");
		echo $post . "</br>";
		if($post == "b" ){
			echo "post参数正确" . "</br>";
		}else{
			echo "post参数错误" . "</br>";
		}
	}
?>