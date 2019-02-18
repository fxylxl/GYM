<?php


class OrderAction extends Action {
        //构造方法
        public function __construct(&$tpl){
            parent::__construct($tpl);
        }
        
        //执行
        public function action(){
 
            if (isset($_POST['joincart'])){
                
                $this->joincart();
              
            }
            
            if (isset($_POST['collection'])){
                $this->collection();
            }
            
        }
        
      
        private function collection(){
            parent::__construct($this->tpl,new CartModel());
  
           $this->model->u_id =  $_SESSION['user_id'];

            $this->model->c_id = $_POST['id'];
            
            
            $this->tpl->assign('uid', $_SESSION['user_id']);
            $this->tpl->assign('jid',$_POST['id']);
            
            
            $this->model->collection() ? Tool::alertLocation('成功收藏该商品!!！',PREV_URL):Tool::alertBack('很遗憾，收藏该商品失败');
       
        }
        
        
        private function joincart(){
            
            parent::__construct($this->tpl,new CartModel());
      
           $this->model->u_id =  $_SESSION['user_id'];
               
            $this->model->j_id = $_POST['id'];
            $this->model->color = $_POST['color'];
            $this->model->size = $_POST['size'];
            $this->model->num = $_POST['number'];

            $this->model->joinCart() ? Tool::alertLocation('该商品已加入购物车！',PREV_URL):Tool::alertBack('很遗憾，添加购物车失败');
            


        }
    }
?>