<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['edit'])){
	
			$id = $_GET['id'];
			$fname = $_POST['fullname'];
			$sid = $_POST['Id'];
			$uname = $_POST['username'];
			$pass = $_POST['password'];
			$sec = $_POST['section'];

		}
	
		header('location: ../student.php');

?>