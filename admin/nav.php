<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate::checkSession();

global $tpl;
$nav = new NavAction($tpl);         //入口

$nav->_action();
$tpl->display('nav.tpl');


?>