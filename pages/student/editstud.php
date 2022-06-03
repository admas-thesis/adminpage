<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$fullname = $_POST['Fullname'];
		$sid = $_POST['Id'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$section = $_POST['Section'];
		$sql = "UPDATE students SET 
		stud_name = '$fullname', id_no = '$sid', username = '$username', password = '$password', sections_sec_id = '$section' WHERE stud_id = '$id'";

		//use for MySQLi OOP
		if($db->query($sql)){
			$_SESSION['success'] = 'Student updated successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating a student';
		}
	}
	else{
		$_SESSION['error'] = 'Select a student to edit first';
	}

	header('location: student.php');

?>