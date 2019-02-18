<?php
    //数据库配置文件
    define('DB_HOST',  'localhost');                
    define('DB_USER', 'root');
    define('DB_PASS', '100123pp');
    define('DB_NAME', 'cms');

    
    //系统配置文件
    define('PAGE_SIZE', 5);       //每页多少条
    define('PREV_URL', $_SERVER["HTTP_REFERER"]);
    define('NAV_SIZE', 5);
    define('ARTICLE_SIZE', 5);  //文档
    define('GOODS_SIZE', 10);  //文档
    define('PREV_URL', $_SERVER["HTTP_REFERER"]);
    define('UPDIR' , '/uploads/'); //上传主目录
    
    //模板配置信息
    define('TPL_DIR', ROOT_PATH.'/templates/');             //模板文件目录
    define('TPL_C_DIR', ROOT_PATH.'/templates_c/');     //编译文件目录
    define('CACHE', ROOT_PATH.'/cache/');                      //缓存目录


       
?>