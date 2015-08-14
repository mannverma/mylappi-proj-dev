<?php

include("../config/functions.inc.php");

include("../config/functions.php");

include("adminpwdcheck.php");

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?php echo $site_title; ?> Admin Panel</title>

    

        <!-- Bootstrap framework -->

            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />

        <!-- gebo blue theme-->

            <link rel="stylesheet" href="css/blue.css" id="link_theme" />

        <!-- breadcrumbs-->

            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />

        <!-- tooltips-->

            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />

        <!-- notifications -->

            <link rel="stylesheet" href="lib/sticky/sticky.css" />    

        <!-- splashy icons -->

            <link rel="stylesheet" href="img/splashy/splashy.css" />

        <!-- enhanced select -->

            <link rel="stylesheet" href="lib/chosen/chosen.css" />

		<!-- colorbox -->

            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />

			

        <!-- main styles -->

            <link rel="stylesheet" href="css/style.css" />

			

            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />

	

        <!-- Favicon -->

 <!--           <link rel="shortcut icon" href="favicon.ico" />-->

		

        <!--[if lte IE 8]>

            <link rel="stylesheet" href="css/ie.css" />

            <script src="js/ie/html5.js"></script>

			<script src="js/ie/respond.min.js"></script>

        <![endif]-->

		

		<script>

			//* hide all elements & show preloader

			document.documentElement.className += 'js';

		</script>

		<?php

		$eid="";
