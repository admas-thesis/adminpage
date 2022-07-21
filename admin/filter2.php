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
  $course = $_POST['course'];
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
  <h5>Attendance</h5>
    <hr>
    <table id="example" class="table table-sm" style="width:100%">
    <?php include('actions/actionattendance.php'); ?>
    <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#printat"><span class="fa fa-print"></span>Print</button>
    <hr>   
            <thead class="table-dark">
                                <?php
                        
                        $arrays = array();
                        $query = "SELECT distinct ses_date from session where sections_sec_id = '".$section."' and courses_course_id = '".$course."'";
                        $result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($row as $data) {
                                array_push($arrays, $data);
                            }
                        }
                        echo "<tr>";
                        echo "<th>" . "Student Name" . "</th>";
                        echo "<th>" . "Student ID" . "</th>";
                        foreach ($arrays as $dates) {
                            echo "<th>" . $dates . "</th>";
                        }
                        echo "</tr>";
                        ?>
              </thead>
            <tbody>
						    		<?php
                        //fetch Student name from db and add to student_name array
                        $student_name = array();
                        $student_id = array();
                       
                        $query = "SELECT id_no from students  where sections_sec_id = '$section'";
                        $studquery = "SELECT stud_name from students  where sections_sec_id = '$section'";
                        
                        $result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
                        while ($rows = mysqli_fetch_assoc($result)) {
                            foreach ($rows as $count) {
                                array_push($student_id, $count);
                            }
                        }
                        
                        $studresult = mysqli_query($conection_db, $studquery) or die(mysqli_error($conection_db));
                        while ($studrows = mysqli_fetch_assoc($studresult)) {
                            foreach ($studrows as $studcount) {
                                array_push($student_name, $studcount);
                            }
                        }

                        //fetch Session dates from db and add to att_date array
                        $att_date = array();
                        $sql = "SELECT distinct ses_date from session where sections_sec_id = '$section' ";
                        $data = mysqli_query($conection_db, $sql) or die(mysqli_error($conection_db));

                        while ($row = mysqli_fetch_assoc($data)) {
                            foreach ($row as $count_date) {
                                array_push($att_date, $count_date);
                            }
                        }
                        $main_array = array();
                        $sub_array = array();

                        //select a student from student list and get the status on a session
                        // and store attendance of that student for all sessions on sub_array 
                        for ($a = 0; $a < sizeof($student_id); $a++) {


                            for ($d = 0; $d < sizeof($att_date); $d++) {
                                $sqm = "select status from attendance join session on
                                         session_ses_id = session.ses_id where ses_date= '$att_date[$d]' and
                                          students_id_no = '$student_id[$a]' and courses_course_id= '$course' ;";
                                $sub_data = mysqli_query($conection_db, $sqm) or die(mysqli_error($conection_db));

                                while ($rowsr = mysqli_fetch_assoc($sub_data)) {
                                    foreach ($rowsr as $sub_count) {
                                        array_push($sub_array, $sub_count);
                                    }
                                }
                            }
                            //Add that students data to the main_array
                            $main_array[$a] = $sub_array;
                            //remove first students data from Sub_array
                            unset($sub_array);
                            //initialize Subarray
                            $sub_array = array();
                        }
                        // make as many as rows as students number
                        for ($i = 0; $i < sizeof($main_array); $i++) {
                            echo "<tr>";
                            echo "<td style='font-size: 14px;'>" . $student_name[$i] . "</td>";
                            echo "<td style='font-size: 14px;'>" . $student_id[$i] . "</td>";
                            //insert status of every student into each column
                            for ($jj = 0; $jj < sizeof($main_array[$i]); $jj++) {
                                print('<td>' . $main_array[$i][$jj] . '</td>');
                            }
                            echo "</tr>";
                        }

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