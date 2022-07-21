<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['add'])){
		$post = $_POST['post'];
		$sql = "INSERT INTO notifications 
		(Message) VALUES ('$post')";

		//use for MySQLi OOP
		if($conection_db->query($sql)){
			$_SESSION['message'] = 'Posted successfully';
		}
		
		else{
			$_SESSION['message'] = 'Something went wrong while posting';
		}
	}
	else{
		$_SESSION['message'] = 'Write something first';
	}

	header('location: ../home.php');
?>