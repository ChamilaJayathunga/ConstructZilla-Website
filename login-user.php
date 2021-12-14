<?php 
require('db_conn.php');  
require_once "controller.php";   

if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
   

?>




<?php 
//    session_start();
//    if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   
	   
	   ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="" />
	<meta property="og:title" content="Constructzilla - Construction Template"/>
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	
	<!-- PAGE TITLE HERE -->
	<title>Constructzilla - Construction Template</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/style.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
	<link rel="stylesheet" type="text/css" href="css/templete.min.css">
	<link rel="stylesheet" type="text/css" href="css/css-slide.css">
	
</head>



<body id="bg"><div id="loading-area"></div>
<div class="page-wrapers">
    <!-- Content -->
     <div class="page-content dez-login  overlay-white-middle bg-img-fix">
		<ul class="cb-slideshow">
			<li><span style="background-image: url(images/bg/bg1.jpg) "></span></li>
			<li><span style="background-image: url(images/bg/bg2.jpg) "></span></li>
			<li><span style="background-image: url(images/bg/bg3.jpg) "></span></li>
			<li><span style="background-image: url(images/bg/bg4.jpg) "></span></li>
			<li><span style="background-image: url(images/bg/bg5.jpg) "></span></li>
			<li><span style="background-image: url(images/bg/bg6.jpg) "></span></li>
		</ul>
        <div class="relative z-index3">
		<div class="top-head text-center logo-header">
			<a href="index.html">
				<img src="images/logo-black.png" alt="" />
			</a>
		</div>	
        <div class="login-form  tp-login-black text-white">
			<div class="tab-content nav">
                <div id="login" class="tab-pane active text-center">

				<!-- //login -->
                    <form action="login-user.php" method="POST" class="p-a30 dez-form">
                        <h3 class="form-title m-t0">Sign In <br></h3>

							<!-- multi -->

							<?php
								if(count($errors) > 0){
									?>
									<div class="alert alert-danger text-center">
										<?php
										foreach($errors as $showerror){
											echo $showerror;
										}
										?>
									</div>
									<?php
								}
							?>
                        <div class="dez-separator-outer m-b5">
                            <div class="dez-separator bg-primary style-liner"></div>
                        </div>
						
                        <p>Enter your e-mail address and your password<br> Sign In </p>
                        <div class="form-group">
                            <input name="email" required="" class="form-control" placeholder="Email"   type="email"  id="email"  required input type="email" id="email"
							pattern=".+@gmail.com" size="30" required style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>						
                        </div>
						
				
                        <div class="form-group">
                            <input type="password" name="password" required="" class="form-control " placeholder="Type Password" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>
                        </div>

						
							
						  <!-- <div class="mb-1">
							<label class="form-label">Select User Type:</label>
						  </div> -->
						  
						  
						
						
						<div class="form-group text-left">
                            <button type="submit" name="login" class="site-button m-r5 dz-xs-flex" >login</button>
                            <label>
                            <input id="check1" type="checkbox">
							<label for="check1">Remember me</label>
                            </label>
                            <a href="forgot-password.php" class="m-l10"><i class="fa fa-unlock-alt"></i> Forgot Password</a>
						</div>
						<div class="dz-social clearfix">
							<h5 class="form-title m-t5 pull-left">Sign In With</h5>
							<ul class="dez-social-icon dez-border pull-right dez-social-icon-lg text-white">
								<li><a class="fa fa-facebook  fb-btn" href="javascript:;" target="bank"></a></li>
								<li><a class="fa fa-twitter  tw-btn" href="javascript:;" target="bank"></a></li>
								<li><a class="fa fa-linkedin link-btn" href="javascript:;" target="bank"></a></li>
								<li><a class="fa fa-google-plus  gplus-btn" href="javascript:;" target="bank"></a></li>
							</ul>
						</div>
                    </form>


                    <div class="bg-primary p-a15 bottom">
						<a href="signup-user.php" class="text-black">Create an account</a>
					</div>
                </div>
                
				
				
				
				<!-- signup -->
				
            
            </div>
        </div>
		<div class="bottom-footer text-center text-white">
			<!-- <p>2020 © DexignZone - HTML Template. </p> -->
		</div>
	</div>
    <!-- Content END-->
</div>
<!-- JavaScript  files ========================================= -->
<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="js/custom.min.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="js/dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="js/dz.ajax.js"></script><!-- CONTACT JS  -->


</body>
</html>
