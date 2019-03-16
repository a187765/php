<?php

    function 到文本($value){
		return strval($value);
	}

	function 到整数($str) { 
		return intval($str);
	}

	function 到小数($str) { 
		return floatval($str);
	}	
	
	function 到十六进制($value) { 
		return dechex($value);
	}      

	function 到十进制($str) { 
		return hexdec($str);
	}

	function 代码转字符($code){
		return chr($code);
	}

	function 字符转代码($str){
		return charCodeAt($str,0);
	}

	function charCodeAt($str, $index)
	{
		$char = mb_substr($str, $index, 1, 'UTF-8');
	 
		if (mb_check_encoding($char, 'UTF-8'))
		{
			$ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
			return hexdec(bin2hex($ret));
		}
		else
		{
			return null;
		}
	}	
	
	function 数组转json($arr){
		return json_encode($arr);
	}

	function json转数组($json){
		return json_decode($json,true);
	}
//1、整数型 2、小数型 3、文本型 4、逻辑型 5、对象 6、数组 7、空 8、未知类型
	function 取数据类型($value){
		$a = gettype($value);
		switch($a){
		case "integer":
		  return 1;
		  break;
		case "double":
		  return 2;
		  break;   		  
		case "string":
		  return 3;
		  break;
		case "boolean":
		  return 4;
		  break;
		case "object":
		  return 5;
		  break;              
		case "array":
		  return 6;
		  break;    		  
		case "NULL":
		  return 7;
		  break;  
		case "unknown type":
		  return 8;
		  break;
		default:
		   return 8;
		}
	}
 
 ?>
