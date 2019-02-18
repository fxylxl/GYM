<?php

	class MainContentAction extends Action {
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
	        /*
	        if (isset($_GET['id'])){
	            parent::__construct($this->tpl,new ContentModel());
	            
	            $nav = new NavModel();
	            
	            $nav->id = $_GET['id'];
	            $navid = $nav->getNavChildId();
 
	            if ($navid){              
	               $this->model->nav = Tool::objArrOfStr($navid, 'id');
	            }else {
	                $this->model->nav =  $nav->id;
	            }
	            
	            parent::page($this->model->getListContentTotal(),ARTICLE_SIZE);
	               
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
	            
	        }else {
	            Tool::alertBack('警告：非法操作！');
	        }
	        */
	    }
	    
	    
	    
	    private function getNav(){
	        /*
	        if (isset($_GET['id'])){
	            $nav= new NavModel();
	            $nav->id=$_GET['id'];
	            if ($nav->getOneNav()){
	                //主导航
	                if ($nav->getOneNav()->nnav_name)
	                $nav1 = '<a href="list.php?id='.$nav->getOneNav()->iid.'">'.$nav->getOneNav()->nnav_name.'</a>'.' &gt';
	                $nav2 = '<a href="list.php?id='.$nav->getOneNav()->id.'">'.$nav->getOneNav()->nav_name.'</a>';
	                $this->tpl->assign('nav',$nav1.$nav2);
	                //子导航合集
	               $this->tpl->assign('childnav',$nav->getAllFrontChildNav());
	            }else {
	                Tool::alertBack('警告：此导航不存在！');
	            }
     
	        }else {
	            Tool::alertBack('警告：非法操作！');
	        }
	        */
	    }
	    
	    
	}

?>