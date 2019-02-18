<?php

	//会员实体类
	class UserModel extends Model{
	   private $id;
	   private $user;
	   private $pass;
	   private $email;
	   private $question;
	   private $answer;
	   private $face;
	   

	    //拦截器
	    public function __set($key,$value){
	        $this->$key=$value;
	    }
	    public function __get($key){
	        return $this->$key;
	    }
	    
	    //用户名重复
	    public function checkUser(){
	        $sql = "SELECT id FROM cms_user WHERE user='$this->user' LIMIT 1";
	        return parent::one($sql);
	    }
	    //邮件重复
	    public function checkEmail(){
	        $sql = "SELECT id FROM cms_user WHERE email='$this->email' LIMIT 1";
	        return parent::one($sql);
	        
	    }
	    //检查登录
	    public function checkLogin(){
	        $sql = "SELECT 
                                        id,
                                        user,
                                        pass,
                                         face
                          FROM 
                                        cms_user 
                       WHERE 
                                        user='$this->user' 
                             AND
                                        pass='$this->pass' 
                           LIMIT 
                                        1";
	        return parent::one($sql);
	    }
	    
	    
	    //新增会员
	    public function addUser(){
	        
	        $sql="INSERT INTO
                                             cms_user (
                                                                user,
                                                                pass,
                                                                email,
                                                                face,
                                                                question,
                                                                answer,
                                                                date
                                	            )
	                          VALUES (
                                    	        '$this->user',
                                    	        '$this->pass',
                                    	        '$this->email',
                                                '$this->face',
                                    	        '$this->question',
                                    	        '$this->answer',
                                                NOW()
	                                           )";
	        return parent::aud($sql);
	    }
	    
	    
	    public function getListUser(){
	        $sql = "SELECT
                                        id,
                                        user,
                                        face,
                                        email,
                                        date
                            FROM
                                        cms_user
                                         $this->limit ";
	        return parent::all($sql);
	    }
	    
	    public function getUserTotal(){
	        $sql="SELECT COUNT(*) FROM cms_user";
	        return parent::total($sql);
	    }
	
	}

?>