<?php 
require ('header.php');
$districts='';
$msg='';
$local_area='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from local_area where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$local_area=$row['local_area'];
		$districts=$row['district_id'];
	}else{
		header('location:local_area.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$districts=get_safe_value($con,$_POST['district_id']);
	$local_area=get_safe_value($con,$_POST['local_area']);
	$res=mysqli_query($con,"select * from local_area where district_id='$districts' and local_area='$local_area'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Local Area already exist";
			}
		}else{
			$msg="Local Area already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update local_area set district_id='$districts',local_area='$local_area' where id='$id'");
		}else{
			
			mysqli_query($con,"insert into local_area(district_id,local_area) values('$districts','$local_area')");
		}
        ?>
        <script>
        window.location.href='local_area.php';
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
                                    <a href="manage_sub_categories.php">Add New Local Area</a>

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
                                        <label for="categories" class=" form-control-label">District</label>
                                        <select name="district_id" required class="form-control">
										<option value="">Select District</option>
										<?php
										$res=mysqli_query($con,"select * from districts");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$districts){
												echo "<option value=".$row['id']." selected>".$row['districts']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['districts']."</option>";
											}
										}
										?>
									</select>
                                    </div>
							    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categories" class=" form-control-label">Local Area</label>
                                        <input type="text" name="local_area" placeholder="Enter Local Area" class="form-control" required value="<?php echo $local_area?>">
                                    </div>
							    </div>
							<div class="field_error"><?php echo $msg?></div>
				            <button type="submit" name="submit"  class="btn btn-primary buttonedit1">Add Local Area</button>

						</form>
					</div>
				</div>
                        <!-- end row -->        
                        
                    </div> <!-- container -->

                </div> <!-- content -->




                <!-- Footer Start -->
<?php require ('footer.php') ?>