<?php
    header("Content-Type:text/html;charset=utf-8");
    function preArray($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    function preText($con){
        echo '<pre>'.$con.'</pre>';
    }
    
    echo '<pre><h3>
    数组分为：
    索引数组  0、1、2
    关联数组  a、b、c  字符串键值
    </h3></pre>';

    echo "<h2>1、range() 建立一个包含指定范围单元的数组</h2>";
    echo '<pre>
    $num = range(1,5);
    print_r($num);
    ';
    $num = range(1,5);
	print_r($num);
    echo "</pre>";

    echo '<pre>
    $letter = range("a","e");
    print_r($letter);
    ';
    $letter = range('a','e');
	print_r($letter);
    echo "</pre>";

    echo '<h2>2、自定义数组 for/foreach 遍历数组 count($arr) 数组下标 </h2>';
    $fruits = array("0"=>"orange", "1"=>"apple", "2"=>"banana","3"=>"orange", "4"=>"apple", "5"=>"banana");
    preArray($fruits);
    preText('<b>for($i=0;$i< count($arr);$i++){ }</b>');

    for($i=0;$i<count($fruits);$i++){
        echo $i." => ".$fruits[$i]."<br>";
    }
    preText('<b>foreach($arr as $key => $value){ }
    foreach($arr as $value){ }</b>');
    foreach ($fruits as $key => $value) {
        echo $key." => ".$value."<br>";
    }

    echo "<h2>3、释放数组</h2>";
    echo '<pre>
    unset($fruits[1]);//释放数组
    </pre>';

    echo "<h2>4、检查数组中是否包含某个值</h2>";
    echo '<pre>
    var_dump(in_array("apple", $fruits));
    </pre>';
    var_dump(in_array('apple', $fruits));

    echo "<h2>5、 key() 返回数组当前指针元素的索引（键）</h2>";
    echo '<pre>
    $fruits = array("apple", "banana", "crange");
    echo key($fruits);
    print_r($fruits);
    </pre>';
    $fruits = array("apple", "banana", "crange");
    echo key($fruits);

    echo "<h2>6、 current() 返回数组当前指针元素的值</h2>";
    echo '<pre>
    $fruits = array("apple", "banana", "crange");
    echo current($fruits);
    print_r($fruits);
    </pre>';
    $fruits = array("apple", "banana", "crange");
    echo current($fruits);

    echo "<h2>7、 next() 指针遍历数组 推进指针向后一步 reset() 跳到第一个元素</h2>";
    echo '<pre>
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    echo reset($fruits); //将指针指向第一个元素，并返回第一个元素的值
    do{
        echo key($fruits). "=> ".current($fruits);
    }while(next($fruits));
    -----------------------------------------------------------------------------
    reset($fruits);
    echo "&lt;ul>";
    while($v = current($fruits)) {
        echo "&lt;li>".$v."&lt;/li>";
        next($fruits);
    };
    echo "&lt;/ul>";
    </pre>';
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    echo reset($fruits); //将指针指向第一个元素，并返回第一个元素的值
    echo "<pre>";
    do{
		echo key($fruits). '=> '.current($fruits)."<br>";
	}while(next($fruits));
    echo "</pre>";

    reset($fruits);
    echo "<ul>";
    while($v=current($fruits)) {
        echo "<li>".$v."</li>";
        next($fruits);
    };
    echo "</ul>";

    echo "<h2>8、 prev() 指针遍历数组 推进指针向前一步 end() 跳到数组末尾</h2>";
    echo '<pre>
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    echo key($fruits);
    echo end($fruits);  //跳到数组末尾，并返回值
    do{
        echo key($fruits). "=> ".current($fruits);
    }while(prev($fruits));
    </pre>';
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    echo end($fruits);  //跳到数组末尾，并返回值
    echo "<pre>";
    do{
		echo key($fruits). '=> '.current($fruits)."<br>";
	}while(prev($fruits));
    echo "</pre>";

    echo "<h2>9、 each() 遍历数组 推进指针向后一步</h2>";
    echo '<pre>
    返回数组当前指针元素的键和值,并将指针推进一个位置;如果内部指针越过了数组的末端，则 each() 返回 FALSE。 
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    while($arr = each($fruits)){
        echo $arr["key"]." => ".$arr["value"]."&lt;br>";//echo $arr[0]." => ".$arr[1]."&lt;br>";
    }
    </pre>';
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    while($arr = each($fruits)){
        echo $arr["key"]." => ".$arr["value"]."<br>";//echo $arr[0]." => ".$arr[1]."<br>";
    }
    
    echo "<h2>10、 list() 把数组中的值赋给变量  list() each() 遍历数组</h2>";
    echo '<pre>
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    list($val1, $val2, $val3) = $fruits;
    echo $val1;
    echo $val2;
    echo $val3;
    while(list($key, $value) = each($fruits)){
        echo $key." => ".$value."&lt;br>";
    }
    </pre>';
    $fruits = array("apple", "banana", "crange","a"=>"1","b"=>"2","c"=>"3");
    list($val1, $val2, $val3) = $fruits;
    echo $val1;
    echo "<br>";
    echo $val2;
    echo "<br>";
    echo $val3;
    echo "<br>";
    while(list($key, $value) = each($fruits)){
        echo $key." => ".$value."<br>";
    }

    echo "<h2>11、  sort() rsort() 按值 对数组进行升序和降序</h2>";
    echo "<b>升序</b>";
    preText('$arr = array("a"=>"1","b"=>"2","c"=>"3");
    sort($arr);
    preArray($arr);');
    $arr = array("a"=>"1","b"=>"2","c"=>"3");
    sort($arr);
    preArray($arr);

    echo "<b>降序</b>";
    preText('$arr = array("a"=>"1","b"=>"2","c"=>"3");
    rsort($arr);
    preArray($arr);');
    $arr = array("a"=>"1","b"=>"2","c"=>"3");
    rsort($arr);
    preArray($arr);

    echo "<h2>12、 ksort() krsort() 按键 对数组进行升序和降序</h2>";
    echo "<b>升序</b>";
    preText('$arr = array("a"=>"1","b"=>"2","c"=>"3");
    ksort($arr);
    preArray($arr);');
    $arr = array("a"=>"1","b"=>"2","c"=>"3");
    ksort($arr);
    preArray($arr);

    echo "<b>降序</b>";
    preText('$arr = array("a"=>"1","b"=>"2","c"=>"3");
    krsort($arr);
    preArray($arr);');
    $arr = array("a"=>"1","b"=>"2","c"=>"3");
    krsort($arr);
    preArray($arr);
    
    echo "<h2>13、 explode() 字符串转数组</h2>";
    preText('$str = "1,2,3,4,5,6";
    $arr = explode(",",$str); // 分隔符,字符串
    preArray($arr);');
    $str = "1,2,3,4";
    $arr = explode(",",$str);
    preArray($arr);
    
    echo "<b>正则分割</b>";
    preText('$str = "1,2-3,4-5.6";
    $arr = explode(",",$str);
    preArray($arr);');
    $str = "1,2-3,4-5.6";
    $arr = explode(",",$str);
    preArray($arr);
    
    echo "<h2>14、 implode() 数组转字符串</h2>";
    preText('$arr = array("a"=>"1","b"=>"2","c"=>"3");
    $str = implode(",",$arr); // 分隔符,数组
    echo $str;');
    $arr = array("a"=>"1","b"=>"2","c"=>"3");
    $str = implode(",",$arr);
    echo $str;

    echo "<hr>";
    echo "<h2>15、练习1 两个数组合并成一个数组</h2>";
    preText('
    $arr1 = array("A", "B", "C");
    $arr2 = array("X", "Y", "Z");
    如果不用 array_merge()。如何将以上的两个数组合并成一个数组：array("A","B","C","X","Y","Z");
    并对数组进行降序排列。');
    $arr1 = array("A", "B", "C");
    $arr2 = array("X", "Y", "Z");
    // $j = count($arr1);
    for($i=0;$i<count($arr2);$i++){
        // array_push($arr1,$arr2[$i]);//增加数组  array_splice($arr,2,1);//删除数组
        $arr1[] = $arr2[$i];
        // $j++;
    }
    
    // krsort($arr1);
    $arr2 = array_sort($arr1);//降序排列
    preArray($arr2);
    // echo ord("z")."=aaaaaa";
    function array_sort($arr){
        for($i=0;$i<count($arr)-1;$i++){
            for($j=0;$j<count($arr)-1;$j++) {
                $n = $j+1;
                if(ord($arr[$j]) < ord($arr[$n])){
                    $value = $arr[$j];
                    $arr[$j] = $arr[$n];
                    $arr[$n] = $value;
                }
            }
        }
        return $arr;
    }

    function reverse($arr){
        $arr1 = array();
        for($i=count($arr)-1;$i>=0;$i--){
            // array_push($arr1,$arr[$i]);
            $arr1[] = $arr[$i];
        }
        return $arr1;
    }
    
    echo "<h2>16、练习2</h2>";
    preText('
    $arr1 = array("A","B","C","D","E","F");
    如果不用 array_reverse(),如何将$arr1重新构建数组为 $arr2 = array("F","E","D","C","B","A");');
    $arr1 = array("A","B","C","D","E","F");
    $arr2 = reverse($arr1);
    // krsort($arr1);
    preArray($arr2);

    echo "<h2>17、通过二维数组定义下列的数组</h2>";
    preText('
    手机品牌 phone_brand 数组名称
    品牌列表：
    名称(name)   手机屏幕大小(size)   颜色(color)   价格(price)
    iPhone 6S    4英寸                土豪金        4500元
    小米note     5.7英寸              银色          1999元
    坚果         5.5英寸              黑色          999元
    乐视1pro     5.5英寸              银色          1499元');
    $arr = array(
        array("name"=>"iPhone 6S","size"=>"4英寸","color"=>"土豪金","price"=>"4500元"),
        array("name"=>"小米note","size"=>"5.7英寸","color"=>"银色","price"=>"1999元"),
        array("name"=>"坚果","size"=>"5.5英寸","color"=>"黑色","price"=>"999元"),
        array("name"=>"乐视1pro","size"=>"5.5英寸","color"=>"银色","price"=>"1499元"),
    );
    preArray($arr);
    
    echo "<h2>18、通过定义好的数组显示以上的表格形式（可通过表格）</h2>";

    echo "<h2>19、练习5</h2>";
    preText('
    把数组
    $test1= array(
        "id" => array(1,2,3,4),
        "name" => array("小米","魅族","苹果","锤子"),
        "price" => array("1999","1799","3999","3000")
    );
    重构成
    $test2= array(
        "id0" => array(1,"小米","1999"),
        "id1" => array(2,"魅族","1799"),
        "id2" => array(3,"苹果","3999"),
        "id3" => array(4,"锤子","3000")
    );
    ');
    $test1= array(
        "id" => array(1,2,3,4),
        "name" => array("小米","魅族","苹果","锤子"),
        "price" => array("1999","1799","3999","3000")
    );
    $test2= array(
        "id0" => array(1,"小米","1999"),
        "id1" => array(2,"魅族","1799"),
        "id2" => array(3,"苹果","3999"),
        "id3" => array(4,"锤子","3000")
    );
    $test3 = array();
    foreach($test1 as $v){
        foreach ($v as $key => $value) {
            $test3["id$key"][]=$value;
        }
    }
    print_r($test2);
    echo "<br>";
    print_r($test3);

    echo "<h2>20、练习6 冒泡排序</h2>";
    preText('
    其基本思想是：
    通过相邻元素之间的比较和交换使较小的元素逐渐从后向前移动，就像水底的气泡一样逐渐向上冒。
    具体过程如下：
    首先比较d[n]和d[n-1]，若d[n]< d[n-1]，则交换，使较小的元素前移，较大的元素后移；
    接着比较d[n-1]和d[n-2]，以 此类推，直到比较d[2]和d[1]并使较小的元素前移，
    第一趟排序结束,则d[1]为最小的元素。然后在d[2]..d[n]间进行第二趟排序，使第二 小元素前移到d[2]位置；n-1趟排序后，整个冒泡排序结束。

    根据上面的提示，不用PHP自带的函数，将下面数组进行由大到小排序
    $test3 = array(225,220,43,155,562,70,55,150);
    ');
    $test3 = array(225,220,43,155,562,70,55,150);
    for($ni=0;$ni<count($test3)-1;$ni++){
        for($i=0;$i<count($test3)-1;$i++){
            $v = $test3[$i];
            $j= $i+1;
            if($v<$test3[$j]){
                $test3[$i] = $test3[$j];
                $test3[$j] = $v;
            }
        }
    }
    preArray($test3);

    echo "<h2>21、练习7 用高级分离术 </h2>";
    $list = array(
        "市场部"=>array(
            array("1","高某","市场部经理","5000"),
            array("2","罗某","职员","3000"),
            array("3","周某","职员","2400")
        ),
        "产品部"=>array(
            array("1","高某","产品部经理","6000"),
            array("2","罗某","职员","4000"),
            array("3","周某","职员","2300")
        ),
        "财务部"=>array(
            array("1","高某","财务部经理","6000"),
            array("2","罗某","职员","4000"),
            array("3","周某","职员","2300")
        ),
        "咨询部"=>array(
            array("1","罗某","咨询部主管","8000"),
            array("2","谭某","职员","9000"),
            array("3","陈某","职员","8300"),
            array("3","陈某","职员","8300"),
            array("3","陈某","职员","8300")
        )
    );
    preArray($list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php array 数组</title>
</head>
<body>
    <h2>通过定义好的数组显示以上的表格形式（可通过表格）</h2>
    <table border="1">
        <tr>
            <th>名称</th>
            <th>手机屏幕大小</th>
            <th>颜色</th>
            <th>价格</th>
        </tr>
        <?php
            foreach ($arr as $value) {
        ?>
        <tr>
            <?php
                foreach ($value as $v) {
            ?>
            <td><?php echo $v; ?></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>

    <h2>高级分离术</h2>
    <table border="1">
        <?php
            $i=0;
            foreach ($list as $key=>$value) {
                $i++;
                if($i==4){
                    continue;
                }
        ?>
        <tr><th colspan="4"><?php echo $key; ?>10月份工资</th></tr>
        <?php
            foreach($value as $v){
        ?>
        <tr>
        <?php
            foreach($v as $va){
        ?>
            <td><?php echo $va; ?></td>
            <?php } ?>
        </tr>
        <?php }} ?>
    </table>

    <h1>高级分离术</h1>
    <table border="1">
        <tr>
            <th>编号</th>
            <th>姓名</th>
            <th>年龄</th>
        </tr>
        <?php
            $arr = array(
                array("id"=>1,"name"=>"小花","age"=>"18"),
                array("id"=>2,"name"=>"小年","age"=>"20"),
                array("id"=>3,"name"=>"小爱","age"=>"19"),
            );
            foreach ($arr as $v) {
        ?>
        <tr>
            <td><?php echo $v["id"]; ?></td>
            <td><?php echo $v["name"]; ?></td>
            <td><?php echo $v["age"]; ?></td>
        </tr>
        <?php } 
        preText('
        &lt;?php
            $arr = array(
                array("id"=>1,"name"=>"小花","age"=>"18"),
                array("id"=>2,"name"=>"小年","age"=>"20"),
                array("id"=>3,"name"=>"小爱","age"=>"19"),
            );
            foreach ($arr as $v) {
        ?>
        &lt;tr>
            &lt;td>&lt;?php echo $v["id"]; ?>&lt;/td>
            &lt;td>&lt;?php echo $v["name"]; ?>&lt;/td>
            &lt;td>&lt;?php echo $v["age"]; ?>&lt;/td>
        &lt;/tr>
        &lt;?php } ?>');
        ?>
        <!-- <tr>
            <td>1</td>
            <td>小花</td>
            <td>18</td>
        </tr>
        <tr>
            <td>2</td>
            <td>小年</td>
            <td>20</td>
        </tr>
        <tr>
            <td>3</td>
            <td>小爱</td>
            <td>19</td>
        </tr> -->
    </table>
</body>
</html>