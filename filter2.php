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
<?php
 require_once "includes/db/config.php";
$query=" SELECT distinct ses_date from session where sections_sec_id = '".$section."' and courses_course_id = '".$course."'";

$sql =" SELECT att_id,status,students_id_no,session_ses_id,stud_name,ses_date,courses_course_id from attendance 
                 join session on session_ses_id=ses_id 
                 join students on students_id_no = id_no where courses_course_id = '".$course."'";

$output=mysqli_query($conection_db,$query);
$result=mysqli_query($conection_db,$sql);          
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student ID</th>
        <?php
           
            while($row = $output->fetch_assoc()){   
        ?>
                            <th><?php echo $row['ses_date']; ?></th>
        <?php
            }
        ?>
                        </tr>
    </thead>
    <tbody>
            <?php
                while($in = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $in['stud_name']; ?></td>
                        <td><?php echo $in['students_id_no']; ?></td>
                        <td><?php echo $in['status']; ?></td>
                    </tr>
                <?php
                }
                ?>
    </tbody>
    <?php include('actions/actionattendance.php'); ?>
    <button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#printstud">Print</button>
   </table>
               
            <!-- footer -->
<?php include_once 'includes/footer/footer.php';?>
				<!-- end footer -->
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