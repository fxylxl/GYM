<?php

	class Tool{
	    
	    //弹窗，跳转
	    static public function alertLocation($info,$url){
	        if (!empty($info)){
    	        echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
    	        exit();
	       }else {
	           header('Location:'.$url);
	           exit();
	       }
	    }
	    
	    //弹窗返回
	    static public function alertBack($info){
	        echo "<script type='text/javascript'>alert('$info');history.back();</script>";
	        exit();
	    }
	    
	    //弹窗赋值关闭，上传专用
	    static public function alertOpenerClose($info,$path){
	        echo "<script type='text/javascript'>alert('$info');</script>";
	        echo "<script type='text/javascript'>opener.document.content.thumbnail.value='$path';</script>";
	        echo "<script type='text/javascript'>opener.document.content.pic.style.display='block';</script>";
	        echo "<script type='text/javascript'>opener.document.content.pic.src='$path';</script>";
	        echo "<script type='text/javascript'>window.close();</script>";
	        exit();
	    }
	    
	    //将当前文件转换成.tpl文件名
	    static public function tplName(){
	        $str = explode('/', $_SERVER["SCRIPT_NAME"]);
	        $str = explode('.', $str[count($str)-1]);
	        return $str[0];
	    }
	    
	    
	    //将html字符串转换成html标签
	    static public function unHtml($str){
	        return htmlspecialchars_decode($str);
	    }
	    
	    //将对象数组转换成字符串，并且去掉最后的逗号
	    static public function objArrOfStr($object,$field){
	        if ($object){
    	        foreach ($object as $value){
    	            $html .=  $value->$field.',';
    	        }
	        }
	        return substr($html,0, strlen($html)-1);
	      
	    }
	    
	    //字符串截取
	    static public function subStr($object,$field,$length,$encoding){
	        if ($object){
	            foreach ($object as $value){
	                if (mb_strlen($value->$field,$encoding)>$length){
	                    $value->$field = mb_substr($value->$field, 0,$length,$encoding).'...';
	                }
	            }
	        }
	        return $object;
	    }
	    
	    //显示html过滤
	    static  function htmlString($date){
	        if (is_array($date)){
	            foreach ( $date as $key=> $value){
	                $string[$key] = Tool::htmlString($value);
	            }
	        }else if (is_object($date)){
	            foreach ($date as $key=>$value){
	            @    $string->$key=Tool::htmlString($value);
	            }
	        }else {
	            $string = htmlspecialchars($date);
	        }
	        return $string;
	    }
	    
	    
	    
	    
	    //清理session
	    static public function unSession(){
	        if (session_start()){
	            session_destroy();
	        }
	    }
	    
	    
	    
	}

?>