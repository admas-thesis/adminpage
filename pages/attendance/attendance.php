<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Attendance</title>
	<link rel="stylesheet" type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/datatable/dataTable.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/style.css">

    <!-- Bootstrap Core CSS -->
    <link href="../../Assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../Assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../Assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../Assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>     

	 <div class="collapse navbar-collapse navbar-ex1-collapse">
		 <ul class="nav navbar-nav side-nav">
			 <li class="active">
				 <a href="../home.php"><i class="fa fa-fw fa-home"></i> Home</a>
				 <a href="../student/student.php"><i class="fa fa-fw fa-user"></i> Students</a>
				 <a href="../instructor/instructor.php"><i class="fa fa-fw fa-check"></i> Instructors</a>
				 <a href="attendance.php"><i class="fa fa-fw fa-users"></i> Attendance</a>
				 <a href="../course/course.php"><i class="fa fa-fw fa-book"></i> Courses</a>
				 <a href="../section/section.php"><i class="fa fa-fw fa-bars"></i> Sections</a>
	 
			 </li>
			 
		 </ul>
	 </div>

<div class="container">
	<h1 class="page-header text-center">Attendance Data</h1>
			<div class="row">
				<a href="printat.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print</a>
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <?php
                        include('../../includes/db_conn.php');
                        $arrays = array();
                        $query = 'SELECT distinct ses_date from session where sections_sec_id = 2 and courses_course_id = 20;';
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($row as $data) {
                                array_push($arrays, $data);
                            }
                        }
                        echo "<tr>";
                        echo "<td>" . "Student" . "</td>";
                        foreach ($arrays as $dates) {
                            echo "<td>" . $dates . "</td>";
                        }
                        echo "</tr>";
                        ?>
                    </thead>
                    <tbody>
                        <?php

                        $student_id = array();
                        $query = 'SELECT stud_name from students where sections_sec_id = 2;';
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($rows = mysqli_fetch_assoc($result)) {
                            foreach ($rows as $count) {
                                array_push($student_id, $count);
                            }
                        }


                        $att_date = array();
                        $sql = 'SELECT distinct ses_date from session where sections_sec_id = 2;';
                        $data = mysqli_query($db, $sql) or die(mysqli_error($db));

                        while ($row = mysqli_fetch_assoc($data)) {
                            foreach ($row as $count_date) {
                                array_push($att_date, $count_date);
                            }
                        }
                        $main_array = array();
                        $sub_array = array();


                        for ($a = 0; $a < sizeof($student_id); $a++) {

                            for ($d = 0; $d < sizeof($att_date); $d++) {
                                $sqm = "select status from attendance join session on
                                         session_ses_id = session.ses_id where ses_date= '$att_date[$d]' and
                                          students_id_no = '$student_id[$a]' and courses_course_id = '20' ;";
                                $sub_data = mysqli_query($db, $sqm) or die(mysqli_error($db));

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
                            echo "<td>" . $student_id[$i] . "</td>";
                            for ($ii = 0; $ii < sizeof($main_array[$i]); $ii++) {
                                print('<td>' . $main_array[$i][$ii] . '</td>');
                            }
                            echo "</tr>";
                        }

                        ?>

                    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="../../Assets/jquery/jquery.min.js"></script>
<script src="../../Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../Assets/datatable/jquery.dataTables.min.js"></script>
<script src="../../Assets/datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script src="../../Assets/js/script.js"></script>
       <!--custom javascript-->
    <script src="../../Assets/js/jquery.js"></script>
    <script src="../../Assets/js/script.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../Assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../Assets/js/plugins/morris/raphael.min.js"></script>
    <script src="../../Assets/js/plugins/morris/morris.min.js"></script>
    <script src="../../Assets/js/plugins/morris/morris-data.js"></script>
    <script src="../../Assets/jquery/jquery.min.js"></script>
    <script src="../../Assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Assets/datatable/jquery.dataTables.min.js"></script>
    <script src="../../Assets/datatable/dataTable.bootstrap.min.js"></script>

</body>
</html>