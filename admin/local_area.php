<?php require ('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from local_area where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select local_area.*,districts.districts from local_area,districts where districts.id=local_area.district_id order by local_area.local_area asc";
$res=mysqli_query($con,$sql);
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
                                    <h4 class="page-title">Ads</h4>
                                    <a href="manage_local_area.php">Add New Local Area</a>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                
                                        <div class="table-responsive">
                                            <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>District</th>
                                                        <th>Local Area</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                                    <tr>
                                                        <td><?php echo $row['id']?></td>
                                                        <td><?php echo $row['districts']?></td>
							                            <td><?php echo $row['local_area']?></td>
                    
                                                       
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->        
                        
                    </div> <!-- container -->

                </div> <!-- content -->
    

                <!-- Footer Start -->
<?php require ('footer.php') ?>