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
                 <!-- navbar -->
                 <?php include_once 'includes/sidebar/navbar.php';?>
                <!-- end navbar -->
                <h3 class="titulo-tabla">Attendance List</h3>
                <hr>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <td>Student Name</td>
                        <td>Student ID</td>
                        <td>Department</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         require_once "includes/db/config.php";

                            $sql = "SELECT * FROM students";

                            //use for MySQLi-OOP
                            $query = $conection_db->query($sql);
							while($row = $query->fetch_assoc()){
                                ?>
                            <tr>
                            <td><?php echo $row['stud_name']; ?></td>
						    <td><?php echo $row['id_no']; ?></td>
                            <td>Co Sc</td>
                            </tr>
                            <?php
                            }
                            ?>

                    </tbody>
                    <a href="print/printat.php" class="btn btn-success pull-right"><span class="fa fa-print"></span> Print</a>
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
	</body>
</html>