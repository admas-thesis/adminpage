<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['edit'])){
			$id = $_GET['id'];
			$post = $_POST['post'];

			$sql = "UPDATE notifications SET 
			Message = '$post' WHERE note_id = '$id'";
			if($conection_db->query($sql)){
				$_SESSION['message'] = 'Post updated successfully';
			}
			
			else{
				$_SESSION['message'] = 'Something went wrong while updating';
			}
		}
		else{
			$_SESSION['message'] = 'Write something first';
		}
	
		header('location: ../home.php');

?>