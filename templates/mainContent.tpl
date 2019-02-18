 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/mainContent.css" />  
<script type="text/javascript"  src="js/jquery.min.js"></script>
<!-- 
<link rel="stylesheet" type="text/css" href="style/admin.css" />  
 -->
<script type="text/javascript">
$(function(){
	$(".menu li:eq(0)").addClass("newMenu");
	$(" .menu li").hover(function(){
			$(".menu li").removeClass("newMenu");
			$(this).addClass("newMenu",".newMenu a");
			
		},function(){
			$(this).removeClass("newMenu");	
		})		
		
		/*dropDown menu*/
		$(".childMenu").hide();
		$(".menu li").hover(function(){
			$(this).children(".childMenu").show(200);
		},function(){
			$(this).children(".childMenu").hide(100);
		})
		
		$(".childMenu dd").hover(function(){
			$(this).removeClass("newDd");
			$(this).addClass("newDd");	
		},function(){
			$(this).removeClass("newDd");	
		})



		$(".banner img").hide();
		$(".banner img:eq(0)").show();
		$(".box li").eq(0).css("background-color","red");
		$(".box li").mouseover(function(){
			$(".box li").css("background-color","#333");
			$(this).css("background-color","red")	
			
			n=$(".box li").index(this);
			$(".banner img").hide();
			$(".banner img").eq(n).show();
		})		
		
		
})

</script>

</head>
<body>
{include file='header.tpl'}
	<div id="content">
		<div class="topBanner"></div>
		<div class="nav"></div>
		<div class="list"></div>
	</div>
	
{include file='footer.tpl'}
</body>
</html>