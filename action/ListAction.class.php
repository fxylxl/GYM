<?php

	class ListAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	         parent::__construct($tpl);
	    }
	    
	    //执行
	    public function action(){
	        $this->getNav();
	       $this->getListContent();
	    }
	    
	    //获取前台列表显示
	    private function getListContent(){

 	           parent::__construct($this->tpl,new ContentModel());	           
 	           $nav = new NavModel(); 	   
 	           
 	           if (isset($_GET['id'])){
 	                 $nav->id = $_GET['id'];
 	             }else{
 	                 $nav->id = 3;
 	              }
 	               
	            $navid = $nav->getNavChildId();

	            if ($navid){              
	               $this->model->nav = Tool::objArrOfStr($navid, 'id');
	            }else {
	                $this->model->nav =  $nav->id;
	            }
	            
// 	            parent::page($this->model->getListContentTotal(),ARTICLE_SIZE);
	               
 	            $object = $this->model->getListContent();
 	            $object = Tool::subStr($object, 'info', 80, 'utf-8');
	            if (IS_CACHE){
	                if ($object){
    	                foreach ($object as $value){
    	                    $value->count = "<script type='text/javascript' >getContentCount();</script>";
    	                }
	                }
	            }
	            $this->tpl->assign('AllListContent',$object);

	        }
	        
	    
	    
	    
	    
	    private function getNav(){
	        parent::__construct($this->tpl,new NavModel());
	         $this->tpl->assign('childnav',$this->model->getAllFrontChildNav());
	    }
	}

?>