<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_POST['add'])){
		$co = $_POST['code'];
		$cname = $_POST['name'];
		$sql = "INSERT INTO courses 
		(course_code, course_name) VALUES ('$co', '$cname')";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Course added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: course.php');
?>