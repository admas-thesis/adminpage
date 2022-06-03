<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Page</title>
        
        <?php include 'actions/addstud.php';?>
        <?php include 'actions/editstud.php';?>
        <?php include 'actions/viewstud.php';?>

        <!-- style css php -->
        <?php include_once 'includes/css_style/style.php';?>

         <!-- library css -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
		<!-- end style css php -->
	<body>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'includes/sidebar/nav_student.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="wrapper wrapper-content">
                <div class="col-12">
                <br>
                <h3 class="titulo-tabla">Students Data</h3>
                <hr>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Full Name</th>
                                        <th>Student ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
						<?php
							require_once "includes/config.php";
							$sql = "SELECT * FROM students  where sections_sec_id = 2";

							//use for MySQLi-OOP
							$query = $conection_db->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['stud_id']."</td>
									<td>".$row['stud_name']."</td>
									<td>".$row['id_no']."</td>
									<td>".$row['username']."</td>
									<td>".$row['password']."</td>
									<td>".$row['sections_sec_id']."</td>
									<td>
										<a href='view'  data-bs-toggle='modal'> <i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>
										<a href='actions/editstud.php?id=". $row['stud_id'] ."' data-bs-toggle='modal'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>
                                        <a href='actions/deletestud.php?id=". $row['stud_id'] ."' > <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>
                                        </td>
								</tr>";
							}
						?>
					        </tbody>
                            <button type="button" class="btn btn-success pull-left" data-bs-toggle="modal" data-bs-target="#addnew">Add New Student</button>
                            <a href="print/printstud.php" class="btn btn-success pull-right"><span class="fa fa-print"></span> Print</a>
                        </table>
                        <?php
                            // Free result set
                            mysqli_free_result($query);
                            mysqli_close($conection_db);
                        ?>
               
            </div>
					
				</div>
			</div>
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'includes/script/js.php';?>

        <!-- library js -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
        
        <!-- internal script -->
        <script src="assets/js/export.js"></script>
		<!-- <script> import</script> -->
	</body>
</html>