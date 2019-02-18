<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/details.css" />  
<link rel="stylesheet" type="text/css" href="style/admin.css" />  
<script type="text/javascript" src="config/static.php?id={$id}&type=details"></script>
</head>
<body>

<div class="mainContent">
{include file='header.tpl'}

<div class="main">

    <div id="details">
   		<h3>{$detailstitle}</h3>
   		<div class="d1">时间：{$date}  来源：{$source} 作者：{$author} 点击量：{$count}次</div>
   		<div class="d2">{$info}</div>
   		<div class="d3">{$content}</div>
    </div>
   
</div>
{include file='footer.tpl'}
</div>
</body>
</html>