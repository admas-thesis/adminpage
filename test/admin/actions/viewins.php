<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['view'])){
	
			$id = $_GET['id'];
			$fname = $_POST['fullname'];
			$uname = $_POST['username'];
			$pass = $_POST['password'];

		}
	
		header('location: ../instructor.php');

?>