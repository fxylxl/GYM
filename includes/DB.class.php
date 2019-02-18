<?php

	//数据库链接类
	class DB{
	    static public function getDB(){
	        @$db=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	        if (mysqli_connect_errno()){
	            echo '数据库链接错误!错误代码：'.mysqli_connect_error();
	            exit();
	        }
	        $db->set_charset('utf8');
	        return $db;
	    }
	    
	    //清理
	    //清理结果集
	    static public function unDB(&$result,&$db){
	        if (is_object($result)){
    	        $result->free();
    	        //销毁结果集对象
    	        $result = null;    	        
	        }
	        if (is_object($db)){
    	        //关闭数据库
    	        $db->close();
    	        //销毁对象句柄
    	        $db = null;
	        }
	    }

	    
	    
	}

?>