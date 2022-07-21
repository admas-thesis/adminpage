<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['add'])){
		$course = $_POST['course'];
		$ins = $_POST['instructor'];
		$section = $_POST['section'];
		$sql = "INSERT INTO course_comb 
		(courses_course_id, instructors_ins_id, sections_sec_id) VALUES ('$course', '$ins', '$section')";

		//use for MySQLi OOP
		if($conection_db->query($sql)){
			$_SESSION['message'] = 'class added successfully';
		}
		
		else{
			$_SESSION['message'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../class.php');
?>