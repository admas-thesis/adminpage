<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Button trigger modal -->
<?php
	require_once "includes/config.php";

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$fullname = $_POST['Fullname'];
		$sid = $_POST['Id'];
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$section = $_POST['Section'];
		$sql = "UPDATE students SET 
		stud_name = '$fullname', id_no = '$sid', username = '$username', password = '$password', sections_sec_id = '$section' WHERE stud_id = '$id'";


	header('location: student.php');
    }

?>
<!-- Edit -->
<div class="modal fade" id="<?php echo $row['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Student</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['stud_id']; ?>">
				</div>
                            <div class="form-group">
                        <input class="form-control" placeholder="Full Name" name="Fullname" value="<?php echo $row['stud_name']; ?>">
                            </div>
                            <div class="form-group">
                        <input class="form-control" placeholder="ID" name="ID" value="<?php echo $row['id_no']; ?>">
                            </div> 
                            <div class="form-group">
                        <input class="form-control" placeholder="Username" name="Username" value="<?php echo $row['username']; ?>">
                            </div> 
                            <div class="form-group">
                        <input class="form-control" placeholder="Password" name="Password" value="<?php echo $row['password']; ?>">
                            </div> 
                            <div class="form-group">
                        <input class="form-control" placeholder="Section" name="Section" value="<?php echo $row['sections_sec_id']; ?>">
                            </div> 
				</div>
			</form>
		</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>