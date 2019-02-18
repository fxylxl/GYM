  <?php

	class DetailsAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	         parent::__construct($tpl);
	    }
	    
	    //执行
	    public function action(){
	           $this->getDetails();
	    }
	    
	    //获取详细内容
	    private function getDetails(){
	        if (isset($_GET['id'])){
	            parent::__construct($this->tpl,new ContentModel());
	            $this->model->id= $_GET['id'];
	            $content= $this->model->getOneContent();
	            if (!$content)Tool::alertBack('警告：不存在此文档!');
	            $this->model->setContentCount();
	            $this->tpl->assign('id',$content->id);
	            $this->tpl->assign('detailstitle',$content->title);
	            $this->tpl->assign('date',$content->date);
	            $this->tpl->assign('author',$content->author);
	            $this->tpl->assign('source',$content->source);
	            $this->tpl->assign('info',$content->info);
	            $this->tpl->assign('content',Tool::unHtml($content->content));
	            if (IS_CACHE){
	                $this->tpl->assign('count','<script type="text/javascript">getContentCount();</script>');
	            }else {
	                $this->tpl->assign('count',$content->count);
	            }
	            
	        }else {
	            Tool::alertBack('警告：非法操作');
	        }
	        
	    }
	    
	    
	    
	}

?>