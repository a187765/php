<?php 
header('content-type:text/html; charset=utf-8');
include('function.php');
// echo 'get ==';
// print_r($_GET);

// echo '<hr>';

// echo 'post ==';
// print_r($_POST);

// 这里的代码是提交后才让它执行，所以我要先判断是否是提交动作
if($_POST){   //0  判断是否为提交
	// '这里是已提交的地方';

	// 1  先验证数据的真实性（暂时只能验证是否为空，和长度）
	if(!isset($_POST['username']) || empty($_POST['username'])){
		alert('请填写用户名');
	}
	if(!isset($_POST['password']) || empty($_POST['password'])){
		alert('请填写密码');
	}

	// 2  提交后我才获取数据
	$username = trim($_POST['username']);
	$password = md5($_POST['password']);
	$sex = $_POST['sex'];
	$time = time();  //时间戳
	$content = $username.'||'.$password.'||'.$sex.'||'.$time."\r\n";

	// 3  如果是注册的话，接下来就是把数据存到数据库
	$filename = "data.txt"; //当作数据库

	$fh = fopen($filename, 'a');  //打开
	$status = fwrite($fh, $content); //写文件
	fclose($fh); //关闭资源

	if($status){
		alert('添加成功','userlist.php');
	}else{
		alert('添加失败！！！');
	}

}






 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>表单处理</title>
</head>
<body>
	<!-- action="" 提交的地址 -->
	<!-- method="" 提交的方式  get  post -->
	<form action="" method="post">
		用户名：
		<input type="text" name="username" value=""><br>
		密码：
		<input type="password" name="password" value=""><br>
		性别：
		<input type="radio" name="sex" checked="checked" value="1" id="man">
		<label for="man">男</label>
		<input type="radio" name="sex" value="0" id="woman">
		<label for="woman">女</label>
		<br>
		<input type="submit" value="提交">
	</form>
</body>
</html>