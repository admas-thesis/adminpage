<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['edit'])){
	
			$id = $_GET['id'];
			$fname = $_POST['fullname'];
			$uname = $_POST['username'];
			$pass = $_POST['password'];

			$sql = "UPDATE instructors SET 
			ins_name = '$fname', username = '$uname', password = '$pass' WHERE ins_id = '$id'";
			
			if($conection_db->query($sql)){
				$_SESSION['message'] = 'Instructor updated successfully';
			}
			
			else{
				$_SESSION['message'] = 'Something went wrong while updating';
			}
		}
		else{
			$_SESSION['message'] = 'Fill up edit form first';
		}
	
		header('location: ../instructor.php');
?>