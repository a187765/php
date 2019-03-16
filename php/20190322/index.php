<?php 
header('content-type:text/html; charset=utf-8');

// 运算符、流程控制
// PHP的运算符有7种：
// 算术   +  -   *  /  %

// 比较  >  <   >=  <=  ==   ===   != <>   !==


// 三元  真 ? 真执行这里 :  假执行这里
// echo 1<2 ? '真' : '假';
$a = 11;
$b = 22;
$c = 33;

// 3个数比大小，取最大。用三元运算符来完成
// $d = $a>$b?$a:$b;
// echo $d>$c?$d:$c;




// 逻辑  与&&  或||  非!
$a = 11;
$b = 22;
$c = 33;

// $username;
// echo isset($username)?$username:'';

// exit;

$bool = !($a>$b) && $c>$b;

// var_dump($bool);
// bool isset();  判断一个变量有没有被设置（赋值），有设置为真
// bool empty();  判断一个变量是否为空，空为真
// var_dump(isset($f));
// var_dump(empty($a));


$username = 'user1';


// 判断假   ||
if(!isset($username) || empty($username)){
	echo '请填写用户名';
}

// 判断真   &&
if(isset($username) && !empty($username)){
	// echo 'sfds ';
}




// 赋值  =
	$a = 1;
// 拼接  .
	// echo '1'.'1';

// 递增  ++、递减  --
$a = 12;
$a++;
$a++;
// echo ++$a; // 15
// echo --$a; // 14
// echo $a--; // 14


// 流程控制
// 判断结构
	// 语法：if(){}
	// if(条件为真){
	// 	真 执行这里
	// }else{
	// 	假  执行这里
	// }

// 分支结构
	// 语法：switch(){}
	/*switch(情况){
		case 情况一至: 执行这里;
		break;
		case 情况一至: 执行这里;
		break;
		case 情况一至: 执行这里;
		break;
		default:默认的执行这里；
	}*/
	// $a = 1;
	$day = getdate();
	
	switch($day['wday']){
		case 1:echo '星期一';
		break;
		case 2:echo '星期二';
		break;
		case 3:echo '星期三';
		break;
		case 4:echo '星期四';
		break;
		case 5:echo '星期五';
		break;
		case 6:echo '星期六';
		break;
		default:echo '星期天';
	}

	echo '<hr>';
// 循环结构 while     do while     for

$num = 11;
while($num<=10){   //先判断，后执行
	echo $num;
	$num++;
}

echo '<hr>';

$num1 = 11;
do{               //先执行，后判断
	echo $num1;
	$num1++;
}while($num1<=10);

echo '<hr>';

for($i = 1; $i <= 10; $i++){
	echo $i;
}

echo '<hr>';
// 不管是html  css  js  对于PHP来说，它都是一个字符串

echo '<style>body{height:1000px;}h1{color:red;}a{color:blue;}</style>';
echo '<h1>标题</h1>';
echo '<a href="http://www.baidu.com" target="_blank">百度</a>';
echo '<img src="images/car-1.jpg" alt=""/>';
echo '<hr>';



for($i = 1; $i <= 10; $i++){
	if($i==4){
		// break;   //直接停止循环
		continue;   //停止当前循环，执行下一次循环
	}
	echo '<img src="images/0'.$i.'.gif" alt=""/>';
}











 ?>