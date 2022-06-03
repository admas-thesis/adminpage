<?php
	session_start();
	include_once('../../includes/db_conn.php');

	$_POST['view']
		$id = $_POST['id'];
		$fullname = $_POST['Fullname'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		

	header('location: instructor.php');

?>