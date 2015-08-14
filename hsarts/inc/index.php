 <div id="content-row">
      <div class="row-container">
        <div class="container">
          <div class="content-inner row">
            
            <div id="component" class="span9">
              <div id="system-message-container">
                <div id="system-message"> </div>
              </div>
              <div class="page-category page-category__home">
                <div class="page_header">
                  <h3><span class="item_title_part0">Welcome</span></h3>
                </div>
                <div class="items-row cols-1 row-0 row-fluid">
                  <div class="span12">
                    <div class="item column-1">

                      <div class="item_introtext">
                        <div class="moduletable">
                          <div class="mod-newsflash-adv mod-newsflash-adv__ team">
                            <div class="span4 item item_num0 item__module  " style="margin-bottom:0px !important;">
                              <div class="item_img img-intro img-intro__none"> <a href="about-us.php"> <img src="images/team/welcome.jpg" alt=""/></a> </div>
                              
                            </div>
                            
                            
                          </div>
                        </div>
                        <?php
						$row = $db->getPage("homepage");
						echo $row['description'];
                        ?>
                      </div>
                      <a class="btn btn-info" href="about-us.php"><span> More </span></a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="aside-right" class="span3">
              <aside>
                <div class="moduletable ">
                  <h3 class="moduleTitle ">Chess Categories</h3>
                  <ul class="archive-module">
                  <?php
				  $rs = $db->getCatsList();
				  foreach($rs as $row)
				  {
				  ?>
					<li>
                    	<a href="product-category.php?category=<?php echo str_replace(" ","-",$row['name']); ?>"><?php echo $row['name']; ?></a>
                	</li>
                  <?php
				  }
				  ?>
                </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="push"></div>