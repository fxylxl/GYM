<?php

	//上传文件类
	class FileUpload{
	    private  $error;
	    private $maxsize;
	    private $type;
	    private $typeArr=array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
	    private $path; //目录路径
	    private $today;
	    private $name;
	    private $tmp;    //临时文件
	    private $linkpath;
	    private $linktoday;    //相对路径
	    
	    //构造方法 初始化
	    public function __construct($file,$maxsize){
         $this->error=$_FILES[$file]['error'];
         $this->maxsize = $maxsize / 1024;
         $this->type = $_FILES[$file]['type'];
         $this->path = ROOT_PATH.UPDIR;
         $this->linktoday= date('Ymd').'/';
         $this->today = $this->path.$this->linktoday;
         $this->name = $_FILES[$file]['name'];
         $this->tmp = $_FILES[$file]['tmp_name'];

         $this->checkError();
         $this->checkType();
         $this->checkPath();
         $this->moveUpload();
	   }
	   
	   //返回路径
	   public function getPath(){
	       $path = $_SERVER['SCRIPT_NAME'];
	       $dir = dirname(dirname($path));
	       if ($dir == '\\') $dir = '/';
	       $this->linkpath =$dir.$this->linkpath;
	       return $this->linkpath;
	   }
	   
	   //将临时文件内容复制出来
	   private function moveUpload(){
	       if (is_uploaded_file($this->tmp)){
	           if(!move_uploaded_file($this->tmp, $this->setNewName())){
	               Tool::alertBack('警告：上传失败！');
	           }
	       }else {
	           Tool::alertBack('警告：临时文件不存在！');
	       }
	   }
	
	   //设置新文件名
	   private function setNewName(){
	       $nameArr = explode('.', $this->name);
	       $postfix =  $nameArr[count($nameArr)-1];
	       $newname = date('YmdHis').mt_rand(100,1000).'.'.$postfix;
	       $this->linkpath = UPDIR.$this->linktoday.$newname;
	       return $this->today.$newname;
	   }
	   
	   
	   private function checkError(){
	       if (!empty($this->error) ){
	           switch ($this->error){
	               case 1:
	                   Tool::alertBack('警告：上传值超过约定最大值！');
	                   break;
	               case 2:
	                   Tool::alertBack('警告：上传值超过了'.$this->maxsize.'kb！');
	                   break;
	               case 3:
	                   Tool::alertBack('警告：文件只有部分被上传！');
	                   break;
	               case 4:
	                   Tool::alertBack('警告：上传文件不能为空！');
	                   break;
	                   default:
	                       Tool::alertBack('警告：未知错误！');
	           }
	       }
	   }
	
	   
	   private function checkType(){
	       if (!in_array($this->type, $this->typeArr)){
	           Tool::alertBack('警告：上传图片格式不正确！');
	       }
	   }
	
	   private function checkPath(){
	       if (!isset($this->path) || !is_writable($this->path)){
	           if(!mkdir($this->path, 0777)){
	               Tool::alertBack('警告：主目录创建失败！');
	           }
	       }
	       
	       if (!isset($this->today) || !is_writable($this->today)){
	           if(!mkdir($this->today)){
	               Tool::alertBack('警告：子目录创建失败！');
	           }
	       }
       
	   }
	   
	   
	   
	}
?>