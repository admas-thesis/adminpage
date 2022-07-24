<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_GET['id'])){
		
			$sql = "DELETE FROM students WHERE stud_id = '".$_GET['id']."'";
			//if-else statement in executing our query
			
	if($conection_db->query($sql)){
				$_SESSION['message'] = 'Student deleted successfully';
			}
			
			else{
				$_SESSION['message'] = 'Something went wrong while deleting';
			}
		}
		else{
			$_SESSION['message'] = 'Select a student to delete first';
		}
	header('location: ../student.php');

?>