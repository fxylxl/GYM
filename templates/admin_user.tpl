 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>main</title>  
<link rel="stylesheet" type="text/css" href="../style/admin.css" />  
<script type="text/javascript"  src="../js/admin_content.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body id="main">
	<div class="map">
		会员管理&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="content.php?action=show" class="selected">会员列表</a></li>
	</ol>
	
	{if $show}
	<table cellspacing="0">
    	<tr>
    		<th>编号</th><th>用户名</th><th>email</th><th>头像</th><th>注册时间</th><th>操作</th>
    	</tr>
    	{if $UserContent}
    	{foreach $UserContent(key,value)}
    	<tr>
    		<td><script type="text/javascript">document.write({@key+1}+{$num});</script></td>
    		<td>{@value->user}</a></td>
    		<td>{@value->email}</td>
    		<td><img src="{@value->face}" /></td>
    		<td>{@value->date}</td>
    		<td><a href="#" >修改</a> | <a href="#"  onclick="return confirm('确定删除？') ? true:false">删除</a></td>
    	</tr>
		{/foreach} 
		{else}
		<tr><td colspan="6">对不起，没有任何数据！</td></tr>
		{/if}  
    </table> 
        <div id="page">{$page}</div>     
 	{/if}  
</body>
</html>