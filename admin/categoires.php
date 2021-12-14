<?php require ('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update categories set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from categories where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from categories order by categories asc";
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
                                    <a href="manage_categories.php">Add new Categories</a>
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
                                                        <th>Categories</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                                    <tr>
                                                        <td><?php echo $row['id']?></td>
                                                        <td><?php echo $row['categories']?></td>
                                                        <td>
                                                            <?php
                                                            if($row['status'] ==1){
                                                                echo "<button class='btn btn-success btn-sm'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></button>&nbsp;";
                                                            }else{
                                                                echo "<button class='btn btn-warning btn-sm'><a class=dbtn href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></button>&nbsp;";
                                                            }
                                                            echo "<span class='badge badge-edit'><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
                                                            echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                                                            
                                                            ?>
                                                        </td>
                    
                                                       
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