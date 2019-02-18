//验证登录
function checkLogin(){
	var fm = document.login;
	if(fm.admin_user.value == '' || fm.admin_user.value.length < 2 || fm.admin_user.value.length >20){
		alert('警告：用户名不能为空并且不得小于2位且不大于20位！');	
		fm.admin_user.focus(); 
		return false;
	}
	
	if(fm.admin_pass.value == '' || fm.admin_pass.value.length < 6 ){
		alert('警告：密码不能为空并且不得小于6位！');	
		fm.admin_pass.focus(); 
		return false;
	}
	
	
	return true;
}