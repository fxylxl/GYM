 <?php

	class ManageAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	       parent::__construct($tpl, new ManageModel());
	        $this->_action();
	        $this->tpl->display('manage.tpl');
	    }
	    
	    private function _action(){
	        switch ($_GET['action']){
	            case 'show':
	                Validate::checkSession();
	                $this->show();
	                break;
	            case 'add':
	                Validate::checkSession();
	                   $this->add();
	                break;
	            case 'update':
	                Validate::checkSession();
	                   $this->update();
	                break;
	            case 'delete':
	                Validate::checkSession();
	                   $this->delete();
	                break;
	            default:
	               Tool::alertBack('非法操作');
	        }
	    }
	 
  
	    //show
	    private function show(){
	        $page=new Page($this->model->getManageTotal(),PAGE_SIZE);
	        $this->model->limit = $page->limit;
	        $this->tpl->assign('show', true);
	        $this->tpl->assign('title', '管理员列表');
	        $this->tpl->assign('AllManages', $this->model->getAllManage());
	        $this->tpl->assign('page',$page->showPage());
	        
	    }
	       
    
	    //add
	    private function add(){
	        
	        if (isset($_POST['send'])){
	            if (Validate::checkNull($_POST['admin_user']))Tool::alertBack('警告：用户名不得为空！');
	            if (Validate::checkLength($_POST['admin_user'],2,'min'))Tool::alertBack('警告：用户名不得小于2位！');
	            if (Validate::checkLength($_POST['admin_user'],20,'max'))Tool::alertBack('警告：用户名不得大于20位！');
	         
	            if (Validate::checkNull($_POST['admin_pass']))Tool::alertBack('警告：密码不得为空！');
	            if (Validate::checkLength($_POST['admin_pass'],6,'min'))Tool::alertBack('警告：密码不得小于六位！');
	            
	            if (Validate::checkEquals($_POST['admin_pass'], $_POST['admin_notpass']))Tool::alertBack('警告：两次输入的密码必须一致');
	            
	            $this->model->admin_user=$_POST['admin_user'];
	            if($this->model->getOneManage())Tool::alertBack('警告：此用户名已被占用!');
	            
	            $this->model->admin_pass=sha1($_POST['admin_pass']);
	            $this->model->level= $_POST['level'];
	            if ( $this->model->addManage()){
	                Tool::alertLocation('恭喜你，新增成功！', 'manage.php?action=show');
	            }else{
	                Tool::alertBack('很遗憾，新增管理员失败！');
	            }
	        }
	        
	        $this->tpl->assign('add', true);
	        $this->tpl->assign('title', '新增管理员');
	        $this->tpl->assign('AllLevel',$this->model->getAllLevel());
	    }
	    
	    //update
	    private function update(){
	        if (isset($_POST['send'])){
	            $this->model->id=$_POST['id'];
	            if (trim($_POST['admin_pass']) == ''){
	                $this->model->admin_pass= $_POST['pass'];
	            }else {
	                if (Validate::checkLength($_POST['admin_pass'], 6, 'min'))Tool::alertBack('警告：密码不得小于六位！');
	                $this->model->admin_pass=sha1($_POST['admin_pass']);
	            }      
	            $this->model->level=$_POST['level'];
	            $this->model->updateManage() ? Tool::alertLocation('恭喜你修改成功！',$_POST['prev_url']):Tool::alertBack('很遗憾，修改失败');
	        }
	        if (isset($_GET['id'])){
	            $this->model->id=$_GET['id'];
	            is_object($this->model->getOneManage())?true:Tool::alertBack('管理员的id有误');
	            $this->tpl->assign('admin_user',$this->model->getOneManage()->admin_user);
	            $this->tpl->assign('admin_pass',$this->model->getOneManage()->admin_password);
	            $this->tpl->assign('level',$this->model->getOneManage()->level);
	            $this->tpl->assign('id',$this->model->getOneManage()->id);
	            $this->tpl->assign('update', true);
	            $this->tpl->assign('prev_url',PREV_URL);
	            $this->tpl->assign('title', '修改管理员');
	            $this->tpl->assign('AllLevel',$this->model->getAllLevel());
	        }else {
	            Tool::alertBack('非法传值！');
	        }
	    }
	    
	    
	    //delete
	    private function delete(){
            if (isset($_GET['id'])){
                $this->model->id=$_GET['id'];
                $this->model->deleteManage() ? Tool::alertLocation('恭喜你，删除成功！', 'manage.php?action=show'):Tool::alertBack('很遗憾，删除失败！');
            }else {
                Tool::alertBack('非法操作！');
	        }
	    }
	    
	}

?>