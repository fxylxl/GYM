 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>main</title>  
<link rel="stylesheet" type="text/css" href="../style/admin.css" />  
<script type="text/javascript"  src="../js/admin_goods.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body id="main">


	<div class="map">
		内容管理&gt;&gt;查看货品列表&gt;&gt;<strong id="title"><?php echo $this->vars['title']; ?></strong>
	</div>
	<ol>
		<li><a href="goods.php?action=show" class="selected">商品列表</a></li>
		<li><a href="goods.php?action=add">新增商品</a></li>
		<?php if ($this->vars['update']){ ?>
			<li><a href="goods.php?action=update&id=<?php echo $this->vars['id']; ?>">修改商品</a></li>
		<?php } ?>
	</ol>
	
	<?php if ($this->vars['show']){ ?>
	<table cellspacing="0">
    	<tr>
    		<th>商品名称</th><th>价格</th><th>标签</th><th>运费</th><th>颜色</th><th>尺寸</th><th>发布时间</th><th>操作</th>
    	</tr>
    	<?php if ($this->vars['AllGoods']){ ?>
    	<?php foreach ($this->vars['AllGoods'] as $keykey=>$value) { ?>
    	<tr>
    		<td><a href="../details.php?id=<?php echo $value->id?> "  target="_blank"   title="<?php echo $value->goods_name?>"><?php echo $value->goods_name?></a></td>
    		<td><?php echo $value->price?></td>
    		<td><?php echo $value->attr?></td>
    		<td><?php echo $value->freight?></td>
    		<td><?php echo $value->color?></td>
    		<td><?php echo $value->size?></td>
    		<td><?php echo $value->date?></td>
    		<td><a href="goods.php?action=update&id=<?php echo $value->id?>" >修改</a> | <a href="goods.php?action=delete&id=<?php echo $value->id?>"  onclick="return confirm('确定删除？') ? true:false">删除</a></td>
    	</tr>
		<?php } ?> 
		<?php }else{ ?>
		<tr><td colspan="7">对不起，没有任何数据！</td></tr>
		<?php } ?>  
    </table>    
    <form action="?" method="get">
    <div id="page">
    		<?php echo $this->vars['page']; ?>
    </div>
    </form>
	<?php } ?>
	
	<?php if ($this->vars['add']){ ?>
		<form name="content" method="post" action="?action=add">
    		<table cellspacing="0"  class="content"> 	
            	<tr><th><strong>添加一件新商品</strong></th></tr>
    			<tr><td>商品名称：<input  type="text"  name="goods_name"  class="text"/><span class="red">【必填】</span>（* 标题2-30个字符之间）</td></tr>		   
    	        <tr><td>标　　签：
    											<input type="checkbox" name="attr[]" value="新品上市" />新品上市
    											<input type="checkbox" name="attr[]" value="热卖单品" />热卖单品
    		 	</td></tr>
    		 	<tr><td>颜　　色：
    											<input type="checkbox" name="color[]" value="黑色" />黑色
    											<input type="checkbox" name="color[]" value="白色" />白色
    											<input type="checkbox" name="color[]" value="绿色" />绿色
    											<input type="checkbox" name="color[]" value="灰色" />灰色
    											<input type="checkbox" name="color[]" value="蓝色" />蓝色
    											<input type="checkbox" name="color[]" value="红色" />红色
    		 	</td></tr>
    		     <tr><td>尺　　寸：
    											<input type="checkbox" name="size[]" value="XS" />XS
    											<input type="checkbox" name="size[]" value="S" />S
    											<input type="checkbox" name="size[]" value="M" />M
    											<input type="checkbox" name="size[]" value="L" />L
    											<input type="checkbox" name="size[]" value="XL" />XL
    											<input type="checkbox" name="size[]" value="XXL" />XXL
    											<input type="checkbox" name="size[]" value="39" />39
    											<input type="checkbox" name="size[]" value="40" />40
    											<input type="checkbox" name="size[]" value="41" />41
    											<input type="checkbox" name="size[]" value="42" />42
    											<input type="checkbox" name="size[]" value="43" />43
    											<input type="checkbox" name="size[]" value="44" />44
 											
    		 	</td></tr>
    		 	<tr><td>运　　费：<input  type="text" name="freight"/></td></tr>
    			<tr><td>图　　片：<input  type="text"  name="thumbnail" class="text"  readonly="readonly"/>
    									     <input  type="button"  value="上传缩略图" onclick="centerWindow('../templates/goodsupfile.html','upfile','500','150')"/>（* 缩略图必须是jpg,gif,png格式）
    										<img name="pic"  style="display:none;"/>
    			</td></tr>
    			<tr><td><span class="middle">物品简介：</span><textarea  name="info" ></textarea><span class="middle">（* 不能大于200位）</span></td></tr>
            	<tr><td>物品价格：<input  type="text"  name="price"  class="text small"  /></td></tr>
            	<tr><td>浏览次数：<input  type="text"  name="count"  class="text small"  /></td></tr>
            	<tr><td><input  type="submit"  name="send"  onclick="return checkAddGoods();" value="发布"/><input type="reset" value="重置" /></td></tr>
        	</table> 
	  </form>
	<?php } ?>
	
	<?php if ($this->vars['update']){ ?>
	<form name="content" method="post" action="?action=update">
	<input type="hidden"  name="id" value="<?php echo $this->vars['id']; ?>"  />
	<input type="hidden"  name="prev_url" value="<?php echo $this->vars['prev_url']; ?>"  />
	   		<table cellspacing="0"  class="content"> 	
            	<tr><th><strong>修改商品</strong></th></tr>
    			<tr><td>商品名称：<input  type="text"  name="goods_name"  value="<?php echo $this->vars['goods_name']; ?>"  class="text"/><span class="red">【必填】</span>（* 标题2-30个字符之间）</td></tr>		   
    	        <tr><td>标　　签：
    											<input type="checkbox" name="attr[]" value="新品上市" />新品上市
    											<input type="checkbox" name="attr[]" value="热卖单品" />热卖单品
    		 	</td></tr>
    		 		<tr><td>颜　　色：
    											<input type="checkbox" name="color[]" value="黑色" />黑色
    											<input type="checkbox" name="color[]" value="白色" />白色
    											<input type="checkbox" name="color[]" value="绿色" />绿色
    											<input type="checkbox" name="color[]" value="灰色" />灰色
    											<input type="checkbox" name="color[]" value="蓝色" />蓝色
    											<input type="checkbox" name="color[]" value="红色" />红色
    		 	</td></tr>
    		     <tr><td>尺　　寸：
    											<input type="checkbox" name="size[]" value="XS" />XS
    											<input type="checkbox" name="size[]" value="S" />S
    											<input type="checkbox" name="size[]" value="M" />M
    											<input type="checkbox" name="size[]" value="L" />L
    											<input type="checkbox" name="size[]" value="XL" />XL
    											<input type="checkbox" name="size[]" value="XXL" />XXL
    											<input type="checkbox" name="size[]" value="39" />39
    											<input type="checkbox" name="size[]" value="40" />40
    											<input type="checkbox" name="size[]" value="41" />41
    											<input type="checkbox" name="size[]" value="42" />42
    											<input type="checkbox" name="size[]" value="43" />43
    											<input type="checkbox" name="size[]" value="44" />44
    											
    		 	</td></tr>
    		 	<tr><td>运　　费：<input  type="text" name="freight" value="<?php echo $this->vars['freight']; ?>"/></td></tr>
    			<tr><td>缩&nbsp;&nbsp;略&nbsp;&nbsp;图：<input  type="text"  name="thumbnail"  value="<?php echo $this->vars['thumbnail']; ?>" class="text"  readonly="readonly"/>
    																				    <input  type="button"  value="上传缩略图" onclick="centerWindow('../templates/upfile.html','upfile','500','150')"/>（* 缩略图必须是jpg,gif,png格式,小于2MB）
    																					<img name="pic" src="<?php echo $this->vars['thumbnail']; ?>" style="display:block;"/>
    			</td></tr>
    			<tr><td><span class="middle">物品简介：</span><textarea  name="info"  ><?php echo $this->vars['info']; ?></textarea><span class="middle">（* 不能大于200位）</span></td></tr>
            	<tr><td>物品价格：<input  type="text"  name="price"  value="<?php echo $this->vars['price']; ?>" class="text small"  /></td></tr>
            	<tr><td>浏览次数：<input  type="text"  name="count"  value="<?php echo $this->vars['count']; ?>" class="text small"  /></td></tr>
            	<tr><td><input  type="submit"  name="send"  onclick="return checkAddGoods();" value="发布"/><input type="reset" value="重置" /></td></tr>
        	</table> 
	  </form>
	
	<?php } ?>
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>