<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
			$zz = $_POST['id'];
			$sname = $_POST['Fullname'];
			$sid = $_POST['ID'];
			$uname = $_POST['Username'];
			$pass = $_POST['Password'];
			$sec = $_POST['Section'];
	   
	   include('../Connection/connection.php');
		
	 			$query = ' UPDATE students set 
	 				stud_name = "'.$sname.'", 
					id_no ="'.$sid.'", 
					username="'.$uname.'",
					password="'.$pass.'",
					sections_sec_id="'.$sec.'" WHERE
					stud_id ="'.$zz.'" ';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "../index.php";
		</script>
 </body>
</html>