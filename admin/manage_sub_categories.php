<?php 
require ('header.php');
$categories='';
$msg='';
$sub_categories='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sub_categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$sub_categories=$row['sub_categories'];
		$categories=$row['categories_id'];
	}else{
		header('location:sub_categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories_id']);
	$sub_categories=get_safe_value($con,$_POST['sub_categories']);
	$res=mysqli_query($con,"select * from sub_categories where categories_id='$categories' and sub_categories='$sub_categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Sub Categories already exist";
			}
		}else{
			$msg="Sub Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update sub_categories set categories_id='$categories',sub_categories='$sub_categories' where id='$id'");
		}else{
			
			mysqli_query($con,"insert into sub_categories(categories_id,sub_categories,status) values('$categories','$sub_categories','1')");
		}
        ?>
        <script>
        window.location.href='sub_categoires.php';
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
                                    <a href="manage_sub_categories.php">Add new cat</a>

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
                                        <label for="categories" class=" form-control-label">Categories</label>
                                        <select name="categories_id" required class="form-control">
                                            <option value="">Select Categories</option>
                                            <?php
                                            $res=mysqli_query($con,"select * from categories where status='1'");
                                            while($row=mysqli_fetch_assoc($res)){
                                                if($row['id']==$categories){
                                                    echo "<option value=".$row['id']." selected>".$row['categories']."</option>";
                                                }else{
                                                    echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
							    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="categories" class=" form-control-label">Sub Categories</label>
                                        <input type="text" name="sub_categories" placeholder="Enter sub categories" class="form-control" required value="<?php echo $sub_categories?>">
                                    </div>
							    </div>
							<div class="field_error"><?php echo $msg?></div>
				            <button type="submit" name="submit"  class="btn btn-primary buttonedit1">Create Sub Categories</button>

						</form>
					</div>
				</div>
                        <!-- end row -->        
                        
                    </div> <!-- container -->

                </div> <!-- content -->




                <!-- Footer Start -->
<?php require ('footer.php') ?>