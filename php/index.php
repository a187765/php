<?php
    echo '<pre>
    // 3.文档注释
    /**
     * 获取用户数据
     * @param int uid  参数
     * @author david   作者
     * @date  2019-03-21   时间
     */
    </pre>';
    
    header("Content-Type:text/html;charset=utf-8");
    echo "真";

    $str = "String";
    echo "<br>";
    echo $str;
    echo "<br>";
    echo "{$str}";
    echo "<br>";
    echo "{$str}str";
    echo "<br>";
    echo "str{$str}str";
    echo "<br>";
    echo "str[$str]str";

    echo "<h2>1、引用赋值</h2>";
    echo '<pre>$str1 = &$str</pre>';
    $str1 = &$str;
    echo "str[$str1]str";

    echo "<h2>2、释放变量 unset();</h2>";
    echo '<pre>
    释放<b>引用赋值</b>其中一个变量
    </pre>';

    echo "<h2>3、变量的变量</h2>";
    echo '<pre>
    { } 变量的边界符
    $str = "hello";
    $$str = "world ";
    echo $str;
    echo $$str;
    echo ${$str};
    echo $hello;
    </pre>';
    $str = "hello";
    $$str = "world ";
    echo $str;
    echo "<br>";
    echo $$str;
    echo "<br>";
    echo ${$str};
    echo "<br>";
    echo $hello;

    echo "<h2>4、超全局变量 print_r();</h2>";
    echo '<pre>';
    // print_r($_SERVER);
    echo '</pre>';
    echo '$_SERVER 服务器变量';
    echo '<pre>
    $_SERVER["SERVER_NAME"]; : 当前运行脚本所在的服务器的主机名
	$_SERVER["REMOTE_ADDR"]	: 客户端IP地址
	$_SERVER["REQUEST_URI"]	: URL的路径部份
	$_SERVER["HTTP_USER_AGENT"]  :  操作系统和浏览器的有关信息
    </pre>';
    
    echo $_SERVER["SERVER_NAME"];// : 当前运行脚本所在的服务器的主机名
    echo "<br>";
    echo $_SERVER["REMOTE_ADDR"];//	: 客户端IP地址
    echo "<br>";
    echo $_SERVER["REQUEST_URI"];//	: URL的路径部份
    echo "<br>";
    echo $_SERVER["HTTP_USER_AGENT"];//  :  操作系统和浏览器的有关信息

    echo '<h2>5、所有全局变量数组 print_r($GLOBALS); echo $GLOBALS["str"]; </h2>';
    // echo '<pre>';
    // print_r($GLOBALS);
    // echo '</pre>';
    get();

    function get(){
        echo $GLOBALS["str"];
        echo "<br>";
        $GLOBALS["str"] .= "新内容";
        echo $GLOBALS["str"];
    }

    echo '<h2>6、常量</h2>';
    echo '<pre>
    <b>gettype(); 获取类型</b>
    define(); 定义 常量名，常量值
    defined(); 判断常量

    define("VALUE","123456");
    echo VALUE;
    </pre>';
    define("VALUE","123456");
    echo VALUE;

    echo '<h2>7、内置常量  中间有下划线</h2>';
    echo '<pre>
    echo PHP_OS;//获取服务器系统
    echo PHP_VERSION;//获取php版本
    </pre>';
    echo PHP_OS;//获取服务器系统
    echo "<br>";
    echo PHP_VERSION;//获取php版本

    echo '<h2>8、魔术常量  名字前后双下划线 __FDNE__ </h2>';
    echo '<pre>
    echo __LINE__;//获取当前行号
    echo "<br>";
    echo __FILE__;//获取当前访问路径
    echo "<br>";
    function fun(){
        echo  __FUNCTION__;//	函数名称;
    }
    fun();
    echo "<br>";
    class ClassName{
        public function fun(){
            echo __CLASS__;//	类的名称;
            echo "<br>";
            echo __METHOD__;//	类的方法名;
        }
    }
    $str = new ClassName();
    $str->fun();
    </pre>';
    echo __LINE__;//获取当前行号
    echo "<br>";
    echo __FILE__;//获取当前访问路径
    echo "<br>";
    function fun(){
        echo  __FUNCTION__;//	函数名称;
    }
    fun();
    echo "<br>";
    class ClassName{
        public function fun(){
            echo __CLASS__;//	类的名称;
            echo "<br>";
            echo __METHOD__;//	类的方法名;
        }
    }
    $str = new ClassName();
    $str->fun();

    
    echo '<h2>9、数据类型</h2>';
    echo '<pre>
    常用联系（标量类型）
        整型   integer
        浮点   Floating   float
        布尔   boolean
        字符串 String
    复合类型
        数组   array
        对象   object
    特殊类型
        资源   Resources
        空     null
    </pre>';
    
    echo '<h2>10、定界符</h2>';
    echo '<pre>
    $str = <<<A
    sd;ds/.,""
