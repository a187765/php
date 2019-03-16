<?php

	function 到整数($str) { 
		return intval($str);
	}

	function 到小数($str) { 
		return floatval($str);
	}	
	
	function 取随机数($min,$max){
		return rand($min,$max);
	}
	
	function 取绝对值($value){ 
		return abs($value);
	}	
	
	function 取余数($a,$b){ 
		return $a%$b;
	}  	

	function 取次方($a,$b){ 
		return pow($a,$b);
	} 	

	function 四舍五入($value,$num){
		return round($value,$num);
	}	
 ?>
