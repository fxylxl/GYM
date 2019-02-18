<?php

class GoodsAction extends Action {
	    //构造方法
    public function __construct(&$tpl){
        
        parent::__construct($tpl, new GoodsModel());
        
    }
    
	    //执行
	    public function _action(){
	        switch ($_GET['action']){
	            case 'show':
	                $this->show();
	                break;
	            case 'add':
	                $this->add();
	                break;
	            case 'update':
	                $this->update();
	                break;
	            case 'delete':
	                $this->delete();
	                break;
	            default:
	                Tool::alertBack('非法操作');
	        }
	    }
	    
	    
	    //show
	    private function show(){
	        $page=new Page($this->model->getGoodsTotal(),GOODS_SIZE);
	        $this->model->limit = $page->limit;
	        $this->tpl->assign('show', true);
	        $this->tpl->assign('title', '商品列表');
	        $this->tpl->assign('AllGoods', $this->model->getAllGoods());
	        $this->tpl->assign('page',$page->showPage());

	    }
	    
	    
	    //add
	    private function add(){
	        
	        if (isset($_POST['send'])){
	         
	            if (Validate::checkNull($_POST['goods_name']))Tool::alertBack('警告：商品名不得为空！');
	            if (Validate::checkLength($_POST['goods_name'],2,'min'))Tool::alertBack('警告：商品名不得小于2位！');
	            if (Validate::checkLength($_POST['goods_name'],20,'max'))Tool::alertBack('警告：商品名不得大于20位！');
	          
	            if (Validate::checkNull($_POST['price']))Tool::alertBack('警告：价格不得为空！');
               
    	        if (isset($_POST['attr'])){
    	            $this->model->attr = implode(',', $_POST['attr']);
    	        }else {
    	            $this->model->attr = '无属性';
    	        }
    	        $this->model->color = implode(',', $_POST['color']);
    	        $this->model->size = implode(',', $_POST['size']);
    	           	        
    	        $this->model->goods_name = $_POST['goods_name'];
    	        $this->model->price = $_POST['price'];
    	        $this->model->freight = $_POST['freight'];
    	        $this->model->count = $_POST['count'];
    	        $this->model->info = $_POST['info'];
    	        $this->model->thumbnail = $_POST['thumbnail'];
    	        
	       
	            if ( $this->model->addGoods()){
	                Tool::alertLocation('恭喜你，新增成功！', 'goods.php?action=show');
	            }else{
	                Tool::alertBack('很遗憾，添加商品失败！');
	            }
	        }
	        
	        $this->tpl->assign('add', true);
	        $this->tpl->assign('title', '新增商品');
	    }
	    
	    //update
	    private function update(){
	        if (isset($_POST['send'])){
	            $this->model->id=$_POST['id'];

	            if (isset($_POST['attr'])){
	                $this->model->attr = implode(',', $_POST['attr']);
	            }else {
	                $this->model->attr = '无属性';
	            }
	            $this->model->color = implode(',', $_POST['color']);
	            $this->model->size = implode(',', $_POST['size']);
	            
	            $this->model->id=$_POST['id'];
	            $this->model->goods_name = $_POST['goods_name'];
	            $this->model->price = $_POST['price'];
	            $this->model->freight = $_POST['freight'];
	            $this->model->count = $_POST['count'];
	            $this->model->info = $_POST['info'];
	            $this->model->thumbnail = $_POST['thumbnail'];
	            $this->model->updateGoods() ? Tool::alertLocation('恭喜你修改成功！',$_POST['prev_url']):Tool::alertBack('很遗憾，修改失败');
	        }
	        if (isset($_GET['id'])){
	            $this->model->id=$_GET['id'];
	            is_object($this->model->getOneGoods())?true:Tool::alertBack('商品的id有误');
	            $this->tpl->assign('goods_name',$this->model->getOneGoods()->goods_name);
	            $this->tpl->assign('price',$this->model->getOneGoods()->price);
	            $this->tpl->assign('freight',$this->model->getOneGoods()->freight);
	            $this->tpl->assign('info',$this->model->getOneGoods()->info);
	            $this->tpl->assign('count',$this->model->getOneGoods()->count);
	            $this->tpl->assign('thumbnail',$this->model->getOneGoods()->thumbnail);
	            $this->tpl->assign('attr',$this->model->getOneGoods()->attr);
	            $this->tpl->assign('id',$this->model->getOneGoods()->id);
	            $this->tpl->assign('update', true);
	            $this->tpl->assign('prev_url',PREV_URL);
	            $this->tpl->assign('title', '修改商品信息');

	        }else {
	            Tool::alertBack('非法传值！');
	        }
	    }
	    
	    
	    private function delete(){
	        if (isset($_GET['id'])){
	            $this->model->id = $_GET['id'];
	            $this->model->deleteGoods() ? Tool::alertLocation('删除成功', PREV_URL) : Tool::alertBack('警告：删除失败！');
	        }else {
	            Tool::alertBack('警告：非法操作！');
	        }
	    }
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	}

?>