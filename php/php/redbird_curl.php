<?php
class redbird_curl{ //英文php名
	
	private $ch;
	
	/*类库函数*/ 
	public function 初始化(){
     	$this->ch = curl_init();
    }

	/*类库函数*/ 
	public function 置参数($name,$value){
     	curl_setopt($this->ch, $name, $value);	
    }

	/*类库函数*/ 
	public function 取网页源码($url){
     	curl_setopt($this->ch, CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_HTTPGET, true);
		return curl_exec($this->ch);	
    }

	/*类库函数*/ 
	public function 发送网络数据($url,$data){
     	curl_setopt($this->ch, CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_POST, true);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
		return curl_exec($this->ch);		
    }

	/*类库函数*/ 
	public function 关闭(){
     	curl_close($this->ch);
    }
	
}
?>