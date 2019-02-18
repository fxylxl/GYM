$(function(){
		$(".menu li:eq(0)").addClass("newMenu");
		$(".menu li").hover(function(){
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

