<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/usercenter.css" />  
<script type="text/javascript"  src="js/jquery.min.js"></script>

</head>
<body>

{include file='header.tpl'}
	<script type="text/javascript" src="js/jquery.nav.js"></script>
	
	<div id="usercenter">
	
		<div class="sidebar">
			<ul>
				<li>全部功能</li>
				<li><a href="buycart.php?action=show" target="_blank">我的购物车</a></li>
				<li class="red">已买到的宝贝</li>
				<li><a href="collection.php?action=show" target="_blank">我的收藏</li>
				<li>我的足迹</li>				
			</ul>
		</div>
		<div class="content">
			<ul>
				<li>所有订单</li>
				<li>待付款</li>
				<li>代发货</li>
				<li>待评价</li>				
			</ul>
		</div>
	</div>

{include file='footer.tpl'}

</body>
</html>