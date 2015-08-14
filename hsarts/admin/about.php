<?php
include("../config/functions.inc.php");
include("adminpwdcheck.php");
include ("../config/functions.php");
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
        <!-- jQuery UI theme-->
            <link rel="stylesheet" href="lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />
        <!-- code prettify -->
            <link rel="stylesheet" href="lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
		<!-- datepicker -->
            <link rel="stylesheet" href="lib/datepicker/datepicker.css" />
        <!-- tag handler -->
            <link rel="stylesheet" href="lib/tag_handler/css/jquery.taghandler.css" />
        <!-- nice form elements -->
            <link rel="stylesheet" href="lib/uniform/Aristo/uniform.aristo.css" />
		<!-- 2col multiselect -->
            <link rel="stylesheet" href="lib/multiselect/css/multi-select.css" />
		<!-- enhanced select -->
            <link rel="stylesheet" href="lib/chosen/chosen.css" />
        <!-- upload -->
            <link rel="stylesheet" href="lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
		<!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />
		<!-- colorpicker -->
            <link rel="stylesheet" href="lib/colorpicker/css/colorpicker.css" />	
		    
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
          <!--  <link rel="shortcut icon" href="favicon.ico" />-->
		
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
		$sid="";
		$stitle="";
		$desc="";
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
		if(isset($_POST['submit']))
		{
			$q1=mysql_query("select * from pages where page_name='aboutus'");
			if(mysql_num_rows($q1)>0)
			{
				mysql_query("update pages set description='".smart($_POST['wysiwg_full'])."' where page_name='aboutus'");			
			}
			else
			{
				mysql_query("insert into pages(page_name,description) values('aboutus','".smart($_POST['wysiwg_full'])."')");
			}
		}
		$q2=mysql_query("select * from pages where page_name='aboutus'");
		$row=mysql_fetch_array($q2);
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
											<p class="f_legend">About Us Description </p>
											<div class="control-group">
												
												<label class="control-label">Description</label>
												<div class="controls">
												
													<textarea name="wysiwg_full" id="wysiwg_full" cols="30" rows="10"><?php echo $row['description'];?></textarea>
												
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
				
					
                </div>
            </div>
		
                  
				  </div>
				
				</div>
			</div>
		<?php include('sidebar.php');?>
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