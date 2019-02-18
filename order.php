<?php


require dirname(__FILE__).'/init.inc.php';
global $tpl;

$order = new OrderAction($tpl);
$order->action();
$tpl->display('order.tpl');

?>