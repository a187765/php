<?php

	function 取成员数($arr){
		if($arr!=null){
			return count($arr);
		}else{
			return 0;
		}
	}

	function 合并数组($arr1,$arr2){
		return array_merge($arr1,$arr2); 
	}	
	
	function 键名是否存在($arr,$key){
		return array_key_exists($key,$arr); 
	}

	function 取全部键名($arr){
		return array_keys($arr); 
	}

	function 搜索键名($arr,$value){//通过键值返回键名
		return array_search($value,$arr); 
	}

	function 加入首成员($arr,$element){  //在数组的首部加入一个成员，该数组将被直接改变，返回加入成员后该数组的成员数量
		if($arr==null){
			return 0;
		}
		array_unshift($arr,$element);
		return count($arr);       
	} 

	function 加入尾成员($arr,$element){  //在数组的尾部加入一个成员，该数组将被直接改变，返回加入成员后该数组的成员数量
		if($arr==null){
			return 0;
		}
		array_push($arr,$element);
		return count($arr);            
	} 

	function 删除首成员($arr){  //删除数组的第一个成员，该数组将被直接改变，返回删除成员后该数组的成员数量
		if($arr==null){
			return 0;
		}
		array_shift($arr);
		return count($arr);         
	} 

	function 删除尾成员($arr){  //删除数组的最后一个成员，该数组将被直接改变，返回删除成员后该数组的成员数量
		if($arr==null){
			return 0;
		}
		array_pop($arr);
		return count($arr);          
	} 

	function 删除成员($arr,$index){  //删除数组的指定成员，该数组将被直接改变，返回删除成员后该数组的成员数量
		if($arr==null){
			return 0;
		}		
		array_splice($arr,$index,1); 
		return count($arr);         
	} 

	function 清空数组($arr){  //删除数组的全部成员，该数组将被直接改变，返回删除成员后该数组的成员数量
		if($arr==null){
			return 0;
		}
		array_splice($arr,0,count($arr)); 
		return count($arr);            
	}

	function 翻转顺序($arr){  //翻转数组中成员的顺序，该数组将被直接改变
		if($arr!=null){
			array_reverse($arr); 
		}
	} 

	function 排列顺序($arr,$order,$type){  //按照字母(1)或者数字(2)升序或降序排列数组成员，该数组将被直接改变
		$o;
		$t;
		if($order==1){
			$o=SORT_ASC;//升序排列
		}else{
			$o=SORT_DESC;//降序排列
		}
		if($type==1){
			$t=SORT_NUMERIC;//把每一项作为数字来处理
		}else{
			$t=SORT_STRING;//把每一项作为字符串来处理
		}		
		array_multisort($arr,$o,$t);
	} 


 
 ?>
