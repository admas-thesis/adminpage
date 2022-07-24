<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_GET['id'])){
		
			$sql = "DELETE FROM notifications WHERE note_id = '".$_GET['id']."'";
			//if-else statement in executing our query
			
	if($conection_db->query($sql)){
				$_SESSION['message'] = 'Post deleted successfully';
			}
			
			else{
				$_SESSION['message'] = 'Something went wrong while deleting';
			}
		}
		else{
			$_SESSION['message'] = 'Select a post to delete first';
		}
	header('location: ../post.php');

?>