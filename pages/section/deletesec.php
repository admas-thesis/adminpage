<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM sections WHERE sec_id = '".$_GET['id']."'";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Section deleted successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting a section';
		}
	}
	else{
		$_SESSION['error'] = 'Select a section to delete first';
	}

	header('location: section.php');
?>