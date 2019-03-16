<?php
class redbird_upload{ //英文php名 文件上传

	/*类库函数*/ 
	public function 取错误代码(){
		return $_FILES["file"]["error"];	
    }

	/*类库函数*/ 
	public function 取文件类型(){
		return $_FILES["file"]["type"];	
    }

	/*类库函数*/ 
	public function 取文件大小(){
		return $_FILES["file"]["size"];	
    }

	/*类库函数*/ 
	public function 取文件名称(){
		return  $_FILES["file"]["name"];	
    }

	/*类库函数*/ 
	public function 取临时文件名称(){
		return  $_FILES["file"]["tmp_name"];	
    }

	/*类库函数*/ 
	public function 移动文件($临时文件名称,$目标路径){
		return move_uploaded_file($临时文件名称,$目标路径);	
    }
	
}
?>