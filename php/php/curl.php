<?php
include "redbird_curl.php";
$curl操作1 = new redbird_curl();
	$curl操作1->初始化();
	echo $curl操作1->取网页源码("http://127.0.0.1/index2.php?test=a");
	echo "</br>";
	echo $curl操作1->发送网络数据("http://127.0.0.1/index2.php","test2=b");
	echo "</br>";
	echo $curl操作1->取网页源码("http://www.baidu.com");
	$curl操作1->关闭();
?>