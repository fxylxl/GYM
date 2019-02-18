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
		内容管理&gt;&gt;设置网站导航&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="nav.php?action=show" class="selected">导航列表</a></li>
		<li><a href="nav.php?action=add">新增导航</a></li>
		{if $update}
			<li><a href="nav.php?action=update&id={$id}">修改导航</a></li>
		{/if}
		{if $addchild}
			<li><a href="nav.php?action=addchild&id={$id}">新增子导航</a></li>
		{/if}
	    {if $showchild}
			<li><a href="nav.php?action=showchild&id={$id}">子导航列表</a></li>
		{/if}
	</ol>
	
	{if $show}
	<table cellspacing="0">
    	<tr>
    		<th>编号</th><th>导航名称</th><th>描述</th><th>子类</th><th>操作</th>
    	</tr>
    	{if $AllNav}
    	{foreach $AllNav(key,value)}
    	<tr>
    		<td>{@value->id}</td>
    		<td>{@value->nav_name}</td>
    		<td>{@value->nav_info}</td>
    		<td><a href="nav.php?action=showchild&id={@value->id}">查看</a> | <a href="nav.php?action=addchild&id={@value->id}">增加子类</a></td>
    		<td><a href="nav.php?action=update&id={@value->id}" >修改</a> | <a href="nav.php?action=delete&id={@value->id}"  onclick="return confirm('确定要删除吗？') ? true:false">删除</a></td>
    	</tr>
		{/foreach}   
		{else}
		<tr><td colspan="5">对不起，没有任何数据！</td></tr>
		{/if}
		
    </table>   
    <div id="page">{$page}</div>
     
    {/if}
  
  {if $showchild}
	<table cellspacing="0">
    	<tr>
    		<th>编号</th><th>导航名称</th><th>描述</th><th>操作</th>
    	</tr>
    	{if $AllChildNav}
    	{foreach $AllChildNav(key,value)}
    	<tr>
    		<td>{@value->id}</td>
    		<td>{@value->nav_name}</td>
    		<td>{@value->nav_info}</td>
    		<td><a href="nav.php?action=update&id={@value->id}" >修改</a> | <a href="nav.php?action=delete&id={@value->id}"  onclick="return confirm('确定要删除吗？') ? true:false">删除</a></td>
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
 	<input type="hidden" value="0"  name="pid" />
 		<table cellspacing="0" class="left">
 			<tr><td>导航名称：<input  type="text"  name="nav_name" class="text"/>（*导航名称不得小于2位，不得大于20位！）</td></tr>
 			<tr><td><textarea name="nav_info" ></textarea>（*描述不得大于200位！）</td></tr>
 			<tr><td><input  type="submit"  name="send" class="submit level"  value="新增导航"  onclick="return checkAddForm();"/>【<a href="nav.php?action=show">返回列表</a>】</td></tr>
 		</table>
 	</form>	   
    {/if}
    
    
     {if $addchild}
 	<form method="post"  name="add">
 		<input type="hidden" value="{$pid}"  name="pid" />
 		<table cellspacing="0" class="left">
 			<tr><td>上级导航：<strong>{$prev_name}</strong></td></tr>
 			<tr><td>导航名称：<input  type="text"  name="nav_name" class="text"/>（*导航名称不得小于2位，不得大于20位！）</td></tr>
 			<tr><td><textarea name="nav_info" ></textarea>（*描述不得大于200位！）</td></tr>
 			<tr><td><input  type="submit"  name="send" class="submit level"  value="新增子导航"  onclick="return checkAddForm();"/>【<a href="nav.php?action=show">返回列表</a>】</td></tr>
 		</table>
 	</form>	   
    {/if}
    
    
    
      {if $update}
 	<form method="post"  name="add">
 	<input type="hidden"  value="{$id}" name="id"></input>
 		<table cellspacing="0" class="left">
 			<tr><td>导航名称：<input  type="text"  name="nav_name"  value=" {$nav_name}"  class="text"/>（*导航名称不得小于2位，不得大于20位！）</td></tr>
 			<tr><td><textarea name="nav_info" >{$nav_info}</textarea>（*描述不得大于200位！）</td></tr>
 			<tr><td><input  type="submit"  name="send" class="submit level"  value="修改导航"  onclick="return checkUpdateForm();"/>【<a href="nav.php?action=show">返回列表</a>】</td></tr>
 		</table>
 	</form>	   
    {/if}
</body>
</html>