<?php 
/**
 * 文档注释
 * 函数库
 * @date 2019-03-21
 * @param $a [array]
 * @param $b [string]
 * @author wangliang
 */

header('content-type:text/html; charset=utf-8');


// echo '中文';
// 声明变量

// 变量  值赋值
$num = 1;
$num1 = 2;
// $1num = 3;  错

// echo $num;

// (2). 引用赋值：
// php4引入了引用赋值功能，创建的变量与另一个变量引用的内容相同。
$a = 'hello';
$b = &$a;

// echo $b;
// echo $GLOBALS['b'];

// 释放变量  unset();
unset($a);
// $a = 'a';
// $a = 'bb';

// echo $b;


// 3 变量的变量	
$a = 'hello';
$$a = 'world';

// echo $a.'<br>';
// echo $$a.'<br>';
// echo ${$a}.'<br>';
// echo $hello.'<br>';


// 不管是HTML  css  js对于PHP来说。它只是一个字符串


// 2.PHP的超全局变量

// $_SERVER  获取服务器的信息（数组）PHP专门打印数组的函数print_r();

echo '<pre>';  //预格式标签
// print_r($_SERVER);
echo '</pre>';

echo '<hr>';


$c = 'ccccc';

// echo $GLOBALS['c'];

// echo $c;
// exit;

echo '<pre>';  //预格式标签
// print_r($GLOBALS['b']);
echo '</pre>';



// 常量

// 自定义常量 define();
define('PI','3.1415926');
// echo PI;


// 内置常量
// echo PHP_OS;  // WINNT 获取服务器系统
// echo PHP_VERSION;  //获取PHP版本号


// 魔术常量   名字前后双下划线 __FINE__

// echo __LINE__;  //获取当前行号

// echo __FILE__; //获取当前脚本文件的完整路径C:\phpStudy\WWW\b1901\20190321\index.php


function demo(){
	return __FUNCTION__; //获取函数名称
}

// echo demo();

class test{
	public function a(){
		echo __CLASS__;
		echo '<br>';
		echo __METHOD__;
	}
}

$t = new test();
// $t->a();


// 数据类型
// 8种数据类型
// 3大种
// 1  常用类型，标量类型。
	// 字符串型

	// 如何定义字符串 ''  ""  定界符
	$str1 = 'a$bc';
	$str2 = "h{$str1}h";

	// echo $str2;
	// 定界符 <<<NAME  NAME;
	$str3 = <<<A
	lsdfjl{$str2}sdlsdfllsdjfl蓝色的解放路’；【【】】【{}0（））————+-+-=+——：“，《》？。？《、!!@@#@!#@!$#$
A;

// echo $str3;

// 转义   \
// 把没有意义的可以转成有意义的。
// 把有意义的可以转成没有意义的。 .  ""  $  \

$str = "abc\"de\"fg"; //把有意义的可以转成没有意义的
$str = "abc\$defg"; //把有意义的可以转成没有意义的
$str = "abc\\rnfg"; //把有意义的可以转成没有意义的

$str = "abc\r\nfg"; // 把没有意义的可以转成有意义的

echo '<pre>';
echo $str;
echo '</pre>';







	// 整型
	// 浮动型
	// 布尔型
// 2  复合类型
	// 数组
	// 对象
// 3  特殊类型
	// 资源
	// 空



// echo 输入单一类型  字符串 一次可以输出多个，用逗号隔开
// print_r();  输出数组
// var_dump();  输出所有类型的 值和类型类型 等详细信息

// $a = 2;
// $b = 3;
// $d = 4;

// echo $a,$b,$d;
// $a = "112.3123";
// 在PHP里面真就是1来表示，假是什么都没有
$bool = array();

if($bool){
	echo '真';
}else{
	echo '假';
}

// echo $bool;
// var_dump($bool);


// $aaaa;

// unset($a);

// echo gettype($aaaa);


// 数据类型转换
$a = 1;
$b = '2sdfsdfdsfds';

// echo $a+$b;

$a = 1.1;

var_dump(is_int($a));

// define();  定义常量
// defined(name)  判断常量






 ?>