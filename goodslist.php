<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;
   $list = new GoodsListAction($tpl);
    $list->action();
   $tpl->display('goodslist.tpl');

?>