<!-- Print -->
<div class="modal fade" id="printat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Print</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please select records to print.</p>
      <form method="POST" action="print/printat.php">
                        <div class="form-group">
                            <select class="form-select" name="course" required>
                                    <option value="<?php echo $course; ?>">Current Course</option>
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
                            <div class="form-group">
                            <select class="form-select" name="term" required>
                            <option value="" disabled= ""selected="">Select Term</option>
                                    <option value="1">Term1</option>
                                    <option value="2">Term2</option>
                                    <option value="3">Term3</option>
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
