<?php
require('db_conn.php'); 
if(isset($_POST['submit'])){
    unset($_SESSION['PROOF']);
	$uid= $_SESSION['USER_ID'];
	$check_mem = "SELECT * FROM users WHERE id = '$uid'";
	$res = mysqli_query($con, $check_mem);
	$fetch = mysqli_fetch_assoc($res);
	$mem_id = $fetch['member_id'];
	if($mem_id>0){
		$_SESSION['MEM_ID']=$mem_id;
	} ?>
    
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>



