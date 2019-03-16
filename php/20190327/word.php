<?php 
header('content-type:text/html; charset=utf-8');
// 作业

function pre($con){
	echo '<pre>';
	print_r($con);
	echo '</pre>';
}

$arr1 = array("A", "B", "C");
$arr2 = array("X", "Y", "Z");

foreach($arr2 as $v){
	$arr1[] = $v;
}

$arr = array();
for($i=count($arr1)-1; $i>=0; $i--){
	$arr[] = $arr1[$i];
}

// 冒泡排序  换位置   升序的排序

$arr = array(225,220,43,155,562,70,55,150);

// 判断 如果第一个大于第二个，我就要换位置
// 或者  不操作   8-1 == 7  0-6
for($a=0; $a<count($arr)-1; $a++){
	for($i=0; $i<count($arr)-1; $i++){
		if($arr[$i] > $arr[$i+1]){
			$box = $arr[$i];
			$arr[$i] = $arr[$i+1];
			$arr[$i+1] = $box;
		}
	}
}



// print_r($arr);


// 把数组
$test1= array(
	'id' => array(1,2,3,4),
	'name' => array('小米','魅族','苹果','锤子'),
	'price' => array('1999','1799','3999','3000')
);


foreach($test1 as $value){
	foreach($value as $k=>$v){
		$test2['id'.$k][] = $v; 
	}
}


// 重构成
/*$test2= array(
	'id0' => array(1,'小米','1999'),
	'id1' => array(2,'魅族','1799'),
	'id2' => array(3,'苹果','3999'),
	'id3' => array(4,'锤子','3000')
);*/

// $test2['id0'] = array(1,'小米','1999');
// $test2['id0'][] = 1; 
// $test2['id0'][] = '小米'; 
// $test2['id0'][] = '1999'; 

// $test2['id1'] = array(2,'魅族','1799');
// $test2['id2'] = array(3,'苹果','3999');
// $test2['id3'] = array(4,'锤子','3000');




pre($test2);


















 ?>