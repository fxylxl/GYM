<?php

	//管理员实体类
	class ManageModel extends Model{
	    private $admin_user;
	    private $admin_pass;
	    private $level;
	    private $id;
	    private $limit;
	    private $last_ip;
        //拦截器
        public function __set($key,$value){
            $this->$key=$value;
        }
        public function __get($key){
            return $this->$key;
        }
        
        //获取管理员总记录
        public function getManageTotal(){
            $sql="SELECT COUNT(*)  FROM cms_manage";
            return parent::total($sql);
        }
        

        
	    //查询单个管理员
	    public function getOneManage(){
	 
	        $sql="SELECT 
                                    id,
                                    admin_user,
                                    admin_password,
                                    level 
                        FROM 
                                    cms_manage 
                        WHERE 
                                    id='$this->id' 
                               OR
                                    admin_user='$this->admin_user'
                               OR
                                    level='$this->level'
                        LIMIT 1";
	 return parent::one($sql);
	    }
   
    //查询登录管理员
    public function getLoginManage(){
        $sql="SELECT
                                 m.admin_user,
                                 l.level_name 
                     FROM  
                                cms_manage m,
                                cms_level l
                  WHERE 
                                m.admin_user='$this->admin_user' 
                        AND 
                                m.admin_password='$this->admin_pass'
                        AND
                                m.level=l.id
                      LIMIT 1";
       return parent::one($sql);
    }
	    
	    //查询所有管理员
	    public function getAllManage(){
	    
	        $sql="SELECT 
                               m.id,
                               m.admin_user,
                               m.login_count,
                               m.last_ip,
                               m.last_time ,
                               l.level_name
                        FROM 
                               cms_manage m,
                               cms_level l
                        WHERE
                                l.id = m.level
                        ORDER BY
                                m.id ASC 
                            $this->limit ";
	       return parent::all($sql);
	    }
	    
	    
	    
	    //新增管理员
	    public function addManage(){
	 
	        $sql="INSERT INTO 
                                         cms_manage (
                                                                        admin_user,
                                                                        admin_password,
                                                                        level,
                                                                        reg_time
                                                                 )  
                                                 VALUES (
                                                                        '$this->admin_user',
                                                                        '$this->admin_pass',
                                                                        '$this->level',
                                                                         NOW()
                                                                )";
	      return parent::aud($sql);
	    }
	    //修改管理员
	    public function updateManage(){
	        $sql="UPDATE 
                                    cms_manage
                            SET 
                                    admin_password='$this->admin_pass',
                                    level ='$this->level'
                      WHERE 
                                    id='$this->id' 
                         LIMIT 1";
            return parent::aud($sql);
	    }
	    //删除管理员
	    public function deleteManage(){
	        $sql="DELETE FROM 
                                                cms_manage 
                                   WHERE 
                                                id='$this->id' 
                                    LIMIT 1";
            return parent::aud($sql);
	    }
	    
	    public function getAllLevel(){
	        
	        $sql="SELECT
	        id,
	        level_name,
	        level_info
	        
	        FROM
	        cms_level
	        ORDER BY
	        id ASC
	        $this->limit";
	        return parent::all($sql);
	    }
	    
	}

?>