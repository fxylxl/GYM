<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>GYM社区管理系统</title>  
<link rel="stylesheet" type="text/css" href="style/basic.css" />  
<link rel="stylesheet" type="text/css" href="style/pay.css" />  
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
		})		
		
		
})

</script>
</head>
<body>
{include file='header.tpl'}  
   <div id="pay">
   		<h2>确认订单信息</h2>
   		<table cellspacing="0">
            	<tr>
            		<th>店铺宝贝</th><th>商品属性</th><th>单价</th><th>数量</th><th>小计</th>
            	</tr>
            	
            	{if $paylist}
            	<tr>
            		<td class="first"><a href="trade.php?id={$id} " target="_blank" title="{$goods_name}"><img src="{$thumbnail}" /><span>{$goods_name}</span></a></td>
            		<td class="attr">颜色：{$color}<br />尺码：{$size}</td>
            		<td>{$price}</td>
            		<td>{$number}</td>
            		<td>{$total}</td>  
            	</tr>
        		{else}
        		<tr><td colspan="5">对不起，没有任何数据！</td></tr>
        		{/if}  
 		   </table>    
 		   <div class="mess">
 		   		<div class="word">给卖家留言：<input type="text"  placeholder="选填：填写内容已和卖家协商确认"/></div>
 		   		<div class="freight">运送方式：普通配送 快递 免邮</div>
 		   </div>
 		   <div class="total">店铺合计（含运费）<span>￥{$total}.00</span></div>
 		   <div class="suremess">
 		   		<div class="detail">
 		   			<div>实付款：<span class="sign">￥</span><span class="money">{$total}.00</span></div>
 		   			<div>寄送至：<span class="g">陕西 西安 雁塔 劳卫路 优座华城</span></div>
 		   			<div>收货人：<span class="g">冯建国 18792977800</span></div>
 		   		</div>
 		   </div>
 		   <div class="ensure">
 		   			<input type="submit" name="send" value="提交订单"/>
 		   </div>
   </div>

{include file='footer.tpl'}
</body>
</html>