<?php
include "redbird_upload.php";
$文件上传1 = new redbird_upload();
include "redbird_file.php";
$文件操作1 = new redbird_file();
include "redbird_wangluo.php";
$网络操作1 = new redbird_wangluo();
	if($网络操作1->取提交方式() != "POST" ){
		echo "请使用POST方式";
		return;
	}

	if($文件上传1->取错误代码() > 0 ){
		echo "出现错误";
		return;
	}

	echo $文件上传1->取文件类型() . "<br>";
	echo $文件上传1->取文件大小() . "<br>";
	echo $文件上传1->取文件名称() . "<br>";

	if($文件操作1->文件是否存在("upload/") == false ){
		$文件操作1->创建目录("upload/");
	}

	if($文件上传1->移动文件($文件上传1->取临时文件名称() ,"upload/" . $文件上传1->取文件名称()) == true ){
		echo "成功";
	}else{
		echo "失败";
	}


?>