<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>main</title>  
<link rel="stylesheet" type="text/css" href="../style/admin.css" />  
<script type="text/javascript"  src="../js/admin_manage.js"></script>
</head>
<body id="main">
	<div class="map">
		管理首页&gt;&gt;管理员管理&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="manage.php?action=show" class="selected">管理员列表</a></li>
		<li><a href="manage.php?action=add">新增管理员</a></li>
		{if $update}
			<li><a href="manage.php?action=update&id={$id}">修改管理员</a></li>
		{/if}
	</ol>
	
	{if $show}
	<table cellspacing="0">
    	<tr>
    		<th>编号</th><th>用户名</th><th>等级</th><th>登录次数</th><th>最近登陆ip</th><th>最近登陆时间</th><th>操作</th>
    	</tr>
    	{if $AllManages}
    	{foreach $AllManages(key,value)}
    	<tr>
    		<td>{@value->id}</td>
    		<td>{@value->admin_user}</td>
    		<td>{@value->level_name}</td>
    		<td>{@value->login_count}</td>
    		<td>{@value->last_ip}</td>
    		<td>{@value->last_time}</td>
    		<td><a href="manage.php?action=update&id={@value->id}" >修改</a> | <a href="manage.php?action=delete&id={@value->id}"  onclick="return confirm('确定删除？') ? true:false">删除</a></td>
    	</tr>
		{/foreach} 
		{else}
		<tr><td colspan="4">对不起，没有任何数据！</td></tr>
		{/if}  
    </table>    
    <div id="page">{$page}</div>
    {/if}
    
    {if $add}
 	<form method="post"  name="add" >
 		<table cellspacing="0" class="left">
 			<tr><td>用&ensp;户&ensp;名：<input  type="text"  name="admin_user" class="text"/> （*不得小于2位，不得大于20位）</td></tr>
 			<tr><td>密&ensp;&ensp;&ensp;&ensp;码：<input  type="password"  name="admin_pass" class="text"/>（*不得小于6位）</td></tr>
 			<tr><td>密码确认：<input  type="password"  name="admin_notpass" class="text"/>（*必须同密码一致）</td></tr>
 			<tr><td>等&ensp;&ensp;&ensp;&ensp;级：<select name="level">
    														{foreach $AllLevel(key,value)}		
    															<option value="{@value->id}">{@value->level_name}</option>
    													    {/foreach}   
 														</select>
 			</td></tr>
 			<tr><td><input  type="submit"  name="send" class="submit"  value="新增管理员"  onclick="return checkAddForm();"/>【<a href=" manage.php?action=show">返回列表</a>】</td></tr>
 		</table>
 	</form>	   
 
    {/if}
    
    
    {if $update}
<form method="post"  name="update">
		<input type="hidden"  value="{$id}" name="id"></input>
		<input type="hidden"   id="level"  value="{$level}"></input>
		<input type="hidden"  value="{$admin_pass}" name="pass"></input>
	    <input type="hidden"  name="prev_url" value="{$prev_url}"  />
 		<table cellspacing="0" class="left">
 			<tr><td>用户名：<input  type="text"  name="admin_user"  value="{$admin_user}"  class="text"  readonly="readonly"/></td></tr>
 			<tr><td>密&ensp;&ensp;码：<input  type="password"  name="admin_pass" class="text"/>（*留空则不修改）</td></tr>
 			<tr><td>等&ensp;&ensp;级：<select name="level">
 																{foreach $AllLevel(key,value)}		
    															<option value="{@value->id}">{@value->level_name}</option>
    													    {/foreach}   
 														</select>
 			</td></tr>
 			<tr><td><input  type="submit"  name="send" class="submit"  value="修改管理员"  onclick="return checkUpdateForm();"/>【<a href=" manage.php?action=show">返回列表</a>】</td></tr>
 		</table>
 	</form>	   
    {/if}
    

    
    
    
    
</body>
</html>