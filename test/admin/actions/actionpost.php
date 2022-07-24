<!-- Edit -->
<div class="modal fade"  id="edit_<?php echo $row['note_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="actions/editpost.php?id=<?php echo $row['note_id']; ?>">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['note_id']; ?>">
                      <div class="mb-3">
                        <input class="form-control" placeholder="Write Here" name="post" value="<?php echo $row['Message']; ?>">
                      </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                <button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</a>
            </div>
			</form>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['note_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to delete your post?</p>
      <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                <a href="actions/deletepost.php?id=<?php echo $row['note_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Yes</a>                </div>
      </div>
      </div>
    </div>
  </div>