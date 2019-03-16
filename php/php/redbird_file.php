<?php
class redbird_file{ //英文php名
	/*
打开模式	描述
r	        打开文件为只读。文件指针在文件的开头开始。
w	        打开文件为只写。删除文件的内容或创建一个新的文件，如果它不存在。文件指针在文件的开头开始。
a	        打开文件为只写。文件中的现有数据会被保留。文件指针在文件结尾开始。创建新的文件，如果文件不存在。
x	        创建新文件为只写。返回 FALSE 和错误，如果文件已存在。
r+	        打开文件为读/写、文件指针在文件开头开始。
w+	        打开文件为读/写。删除文件内容或创建新文件，如果它不存在。文件指针在文件开头开始。
a+	        打开文件为读/写。文件中已有的数据会被保留。文件指针在文件结尾开始。创建新文件，如果它不存在。
x+	        创建新文件为读/写。返回 FALSE 和错误，如果文件已存在。
*/
	private $file;  //程序集变量

	/*类库函数*/ 
	public function 打开文件($文件路径,$打开模式){
     	$this->file = fopen($文件路径,$打开模式);
     	if($this->file){
			return true;
		}else{
			return false;
		}
    }

	/*类库函数*/ 
	public function 读取文件($文件路径){
		return readfile($文件路径);	
    }

	/*类库函数*/ 
	public function 读取一段($读取长度){
		return fread($this->file,$读取长度);	
    }

	/*类库函数*/ 
	public function 读取一行(){
		return fgets($this->file);
    }

	/*类库函数*/ 
	public function 读取一个(){
		return fgetc($this->file);
    }

	/*类库函数*/ 
	public function 置读写位置($位置){
		if(fseek($this->file,$位置)==0){
			return true;
		}else{
			return false;
		}
    }

	/*类库函数*/ 
	public function 取读写位置(){
		return ftell($this->file);
    }

	/*类库函数*/ 
	public function 是否已到达文件尾(){
		if(feof($this->file)){
			return true;
		}else{
			return false;
		}
    }

	/*类库函数*/ 
	public function 写入内容($内容){
        if(fwrite($this->file,$内容)) {
			return true;
		}else{
			return false;
		}  
    }

	/*类库函数*/ 
	public function 关闭文件(){
		fclose($this->file);
    }

	/*类库函数*/ 
	public function 取文件名($文件路径,$后缀名){
		if($后缀名!=null){
			return basename($文件路径,$后缀名);
		}else{
			return basename($文件路径);
		}
    }

	/*类库函数*/ 
	public function 复制文件($源文件路径,$目标路径){
		if(copy($源文件路径,$目标路径)){
			return true;
		}else{
			return false;
		}
    }

	/*类库函数*/ 
	public function 删除文件($文件路径){
		if(unlink($文件路径)){
			return true;
		}else{
			return false;
		}
    }

	/*类库函数*/ 
	public function 取文件大小($文件路径){
		return filesize($文件路径);	
    }

	/*类库函数*/ 
	public function 文件是否存在($文件路径){//文件或目录
		return file_exists($文件路径);
    }

	/*类库函数*/ 
	public function 创建目录($目录路径){
		if(mkdir($目录路径)){
			return true;
		}else{
			return false;
		}
    }

	/*类库函数*/ 
	public function 移动文件($源文件路径,$目标路径){
		if(copy($源文件路径,$目标路径)){
			if(unlink($文件路径)){
				return true;
			}
		}
		return false;
    }

	/*类库函数*/ 
	public function 重命名文件($原名称,$新名称){//文件或目录
		return rename($原名称,$新名称);	
    }
	
}
?>