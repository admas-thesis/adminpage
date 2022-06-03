<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_POST['add'])){
		$section = $_POST['Section'];
		$sql = "INSERT INTO sections 
		(sec_name) VALUES ('$section')";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Section added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: section.php');
?>