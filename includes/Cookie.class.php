<?php

	//cookie类
	class Cookie{
	    //
	    private $name;
	    private $value;
	    private $time;
	    
	    public function __construct($name,$value='',$time= 0 ){
	        $this->name = $name;
	        $this->value = $value;
	        if (empty($time)){
	            $this->time = 0;
	        }else {
	            $this->time = time()+$time;
	        }
	    }
	    
	    public function setCookie(){
	        setcookie($this->name,$this->value,$this->time);
	    }
	    
	    //获取cookie
	    public function getCookie(){
	        return $_COOKIE["$this->name"];
	    }
	    
	    //移除cookie
	    public function unCookie(){
	        setcookie($this->name,'',-1);
	    }
	    
	}

?>