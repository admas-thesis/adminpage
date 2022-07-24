<?php
   include_once('includes/db/config.php');
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin2"]) || $_SESSION["loggedin2"] !== true){
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
    <script src="https://kit.fontawesome.com/7d2ab7bb7f.js" crossorigin="anonymous"></script>
    <!-- bootstrap5 dataTables css cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
  </head>

  <body>
  <?php include 'includes/nav/nav.php'; ?>
<div class="container">
  <h5>Student List</h5>
    <hr>
    <table id="example" class="table table-sm" style="width:100%">
    <hr>   
                                <thead class="table-dark">
                                  <tr>
                                    <th>Index</th>
                                    <th>Full Name</th>
                                    <th>Student ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Section</th>
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
  <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="https://Admasuniversity.com" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <span class="mb-3 mb-md-0 text-muted"><img class="rounded-circle" alt="U" src="assets/img/logo.jpg" width="7%"></span>
        <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Admas University</span>
      </a>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/admasuniversityethiopia/"><i class="fa-brands fa-facebook"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/channel/UCEQxceYklbTjcayMFi6JPWw"><i class="fa-brands fa-youtube"></i></a></li>
    </ul>
  </footer>
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