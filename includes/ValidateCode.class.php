<?php

	//验证码类
	class ValidateCode{
	    private $charset = 'abcdefghkmnpqrstuvwyABCDEFGHKMNPRSTUVWY3456789';    //随机因子
	    private $code;                                             //验证码
	    private $codelen = 4;                                  //验证码长度
	    private $width = 130;                                   //宽度
	    private $height = 50;                                   //高度
	    private $img;                                               //图形资源句柄
   
	    // 生成随机码
	    private function createCode(){
	        $len= strlen($this->charset)-1;
	        for ($i=0;$i<$this->codelen;$i++){
	            $this->code .= $this->charset[mt_rand(0,$len)];
	        }
	        return $this->code;
	    }
	    
	    //生成背景
	    private function createBg(){

	        $this->img = imagecreatetruecolor($this->width , $this->height);
	        $color = imagecolorallocate($this->img, mt_rand(157,255) , mt_rand(157,255), mt_rand(157,255));
	        imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $color);
    
	    }
	    
	    
	    //输出
	    private function outPut(){
	        header('Content-type: image/png');
	        imagepng($this->img);
	        imagedestroy($this->img);
	    }
	    
	    //对外生成
	    public function doimg(){
	        $this->createBg();
	        $this->outPut();
	    }
	    
	    
	    
	    
	    
	}

?>