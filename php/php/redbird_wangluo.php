<?php
class redbird_wangluo{ //英文php名 网络操作
	
	/*类库函数*/ 
	public function 设置header($header){
     	header($header);
    }

	/*类库函数 设置cookie并发送给客户端，$cookie有效时间的单位为秒。 */ 
	public function 设置cookie($name,$value,$time){
     	setcookie($name,$value, time()+$time);
    }

	/*类库函数 获取客户端提交数据的方式："GET"或"POST" */ 
	public function 取提交方式(){
     	return $_SERVER["REQUEST_METHOD"];
    }


	/*类库函数*/ 
	public function 取get数据($name){
     	return $_GET[$name];
    }

	/*类库函数*/ 
	public function 取post数据($name){
     	return $_POST[$name];
    }
	
}
?>