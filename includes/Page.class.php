<?php

	//分页类
	class Page{
	    private $total;            //总记录
	    private $pagesize;    //每页显示多少条
	    private $limit;
	    private $page;           //当前页码
	    private $pagenum;    //总页码
	    private $url;                  //地址
	    private $bothnum;          //两边保持数字的量
	    
	    
	    
	    //构造方法 初始化
	    public function __construct($total,$pagesize){
	        if ($total == 0){
	            $this->total = 1;
	        }else {
	            $this->total = $total;
	        }
	 
	        $this->pagesize = $pagesize;
	        $this->pagenum = ceil( $this->total / $this->pagesize );
	        $this->page = $this->setPage();
	        $this->limit = " LIMIT ".($this->page-1)*$this->pagesize.",$this->pagesize";
	        $this->url = $this->setUrl();
	        $this->bothnum = 2;
	    }
	    
	    
	    //拦截器
	    public function __get($key){
	        return $this->$key;
	    }
	    
	    
	    //获取当前页码
	    private function setPage(){
	        if (!empty($_GET['page'])){
	            if ($_GET['page'] > 0){
	                if ($_GET['page'] > $this->pagenum){
	                    return $this->pagenum;
	                }
	                return $_GET['page'];
	            }else {
	                return 1;
	            }
	        }else {
	            return 1;
	        }
	    }
	    
	    //获取地址
	    private function setUrl(){
	        $url= $_SERVER["REQUEST_URI"];
	        $par = parse_url($url);
	        if (isset($par['query'])){
	             parse_str($par['query'],$query);
	             unset($query['page']);
	             $url = $par['path'].'?'.http_build_query($query);	       
	        }
	        return $url;
	    }
	    
	    //数字目录
	    private function pageList(){
            for ($i=$this->bothnum;$i>=1;$i--){
                $page=$this->page-$i;
                if ($page<1) continue;
                    $pagelist .= '<a href="'.$this->url.'&page='.$page.'">'.$page.'</a>' ;
            }
            $pagelist .= '<span class="me">'.$this->page.'</span>';
	        for ( $i=1; $i<=$this->bothnum;$i++){
	            $page=$this->page+$i;
	            if ($page>$this->pagenum)break;
	            $pagelist .= '<a href="'.$this->url.'&page='.$page.'">'.$page.'</a>' ;
	        }
	        
	        return $pagelist;
	    }
        
	    //首页
	    private function first(){
	        if ($this->page > $this->bothnum+1){
	        return ' <a href="'.$this->url.'">1</a> ... ';
        	}
	    }
	    
	    //上一页
	    private function prev(){
	        if ($this->page == 1){
	            return '<span class="disabled">上一页</span>' ;
	        }
	        return ' <a href="'.$this->url.'&page='. ($this->page-1).'">上一页</a> ';
	    }
	    
	    //下一页
	    private function next(){
	        if ($this->page == $this->pagenum){
	            return '<span class="disabled">下一页</span>' ;
	        }
	        return ' <a href="'.$this->url.'&page='. ($this->page+1).'">下一页</a> ';
	    }
	    
	    //尾页
	    private function last(){
	        if ($this->pagenum - $this->page > $this->bothnum){
	        return ' ... <a href='.$this->url.'&page='.$this->pagenum.'">'.$this->pagenum.'</a> ';
	        }
	    }
	    
	    //分页信息
	    
	    public function showPage(){
	        $page .= $this->first();
	        $page .= $this->pageList();
	        $page .= $this->last();
	      $page .= $this->prev();
	      $page .= $this->next();
	     
	      return $page;
	        
	    }
	    
	    
	}

?>