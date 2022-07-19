<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['edit'])){
	
			$id = $_GET['id'];
			$fname = $_POST['fullname'];
			$sid = $_POST['Id'];
			$uname = $_POST['username'];
			$pass = $_POST['password'];
			$sec = $_POST['section'];

			$sql = "UPDATE students SET 
			stud_name = '$fname', id_no = '$sid', username = '$uname', password = '$pass', sections_sec_id = '$sec' WHERE stud_id = '$id'";
			if($conection_db->query($sql)){
				$_SESSION['message'] = 'Student updated successfully';
			}
			
			else{
				$_SESSION['message'] = 'Something went wrong while updating';
			}
		}
		else{
			$_SESSION['message'] = 'Fill up edit form first';
		}
	
		header('location: ../student.php');

?>