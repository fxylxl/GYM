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
		内容管理&gt;&gt;查看文档列表&gt;&gt;<strong id="title">{$title}</strong>
	</div>
	<ol>
		<li><a href="content.php?action=show" class="selected">文档列表</a></li>
		<li><a href="content.php?action=add">新增文档</a></li>
		{if $update}
			<li><a href="content.php?action=update&id={$id}">修改文档</a></li>
		{/if}
	</ol>
	
	{if $show}
	<table cellspacing="0">
    	<tr>
    		<th>编号</th><th>标题</th><th>作者</th><th>文档类别</th><th>浏览次数</th><th>发布时间</th><th>操作</th>
    	</tr>
    	{if $SearchContent}
    	{foreach $SearchContent(key,value)}
    	<tr>
    		<td><script type="text/javascript">document.write({@key+1}+{$num});</script></td>
    		<td><a href="../details.php?id={@value->id} " target="_blank" title="{@value->title}">{@value->title}</a></td>
    		<td>{@value->author}</td>
    		<td>{@value->nav_name}</td>
    		<td>{@value->count}</td>
    		<td>{@value->date}</td>
    		<td><a href="content.php?action=update&id={@value->id}" >修改</a> | <a href="content.php?action=delete&id={@value->id}"  onclick="return confirm('确定删除？') ? true:false">删除</a></td>
    	</tr>
		{/foreach} 
		{else}
		<tr><td colspan="7">对不起，没有任何数据！</td></tr>
		{/if}  
    </table>    
    <form action="?" method="get">
    <div id="page">
    		{$page}
    		<input type="hidden"  name="action" value="show"/>
    		<select name="nav" class="select">
    			<option value="0">默认全部</option>
    			{$nav}
    		</select>
    		<input value="查询"  type="submit"/>
    </div>
    </form>
	{/if}
	
	{if $add}
		<form name="content" method="post" action="?action=add">
    		<table cellspacing="0"  class="content"> 	
            	<tr><th><strong>发布一条新文档</strong></th></tr>
    			<tr><td>文档标题：<input  type="text"  name="title" value="{$titlec}" class="text"/><span class="red">【必填】</span>（* 标题2-30个字符之间）</td></tr>
    		    <tr><td>栏　　目：<select name="nav" ><option value="">请选择一个栏目类别</option>{$nav}</select><span class="red">【必选】</span></td></tr>
    	    <!--  <tr><td>定义属性：
    											<input type="checkbox" name="attr[]" value="头条" />头条
    											<input type="checkbox" name="attr[]" value="推荐" />推荐
    											<input type="checkbox" name="attr[]" value="加粗" />加粗
    											<input type="checkbox" name="attr[]" value="跳转" />跳转
    			</td></tr>
    			-->	
    			<tr><td>TAG标签：<input  type="text"  name="tag" class="text"/>（* 每个标签用'，'隔开 总长不超过30）</td></tr>
    			<tr><td>关&nbsp;&nbsp;键&nbsp;&nbsp;字：<input  type="text"  name="keyword" class="text"/>（* 每个关键字用'，'隔开 总长不超过30）</td></tr>
    			<tr><td>缩&nbsp;&nbsp;略&nbsp;&nbsp;图：<input  type="text"  name="thumbnail" class="text"  readonly="readonly"/>
    																				    <input  type="button"  value="上传缩略图" onclick="centerWindow('../templates/upfile.html','upfile','500','150')"/>（* 缩略图必须是jpg,gif,png格式,小于2MB）
    																					<img    name="pic"   style="display:none"/>
    			</td></tr>
    			<tr><td>文章来源：<input  type="text"  name="source" class="text"/>（* 不能大于20位）</td></tr>
    			<tr><td>作　　者：<input  type="text"  value="{$author}"name="author" class="text"/>（* 不能大于10位）</td></tr>
    			<tr><td><span class="middle">内容摘要：</span><textarea  name="info" ></textarea><span class="middle">（* 不能大于200位）</span></td></tr>
    			<tr class="ckeditor"><td><textarea id="text1"  name="content" class="ckeditor" ></textarea></td></tr>
            	<tr><td>评论选项：<input  type="radio"  name="commend" value="1" checked="checked"/>允许评论
            									<input  type="radio"  name="commend" value="0" />禁止评论
            					　　　　浏览次数：<input  type="text"  name="count"  class="text small" value="100"/>
            	</td></tr>
            	<tr><td>物品价格：<input  type="text"  name="gold"  class="text small"  />
            	</td></tr>
            	<tr><td>阅读权限：<select name="limit">
            											<option>开放浏览</option>
            											<option>初级会员</option>
            											<option>高级会员</option>
            									</select>
								　　　  标题颜色：<select name="color">
                										<option>默认颜色</option>
                										<option style="color: red;">红色</option>
                										<option style=" color: blue;">蓝色</option>
                										<option style=" color: orange">橙色 </option>
												</select>
            	</td></tr>
            	<tr><td><input  type="submit"  name="send"  onclick="return checkAddContent();" value="发布文档"/><input type="reset" value="重置" /></td></tr>
        		<tr><td>	</td></tr>
        	</table> 
	  </form>
	{/if}
	
	{if $update}
	<form name="content" method="post" action="?action=update">
	<input type="hidden"  name="id" value="{$id}"  />
	<input type="hidden"  name="prev_url" value="{$prev_url}"  />
	   		<table cellspacing="0"  class="content"> 	
            	<tr><th><strong>发布一条新文档</strong></th></tr>
    			<tr><td>文档标题：<input  type="text"  name="title"   value="{$titlec}"   class="text"/><span class="red">【必填】</span>（* 标题2-30个字符之间）</td></tr>
    		    <tr><td>栏　　目：<select name="nav" ><option value="">请选择一个栏目类别</option>{$nav}</select><span class="red">【必选】</span></td></tr>
    	    <!--  <tr><td>定义属性：
    											<input type="checkbox" name="attr[]" value="头条" />头条
    											<input type="checkbox" name="attr[]" value="推荐" />推荐
    											<input type="checkbox" name="attr[]" value="加粗" />加粗
    											<input type="checkbox" name="attr[]" value="跳转" />跳转
    			</td></tr>
    			-->	
    			<tr><td>TAG标签：<input  type="text"  value="{$tag}"  name="tag" class="text"/>（* 每个标签用'，'隔开 总长不超过30）</td></tr>
    			<tr><td>关&nbsp;&nbsp;键&nbsp;&nbsp;字：<input  type="text"  value="{$keyword}"   name="keyword" class="text"/>（* 每个关键字用'，'隔开 总长不超过30）</td></tr>
    			<tr><td>缩&nbsp;&nbsp;略&nbsp;&nbsp;图：<input  type="text"  value="{$thumbnail}"   name="thumbnail"  class="text"  readonly="readonly"/>
    																				    <input  type="button"  value="上传缩略图" onclick="centerWindow('../templates/upfile.html','upfile','500','150')"/>（* 缩略图必须是jpg,gif,png格式,小于2MB）
    																					<img name="pic" src="{$thumbnail}" style="display:block;"/>
    			</td></tr>
    			<tr><td>文章来源：<input  type="text"  value="{$source}"   name="source" class="text"/>（* 不能大于20位）</td></tr>
    			<tr><td>作　　者：<input  type="text"  value="{$author}"name="author" class="text"/>（* 不能大于10位）</td></tr>
    			<tr><td><span class="middle">内容摘要：</span><textarea name="info" >{$info}</textarea><span class="middle">（* 不能大于200位）</span></td></tr>
    			<tr class="ckeditor"><td><textarea id="text1"   name="content" class="ckeditor" >{$content}</textarea></td></tr>
            	<tr><td>评论选项：<input  type="radio"  name="commend" value="1" checked="checked"/>允许评论
            									<input  type="radio"  name="commend" value="0" />禁止评论
            					　　　　浏览次数：<input  type="text"  value="{$count}"   name="count"  class="text small" value="100"/>
            	</td></tr>
            	<tr><td>物品价格：<input  type="text"  value="{$gold}"  name="gold"  class="text small"  />
            						　　　阅读权限：<select name="limit" class="text small" >
            											<option>开放浏览</option>
            											<option>初级会员</option>
            											<option>高级会员</option>
            									</select> 	
            	</td></tr>
            	
            	<tr><td><input  type="submit"  name="send"  onclick="return checkAddContent();" value="修改文档"/><input type="reset" value="重置" /></td></tr>
        		<tr><td>	</td></tr>
        	</table> 
	  </form>
	
	{/if}
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>