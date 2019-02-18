<?php
    header('Content-Type:text/html; charset=utf-8');
    
    require substr(dirname(__FILE__),0,-7).'/init.inc.php';
    

    global $_cache;

    $_cache->action();
  
?>