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
				<div class="mb-3">
                          <input class="form-control" placeholder="Abebe Abebe" name="fullname" pattern="([A-Za-z]{1,20})( )([A-Za-z]{1,20})" required>
                            </div>
                            <div class="mb-3">
                              <input class="form-control" placeholder="0000/00" name="Id" pattern="([0-9]{4})/([0-9]{2})" title="four digits followed by / and two digits" required>
                            </div> 
                            <div class="mb-3">
                              <input class="form-control" placeholder="Abebe@admas" name="username" pattern="([A-Za-z0-9-_]{1,10})@admas" title="less than 10 characters followed by @admas"  required>
                            </div> 
                            <div class="mb-3">
                              <input type="password" class="form-control" placeholder="Password" name="password" pattern=".{6}" title="only six characters allowed" required>
                            </div> 
                            <div class="mb-3">
                            <select class="form-select" name="section" required>
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
                <a href="multiple-data/multistud.php" class="btn btn-primary">Add Multiple Students</a>
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
                      <div class="mb-3">
                        <input class="form-control" placeholder="Abebe Abebe" name="fullname" pattern="([A-Za-z]{1,20})( )([A-Za-z]{1,20})" value="<?php echo $row['stud_name']; ?>">
                      </div>
                      <div class="mb-3">
                        <input class="form-control" placeholder="0000/00" name="Id" value="<?php echo $row['id_no']; ?>">
                      </div> 
                      <div class="mb-3">
                        <input class="form-control" placeholder="Abebe@admas" name="username" value="<?php echo $row['username']; ?>">
                      </div> 
                      <div class="mb-3">
                        <input class="form-control" placeholder="Password" name="password" value="<?php echo $row['password']; ?>">
                      </div> 
                      <div class="mb-3">
                            <select class="form-select" name="section">
                                    <option value="<?php echo $row['sec_name']; ?>"  disabled= ""selected=""><?php echo $row['sec_name']; ?> </option>
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
                      <div class="mb-3">
                        <input class="form-control" name="fullname" value="<?php echo $row['stud_name']; ?>" disabled>
                      </div>
                      <div class="mb-3">
                        <input class="form-control" name="Id" value="<?php echo $row['id_no']; ?>" disabled>
                      </div> 
                      <div class="mb-3">
                        <input class="form-control" name="username" value="<?php echo $row['username']; ?>" disabled>
                      </div> 
                      <div class="mb-3">
                        <input class="form-control" name="password" value="<?php echo $row['password']; ?>" disabled>
                      </div> 
                      <div class="mb-3">
                        <input class="form-control" name="section" value="<?php echo $row['sec_name']; ?>" disabled>
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



  <!-- Print -->
<div class="modal fade" id="printstud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Print</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please select records to print.</p>
      <form method="POST" action="print/printstud.php">
                            <div class="mb-3">
                            <select class="form-select" name="section" required>
                                    <option value="<?php echo "$section" ?>">Current Section</option>
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
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Print</a>
            </div>
			</form>
      </div>
      </div>
    </div>
  </div>
</div>
