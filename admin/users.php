<?php require ('header.php');

$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                  <!--   <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                            <li class="breadcrumb-item active">Products</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title">Users</h4>
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
                                                        <th>User ID</th>
                                                        <th>Member ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Mobile</th>
                                                        <th>Joined Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
												
                                                <tbody>
                                                <?php
                                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                                    <tr>
                                                        <td><?php echo $row['id']?></td>
                                                        <td><?php echo $row['member_id']?></td>
                                                        <td><?php echo $row['name']?></td>
                                                        <td><?php echo $row['email']?></td>
                                                        <td><?php echo $row['address']?></td>
                                                        <td><?php echo $row['mobile']?></td>
                                                        <td><?php echo $row['status2']?></td>
                                                        <td>
                                                            <button class="btn btn-success">Active</button>
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