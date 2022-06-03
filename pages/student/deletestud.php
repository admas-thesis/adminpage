<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM students WHERE stud_id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Student deleted successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting a student';
		}
	}
	else{
		$_SESSION['error'] = 'Select a Student to delete first';
	}

	header('location: student.php');
?>