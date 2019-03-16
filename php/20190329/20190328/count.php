<?php 
header('content-type:text/html; charset=utf-8');

$filename = 'count.txt';

$count = 1;
if(file_exists($filename) && filesize($filename)>0){
	// 读文件
	/*$fh = fopen($filename, 'r');
	$count = intval(fread($fh, filesize($filename)));
	fclose($fh);*/
	$count = intval(file_get_contents($filename));
}

echo "网站访问记录数：".$count;

$count++;

// 写文件  写新内容 加1的内容
file_put_contents($filename, $count);
/*$fh = fopen($filename, 'w');
fwrite($fh, $count);
fclose($fh);*/




 ?>