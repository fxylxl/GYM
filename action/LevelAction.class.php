<?php

	class LevelAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){

	       parent::__construct($tpl, new LevelModel());

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
	            default:
	               Tool::alertBack('非法操作');
	        }
	    }
	    
	    
	    
	    //show
	    private function show(){
	        parent::page($this->model->getLevelTotal(),PAGE_SIZE);
//  	        $page=new Page($this->model->getLevelTotal(),PAGE_SIZE);
//  	        $this->model->limit = $page->limit;
	        $this->tpl->assign('show', true);
	        $this->tpl->assign('title', '等级列表');
	        $this->tpl->assign('AllLevel', $this->model->getAllLevel());
// 	        $this->tpl->assign('page',$page->showPage());
	    }
    
	    //add
	    private function add(){
	        if (isset($_POST['send'])){
	            if (Validate::checkNull($_POST['level_name']))Tool::alertBack('警告：等级名称不得为空！');
	            if (Validate::checkLength($_POST['level_name'],2,'min'))Tool::alertBack('警告：等级名称不得小于2位！');
	            if (Validate::checkLength($_POST['level_name'],20,'max'))Tool::alertBack('警告：等级名称不得大于20位！');
	            
	            if (Validate::checkLength($_POST['level_info'],200,'max'))Tool::alertBack('警告：等级描述不得大于200位！');
	            
	            $this->model->level_name=$_POST['level_name'];
	            if ($this->model->getOneLevel())Tool::alertBack('警告：此等级名称已存在！'); 
	            $this->model->level_info=$_POST['level_info'];
	            if ( $this->model->addLevel()){
	                Tool::alertLocation('恭喜你，新增等级成功！', 'level.php?action=show');
	            }else{
	                Tool::alertBack('很遗憾，新增等级失败！');
	            }
	        }   
	        $this->tpl->assign('add', true);
	        $this->tpl->assign('title', '新增等级');
	      
	    }
	    
	    //update
	    private function update(){
	        if (isset($_POST['send'])){
	            
	            if (Validate::checkNull($_POST['level_name']))Tool::alertBack('警告：等级名称不得为空！');
	            if (Validate::checkLength($_POST['level_name'],2,'min'))Tool::alertBack('警告：等级名称不得小于2位！');
	            if (Validate::checkLength($_POST['level_name'],20,'max'))Tool::alertBack('警告：等级名称不得大于20位！');
	            
	            if (Validate::checkLength($_POST['level_info'],200,'max'))Tool::alertBack('警告：等级描述不得大于200位！');
	            
	            $this->model->id=$_POST['id'];
	            $this->model->level_name=$_POST['level_name'];
	            $this->model->level_info=$_POST['level_info'];
	            $this->model->updateLevel() ? Tool::alertLocation('恭喜你修改成功！','level.php?action=show'):Tool::alertBack('很遗憾，修改失败');
	        }
	        if (isset($_GET['id'])){
	            $this->model->id=$_GET['id'];
	            is_object($this->model->getOneLevel())?true:Tool::alertBack('等级的id有误');
	            $this->tpl->assign('level_info',$this->model->getOneLevel()->level_info);
	            $this->tpl->assign('level_name',$this->model->getOneLevel()->level_name);
	            $this->tpl->assign('id',$this->model->getOneLevel()->id);
	            $this->tpl->assign('update', true);
	            $this->tpl->assign('title', '修改等级');
	        }else {
	            Tool::alertBack('非法传值！');
	        }
	    }
	    
	    
	    //delete
	    private function delete(){
            if (isset($_GET['id'])){
                $this->model->id=$_GET['id'];
                $manage=new ManageModel();
                $manage->level = $this->model->id;
                if ($manage->getOneManage())Tool::alertBack('警告：此等级已被已有管理员使用，无法删除,请先删除相关用户！');
                $this->model->deleteLevel() ? Tool::alertLocation('恭喜你，删除成功！', 'level.php?action=show'):Tool::alertBack('很遗憾，删除失败！');
            }else {
                Tool::alertBack('非法操作！');
	        }
	    }
	    
	}

?>