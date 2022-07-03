<!-- Insert -->
<div class="modal fade" id="addclass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please fill this form and submit to add a class record to the database.</p>
      <form method="POST" action="actions/addclass.php">
			                      <div class="form-group">
                            <select class="custom-select" name="course" required>
                                    <option value="">Select course</option>
                                    <?php 
                                        $co ="SELECT * FROM courses";
                                        $coout = $conection_db->query($co);
                                        while($fetchco = $coout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchco['course_id']; ?>" ><?php echo $fetchco['course_code']; ?>: <?php echo $fetchco['course_name']; ?> </option>
                                    <?php
                                        }
                                        ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <select class="custom-select" name="instructor" required>
                                    <option value="">Select Instructor</option>
                                    <?php 
                                        $ins ="SELECT * FROM instructors";
                                        $insout = $conection_db->query($ins);
                                        while($fetchins = $insout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchins['ins_id']; ?>" ><?php echo $fetchins['ins_name']; ?> </option>
                                    <?php
                                        }
                                        ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <select class="custom-select" name="section" required>
                                    <option value="">Select Section</option>
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
<div class="modal fade"  id="edit_<?php echo $row['coco_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please fill this form and submit to update the class.</p>
      <form method="POST" action="actions/editclass.php?id=<?php echo $row['coco_id']; ?>">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['coco_id']; ?>">
                        <div class="form-group">
                            <select class="custom-select" name="course" required>
                                    <option value="<?php echo $row['course_name']; ?>"><?php echo $row['course_name']; ?> </option>
                                    <?php 
                                        $co ="SELECT * FROM courses";
                                        $coout = $conection_db->query($co);
                                        while($fetchco = $coout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchco['course_id']; ?>" ><?php echo $fetchco['course_code']; ?>: <?php echo $fetchco['course_name']; ?> </option>
                                    <?php
                                        }
                                        ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <select class="custom-select" name="instructor" required>
                                    <option value="<?php echo $row['ins_name']; ?>"><?php echo $row['ins_name']; ?> </option>
                                    <?php 
                                        $ins ="SELECT * FROM instructors";
                                        $insout = $conection_db->query($ins);
                                        while($fetchins = $insout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchins['ins_id']; ?>" ><?php echo $fetchins['ins_name']; ?> </option>
                                    <?php
                                        }
                                        ?>
                            </select>
                            </div>
                      <div class="form-group">
                            <select class="custom-select" name="section">
                                    <option value="<?php echo $row['sec_name']; ?>"><?php echo $row['sec_name']; ?> </option>
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
<div class="modal fade"  id="view_<?php echo $row['coco_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Class Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="actions/viewclass.php?id=<?php echo $row['coco_id']; ?>">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['coco_id']; ?>">
                      <div class="form-group">
                        <input class="form-control" name="course" value="<?php echo $row['courses_course_id']; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <input class="form-control" name="instructor" value="<?php echo $row['instructors_ins_id']; ?>" disabled>
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
<div class="modal fade" id="delete_<?php echo $row['coco_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to delete?</p>
      <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
                <a href="actions/deleteclass.php?id=<?php echo $row['coco_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Yes</a>                </div>
      </div>
      </div>
    </div>
  </div>