A;
结束行不能有其他字符，会解析变量
    </pre>';
    $str = <<<A
    '";'"
A;
    echo $str;
    
    echo '<h2>11、转义符</h2>';
    echo '<pre>
    把有意义的转为没有意义的  \\ \$ \"
    把没有意义的转为有意义的  \r\n
    \\ = \
    </pre>';

    echo '<h2>12、输出</h2>';
    echo '<pre>
    echo "";// 输出单一类型
    print_r(); //输出数组
    var_dump(); //输出详细信息 数据类型 值
    </pre>';
    $str = 1.0;
    var_dump(is_int($str));//判断是否是整型

    echo '<h2>13、编程套路</h2>';
    echo '<pre>
    开头
    un 删除

    is 判断类型

    get 获取

    set 设置
    </pre>';

    $num = 6 + false + null + "24linux"+true;// 6 + 24 + 1
    echo $num;

    echo '<h2>13、递增</h2>';
    $sum = 1;
    echo $sum++; //输出 1  先输出后加
    echo "<br>";
    $sum = 1;
    echo ++$sum;// 输出2   先加后输出
    echo "<br>";

    for($i=0;$i<10;$i++){
        if($i % 3==2){
            echo $i;
        }
        if(($i+1) % 3==0){
            echo $i."<br>";
        }
    }
    echo "<h2>14、99乘法表</h2>";
    function tab($max){
        $str = "<table border='1'>";
        for($i=1;$i<=$max;$i++){
            $str .="<tr>";
            for($j=1;$j<=$i;$j++){
                $str .="<td>$i x $j = ".($i * $j)."</td>";
            }
            for($j=$i+1;$j<=$max;$j++){
                $str .="<td></td>";
            }
            $str .="</tr>";
        }
        $str .= "</table>";
        return $str;
    }
    echo tab(9);

    echo "<h2>15、星星塔</h2>";
    function get_pyramid($sum){
        $str = "<pre>\n";
        for($i=1;$i<=$sum;$i++){
            for($j=$i;$j<$sum;$j++){
                $str .=" ";
            }
            for($j=1;$j<=$i * 2 - 1;$j++){
                if($j%2==0){
                    $str .=" ";
                }else{
                    $str .="*";
                }
            }
            for($j=$i;$j<$sum;$j++){
                $str .=" ";
            }
            $str .= "\n";//</br>
        }
        $str .= "</pre>";
        return $str;
    }
    echo get_pyramid(10);
    
    echo "<h2>16、5列n行</h2>";
    // $str ="<table border='1'>";
    // for($i=1;$i<63;$i+=5){
    //     $str .= "<tr>";
    //     for($j=$i;$j<$i+5;$j++){ 
    //         $str .= "<td>".($j>=63 ? "":"<img src='images/".($j<10 ? "0".$j : $j).".gif'>")."</td>";
    //     }
    //     $str .= "</tr>";
    // }
    // $str .="</table>";
    function newimg($max,$li = 5,$tag="div"){
        $str = $tag=="" ? "" : "<{$tag}>";
        for($i=1;$i<$max;$i+=$li){
            for($j=$i;$j<$i+$li;$j++){ 
                $str .= ($j>=$max ? "":"<img src='images/".($j<10 ? "0".$j : $j).".gif'>");
            }
            $str .= "</br>";
        }
        if($tag!=""){
            $str .="</{$tag}>";
        }
        return $str;
    }
    echo newimg(63);

    echo "<h2>17、国际棋盘</h2>";
    function Chessboard($max){
        $str ="<table border='1'>";
        for($i=0;$i<$max;$i++){
            $str .= "<tr>";
            for($j=$i;$j<$i+$max;$j++){
                if($j%2==0){
                    $str .= "<td style='background:red;width:50px;height:50px'>红色</td>";
                }else{
                    $str .= "<td style='background:#0000ff;width:50px;height:50px'>蓝色</td>";
                }
            }
            $str .= "</tr>";
        }
        $str .="</table>";
        return $str;
    }
    echo Chessboard(8);
    
    echo "<h2>18、在页面中显示1加到10的过程带结果</h2>";
    $str = "";$sum=0;
    for($i=1;$i<=10;$i++){
        $sum+=$i;
        $str .= $i.($i==10 ? "=":"+");
    }
    echo "<h3>    $str$sum</h3>";

    echo "<h2>19、输出1到10个数字,奇数下面有下划线</h2>";
    $str = "";
    for($i=1;$i<=10;$i++){
        if($i%2==0){
            $str .= $i." ";
        }else{
            $str .= "<u>$i</u> ";
        }
    }
    echo "<h3>    $str</h3>";

    echo "<h2>20、用if判断3个数比大小，取最大。</h2>";
    $a = 10;
    $b = 11;
    $c = 12;
    if($a>$b){
        $d = $a;
    }else{
        $d = $b;
    }
    if($d>$c){
        echo "<h3>    $d</h3>";
    }else{
        echo "<h3>    $c</h3>";
    }
    
    echo "<h2>21、输出1-10，但是12 4567 910 ，注意3和8没有</h2>";
    echo "<p>for 语句</p>";
    echo "<pre>";
    for($i=1;$i<=10;$i++){
        if($i==3 || $i==8) continue;
        echo $i." ";
    }
    echo "</pre>";

    echo "<p>while 语句</p>";
    echo "<pre>";
    $i=1;
    while($i<=10){
        if($i==3 || $i==8){
            $i++;  //跳过循环不会执行后面的  $i++;
            continue;
        }
        echo $i." ";
        $i++;
    }
    echo "</pre>";

    echo "<p>do while 语句</p>";
    echo "<pre>";
    $i=1;
    do{
        if($i==3 || $i==8){
            $i++;
            continue;
        }
        echo $i." ";
        $i++;
    }while($i<=10);
    echo "</pre>";

    echo "<h2>22、运算符</h2>";
    echo '<pre>
    算术  + - * / %
    比较  >  < >= <= == === != <> !==
    三元  bool ? true : false
    逻辑  &&(与)  ||(或)  !(非)
    赋值  =
    拼接  .
    递增、递减  ++  --
    </pre>';

    echo "<h2>23、函数</h2>";
    echo '<pre>
    isset(); //判断有没有值 有 = true
    empty(); //是否为空 空 = true
    getdate(); //获取时间数组    [seconds] => 31        秒
                                [minutes] => 24        分
                                [hours] => 4           时
                                [mday] => 28           日期
                                [wday] => 4            星期
                                [mon] => 2             月
                                [year] => 2019         年
                                [yday] => 58
                                [weekday] => Thursday
                                [month] => February
                                [0] => 1551299071    时间戳
    </pre>';
    var_dump(isset($_POST["id"]));
    var_dump(empty($_POST));
    print_r(getdate());

    switch(2){
        case 1:
            echo "1";
            break;
        case 2:
        echo "2";
        break;
        default: echo "3";
    }
    echo "<br>";
    while(1){
        echo "while";
        break;
    }
    echo "<br>";
    do{
        echo "do while";
        break;
    }while(true);
    echo "<br>";
    for(;true;){
        echo "for";
        break;
    }

    echo "<h2>24、只为了执行函数</h2>";
    echo '<pre>
    $a=1;
    function ex(&$a){
        $a++;
    }
    ex($a);
    echo $a;
    </pre>';
    $a=1;
    function ex(&$a){
        $a++;
    }
    ex($a);
    echo $a;

    echo "<h2>25、函数——默认参数</h2>";
    echo '    function funct($a,$b=0){
        echo $a," > ",$b;
    }
    funct(1);
    ';
    function funct($a,$b=0){
        echo $a," > ",$b;
    }
    funct(1);

    echo "<h2>26、递归函数</h2>";
    echo '<pre>
    递归函数是一个可以重复调用自身的函数，直到满足某个条件为止;
    递归函数常用来解决一些重复的问题;
    递归应该特别注意条件，防止进入死循环中;
    例：
    function repayment($balance, $payment){
        static $count = 1;//静态变量
        $newbalance = $balance - $payment;
        echo $count." ".$newbalance."<br>";
        if($newbalance > 0){
            $count++;
            repayment($newbalance, $payment);
        }
        return $count;
    }
    echo "执行了".repayment(2000, 1000)."次<br>";
    </pre>';
    $count = 1;
    function repayment($balance, $payment){
        // global $count;  //声明全局变量
        static $count = 1;  //静态变量  可以记录值 static
        $newbalance = $balance - $payment;
        // echo $count." ".$newbalance."<br>";
        if($newbalance > 0){
            $count++;
            repayment($newbalance, $payment);
        }
        return $count;
    }
    echo "执行了".repayment(2000, 1000)."次<br>";
    echo "执行完毕";

    echo "<h2>27、引用php文件</h2>";
    echo '<pre>
    include("");   //文件加载出错，后面的代码会执行。
    require("");   //文件加载报致命错，后面的代码不会执行。
    //已下功能一样。但是会判断是否已加载；如果已加载就不会再加载。
    include_once("");
    require_once("");
    </pre>';
    include("include/alert.php");
    confirm("加载完毕");
    echo "执行完毕";
?>