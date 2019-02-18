<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;

    $details = new DetailsAction($tpl);
    $details->action();
    $tpl->display('details.tpl');   

?>