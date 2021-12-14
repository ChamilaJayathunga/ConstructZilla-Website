<?php 
require ('header.php');
$districts='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from districts where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$districts=$row['districts'];
	}else{
		header('location:districts.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$districts=get_safe_value($con,$_POST['districts']);
	$res=mysqli_query($con,"select * from districts where districts='$districts'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="district already exist";
			}
		}else{
			$msg="district already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update districts set districts='$districts' where id='$id'");
		}else{
			mysqli_query($con,"insert into districts(districts) values('$districts')");
		}
        ?>
        <script>
        window.location.href='districts.php';
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
										<input class="form-control" type="text" name="districts" required value="<?php echo $districts?>"> </div>
								</div>
								

							
								
								
								
							</div>
							<div class="field_error"><?php echo $msg?></div>
				            <button type="submit" name="submit"  class="btn btn-primary buttonedit1">Add District</button>

						</form>
					</div>
				</div>
                        <!-- end row -->        
                        
                    </div> <!-- container -->

                </div> <!-- content -->




                <!-- Footer Start -->
<?php require ('footer.php') ?>