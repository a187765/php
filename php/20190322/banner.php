<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>js 特效</title>
	<script src="js/jquery-1.11.3.min.js"></script>
	<style>
	ul{
		margin:0; padding:0;
		list-style:none;
	}
	.con{
		border:1px solid red;
		margin:0 auto;
		width:620px;
		height: 188px;
		position: relative;
		overflow: hidden;
	}
	.con ul{
		width: 930px;
		overflow: hidden;
		position: absolute;
		left:0; top:0;
	}
	.con ul li{
		width: 300px; height: 188px;
		float:left;
		padding:0 5px;
	}
	.left,.right{
		background: red;
		position: absolute;
		top:40%;
		z-index: 99;
	}
	.left{
		left:10px;
	}
	.right{
		right:10px;
	}
	.demo{
		width: 100px; height: 30px;
		background: red;
	}
	input{
		display:none;
	}
	</style>
</head>
<body>




	<div class="demo">文件上传</div>
	<input type="file" name="" id="">





	<div class="con">
		<a href="javascript:;" class="left">
			<img src="images/left.png" alt="">
		</a>
		<a href="javascript:;" class="right">
			<img src="images/right.png" alt="">
		</a>
		<ul>
			<li>
				<img src="images/car-1.jpg" alt="">
			</li>
			<li>
				<img src="images/car-2.jpg" alt="">
			</li>
			<li>
				<img src="images/car-3.jpg" alt="">
			</li>
			
		</ul>
	</div>
</body>
</html>
<script>
	// 文件上传之模拟事件
	$('.demo').click(function(){
		$('input').trigger('click');
	});



	// 文件上传之模拟事件
	var imgW = $('.con ul li').width()+10;
	
	$('.right').click(function(){
		$('.con ul').stop().animate({left:'-'+imgW+'px'},500,function(){
			$('.con ul').append($('.con ul li:first'));
			$(this).css({left:0});
			
		});
	});

	$('.left').click(function(){
		$('.con ul').prepend($('.con ul li:last'));
		$('.con ul').css({left:'-'+imgW+'px'});
		$('.con ul').animate({left:0},500);
		
	});
</script>