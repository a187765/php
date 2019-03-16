<?php 
echo '<pre>';
print_r($_FILES);
echo '</pre>';

	print_r($_POST);
if($_POST){
	echo '真';
	$tmp = $_FILES['upload']['tmp_name'];
	copy($tmp,'123.jpg');
}else{
	echo 'jiaaaaa';
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
	<!-- 文件上传需要注意的事项： -->
	<!-- 1  提交模式必须是post -->
	<!-- 2  要有上传的控件  enctype="multipart/form-data" -->
	<!-- 3  文件上传的数据不在POST  在$_FILES里面 -->
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="hid" value="123">
		<input type="file" name="upload" id=""><br>
		<input type="submit" value="上传文件">
	</form>
</body>
</html>