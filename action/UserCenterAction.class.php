<?php

class UserCenterAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	         parent::__construct($tpl);
	    }
	    
	    //执行
	    public function action(){
	        $this->joinCart();
	        $this->payNow();
	    }
	    private function joinCart(){
	        if (isset($_POST['collection'])){
	            parent::__construct($this->tpl,new GoodsModel());
	            $this->model->id = $_POST['id'];
	            $this->model->joinCart();
	            $this->tpl->assign('number',$this->model->getCartTotal());
	            
	        }
	    }
	   private function payNow(){
	       if (isset($_POST['buynow'])){
	           parent::__construct($this->tpl,new GoodsModel());
	           $this->model->id = $_POST['id'];
	           $num = $_POST['number'];
	           $paylist = $this->model->getOneGoods();
	           $this->tpl->assign('paylist',$paylist);
	           $this->tpl->assign('goods_name',$paylist->goods_name);
	           $this->tpl->assign('price',$paylist->price);
	           $this->tpl->assign('size',$_POST['size']);
	           $this->tpl->assign('color',$_POST['color']);
	           $this->tpl->assign('thumbnail',$paylist->thumbnail);
	           $this->tpl->assign('number',$num);
	           $total = $num *  ($paylist->price);
	           $this->tpl->assign('total',$total);
	       }
	       
	   }
	    
	}

?>