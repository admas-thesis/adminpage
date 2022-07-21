<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
	header("Location: admin/home.php");
}else {
   header("Location: login.php");
}
 ?>
