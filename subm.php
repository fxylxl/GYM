<?php
       
   require dirname(__FILE__).'/init.inc.php';
   global $tpl;

   $sub = new SubmAction($tpl);
   $sub->action();

?>