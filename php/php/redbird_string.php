<?php

	function 取文本长度($str){
		if($str!=null){
			return strlen($str);
		}else{
			return 0;
		}
	}

	function 寻找文本($str,$find,$start){
		if($str==null || $find==null){
			return -1;
		}
		return strpos($str,$find,$start);
	}

	function 倒找文本($str,$find){
		if($str==null || $find==null){
			return -1;
		}
		return strrpos($str,$find);
	}

	function 取文本中间($str,$start,$len){
		if($str==null || $start==null){
			return "";
		}        
		return substr($str,$start,$len);
	}

	function 取文本左边($str,$len){
		if(empty($len))
		{
			$len = strlen($str);
		}else{
			if($len<0||$len>strlen($str))
			{
				$len = strlen($str);
			}
		}
		return substr($str,0,$len);
	}

	function 取文本右边($str,$len){
		if(empty($len))
		{
			$len = strlen($str);
		}else{
			if($len<0||$len>strlen($str))
			{
				$len = strlen($str);
			}
		}
		return substr($str,strlen($str)-$len,strlen($str));
	}

	function 取指定文本($待取文本,$左边文本,$右边文本){
		$pattern = "/".$左边文本."(.*?)".$右边文本."/";
		$matches = array(); 
		preg_match_all($pattern, $待取文本, $matches);
		return $matches;
	}
	
	function 子文本替换($str, $a, $b) {
		if($str==null || $a==null || $b==null){
			return "";
		}         
		return str_replace($a,$b,$str);
	} 
	
	function 分割文本($str, $separator){
		if($str==null || $separator==null){
			return null;
		}         
		return explode($separator,$str); 
	}

	function 到大写($str){
		if($str==null){
			return "";
		}         
		return strtoupper($str);
	}

	function 到小写($str){
		if($str==null){
			return "";
		}          
		return strtolower($str);
	}

	function 删首尾空($str){
		if($str==null){
			return "";
		}
		return trim($str); 
	}
	
	function 删全部空($str){
		if($str==null){
			return "";
		}     
		$str = mb_ereg_replace('\s+', '', $str); 
		return $str; 
	}       


 ?>
