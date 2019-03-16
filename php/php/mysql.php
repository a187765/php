<?php
	include "redbird_mysql.php";
	$mysql数据库1 = new redbird_mysql();
	include "redbird_wangluo.php";
	$网络操作1 = new redbird_wangluo();
	include "redbird_convert.php";
	if($网络操作1->取提交方式() != "POST" ){
		$返回结果 =  array("data"=>"请使用POST方式");
		echo 数组转json($返回结果);
		return;
	}
//($IP端口 为 文本型,$用户名 为 文本型,$密码 为 文本型,$数据库名称 为 文本型)
	$SQL语句= $网络操作1->取post数据("sql");
	$mysql数据库1->连接数据库("127.0.0.1:3306","root","1234567","mydb");
	echo $mysql数据库1->执行语句($SQL语句);
?>