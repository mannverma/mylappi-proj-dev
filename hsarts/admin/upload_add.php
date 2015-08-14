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
        <title>Megatron Admin Panel</title>
    
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
		$title="";
		$desc="";
		$img="../admin/img/AAAAAA.gif";
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
		if(isset($_REQUEST['delid']))
		{
			$r=mysql_fetch_array(mysql_query("select * from admin_downloads where id=".$_REQUEST['delid']));
			unlink("download/".$r['file']);
			mysql_query("delete from admin_downloads where id=".$_REQUEST['delid']);
		}
		if(isset($_POST['submit']))
		{
			if(isset($_REQUEST['eid']))
			{
				if($_FILES['uploadfile']['name']!='')
				{
					$root="download/";
					$name=$_FILES['uploadfile']['name'];
					$name=explode('.',$name);
					$name1=$name[0];
					$name1=substr($name1,0,3);
					$name2=$name[1];
					$name2=strtoupper($name2);
					$result_id=mysql_query("select * from admin_downloads order by id desc");
					$row_id=mysql_fetch_assoc($result_id);
					$name3 = $row_id['file'];
					unlink($root.$name3);
					$nm=explode(".",$name3);
					$name3=$nm[0].".".$name2;
					$target_path = $root.basename($name3); 
					if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) 
					{
						
					}
				}
				$w="";
				if($name3!="")
				$w=", file='".$name3."'";
				mysql_query("update admin_downloads set title='".$_POST['title']."'$w where id=".$_REQUEST['eid']);
			}
			else
			{ 					
				$id=mysql_fetch_array(mysql_query("select * from departments where id=".$_SESSION['did']));
				if($_FILES['uploadfile']['name']!='')
				{
					$root="download/";
					$name=$_FILES['uploadfile']['name'];
					$name=explode('.',$name);
					$name1=$name[0];
					$name1=substr($name1,0,3);
					$name2=$name[1];
					$name2=strtoupper($name2);
					$result_id=mysql_query("select * from admin_downloads order by id desc");
					$row_id=mysql_fetch_assoc($result_id);
					$ids=($row_id['id']+1)." ".($row_id['id']+1);
					$name3 = $ids.'.'.$name2;
					$target_path = $root.basename($name3); 
					if(move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) 
					{
						mysql_query("insert into admin_downloads values(NULL,'".$_POST['title']."','".$name3."',DATE(NOW()))");
					}
				}
			}
		}
		if(isset($_REQUEST['edid']))
		{
			$eid=$_REQUEST['edid'];
			$q=mysql_query("select * from admin_downloads where id=".$eid);
			$row=mysql_fetch_array($q);
			$title=$row['title'];
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
											<p class="f_legend">Add Download </p>
											<div class="control-group">
													<?php 
													if($eid!="")
													{
													?>
													<input type="hidden" name="eid" value="<?php echo $eid; ?>"/>
													<?php
													}
													?>

												
												<label class="control-label">Download Title</label>
												<div class="controls">
													<textarea name="title" rows=4 class="span10"><?php echo $title; ?></textarea>
												</div><br>
												
												<label class="control-label">Attachment</label>
												<div class="controls">
													<input type="file" name="uploadfile"/>
												</div>
												
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
							<h3 class="heading">Deptt. Download View</h3>
							<table class="table table-bordered table-striped table_vam" id="dt_gal">
								<thead>
									<tr>
										<th>Download ID</th>
										<th>Title</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php
				$qr=mysql_query("select * from admin_downloads");
				while($row=mysql_fetch_array($qr))
				{
				?>
									<tr>
										<td><?php echo $row['id'];?></td>
										<td><?php echo $row['title'];?></td>
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


