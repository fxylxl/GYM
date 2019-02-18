<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/introduce.css" />
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("li:eq(0)").addClass("newMenu");
	$("li").hover(function(){
			$("li").removeClass("newMenu");
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
		
		
})

</script>
</head>
<body>

{include file='header.tpl'}

<div id="intro">
	<div class="top">
		<div class="us">
			关于我们<br /><span>ABOUT US</span>
		</div>
	</div>
	
	<div class="content">
		<div class="word">　　西安美格菲健身中心隶属西安杰菲特体育用品有限公司，
		由陕西五环胜道运动产业开发有限公司投资及管理，阿迪达斯赞助签约的大型会员制会所。
		是西北首家会员制大型专业运动健身俱乐部，总营业面积达1万多平米，会员近万名。
		2003年6月开业至今，先后在高新、钟楼、省体育场设有分店，并正在筹建分别位于长丰
		国际广场与锦业时代广场的两家新的店面，我们以先进的健身器材、国际化的管理模式、配
		合专业的课程，加上一流的管理团队和服务意识，从而营造了一个动感阳光、充满朝气与
		活力的时尚健身会所。<br />　　 美格菲秉承“阳光、专业、健康”的运动理念，以专业、积极、探索
		、进取的经营理念为会员提供全面、高素质、专业的健身服务。</div>
		<div class="pic">
			<img src="images/banner/banner_01.png"></img>
		</div>
	</div>

</div>


{include file='footer.tpl'}

</body>
</html>