<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>我的留言本</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">我的留言本</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php 
            header("content-type:text/html;charset=utf-8;");
            include("../include/alert.php");
            include("../include/mdi-file.php");

            $filename = "data.txt";//数据库文件名
            $imgname = "images/";//图片前缀名
            $imgInpName = "imgname";//文件上传的 input name
            
            if($_POST){
                $username = isset($_POST["username"]) && !empty($_POST["username"]) ? trim($_POST["username"]) : "";
                $content = isset($_POST["content"]) && !empty($_POST["content"]) ? $_POST["content"] : "";
                $state = 0;
                if(strlen($username)>1 && strlen($username)<=16 && strlen($content)> 5){
                    $img = "";
                    if($_FILES){
                        if($_FILES[$imgInpName]["error"] == 0 && $_FILES[$imgInpName]["size"] / pow(1024,2) < 2 && is_img_file($_FILES[$imgInpName]["tmp_name"])){
                            $img = time().strrchr($_FILES[$imgInpName]["name"],".");
                            while(file_exists($imgname.$img)){//判断是否存在文件，如果存在将使用随机数重新生成文件名
                                $img = time()."-".rand(1,100).strrchr($_FILES[$imgInpName]["name"],".");
                            }
                            if(!move_uploaded_file($_FILES[$imgInpName]["tmp_name"],$imgname.$img)){
                                $img = "";//保存失败
                            }
                        }
                    }
                    $fh = fopen($filename,"a");
                    $state = fwrite($fh,$img."||".str_replace("\r\n","<br>",$username)."||".time()."||".str_replace("\r\n","<br>",$content)."\r\n");//成功返回字节数，失败返回0
                    fclose($fh);
                }
                if($state){
                    alert("发表成功");
                }else if(strlen($username)<2){
                    alert("昵称长度不足，应为2-16字符");
                }else if(strlen($username)>16){
                    alert("昵称长度应为2-16字符");
                }else if(strlen($content)<6){
                    alert("发布内容长度最少为6字符");
                }else{
                    alert("发表失败");
                }
            }

            $farr = file_exists($filename) ? file($filename) : array();
            foreach($farr as $kye => $value){
                $v = explode("||",$value);
                if(count($v) < 4){
                    continue;
                }
        ?>
        <div class="media margin-top-lg chat-panel">
            <div class="media-img pull-left">
                <img alt="avatar" class="img-responsive" src="<?php echo $imgname.$v[0]; ?>">
            </div>
            <div class="media-body">
                <div class="media-content">
                    <h4 class="media-heading"><?php echo $v[1] ?> :</h4>
                    <p class="media-timestamp"><?php echo date("Y.m.d H:i:s",intval($v[2])); ?></p>
                    <?php echo $v[3]; ?>
                </div>
            </div>
        </div>
        <?php } ?>


        <nav class="text-center">
            <ul class="pagination">
                <li class="disabled"><a aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>


        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title"> <span class="glyphicon glyphicon-pencil"></span> 我要留言 </div>
            </div>
            <div class="panel-body">
                <form action="index.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputStandard">图片:</label>
                        <div class="col-lg-10">
                            <span class="form-control" style="padding:2px;">
                            <input type="file" placeholder="" id="inputStandard" name="imgname"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputStandard">昵称:</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="" class="form-control" id="inputStandard" name="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">内容:</label>
                        <div class="col-lg-10">
                            <textarea rows="3" id="textArea" class="form-control" name="content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <input type="submit" value="提交" name="dosubmit" class="submit btn btn-info">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; wengdo 2015</p>
        </footer>

    </div> <!-- /container -->
</body>
</html>