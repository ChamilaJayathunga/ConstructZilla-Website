<?php
	$UserName = $_POST['UserName'];
	$Password = $_POST['Password'];
	$Role = $_POST['Role'];
	

	//DATABASE CONNECTION
	$con = new mysqli('localhost','root','','construction');
	if($con->connect_error){
		die('Connection Faild :' .$conn->connect_error);
	}else{
		$stmt = $con->prepare("select*from signup where UserName = ? ");
		$stmt->bind_param("s",$UserName);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0) {
			$data = $stmt_result ->fetch_assoc();
			if($data['Password'] === $Password) {
			echo "LOGIN Successfully....";
			
			}else{
				echo "Invalid Username Or Password";
			}
		}else{
			echo "Invalid Username Or Password";
		}
		
	}

?>