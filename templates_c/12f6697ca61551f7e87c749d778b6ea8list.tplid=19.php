<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/list.css" />  
<script type="text/javascript"  src="js/jquery.min.js"></script>
</head>
<body>
<?php $tpl->create('header.tpl') ?>
<script type="text/javascript" src="js/jquery.nav.js"></script>

 <div id="list">
     <div class="listnav">
         <ul>
         <li><strong><a href="list.php">全部内容</a></strong></li>
         <?php if ($this->vars['childnav']){ ?>
           		 <?php foreach ($this->vars['childnav'] as $keykey=>$value) { ?>
            		<li><strong><a href="list.php?id=<?php echo $value->id?>"><?php echo $value->nav_name?></a></strong></li>	
               	<?php } ?>
          <?php } ?>
        
        </ul>
     </div>
     
     <div class="showlist">
     	<?php if ($this->vars['AllListContent']){ ?>  		
   		<?php foreach ($this->vars['AllListContent'] as $keykey=>$value) { ?>
   	    <script type="text/javascript" src="config/static.php?type=list&id=<?php echo $value->id?>"></script>
   		<dl>
   			<dt><a href="details.php?id=<?php echo $value->id?>" target="_blank"><img  src="<?php echo $value->thumbnail?>" alt="<?php echo $value->title?>" /></a></dt>
   			<dd><strong><a href="details.php?id=<?php echo $value->id?>" target="_blank"><?php echo $value->title?></a></strong></dd>
   			<dd>日期：<?php echo $value->date?> 点击率：<?php echo $value->count?></dd>
   			<dd class="gray">核心提示：<?php echo $value->info?>...</dd>
   			
   		</dl> 
   		<?php } ?>
		<?php }else{ ?>
   		<p>没有任何数据</p>
		<?php } ?>
     
     </div>
     
     
     
 </div>
<?php $tpl->create('footer.tpl') ?>
</body>
</html>