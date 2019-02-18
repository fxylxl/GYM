  <?php
  session_start();

  class RegisterAction extends Action {
      
      
	    //构造方法
	    public function __construct(&$tpl){
	         parent::__construct($tpl);
	    }
	    
	    //执行
	    public function action(){
	        switch ($_GET['action']){
	            case 'reg':
	                $this->reg();
	                break;
	            case 'login':
	                $this->login();
	                break;
	            case 'logout':
	                $this->logout();
	                break;
	                default:
	                    Tool::alertBack('警告：非法操作');
	        }
	    }
	    
	    //退出
	    private function logout(){
	        $cookie = new Cookie('user');
	        $cookie->unCookie(); 
	        
	        session_unset();
	        session_destroy();
	        Tool::alertLocation(null, 'register.php?action=login');
	    }
	    
	    
	    
	   //注册页面
	   private function reg(){

	       
	       if (isset($_POST['send'])){
	           parent::__construct($this->tpl,new UserModel());
	           
	           if (Validate::checkNull($_POST['user'])) Tool::alertBack('警告：用户名不能为空!');
	           if (Validate::checkLength($_POST['user'], 2, 'min'))Tool::alertBack('警告：用户名长度不能小于2位！');
	           if (Validate::checkLength($_POST['user'], 20, 'max'))Tool::alertBack('警告：用户名长度不能大于20位！');
	           if (Validate::checkLength($_POST['pass'], 6, 'min'))Tool::alertBack('警告：密码不得小于6位！');
	           if (Validate::checkEquals($_POST['pass'], $_POST['notpass']))Tool::alertBack('警告：两次输入的密码必须一致！');
	           if (Validate::checkNull($_POST['email'])) Tool::alertBack('警告：电子邮件不能为空!');
	           if (Validate::checkEmail($_POST['email']))Tool::alertBack('警告：邮件格式不正确！');
	           if (!Validate::checkNull($_POST['question']) && !Validate::checkNull($_POST['answer'])){
	               $this->model->question = $_POST['question'];
	               $this->model->answer = $_POST['answer'];
	           }
	           
	           $this->model->user = $_POST['user'];
	           $this->model->pass = sha1($_POST['pass']);
	           $this->model->email = $_POST['email'];
	           $this->model->face = $_POST['face'];
	           
	           if ($this->model->checkUser())Tool::alertBack('警告：用户名重复！');
	           if ($this->model->checkEmail())Tool::alertBack('警告：电子邮件重复！');	    
	           $add = $this->model->addUser();
	           if ( $add){
	               $cookie = new Cookie('user',$this->model->user,0);
	               $cookie->setCookie();
	               $cookie = new Cookie('face',$this->model->face,0);
	               $cookie->setCookie();
	               Tool::alertLocation('恭喜你，注册成功！', './');
	           }else {
	               Tool::alertBack('很遗憾注册失败！');
	           }
	       }
	       $this->tpl->assign('reg',true);
	       $this->tpl->assign('OptionFaceOne',range(1, 9));
	       $this->tpl->assign('OptionFaceTwo',range(10, 22));
	   }
	   
	   //登录界面
	   public function login(){
	       
	       if (isset($_POST['send'])){
	           parent::__construct($this->tpl,new UserModel());
	           
	           if (Validate::checkNull($_POST['user'])) Tool::alertBack('警告：用户名不能为空!');
	           if (Validate::checkLength($_POST['user'], 2, 'min'))Tool::alertBack('警告：用户名长度不能小于2位！');
	           if (Validate::checkLength($_POST['user'], 20, 'max'))Tool::alertBack('警告：用户名长度不能大于20位！');
	           if (Validate::checkLength($_POST['pass'], 6, 'min'))Tool::alertBack('警告：密码不得小于6位！');
	  
	           $this->model->user = $_POST['user'];
	           $this->model->pass = sha1($_POST['pass']);
	           
	           if (!!$user = $this->model->checkLogin()){
	               $cookie = new Cookie('user',$user->user,$_POST['time']);
                    $cookie->setCookie();
                    $cookie = new Cookie('face',$user->face,$_POST['time']);
                    $cookie->setCookie();
 //                    $_SESSION['user_name'] =  $user->user;
                    $_SESSION['user_id'] =  $user->id;
                   
	              Tool::alertLocation(null, './');
	           }else {
	               Tool::alertBack('警告：用户名或密码错误！');
	           }
	       
	       }
	          $this->tpl->assign('login',true);
	       
	   }

	   
	   
	}

?>