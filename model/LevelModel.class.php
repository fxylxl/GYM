<?php

	//管理员实体类
	class LevelModel extends Model{
	    private $id;
	    private $level_name;
	    private $level_info;
	    private $limit;

        //拦截器
        public function __set($key,$value){
            $this->$key=$value;
        }
        public function __get($key){
            return $this->$key;
        }
        
        //获取等级总记录
        public function getLevelTotal(){
            $sql="SELECT COUNT(*) FROM cms_level";
            return parent::total($sql);
        }
       
        
	    //查询单个
	    public function getOneLevel(){
	 
	        $sql="SELECT 
                                    id,
                                    level_name,
                                    level_info 
                        FROM 
                                    cms_level 
                        WHERE 
                                    id='$this->id' 
                                OR
                                    level_name='$this->level_name'
                        LIMIT 1";
	 return parent::one($sql);
	    }
   
	    //查询所有
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
	    
	    
	    
	    //新增
	    public function addLevel(){
	 
	        $sql="INSERT INTO 
                                         cms_level (
                                                                        level_name,
                                                                        level_info 
                                                                 )  
                                                 VALUES (
                                                                         '$this->level_name',
                                                                         '$this->level_info'
                                                           
                                                                )";
	      return parent::aud($sql);
	    }
	    
	    
	    //修改
	    public function updateLevel(){
	        $sql="UPDATE 
                                    cms_level
                            SET 
                                        level_name='$this->level_name',
                                        level_info ='$this->level_info'
                      WHERE 
                                    id='$this->id' 
                         LIMIT 1";
            return parent::aud($sql);
	    }
	    //删除
	    public function deleteLevel(){
	        $sql="DELETE FROM 
                                                cms_level 
                                   WHERE 
                                                id='$this->id' 
                                    LIMIT 1";
            return parent::aud($sql);
	    }
	    
	    
	    
	}

?>