$cid="";
		$pname="";

		$desc="";

		$price="";

		$img="../admin/img/AAAAAA.gif";

		$name3="";

		$name3x="";		
		$namex="";	

		function smart($value)

		{

		   // Stripslashes

		   if (get_magic_quotes_gpc()) 

		   {

		       $value = stripslashes($value);

		   }

		   // Quote if not integer

		   if (!is_numeric($value)) 

		   {

		       $value = mysql_real_escape_string($value);

		   }

		   return $value;

		}

		if(isset($_REQUEST['cid']))

		{

			$_SESSION['cid']=$_REQUEST['cid'];

		}

		if(isset($_REQUEST['delid']))

		{

			$r=mysql_fetch_array(mysql_query("select img,pdf from products where id=".$_REQUEST['delid']));

			unlink("../product_img/".$r[0]);

			unlink("../product_img/m/".$r[0]);

			mysql_query("delete from products where id=".$_REQUEST['delid']);

		}

		if(isset($_POST['submit']))

		{

			if(isset($_REQUEST['eid']))

			{

					$first=$_FILES['uploadphoto']['name'];

					if($first!='')

					{
					
					$root="../product_img/";

					$qr=mysql_query("select img,id from products where id=".$_REQUEST['eid']);

					$r=mysql_fetch_array($qr);

					$thumbs = "../product_img/";

					$thumb = "../product_img/m/";

					$name=$_FILES['uploadphoto']['name'];

					$name=explode('.',$name);

					$name1=$name[0];

					$name1=substr($name1,0,3);

					$name2=$name[sizeof($name)-1];

					$name2=strtoupper($name2);

					if($name2=='JPG' or $name2=='JPEG' or $name2=='GIF' )

					{
						
						$name3=$r[1].".".$name2;
						
				   		$target_path = $root.basename($name3); 

						unlink($thumbs.$r[0]);

						unlink($thumb.$r[0]);
						if(move_uploaded_file($_FILES['uploadphoto']['tmp_name'], $target_path)) 

						{

							createThumbs($thumbs,$thumb,270,228,$name3,$name3);
							createThumbs($thumbs,$thumbs,940,"",$name3,$name3);
						}

						else

						{

							$_SESSION['err']='Server is busy try after some time<br>';

						}

					}

					else

					{

						$_SESSION['err']='Please upload Correct image format jpg or gif .. <br>';

					}

				}

				

				$w=$w1="";

				
				if($name3!="")

				{ $w1=", img='".$name3."'"; }

				mysql_query("update products set cid=".$_POST['cid'].", name='".$_POST['name']."',speci='".smart($_POST['wysiwg_full'])."',srno='".$_POST['srno']."'".$w1." where id=".$_REQUEST['eid']);

			}

			else

			{ 		

					$root="../product_img/";

					$first=$_FILES['uploadphoto']['name'];

					if($first=='')

					{

						//header('location:'.$_SERVER['PHP_SELF']);

					}

					else

					{

						$thumbs = "../product_img/";

						$thumb = "../product_img/m/";

						if(($_FILES['uploadphoto']['name'])!='')

						{

							$name=$_FILES['uploadphoto']['name'];

							$name=explode('.',$name);

							$name1=$name[0];

							$name1=substr($name1,0,3);

							$name2=$name[sizeof($name)-1];

							$name2=strtoupper($name2);

							if($name2=='JPG' or $name2=='JPEG' or $name2=='GIF' )

							{

								$result_id=mysql_query("select * from products order by id desc");

								$row_id=mysql_fetch_assoc($result_id);

								$ids=$row_id['id']+1;

								$name3 = $ids.'.'.$name2;

						   		$target_path = $root.basename($name3); 

								if(move_uploaded_file($_FILES['uploadphoto']['tmp_name'], $target_path)) 

								{

									createThumbs($thumbs,$thumb,270,228,$name3,$name3);

									createThumbs($thumbs,$thumbs,940,"",$name3,$name3);

								}

								else

								{

									$_SESSION['err']='Server is busy try after some time<br>';

								}

							}

							else

							{

								$_SESSION['err']='Please upload Correct image format jpg or gif .. <br>';

							}

						}

					}

					

				mysql_query("insert into products values(NULL,".$_POST['cid'].",'".$_POST['name']."','".smart($_POST['wysiwg_full'])."','".$name3."','".$_POST['srno']."')	");

			}

		}

		if(isset($_REQUEST['edid']))

		{

			$eid=$_REQUEST['edid'];

			$q=mysql_query("select * from products where id=".$eid);

			$row=mysql_fetch_array($q);

			$pname=$row['name'];

			$speci=$row['speci'];

			$srno=$row['srno'];

			$img="../product_img/m/".$row['img'];

			$cid=$row['cid'];

		}

		

		?>

    </head>

    <body>

	

		<div id="maincontainer" class="clearfix">

	<?php include('header.php');?>

            <!-- main content -->

            <div id="contentwrapper">

                <div class="main_content">

				<div class="row-fluid">

                                <div class="span6" style="margin-left:80pt;width:500pt;">

									<form class="form-horizontal well" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

										<fieldset>
													<?php 
													if($eid!="")
													{
													?>
														<input type="hidden" name="eid" value="<?php echo $eid; ?>"/>
													<?php
													}
													?>
											<p class="f_legend">Add Product</p>

											<div class="control-group">

												<label class="control-label">Category Name</label>

												<div class="controls">
	
													<select name="cid">
													<?php
													$q=mysql_query("select * from category");
													while($r=mysql_fetch_array($q))
													{
														$s="";
														if($r['id']==$cid)
														{ $s=" selected"; }

													?>
													<option value="<?php echo $r['id'] ?>" <?php echo $s; ?>><?php echo $r['name']; ?></option>
													<?php
													}
													?>
													</select>

												</div><br>
												
												<label class="control-label">Product Name</label>

												<div class="controls">
	
													<input type="text" name="name" value="<?php echo $pname; ?>"/>

												</div><br>
												
												<label class="control-label">Specifications</label>

												<div class="controls">

													<textarea name="wysiwg_full" id="wysiwg_full" cols="30" rows="10"><?php echo $speci;?></textarea>

												</div><br>

												
												<label class="control-label">Image </label>

												<div class="controls">

												<div data-fileupload="image" class="fileupload fileupload-new"><input type="hidden" />

									<div style="width: 50px; height: 50px;" class="fileupload-new thumbnail"><img src="<?php echo $img;?>" alt="" /></div>

									<div style="width: 50px; height: 50px; line-height: 50px;" class="fileupload-preview fileupload-exists thumbnail"></div>

									<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>

									<input type="file" name="uploadphoto"/></span>

									<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>

								</div>

									</div>
			                                    <label class="control-label">Sr. No.</label>

												<div class="controls">

													<input type="text" name="srno" value="<?php echo $srno; ?>"/>

												</div><br>

											</div>



											<div class="control-group">

												<div class="controls">

													<button class="btn" name="submit" type="submit">Save</button>

												</div>

											</div>

										</fieldset>

									</form>

                                </div>

				  </div>

				  <div>

				<div class="row-fluid">

						<div class="span12">

							<h3 class="heading">Products View</h3>

							<table class="table table-bordered table-striped table_vam" id="dt_gal">

								<thead>

									<tr>

										<th width="70">Product ID</th>
										<th>Category Name</th>
										<th>Product Name</th>

										<th>Serial No.</th>

										<th>Image</th>

										<th>Actions</th>

									</tr>

								</thead>

								<tbody>

								<?php

								/*require_once("../class.html2text.inc");

								function txt($html)

								{

									// The ”source” HTML you want to convert.

									// Instantiate a new instance of the class. Passing the string

									// variable automatically loads the HTML for you.

									$h2t =new html2text($html);

									// Simply call the get_text() method for the class to convert

									// the HTML to the plain text. Store it into the variable.

									return($h2t->get_text());

								}*/

				$qr=mysql_query("select * from products");

				while($row=mysql_fetch_array($qr))

				{
						$rs=mysql_fetch_array(mysql_query("select * from category where id=(Select cid from products where id=".$row['id'].")"));
				?>

									<tr>

										<td><?php echo $row['id'];?></td>
										<td><?php echo $rs['name'];?></td>
										<td><?php echo $row['name'];?></td>

										<td><?php echo $row['srno'];?></td>

										<td><a class="cbox_single thumbnail cboxElement" href="../product_img/<?php echo $row['img'];?>"><img style="height:50px; width:50px;" src="../product_img/m/<?php echo $row['img'];?>"></a></td>

										<td>

											<a href="<?php echo $_SERVER['PHP_SELF'].'?edid='.$row[0];?>" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>

											<a href="<?php echo $_SERVER['PHP_SELF'].'?delid='.$row[0];?>" title="Delete"><i class="icon-trash"></i></a>

										</td>

									</tr>

				<?php

				}

				?>

			

								</tbody>

							</table>

							

						</div>

					</div>

					

					    

                </div>

            </div>

		

                  

				  </div>

				

				</div>

			</div>

					    <!-- sidebar -->

		     <?php include("sidebar.php");?>

		     <script src="js/jquery.min.js"></script>

			<!-- smart resize event -->

			<script src="js/jquery.debouncedresize.min.js"></script>

			<!-- hidden elements width/height -->

			<script src="js/jquery.actual.min.js"></script>

			<!-- js cookie plugin -->

			<script src="js/jquery.cookie.min.js"></script>

			<!-- main bootstrap js -->

			<script src="bootstrap/js/bootstrap.min.js"></script>

			<!-- bootstrap plugins -->

			<script src="js/bootstrap.plugins.min.js"></script>

			<!-- tooltips -->

			<script src="lib/qtip2/jquery.qtip.min.js"></script>

			<!-- jBreadcrumbs -->

			<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>

			<!-- sticky messages -->

            <script src="lib/sticky/sticky.min.js"></script>

			<!-- fix for ios orientation change -->

			<script src="js/ios-orientationchange-fix.js"></script>

			<!-- scrollbar -->

			<script src="lib/antiscroll/antiscroll.js"></script>

			<script src="lib/antiscroll/jquery-mousewheel.js"></script>

			<!-- lightbox -->

            <script src="lib/colorbox/jquery.colorbox.min.js"></script>

            <!-- common functions -->

			<script src="js/gebo_common.js"></script>

            <script src="lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>

            <!-- touch events for jquery ui-->

            <script src="js/forms/jquery.ui.touch-punch.min.js"></script>

            <!-- masked inputs -->

            <script src="js/forms/jquery.inputmask.min.js"></script>

            <!-- autosize textareas -->

            <script src="js/forms/jquery.autosize.min.js"></script>

            <!-- textarea limiter/counter -->

            <script src="js/forms/jquery.counter.min.js"></script>

            <!-- datepicker -->

            <script src="lib/datepicker/bootstrap-datepicker.min.js"></script>

            <!-- timepicker -->

            <script src="lib/datepicker/bootstrap-timepicker.min.js"></script>

            <!-- tag handler -->

            <script src="lib/tag_handler/jquery.taghandler.min.js"></script>

            <!-- input spinners -->

            <script src="js/forms/jquery.spinners.min.js"></script>

            <!-- styled form elements -->

            <script src="lib/uniform/jquery.uniform.min.js"></script>

            <!-- animated progressbars -->

    <!-- <script src="js/forms/jquery.progressbar.anim.js"></script>-->

            <!-- multiselect -->

            <script src="lib/multiselect/js/jquery.multi-select.min.js"></script>

            <!-- enhanced select (chosen) -->

            <script src="lib/chosen/chosen.jquery.min.js"></script>

            <!-- TinyMce WYSIWG editor -->

            <script src="lib/tiny_mce/jquery.tinymce.js"></script>

			<!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->

			<script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>

			<script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>

            <!-- colorpicker -->

			<script src="lib/colorpicker/bootstrap-colorpicker.js"></script>

			<!-- form functions -->

            <script src="js/gebo_forms.js"></script>

		    

		    <script>

				$(document).ready(function() {

					//* show all elements & remove preloader

					setTimeout('$("html").removeClass("js")',1000);

				});

				</script>  

		  

	    </div>

	</body>

</html>





