<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['add'])){
		$fullname = $_POST['fullname'];
		$sid = $_POST['Id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$section = $_POST['section'];
		$sql = "INSERT INTO students 
		(stud_name, id_no, username, password, sections_sec_id) VALUES ('$fullname', '$sid','$username', '$password', '$section')";

		//use for MySQLi OOP
		if($conection_db->query($sql)){
			$_SESSION['message'] = 'Student added successfully';
		}
		
		else{
			$_SESSION['message'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../student.php');
?>