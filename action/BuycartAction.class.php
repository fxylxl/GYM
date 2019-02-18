<?php

class BuycartAction extends Action {
	    //构造方法
    public function __construct(&$tpl){
        
        parent::__construct($tpl, new CartModel());
        
        }
	    //执行
	    public function action(){
	        switch ($_GET['action']){
	            case 'show':
	                $this->show();
	                break;
	            case 'move':
	                $this->move();
	                break;
	            case 'delete':
	                $this->delete();
	                break;
	            default:
	                Tool::alertBack('非法操作');
	        }	    	        
	    }
	    

	   private function show(){
	       if (isset($_SESSION['user_id'])){
	           $this->model->id = $_SESSION['user_id'];   	         
	           $list = $this->model->getCartList();
              $this->tpl->assign('cartlist', $list);    
	        }else {
	            echo '请先登录';
	        }
	   }
	   
	   private function move(){
	       if (isset($_GET['id'])){
	           $this->model->id = $_GET['id'];
	           $this->model->u_id =  $_SESSION['user_id'];
	           if ($this->model->updateCart()){
	               Tool::alertLocation('添加收藏成功', PREV_URL);
	 
	           }else {
	               Tool::alertBack('警告：收藏失败！');

	           }
	         
	       }
	   }
	   
       private function delete(){
           if (isset($_GET['id'])){
               $this->model->id = $_GET['id'];
               $this->model->outCart() ? Tool::alertLocation('删除成功', PREV_URL) : Tool::alertBack('警告：删除失败！');
           }else {
               Tool::alertBack('警告：非法操作！');
           }
       }
	}

?>