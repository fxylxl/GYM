//选择头像
function changeface(){
	var fm = document.reg;
	var index = fm.face.selectedIndex;
	 fm.faceimg.src = 'images/face/'+fm.face.options[index].value;
}


//验证登录
function checkReg(){

	var fm = document.reg;
	if(fm.user.value == '' || fm.user.value.length < 2 || fm.user.value.length >20){
		alert('警告：用户名不能为空并且不得小于2位且不大于20位！');	
		fm.user.focus(); 
		return false;
	}
	
	if(fm.pass.value.length <6 ){
		alert('警告：密码不得小于六位！');	
		fm.pass.focus(); 
		return false;
	}
	
	if(fm.pass.value != fm.notpass.value ){
		alert('警告：密码和密码确认不一致，请重新输入！');	
		fm.notpass.focus(); 
		return false;
	}
	
	if(!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(fm.email.value)){
		alert('邮件格式有误');
		fm.email.value='';
		fm.email.focus();
		return false;
	}

	return true;
}

function checkLogin(){
	var fm = document.login;
	if(fm.user.value == '' || fm.user.value.length < 2 || fm.user.value.length >20){
		alert('警告：用户名不能为空并且不得小于2位且不大于20位！');	
		fm.user.focus(); 
		return false;
	}
	
	if(fm.pass.value.length <6 ){
		alert('警告：密码不得小于六位！');	
		fm.pass.focus(); 
		return false;
	}
}





























