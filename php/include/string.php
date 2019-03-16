<?php
    //大小写转换； 把大写转为小写，小写转为大写
    function str_toupper_tolower($a){
        $str = "";
        for($i=0;$i< strlen($a);$i++){
            if($a[$i] == strtolower($a[$i])){
                $str.= strtoupper($a[$i]);
            }else{
                $str.= strtolower($a[$i]);//到小写
            }
        }
        return $str;
    }

    //奇偶数获取； 0 = 偶数，1 = 奇数
    function str_parity($a,$j=0){
        $str = "";
        for($i=$j;$i< strlen($a);$i+=2){
            $str.=$a[$i];
        }
        return $str;
    }
?>