<?php

	class NavAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	       parent::__construct($tpl, new NavModel());

	    }
	    
	    public function _action(){
	        switch ($_GET['action']){
	            case 'show':
	                $this->show();
	                break;
	            case 'add':
	                   $this->add();
	                break;
	            case 'update':
	                   $this->update();
	                break;
	            case 'delete':
	                   $this->delete();
	                break;
	            case 'addchild':
	                    $this->addchild();
	                break;
	            case 'showchild':
	                    $this->showchild();
	                 break;
	            default:
	               Tool::alertBack('非法操作');
	        }
	    }
	    
	    public function showfront(){
	        $this->tpl->assign('FrontNav',$this->model->getFrontNav());
	    }
	    
	    //show
	    private function show(){
	       // parent::page($this->model->getNavTotal);
	        $page=new Page($this->model->getNavTotal(),NAV_SIZE);
	        $this->model->limit = $page->limit;
	        $this->tpl->assign('show', true);
	        $this->tpl->assign('title', '导航列表');
	       $this->tpl->assign('AllNav', $this->model->getAllNav());
	       $this->tpl->assign('page',$page->showPage());
	    }
    
	    //add
	    private function add(){
	        if (isset($_POST['send'])){
	            if (Validate::checkNull($_POST['nav_name']))Tool::alertBack('警告：导航名称不得为空！');
	            if (Validate::checkLength($_POST['nav_name'],2,'min'))Tool::alertBack('警告：导航名称不得小于2位！');
	            if (Validate::checkLength($_POST['nav_name'],20,'max'))Tool::alertBack('警告：导航名称不得大于20位！');
	            
	            if (Validate::checkLength($_POST['nav_info'],200,'max'))Tool::alertBack('警告：导航描述不得大于200位！');
            
	            $this->model->nav_name=$_POST['nav_name'];
	            if ($this->model->getOneNav())Tool::alertBack('警告：此导航已存在！'); 
	            $this->model->nav_info=$_POST['nav_info'];
	            $this->model->pid = $_POST['pid'];
	            if ( $this->model->addNav()){
	                Tool::alertLocation('恭喜你，新增导航成功！', 'nav.php?action=show');
	            }else{
	                Tool::alertBack('很遗憾，新增导航失败！');
	            }
	            
	        }
	       	 	        
	        $this->tpl->assign('add', true);
	        $this->tpl->assign('title', '新增导航');
        }
	    
        //addchild
        private function addchild(){
            if (isset($_POST['send'])){
                $this->add();
            }
            if (isset($_GET['id'])){
                $this->model->id=$_GET['id'];
                $nav = $this->model->getOneNav();
                is_object($nav)?true:Tool::alertBack('导航的id有误');
                $this->tpl->assign('pid',$nav->id);
                $this->tpl->assign('addchild', true);
                $this->tpl->assign('title', '新增子导航');
                $this->tpl->assign('prev_name',$nav->nav_name);
            }

            
        }
        
        
        
        //showchild
        private function showchild(){
            if (isset($_GET['id'])){
                $this->model->id=$_GET['id'];
                $nav = $this->model->getOneNav();
                is_object($nav)?true:Tool::alertBack('导航的id有误');
                $page=new Page($this->model->getNavChildTotal(),PAGE_SIZE);
                $this->model->limit = $page->limit;
                $this->tpl->assign('id',$this->nav->id);
            
                $this->tpl->assign('showchild', true);
                $this->tpl->assign('title', '子导航列表');
                $this->tpl->assign('AllChildNav', $this->model->getAllChildNav());
                $this->tpl->assign('page',$page->showPage());
            }
        }
        
        
	    //update
	    private function update(){
	        if (isset($_POST['send'])){
	            
	            if (Validate::checkNull($_POST['nav_name']))Tool::alertBack('警告：导航名称不得为空！');
	            if (Validate::checkLength($_POST['nav_name'],2,'min'))Tool::alertBack('警告：导航名称不得小于2位！');
	            if (Validate::checkLength($_POST['nav_name'],20,'max'))Tool::alertBack('警告：导航名称不得大于20位！');
	            
	            if (Validate::checkLength($_POST['nav_info'],200,'max'))Tool::alertBack('警告：导航描述不得大于200位！');
	            
	            $this->model->id=$_POST['id'];
	            $this->model->nav_name=$_POST['nav_name'];
	            $this->model->nav_info=$_POST['nav_info'];
	            $this->model->updateNav() ? Tool::alertLocation('恭喜你修改成功！','nav.php?action=show'):Tool::alertBack('很遗憾，修改失败');
	        }
	        if (isset($_GET['id'])){
	            $this->model->id=$_GET['id'];
	            is_object($this->model->getOneNav())?true:Tool::alertBack('导航的id有误');
	            $this->tpl->assign('nav_info',$this->model->getOneNav()->nav_info);
	            $this->tpl->assign('nav_name',$this->model->getOneNav()->nav_name);
	            $this->tpl->assign('id',$this->model->getOneNav()->id);
	            $this->tpl->assign('update', true);
	            $this->tpl->assign('title', '修改导航 ');
	        }else {
	            Tool::alertBack('非法传值！');
	        }
	    }
	    
	    

	        //delete
	        private function delete(){
	            if (isset($_GET['id'])){
	                $this->model->id=$_GET['id'];
	                $this->model->deleteNav() ? Tool::alertLocation('恭喜你，删除成功！', 'nav.php?action=show'):Tool::alertBack('很遗憾，删除失败！');
	            }else {
	                Tool::alertBack('非法操作！');
	            }
	        }

	    
	}

?>