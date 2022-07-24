<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['add'])){
		$code = $_POST['code'];
		$name = $_POST['name'];
		$sql = "INSERT INTO courses 
		(course_code, course_name) VALUES ('$code', '$name')";

		//use for MySQLi OOP
		if($conection_db->query($sql)){
			$_SESSION['message'] = 'Course added successfully';
		}
		
		else{
			$_SESSION['message'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../course.php');
?>