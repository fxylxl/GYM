<?php

	class UserAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){

	       parent::__construct($tpl, new UserModel());

	    }
	    
	    public function _action(){
	        switch ($_GET['action']){
	            case 'show':
	                $this->show();
	                break; 
	           
	            default:
	               Tool::alertBack('非法操作');
	        }
	    }
	    
	    
	    
	    //show
	    private function show(){
	        parent::page($this->model->getUserTotal(),PAGE_SIZE);
	        $this->tpl->assign('show', true);
	        $this->tpl->assign('title', '会员列表');
	        $this->tpl->assign('UserContent',$this->model->getListUser());

	    }
    
	  
	  
	}
	

?>