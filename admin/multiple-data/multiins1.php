<?php
session_start();
include_once('../includes/db/config.php');

if(isset($_POST['save']))
{
    $fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

    foreach($fullname as $index => $names)
    {
        $s_name = $names;
        $s_username = $username[$index];
        $s_password = $password[$index];
        // $s_otherfiled = $empid[$index];

        $sql = "INSERT INTO instructors 
		(ins_name, username, password) VALUES ('$s_name', '$s_username', '$s_password')";
        $query_run = mysqli_query($conection_db, $sql);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Multiple Data Inserted Successfully";
        header("Location: ../instructor.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: ../instructor.php");
        exit(0);
    }
}
?>