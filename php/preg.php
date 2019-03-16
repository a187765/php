<?php
    header("content-type:text/html;charset=utf-8");
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

    preText('PHP 正则表达式(PCRE)');
    h2('1、 preg_match() preg_match_all()');
    preText('
    返回匹配到的次数
    \d  匹配一个数字；等价于[0-9]
    \D  匹配除数字以外任何一个字符；等价于[^0-9]
    \w  匹配一个英文字母、数字或下划线；等价于[0-9a-zA-Z_]
    \W  匹配除英文字母、数字和下划线以外任何一个字符；等价于[^0-9a-zA-Z_]
    \s  匹配一个空白字符；等价于[\f\n\r\t\v]
    \S  匹配除空白字符以外任何一个字符；等价于[^\f\n\r\t\v]
    \b  匹配单词的边界(如空格、横杠，但不包括下划线)
    \B  匹配除单词边界以外的部分

    $str = "abcdAGefhg79";
    $pcre = "/[bc]/i";// i = 忽略大小写
    echo preg_match($pcre,$str,$arr);
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    匹配四个连起来的字母
    $pcre = "/[a-z][a-z][a-z][a-z]/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    匹配n个连起来的字母（最少一次，最多无限次）  + 号量词
    $pcre = "/[a-z]+/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    匹配n个连起来的字母（最少0次，最多无限次）  * 号量词
    $pcre = "/[a-z]*/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    匹配非字母  ^ 号量词  在[]里面是 取反
    $pcre = "/[^a-z]+/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    ');

    $str = "apx bpx cpx dpx epx fpx";
    $pcre = "/[ace]px/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    h2("2、 | () 使用");
    preText('
    $str = "我是你们都是好的他的";
    $pcre = "/[我你他]/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    
    $pcre = "/我|你|他/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    
    $pcre = "/(我|你|他)/";//返回两个数组，第一个是匹配到的，第二个是()内的表达式的文本 不包括()外的文本
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    ');
    $str = "我是你们都是好的他的";
    $pcre = "/[我你他]/u";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    
    $pcre = "/我|你|他/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    
    $pcre = "/(我|你|他)/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    h2("3、  . 任意字符 【一次把拿字母出来】");
    $str = 'abd12hd
    ewcas';
    $pcre = "/[a-z]+/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    $pcre = "/.+/s";// . 匹配除换行之外的任何一个字符  s 模式中的圆点元字符 “ . “将匹配所有的字符，包括换行符
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    h2("4、 U  取消贪婪匹配");
    preText('
    $str = "<p>段落1</p><p>段落2</p><p>段落3</p><p>段落4</p>";
    $pcre = "/<p>(.+)<\/p>/U";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);//取下标 1 的内容
    ');
    $str = '<p>段落1</p><p>段落2</p><p>段落3</p><p>段落4</p>';
    $pcre = "/<p>(.+)<\/p>/U";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    h2("5、 \b 使用  单词的边界");
    preText('
    $str = "dajs asj ask assa23";
    $pcre = "/\b[a-z]+\b/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    ');
    $str = "dajs asj ask assa23";
    $pcre = "/\b[a-z]+\b/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    
    h2("6、 \B 使用  除单词边界以外的部分");
    $str = "dajs asj ask assa23";
    $pcre = "/\B[a-z]+\B/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    h2("7、 html匹配");
    preText('
    $str = "<p>段落1</p><p>段落2</p><p>段落3</p><p>段落4</p>";
    $pcre = "/<p>(.+)<\/p>/U";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);//取下标 1 的内容
    ');
    $str = '<p title="tit<9>">段落1</p><p>段落2</p><p>段落3</p><p>段落4</p>';
    echo $str;
    $pcre = "/<([^<>]+)>/U";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    h2("8、 匹配所有中文 u = utf-8编码");
    $str = '<p title="tit<9>">段落1</p><p>段落2</p><p>段落3</p><p>段落4</p>';
    $pcre = "/[\x{4E00}-\x{9FA5}]+/u";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    h2("9、 练习匹配");
    preText('
    手机号匹配
    $str = "13690284928";
    $pcre = "/^1[35-9][0-9]{9}$/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    
    固话 ? 前面的可有可无 （最小一次，最多一次）
    $str = "0775-36902849";
    $pcre = "/^(0[0-9]{2,3}-)?[23468][0-9]{6,7}$/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    ');
    $str = "13690284928";
    $pcre = "/^1[35-9][0-9]{9}$/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    
    $str = "0775-36902849";
    $pcre = "/^(0[0-9]{2,3}-)?[23468][0-9]{6,7}$/";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);

    
    h2("10、 练习 采集图片");
    $path = "preg/";//路径
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }

    $str = file_get_contents("wengdo/case_list.html");//读网络页面（文件）
    // <img src=\"(.+)\"
    // $pcre = "/<ul>(.+)<\/ul>/s";
    $pcre = "/<\/nav>\s+<ul>(.+)<\/ul>/Us";
    echo preg_match_all($pcre,$str,$arr);
    // preArray($arr);
    // print_r($arr[0][0]);

    $pcre = "/<img src=\"images\/(c.+)\"/U";
    echo preg_match_all($pcre,$str,$arr);
    // preArray($arr);
    foreach ($arr[1] as $key => $value) {
        echo $key ."=>". $value."\r\n";
        $filename = pathinfo($value)["filename"];
        preArray($filename);
        // file_put_contents($path.$filename.".txt","images/".$value);
    }

    $pcre = "/<img src=\"(.+\/c.+)\"/U";
    echo preg_match_all($pcre,$str,$arr);
    // preArray($arr);
    foreach ($arr[1] as $key => $value) {
        // echo $key ."=>". $value."\r\n";
        $filename = pathinfo($value)["filename"];//文件名
        // echo $key ."=>". $filename."\r\n";
        if(!file_exists($path.$filename.".txt")){
            file_put_contents($path.$filename.".txt",$value);
        }
    }

    h2("11、 preg_replace() 替换字符串");
    preText('
    $str = "&lt;script type=>script&lt;/script>&lt;p title=>p&lt;/p>";
    $pcre = "/<[^<>]+>/";
    echo preg_replace($pcre,"",$str);
    ');
    $str = "<script type=''>script</script><p title=''>p</p>";
    $pcre = "/<[^<>]+>/";
    echo preg_replace($pcre,"",$str);

    h2("12、 preg_split() 分割字符串");
    preText('
    $str = "a,b.c-d";
    $pcre = "/[,.-]/";
    print_r(preg_split($pcre,$str));
    ');
    $str = "a,b.c-d";
    $pcre = "/[,.-]/";
    preArray(preg_split($pcre,$str));

    h2("13、 preg_grep() 数组匹配 返回数组单元");
    preText('
    $arr = array(
        "saxsa",
        "sa2321xsa",
        "1212saxsa1221",
        "saxsa21",
    );
    $pcre = "/[a-z]+/";
    preArray(preg_grep($pcre,$arr));

    $pcre = "/[0-9]+/";
    preArray(preg_grep($pcre,$arr));
    ');
    $arr = array(
        "saxsa",
        "sa2321xsa",
        "1212saxsa1221",
        "saxsa21",
    );
    $pcre = "/[a-z]+/";
    preArray(preg_grep($pcre,$arr));

    $pcre = "/[0-9]+/";
    preArray(preg_grep($pcre,$arr));

    h2("11、 preg_replace_callback() 替换字符串");
    $str = "<script type=''>script</script><p title=''>p</p><h2>h2</h2><?php ?><import><include ><object ><iframe ></import></include ></object ></iframe >";
    // $pcre = "/<((scr|\?|lin|ifr|incl|obj|imp|\/scr|\/lin|\/ifr|\/incl|\/obj|\/imp).+)[> ]/U";
    $pcre = "/<(scr|\?|lin|ifr|incl|obj|imp|\/scr|\/lin|\/ifr|\/incl|\/obj|\/imp).+[> ]/U";
    echo preg_match_all($pcre,$str,$arr);
    preArray($arr);
    echo preg_replace_callback($pcre,"replace",$str);
    function replace($v){
        $value = "&lt;".substr($v[0],1);
        if(substr($v[0],-1)==">"){
            $value = substr($value,0,-1)."&gt;";
        }
        return $value;
    }

    preText('
    模型  所有操作数据库的都是模型
    模板  静态页面
    视图  静态页面
    静态页面  静态页面

    控制器    
    方法

    模块   类');
?>