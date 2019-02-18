<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate::checkSession();
global $tpl;
$content = new ContentAction($tpl);         //入口
$content->_action();
$tpl->display('content.tpl');
?>