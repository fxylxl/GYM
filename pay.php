<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;
   $list = new PayAction($tpl);
    $list->action();
   $tpl->display('pay.tpl');

?>