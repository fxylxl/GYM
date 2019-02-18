<?php

	class Model{
	    
	    //查找总记录模型
	    protected function total($sql){
	        $db=DB::getDB();
	        $result=$db->query($sql);
	        $total = $result->fetch_row();
	        DB::unDB($result, $db);
	        return $total[0];
	    }
	    
	    
	    
	    //查找单个
	    protected function one($sql){
	        $db=DB::getDB();
	        
	        $result=$db ->query($sql);
	        $objects=$result->fetch_object();
	        DB::unDB($result, $db);
	        return Tool::htmlString($objects);
	    }
	    
	    //查找多个
	    protected function all($sql){
	        $db =DB::getDB();
	        $result=$db ->query($sql);
	        $html=array();
	        while (!!$objects=$result->fetch_object()){
	            $html[]=$objects;
	        }
	        DB::unDB($result, $db);
	        return Tool::htmlString($html);
	    }
	    
	    //增删改模型
	    protected function aud($sql){
	        $db=DB::getDB();
	        $db->query($sql);
	        $affected_rows = $db->affected_rows;
	        DB::unDB($result=null, $db);
	        return $affected_rows;
	    }
	    
	    
	    //获取下一个增值id
	    public function nextid($table){
	        $sql = "SHOW TABLE STATUS LIKE '$table'";
	        $object = $this->one($sql);
	        return $object->Auto_increment;
	    }
	    
	}

?>