<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;

   $details = new TradeAction($tpl);
    $details->action();
    $tpl->display('trade.tpl');   

?>