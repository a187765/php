<?php 
include('function.php');

$filename = "data.txt";
$farr = file($filename);

$con = array();
foreach($farr as $v){
	$con[] = explode('||', $v);  //把字符串转换成数组
}

// $carr1 = explode('||', $farr[0]);
// $carr2 = explode('||', $farr[1]);
// $carr3 = explode('||', $farr[2]);
// $arr = array($carr1,$carr2,$carr3);

// pre($con);



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
</head>
<body>
	<p><a href="form.php">返回</a></p>
	<table border="1" width="80%" align="center">
		<tr>
			<th>用户名</th>
			<th>密码</th>
			<th>性别</th>
			<th>注册时间</th>
		</tr>
		<?php foreach($con as $v){ ?>
		<tr>
			<td><?php echo $v[0]; ?></td>
			<td><?php echo $v[1]; ?></td>
			<td><?php echo $v[2]==1?'男':'女'; ?></td>
			<td><?php echo date('Y-m-d H:i:s',intval($v[3])); ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>