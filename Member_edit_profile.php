<?php 
require('db_conn.php'); 

if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='login-user.php';
	</script>
	<?php
}elseif(isset($_SESSION['MEM_ID'])){
	?>
	
	<?php
}
$user_id = $_SESSION['USER_ID'];
$role_id='';
$nic='';
$nic2='';
$pre_project='';
$qlfction='';
$user_image='';
$msg='';
if(isset($_POST['submit'])){
    $role_id=mysqli_real_escape_string($con,$_POST['role_id']);
    $pre_project=mysqli_real_escape_string($con,$_POST['pre_project']);
    $qlfction=mysqli_real_escape_string($con,$_POST['qlfction']);

    if($_FILES['nic']['type']!=''){
        if($_FILES['nic']['type']!='image/png' && $_FILES['nic']['type']!='image/jpg' && $_FILES['nic']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formate";
    }}
    if($_FILES['nic2']['type']!=''){
        if($_FILES['nic2']['type']!='image/png' && $_FILES['nic2']['type']!='image/jpg' && $_FILES['nic2']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formate";
    }}

    if($_FILES['user_image']['type']!=''){
        if($_FILES['user_image']['type']!='image/png' && $_FILES['user_image']['type']!='image/jpg' && $_FILES['user_image']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formate";
    }}

    if($msg==''){
        $nic=rand(111111111,999999999).'_'.$_FILES['nic']['name'];
		$nic2=rand(111111111,999999999).'_'.$_FILES['nic2']['name'];
		$user_image=rand(111111111,999999999).'_'.$_FILES['user_image']['name'];
		move_uploaded_file($_FILES['nic']['tmp_name'],MEMBER_IMAGE_SERVER_PATH.$nic);
		move_uploaded_file($_FILES['nic2']['tmp_name'],MEMBER_IMAGE_SERVER_PATH.$nic2);
		move_uploaded_file($_FILES['user_image']['tmp_name'],USER_IMAGE_SERVER_PATH.$user_image);
		$add = mysqli_query($con,"insert into members(user_id,role_id,nic,nic2,user_image,pre_project,qlfction) values('$user_id','$role_id','$nic','$nic2','$user_image','$pre_project','$qlfction')");
        if($add){
        $check_code = "SELECT * FROM members WHERE user_id = '$user_id'";
        $code_res = mysqli_query($con, $check_code);
        $fetch_data = mysqli_fetch_assoc($code_res);
        $mem_id = $fetch_data['id'];
        mkdir('media/proof/'.$mem_id.'', 0777, true);
        $_SESSION['PROOF']=$mem_id;
        mysqli_query($con,"update users set member_id='$mem_id' where id ='$user_id'");
        ?> 
        <script>
            window.location.href='member1.php';
        </script>
        <?php
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
	



	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">

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
	<link rel="stylesheet" type="text/css" href="css/dropzone.css">
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="plugins/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="plugins/revolution/css/navigation.css">
	<!-- Revolution Navigation Style -->
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
	
	
	
</head>


<body id="bg"><div id="loading-area"></div>
<div class="page-wraper">
    <!-- header -->
    <header class="site-header header mo-left header-style-1">
        <!-- top bar -->
        <div class="top-bar clearfix">
            <div class="container">
				<div class="row d-flex justify-content-between">
					<div class="dez-topbar-left"> </div>
					<div class="dez-topbar-right">
						 <!--<ul class="social-bx list-inline pull-right">
							<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
						</ul>-->
					</div>
				</div>
			</div>
        </div>
        <!-- top bar END-->
        <!-- main header -->
        <div class="sticky-header header-curve main-bar-wraper navbar-expand-lg">
            <div class="main-bar bg-primary clearfix ">
                <div class="container clearfix">
					<!-- website logo -->
					<div class="logo-header mostion">
						<a href="index.html">
							<img src="images/logo-white.png" width="193" height="89" alt="">
						</a>
					</div>
					<!-- nav toggle button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- extra nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<button id="quik-search-btn" type="button" class="site-button"><i class="fa fa-search"></i></button>
						</div>
					</div>
					<!-- Quik search -->
					<div class="dez-quik-search bg-primary">
						<form action="#">
							<input name="search" value="search" type="text" class="form-control" placeholder="Type to search">
							<span  id="quik-search-remove"><i class="fa fa-remove"></i></span>
						</form>
					</div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="">
                        <ul class="nav navbar-nav">
                            <li class=""> <a href="index.html">Home<i class=""></i></a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
									<li><a href="index-5.html">Home 5</a></li>
									<li><a href="index-6.html">Home 6</a></li>
									<li><a href="index-7.html">Home 7</a></li>
									<li><a href="index-8.html">Home 8</a></li>
									<li><a href="index-9.html">Home 9 </a></li>
									<li><a href="index-10.html">Home 10 </a></li>
									<li><a href="index-11.html">Home 11 </a></li>
									<li><a href="index-12.html">Home 12 </a></li>
                                </ul> -->
                            </li>
                            <li> <a href="javascript:;">Project<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="project.html">Project Preveiw<span class="tag-new">New</span></a>
                                       <!--  <ul class="sub-menu">
                                            <li><a href="header-style-1.html">Header 1</a></li>
                                            <li><a href="header-style-2.html">Header 2</a></li>
                                            <li><a href="header-style-3.html">Header 3</a></li>
                                            <li><a href="header-style-4.html">Header 4</a></li>
                                            <li><a href="header-style-5.html">Header 5</a></li>
											<li><a href="header-style-6.html">Header 6 <span class="tag-new">New</span></a></li>
											<li><a href="header-style-7.html">Header 7 <span class="tag-new">New</span></a></li>
                                        </ul> -->
                                    </li>
                                    <li> <a href="project-details.html">Project Details</a>
                                       <!--  <ul class="sub-menu">
                                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                                        </ul> -->
                                    </li>
                                </ul>
                            </li>
                 <!--            <li class="has-mega-menu "> <a href="javascript:;">Pages<i class="fa fa-chevron-down"></i></a>
                                <ul class="mega-menu">
                                    <li> <a href="javascript:;">Pages</a>
                                        <ul>
                                            <li><a href="about-1.html">About us 1</a></li>
                                            <li><a href="about-2.html">About us 2</a></li>
											<li><a href="faq.html">FAQ</a> </li>
											<li><a href="project.html">Project <span class="tag-new">New</span></a></li>
											<li><a href="project-details.html">Project Details <span class="tag-new">New</span></a></li>
                                            <li><a href="all-service.html">All Service </a></li>
                                            <li><a href="architecture.html">Architecture </a></li>
                                            <li><a href="big-projects.html">Big Projects </a></li>
											<li><a href="construction.html">Construction </a></li>
											<li><a href="consulting.html">Consulting </a></li>
											<li><a href="concrete-transport.html">Concrete Transport </a></li>
											
										</ul>
                                    </li>
                                    <li> <a href="javascript:;">Pages</a>
                                        <ul>
											<li><a href="renovations.html">Renovations </a></li>
											<li><a href="services-1.html">Services 1 </a></li>
											<li><a href="services-2.html">Services 2</a></li>
											<li><a href="services-3.html">Services 3</a></li>
											<li><a href="career.html">Career</a></li>
											<li><a href="who-we-are.html">Who we are</a></li>
                                            <li><a href="portfolio-1.html">Portfolio 1</a></li>
                                            <li><a href="portfolio-2.html">Portfolio 2</a></li>
                                            <li><a href="portfolio-3.html">Portfolio 3</a></li>
                                            <li><a href="portfolio-details.html">portfolio-details</a></li>
											<li><a href="full-page-gallery-dark.html">Gallery Full Page Style 1</a></li>
											
                                        </ul>
                                    </li>
                                    <li> <a href="javascript:;">Pages</a>
                                        <ul>
											<li><a href="full-page-gallery-light.html">Gallery Full Page Style 2</a></li>
                                            <li><a href="gallery-grid-2.html">Gallery Grid 2</a></li>
											<li><a href="gallery-grid-3.html">Gallery Grid 3</a></li>
                                            <li><a href="gallery-grid-4.html">Gallery Grid 4</a></li>
                                            <li><a href="error-403.html">Error 403</a></li>
                                            <li><a href="error-404.html">Error 404</a></li>
                                            <li><a href="error-405.html">Error 405</a></li>
											<li><a href="coming-soon-1.html">Coming Soon 1</a></li>
											<li><a href="coming-soon-2.html">Coming Soon 2</a></li>
											<li><a href="coming-soon-3.html">Coming Soon 3</a></li>
											<li><a href="coming-soon-4.html">Coming Soon 4</a></li>
										</ul>
                                    </li>
									<li> <a href="javascript:;">Pages</a>
										<ul>
											<li><a href="coming-soon-5.html">Coming Soon 5</a></li>
											<li><a href="coming-soon-6.html">Coming Soon 6</a></li>
											<li><a href="coming-soon-7.html">Coming Soon 7</a></li>
											<li><a href="coming-soon-8.html">Coming Soon 8</a></li>
											<li><a href="coming-soon-9.html">Coming Soon 9</a></li>
											<li><a href="login-1.html">Login 1</a></li>
											<li><a href="login-2.html">Login 2</a></li>
											<li><a href="login-3.html">Login 3</a></li>
											<li><a href="login-4.html">Login 4</a></li>
											<li><a href="login-5.html">Login 5</a></li>
											<li><a href="login-6.html">Login 6</a></li>
										</ul>
									</li>
                                </ul>
                            </li> -->
                            <li> <a href="javascript:;">Our Sevice Team<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="shortcode-teamPL.html">Plan Makers</a></li>
									<li><a href="shortcode-teamEN.html">Engineers</a></li>
                                    <li><a href="shortcode-teamCON.html">Contractors</a></li>
                                    <li><a href="shortcode-teamBAS.html">Masonary Bass<span class="tag-new">New</span></a></li>
                                    <!-- <li><a href="wishlist.html">Wishlist <span class="tag-new">New</span></a></li>
                                    <li><a href="shopping-cart.html">Shopping Cart <span class="tag-new">New</span></a></li> -->
                                </ul>
                            </li>
                            <li class="has-mega-menu "> <a href="all-service.html">Service<i class=""></i></a>
                                <!-- <ul class="mega-menu">
                                    <li> <a href="javascript:;">Default</a>
                                        <ul>
                                            <li><a href="blog-half-img.html">Half image</a></li>
                                            <li><a href="blog-half-img-sidebar.html">Half image sidebar</a></li>
                                            <li><a href="blog-half-img-left-sidebar.html">Half image sidebar left</a></li>
                                            <li><a href="blog-large-img.html">Large image</a></li>
                                            <li><a href="blog-large-img-sidebar.html">Large image sidebar</a></li>
                                            <li><a href="blog-large-img-left-sidebar.html">Large image sidebar left</a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="javascript:;">Grid</a>
                                        <ul>
                                            <li><a href="blog-grid-2.html">Grid 2</a></li>
                                            <li><a href="blog-grid-2-sidebar.html">Grid 2 sidebar</a></li>
                                            <li><a href="blog-grid-2-sidebar-left.html">Grid 2 sidebar left</a></li>
                                            <li><a href="blog-grid-3.html">Grid 3</a></li>
                                            <li><a href="blog-grid-3-sidebar.html">Grid 3 sidebar</a></li>
                                            <li><a href="blog-grid-3-sidebar-left.html">Grid 3 sidebar left</a></li>
                                            <li><a href="blog-grid-4.html">Grid 4</a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="javascript:;">Single</a>
                                        <ul>
                                            <li><a href="blog-single.html">Single</a></li>
                                            <li><a href="blog-single-sidebar.html">Single sidebar</a></li>
                                            <li><a href="blog-single-left-sidebar.html">Single sidebar right</a></li>
                                        </ul>
                                    </li>
									<li> <a href="javascript:;">Full Page Blog</a>
										<ul>
											<li><a href="blog-full-grid-dark-style-1.html">Dark Style 1</a></li>
											<li><a href="blog-full-grid-dark-style-2.html">Dark Style 2</a></li>
											<li><a href="blog-full-grid-dark-style-3.html">Dark Style 3</a></li>
											<li><a href="blog-full-grid-light-style-1.html">Light Style 1</a></li>
											<li><a href="blog-full-grid-light-style-2.html">Light Style 2</a></li>
											<li><a href="blog-full-grid-light-style-3.html">Light Style 3</a></li>
										</ul>
									</li>
                                </ul> -->
                            </li>
                            <!-- <li class="has-mega-menu "> <a href="javascript:;">Shortcodes<i class="fa fa-chevron-down"></i></a>
                                <ul class="mega-menu">
                                    <li> <a href="javascript:;">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-buttons.html">Buttons <span class="tag-new">New</span></a></li>
                                            <li><a href="shortcode-icon-box-styles.html">Icon box styles</a></li>
                                            <li><a href="shortcode-pricing-table.html">Pricing table</a></li>
                                            <li><a href="shortcode-toggles.html">Toggles</a></li>
                                            <li><a href="shortcode-team.html">Team <span class="tag-new">New</span></a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="javascript:;">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-carousel-sliders.html">Carousel sliders</a></li>
                                            <li><a href="shortcode-image-box-content.html">Image box content</a></li>
                                            <li><a href="shortcode-tabs.html">Tabs</a></li>
                                            <li><a href="shortcode-counters.html">Counters</a></li>
                                            <li><a href="shortcode-light-box.html">Light Gallery <span class="tag-new">New</span></a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="javascript:;">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-accordians.html">Accordians</a></li>
                                            <li><a href="shortcode-dividers.html">Dividers</a></li>
                                            <li><a href="shortcode-images-effects.html">Images effects</a></li>
                                            <li><a href="shortcode-testimonials.html">Testimonials <span class="tag-new">New</span></a></li>
                                            <li><a href="shortcode-magnific-popup.html">Magnific Gallery <span class="tag-new">New</span></a></li>
                                        </ul>
                                    </li>
                                    <li> <a href="javascript:;">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-alert-box.html">Alert box</a></li>
                                            <li><a href="shortcode-icon-box.html">Icon-box</a></li>
                                            <li><a href="shortcode-list-group.html">List group</a></li>
                                            <li><a href="shortcode-title-separators.html">title-separators</a></li>
                                            <li><a href="shortcode-all-widgets.html">Widgets</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
							
							
							
							
							 
							 
							<li> <a href="about-1.html">About Us<i class=""></i></a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="contact.html">Contact us 1</a></li>
                                    <li><a href="contact-2.html">Contact us 2</a></li>
                                    <li><a href="contact-3.html">Contact us 3</a></li>
                                    <li><a href="contact-4.html">Contact us 4</a></li>
                                </ul> -->
                            </li> 
							
							
							
                            <li> <a href="contact.html">Contact us <i class=""></i></a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="contact.html">Contact us 1</a></li>
                                    <li><a href="contact-2.html">Contact us 2</a></li>
                                    <li><a href="contact-3.html">Contact us 3</a></li>
                                    <li><a href="contact-4.html">Contact us 4</a></li>
                                </ul> -->
                            </li>
							
                            <?php if(isset($_SESSION['USER_LOGIN'])){
                                        ?>
                            <li> <a href="logout-user.php">Logout <i class=""></i></a></li>
                            <?php
                            }else{
                                echo '<li> <a href="login-user.php">Sign In <i class=""></i></a></li>';
                            }
                            ?>
							
							 <!-- <li class="nav-item">
                                        <a href="submit.html" class="btn btn-primary text-caps btn-rounded btn-framed">Submit Ad</a>
                             </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END --><br><br>
    </header>
                <!--============ End Main Navigation ================================================================-->
                <!--============ Hero Form ==========================================================================-->
                <div class="collapse" id="collapseMainSearchForm">
                    <form class="hero-form form">
                        <div class="container">
                            <!--Main Form-->
                            <div class="main-search-form">
                                <div class="form-row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="what" class="col-form-label">What?</label>
                                            <input name="keyword" type="text" class="form-control small" id="what" placeholder="What are you looking for?">
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="input-location" class="col-form-label">Where?</label>
                                            <input name="location" type="text" class="form-control small" id="input-location" placeholder="Enter Location">
                                            <span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="category" class="col-form-label">Category?</label>
                                            <select name="category" id="category" class="small" data-placeholder="Select Category">
                                                <option value="">Select Category</option>
                                                <option value="1">Computers</option>
                                                <option value="2">Real Estate</option>
                                                <option value="3">Cars & Motorcycles</option>
                                                <option value="4">Furniture</option>
                                                <option value="5">Pets & Animals</option>
                                            </select>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-3-->
                                    <div class="col-md-3 col-sm-3">
                                        <button type="submit" class="btn btn-primary width-100 small">Search</button>
                                    </div>
                                    <!--end col-md-3-->
                                </div>
                                <!--end form-row-->
                            </div>
                            <!--end main-search-form-->
                            <!--Alternative Form-->
                            <div class="alternative-search-form">
                                <a href="#collapseAlternativeSearchForm" class="icon" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseAlternativeSearchForm"><i class="fa fa-plus"></i>More Options</a>
                                <div class="collapse" id="collapseAlternativeSearchForm">
                                    <div class="wrapper">
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-xs-grid d-flex align-items-center justify-content-between">
                                                <label>
                                                    <input type="checkbox" name="new">
                                                    New
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="used">
                                                    Used
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="with_photo">
                                                    With Photo
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="featured">
                                                    Featured
                                                </label>
                                            </div>
                                            <!--end col-xl-6-->
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <input name="min_price" type="text" class="form-control small" id="min-price" placeholder="Minimal Price">
                                                            <span class="input-group-addon small">$</span>
                                                        </div>
                                                        <!--end form-group-->
                                                    </div>
                                                    <!--end col-md-4-->
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <input name="max_price" type="text" class="form-control small" id="max-price" placeholder="Maximal Price">
                                                            <span class="input-group-addon small">$</span>
                                                        </div>
                                                        <!--end form-group-->
                                                    </div>
                                                    <!--end col-md-4-->
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <select name="distance" id="distance" class="small" data-placeholder="Distance" >
                                                                <option value="">Distance</option>
                                                                <option value="1">1km</option>
                                                                <option value="2">5km</option>
                                                                <option value="3">10km</option>
                                                                <option value="4">50km</option>
                                                                <option value="5">100km</option>
                                                            </select>
                                                        </div>
                                                        <!--end form-group-->
                                                    </div>
                                                    <!--end col-md-3-->
                                                </div>
                                                <!--end form-row-->
                                            </div>
                                            <!--end col-xl-6-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end wrapper-->
                                </div>
                                <!--end collapse-->
                            </div>
                            <!--end alternative-search-form-->
                        </div>
                        <!--end container-->
                    </form>
                    <!--end hero-form-->
                </div>
                <!--end collapse-->
                <!--============ End Hero Form ======================================================================-->
                <!--============ Page Title =========================================================================-->
                <div class="page-title">
                    <div class="container">
                        <h1>Edit Member Details</h1>
                    </div>
                    <!--end container-->
                </div>
                <!--============ End Page Title =====================================================================-->
                <div class="background"></div>
                <!--end background-->
            </div>
            <!--end hero-wrapper-->
        </header>
        <!--end hero-->


        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <section class="content">
            <section class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <nav class="nav flex-column side-nav">
                                <a class="nav-link active icon" href="my-profile.html">
                                    <i class="fa fa-user"></i>My Profile
                                </a>
                                <!-- <a class="nav-link icon" href="my-ads.html">
                                    <i class="fa fa-heart"></i>My Ads Listing
                                </a>
                              <!--   <a class="nav-link icon" href="bookmarks.html">
                                    <i class="fa fa-star"></i>Bookmarks
                                </a> -->
                                <a class="nav-link icon" href="change-password.html">
                                    <i class="fa fa-recycle"></i>Change Password
                                </a>
                               <!--  <a class="nav-link icon" href="sold-items.html">
                                    <i class="fa fa-check"></i>Sold Items
                                </a> -->
                            </nav>
                        </div>

                        
                        <!--end col-md-3-->
                        <div class="col-md-9" >
                            <form method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2>Select Your Role</h2>
                                        <section>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="title" class="col-form-label">Role</label>
                                                        <select name="role_id" >
                                                            <option value="required" >Select One Role</option>
                                                            <?php
                                                                $res=mysqli_query($con,"select * from role");
                                                                while($row=mysqli_fetch_assoc($res)){
                                                                        echo "<option value=".$row['id'].">".$row['role']."</option>";
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <!--end form-group-->
                                                </div>
                                               
                                                <!--end col-md-8-->
                                            </div>
                                            <!--end row-->
                                       
                                            <h2>Attach Your NIC Image</h2>
                                            <div class="form-group">
                                                <div class="imgrpeiv">
                                                <div id="image_box" class="gridzxf">
											        <div class="asfdasfaf">
											            <input name="nic" type="file" id="file-1" required>
											            <label for="file-1" id="file-1-preview">
												        <img src="https://bit.ly/3ubuq5o" alt="">
												    <div>
												    <span>Front Sode</span>
												    </div>
											    </label>
											    </div>

                                                <div id="image_box" class="gridzxf">
											        <div class="asfdasfaf">
											            <input name="nic2" type="file" id="file-2" required>
											            <label for="file-2" id="file-2-preview">
												        <img src="https://bit.ly/3ubuq5o" alt="">
												    <div>
												    <span>Back Side</span>
												    </div>
											    </label>
											    </div>
                                                </div>
										    </div>
                                            </div>
                                            <!--end form-group-->
                                        </section>

                                        <script>
										function previewBeforeUpload(id){
										  document.querySelector("#"+id).addEventListener("change",function(e){
											if(e.target.files.length == 0){
											  return;
											}
											let file = e.target.files[0];
											let url = URL.createObjectURL(file);
											document.querySelector("#"+id+"-preview div").innerText = file.name;
											document.querySelector("#"+id+"-preview img").src = url;
										  });
										}

										previewBeforeUpload("file-1");
										previewBeforeUpload("file-2");

										</script>

                                        <section>
                                            <h2>Fill Above Infomation</h2>
                                            <div class="form-group">
                                                <label for="twitter" class="col-form-label">Previus Projects</label><br><br>
                                                <textarea name="pre_project" id="" cols="80" rows="10" required></textarea>
                                            </div>
                                            <!--end form-group-->
                                            <div class="form-group">
                                                <label for="twitter" class="col-form-label">Qualifications</label><br><br>
                                                <textarea name="qlfction" id="" cols="80" rows="10" required></textarea>
                                            </div>
										 </section>

                                         
                                            <!--end form-group-->
                                       

                                       
                                    </div>
                                    <!--end col-md-8-->
                                    <div class="col-md-4">
                                        <div class="profile-image">
                                            <div class="image background-image">
                                                <img src="assets/img/author-09.jpg" alt="">
                                            </div>
                                            <div class="single-file-input">
                                                <input type="file" id="user_image" name="user_image">
                                                <div class="btn btn-framed btn-primary small">Upload a picture</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-md-3-->
                                </div>
                                <button type="submit" name="submit" class="btb btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
        <!--end content-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->

        <style>
        
        .imgrpeiv {
          margin:20px 40px 20px 20px;
          padding:0px 50px;
        }
        .imgrpeiv h4 {
          text-align:center;
          color:#000;
          font-size:30px;
          font-weight:400;
        }
        .imgrpeiv .gridzxf {
          margin-top:50px;
          display:flex;
          justify-content:space-around;
          flex-wrap:wrap;
          gap:20px;
        }
        .imgrpeiv .gridzxf .asfdasfaf {
          width:200px!important;
          height:200px!important;
          box-shadow:0px 0px 20px 5px rgba(100,100,100,0.1)!important;
        }
        .imgrpeiv .gridzxf .asfdasfaf input {
          display:none;
        }
        .imgrpeiv .gridzxf .asfdasfaf img {
          width:200px;
          height:200px;
          object-fit:cover;
        }
        .imgrpeiv .gridzxf .asfdasfaf div {
          position:absolute;
          height:40px;
          width: 200px;
          margin-top:-40px;
          background:rgba(0,0,0,0.5);
          text-align:center;
          line-height:40px;
          font-size:13px;
          color:#f5f5f5;
          font-weight:600;
          overflow:hidden;
        }
        .imgrpeiv .gridzxf .asfdasfaf div span {
          font-size:15px;
        }

        .dropzoneDragArea {
		    background-color: #fbfdff;
		    border: 1px dashed #c0ccda;
		    border-radius: 6px;
		    padding: 60px;
		    text-align: center;
		    margin-bottom: 15px;
		    cursor: pointer;
		}
        </style>
<script>

		$(document).ready(function(){
		 
		 Dropzone.options.dropzoneFrom = {
		  autoProcessQueue: false,
		  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg,.pdf",
		  init: function(){
		   var submitButton = document.querySelector('#submit-all');
		   myDropzone = this;
		   submitButton.addEventListener("click", function(){
			myDropzone.processQueue();
		   });
		   this.on("complete", function(){
			if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
			{
			 var _this = this;
			 _this.removeAllFiles();
			}
			list_image();
		   });
		  },
		 };

		 list_image();

		 function list_image()
		 {
		  $.ajax({
		   url:"upload.php",
		   success:function(data){
			$('#preview').html(data);
		   }
		  });
		 }

		 $(document).on('click', '.remove_image', function(){
		  var name = $(this).attr('id');
		  $.ajax({
		   url:"upload.php",
		   method:"POST",
		   data:{name:name},
		   success:function(data)
		   {
			list_image();
		   }
		  })
		 });
		 
		});
</script>			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        
    <script>
        var latitude = 51.511971;
        var longitude = -0.137597;
        var markerImage = "assets/img/map-marker.png";
        var mapTheme = "light";
        var mapElement = "map-submit";
        var markerDrag = true;
        simpleMap(latitude, longitude, markerImage, mapTheme, mapElement, markerDrag);
    </script>

<script>
Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;	
let token = $('meta[name="csrf-token"]').attr('content');
$(function() {
var myDropzone = new Dropzone("div#dropzoneDragArea", { 
	paramName: "file",
	url: "{{ url('/storeimgae') }}",
	previewsContainer: 'div.dropzone-previews',
	addRemoveLinks: true,
	autoProcessQueue: false,
	uploadMultiple: false,
	parallelUploads: 1,
	maxFiles: 1,
	params: {
        _token: token
    },
	 // The setting up of the dropzone
	init: function() {
	    var myDropzone = this;
	    //form submission code goes here
	    $("form[name='demoform']").submit(function(event) {
	    	//Make sure that the form isn't actully being sent.
	    	event.preventDefault();
	    	URL = $("#demoform").attr('action');
	    	formData = $('#demoform').serialize();
	    	$.ajax({
	    		type: 'POST',
	    		url: URL,
	    		data: formData,
	    		success: function(result){
	    			if(result.status == "success"){
	    				// fetch the useid 
	    				var userid = result.user_id;
						$("#userid").val(userid); // inseting userid into hidden input field
	    				//process the queue
	    				myDropzone.processQueue();
	    			}else{
	    				console.log("error");
	    			}
	    		}
	    	});
	    });
	    //Gets triggered when we submit the image.
	    this.on('sending', function(file, xhr, formData){
	    //fetch the user id from hidden input field and send that userid with our image
	      let userid = document.getElementById('userid').value;
		   formData.append('userid', userid);
		});
		
	    this.on("success", function (file, response) {
            //reset the form
            $('#demoform')[0].reset();
            //reset dropzone
            $('.dropzone-previews').empty();
        });
        this.on("queuecomplete", function () {
		
        });
		
        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
	    // of the sending event because uploadMultiple is set to true.
	    this.on("sendingmultiple", function() {
	      // Gets triggered when the form is actually being sent.
	      // Hide the success button or the complete form.
	    });
		
	    this.on("successmultiple", function(files, response) {
	      // Gets triggered when the files have successfully been sent.
	      // Redirect user or notify of success.
	    });
		
	    this.on("errormultiple", function(files, response) {
	      // Gets triggered when there was an error sending the files.
	      // Maybe show form again, and notify user of error
	    });
	}
	});
});
</script>
	

	
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up style5" ></button>
		</div>

			<!-- JavaScript  files ========================================= -->
			<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
			<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
			<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
			<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
			<script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
			<script src="plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
			<script src="plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
			<script src="plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
			<script src="plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
			<script src="plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
			<script src="plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
			<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
			<script src="plugins/lightgallery/js/lightgallery-all.js"></script><!-- LIGHT GALLERY -->
			<script src="js/custom.min.js"></script><!-- CUSTOM FUCTIONS  -->
			<script src="js/dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
			<script src="js/dz.ajax.js"></script><!-- CONTACT JS  -->
			<script src="js/dropzone.js"></script><!-- CONTACT JS  -->

			<!-- REVOLUTION JS FILES -->
			<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
			<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
			<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
			<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
			<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
			<script src="js/rev.slider.js"></script>
			<script>
			jQuery(document).ready(function() {
				'use strict';
				dz_rev_slider_1();
			});	/*ready*/
			</script>

        

	<script src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
	<script src="assets/js/selectize.min.js"></script>
	<script src="assets/js/masonry.pkgd.min.js"></script>
	<script src="assets/js/icheck.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/custom.js"></script>
	
	<!--end footer-->
    </div>
    <!--end page-->
	

</body>
</html>

