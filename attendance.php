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
				<div class="wrapper wrapper-content">
                <div class="col-12">
                <br>
                <h3 class="titulo-tabla">Attendance List</h3>
                <hr>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <?php
                         require_once "includes/config.php";
                        $arrays = array();
                        $query = 'SELECT distinct ses_date from session where sections_sec_id = 2 and courses_course_id = 20;';
                        $result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($row as $data) {
                                array_push($arrays, $data);
                            }
                        }
                        echo "<tr>";
                        echo "<td>" . "Student Name" . "</td>";
                        foreach ($arrays as $dates) {
                            echo "<td>" . $dates . "</td>";
                        }
                        echo "</tr>";
                        ?>
                    </thead>
                    <tbody>
                        <?php

                        $student_name = array();
                        $query = 'SELECT stud_name from students where sections_sec_id = 2;';
                        $result = mysqli_query($conection_db, $query) or die(mysqli_error($conection_db));
                        while ($rows = mysqli_fetch_assoc($result)) {
                            foreach ($rows as $count) {
                                array_push($student_name, $count);
                            }
                        }


                        $att_date = array();
                        $sql = 'SELECT distinct ses_date from session where sections_sec_id = 2;';
                        $data = mysqli_query($conection_db, $sql) or die(mysqli_error($conection_db));

                        while ($row = mysqli_fetch_assoc($data)) {
                            foreach ($row as $count_date) {
                                array_push($att_date, $count_date);
                            }
                        }
                        $main_array = array();
                        $sub_array = array();


                        for ($a = 0; $a < sizeof($student_name); $a++) {

                            for ($d = 0; $d < sizeof($att_date); $d++) {
                                $sqm = "select status from attendance join session on
                                         session_ses_id = session.ses_id where ses_date= '$att_date[$d]' and
                                          students_id_no = '$student_name[$a]' and courses_course_id = '20' ;";
                                $sub_data = mysqli_query($conection_db, $sqm) or die(mysqli_error($conection_db));

                                while ($rowsr = mysqli_fetch_assoc($sub_data)) {
                                    foreach ($rowsr as $sub_count) {
                                        array_push($sub_array, $sub_count);
                                    }
                                }
                            }
                            $main_array[$a] = $sub_array;
                            unset($sub_array);
                            $sub_array = array();
                        }

                        for ($i = 0; $i < sizeof($main_array); $i++) {
                            echo "<tr>";
                            echo "<td>" . $student_name[$i] . "</td>";
                            for ($ii = 0; $ii < sizeof($main_array[$i]); $ii++) {
                                print('<td>' . $main_array[$i][$ii] . '</td>');
                            }
                            echo "</tr>";
                        }

                        ?>

                    </tbody>
                    <a href="print/printat.php" class="btn btn-success pull-right"><span class="fa fa-print"></span> Print</a>
                </table>
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