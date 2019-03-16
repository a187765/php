<?php class Redniao{
private $test = 0;
private $filename = "";
private $filetest = "";
private $filenr = "";
//HK
public function 读文件($a){
   $aa = fopen($a, "r") or die("Unable to open file!");
   $bb = fread($aa,filesize($a));
   fclose($aa);
   return $bb;
}

public function 写文件($a,$b){
   $aa = fopen($a, "w") or die("Unable to open file!");
   fwrite($aa,$b);
   fclose($aa);
}

public function 置编码($bianma){
   header("Content-type: text/html; charset=".$bianma);
}

public function 取目录列表($dir){
   $file=scandir($dir);
   $fanhui = "";
   for($i=1;$i<count($file);$i++){
		if($file[$i] != ".." and $file[$i] != "" and $file[$i] != "." and $file[$i] != null){
		   //$res=explode(".",$file[$i],10);  
			if($fanhui == ""){
				$fanhui=$file[$i];
			}else{
				$fanhui = $fanhui."\n".$file[$i];
			}
		}
	}
	return	$fanhui; 
}

public function 取网页源码($url){
	return file_get_contents($url);
}

public function 取北京时间(){
	date_default_timezone_set('PRC');
	return date('Y-m-d H:i:s',time());
}

public function 取md5值($str){
	return md5($str);
}

public function base64编码($str){
	return base64_encode($str);
}

public function base64解码($str){
	return base64_decode($str);
}

}?>

