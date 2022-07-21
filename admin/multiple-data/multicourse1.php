<?php
session_start();
include_once('../includes/db/config.php');

if(isset($_POST['save']))
{
    $code = $_POST['code'];
    $name = $_POST['name'];

    foreach($code as $index => $names)
    {
        $s_code = $names;
        $s_name = $code[$index];
        // $s_otherfiled = $empid[$index];

        $sql = "INSERT INTO courses 
		(course_code, course_name) VALUES ('$s_code', '$s_name')";
        $query_run = mysqli_query($conection_db, $sql);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: ../course.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: ../course.php");
        exit(0);
    }
}
?>