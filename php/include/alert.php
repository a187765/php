<?php
    // alert("tru","http://www.baidu.com");//http://localhost/B1901/20190321/include/alert.php
    function alert($con,$url="",$js=""){
        echo "<script>alert('{$con}');";
        if($url<0){
            echo "window.history.go({$url});";//返回上n页  window.history.go(-1);
        }else if($url){
            echo "window.location.href='{$url}';";//跳转指定页面
        }
        echo $js."</script>";
        // exit;
    }

    //参数3= 确认时执行的代码，默认没有。参数4 = 取消时执行的代码，默认没有。
    function confirm($con,$url="",$js="",$js2=""){
        echo "<script>var bool = confirm('{$con}');if(bool){";
        if($url<0){
            echo "window.history.go({$url});";//返回上n页  window.history.go(-1);
        }else if($url){
            echo "window.location.href='{$url}';";//跳转指定页面
        }
        echo "$js}else{{$js2}}</script>";
    }

?>