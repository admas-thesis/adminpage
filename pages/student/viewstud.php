<?php
	session_start();
	include_once('../../includes/db_conn.php');

	$_POST['view']
		$id = $_POST['id'];
		$fullname = $_POST['Fullname'];
		$sid = $_POST['Id'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$section = $_POST['Section'];
		

	header('location: student.php');

?>