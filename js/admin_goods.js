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
function checkAddGoods(){
	var fm = document.content;
	if(fm.goods_name.value == '' || fm.goods_name.value.length < 2 || fm.goods_name.value.length >40){
		alert('警告：标题不能为空并且不得小于二位且不大于四十位！');	
		fm.goods_name.focus();
		return false;
	}
	
	if(fm.attr.value == '' ){
		alert('警告：必须选择最少一个标签！!!');	
		fm.attr.focus();
		return false;
	}	
	if(fm.price.value == '' ){
		alert('警告：价格不能为空！！！！！！');	
		fm.price.focus();
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









