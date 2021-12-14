<?php 
require('db_conn.php');  
require_once "controller.php";    

    /*if (isset($_SESSION['admin_login'])) {
        header("location: php/admin_home.php");
    }

    if (isset($_SESSION['engineer_login'])) {
        header("location: php/engineer_home.php");
    }
    if (isset($_SESSION['contractor_login'])) {
        header("location: php/contractor_home.php");
    }

    if (isset($_SESSION['user_login'])) {
        header("location: php/user_home.php");
    }
    if (isset($_SESSION['planmaker_login'])) {
        header("location: php/planmaker.php");
    }
    if (isset($_SESSION['masonarybas_login'])) {
        header("location: php/masonarybas.php");
    }*/
   

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

				
                    
				
				
				<!-- signup -->
				
                    <form name="signup" onsubmit="return ValidateEmail()" action="signup-user.php" method="POST" class="p-a30 dez-form text-center text-center">

                        <h3 class="form-title m-t0">Sign Up</h3>
                        <div class="dez-separator-outer m-b5">
                            <div class="dez-separator bg-primary style-liner"></div>
							
							
							
							<?php
							function validate_mobile($mobile)
								{
								  return eregi("/^[0-9]*$/", $mobile);
								}
							
							?>
							
							
							
                        </div>
						<?php
                    		if(count($errors) == 1){
							?>
							<div class="alert alert-danger text-center">
								<?php
								foreach($errors as $showerror){
									echo $showerror;
								}
								?>
							</div>
							<?php
						}elseif(count($errors) > 1){
							?>
							<div class="alert alert-danger">
								<?php
								foreach($errors as $showerror){
									?>
									<li><?php echo $showerror; ?></li>
									<?php
								}
								?>
							</div>
							<?php
						}
						?>
                        <p>Enter your personal details below: </p>
                        <!-- <div class="form-group">
                            <input name="FullName" required="" class="form-control" placeholder="Full Name" type="text"/>
                        </div> -->
						<div class="form-group">
                            <input name="name" id="username" required="" class="form-control" placeholder="User Name" type="text" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>
                        </div>
						
                        <div class="form-group">
                            <input name="email" required="" class="form-control" placeholder="Email"   type="email"  id="email"  required input type="email" id="email"
							pattern=".+@gmail.com" size="30" required style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>
							
                        </div>

						<div class="form-group">
                            <input name="password" id="password" required="" class="form-control" placeholder="Password" type="password" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>
                        </div>

						<div class="form-group">
                            <input name="cpassword" id="password" required="" class="form-control" placeholder="Confrim Password" type="password" style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>
                        </div>

						 <div class="form-group">
						 
						 
                            <input name="mobile" type="tel" id="phone"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
							required required="" class="form-control" placeholder="Phone Number" 
							style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>
                        </div>
						
						<div class="form-group">
                            <input  name="address" required="" class="form-control" placeholder="Address" type="address" input type="address" id="address" pattern=".+ " style="background-color:#FCF5D8;color:#AD8C08;border:3px solid #AD8C08;"/>
                        </div>
						
						<!-- <input type="address" id="address"
       pattern=".+Rajaphilla,Pattiyawatta" size="30" required> -->
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						

<!--<input type="tel" id="phone" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required>

<small>Format: 123-456-7890</small>-->
                        
                        
						
						
                        	<!--<div class="form-group">
                       
                       
                            <select class="form-select mb-3" required=""
								  name="role" 
								  aria-label="Default select example">
								  <option selected >Select Role</option>
							  	<?php
								$res=mysqli_query($con,"select * from role");
								while($row=mysqli_fetch_assoc($res)){
										echo "<option value=".$row['id'].">".$row['role']."</option>";
								}
								?>
							 
						  </select>
                       
						</div>-->
						
						
						
                        <!-- <div class="">
                            <input name="dzName" required="" class="form-control" placeholder="Re-type Your Password" type="password"/>
                        </div> -->
                        <div class="m-b30">
							<input id="check2" type="checkbox"/>
							<label for="check2">I agree to the <a href="#">Terms of Service </a>& <a href="#">Privacy Policy</a> </label>
                        </div>
                        <div class="form-group text-left "> 
							<a class="site-button red" href="login-user.php">Back</a>
                            <button class="site-button pull-right"  name="signup">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<div class="bottom-footer text-center text-white">
	
		</div>
	</div>
    <!-- Content END-->
</div>

<script>
function ValidateEmail() {
var email=document.forms["signup"]["email"].value;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (email.value.match(validRegex)) {


    return true;

  } else {

    alert("Invalid email address!");

    return false;

  }

}
</script> 
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
