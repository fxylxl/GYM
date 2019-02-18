  <?php

	class TradeAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){
	         parent::__construct($tpl);
	    }
	    
	    //执行
	    public function action(){
	        $this->getDetails();
	        $this->getSidebarGoods();
	    }
	    
	    //获取详细内容
	    private function getDetails(){
	        if (isset($_GET['id'])){
	            parent::__construct($this->tpl,new GoodsModel());
	            $this->model->id= $_GET['id'];
	            $goods= $this->model->getOneGoods();
	            if (!$goods)Tool::alertBack('警告：不存在此文档!');
	            $this->model->setContentCount();
	            $this->tpl->assign('id',$goods->id);
	            $this->tpl->assign('goods_name',$goods->goods_name);
	            $this->tpl->assign('color',$goods->color);
	            $this->tpl->assign('price',$goods->price);
	            $this->tpl->assign('freight',$goods->freight);
	            $this->tpl->assign('thumbnail',$goods->thumbnail);
	            
	    //        $this->tpl->assign('content',Tool::unHtml($goods->content));
// 	            if (IS_CACHE){
// 	                $this->tpl->assign('count','<script type="text/javascript">getContentCount();</script>');
// 	            }else {
// 	                $this->tpl->assign('count',$goods->count);
// 	            }
	            
	        }else {
	            Tool::alertBack('警告：非法操作');
	        }
	        
	    }
	    
	    public function getSidebarGoods(){
	        parent::__construct($this->tpl,new GoodsModel());
	        $this->model->id= $_GET['id'];
	        $sgoods = $this->model->getSidebarGoods();
	        foreach ($sgoods as $object){       	    
        	       $html .=  '<li><a href="trade.php?id='.$object->id.'" target="_blank"><img src="'.$object->thumbnail.'"/></a>';
        	       $html .= '<div class="price">'.$object->price.'</div>';
        	       $html .= '</li>';
        	    }
        	    $this->tpl->assign('sgoods',$html);
	    }
	    
	    
	 
	    
	    

	}

?>