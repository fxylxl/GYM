<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>会员中心</title>  
<link rel="stylesheet"  href="../style/user.css"   type="text/css" />  
<script type="text/javascript" src="../js/ admin_login.js" ></script>
</head>
<body>
<div id="persen">
	<h2>后台管理系统</h2>
    
        <form method="post" action="?action=login" id="adminLogin"  name="login">
            <label><input type="text" name="admin_user" class="text1" placeholder="请输入账号"></label>
            <label><input type="password" name="admin_pass" class="text2" placeholder="请输入密码"></label>
             <p>
             	<input type="submit" name="send" class="submit1" value="登录"  onclick="return checkLogin();">
                <input type="submit" name="send" class="submit2" value="注册">
             </p>          
            <a href="#">忘记密码？</a>
        </form>
 
</div>
</body>
</html>