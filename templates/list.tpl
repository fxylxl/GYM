<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/list.css" />  
<script type="text/javascript"  src="js/jquery.min.js"></script>
</head>
<body>
{include file='header.tpl'}
<script type="text/javascript" src="js/jquery.nav.js"></script>

 <div id="list">
     <div class="listnav">
         <ul>
         <li><strong><a href="list.php">全部内容</a></strong></li>
         {if $childnav}
           		 {foreach $childnav(key,value)}
            		<li><strong><a href="list.php?id={@value->id}">{@value->nav_name}</a></strong></li>	
               	{/foreach}
          {/if}
        
        </ul>
     </div>
     
     <div class="showlist">
     	{if $AllListContent}  		
   		{foreach $AllListContent(key,value)}
   	    <script type="text/javascript" src="config/static.php?type=list&id={@value->id}"></script>
   		<dl>
   			<dt><a href="details.php?id={@value->id}" target="_blank"><img  src="{@value->thumbnail}" alt="{@value->title}" /></a></dt>
   			<dd><strong><a href="details.php?id={@value->id}" target="_blank">{@value->title}</a></strong></dd>
   			<dd>日期：{@value->date} 点击率：{@value->count}</dd>
   			<dd class="gray">核心提示：{@value->info}...</dd>
   			
   		</dl> 
   		{/foreach}
		{else}
   		<p>没有任何数据</p>
		{/if}
     
     </div>
     
     
     
 </div>
{include file='footer.tpl'}
</body>
</html>