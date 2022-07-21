<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$sql = "INSERT INTO sections 
		(sec_name) VALUES ('$name')";

		//use for MySQLi OOP
		if($conection_db->query($sql)){
			$_SESSION['message'] = 'Section added successfully';
		}
		
		else{
			$_SESSION['message'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../section.php');
?>