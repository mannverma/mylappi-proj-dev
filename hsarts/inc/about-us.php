   <div id="content-row">
      <div class="row-container">
        <div class="container">
          <div class="content-inner row">
        
            <!-- Left sidebar -->
                    
            <div id="component" class="span8">
              <!-- Breadcrumbs -->
                      
              <!-- Content-top -->
                      
                
<div id="system-message-container">
<div id="system-message">
</div>
</div>
                <div class="page-category page-category__about">

		<div class="page_header">
		<h3><span class="item_title_part0">About Us</span></h3>	</div>
	
	
	
		

						<div class="items-row cols-1 row-0 row-fluid">
					<div class="span12">
				<div class="item column-1">
					
<!-- Icons -->
	
<!-- Intro image -->
					<div class="item_img img-intro img-intro__left">
			<img
						src="../images/about-1.jpg" alt=""/>
		</div>
		

			
			
<!-- Introtext -->
	<div class="item_introtext">
    <?php
	$about = $db->getPage("aboutus");
	echo $about['description'];
	?>
	</div>

<!-- info BOTTOM -->
	
<!-- More -->
	
				</div><!-- end item -->
							</div><!-- end spann -->
						
		</div><!-- end row -->
						
	

		</div>

        

                          </div>
        
            <!-- Right sidebar -->
                          <div id="aside-right" class="span4">
                <aside>
                  <div class="moduletable awards"><h3 class="moduleTitle ">Latest Products</h3><div class="mod-newsflash-adv mod-newsflash-adv__awards">

    

	<?php
	require_once("Html2Text.php");
	$i=0;
	$rs = $db->getHomeProducts();
	foreach($rs as $row)
	{
		$html = $row['speci'];
		$html = new \Html2Text\Html2Text($html);
  ?>
  	<div class="row" style="height:70px;">
    	<div class="span1">
        <img src="product_img/m/<?php echo $row['img']; ?>" width="80" />
        </div>
        <div class="span3" style="margin-left:10px !important;">
    <div class="item__module ">
	<!-- Intro Image -->
		<div class="item_content">
		<!-- Item title -->
			<h4 class="item_title item_title__awards">
					<span class="item_title_part0"><a href="product.php?product=<?php echo str_replace(" ","-",$row['name']); ?>"><?php echo $row['name']; ?></a></span>
            </h4>
            <!-- Introtext -->
            <div class="item_introtext"><p><?php echo substr($html->getText(),0,70); ?></p></div>
		<!-- Read More link -->
		</div>
		
    </div>
    </div>
      <div class="clearfix"></div>
    </div>
    <?php
	}
	?>
  <div class="clearfix"></div>

  </div>
</div>
                </aside>
              </div>
                      </div>
        </div>
      </div>
    </div>
   <div id="push"></div>