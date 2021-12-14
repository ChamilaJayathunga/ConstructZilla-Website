<?php require ('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=mysqli_real_escape_string($con,$_GET['type']);
	if($type=='status'){
		$operation=mysqli_real_escape_string($con,$_GET['operation']);
		$id=mysqli_real_escape_string($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update ads set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	

}

$sql="select * from ads where status = 0";
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
                                                        <th>Members ID</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                                    <tr class='clickable-row' data-href="manage_ads.php?id=<?php echo $row['id']?>">
                                                        <td><?php echo $row['id']?></td>
                                                        <td><?php echo $row['member_id']?></td>
                                                        <td><?php echo $row['name']?></td>
                                                        <td>
                                                            <?php
                                                            if($row['status'] ==1){
                                                                echo "<button class='btn btn-success btn-sm'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></button>&nbsp;";
                                                            }else{
                                                                echo "<button class='btn btn-warning btn-sm'><a class=dbtn href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></button>&nbsp;";
                                                            }
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
                <script>
    jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

                <!-- Footer Start -->
<?php require ('footer.php') ?>