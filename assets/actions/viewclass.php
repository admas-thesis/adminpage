<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['edit'])){
	
			$id = $_GET['id'];
			$course = $_POST['course'];
			$ins = $_POST['instructor'];
			$section = $_POST['section'];

		}
	
		header('location: ../class.php');

?>