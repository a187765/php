<?php

include "mysql.class.php";//可以引用其他php文件,引用的文件请存放在资源里的php文件目录中

class redbird_mysql{ //英文php名
	
	private $mysql_s;  //程序集变量
	private $conn;  //程序集变量

	
	/*类库函数*/ 
	public function 连接数据库($IP端口,$用户名,$密码,$数据库名称){
		$this->mysql_s = new mysql();
		$this->conn = $this->mysql_s->construct($IP端口,$用户名,$密码,$数据库名称,rand(0, 32000),"utf8");	
    }

	/*类库函数*/ 
	public function 执行语句($sql语句){
        $fh = $this->mysql_s->query($sql语句); 
        $a = array();
        $count = 0;
        while($row = mysql_fetch_array($fh))
        {
            $a[$count] = $row;
            $count = $count + 1;
        }
        return json_encode(array("queryString"=>$sql语句,"data"=>$a));		
	}

	
}
?>