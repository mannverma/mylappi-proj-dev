<?php
include("../config/functions.inc.php");
include("adminpwdcheck.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Panel</title>
    
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
           <!-- <link rel="shortcut icon" href="favicon.ico" />-->
		
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
		if(isset($_POST['submit']))
		{
		
			$opass=$_POST['oldpass'];	
			$npass=$_POST['npass'];	
			$q=mysql_query("select * from admin where password='".md5($opass)."'");			
			if(mysql_num_rows($q)>0)
			{
				mysql_query("update admin set password='".md5($npass)."' where password='".md5($opass)."'");
				$err="<div class='alert alert-info alert-login'>Password has been modified</div>";
			}
			else
			{
				$err="<div class='alert alert-info alert-login'>Invalid Password</div>";
			}
		}
		
		?>
		<script>
		function valid()
		{
			document.getElementById("opass").innerHTML="";
			document.getElementById("npass").innerHTML="";
			document.getElementById("rpass").innerHTML="";
			if(document.f1.oldpass.value=="")
			{
				document.getElementById("opass").innerHTML="Enter Old Password";
				return false;
			}
			if(document.f1.oldpass.value.length<6)
			{
				document.getElementById("opass").innerHTML="Password length must be atleast 6 characters";
				return false;
			}
			if(document.f1.npass.value=="")
			{
				document.getElementById("npass").innerHTML="Enter New Password";
				return false;
			}
			if(document.f1.npass.value.length<6)
			{
				document.getElementById("npass").innerHTML="Password length must be atleast 6 characters";
				return false;
			}
			if(document.f1.rpass.value=="")
			{
				document.getElementById("rpass").innerHTML="Enter Repeat Password";
				return false;
			}
			if(document.f1.npass.value!=document.f1.rpass.value)
			{
				document.getElementById("rpass").innerHTML="Password doesn't match";
				return false;
			}
		}
		</script>
    </head>
    <body>
		<div id="maincontainer" class="clearfix">
		 
		    <?php include("header.php");?>
		   <div id="contentwrapper">
                <div class="main_content">
				<div class="row-fluid">
				              <div class="span6" style="margin-left:180pt;">
									<form class="form-horizontal well" name="f1" action="<?php echo $_SERVER['PHP_SELF']; ?>" onSubmit="return valid();" method="post">
										<fieldset>
											<p class="f_legend">Modify Password</p>
											<?php echo $err."<br>"; ?>
											<div class="control-group">
												<label class="control-label">Existing Password</label>
												<div class="controls">
													<input type="password" class="span10" name="oldpass"/><br>
													<span id="opass"></span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">New Password</label>
												<div class="controls">
													<input type="password" class="span10" name="npass"/><br>
													<span id="npass"></span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label">Repeate Password</label>
												<div class="controls">
													<input type="password" class="span10" name="rpass"/><br>
													<span id="rpass"></span>
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
				</div>
		  </div>
			   	    <!-- sidebar -->
		   <?php include('sidebar.php'); ?>
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


