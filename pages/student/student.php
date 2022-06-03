<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Students</title>
	<link rel="stylesheet" type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/datatable/dataTable.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/style.css">
	<?php include_once '../../includes/css_style/style.php';?>
</head>
<body>
<?php include_once '../../includes/sidebar/nav_student.php';?>
<div class="container">
	<h1 class="page-header text-center">Students Data</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
				<a href="printstud.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print</a>
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Index</th>
						<th>Full name</th>
						<th>Student ID</th>
						<th>Username</th>
						<th>Password</th>
						<th>Section</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							include_once('../../includes/db_conn.php');
							$sql = "SELECT * FROM students";

							//use for MySQLi-OOP
							$query = $db->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['stud_id']."</td>
									<td>".$row['stud_name']."</td>
									<td>".$row['id_no']."</td>
									<td>".$row['username']."</td>
									<td>".$row['password']."</td>
									<td>".$row['sections_sec_id']."</td>
									<td>
										<a href='#view_".$row['stud_id']."' class='bi bi-eye' data-toggle='modal'><span class='glyphicon glyphicon-eye-open'></span></a>
										<a href='#edit_".$row['stud_id']."' class='bi bi-pencil-square' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span></a>
										<a href='#delete_".$row['stud_id']."' class='bi bi-trash' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span></a>
									</td>
								</tr>";
								include('editstud1.php');
								include('viewstud1.php');
							}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('addstud1.php') ?>

<script src="../../Assets/jquery/jquery.min.js"></script>
<script src="../../Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../Assets/datatable/jquery.dataTables.min.js"></script>
<script src="../../Assets/datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script src="../../Assets/js/script.js"></script>

</body>
</html>