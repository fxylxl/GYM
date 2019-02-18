<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/goods.css" />  
<script type="text/javascript"  src="js/jquery.min.js"></script>
</head>
<body>
<?php $tpl->create('header.tpl') ?>  
<script type="text/javascript" src="js/jquery.nav.js"></script>
    <div id="goods">
    	<div class="banner">
            <a href=""><img src="images/goods/photo_01.png"></a>
            <a href=""><img src="images/goods/photo_02.png"></a>
            <a href=""><img src="images/goods/photo_03.png"></a>
            <ul class="box">
                <li ></li><li></li><li></li>	
            </ul>
       </div>
    	<div id="nav">
        	<div class="search">
                    <form action="#" method="get">
                        <input type="text"  name="user_search" class="sub1"  placeholder="搜索商品..."/><input  type="submit" name="send" class="btn_search" value="搜索" />
                    </form>
       	    </div>
       	    
       	    <div class="usercenter"><a href="usercenter.php" target="_blank">个人中心</a></div>
       	    <div class="buycart"><a href="buycart.php?action=show" target="_blank">购物车</a><span><?php echo $this->vars['cnumber']; ?></span></div>
    	</div>
    	
    	<div class="newgoods">
    		<div class="titles">最新上市</div>
    			<ul class="list">
    		<?php if ($this->vars['AllNewGoodsContent']){ ?>  		
   		        <?php foreach ($this->vars['AllNewGoodsContent'] as $keykey=>$value) { ?>
   	            <script type="text/javascript" src="config/static.php?type=list&id=<?php echo $value->id?>"></script>
   				<li>
   				<a href="trade.php?id=<?php echo $value->id?>" target="_blank"><img  src="<?php echo $value->thumbnail?>"  alt="<?php echo $value->goods_name?>" /></a><br />
   				<span class="price">￥<?php echo $value->price?></span><br />
   				<span class="name"><?php echo $value->goods_name?></span>
   				
   				</li>        
   	         	<?php } ?>
		   <?php }else{ ?>
       			<p>没有任何数据</p>
    		<?php } ?>
    		</ul>
    <!-- 
    	<div id="page"><?php echo $this->vars['page']; ?></div>
     -->		
    	</div>
    	
    	
    		
    	<div class="newgoods">
    			<div class="titles">热卖单品</div>
    			<ul class="list">
    		<?php if ($this->vars['AllHotGoodsContent']){ ?>  		
   		        <?php foreach ($this->vars['AllHotGoodsContent'] as $keykey=>$value) { ?>
   	            <script type="text/javascript" src="config/static.php?type=list&id=<?php echo $value->id?>"></script>
   				<li>
   				<a href="trade.php?id=<?php echo $value->id?>" target="_blank"><img  src="<?php echo $value->thumbnail?>"  alt="<?php echo $value->goods_name?>" /></a><br />
   				<span class="price">￥<?php echo $value->price?></span><br />
   				<span class="name"><?php echo $value->goods_name?></span>
   				
   				</li>        
   	         	<?php } ?>
		   <?php }else{ ?>
       			<p>没有任何数据</p>
    		<?php } ?>
    		</ul>
    <!-- 
    	<div id="page"><?php echo $this->vars['page']; ?></div>
     -->		
    	</div>
   
   
   
   
   
   
   
   
   
    	
    </div>
    

<?php $tpl->create('footer.tpl') ?>
</body>
</html>