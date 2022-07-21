<?php
session_start();
include_once('../includes/db/config.php');

if(isset($_POST['save']))
{
    $course = $_POST['course'];
    $ins = $_POST['instructor'];
    $section = $_POST['section'];

    foreach($course as $index => $courses)
    {
        $s_course = $courses;
        $s_ins = $ins[$index];
        $s_section = $section[$index];
        // $s_otherfiled = $empid[$index];

        $sql = "INSERT INTO course_comb 
		(courses_course_id, instructors_ins_id, sections_sec_id) VALUES ('$s_course', '$s_ins', '$s_section')";
        $query_run = mysqli_query($conection_db, $sql);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: ../class.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: ../class.php");
        exit(0);
    }
}
?>