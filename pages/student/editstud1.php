<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Student</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editstud.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['stud_id']; ?>">
				</div>
                            <div class="form-group">
                        <input class="form-control" placeholder="Full Name" name="Fullname" value="<?php echo $row['stud_name']; ?>">
                            </div>
                            <div class="form-group">
                        <input class="form-control" placeholder="ID" name="Id" value="<?php echo $row['id_no']; ?>">
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

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Student</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['stud_name'].' '.' ID: '.$row['id_no']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="deletestud.php?id=<?php echo $row['stud_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>