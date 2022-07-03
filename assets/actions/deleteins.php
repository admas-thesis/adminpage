<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_GET['id'])){
		
			$sql = "DELETE FROM instructors WHERE ins_id = '".$_GET['id']."'";
			//if-else statement in executing our query
			
	if($conection_db->query($sql)){
				$_SESSION['message'] = 'instructor deleted successfully';
			}
			
			else{
				$_SESSION['message'] = 'Something went wrong while deleting';
			}
		}
		else{
			$_SESSION['message'] = 'Select an instructor to delete first';
		}
	header('location: ../instructor.php');

?>