<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_POST['add'])){
		$fullname = $_POST['Fullname'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$sql = "INSERT INTO instructors 
		(ins_name, username, password) VALUES ('$fullname', '$username', '$password')";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Instructor added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: instructor.php');
?>