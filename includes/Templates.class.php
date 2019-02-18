<?php

	//模板类
	class Templates{
	    //通过一个字段来接收变量，可以通过数组来接收动态的变量
	    private $vars = array();
	    
	    
	    
	    
	    //创建一个构造方法来验证各个目录是否存在
	    public function __construct() {
	        if (!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE)){
	               exit('ERROR:模板目录或编译目录不存在，请手动设置');
	        }
	        //保存系统变量
	        $sxe= simplexml_load_file(ROOT_PATH.'/config/profile.xml');
	        $tagLib = $sxe ->xpath('/root/taglib');
	        
	        foreach ($tagLib as $tag){
	            $this ->config["$tag->name"] = $tag->value;
	        }
	    }
	    
	    //assign()方法用于注入变量
	    public function assign($var,$value){
	        
	        if (isset($var) && !empty($var)){
	            $this->vars[$var] = $value;
	        }else {
	            exit('ERROR:请设置模板变量');
	        }
	        
	    }
	    
	        //cache()方法，跳转到缓存文件，不执行php
	        public function cache($file){
	            //设置模板的路径
	            $tpl_url= TPL_DIR.$file;
	            //判断模板是否存在
	            if (!file_exists($tpl_url)){
	                exit('ERROR:模板文件不存在！');
	            }
	            //是否加入参数
	            if (!empty($_SERVER['QUERY_STRING'])){
	                $file .= $_SERVER['QUERY_STRING'];
	            }
	            //生成编译文件
	            $par_Url= TPL_C_DIR.md5($file).$file.'.php';
	            //缓存文件
	            $cacheFile = CACHE.md5($file).$file.'.html';
	            //当第二次运行相同文件直接载入缓存文件
	            if (IS_CACHE){
	                if (file_exists($cacheFile) && file_exists($par_Url)){
	                    if (filemtime($par_Url) >= filemtime($tpl_url) && filemtime($cacheFile) >= filemtime($tpl_url)){
	                        include $cacheFile;
	                        exit();
	                    }
	                }
	            }
	        }
	        
	    

	    public function display($file) {
	        $tpl=$this;
	        //设置模板的路径
	        $tpl_url= TPL_DIR.$file;
	      //判断模板是否存在
	      if (!file_exists($tpl_url)){
	          exit('ERROR:模板文件不存在！');
	      }
	      //是否加入参数
	      if (!empty($_SERVER['QUERY_STRING'])){
	          $file .= $_SERVER['QUERY_STRING'];
	      }
	      //生成编译文件
	      $par_Url= TPL_C_DIR.md5($file).$file.'.php';  	    
	      
	      
	      //缓存文件
	      $cacheFile = CACHE.md5($file).$file.'.html';  
	      //如果编译文件不存在或者模板文件修改过则生成编译文件
	      if (!file_exists($par_Url) || filemtime($par_Url)<filemtime($tpl_url)){  
                //引入模板解析类
	          require_once  ROOT_PATH.'/includes/Parser.class.php';
	          $parser = new Parser($tpl_url);  //模板文件
	          $parser ->compile($par_Url);//编译文件的路径
	    }

	      //载入编译文件
	      include $par_Url;
	      
	      //生成缓存文件
	      if (IS_CACHE){
	          file_put_contents($cacheFile, ob_get_contents());
	          ob_end_clean();
	          include $cacheFile;
	      }    
	    }
	    
	    //生成creat方法，用于header和footer模块模板解析使用
	    public function create($file){
	        //设置模板的路径
	        $tpl_url= TPL_DIR.$file;
	        //判断模板是否存在
	        if (!file_exists($tpl_url)){
	            exit('ERROR:模板文件不存在！');
	        }
	        
	        //生成编译文件
	        $par_Url= TPL_C_DIR.md5($file).$file.'.php';
	        
	        //如果编译文件不存在或者模板文件修改过则生成编译文件
	        if (!file_exists($par_Url) || filemtime($par_Url)<filemtime($tpl_url)){
	            //引入模板解析类
	            require_once  ROOT_PATH.'/includes/Parser.class.php';
	            $parser = new Parser($tpl_url);  //模板文件
	            $parser ->compile($par_Url);//编译文件的路径
	        }
	        //载入编译文件
	        include $par_Url;
	    }
	    
	    
	    
	    
	    
	    
	    
	    
	    
	}

	
	
	
	
	
	
	
	
	
?>




