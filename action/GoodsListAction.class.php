<?php

class GoodsListAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	         parent::__construct($tpl);
	    }
	    
	    //执行
	    public function action(){
	        $this->getGoodsListContent();
	        $this->getCartNumber();
	    }
	    
	    //获取前台列表显示
	    private function getGoodsListContent(){
	       
	            parent::__construct($this->tpl,new GoodsModel());
	            $page=new Page($this->model->getGoodsTotal(),GOODS_SIZE);
	            $this->model->limit = $page->limit;

	            $object = $this->model->getNewGoodsList();

	            $object = Tool::subStr($object, 'info',8, 'utf-8');
	
	            $this->tpl->assign('AllNewGoodsContent',$object);

	            $this->tpl->assign('page',$page->showPage());
	            
	            
	            $objecth = $this->model->getHotGoodsList();
	            $objecth = Tool::subStr($objecth, 'info',20, 'utf-8');
	            $this->tpl->assign('AllHotGoodsContent',$objecth);
	            $this->tpl->assign('page',$page->showPage());
	            

	      
	    }
	    private function getCartNumber(){
	        parent::__construct($this->tpl,new CartModel());
	        $this->model->u_id =   $_SESSION['user_id'] ;
	        $number = $this->model->getCartNumberTotal();
	        $this->tpl->assign('cnumber',$number);
	    }
	    
	    

	    
	}

?>