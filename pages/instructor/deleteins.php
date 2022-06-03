<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM instructors WHERE ins_id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Instructor deleted successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting an instructor';
		}
	}
	else{
		$_SESSION['error'] = 'Select an instructor to delete first';
	}

	header('location: instructor.php');
?>