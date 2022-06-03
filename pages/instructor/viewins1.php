<div class="modal fade" id="view_<?php echo $row['ins_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Instructor Info</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="viewstud.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['ins_id']; ?>">
			</div>
                <div class="form-group">
                                Full Name
                <input  class="form-control" placeholder="Full Name" name="Fullname" value="<?php echo $row['ins_name']; ?>" disabled>
             </div>
                <div class="form-group">
                                Username
                <input  class="form-control" placeholder="Username" name="Username" value="<?php echo $row['username']; ?>" disabled>
                 </div> 
                <div class="form-group">
                                Password
                <input  type="password" class="form-control" placeholder="Password" name="Password" value="<?php echo $row['password']; ?>" disabled>
                 </div> 
				</div>
			</form>
		</div>
            </div>

        </div>
    </div>
</div>
