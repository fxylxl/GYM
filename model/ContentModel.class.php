<?php

	//内容实体类
	class ContentModel extends Model{
	    private $id;
	    private $title;
	    private $nav;
	    private $attr;
	    private $tag;
	    private $keyword;
	    private $thumbnail;
	    private $info;
	    private $source;
	    private $author;
	    private $content;
	    private $readlimit;
	    private $limit;


        //拦截器
        public function __set($key,$value){
            $this->$key=$value;
        }
        public function __get($key){
            return $this->$key;
        }
        
        //累计文档的点击量
        public function setContentCount(){
            $sql = "UPDATE 
                                        cms_content 
                               SET 
                                        count=count+1 
                         WHERE 
                                        id='$this->id' 
                              LIMIT 
                                        1";
            return parent::aud($sql);
        }

        
        //获取文档总记录
        public function getListContentTotal(){
            $sql="SELECT 
                                    COUNT(*)  
                         FROM 
                                    cms_content 
                       WHERE 
                                    nav IN ($this->nav)";
            return parent::total($sql);
        }
        
        
        //获取文档列表
        public function getListContent(){
            $sql = "SELECT 
                                    c.id,
                                    c.title,
                                    c.nav,
                                    c.date,
                                    c.info,
                                    c.thumbnail,
                                    c.count, 
                                    c.author,
                                    n.nav_name
                          FROM 
                                    cms_content c,
                                    cms_nav n
                       WHERE 
                                    c.nav = n.id
                            AND
                                    c.nav IN ($this->nav)
                        ORDER BY 
                                     c.date DESC
                                    $this->limit";
            return parent::all($sql);
        }
        

        
        //获取单一的文档内容
        public function getOneContent(){
            $sql = "SELECT 
                                        id,
                                        title,
                                        nav,
                                        content,
                                        thumbnail,
                                        tag,
                                        keyword,
                                        info,
                                        date,
                                        count,
                                        author,
                                        source,
                                        gold,
                                        readlimit
                            FROM 
                                        cms_content 
                         WHERE
                                         id='$this->id'";
            return parent::one($sql);
        }
        
        
        
        //新增文档内容
        public function addContent(){
            
            $sql="INSERT INTO
            cms_content (
                                    title,
                                    nav,
                                    info,
                                    thumbnail,
                                    source,
                                    author,
                                    tag,
                                    keyword,
                                    content,
                                    commend,
                                    count,
                                    gold,
                                    readlimit,
                                    date    
                                    )
                  VALUES (
                                    '$this->title',
                                    '$this->nav',
                                    '$this->info',
                                    '$this->thumbnail',
                                    '$this->source',                                    
                                    '$this->author',
                                    '$this->tag',
                                    '$this->keyword',
                                    '$this->content',
                                    '$this->commend',
                                    '$this->count',
                                    '$this->gold',
                                    '$this->readlimit',
                                    NOW()
	                                           )";
            return parent::aud($sql);
        }
        
        //修改文档
        public function updateContent(){
            $sql = "UPDATE 
                                        cms_content 
                               SET 
                                         title='$this->title',
                                         nav='$this->nav',
                                         info='$this->info',
                                         attr='$this->attr',
                                         thumbnail='$this->thumbnail',
                                         source='$this->source',                                    
                                         author='$this->author',
                                         tag='$this->tag',
                                         keyword='$this->keyword',
                                         content='$this->content',
                                         commend='$this->commend',
                                         count='$this->count',
                                         gold='$this->gold',
                                         readlimit='$this->readlimit'
                         WHERE 
                                        id='$this->id' 
                             LIMIT 
                                        1";
            return parent::aud($sql);
        }
        
        
        //delete
        public function deleteContent(){
            $sql = "DELETE FROM 
                                                    cms_content 
                                    WHERE 
                                                     id='$this->id' 
                                        LIMIT 
                                                    1";
            return parent::aud($sql);
        }
        
        
        
        
        
	}

?>