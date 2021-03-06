<?php
require ('db_conn.php'); 
if(isset($_SESSION['ADMIN_LOGIN'])){
	header ('location:users.php');
}
	$msg="";

	if(isset($_POST['submit'])){
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['pass']);
		$sql="select * from admin_users where username='$username'";
		$res=mysqli_query($con,$sql);
		$count=mysqli_num_rows($res);
		if($count>0){
		  $row=mysqli_fetch_assoc($res);
		  $enc_pass = $row['password'];
		  if(password_verify($password, $enc_pass)){
			 $_SESSION['ADMIN_LOGIN']='yes';
			 $_SESSION['ADMIN_USERNAME']=$username;
			 header('location:users.php');
			 die();
		}else{
			$msg="Please enter correct login details";	
		}
	   }else{
			$msg="Please enter correct login details";	   
	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>ConstructZilla | Admin Login</title>
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/style.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
	<link rel="stylesheet" type="text/css" href="css/templete.min.css">
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="plugins/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="plugins/revolution/css/navigation.css">
	<!-- Revolution Navigation Style -->
	
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	
	
	
	

</head>
<body>
	
	<div class="limiter">
	
	
	
		<div class="container-login100">
		
						
	<span class="login100-form-title p-b-34">
						<img src="images/logo.png" width="193" height="89" alt="" >
				</span>
		
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
				
					
				
					<span class="login100-form-title p-b-34">
					
						Admin Login
					</span>
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input autocomplete="off" id="first-name" class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<br>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>
					<span class="error"><?php echo $msg ?></span>

					<div class="w-full text-center p-t-27 p-b-239">
					</div>
					<span class="login100-form-title p-b-34">
						<a href="../login-user.php">
							Click Here For User Login.
						</a>
					</span>
					
				</form>

				<div class="login100-more" style="background-image: url('images/1.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>