<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate::checkSession();
global $tpl;
$level = new LevelAction($tpl);         //入口
$level->_action();
$tpl->display('level.tpl');
?>