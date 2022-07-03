<!-- Insert -->
<div class="modal fade" id="addstud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please fill this form and submit to add student record to the database.</p>
      <form method="POST" action="actions/addstud.php">
				<div class="form-group">
                              <input class="form-control" placeholder="Full Name" name="fullname" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Student ID" name="Id" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Username" name="username" required>
                            </div> 
                            <div class="form-group">
                              <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div> 
                            <div class="form-group">
                            <select class="custom-select" name="section" required>
                                    <option value="" disabled= ""selected="">Select Section</option>
                                    <?php 
                                        $sec ="SELECT * FROM sections";
                                        $secout = $conection_db->query($sec);
                                        while($fetchsec = $secout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchsec['sec_id']; ?>" ><?php echo $fetchsec['sec_name']; ?> </option>
                                    <?php
                                        }
                                        ?>
                            </select>
                            </div>
        </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</a>
            </div>
			</form>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit -->
<div class="modal fade"  id="edit_<?php echo $row['stud_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please fill this form and submit to update student.</p>
      <form method="POST" action="actions/editstud.php?id=<?php echo $row['stud_id']; ?>">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['stud_id']; ?>">
                      <div class="form-group">
                        <input class="form-control" placeholder="Full Name" name="fullname" value="<?php echo $row['stud_name']; ?>">
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="ID" name="Id" value="<?php echo $row['id_no']; ?>">
                      </div> 
                      <div class="form-group">
                        <input class="form-control" placeholder="Username" name="username" value="<?php echo $row['username']; ?>">
                      </div> 
                      <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" value="<?php echo $row['password']; ?>">
                      </div> 
                      <div class="form-group">
                            <select class="custom-select" name="section">
                                    <option value="<?php echo $row['sections_sec_id']; ?>"><?php echo $row['sections_sec_id']; ?> </option>
                                    <?php 
                                        $sec ="SELECT * FROM sections";
                                        $secout = $conection_db->query($sec);
                                        while($fetchsec = $secout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchsec['sec_id']; ?>" ><?php echo $fetchsec['sec_name']; ?> </option>
                                    <?php
                                        }
                                        ?>
                            </select>
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



<!-- Read -->
<div class="modal fade"  id="view_<?php echo $row['stud_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student's Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="actions/viewstud.php?id=<?php echo $row['stud_id']; ?>">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['stud_id']; ?>">
                      <div class="form-group">
                        <input class="form-control" name="fullname" value="<?php echo $row['stud_name']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <input class="form-control" name="Id" value="<?php echo $row['id_no']; ?>" disabled>
                      </div> 
                      <div class="form-group">
                        <input class="form-control" name="username" value="<?php echo $row['username']; ?>" disabled>
                      </div> 
                      <div class="form-group">
                        <input class="form-control" name="password" value="<?php echo $row['password']; ?>" disabled>
                      </div> 
                      <div class="form-group">
                        <input class="form-control" name="section" value="<?php echo $row['sections_sec_id']; ?>" disabled>
                      </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
            </div>
			</form>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['stud_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to delete?</p>
				<h2 class="modal_title"><?php echo $row['stud_name']?></h2>
      <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                <a href="actions/deletestud.php?id=<?php echo $row['stud_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Yes</a>                </div>
      </div>
      </div>
    </div>
  </div>