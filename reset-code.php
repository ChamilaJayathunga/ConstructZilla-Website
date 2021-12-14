<?php 
require('db_conn.php');  
require_once "controller.php";

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
            <form action="forgot-password.php" method="POST" class="p-a30 dez-form text-center">
                <h3 class="form-title m-t0">Reset Code</h3>
                <div class="dez-separator-outer m-b5">
                    <div class="dez-separator bg-primary style-liner"></div>
                </div>
                <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                <p>Enter your Reset Code below to reset your password. </p>
                <div class="form-group">
                    <input type="number" name="otp" placeholder="Enter code" required="" class="form-control" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;" />
                </div>
				<br>
                <div class="form-group text-left"> <a class="site-button red" data-toggle="tab" href="login-user.php">Back</a>
                    <button type="submit" name="check-reset-otp" class="site-button pull-right">Submit</button>
                    
                </div>

                
            </form>
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
