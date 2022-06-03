<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_POST['editstud'])){
		$section = $_POST['Section'];
		$sql = "UPDATE students SET 
		sec_name = '$section' WHERE sec_id = '$id'";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Section updated successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating a section';
		}
	}
	else{
		$_SESSION['error'] = 'Select a section to edit first';
	}

	header('location: student.php');

?>