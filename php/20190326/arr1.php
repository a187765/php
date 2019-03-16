<?php 
header('content-type:text/html; charset=utf-8');
// js 获取到的元素是数组集合的话，不能直接操作

// 数组定义  array();
// 数组分为索引数组，关联数组
// 静态赋值
$arr1 = array('a'=>'red','b'=>true,'c'=>123);//关联数组

// $arr1['a'] = 'blue';
// echo $arr1['a'];
// 


// $a = 'red';

// $a = 'blue';

// echo $a;


















// exit;

$arr2 = array('red','blue','yellow');//索引数组
// echo $arr2[0];

// print_r($arr1);
// echo '<br>';





// 动态赋值
$arr3 = array();
$arr3['a'] = 1;
$arr3['b'] = 2;




// 二维数组
$arr4 = array(
	array(
		array('b','ccccc'),
		'b',
		'c'
		),
	'a',
	'b',
	3
	);

// echo $arr4[0][0][1];


// 快速的创建数组

$arr5 = range('a','c');

// var_dump(in_array('d',$arr5));
// exit;

// 获取数组的长度、大小、个数

// echo count($arr5);
/*echo '<ul>';
for($i=0; $i<count($arr5); $i++){
	echo "<li>{$arr5[$i]}</li>";
}
echo '</ul>';*/



$arr5 = range('a','c');
// array('a','b','c');

/*echo '<ul>';
foreach($arr5 as $v){
	echo "<li>{$v}</li>";
}
echo '</ul>';*/







// exit;
// pre($arr5);


$arr6 = array('a','b','c');

// unset($arr6[1]);

// echo $arr6[1];






// foreach(目标数组 AS 键=>值){  }
// foreach(目标数组 AS 值){  }

$arr7 = array(
	'a'=>'blue',
	'b'=>'red',
	'c'=>'yellow',
	'd'=>'green',
	);

$a = 1;
// 数组遍历
// foreach($arr7 as $key=>$value){
	// echo $key.'==='.$value;
	// echo '<br>';
	// $a++;
// }

// echo $a;


// 模拟数据的接口数据
$arr8 = array(
	array('id'=>1,'name'=>'王新圣','age'=>'18'),
	array('id'=>2,'name'=>'曾燕兵','age'=>'19'),
	array('id'=>3,'name'=>'田龙张','age'=>'17'),
	array('id'=>4,'name'=>'周花姐','age'=>'20'),
	);





/*foreach($arr8 as $value){
	foreach($value as $v){
		echo $v.'<br>';
	}
}*/


// 数组排序  字典序
$arr7 = array(
	'c'=>'yellow',
	'd'=>'green',
	'a'=>'blue',
	'b'=>'red',
	);

// 升序
// 按键升序 ksort();
// ksort($arr7);

// 按值升序 sort();
// sort($arr7);

// 降序
// 按键降序 krsort();
// krsort($arr7);

// 按值降序 rsort();
// rsort($arr7);

// pre($arr7);







// 把字符串转换成数组
// explode(delimiter, string)
$str = '1,2,3,4,5';

$arr = explode(',', $str);

// pre($arr);

// 把数组转换成字符串
// implode(glue, pieces)
$str = implode('*', $arr);

// echo $str;
// exit;


// 冒泡排序
$arr = array(225,220,43,155,562,70,55,150);

// 如何换位置
$box = 0;

$box = $arr[0];
$arr[0] = $arr[1];
$arr[1] = $box;

pre($arr);














function pre($con){
	echo '<pre>';
	print_r($con);
	echo '</pre>';
	exit;
}



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学员名单</title>
</head>
<body>
	<style>
	h1{
		background:red;
	}
	</style>
	<h1 align="center">高级分离术</h1>

	<style>
	table{
		background: blue;
	}
	</style>
	<table border="1" align="center" width="50%">
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>年龄</th>
		</tr>
		<?php foreach($arr8 as $v){ ?>
		<tr>
			<td><?php echo $v['id']; ?></td>
			<td><?php echo $v['name']; ?></td>
			<td><?php echo $v['age']; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>