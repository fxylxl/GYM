<?php

	//导航实体类
	class NavModel extends Model{
	    private $id;
	    private $nav_name;
	    private $nav_info;
	    private $pid;
	    private $sort;
	    private $limit;

        //拦截器
        public function __set($key,$value){
            $this->$key=$value;
        }
        public function __get($key){
            return $this->$key;
        }
        
        //获取所有非主类的id
        public function getAllNavChildId(){
            $sql = "SELECT 
                                     id 
                          FROM 
                                    cms_nav 
                       WHERE 
                                    pid <>0";
            return parent::all($sql);
        }
        
        
        
        //获取注导航总记录
        public function getNavTotal(){
            $sql="SELECT COUNT(*)  FROM cms_nav WHERE pid=0";
            return parent::total($sql);
        }
       
        
        //获取子导航总记录
        public function getNavChildTotal(){
            $sql="SELECT COUNT(*)  FROM cms_nav WHERE pid=$this->id";
            return parent::total($sql);
        }
        
        //前台显示指定的主导航
        public function getFrontNav(){
 
            
            $sql="SELECT
            id,
            nav_name
            FROM
            cms_nav
            WHERE
            pid=0
            LIMIT
            0,".NAV_SIZE;
            return parent::all($sql);
            
        }
        
        //获取主类下的子类的id
        public function getNavChildId(){
            $sql = "SELECT
            id
            FROM
            cms_nav
            WHERE
            pid='$this->id'";
            return parent::all($sql);
        }
        
        
        
        //查询单个
        public function getOneNav(){
            
            $sql="SELECT
                                n1.id,
                                n1.nav_name,
                                n1.nav_info,
                                n2.id iid,
                                n2.nav_name nnav_name
                      FROM
                                 cms_nav n1
               LEFT JOIN
                                 cms_nav n2
                            ON
                                  n1.pid=n2.id                               
                     WHERE
                                n1.id='$this->id'
                            OR
                                n1.nav_name='$this->nav_name'
                      LIMIT 1";
            return parent::one($sql);
        }
        
        
    
	    //查询所有主导航
	    public function getAllNav(){
	    
	        $sql="SELECT 
                                    id,
                                    nav_name,
                                    nav_info 

                        FROM 
                                     cms_nav
                        WHERE 
                                     pid=0
                        $this->limit  ";
	       return parent::all($sql);
	    }
	    
	    
	    
	    //查询所有主导航不带limit
	    public function getAllFrontNav(){
	        
	        $sql="SELECT
	        id,
	        nav_name,
	        nav_info
	        sort
	        FROM
	        cms_nav
	        WHERE
	        pid=0  ";
	        return parent::all($sql);
	    }
	    
	    //查询所有子导航
	    public function getAllChildNav(){
	        
	        $sql="SELECT
	        id,
	        nav_name,
	        nav_info
	        
	        FROM
	        cms_nav
	        WHERE
	        pid=$this->id
	        $this->limit  ";
	        return parent::all($sql);
	    }
	    
	    //查询所有子导航不带limit
	    public function getAllFrontChildNav(){
	        
	        $sql="SELECT
	        id,
	        nav_name,
	        nav_info
	        sort
	        FROM
	        cms_nav
	        WHERE
	        pid=3  ";
	        return parent::all($sql);
	    }
	    
	    //查询所有子导航不带limit
	    public function getAllFrontChildNav1(){
	        
	        $sql="SELECT
	        id,
	        nav_name,
	        nav_info
	        sort
	        FROM
	        cms_nav
	        WHERE
	        pid='$this->id'  ";
	        return parent::all($sql);
	    }
	    
	    
	    
	    public function addNav(){
	        
	        $sql="INSERT INTO
                                             cms_nav (
                                                    	        nav_name,
                                                    	        nav_info,
                                                                pid,
                                                                sort
                                	            )
	                          VALUES (
                                    	        '$this->nav_name',
                                    	        '$this->nav_info',
	                                             '$this->pid',
                                                 ".parent::nextid('cms_nav')."
	                                           )";
	        return parent::aud($sql);
	    }
	    
	    //修改
	    public function updateNav(){
	        $sql="UPDATE
	        cms_nav
	        SET
	        nav_name='$this->nav_name',
	        nav_info ='$this->nav_info'
	        WHERE
	        id='$this->id'
	        LIMIT 1";
	        return parent::aud($sql);
	    }
	    
	    
	
	    //删除
	    public function deleteNav(){
	        $sql="DELETE FROM
	        cms_nav
	        WHERE
	        id='$this->id'
	        LIMIT 1";
	        return parent::aud($sql);
	    }
	    
	    
	}

?>