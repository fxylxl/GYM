 <?php
//前台缓存控制开关
 define('IS_CACHE', true);
//判断是否开启缓冲区
 global $tpl,$_cache;
if (IS_CACHE && !$_cache->noCache()){
    ob_start();
    $tpl->cache(Tool::tplName().'.tpl');
}

$nav = new NavAction($tpl);
$nav->showfront(); 

$cookie = new Cookie('user');
if (IS_CACHE){
    $tpl->assign('header', '<script type="text/javascript">getHeader();</script>');
}else{
    if ($cookie->getCookie()){
        $tpl->assign('header', $cookie->getCookie().',您好！ <a href="register.php?action=logout"><br />退出</a> ');
    }else {
     //   $tpl->assign('header', '<a href="register.php?action=reg">注册</a> <a href="register.php?action=login">登录</a>');
        $tpl->assign('header', ' <a href="register.php?action=login" class="user">会员登录<span class="loginspan"><br>LOGIN</span></a>');
    }
}

?>