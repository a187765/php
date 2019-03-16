<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php 文件操作</title>
</head>
<body>
    <table style="min-width:50%;text-align:center" border="1" align="center">
        <tr>
            <th>模式</th><th>可读</th><th>可写</th><th>指针位置</th><th>清空文件</th><th>创建文件</th>
        </tr>
        <tr>
            <td>r</td><td>是</td><td>否</td><td>开始</td><td>否</td><td>否</td>
        </tr>
        <tr>
            <td>r+</td><td>是</td><td>是</td><td>开始</td><td>否</td><td>否</td>
        </tr>
        <tr style="background:#eee">
            <td>w</td><td>否</td><td>是</td><td>开始</td><td>是</td><td>是</td>
        </tr>
        <tr style="background:#eee">
            <td>w+</td><td>是</td><td>是</td><td>开始</td><td>是</td><td>是</td>
        </tr>
        <tr>
            <td>a</td><td>否</td><td>是</td><td>结尾</td><td>否</td><td>是</td>
        </tr>
        <tr>
            <td>a+</td><td>是</td><td>是</td><td>结尾</td><td>否</td><td>是</td>
        </tr>
        <tr style="background:#eee">
            <td>x</td><td>否</td><td>是</td><td>开始</td><td>否</td><td>是</td>
        </tr>
        <tr style="background:#eee">
            <td>x+</td><td>是</td><td>是</td><td>开始</td><td>否</td><td>是</td>
        </tr>
    </table>
    <table  style="min-width:50%;text-align:center" border="1" align="center">
        <tr>
            <th>文件名</th>
            <th>文件类型</th>
            <th>大小</th>
            <th>创建时间</th>
            <th>修改日期</th>
        </tr>
        <?php
            if(isset($_GET["file"])){
                $filename = iconv("utf-8","gbk",$_GET["file"]);
            }else{
                $filename = dirname($_SERVER["SCRIPT_FILENAME"]);
            }
            $name = rtrim(rtrim($filename,"/"),"\\")."/";
            preArray(pathinfo($filename));
            $dir = scandir($filename);
            // ksort($dir);
            // krsort($dir);
            foreach($dir as $value){
                if(is_dir($name.$value)){
        ?>
        <tr>
            <td><a href="<?php echo "?file=".iconv("gbk","utf-8",($value=="." ? $name : ($value==".." ? iconv("utf-8","gbk",dirname(iconv("gbk","utf-8",$filename))) : $name.$value))); ?>"><?php echo iconv("gbk","utf-8",$value); ?></a></td>
            <td>文件夹</td>
            <td></td>
            <td><?php echo date("Y-m-d H:i",filectime($name.$value)); ?></td>
            <td><?php echo date("Y-m-d H:i",filemtime($name.$value)); ?></td>
        </tr>
        <?php }else{ ?>
        <tr>
            <td><?php echo iconv("gbk","utf-8",$value); ?></td>
            <td><?php echo getfilename($value); ?></td>
            <td><?php echo getfilesize($name.$value); ?></td>
            <td><?php if(file_exists($name.$value))echo date("Y-m-d H:i",filectime($name.$value)); ?></td>
            <td><?php if(file_exists($name.$value))echo date("Y-m-d H:i",filemtime($name.$value)); ?></td>
        </tr>
            <?php }} ?>
    </table>
