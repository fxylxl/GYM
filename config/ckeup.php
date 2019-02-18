<?php

require substr(dirname(__FILE__),0,-7).'/init.inc.php';

if (isset($_GET['type'])){
    $fileupload = new FileUpload('upload',$_POST['max_file_size']);
    $ckefn = $_GET['CKEditorFuncNum'];
    $path = $fileupload->getPath();
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($ckefn,\"$path\", '图片上传成功！')</script>";
    exit();
}else {
   Tool::alertBack('警告：上传失败！');
}

?>