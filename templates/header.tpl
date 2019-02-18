
 <script type="text/javascript" src="config/static.php?type=header"></script>
 <div class="nav">
    	<div class="bottom">
            <a href="./"><img class="logo"src="images/logo.png"></a>
            <ul class="menu">
                <li><a href="./">网站首页<span><br>HOME</span></a></li>
                <li class="us"><a href="">勾搭<span><br>FUNNY</span></a>
                	<dl class="childMenu">
                		 <dd><a href="introduce.php">品牌介绍</a></dd>
                		 <dd><a href="goodslist.php">周边发售</a></dd>
                		 <dd><a href="list.php">健身社区</a></dd>
                		 <dd><a href="#">体验中心</a></dd>
                		 <dd><a href="admin/index.php "  target="_blank">员工入口</a></dd>
                		<!-- 
                         {if $FrontNav}
                    	  {foreach $FrontNav(key,value)}
                    	  <dd><a href="list.php?id={@value->id}">{@value->nav_name}</a></dd>
                    	  		
                    	  {/foreach}
                    	  {/if}
                    	   --> 
                    </dl>
                </li>
                
                <li><a href="">约课<span><br>ABOUT CLASS</span></a></li>
                <li><a href="">活动报名<span><br>SIGN UP</span></a></li>
                <li>  <div class="user">{$header}</div></li>
            </ul>

    	</div>
    </div>
 
 
 
 