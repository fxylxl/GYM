<?php

	//静态页面，局部不缓存
	class Cache{
	    private $flag;
	    //构造方法初始化
	    public function __construct($_noCache){
	        $this->flag = in_array(Tool::tplName(), $_noCache);
	    }
	    
	    //返回不使用缓存的页面布尔值
	    public function noCache(){
	        return $this->flag;
	    }
	    
	    //action
	    public function action(){
	        switch ($_GET['type']){
	            case 'details':
	                $this->details();
	                break;
	            case 'list':
	                $this->listc();
	                break;
	            case 'header':
	                $this->header();
	                break;
	            case 'index':
	                $this->index();
	                break;
	        }
	    }
	    
	    //累计和统计点击量
	    public function details(){
	        $content = new ContentModel();
	        $content->id = $_GET['id'];
	        $this->setContentCount($content);
	       	$this->getContentCount($content);
	    }
	    
	    //list方法
	    public function listc(){
	        $content = new ContentModel();
	        $content->id = $_GET['id'];
	        $this->getContentCount($content);
	    }
	    //header
	    public function header(){
	        $cookie = new Cookie('user');
	        if ($cookie->getCookie()){
	            echo "
	            function getHeader(){
	            document.write('{$cookie->getCookie()},您好！ <a href=\"register.php?action=logout\">退出</a> ');
	        }
	        ";
	        }else {
	            echo "
	            function getHeader(){
	          //  document.write('<a href=\"register.php?action=reg\">注册</a> <a href=\"register.php?action=login\">登录</a>');
	            document.write( ' <a href=\"register.php?action=login\" >会员登录<span class=\"loginspan\"><br>LOGIN</span></a>');	       
 }
	        ";

// 	            echo "
// 	            function getHeader(){
// 	            document.write('<a href=\"register.php?action=login\"><img src=\"../images/logo.png\"></a>');
// 	        }
// 	        ";
	            
	        }

	    }
	    //index
	    private function index(){
	        $cookie= new Cookie('user');
	        $user = $cookie->getCookie();
	        $cookie= new Cookie('face');
	        $face = $cookie->getCookie();
	        if ($user && $face){
	            $member .= '<div><img src="images/face/'.$face.'" alt="'.$user.'" /></div>';
	            $member .= '<div class="a">Hi，<strong>'.$user.'</strong> </div>';
	            $member .= '<div class="b">';
	            $member .= '<a href="#" >个人中心</a>';
	            $member .= '<a href="register.php?action=logout" >退出登录</a>';
	            $member .= '</div>';
	        }else {
	            $member .= '<h2>会员登录</h2>';
	            $member .= '<form method="post"  name="login" action="register.php?action=login"  >';
	            $member .= '<label><input type="text"  name="user" class="text1" placeholder="请输入账号"/></label>';
	            $member .= '<label><input type="text"  name="pass" class="text2" placeholder="请输入密码"/></label>';
	            $member .= '<p>';
	            $member .= '<input type="submit"  name="send" value="登录"  onclick=" return checkLogin();" class="submit1"/><a href="register.php?action=reg"  class="submit2">注册</a>';
	            $member .= '</p>';
	            $member .= '<a href="#" class="passf">忘记密码？</a>';
	            $member .= '</form>';
	        }
	        echo "
	            function getIndexLogin(){
	            document.write('$member');
	        }
	        ";
	    }
	    
	    
	    //累计
	    private function  setContentCount(&$content){
	        $content->setContentCount();
	    }
	    
	    //获取
	    private function getContentCount(&$content){
	        $count = $content->getOneContent()->count;
	        echo "
	        function getContentCount(){
	        document.write('$count');
	    }
	    ";
	    }
	    
	    
	}

?>