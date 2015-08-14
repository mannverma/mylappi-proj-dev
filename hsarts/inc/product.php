   <div id="content-row">
      <div class="row-container">
        <div class="container">
          <div class="content-inner row">
        
            <!-- Left sidebar -->
                    
            <div id="component" class="span12">
              <!-- Breadcrumbs -->
                      
              <!-- Content-top -->
            <?php
			$PName = str_replace("-"," ",$_GET['product']);
			$rs = $db->getProductByName(strtolower($PName));
			?>          
                
<div id="system-message-container">
<div id="system-message">
</div>
</div>
                <div class="page-item page-item__gallery page-item__">

					
		<div class="item_header">
		<h3 class="item_title">
        <span class="item_title_part0"><?php echo $PName;?></span>
        </h3>
        </div>
	
	
	
		
	
	

	<!-- Article Image -->	
			
			<div class="page-gallery_img">
				<div class="item_img img-full img-full__left span5">
					<a class="touchGalleryLink zoom" href="product_img/<?php echo $rs['img'];?>">
						<span class="zoom-bg"></span>
				          <span class="zoom-icon"></span>
						<img
														src="product_img/<?php echo $rs['img'];?>" alt="" style="width:100%;"/>
					</a> 
				</div>
			</div>
					

		
	<div class="item_fulltext">
    <?php echo $rs['speci'];?>
</div>	
	
</div>

        
              <!-- Content-bottom -->
                          </div>
        
            <!-- Right sidebar -->
                      </div>
        </div>
      </div>
    </div>
   <div id="push"></div>