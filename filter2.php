<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }

    if(isset($_POST['submit'])){
		$course = $_POST['course'];
		$section = $_POST['section'];
    }
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Page</title>

        <?php include 'includes/css_style/style_modal.php'; ?>
        <!-- style css php -->
        <?php include_once 'includes/css_style/style.php';?>

         <!-- library css -->
    
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
		<!-- end style css php -->
	<body>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'includes/sidebar/nav_attendance.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'includes/sidebar/navbar.php';?>
                <!-- end navbar -->
                <h3 class="titulo-tabla">Attendance List</h3>
<hr>
<table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <?php
                         require_once "includes/db/config.php";
                        $arrays = array();
                        $query = "SELECT distinct ses_date from session where sections_sec_id = '".$section."' and courses_course_id = '".$course."'";
                        $result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($row as $data) {
                                array_push($arrays, $data);
                            }
                        }
                        echo "<tr>";
<<<<<<< HEAD
                        echo "<th>" . "Student Name" . "</th>";
                        echo "<th>" . "Student ID" . "</th>";
                        foreach ($arrays as $dates) {
                            echo "<th>" . $dates . "</th>";
=======
                        echo "<td>" . "Student Name" . "</td>";
                        foreach ($arrays as $dates) {
                            echo "<td>" . $dates . "</td>";
>>>>>>> 8fc4d818cd10ee950e4a471d7b10079ba9de899b
                        }
                        echo "</tr>";
                        ?>
                    </thead>
                    <tbody>
                        <?php
                        //fetch Student name from db and add to student_name array
                        $student_name = array();
<<<<<<< HEAD
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
=======
                        $query = "SELECT id_no from students  where sections_sec_id = '$section'";
                        $result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
                        while ($rows = mysqli_fetch_assoc($result)) {
                            foreach ($rows as $count) {
                                array_push($student_name, $count);
>>>>>>> 8fc4d818cd10ee950e4a471d7b10079ba9de899b
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
<<<<<<< HEAD
                        for ($a = 0; $a < sizeof($student_id); $a++) {
=======
                        for ($a = 0; $a < sizeof($student_name); $a++) {
>>>>>>> 8fc4d818cd10ee950e4a471d7b10079ba9de899b


                            for ($d = 0; $d < sizeof($att_date); $d++) {
                                $sqm = "select status from attendance join session on
                                         session_ses_id = session.ses_id where ses_date= '$att_date[$d]' and
<<<<<<< HEAD
                                          students_id_no = '$student_id[$a]' and courses_course_id= '$course' ;";
=======
                                          students_id_no = '$student_name[$a]' and courses_course_id= '$course' ;";
>>>>>>> 8fc4d818cd10ee950e4a471d7b10079ba9de899b
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
                            echo "<td>" . $student_name[$i] . "</td>";
<<<<<<< HEAD
                            echo "<td>" . $student_id[$i] . "</td>";
=======
>>>>>>> 8fc4d818cd10ee950e4a471d7b10079ba9de899b
                            //insert status of every student into each column
                            for ($jj = 0; $jj < sizeof($main_array[$i]); $jj++) {
                                print('<td>' . $main_array[$i][$jj] . '</td>');
                            }
                            echo "</tr>";
                        }

                        ?>

                    </tbody>
<<<<<<< HEAD
                    <?php include('actions/actionattendance.php'); ?>
                    <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#printat">Print</button>
=======
                    <a href="print/printat.php" class="btn btn-success pull-right"><span class="fa fa-print"></span> Print</a>
>>>>>>> 8fc4d818cd10ee950e4a471d7b10079ba9de899b
                </table>
            </div>
				</div>
			</div>
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'includes/script/js.php';?>

        <!-- library js -->
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