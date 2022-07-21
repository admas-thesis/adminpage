<?php
	session_start();
	include_once('../includes/db/config.php');

	if(isset($_POST['edit'])){
	
			$id = $_GET['id'];
			$course = $_POST['course'];
			$ins = $_POST['instructor'];
			$section = $_POST['section'];

			$sql = "UPDATE course_comb SET 
			courses_course_id = '$course', instructors_ins_id = '$ins', sections_sec_id = '$section' WHERE coco_id = '$id'";
			if($conection_db->query($sql)){
				$_SESSION['message'] = 'Class updated successfully';
			}
			
			else{
				$_SESSION['message'] = 'Something went wrong while updating';
			}
		}
		else{
			$_SESSION['message'] = 'Fill up edit form first';
		}
	
		header('location: ../class.php');

?>