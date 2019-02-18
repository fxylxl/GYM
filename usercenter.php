<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;

    $details = new UserCenterAction($tpl);
    $details->action();
    $tpl->display('usercenter.tpl');   

?>