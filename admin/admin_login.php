<?php


require substr(dirname(__FILE__),0,-6).'/init.inc.php';
//Validate::checkSession();
global $tpl;
$login = new LoginAction($tpl);
$login->_action();
if (isset($_SESSION['admin'])){
    Tool::alertLocation(null, 'admin.php');
}


$tpl->display('admin_login.tpl');


?>