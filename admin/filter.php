<?php
   include_once('includes/db/config.php');
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])){
  header("location: ./index.php");
  exit;
}
if(isset($_POST['submit'])){
  $section = $_POST['section'];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- bootstrap5 dataTables css cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
  </head>

  <body>
  <?php include 'includes/nav/nav.php'; ?>
<div class="container">
  <h5>Student List</h5>
    <hr>
    <table id="example" class="table table-sm" style="width:100%">
    <?php include('actions/actionstud.php'); ?>
    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addstud">Add New Student</button>
    <button href="print/printstud.php" type="button" class="btn btn-success btn-sm" style="float: right;"><span class="fa fa-print"></span> Print</button>
    <hr>   
                                <thead class="table-dark">
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
							$sql ="SELECT stud_id,stud_name,id_no,username,password,sec_name,sec_id FROM students 
              join sections on sections_sec_id = sec_id where sec_id = '".$section."'";
							//use for MySQLi-OOP
							$query = $conection_db->query($sql);
							while($row = $query->fetch_assoc()){
                                ?>
								<tr>
						    		<td style="font-size: 14px;"><?php echo $row['stud_id']; ?></td>
						    		<td style="font-size: 14px;"><?php echo $row['stud_name']; ?></td>
                    <td style="font-size: 14px;"><?php echo $row['id_no']; ?></td>
						    		<td style="font-size: 14px;"><?php echo $row['username']; ?></td>
						    		<td style="font-size: 14px;"><?php echo $row['password']; ?></td>
                    <td style="font-size: 14px;"><?php echo $row['sec_name']; ?></td>
						    		<td style="font-size: 14px;">
						    			<a href="#view_<?php echo $row['stud_id']; ?>" data-bs-toggle="modal"><i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>
						    			<a href="#edit_<?php echo $row['stud_id']; ?>" data-bs-toggle="modal"><i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>
						    			<a href="#delete_<?php echo $row['stud_id']; ?>" data-bs-toggle="modal"><i class='fa fa-trash' aria-hidden='true' style='color:red'></i></a>
						    		</td>
						    			 <?php include('actions/actionstud.php'); ?>
						    	</tr>
                            <?php
                            }
                            ?>
					        </tbody>
                        </table>
                        <?php
                            // Free result set
                            mysqli_free_result($query);
                            mysqli_close($conection_db);
                        ?>	  
      
    </div>

    <!-- bootstrap5 dataTables js cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#example').DataTable();
      });
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>