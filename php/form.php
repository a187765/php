<?php
    header("content-type:text/html;charset=utf-8");
    include("include/alert.php");
    function preArray($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    function preText($arr){
        echo "<pre>";
        echo $arr;
        echo "</pre>";
    }
    function h2($arr){
        echo "<h2>";
        echo $arr;
        echo "</h2>";
    }
    function br($arr){
        echo $arr;
        echo "<br>";
    }
    // var_dump(preg_match("/^1[3-9]\d{9}$/", $_GET["a"]));
    // exit;
	//文件接收： $_FILES
	//文件上传： enctype="multipart/form-data"
    h2("_GET");
    preArray($_GET);

    h2("_POST");
    preArray($_POST);

    h2("_REQUEST");
    preArray($_REQUEST);
    
    $filename = "form.txt";
    if($_POST){
        $username = isset($_POST["username"]) && !empty($_POST["username"]) ? trim($_POST["username"]) : "";
        $password = isset($_POST["password"]) && !empty($_POST["password"]) ? $_POST["password"] : "";
        $sex = isset($_POST["sex"]) && !empty($_POST["sex"]) ? $_POST["sex"] : "";
        if(!$username){
            alert("请填写用户名");
        }else if(!$password){
            alert("请填写密码");
        }else{
            $password = md5($password);
            br($username);
            br($password);
            $fh = fopen($filename,"a");
            $state = fwrite($fh,$username."||".$password."||".$sex."||".time()."\r\n");//成功返回字节数，失败返回0
            fclose($fh);
            if($state){
                alert("注册成功");
            }else{
                alert("注册失败");
            }
        }
    }

    h2("1、文件上传的相关配置");
    preText('
    表单设置
    要进行文件的上传，需要对form表单进行特殊设置;
    1.设定表单数据的提交方式为POST
    2.设定enctype属性值为: multipart/form-data 
    3.为了避免用户等待许久之后才发现上传文件太大，可以在表单中添加
        MAX_FILE_SIZE 隐藏域,通过设置其value值可以限制上传文件的大小;
        如： <input type="MAX_FILE_SIZE" value="1024 * 1024">
    <b>PHP设置</b>
    1.file_uploads 
        是否允许通过HTTP上传文件，默认为ON
    2.upload_max_filesize 
        允许上传文件大小的最大值，默认为2M，此指令必须小于post_max_size;
    3.upload_tmp_dir
        指定上传文件的临时存放路径，这个目录对于拥有此服务器进程的用户必须是可
        写的;如果未指定则使用系统默认值;
    4.post_max_size
        控制POST方式提交数据php所能够接收的最大数据量;
    5.memory_limit
        指定单个脚本程序可以使用的最大内存容量;
    6.max_execution_time
        此指令确定php脚本可以执行的最长时间，以秒为单位，默认为30秒;
    ');

    h2('2、 $_FILES 数组');
    preText('
    $_FILES超级全局变量作用是存储各种与上传文件有关的信息;
    $_FILES是一个二维数组，数组中共有5项：
    $_FILES["userfile"]["name"]	上传文件的名称
    $_FILES["userfile"]["type"] 	上传文件的类型
    $_FILES["userfile"]["size"] 	上传文件的大小, 以字节为单位
    $_FILES["userfile"]["tmp_name"]	文件上传后在服务器端储存的临时文件名
    $_FILES["userfile"]["error"] 	文件上传相关的错误代码
    注:userfile只是一个占位符，代表文件上传表单元素的名字; 因此这个值将根据你所给定
    的名称有所不同;
    ');

    h2('3、 上传错误信息');
    preText('
    $_FILES["userfile"]["error"]  提供了在文件上传过程中出现的错误：
    1.UPLOAD_ERR_OK (value = 0)      如果文件上传成功返回0;
    2.UPLOAD_ERR_INI_SIZE (value = 1)
        如果试图上传的文件大小超出了 upload_max_filesize 指令指定的值，则返回1;
    3.UPLOAD_ERR_FORM_SIZE (value = 2)
        如果试图上传的文件大小超出了 MAX_FILE_SIZE 指令（可能嵌入在HTML表单中）指定的值，则返回2;
    4.UPLOAD_ERR_PARTIAL (value = 3)
        如果文件没有完全上传，则返回3; 如网络出现错误，导致上传过程中断;
    5.UPLOAD_ERR_NO_FILE (value = 4)
        如果用户没有指定上传的文件就提交表单，则返回4
    ');

    h2('文件上传函数');
    preText('
    1.is_uploaded_file()
        bool is_uploaded_file ( string filename )
        函数确定参数filename指定的文件是否使用HTTP POST上传;
        例：
        if(is_uploaded_file($_FILES[‘userfile’][‘tmp_name’])){
            copy($_FILES[‘userfile’][‘tmp_name’], "test.txt");
        }else{
            echo "文件上传失败！";
        }
    2.move_uploaded_file()
        bool move_uploaded_file ( string filename, string destination )
        作用是将上传文件从临时目录移动到目标目录; 虽然
        copy()也可以实现同样功能，但move_uploaded_file()还提供了一种额外的
        功能，它将检查由filename输入参数指定的文件确实是通过http post 上传机制
        上传的。如果所指定的文件并非上传文件，则移动失败，返回false;
        例：
        move_uploaded_file($_FILES["userfile"]["tmp_name"], "1/test.jpg");
    ');

    h2("_REQUEST");
    preArray($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form 表单处理</title>
    <style>
        ul{
            list-style:none;
        }
        li{
            margin-bottom:0.5em;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <ul>
            <li>
            用户名：<input type="text" name="username">
            </li>
            <li>
            密码：<input type="password" name="password" maxlength="16">
            </li>
            <li>
                性别：
                <input type="radio" name="sex" id="man" value="1" checked="checked"><label for="man">男</label>
                <input type="radio" name="sex" id="sex" value="0"><label for="sex">女</label>
            </li>
            <li>
                <input type="submit" value="提交" id="">
            </li>
        </ul>
    </form>
    <table border="1" align="center" style="min-width:50%;text-align:center">
        <tr>
            <th>用户名</th>
            <th>密码</th>
            <th>性别</th>
            <th>注册时间</th>
        </tr>
        <?php $farr = file($filename);
            foreach($farr as $value){
                $v = explode("||",$value);
                if(count($v)<4){
                    continue;
                }
        ?>
        <tr>
            <td><?php echo $v[0]; ?></td>
            <td><?php echo $v[1]; ?></td>
            <td><?php echo $v[2]==1 ? "男":"女"; ?></td>
            <td><?php echo date("Y-m-d H:i:s",intval($v[3])); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>