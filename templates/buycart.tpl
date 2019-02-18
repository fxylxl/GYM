<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/buycart.css" />  
<script type="text/javascript" src="config/static.php?id={$id}&type=details"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>

<script type="text/javascript">
$(function(){
	$(".menu li:eq(0)").addClass("newMenu");
	$(" .menu li").hover(function(){
			$(".menu li").removeClass("newMenu");
			$(this).addClass("newMenu",".newMenu a");
			
		},function(){
			$(this).removeClass("newMenu");	
		})		
		
		/*dropDown menu*/
		$(".childMenu").hide();
		$(".menu li").hover(function(){
			$(this).children(".childMenu").show(200);
		},function(){
			$(this).children(".childMenu").hide(100);
		})
		
		$(".childMenu dd").hover(function(){
			$(this).removeClass("newDd");
			$(this).addClass("newDd");	
		},function(){
			$(this).removeClass("newDd");	
		})



		$(".banner img").hide();
		$(".banner img:eq(0)").show();
		$(".box li").eq(0).css("background-color","red");
		$(".box li").mouseover(function(){
			$(".box li").css("background-color","#333");
			$(this).css("background-color","red")	
			
			n=$(".box li").index(this);
			$(".banner img").hide();
			$(".banner img").eq(n).show();
		})	;	


			//全选
			$(cartTable).find(":checkbox").click(function() {  
		        //全选框单击  
		        if ($(this).hasClass("check-all")) {  
		            var checked = $(this).prop("checked");  
		            $(cartTable).find(".check-one").prop("checked", checked);  
		        }  
		  
		        //如果手工一个一个的点选了所有勾选框，需要自动将“全选”勾上或是取消  
		        var items = cartTable.find("tr:gt(0)");  
		        $(cartTable).find(".check-all").prop("checked", items.find(":checkbox:checked").length == items.length);  
		  
		        getTotal();  
		    });  

		





			
		
})

</script>
</head>
<body>
{include file='header.tpl'}
	<div id="buycart">
		<h2>购物车</h2>
		<div><a href="goodslist.php">返回购物列表</a></div>
   		<table cellspacing="0"  id="cartTable">
   			<thead>
   			    <tr>
            		<th class="t1"><input class="check-all check" type="checkbox"  value="全选" />全选</th>
            		<th class="t2">商品信息</th>
            		<th class="t3"></th>
            		<th class="t4">单价</th>
            		<th class="t5">数量</th>
            		<th class="t6">金额</th>
            		<th class="t7">操作</th>
            	</tr>
   			</thead>
   			
   			<tbody>
   				
            	{if $cartlist}
            	{foreach $cartlist(key,value)}
            	<tr>
            		<td><input class="check-one check" type="checkbox" /></td>
            		<td class="first"><a href="trade.php?id={@value->id}" target="_blank"><img src="{@value->thumbnail}" /><span>{@value->goods_name}</span></a></td>
            		<td class="attr">颜色：{@value->color}<br />尺码：{@value->size}</td>
            		<td class="tdfour"><span>单价：</span><span class="unit">{@value->price}.00</span></td>
            		<td><span class="jiajie"><input type="button" value="-"/><span class="num">0</span><input type="button" value="+"/></span></td>
            		<td class="sub">小计：<span class="subtal">0</span></td>  
            		<td><a href="buycart.php?action=move&id={@value->id}" >移入收藏夹</a><br />
            		       <a href="buycart.php?action=delete&id={@value->id}"  onclick="return confirm('确定删除？') ? true:false">删除</a></td>
            	</tr>
        		{/foreach} 
        		{else}
        		<tr><td colspan="5">对不起，没有任何数据！</td></tr>
        		{/if}  
        		
   			</tbody>
            
 		   </table>  
 		  
 		   <div class="show">
 		   		<div class="total">商品金额总计（不含运费）：<span class="pricetal">0</span> 元</div>
 		  		<div class="number">商品件数： <span class="goods_num">0</span>件 </div>
 		   		 <div id="selected">  
                    <span id="selectedTotal"></span>  
                </div>  
 		   </div>
 		   <div class="pay">
 		   		<div class="now"><a href="pay.php">结算</a></div>
 		   </div>
 		
	</div>
{include file='footer.tpl'}

</body>
</html>