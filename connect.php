<?php 
	
    require_once "db_conn.php";



	if (isset($_POST['submit_reg'])) {
				$role = $_POST['role'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$address = $_POST['address'];
				$phonenumber = $_POST['phonenumber'];
				 
				
				
				$sql = "INSERT INTO users (role, username, password, name, email, address ,phonenumber )VALUES ('$role','$username','$password','$name','$email','$address' ,'$phonenumber')";
																																					
				if ($conn->query($sql) === TRUE) {
					$_SESSION['success'] = "Register Successfully...";
					header("location: index.php");
					// echo "New record created successfully";
					} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}

			




?>