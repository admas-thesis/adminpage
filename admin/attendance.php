<?php
include_once('includes/db/config.php');
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])){
  header("location: ./index.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Admin Page</title>
  </head>
  <body>
  <?php include 'includes/nav/nav.php'; ?>
  <div class="container">
	  
  <h5>Attendance</h5>
      <hr>
    <form  method="POST" action="filter2.php" id="attendance">  
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                <select class="form-select" name="course" id="course" required>
                       <option value="" disabled= ""selected="">Select Course</option>
                        <?php 
                        $co ="SELECT * FROM courses";
                        $coout = $conection_db->query($co);
                        while($fetchco = $coout->fetch_assoc()){
                        ?>
                        <option value="<?php echo $fetchco['course_id']; ?>" ><?php echo $fetchco['course_code']; ?>: <?php echo $fetchco['course_name']; ?> </option>
                    <?php
                        }
                        ?>
                    </select>
                </div>
    
                <div class="col-md-3">
                <select class="form-select" name="section" id="section" required>
                        <option value="" disabled= ""selected="">Select Section</option>
                        <?php 
                        $result ="SELECT * FROM sections";
                        $output = $conection_db->query($result);
                        while($fetch = $output->fetch_assoc()){
                        ?>
                        <option value="<?php echo $fetch['sec_id']; ?>" ><?php echo $fetch['sec_name']; ?> </option>
                    <?php
                        }
                        ?>
                </select>
                </div>
                <div class="col-md-3">
                <input type="submit" value="Submit" name="submit" class="btn btn-success">
                </div>
        </div>
    </div>
    </form>    

  </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>