<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate::checkSession();
global $tpl;
$content = new GoodsAction($tpl);         //入口
$content->_action();
$tpl->display('admin_goods.tpl');
?>