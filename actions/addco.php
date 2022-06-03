<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Button trigger modal -->
<?php

// Include config file
require_once "includes/config.php";
 
// Define variables and initialize with empty values
$code     = $name     = "";
$code_err = $name_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate code
    $input_code = trim($_POST["code"]);
    if(empty($input_code))
    {
        $code_err = "Please enter a position.";
    }
    elseif(!($input_code))
    {
        $code_err = "Please enter a valid position.";
    }
    else
    {
        $code = $input_code;
    }

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name))
    {
        $name_err = "Please enter a name.";
    }
    elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $name_err = "Please enter a valid name.";
    }
    else
    {
        $name = $input_name;
    }

    
    
    // Check input errors before inserting in database
    if(empty($code_err) && empty($name_err))
    {
        // Prepare an insert statement
        $sql = "INSERT INTO courses (course_code, course_name) VALUES (?,?)";
         
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $code, $name);
            
            // Set parameters
            $code   = $code;
            $name         = $name;
            $param_id   = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: course.php");
                exit();
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close conection_db
    mysqli_close($conection_db);
}
?>

<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Please fill this form and submit to add course record to the database.</p>
                                <form action="" method="post">
                                    <div class="form-group <?= (!empty($code_err)) ? 'has-error' : ''; ?>">
                                        <label>Course Code</label>
                                        <input type="text" name="code" class="form-control" value="<?= $code; ?>">
                                        <span class="help-block"><?= $code_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($name_err)) ? 'has-error' : ''; ?>">
                                        <label>Course Name</label>
                                        <input type="text" name="name" class="form-control" value="<?= $name; ?>">
                                        <span class="help-block"><?= $name_err;?></span>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="course.php" class="btn btn-default" style="color:red;">Cancel</a>
                                </form>
      </div>
      </div>
    </div>
  </div>
</div>