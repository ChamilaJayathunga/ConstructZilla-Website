<?php require ('header.php'); 

if(!isset($_SESSION['ADMIN_LOGIN'])){
	header ('location:login.php');
}
?>

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	           <!--  <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
	                <span class="hamb-top"></span>
	    			<span class="hamb-middle"></span>
					<span class="hamb-bottom"></span>
	            </button> -->
				<br>
	            <div class="container py-3">
		  		<!-- Card Start -->
		  			<div class="card">
		    			<div class="row ">
		      				<div class="col-md-7 px-3">
		        				<div class="card-block px-6">
		        					
		          					<h4 class="card-title">Welcome </h4>
		          					<h5></h5>
		          					<br>
		        				</div>
		      				</div>
			      			<!-- Carousel start -->
			      			<div class="col-md-5">
			        			<div id="CarouselTest" class="carousel slide" data-ride="carousel">
						          	<ol class="carousel-indicators">
						            	<li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
						         	</ol>
			          				<div class="carousel-inner">
			            				<div class="carousel-item active">
			              					<img class="d-block" src="images/giphy.gif" alt="giphy" style="width: 100%;"/>
			            				</div>
				          			</div>
				        		</div>
				      		</div>
		      				<!-- End of carousel -->
		    			</div>
		  			</div>
				</div>
				<div class="container">
					<br>
					<h1 class="display-4">Overall Information</h1>
					<br>
				<div class="row">
					    <div class="col-md-4">
						    <div class="card-counter users">
						    	
						        <i class="fa fa-users"></i>
						        <span class="count-numbers"></span>
						        <span class="count-name">Registered Users</span>
						    </div>
					    </div>

					    <div class="col-md-4">
					      	<div class="card-counter vehicles">
					      		
						        <i class="fa fa-check-square-o"></i>
						        <span class="count-numbers"></span>
						        <span class="count-name">Total AD</span>
						    </div>
					    </div>

					    <div class="col-md-4">
					      	<div class="card-counter drivers">
					      		
						        <i class="fa fa-id-card-o"></i>
						        <span class="count-numbers"></span>
						        <span class="count-name">Total Employees</span>
					      	</div>
					    </div>
				  	</div>
				  	<br>
				  	<h1 class="display-4">Employees Information</h1>
				  	<br>
				    <div class="row">
				<div class="col-md-3">
					      	<div class="card-counter comBookings">
					      	
						        <i class="fa fa-check-square-o"></i>
						        <span class="count-numbers"></span>
						        <span class="count-name">Engineer</span>
					      	</div>
						</div>

						<div class="col-md-3">
					      	<div class="card-counter onBookings">
					      		
						        <i class="fa fa-spinner"></i>
						        <span class="count-numbers"></span>
						        <span class="count-name">Constracter</span>
					      	</div>
						</div>

						<div class="col-md-3">
					      	<div class="card-counter upBookings">
					      		
						        <i class="fa fa-calendar"></i>
						        <span class="count-numbers"></span>
						        <span class="count-name">Plan Maker</span>
					      	</div>
						</div>
						
						
						<div class="col-md-3">
					      	<div class="card-counter onBookings">
					      		
						        <i class="fa fa-spinner"></i>
						        <span class="count-numbers"></span>
						        <span class="count-name">Masonary Bass</span>
					      	</div>
						</div>
					</div>
					
				</div>
				<br><br><br>

<?php require ('footer.php'); ?>
				
				
				
				
				
				
				
				
				
				

	