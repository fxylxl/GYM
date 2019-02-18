<?php

	//图像处理类
	class Image{
	    private $file;   // 图片地址
	    private $width;
	    private $height;
	    private $type;
	    private $img; // 原图的资源句柄
	    private $new;
	    
	    public function __construct($file){
	        $this->file = $_SERVER["DOCUMENT_ROOT"].$file;
	        list($this->width,$this->height,$this->type) = getimagesize($this->file);
	        $this->img = $this->getFromImg($this->file,$this->type);
	  
	    }
	    

	    
	   // 缩略图 固定长高、等比缩放、扩容
	    public function thumb($new_width,$new_height){
	                
        $n_w = $new_width;
        $n_h = $new_height;
        
        //创建裁剪点
        $cut_width = 0;
        $cut_height = 0;
	        
	    if ($this->width < $this->height){
	        $new_width = ( $new_height / $this->height)*$this->width;
	    }else {
	        $new_height = ( $new_width / $this->width)*$this->height;
	    }
	    
	    
	    if ($new_width < $n_w){
	        $r = $n_w / $new_width;
	        $new_width *= $r;
	        $new_height *= $r;
	        $cut_height = ($new_height - $n_h) / 2;
	    }
	    
	    if ($new_height < $n_h){
	        $r = $n_h / $new_height;
	        $new_width *= $r;
	        $new_height *= $r;
	        $cut_width = ($new_width - $n_w) / 2;
	    }

	    $this->new = imagecreatetruecolor($n_w, $n_h);
	    imagecopyresampled($this->new,$this->img,0,0,$cut_width,$cut_height,$new_width,$new_height,$this->width,$this->height);
	}
    
	    
	    
	    
	    //加载图片，各种类型，返回图片的资源句柄
	    private function getFromImg($file,$type){
	        switch ($type){
	            case 1:
	                $img = imagecreatefromgif($file);
	                break;
	            case 2:
	                $img = imagecreatefromjpeg($file);
	                break;
	            case 3:
	                $img = imagecreatefrompng($file);
	                break;
	                default:
	                    Tool::alertBack('警告：此图片类型本系统不支持!');
	                
	        }
	        return $img;
	    }
	    
	    //图像输出
	    public function out(){
	        imagejpeg($this->new,$this->file);
	        imagedestroy($this->img);
	        imagedestroy($this->new);
	    }
	    
	    
	}

?>