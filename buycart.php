<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;

   $details = new BuycartAction($tpl);
    $details->action();
    $tpl->display('buycart.tpl');   

?>