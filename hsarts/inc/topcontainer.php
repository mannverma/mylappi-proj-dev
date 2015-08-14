 <div class="top_container">
      <div id="header-row">
        <div class="row-container">
          <div class="container">
            <header>
              <div class="row">
                <div id="logo" class="span12"> <a href="index.php"> <img src="images/logo.png" alt="HS Art Works" style="width:75%; height:auto;"/> </a> </div>
              </div>
            </header>
          </div>
        </div>
      </div>
      <div id="navigation-row">
        <div class="row-container">
          <div class="container">
            <div class="row">
              <nav>
                <div class="moduletable navigation  span12">
                <?php
					$page = $_GET['pg'].".php";//explode("/",$_SERVER['PHP_SELF']);
				    //$page = $p[sizeof($p)-1];
				?>
                  <ul class="sf-menu menu_1 ">
                    <li class="item-101<?php echo ($page == "" || $page == "index.php")?" current active":""; ?>"><a href="index.php">Home</a></li>
                    <li class="item-102<?php echo ($page == "about-us.php")?" current active":""; ?>"><a href="about-us.php">About Us</a></li>
                    
                    <li class="item-167<?php echo ($page == "product-category.php")?" current active":""; ?> deeper parent"><a href="#">Products</a>
                      <ul>
                       <?php
					   $i=172;
					  $rs = $db->getCatsList();
					  foreach($rs as $row)
					  {
					  ?>
                        <li class="item-<?php echo $i-=2; ?>"><a href="product-category.php?category=<?php echo str_replace(" ","-",$row['name']); ?>"><?php echo $row['name']; ?></a></li>
                      <?php
					  }
					  ?> 
                      </ul>
                    </li>
                    <li class="item-109<?php echo ($page == "enquiry.php")?" current active":""; ?>"><a href="enquiry.php">Enquiry</a></li>
                    <li class="item-102<?php echo ($page == "contact-us.php")?" current active":""; ?>"><a href="contact-us.php">Contact Us</a></li>
                  </ul>
                  <script type="text/javascript">
	// initialise plugins
	jQuery(function(){
		jQuery('ul.sf-menu')
			 
		.superfish({
			hoverClass:    'sfHover',         
	    pathClass:     'overideThisToUse',
	    pathLevels:    1,    
	    delay:         500, 
	    animation:     {opacity:'show', height:'show'}, 
	    speed:         'normal',   
	    speedOut:      'fast',   
	    autoArrows:    false, 
	    disableHI:     false, 
	    useClick:      0,
	    easing:        "swing",
	    onInit:        function(){},
	    onBeforeShow:  function(){},
	    onShow:        function(){},
	    onHide:        function(){},
	    onIdle:        function(){}
		});
	});

	jQuery(function(){
		jQuery('.sf-menu').mobileMenu({
			defaultText: 'Navigate to...',
			className: 'select-menu',
			subMenuClass: 'sub-menu_1'
		});
	})

	jQuery(function(){
		var ismobile = navigator.userAgent.match(/(iPhone)|(iPod)|(android)|(webOS)/i)
		if(ismobile){
			jQuery('.sf-menu').sftouchscreen({});
		}
	})
</script></div>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <?php include "slider.php" ?>
    </div>
  