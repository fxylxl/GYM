 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>main</title>  
<link rel="stylesheet" type="text/css" href="../style/admin.css" />  
<script type="text/javascript"  src="../js/admin_level.js"></script>
</head>
<body id="main">
	<div class="map">
		管理首页&gt;&gt;等级管理&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="level.php?action=show" class="selected">等级列表</a></li>
		<li><a href="level.php?action=add">新增等级</a></li>
		{if $update}
			<li><a href="level.php?action=update&id={$id}">修改等级</a></li>
		{/if}
	</ol>
	
	{if $show}
	<table cellspacing="0">
    	<tr>
    		<th>编号</th><th>等级名称</th><th>描述</th><th>操作</th>
    	</tr>
    	{if $AllLevel}
    	{foreach $AllLevel(key,value)}
    	<tr>
    		<td>{@value->id}</script></td>
    		<td>{@value->level_name}</td>
    		<td>{@value->level_info}</td>
    		<td><a href="level.php?action=update&id={@value->id}" >修改</a> | <a href="level.php?action=delete&id={@value->id}"  onclick="return confirm('确定要删除吗？') ? true:false">删除</a></td>
    	</tr>
		{/foreach} 
		{else}
		<tr><td colspan="4">对不起，没有任何数据！</td></tr>
		{/if}  
    </table> 
    <div id="page">{$page}</div>   
    {/if}
    
    {if $add}
 	<form method="post"  name="add">
 		<table cellspacing="0" class="left">
 			<tr><td>等级名称：<input  type="text"  name="level_name" class="text"/>（*等级名称不得小于2位，不得大于20位！）</td></tr>
 			<tr><td><textarea name="level_info" ></textarea>（*描述不得大于200位！）</td></tr>
 			<tr><td><input  type="submit"  name="send" class="submit level"  value="新增等级"  onclick="return checkAddForm();"/>【<a href=" level.php?action=show">返回列表</a>】</td></tr>
 		</table>
 	</form>	   
 
    {/if}
    
    
    {if $update}
 	<form method="post" name="update">
 	 <input type="hidden"  value="{$id}" name="id"></input>
 		<table cellspacing="0" class="left">
 			<tr><td>等级名称：<input  type="text"  name="level_name" class="text"  value="{$level_name}"/></td></tr>
 			<tr><td><textarea name="level_info" rows="" cols="">{$level_info}</textarea></td></tr>
 			<tr><td><input  type="submit"  name="send" class="submit level"  value="修改等级"  onclick="return checkUpdateForm();"/>【<a href=" level.php?action=show">返回列表</a>】</td></tr>
 		</table>
 	</form>	
 	
    {/if}
    

    
    
    
    
</body>
</html>