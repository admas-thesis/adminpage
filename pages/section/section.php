<?php
	session_start();
	include('../../includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sections</title>
	<link rel="stylesheet" type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/datatable/dataTable.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     
	 <div class="collapse navbar-collapse navbar-ex1-collapse">
		 <ul class="nav navbar-nav side-nav">
			 <li class="active">
				 <a href="../home.php"><i class="fa fa-fw fa-home"></i> Home</a>
				 <a href="../student/student.php"><i class="fa fa-fw fa-user"></i> Students</a>
				 <a href="../instructor/instructor.php"><i class="fa fa-fw fa-check"></i> Instructors</a>
				 <a href="../attendance/attendance.php"><i class="fa fa-fw fa-users"></i> Attendance</a>
				 <a href="../course/course.php"><i class="fa fa-fw fa-book"></i> Courses</a>
				 <a href="section.php"><i class="fa fa-fw fa-bars"></i> Sections</a>
	 
			 </li>
			 
		 </ul>
	 </div>
</nav>

<div class="container">
	<h1 class="page-header text-center">Sections</h1>
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
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Index</th>
						<th>Section</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							include_once('../../includes/db_conn.php');
							$sql = "SELECT * FROM sections";

							//use for MySQLi-OOP
							$query = $db->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['sec_id']."</td>
									<td>".$row['sec_name']."</td>
									<td>
										<a href='#edit_".$row['sec_id']."' class='bi bi-pencil-square' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span></a>
										<a href='#delete_".$row['sec_id']."' class='bi bi-trash' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span></a>
									</td>
								</tr>";
								include('editsec1.php');
							}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('addsec1.php') ?>

<script src="../../Assets/jquery/jquery.min.js"></script>
<script src="../../Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../Assets/datatable/jquery.dataTables.min.js"></script>
<script src="../../Assets/datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script src="../../Assets/js/script.js"></script>

</body>
</html>