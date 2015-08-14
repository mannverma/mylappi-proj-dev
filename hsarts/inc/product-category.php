<div id="content-row">
      <div class="row-container">
        <div class="container">
          <div class="content-inner row">
        
            <!-- Left sidebar -->
                    
            <div id="component" class="span12">
              <!-- Breadcrumbs -->
                      
              <!-- Content-top -->
                      
                
<div id="system-message-container">
<div id="system-message">
</div>
</div>
                
<div class="note"></div>


<div class="page-gallery page-gallery__gallery">

    <div class="page_header">
    <h3><span class="item_title_part0"><?php echo str_replace("-"," ",$_GET['category']); ?></span> </h3>  </div>
  
  
  


      
	<div class="row-fluid">
		<ul id="isotopeContainer" class="gallery items-row cols-4">
          <?php
		  require_once("Html2Text.php");
		  $rs = $db->getCategoryByName(str_replace("-"," ",$_GET['category']));
			$rs2 = $db->getProductsByCatID($rs['id']);
			foreach($rs2 as $row)
			{
					$html = $row['speci'];
					$html = new \Html2Text\Html2Text($html);
		  ?>
            <li class="gallery-item">
				<div class="item_img img-intro img-intro__left"> 
      		        <a class="touchGalleryLink zoom" href="product_img/<?php echo $row['img']; ?>">
                        <span class="zoom-bg"></span>
                        <span class="zoom-icon"></span>
                        <img src="product_img/<?php echo $row['img']; ?>" alt="Image couldn't be loaded"/>
					</a>
				</div>
				<div class="item_header">
					<h4 class="item_title">
                    	<a href="product.php?product=<?php echo str_replace(" ","-",$row['name']); ?>">
                        	<span class="item_title_part0"><?php echo $row['name']; ?></span>
                        </a>
					</h4>		
				</div>
				<div class="item_introtext">
                	<p><?php echo substr($html->getText(),0,130); ?></p>
				</div>
				<div class="clearfix"></div>
            </li><!-- end span -->
            <?php
			}
			?>
		</ul>
	</div><!-- end row -->
    
  

  
  </div>

  <script type="text/javascript">
    jQuery(document).ready(function() {
    (function($){ 
     $(window).load(function(){

      var $cols = 4;
      var $container = $('#isotopeContainer');

      $item = $('.gallery-item')
      $item.outerWidth(Math.floor($container.width() / $cols));

      $container.isotope({
        animationEngine: 'best-available',
        animationOptions: {
            queue: false,
            duration: 800
          },
          containerClass : 'isotope',
          containerStyle: {
            position: 'relative',
            overflow: 'hidden'
          },
          hiddenClass : 'isotope-hidden',
          itemClass : 'isotope-item',
          resizable: true,
          resizesContainer : true,
          transformsEnabled: !$.browser.opera // disable transforms in Opera
      });

      if($container.width() <= '767'){
        $item.outerWidth($container.width());
        $item.addClass('straightDown');
        $container.isotope({
          layoutMode: 'straightDown'
        });
      } else {
        $item.removeClass('straightDown');
        $container.isotope({
          layoutMode: 'fitRows'
        });
      }

      $(window).resize(function(){
        $item.outerWidth(Math.floor($container.width() / $cols));
        if($container.width() <= '767'){
          $item.outerWidth($container.width());
          $item.addClass('straightDown');
          $container.isotope({
            layoutMode: 'straightDown'
          });
        } else {
          $item.outerWidth(Math.floor($container.width() / $cols));
          $item.removeClass('straightDown');
          $container.isotope({
            layoutMode: 'fitRows'
          });
        }
      });
    });
  })(jQuery);
  }); 
  </script>


  
        
              <!-- Content-bottom -->
                          </div>
        
            <!-- Right sidebar -->
                      </div>
        </div>
      </div>
    </div>

    <!-- Mainbottom -->
    
    <!-- Bottom -->
        <div id="push"></div>