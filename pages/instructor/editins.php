<?php
	session_start();
	include_once('../../includes/db_conn.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$fullname = $_POST['Fullname'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$sql = "UPDATE students SET 
		ins_name = '$fullname', username = '$username', password = '$password' WHERE ins_id = '$id'";

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