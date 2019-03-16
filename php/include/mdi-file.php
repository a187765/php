<?php
    /**
     * file 操作
     * @param getfilesize (string path)
     * @param getfilename (string filename,bool returntype)
     * @author liang   作者
     */
    // 获取文件大小

    function getfilesize($path){
        if(!file_exists($path)){
            return ;
        }
        $size = filesize($path);
        if($size<1024){
            return $size."字节";
        }
        if($size / 1024<1024){
            return (floor(($size / 1024) * 100) / 100)." kB";
        }
        if($size / pow(1024,2)<1024){
            return (floor(($size / pow(1024,2)) * 100) / 100)." MB";
        }
        return (floor(($size / pow(1024,3)) * 100) / 100)." GB";//3次方
    }

    //获取文件类型（后缀名）
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