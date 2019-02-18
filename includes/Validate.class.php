<?php

	//验证类
	class Validate{
	    
	    //是否为空
	    static public function checkNull($data){
	        if (trim($data) == '') return true;
	        return false;
	    }
	    //长度是否合法
	    static public function checkLength($data,$length,$flag){
	        if ($flag == 'min'){
        	      if ( mb_strlen(trim($data),'utf-8')<$length) return true;
        	      return false;
	         }elseif ($flag == 'max'){
	             if ( mb_strlen(trim($data),'utf-8')>$length) return true;
	             return false;
	         }else {
	             Tool::alertBack('ERROR:参数传递错误，必须是min,max!');
	         }
	   }
	    //数据是否一致
	    static public function checkEquals($data,$checkdate){
	        if (trim($data) != trim($checkdate)) return true;
	        return false;
	    }
	    
	    //验证电子邮件
	    static public function checkEmail($data){
	        //参考fenren1100@163.com
	        //[a-zA-Z0-9_]=> \w
	        //[\w\-\.] 163.
	        //\.[\w+]  .com.com.com.net.cn
	        
	        if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $data)) return true;
	        return false;
	    }
	    
	    //session验证
	    static public function checkSession(){
	        if (!isset($_SESSION['admin'])){
	            Tool::alertBack('警告：非法登录！');
	        }
	    }
	    
	    
	    
	}

?>