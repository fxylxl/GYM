<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;
    $list = new MainContentAction($tpl);
    $list->action();
   $tpl->display('mainContent.tpl');

?>