<?php
    // header("content-type:text/html;charset=utf-8;");
    function preArray($con){
        echo "<pre>";
        print_r($con);
        echo "</pre>";
    }
    function preText($con){
        echo "<pre>";
        echo($con);
        echo "</pre>";
    }
    function h2($con){
        echo "<h2>";
        echo($con);
        echo "</h2>";
    }
    function br($con){
        echo($con);
        echo "<br>";
    }
    br('文件操作');

    h2('1、 fopen() fsockopen() 打开文件');
    preText('
    resource fopen ( string filename, string mode [, bool use_include_path [, resource zcontext]] )
    fopen()函数将resource绑定到一个流或句柄。绑定之后，脚本就可以通过句柄与此资源交互;
    ');
    $fh = fopen("data.txt","r");
    var_dump($fh);

    h2('2、 fclose() 关闭文件');
    preText('
    bool fclose ( resource handle ) 
    将 handle 指向的文件关闭 。如果成功则返回 TRUE，失败则返回 FALSE;
    文件指针必须有效，并且是通过 fopen() 或 fsockopen() 成功打开的;
    虽然每个请求最后都会自动关闭文件，但明确的关闭打开的所有文件是一个好的习惯;
    ');
    h2('3、 filesize() 文件大小(字节)');
    preText('
    echo filesize("data.txt");
    ');
    echo filesize("data.txt");

    h2('4、 fread() 按字节读取文件');
    preText('
    string fread ( int handle, int length )
    fread()函数从handle指定的资源中读取length个字符,当到达EOF或读取到length个字符时
    读取将停止。
    如果要读取整个文件，使用filesize()函数确定应该读取的字符数;
    例：$file = "test.txt";
        $fh = fopen( $file, "r");
        $str = fread($fh, filesize($file));
        echo $str;
        fclose($fh);
    ');
    echo fread($fh,5);

    h2('5、 fgets() 按行读取文件  $con = iconv("gbk","utf-8",$con);//编码转换 gbk 转 utf-8');
    preText('
    string fgets ( int handle [, int length] )
    fgets()函数从handle指定的资源中读取一行字符。碰到换行符（包括在返回值中）
    、EOF 或者已经读取了 length - 1 字节后停止（看先碰到那一种情况）;
    例：逐行读取文件 
    $handle = fopen("data.txt", "r");
    while(!feof($handle)){
        $content = fgets($handle);
        $content= iconv("gbk","utf-8",$content);//编码转换
        echo $content."&lt;br />";
    }
    fclose($handle);
    while($ccon = fgets($fh)){
        echo $ccon."&lt;br>";
    }
    注意：如果没有指定 length ，则默认为 1K，或者说 1024 字节。
    ');
    br(fgets($fh));
    fclose($fh);

    h2('6、 file() 按数组读取文件');
    preText('
    array file ( string $filename [, int $flags = 0 [, resource $context ]])
    file()函数将文件读取到数组中，各元素由换行符分隔。
    例：
    $arr = file("data.txt");
    print_r($arr);
    ');
    $arr = file("data.txt");
    print_r($arr);

    h2('7、 file_get_contents() 读取文件');
    preText('
    string file_get_contents ( string filename [, bool use_include_path [, resource context [, int offset [, int maxlen]]]] )
    file_get_contents()函数将文件内容读到字符串中;
    例：
    $str = file_get_contents("data.txt");
    echo $str;
    ');
    $str = file_get_contents("data.txt");
    br($str);

    h2('8、 fwrite() 插入文件');
    preText('
    int fwrite ( resource handle, string string [, int length] )
    fwrite()函数将string的内容写入到由handle指定的资源中。如果指定length参
    数，将在写入Length个字符时停止。
    例：
    $str = "test text";
    $fh = fopen("test.txt", "a");
    fwrite($fh, $str);
    fclose($fh);
    ');

    h2('9、 file_put_contents() 写入文件');
    preText('
    int file_put_contents ( string filename, string data [, int flags [, resource context]] )
    file_put_contents()函数将一个字符串写入文件，与依次调用
    fopen(),fwrite(),fclose()功能一样;
    例：
    $str = "hello";
    file_put_contents("test.txt", $str);
    ');

    h2('10、 copy() 复制文件');
    preText('
    bool copy ( string source, string dest )
    将文件从 source 拷贝到 dest。如果成功则返回 TRUE，失败则返回 FALSE。 
    例：Copy("test.txt", "test.txt.bak");
    ');

    h2('11、 rename() 重命名文件（同级目录） 也是移动文件（不同级目录）');
    preText('
    bool rename ( string oldname, string newname [, resource context] )
    尝试把 oldname 重命名为 newname。 如果成功则返回 TRUE，失败则返回 FALSE。
    例：rename("test.txt", "test2.txt");
    例：rename("test.txt", "a/test.txt");
    ');

    h2('12、 unlink() 删除文件');
    preText('
    bool unlink ( string filename )
    删除文件，如果删除成功返回true, 否则返回false;
    例1：删除一个文本文件
    unlink("test.txt");
    例2：删除一个图片文件
    unlink("img.jpg");
    ');

    h2('13、 filectime() 获取文件创建时间');
    preText('
    int filectime ( string filename )
    取得文件的创建时间，以unix时间戳方式返回
    例：$t = filectime("test.txt");
	echo date("Y-m-d H:i:s", $t);
    ');

    h2('14、 fileatime() 返回文件的最后改变时间;');
    preText('
    echo date("Y-m-d H:i:s",fileatime("data.txt"))
    ');
    br(date("Y-m-d H:i:s",fileatime("data.txt")));

    h2('15、 filemtime() 返回文件的最后修改时间;');
    preText('
    注："最后改变时间"不同于 "最后修改时间"。最后改变时间指的是对文件inode数
    据的任何改变，包括改变权限，所属组，拥有者等; 而最后修改时间指的是对文件内容的修改
    echo date("Y-m-d H:i:s",filemtime("data.txt"))
    ');
    br(date("Y-m-d H:i:s",filemtime("data.txt")));

    h2('16、 file_exists() 检查文件或目录是否存在，如果存在返回true, 否则返回false;');
    preText('
    var_dump(file_exists("data.txt"));
    ');
    var_dump(file_exists("data.txt"));

    h2('17、 is_readable() 判断文件是否可读，如果文件存在并且可读，则返回true;');
    h2('18、 is_writable() 判断文件是否可写，如果文件存在并且可写，则返回true;');

    h2('19、 opendir() 读取目录  is_dir() 判断是否是目录');
    preText('
    打开目录句柄：
        resource opendir ( string path [, resource context] )
    关闭目录句柄：
        void closedir ( resource dir_handle )
    文件和子目录：
        3.readdir()
        string readdir ( resource dir_handle ) 
        返回由dir_handle指定目录中的各个元素。可以使用此函数列出给定目录中的所有文件和子目录
    例：
    $dh = opendir("."); //当前目录
    While($file = readdir($dh)){
        echo $file."&lt;br />";
    }
    closedir($dh);
    获取文件和目录的数组：
        array scandir ( string directory [, int sorting_order [, resource context]] )
        返回一个包含有 directory 中的文件和目录的数组;
        例：
        print_r(scandir("."));
    ');
    $dh = opendir(".");
    While($file = readdir($dh)){
        br($file);
    }
    closedir($dh);

    preArray(scandir("."));

    h2('20、 mkdir() 创建目录');
    preText('
    bool mkdir ( string pathname [, int mode [, bool recursive [, resource context]]] );
    mkdir("a/b/c/d",0777,true);创建多层目录
    尝试新建一个由 pathname 指定的目录。
    ');

    h2('21、 basename() 解析目录路径的函数');
    preText('
    string basename ( string path [, string suffix] ) 
    返回路径中的文件名部份，当指定了可选参数suffix会将这部分内容去掉;
        例：
        $path = "/home/www/data/users.txt";
        $filename = basename($path);
        $filename2 = basename($path, ".txt");
    返回路径中的目录部份：
        string dirname ( string path )
        例：
        dirname(dirname($path))
    ');
    $path = "/home/www/data/users.txt";
    $filename = basename($path);
    $filename2 = basename($path, ".txt");
    br($filename);
    br($filename2);
    br(dirname(dirname($path)));

    h2('22、 pathinfo() 解析目录名，文件名，扩展名');
    preText('
    array pathinfo ( string path [, int options] )
    返回一个关联数组，其中包括路径中的三个部份：目录名，文件名，扩展名
    例：
    $pathinfo = pathinfo($_SERVER["SCRIPT_FILENAME"]);  //当前访问路径
    print_r($pathinfo);
    $str = "C:/phpStudy/WWW/B1901/20190321";
    $pathinfo = pathinfo($str);
    preArray($pathinfo);
    ');
    $pathinfo = pathinfo($_SERVER["SCRIPT_FILENAME"]);
    preArray($pathinfo);
    $str = "C:/phpStudy/WWW/B1901/20190321";
    $pathinfo = pathinfo($str);
    preArray($pathinfo);

    h2('练习1 写一个简单的访问记数器');
    $name = "test.txt";
    $count = 0;
    if(is_readable($name)){
        $count = intval(file_get_contents($name));// 读取文件
    }
    $count++;
    file_put_contents($name,$count);// 写入文件
    preText("访问了：$count");

    // echo getfilesize("data.txt");
    function getfilesize($file){
        if(!file_exists($file)){
            return ;
        }
        $size = filesize($file);
        if($size<1024){
            return $size."字节";
        }
        if($size / 1024<1024){
            return (floor(($size / 1024) * 100) / 100)." kB";
        }
        if($size / pow(1024,2)<1024){
            return (floor(($size / pow(1024,2)) * 100) / 100)." MB";
        }
        return (floor(($size / pow(1024,3)) * 100) / 100)." GB";
    }
    function getfilename($value,$type=0){
        $name = substr(strrchr($value,"."),1);
        if($type){
            return $name;
        }
        switch(strtolower($name)){  //到小写
            case 'html':
            case 'php':
            case 'pub':
                return $name." 文件";
            break;
            case 'jpg':
            case 'png':
            case 'gif':
                return $name." 图片";
            break;
            case 'css':
                return "层叠样式表文档";
            break;
            case 'js':
                return "javaScript 文件";
            break;
            case 'txt':
                return "文本文档";
            break;
            default:
                return "未知类型";
            break;
        }
    }
?>
</body>
</html>