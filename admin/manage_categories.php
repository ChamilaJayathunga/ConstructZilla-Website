<?php 
require ('header.php');
$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories']);
	$res=mysqli_query($con,"select * from categories where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update categories set categories='$categories' where id='$id'");
		}else{
			mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
		}
		?>
	<script>
	window.location.href='categoires.php ';
	</script>
	<?php
		die();
	}
}
?>



                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   <!--  <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                            <li class="breadcrumb-item active">Products</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title">Ad Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
					<div class="col-lg-12">
						<form method="post">
							<div class="row formtype">
								<div class="col-md-12">
									<div class="form-group">
										<label>Category Name</label>
										<input class="form-control" type="text" name="categories" required value="<?php echo $categories?>"> </div>
								</div>
								

							
								
								
								
							</div>
							<div class="field_error"><?php echo $msg?></div>
				            <button type="submit" name="submit"  class="btn btn-primary buttonedit1">Create Category</button>

						</form>
					</div>
				</div>
                        <!-- end row -->        
                        
                    </div> <!-- container -->

                </div> <!-- content -->




                <!-- Footer Start -->
<?php require ('footer.php') ?>