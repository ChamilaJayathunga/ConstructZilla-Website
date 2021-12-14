<?php 
require('db_conn.php'); 
require('functions.inc.php'); 
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$per_page=10;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	if($start<=0){
		$start=0;
		$current_page=1;
	}else{
		$current_page=$start;
		$start--;
		$start=$start*$per_page;
	}
}
$record=mysqli_num_rows(mysqli_query($con,"select * from ads where status=1 order by added_on desc"));
$pagi=ceil($record/$per_page);
$pro_refsdfs=mysqli_query($con,"select * from ads where status=1 order by added_on desc limit $start,$per_page");


$pro_res=mysqli_query($con,"select ads.*,sub_categories.sub_categories,districts.districts from ads,sub_categories,districts where ads.status=1 and ads.sub_categories_id=sub_categories.id and ads.district_id=districts.id order by ads.added_on desc");
$pro_arr=array();
while($prorow=mysqli_fetch_assoc($pro_res)){
	$pro_arr[]=$prorow;	
}

$district_res=mysqli_query($con,"select * from districts order by districts asc");
$district_arr=array();
while($districtrow=mysqli_fetch_assoc($district_res)){
	$district_arr[]=$districtrow;	
}

?>
<!DOCTYPE html>
<html lang="en" >
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
	<title>Constructzilla | Construction Technology</title>
	
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
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="plugins/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="plugins/revolution/css/navigation.css">
	
	
	
	 
	<!-- Revolution Navigation Style -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />-->

   
	
	 <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
  <!--<script src="js/custom.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <!-- Glidejs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
  
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css" integrity="sha512-kwJUhJJaTDzGp6VTPBbMQWBFUof6+pv0SM3s8fo+E6XnPmVmtfwENK0vHYup3tsYnqHgRDoBDTJWoq7rnQw2+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./styles.css" />
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>

	
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
						<ul class="social-bx list-inline pull-right">
							<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
							<li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
						</ul>
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
                            <li class=""> <a href="index.php">Home<i class=""></i></a>
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
                                <li> <a href="project.php">Project ADs</a>
                                       <!--  <ul class="sub-menu">
                                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                                        </ul> -->
                                    </li>
                                    <!-- <li> <a href="project.html">Project Preveiw<span class="tag-new">New</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="header-style-1.html">Header 1</a></li>
                                            <li><a href="header-style-2.html">Header 2</a></li>
                                            <li><a href="header-style-3.html">Header 3</a></li>
                                            <li><a href="header-style-4.html">Header 4</a></li>
                                            <li><a href="header-style-5.html">Header 5</a></li>
											<li><a href="header-style-6.html">Header 6 <span class="tag-new">New</span></a></li>
											<li><a href="header-style-7.html">Header 7 <span class="tag-new">New</span></a></li>
                                        </ul> -->
                                    </li>
                                    <li> <a href="project-details.php">Project Details</a>
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
                           
                            <li class="has-mega-menu "> <a href="all-service.php">Service<i class=""></i></a>
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
							
							
							
							
							 
							 
							<li> <a href="about-1.php">About Us<i class=""></i></a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="contact.html">Contact us 1</a></li>
                                    <li><a href="contact-2.html">Contact us 2</a></li>
                                    <li><a href="contact-3.html">Contact us 3</a></li>
                                    <li><a href="contact-4.html">Contact us 4</a></li>
                                </ul> -->
                            </li> 
							
							
							
                            <li> <a href="contact.php">Contact us <i class=""></i></a>
                                <!-- <ul class="sub-menu">
                                    <li><a href="contact.html">Contact us 1</a></li>
                                    <li><a href="contact-2.html">Contact us 2</a></li>
                                    <li><a href="contact-3.html">Contact us 3</a></li>
                                    <li><a href="contact-4.html">Contact us 4</a></li>
                                </ul> -->
                            </li>
                            
                            

                            <?php
                            
                            if(isset($_SESSION['USER_LOGIN'])){
                                $uid= $_SESSION['USER_ID'];
                                $check_mem = "SELECT * FROM users WHERE id = '$uid'";
                                $res = mysqli_query($con, $check_mem);
                                $fetch = mysqli_fetch_assoc($res);
                                $mem_id = $fetch['member_id'];
                                if($mem_id>0){
                                    echo '<li> <a href="member/">Dashboard <i class=""></i></a></li>';
                                    echo '<li> <a href="logout-user.php">Logout <i class=""></i></a></li>';
                                }else{
                                        ?>
                                <li> <a href="member.php">Became a member <i class=""></i></a></li>
                                <li> <a href="logout-user.php">Logout <i class=""></i></a></li>
                            <?php
                                }
                            }
                            else{
                                echo '<li> <a href="login-user.php">Sign In <i class=""></i></a></li>';
                                echo '<li> <a href="signup-user.php">Signup <i class=""></i></a></li>';
                            }
                            ?>
							
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>