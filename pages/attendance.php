<?php

include('../includes/db_conn.php');
include('../includes/header.php');

?> <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-header">
                    Attendance
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <div class="col-lg-12">
            <h2>List of Attendance</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <?php
                        $arrays = array();
                        $query = 'SELECT distinct ses_date from session where sections_sec_id = 2 and courses_course_id = 20;';
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($row as $data) {
                                array_push($arrays, $data);
                            }
                        }
                        echo "<tr>";
                        echo "<td>" . "Student Id" . "</td>";
                        foreach ($arrays as $dates) {
                            echo "<td>" . $dates . "</td>";
                        }
                        echo "</tr>";
                        ?>
                    </thead>
                    <tbody>
                        <?php

                        $student_id = array();
                        $query = 'SELECT id_no from students where sections_sec_id = 2;';
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
<!-- /.container-fluid -->

</div>
<!-- /#wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../Assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../Assets/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../Assets/js/plugins/morris/raphael.min.js"></script>
<script src="../Assets/js/plugins/morris/morris.min.js"></script>
<script src="../Assets/js/plugins/morris/morris-data.js"></script>

</body>

</html>