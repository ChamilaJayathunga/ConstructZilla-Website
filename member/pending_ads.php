<?php 
require ('header.php');
$mem_id = $_SESSION['MEM_ID'];
$sql="select * from ads where member_id = '$mem_id' and status=0";
$res=mysqli_query($con,$sql);
?>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">All Ads</h4> <a href="add_ads.php" class="btn btn-primary float-right veiwbutton">Post New Ads</a> </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>AD ID</th>
												<th>Name</th>
												<th>Date</th>
												<th>Status</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody>
										<?php
                                            while($row=mysqli_fetch_assoc($res)){ ?>
											<tr>
												<td><?php echo $row['id']?></td>
												<td>
													<h2 class="table-avatar">
                                                    <a class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo ADS_IMAGE_SITE_PATH.$row['image']?>" alt="User Image"></a>
                                                    <a><?php echo $row['name']?></a>
                                                    </h2>
                                                </td>
												<td><?php echo $row['added_on']?></td>
												<td>
													<?php
                                                            if($row['status'] ==1){
                                                                echo "<div class='actions'> <a class='btn btn-sm bg-success-light mr-2'>Active</a> </div>";
                                                            }else{
                                                                echo "<div class='actions'> <a class='btn btn-sm bg-warning-light mr-2'>Pending</a> </div>";
                                                            }
                                                            ?>
												</td>
												<td class="text-right">
													<div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
														<div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="add_ads.php?id=<?php echo $row['id'] ?>"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Delete</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>