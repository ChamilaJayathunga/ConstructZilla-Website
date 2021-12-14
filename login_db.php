<?php 

    require_once 'db_conn.php';

    session_start();

    if (isset($_POST['btn_login'])) {
        $email = $_POST['txt_email']; // textbox name 
        $password = $_POST['txt_password']; // password
        $role = $_POST['txt_role']; // select option role
  
        if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (empty($role)) {
            $errorMsg[] = "Please select role";
        } else if ($email AND $password AND $role) {
            try {
                $select_stmt = $db->prepare("SELECT email, password, role FROM users WHERE email = :uemail AND password = :upassword AND role = :urole");
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->bindParam(":urole", $role);
                $select_stmt->execute(); 

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                    $dbrole = $row['role'];
                }
                if ($email != null AND $password != null AND $role != null) {
                    if ($select_stmt->rowCount() > 0) {
                        if ($email == $dbemail AND $password == $dbpassword AND $role == $dbrole) {
                            switch($dbrole) {
                                
                                
                                case 'user':
                                    $_SESSION['user_login'] = $email;
                                    $_SESSION['success'] = "User... Successfully Login...";
                                    header("location: php/user_home.php");
                                break;
                                case 'admin':
                                    $_SESSION['admin_login'] = $email;
                                    $_SESSION['success'] = "Admin... Successfully Login...";
                                    header("location: php/admin_home.php");
                                break;
                                case 'engineer':
                                    $_SESSION['engineer_login'] = $email;
                                    $_SESSION['success'] = "engineer... Successfully Login...";
                                    header("location: php/engineer_home.php");
                                break;
                                case 'contractor':
                                    $_SESSION['contractor_login'] = $email;
                                    $_SESSION['success'] = "User... Successfully Login...";
                                    header("location: php/contractor_home.php");
                                break;
                                case 'planmaker':
                                    $_SESSION['planmaker_login'] = $email;
                                    $_SESSION['success'] = "User... Successfully Login...";
                                    header("location: php/planmaker_home.php");
                                break;
                                case 'masonarybas':
                                    $_SESSION['masonarybas_login'] = $email;
                                    $_SESSION['success'] = "User... Successfully Login...";
                                    header("location: php/masonarybas_home.php");
                                break;

                                


                                
                                default:
                                    $_SESSION['error'] = "Wrong email or password or role";
                                    header("location: index.php");
                            }
                        }
                    } else {
                        $_SESSION['error'] = "Wrong email or password or role";
                        header("location: index.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>