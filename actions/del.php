
<?php
       
	   include('../includes/db_conn.php');
	   include('../includes/header.php');
       
        ?>  

<body>
<?php

	

			if (!isset($_GET['do']) || $_GET['do'] != 1) {
								
	
			switch ($_GET['type']) {
				case 'students':
					$query = 'DELETE FROM students
							WHERE
							stud_id = ' . $_GET['id'];
						$result = mysqli_query($db, $query) or die(mysqli_error($db));
						
?>
			<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "../pages/home.php";
			</script>				
				
			<?php
			//break;
				}
			}
			?>

</body>
</html>