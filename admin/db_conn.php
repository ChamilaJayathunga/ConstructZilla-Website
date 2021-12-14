<?php 
     session_start();
     $con=mysqli_connect("localhost","root","","construction2");
     define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ConstructZilla/');
     define('SITE_PATH','http://127.0.0.1/ConstructZilla/');
 
     define('MEMBER_IMAGE_SERVER_PATH',SERVER_PATH.'media/nic/');
     define('MEMBER_IMAGE_SITE_PATH',SITE_PATH.'media/nic/');
 
     define('USER_IMAGE_SERVER_PATH',SERVER_PATH.'media/user_image/');
     define('USER_IMAGE_SITE_PATH',SITE_PATH.'media/user_image/');
 
     define('PROOF_IMAGE_SERVER_PATH',SERVER_PATH.'media/proof/');
     define('PROOF_IMAGE_SITE_PATH',SITE_PATH.'media/proof/');
?>