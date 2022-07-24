<?php
session_start();
include_once('../includes/db/config.php');

if(isset($_POST['save']))
{
    $fullname = $_POST['fullname'];
	$sid = $_POST['Id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$section = $_POST['section'];

    foreach($fullname as $index => $names)
    {
        $s_name = $names;
        $s_sid = $sid[$index];
        $s_username = $username[$index];
        $s_password = $password[$index];
        $s_section = $section[$index];
        // $s_otherfiled = $empid[$index];

        $sql = "INSERT INTO students 
		(stud_name, id_no, username, password, sections_sec_id) VALUES ('$s_name', '$s_sid','$s_username', '$s_password', '$s_section')";
        $query_run = mysqli_query($conection_db, $sql);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: ../student.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: ../student.php");
        exit(0);
    }
}
?>