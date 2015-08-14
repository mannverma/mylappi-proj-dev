  <div id="feature-row">
      <div class="row-container">
        <div class="container">
          <div class="row">
            <div class="moduletable top_blocks  span12">
              <div class="mod-newsflash-adv mod-newsflash-adv__top_blocks">
                <div class="row">
                <?php
				require_once("Html2Text.php");
				
				$i=0;
				$rs = $db->getHomeProducts();
				foreach($rs as $row)
				{
					$cat = $db->getCategoryById($row['cid']);
					$html = $row['speci'];
					$html = new \Html2Text\Html2Text($html);
					
					
				?>
                  <div class="span3 item item_num0 item__module  ">
                   <h1 class="item_title" style="height:80px;">
                     <?php
					  $j=0;
					  $pieces = explode(" ",$cat['name']);
					  foreach($pieces as $word)
					  {
					  ?>
                   <span class="item_title_part<?php echo $j++; ?>"><?php echo $word; ?></span> 
                    <?php
					  }
					  ?></h1>
                    <div class="item_img img-intro img-intro__none"> <a href=""> <img src="product_img/m/<?php echo $row['img']; ?>" alt=""/></a> </div>
                    <div class="item_content">
                      <h4 class="item_title item_title__top_blocks"> 
                      <?php
					  $j=0;
					  $pieces = explode(" ",$row['name']);
					  foreach($pieces as $word)
					  {
					  ?>
                      <span class="item_title_part<?php echo $j++; ?>"><?php echo $word; ?></span>
                      <?php
					  }
					  ?>
                      </h4>
                      <div class="item_introtext">
                        <p><?php echo substr($html->getText(),0,120); ?></p>
                      </div>
                      <a class="btn btn-info readmore" href="product-category.php?category=<?php echo str_replace(" ","-",$cat['name']); ?>"><span>more</span></a></div>
                    <div class="clearfix"></div>
                  </div>
                <?php
				}
				?>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   