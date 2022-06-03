<?php
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
    {
        // Include config file
        require_once "includes/config.php";
        
        // Prepare a select statement
        $sql = "SELECT * FROM students WHERE stud_id = ?";
    
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = trim($_GET["id"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
        
                if(mysqli_num_rows($result) == 1)
                {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $Fullname   = $row["stud_name"];
                    $ID         = $row["id_no"];
                    $Usename    = $row["username"];
                    $Password   = $row["password"];
                    $Section    = $row["sections_sec_id"];
                
                }
            }
        }    
        mysqli_stmt_close($stmt);
        
        // Close conection_db
        mysqli_close($conection_db);
    }
?>


<div class="modal fade" id="view_<?= $row['stud_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Records</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                                    <hr>
                                </div>
                                <div class="form-group">
                                    <label>Full Name :<span class="font-weight-bold text text-success"> <?= $row["stud_name"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Student ID : <span class="font-weight-bold"> <?= $row["id_no"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Username : <span class="font-weight-bold"> <?= $row["username"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Password : <span class="font-weight-bold"> <?= $row["password"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                    <label>Section : <span class="font-weight-bold"> <?= $row["sections_sec_id"]; ?></span></label>
                                </div>
                                <div class="form-group">
                                <a href="form.php" class="btn btn-default" style="color:black;">Back</a>
                                </div>
      </div>
      </div>
    </div>
  </div>
</div>
           