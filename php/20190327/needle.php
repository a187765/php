<?php 
header('content-type:text/html; charset=utf-8');
// 指针的方式操作数组

$arr = array('a','b','c','d','e','d');

echo '<ul>';
	while($con = current($arr)){
		echo '<li>第 '.key($arr).' 个是 '.$con.'</li>';
		next($arr);
	}
echo '</ul>';





// next($arr);
// next($arr);
// next($arr);
// next($arr);
// next($arr);  //3 4
// prev($arr);  //2  3

// reset($arr); 







$arr = array('a','b','c','d','e','d');


$a = each($arr);

print_r($a);

echo '<br>';

$a = each($arr);

var_dump($a);
echo '<br>';

$a = each($arr);

var_dump($a);
echo '<br>';

$a = each($arr);

var_dump($a);
echo '<br>';

$a = each($arr);

var_dump($a);
echo '<br>';

$a = each($arr);

var_dump($a);
echo '<br>';

$a = each($arr);

var_dump($a);
echo '<br>';

$a = each($arr);

var_dump($a);
echo '<br>';

$a = each($arr);

var_dump($a);















 ?>