<!-- Insert -->
<div class="modal fade" id="addco" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please fill this form and submit to add course record to the database.</p>
      <form method="POST" action="actions/addco.php">
                            <div class="form-group">
                              <input class="form-control" placeholder="Course Code" name="code" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Course Name" name="name" required>
                            </div>
        </div>  
            <div class="modal-footer">
                <a href="multiple-data/multicourse.php" class="btn btn-primary">Add Multiple Courses</a>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</a>
            </div>
			</form>
      </div>
      </div>
    </div>
  </div>
</div>