<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['add'])){
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "INSERT INTO instructors 
		(ins_name, username, password) VALUES ('$fullname', '$username', '$password')";

		//use for MySQLi OOP
		if($conection_db->query($sql)){
			$_SESSION['message'] = 'Instructor added successfully';
		}
		
		else{
			$_SESSION['message'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../instructor.php');
?>