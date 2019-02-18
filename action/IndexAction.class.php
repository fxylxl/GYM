  <?php

  class IndexAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	         parent::__construct($tpl);
	    }
	    
	    //执行
	    public function action(){
	   $this->login();
	    }
	    
	    //登录模块
	    public function login(){
	        $cookie= new Cookie('user');
	        $user = $cookie->getCookie();
	        $cookie= new Cookie('face');
	        $face = $cookie->getCookie();
	        if ($user && $face){
	            $this->tpl->assign('user',$user);
	            $this->tpl->assign('face',$face);
	        }else {
	            $this->tpl->assign('login',true);
	        }
	        $this->tpl->assign('cache',IS_CACHE);
	        if (IS_CACHE)$this->tpl->assign('member','<script type="text/javascript">getIndexLogin();</script>');
	        
	        
	    }
	}

?>