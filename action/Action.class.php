<?php

	//控制器基类
	class Action{
	    
	    protected $tpl;
	    protected $model;
	    
	    protected function __construct(&$tpl,&$model = null){
	        $this->tpl = $tpl;
	        $this->model=$model;
	    }
	    
	    protected function page($total,$pagesize = PAGE_SIZE){
	        $_page = new Page($total,$pagesize );
	        $this->model->limit = $_page->limit;
	        $this->tpl->assign('page',$_page->showPage());
	        $this->tpl->assign('num',($_page->page-1)*$pagesize);
	    }
	    
	}

?>