<?php
session_start();
//设置编码
header('Content-Type:text/html; charset=utf-8');
//网站根目录
define('ROOT_PATH', dirname(__FILE__));

//引入配置信息
require ROOT_PATH.'/config/profile.inc.php';

//设置时区
date_default_timezone_set('Asia/Shanghai');


// //引入模板类
// require ROOT_PATH.'/includes/Templates.class.php';
// //引入工具类
// require ROOT_PATH.'/includes/Tool.class.php';
// //引入数据库
// require ROOT_PATH.'/includes/DB.class.php';

//自动加载类
function __autoload($className){
   if (substr($className,-6) == 'Action'){
       require ROOT_PATH.'/action/'.$className.'.class.php';
   }else if (substr($className, -5) == 'Model'){
       require ROOT_PATH.'/model/'.$className.'.class.php';
   }else {
       require ROOT_PATH.'/includes/'.$className.'.class.php';
   }   
}

// function __autoload($className){
//     if (substr($className,-6) == 'Action'){
//         $a = ROOT_PATH.'/action/'.$className.'.class.php';
//         require $a;
//     }else if (substr($className, -5) == 'Model'){
//         $a = ROOT_PATH.'/model/'.$className.'.class.php';
//         require $a;
//     }else {
//         $a = ROOT_PATH.'/includes/'.$className.'.class.php';
//         require $a;
//     }
//     echo $a.'<br />';
// }



//设置不缓存
$_cache = new Cache(array('code','ckeup','static','upload','register','goodsupload'));


//实例化模板类
$tpl=new Templates();

//初始化
require 'connon.inc.php';



?>