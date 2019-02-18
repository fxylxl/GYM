window.onload= function () {

	var title=document.getElementById('title');
	var ol=document.getElementsByTagName('ol');
	var a = ol[0].getElementsByTagName('a');

	for(i=0;i<a.length;i++){
		a[i].className = null;
		if(title.innerHTML == a[i].innerHTML){
			a[i].className = 'selected';
		}
	}
		
};


function centerWindow(url,name,width,height){
	var left = (screen.width - width) / 2;
	var top = (screen.height - height) / 2 - 50;
	window.open(url,name,'width='+width+',height='+height+',top='+top+',left='+left);
}

//验证addContent
function checkAddContent(){
	var fm = document.content;
	if(fm.title.value == '' || fm.title.value.length < 2 || fm.title.value.length >30){
		alert('警告：标题不能为空并且不得小于二位且不大于三十位！');	
		fm.title.focus();
		return false;
	}
	
	if(fm.nav.value == '' ){
		alert('警告：必须选择一个栏目！!!');	
		fm.nav.focus();
		return false;
	}	
	
	if(fm.tag.value.length >30){
		alert('警告：标签不得大于三十位！');	
		fm.tag.focus();
		return false;
	}
		
	if(fm.keyword.value.length >30){
		alert('警告：关键字不得大于三十位！');	
		fm.keyword.focus();
		return false;
	}
	
	if(fm.source.value.length >20){
		alert('警告：文章来源不得大于二十位！');	
		fm.source.focus();
		return false;
	}
	
	if(fm.author.value.length >10){
		alert('警告：作者不得大于十位！');	
		fm.author.focus();
		return false;
	}
	
	if(fm.info.value.length >200){
		alert('警告：内容摘要不得大于两百位！');	
		fm.info.focus();
		return false;
	}

	if(CKEDITOR.instances.text1.getData() == ''){
		alert('警告：详细描述不得为空！');	
		CKEDITOR.instances.text1.focus();
		return false;
	}
	return true;
}









