<?php 

include('function.php');

// get语法  地址后面加?键=值&键=值
// GET一般叫做 get传参数
// print_r($_GET['page']); //print_r() 是一个测试工具
// echo $_GET['b'];

// 文件系统

/*if(empty($_GET)){
	$path = '.';
	print_r($_GET);
}else{
	$path = $_GET['path'];
	print_r($_GET);
}*/



$path = empty($_GET) ? '.' : $_GET['path'];

$file = scandir($path);
// $file = scandir('..');
// $file = scandir('../20190321');





 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件系统</title>
</head>
<body>
<!-- get方式提交，就用GET获取 -->
<p><a href="?a=1&b=2">get方式</a></p>
	<table border="1" width="80%" align="center">
		<tr>
			<th>文件名</th>
			<th>文件类型</th>
			<th>文件大小</th>
			<th>创建时间</th>
			<th>最后修改时间</th>
		</tr>
		<?php foreach($file as $v){ ?>
		<?php if(is_dir($path.'/'.$v)){ ?>
		<tr>
			<td><a href="?path=<?php echo $path.'/'.$v ?>"><?php echo $v ?></a></td>
			<td>文件夹</td>
			<td></td>
			<td><?php echo date('Y-m-d H:i:s',filectime($path.'/'.$v)); ?></td>
			<td><?php echo date('Y-m-d H:i:s',filemtime($path.'/'.$v)); ?></td>
		</tr>
		<?php }else{ ?>
		<tr>
			<td><?php echo $v ?></td>
			<td><?php echo getextention($path.'/'.$v); ?></td>
			<td><?php echo getfilesize($path.'/'.$v); ?></td>
			<td><?php echo date('Y-m-d H:i:s',filectime($path.'/'.$v)); ?></td>
			<td><?php echo date('Y-m-d H:i:s',filemtime($path.'/'.$v)); ?></td>
		</tr>
		<?php } } ?>
	</table>
</body>
</html>