<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/trade.css" />  
<script type="text/javascript" src="config/static.php?id={$id}&type=details"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript"  src="js/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".menu li:eq(0)").addClass("newMenu");
	$(" .menu li").hover(function(){
			$(".menu li").removeClass("newMenu");
			$(this).addClass("newMenu",".newMenu a");
			
		},function(){
			$(this).removeClass("newMenu");	
		});		
		
		/*dropDown menu*/
		$(".childMenu").hide();
		$(".menu li").hover(function(){
			$(this).children(".childMenu").show(200);
		},function(){
			$(this).children(".childMenu").hide(100);
		});
		
		$(".childMenu dd").hover(function(){
			$(this).removeClass("newDd");
			$(this).addClass("newDd");	
		},function(){
			$(this).removeClass("newDd");	
		});



		$(".banner img").hide();
		$(".banner img:eq(0)").show();
		$(".box li").eq(0).css("background-color","red");
		$(".box li").mouseover(function(){
			$(".box li").css("background-color","#333");
			$(this).css("background-color","red");	
			
			n=$(".box li").index(this);
			$(".banner img").hide();
			$(".banner img").eq(n).show();
		});		
		
		$(".add").click(function(){
			var n=$(this).prev().val();
			var num=parseInt(n)+1;
			if(num==0){ return;}
			$(this).prev().val(num);
			});
			//减的效果
			$(".jian").click(function(){
			var n=$(this).next().val();
			var num=parseInt(n)-1;
			if(num==0){ return}
			$(this).next().val(num);
			});
		
})

</script>
</head>
<body>
{include file='header.tpl'}

<div class="main">
	<div><a href="buycart.php?action=show">我的购物车</a></div>
    <div id="trade">
    	<form method="post" action="order.php" >
    		<input type="hidden"  name="id" value="{$id}"  />
        	<div class="picture"><img src="{$thumbnail}" alt="{goods_name}" /></div>
        	<div class="details">
        		<div class="goods_name">{$goods_name}</div>
        		<div class="price">价格:　    　<span>￥{$price}.00</span></div>
        		<div class="freight">运费:　　　{$freight}.00元</div>
        		<div class="size">尺码:　    　  <input type="radio" value="S" name="size"/>S<input type="radio" value="M" name="size"/>M<input type="radio" value="L" name="size"/>L<input type="radio" value="XL" name="size"/>XL</div>    
        		<div class="color">颜色:　   　   <input type="radio" value="黑色" name="color"/>黑色<input type="radio" value="灰色" name="color"/>灰色<input type="radio" value="白色" name="color"/>白色</div>
            	<div class="bn">
                    	<div class="num">购买数量：</div> 
                    	<div class="gw_num">
                            <em class="jian">-</em>
                            <input type="text" value="1" class="num"  name="number"/>
                            <em class="add">+</em>
                       </div>     	
                    
            	</div>
        		<p class="p1">
        		<input type="submit" name="joincart" class="joincart" value="加入购物车" />
        
        		<input type="submit" name="collection" class="collection" value="收  藏" />
        		</p>
        		<p>
        			<a href="pay.php?id={$id}">结算</a>
        		</p>  	
    		</form> 	

    	</div>		
  		
    </div>
   
    <div id="sidebar">
    	<div class="titleb">看了又看-------------</div>
    	<div class="side">
    	   	<ul>
    		{$sgoods}
    	   </ul>
    	</div>
 
    </div>
</div>


{include file='footer.tpl'}

</body>
</html>