<?php

	class ContentAction extends Action {
	    //构造方法
	    public function __construct(&$tpl){

	       parent::__construct($tpl, new ContentModel());

	    }
	    
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
	        $this->tpl->assign('show', true);
	        $this->tpl->assign('title', '文档列表');
	        $this->nav();
	        
	        
	        if (empty($_GET['nav'])){
	            $nav = new NavModel();
	            $id = $nav->getAllNavChildId();
	            $this->model->nav = Tool::objArrOfStr($id, 'id');
	        }else {
	            $this->model->nav = $_GET['nav'];
	        }

	       parent::page($this->model->getListContentTotal());
	        $this->tpl->assign('SearchContent',$this->model->getListContent());

	    }
    
	    //add
	    private function add(){
        
	        if (isset($_POST['send'])){
	            $this->getPost();
	            $this->model->addContent() ? Tool::alertLocation('文档发布成功', '?action=show') : Tool::alertBack('警告：文档发布失败！');
	        }
	        
	        $this->tpl->assign('add', true);
	        $this->tpl->assign('title', '新增文档');
	        $this->nav();
	        $this->tpl->assign('author',$_SESSION['admin']['admin_user']);
	    }
	    
	    //update
	    private function update(){
	        if (isset($_POST['send'])){
	            $this->model->id = $_POST['id'];
	            $this->getPost();
	            $this->model->updateContent() ? Tool::alertLocation('文档修改成功', $_POST['prev_url']) : Tool::alertBack('警告：文档修改失败！');
	        }
	        
	        
	        if (isset($_GET['id'])){
	        $this->tpl->assign('update', true);
	        $this->tpl->assign('title', '修改文档');	        
	        $this->model->id = $_GET['id'];
	        $content = $this->model->getOneContent();
	        if ($content){
	            $this->tpl->assign('id',$content->id);
	            $this->tpl->assign('titlec',$content->title);
	            $this->tpl->assign('tag',$content->tag);
	            $this->tpl->assign('keyword',$content->keyword);
	            $this->tpl->assign('thumbnail',$content->thumbnail);
	            $this->tpl->assign('source',$content->source);
	            $this->tpl->assign('author',$content->author);
	            $this->tpl->assign('content',$content->content);
	            $this->tpl->assign('prev_url',PREV_URL);
	            $this->tpl->assign('info',$content->info);
	            $this->tpl->assign('count',$content->count);
	            $this->tpl->assign('gold',$content->gold);
                $this->nav($content->nav);
	            
	        }else {
	            Tool::alertBack('警告：不存在此文档！');          
	        }
	        
	        }else {
	            Tool::alertBack('警告：非法操作！');
	        }
	    }
	    
	    
	    //delete
	    private function delete(){
        if (isset($_GET['id'])){
            $this->model->id = $_GET['id'];
            $this->model->deleteContent() ? Tool::alertLocation('文档删除成功', PREV_URL) : Tool::alertBack('警告：文档删除失败！');
        }else {
            Tool::alertBack('警告：非法操作！');
        }
	    }
	    
	    //getPost
	    private function getPost(){
	        if (Validate::checkNull($_POST['title'])) Tool::alertBack('警告：标题不能为空!');
	        if (Validate::checkLength($_POST['title'], 2, 'min'))Tool::alertBack('警告：标题不能小于2位！');
	        if (Validate::checkLength($_POST['title'], 30, 'max'))Tool::alertBack('警告：标题不能大于30位！');
	        if (Validate::checkNull($_POST['nav'])) Tool::alertBack('警告：必须选择一个栏目！');
	        if (Validate::checkLength($_POST['tag'], 30, 'max'))Tool::alertBack('警告：标签总长不能大于30位！');
	        if (Validate::checkLength($_POST['keyword'], 30, 'max'))Tool::alertBack('警告：关键字总长不能大于30位！');
	        if (Validate::checkLength($_POST['source'], 20, 'max'))Tool::alertBack('警告：文章来源不能大于20位！');
	        if (Validate::checkLength($_POST['author'], 10, 'max'))Tool::alertBack('警告：作者不能大于10位！');
	        if (Validate::checkLength($_POST['info'], 200, 'max'))Tool::alertBack('警告：内容摘要不能大于200位！');
	        if (Validate::checkNull($_POST['content'])) Tool::alertBack('警告：详细内容不能为空!');
   
// 	        if (isset($_POST['attr'])){
// 	            $this->model->attr = implode(',', $_POST['attr']);
// 	        }else {
// 	            $this->model->attr = '无属性';
// 	        }
	        
	        $this->model->title = $_POST['title'];
	        $this->model->nav = $_POST['nav'];
	        $this->model->tag = $_POST['tag'];
	        $this->model->keyword = $_POST['keyword'];
	        $this->model->thumbnail = $_POST['thumbnail'];
	        $this->model->info = $_POST['info'];
	        $this->model->source = $_POST['source'];
	        $this->model->author = $_POST['author'];
	        $this->model->content = $_POST['content'];
	        $this->model->commend = $_POST['commend'];
	        $this->model->count = $_POST['count'];
	        $this->model->gold = $_POST['gold'];
	    }
	    
	    //nav
	    private function nav($n = 0){
	        $nav = new NavModel();
	        foreach ($nav->getAllFrontNav() as $object){
	            $html .= '<optgroup label="'.$object->nav_name.'">'."\r\n";
	            $nav->id = $object->id;
	            
	            if (!!$childnav = $nav->getAllFrontChildNav1()){
	                foreach ($childnav as $object){
	                    if ($n == $object->id) {
	                        $html .= '<option selected="selected" value="'.$object->id.'">'.$object->nav_name.'</option>'."\r\n";
	                    }else {
	                        $html .= '<option value="'.$object->id.'">'.$object->nav_name.'</option>'."\r\n";
	                    }                  
	                }
	            }
	            
	            $html .= '</optgroup>';
	        }
	        $this->tpl->assign('nav',$html);
	    }
	    
	    
	    
	    
	}
	

?>