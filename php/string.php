<?php
    header("content-type:text/html;charset=utf-8");
    function preArray($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    function preText($con){
        echo '<pre>'.$con.'</pre>';
    }
    function h2($con){
        echo '<h2>'.htmlspecialchars($con).'</h2>';
    }
    function br($con=""){
        echo $con.'<br>';
    }

    h2('1、 printf() 格式化字符串');
    preText('
    %b二进制输出				  //brianry
    %d整数输出				 //data
    %f浮点数输出				  //float
    %s原字符串输出  				 //string
    $str = "123 test";
    printf("整数：%d", $str);
    printf("浮点数：%.2f", $str);
    printf("字符串：%s", $str);
    $str = "%s111%s222%s333";
    printf($str, "aaa","bbb","ccc");
    <b>sprintf() 功能与 printf() 相同，但不会直接输出结果;</b>');
    $str = "123 test";
    printf("二进制：%b", $str).br();
    printf("整数：%d", $str).br();
    printf("浮点数：%.2f", $str).br();
    printf("原字符串：%s", $str).br();
    $str = "%s111%s222%s333";
    printf($str, "aaa","bbb","ccc").br();

    h2('2、 strpos() 查找字符串 strrpos() 倒找字符串');
    preText('
        int strpos ( string haystack, mixed needle [, int offset] )
        strpos()函数在 haystack 中以区分大小写的方式找到 needle <b> 第一次</b>出现的位置;如果没有找到则返回FALSE;
        可选参数offset 指定开始查找的位置;
    例
    echo strpos("Hello world!","wo");
    <b> stripos() 与 strpos() 功能相同，只是查找时不区别大小写;</b>
    strrpos() <b> 最后一次</b>出现的位置;如果没有找到则返回FALSE;
    可选参数offset 指定开始查找的位置;
    ');
    br(strpos("Hello world!","wo"));

    h2('3、 str_replace() 替换字符串');
    preText('
	mixed str_replace ( mixed search, mixed replace, mixed subject [, int &count] )
	str_replace()函数在subject中以区分大小写的方式搜索 search ，用replace替换找到的所有内容; 如果没有找到search,则subject保持不变;
	如果定义了可选参数 count 则只替换subject中count个search
    例：$str = "test@163.com";
    echo str_replace("163", "qq", $str);
    echo str_replace("t", "a", $str,$count);
    echo $count;//被替换了多少个
	<b> str_ireplace() 与 str_replace() 功能相同，只是不区分大小写;</b>');
    $str = "test@163.com";
    br(str_replace("163", "qq", $str));
    br(str_replace("t", "a", $str,$count));
    br($count);

    h2('4、 substr() 截取字符串');
    preText('
    string substr ( string string, int start [, int length] )
    从start位置取出length长度的字符，字符串位置开始值为零;
    如果没有指定length，那么默认一直到字符串末尾;
    echo substr("Hello world", -5,2);
    echo substr("Hello world", -5);
    echo substr("Hello world", 6);
    echo substr("hello world", 6, 5);');
    br(substr("Hello world", -5,2));
    br(substr("Hello world", -5));
    br(substr("Hello world", 6));
    br(substr("hello world", 6, 5));

    h2('5、 strstr() 截取字符串 strrchr() 倒截取字符串');
    preText('
    string strstr ( string haystack, string needle )
    strstr() 函数搜索一个字符串在另一个字符串中的<b>第一次</b>出现。
    该函数返回字符串的其余部分（从匹配点）。如果未找到所搜索的字符串，则返回 false。
    例： echo strstr("Hello world!","world");
    <b> stristr() 与 strstr() 功能相同，只是不区分大小写;</b>
    strrchr() 函数搜索一个字符串在另一个字符串中的<b>最后一次</b>出现。
    该函数返回字符串的其余部分（从匹配点）。如果未找到所搜索的字符串，则返回 false。
    ');
    br(strstr("Hello world!","world"));

    h2('6、 ltrim() 删除左边字符串  rtrim() 删除右边字符 trim() 删除两边字符串');
    preText('
    ltrim()
        string ltrim ( string str [, string charlist] )
        ltrim 函数删除字符串左侧空格或其他预定义字符;
    rtrim()
        string rtrim ( string str [, string charlist] )
        rtrim 函数删除字符串右侧空格或其他预定义字符;
    trim()
        函数删除字符串两侧空格或其他预定义字符;
    如果未设置charlist参数，则删除以下字符：
    "\0"	NULL 
    "\t"     制表符 
    "\n"     换行 
    "\x0B"   垂直制表符 
    "\r"     回车 
    " "      空格 
    例：
    $str = "       Hello World!";
    echo ltrim($str);');
    $str = "       Hello World!";
    br(ltrim($str));

    h2('7、 strlen() 获取字符串长度');
    preText('echo strlen("frd");');
    br(strlen("frd"));

    h2('8、 大小写转换');
    preText('
    strtolower() 将字符串转换为小写字母
        echo strtolower("aBcdkJKH");
    strtoupper() 将字符串转换为大写字母
        echo strtoupper("aBcdkJKH");
    ');
    br(strtolower("aBcdkJKH"));
    br(strtoupper("aBcdkJKH"));

    h2('9、 strrev() 反转字符串');
    h2('10、 nl2br() 将字符串中换行 (\n) 转换成 HTML 换行标签 (<br />)');
    
    h2('11、 strip_tags() 删除字符串中的HTML XML PHP 标签');
    preText(htmlspecialchars('
    string strip_tags ( string str [, string allowable_tags] ) 
    可选参数 allowable_tags 指定要保留的标签;
    例：
    $str = "test <a href="http://www.163.com">163</a><br>";
    echo strip_tags($str);'));
    $str = 'test <a href="http://www.163.com">163</a><br>';
    br(strip_tags($str));

    h2('12、 htmlspecialchars() 函数把一些预定义的字符转换为 HTML 实体');
    preText(htmlspecialchars('
    预定义的字符是：
    & （和号）   成为  &amp; 
    " （双引号） 成为  &quot; 
    \' （单引号） 成为  &#039; 
    < （小于）   成为  &lt; 
    > （大于）   成为  &gt; 
    例：
    $str = "<p> 这是一个段落 </p>";
    echo htmlspecialchars($str);'));
    $str = "<p> 这是一个段落 </p>";
    br(htmlspecialchars($str));

    h2('13、 md5() 加密 ');


    h2('练习1');
    preText('用2种以上的方法获取文件的后缀名
    比如，test.abc.jpg获取jpg');
    $fileName = "test.abc.jpg";
    br("1)");
    br(substr(strrchr($fileName,"."),1));
    br("2)");
    br(ltrim(strrchr($fileName,"."),"."));
    br("3)");
    br(substr($fileName,strrpos($fileName,".")+1));


    h2('练习2');
    preText('反转字符串 $a = adfjdlks; 输出skldjfda(至少两种方法)
    $a = "adfjdlks";
    br(strrev($a));
    $str = "";
    for($i=strlen($a)-1;$i>=0;$i--){
        $str.= $a[$i];
    }
    br($str);
    ');
    $a = "adfjdlks";
    br(strrev($a));
    $str = "";
    for($i=strlen($a)-1;$i>=0;$i--){
        $str.= $a[$i];
    }
    br($str);


    h2('练习3');
    preText('输出偶数位的字符串 $a = adfjdlksa; 输出 afdka
    $a = "adfjdlksa";
    //奇偶数获取； 0 = 偶数，1 = 奇数
    function str_parity($a,$j=0){
        $str = "";
        for($i=$j;$i< strlen($a);$i+=2){
            $str.=$a[$i];
        }
        return $str;
    }
    br(str_parity($a));
    ');
    $a = "adfjdlksa";
    //奇偶数获取； 0 = 偶数，1 = 奇数
    function str_parity($a,$j=0){
        $str = "";
        for($i=$j;$i< strlen($a);$i+=2){
            $str.=$a[$i];
        }
        return $str;
    }
    br(str_parity($a));

    h2('练习4');
    preText('有一个字符串，把里面的每个字符大写转小写，小写转大写
    $a = "aFAasdKEa";
    输出AfaASDkeA
    function toupper_tolower($a){
        $str = "";
        for($i=0;$i< strlen($a);$i++){
            if($a[$i] == strtolower($a[$i])){
                $str.= strtoupper($a[$i]);
            }else{
                $str.= strtolower($a[$i]);//小写
            }
        }
        return $str;
    }
    $a = "aFAasdKEa";
    br(toupper_tolower($a));
    ');
    function toupper_tolower($a){
        $str = "";
        for($i=0;$i< strlen($a);$i++){
            if($a[$i] == strtolower($a[$i])){
                $str.= strtoupper($a[$i]);
            }else{
                $str.= strtolower($a[$i]);//小写
            }
        }
        return $str;
    }
    $a = "aFAasdKEa";
    br(toupper_tolower($a));
?>