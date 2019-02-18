<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/reg.css" />  
<script type="text/javascript" src="js/reg.js"></script>

<script type="text/javascript"  src="js/jquery.min.js"></script>

</head>
<body>
{include file='header.tpl'}
<script type="text/javascript" src="js/jquery.nav.js"></script>
{if $reg}
<div id="reg">
	<h2>会员注册</h2>
	<form action="?action=reg" method="post" name="reg">
		<dl>
			<dd>账　　号：<input  type="text" class="text" name="user"/></dd>
			<dd>密　　码：<input  type="password" class="text" name="pass"/></dd>
			<dd>密码确认：<input  type="password"  class="text" name="notpass"/></dd>
			<dd>邮　　箱：<input  type="text" class="text" name="email"/></dd>
			<dd>选择头像：<select  name="face"  onchange="changeface();">
										{foreach $OptionFaceOne(key,value)}
										<option value="0{@value}.jpg">0{@value}.jpg</option>
										{/foreach}
										{foreach $OptionFaceTwo(key,value)}
										<option value="{@value}.jpg">{@value}.jpg</option>
										{/foreach}
								      </select>								
			</dd>
			<dd><img name="faceimg" src="images/face/01.jpg " alt="01.jpg"  class="face"/></dd>
			<dd>安全问题：<select name="question" class="text">
												<option value="">没有任何安全问题</option>		
												<option value="您父亲的姓名？">您父亲的姓名？</option>	
												<option value="您母亲的职业？">您母亲的职业？</option>	
												<option value="您最喜欢的明星？">您最喜欢的明星？</option>		
									 </select>
			</dd>
			<dd>问题答案：<input  type="text" class="text" name="answer"/></dd>
			<dd><input  type="submit" name="send"   onclick="return checkReg();"  class="button1" value="注册会员"  /></dd>
		</dl> 
	</form>
</div>
{/if}
 	
{if $login}
 	<div id="login">
    		<h2>会员登录</h2>
            <form method="post" action="?action=login"   name="login">
                <dl>
                	<dd><input type="text" name="user" class="text1" placeholder="请输入账号" /></dd>
                	<dd><input type="password" name="pass" class="text2" placeholder="请输入密码" /></dd>
               		<dd>密码保留：<input type="radio" name="time"   value="0"/>不保留
               								 <input type="radio" name="time"   value="86400"/>一天
               								 <input type="radio" name="time"   value="604800"/>一周
               		</dd>
                </dl>	
                <p>
                    <input type="submit" name="send" class="submit1" value="登录"  onclick="return checkLogin();"/>
               		<a href="register.php?action=reg"  class="submit2">注册</a>
                </p>
                <a href="#">忘记密码？</a>
            </form>
    </div>
{/if}
{include file='footer.tpl'}
</body>
</html>