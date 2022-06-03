<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_POST['add'])){
		$fullname = $_POST['Fullname'];
		$sid = $_POST['Id'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$section = $_POST['Section'];
		$sql = "INSERT INTO students 
		(stud_name, id_no, username, password, sections_sec_id) VALUES ('$fullname', '$sid','$username', '$password', '$section')";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Student added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: student.php');
?>