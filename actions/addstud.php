<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Button trigger modal -->
<?php

// Include config file
require_once "includes/config.php";
 
// Define variables and initialize with empty values
$Fullname     = $ID     = $Username     = $Password     = $Section    = "";
$Fullname_err = $ID_err = $Username_err = $Password_err = $Section_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name
    $input_fullname = trim($_POST["Fullname"]);
    if(empty($input_fullname))
    {
        $Fullname_err = "Please enter a name.";
    }
    elseif(!filter_var($input_fullname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $Fullname_err = "Please enter a valid name.";
    }
    else
    {
        $Fullname = $input_fullname;
    }

    // Validate position
    $input_id = trim($_POST["ID"]);
    if(empty($input_id))
    {
        $ID_err = "Please enter a position.";
    }
    elseif(!($input_id))
    {
        $ID_err = "Please enter a valid position.";
    }
    else
    {
        $ID = $input_id;
    }

    // Validate office
    $input_username = trim($_POST["Username"]);
    if(empty($input_username))
    {
        $Username_err = "Please enter a office.";
    }
    elseif(!($input_username))
    {
        $Username_err = "Please enter a valid office.";
    }
    else
    {
        $Username = $input_username;
    }

    // Validate age
    $input_password = trim($_POST["Password"]);
    if(empty($input_password))
    {
        $Password_err = "Please enter the age.";     
    } 
    elseif(!($input_password))
    {
        $Password_err = "Please enter a positive integer value.";
    }
    else
    {
        $Password = $input_password;
    }

    // Validate date
    $input_section = trim($_POST["Section"]);
    if(empty($input_section))
    {
        $Section_err = "Please enter the start date.";     
    } 
    elseif(!($input_section))
    {
        $Section_err = "Please enter a positive integer value.";
    }
    else
    {
        $Section = $input_section;
    }
    
    
    // Check input errors before inserting in database
    if(empty($Fullname_err) && empty($ID_err) && empty($Username_err) && empty($Password_err) && empty($Section_err))
    {
        // Prepare an insert statement
        $sql = "INSERT INTO students (stud_name, id_no, username, password, sections_sec_id) VALUES (?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $Fullname, $ID, $Username, $Password, $Section);
            
            // Set parameters
            $Fullname   = $Fullname;
            $ID         = $ID;
            $Username   = $Username;
            $Password   = $Password;
            $Section    = $Section;
            $param_id   = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: student.php");
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
      <p>Please fill this form and submit to add student record to the database.</p>
                                <form action="" method="post">
                                    <div class="form-group <?= (!empty($Fullname_err)) ? 'has-error' : ''; ?>">
                                        <label>Full Name</label>
                                        <input type="text" name="Fullname" class="form-control" value="<?= $Fullname; ?>">
                                        <span class="help-block"><?= $Fullname_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($ID_err)) ? 'has-error' : ''; ?>">
                                        <label>Student ID</label>
                                        <input type="text" name="ID" class="form-control" value="<?= $ID; ?>">
                                        <span class="help-block"><?= $ID_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($Username_err)) ? 'has-error' : ''; ?>">
                                        <label>Username</label>
                                        <input type="text" name="Username" class="form-control" value="<?= $Username; ?>">
                                        <span class="help-block"><?= $Username_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($Password_err)) ? 'has-error' : ''; ?>">
                                        <label>Password</label>
                                        <input type="password" name="Password" class="form-control" value="<?= $Password; ?>">
                                        <span class="help-block"><?= $Password_err;?></span>
                                    </div>
                                    <div class="form-group<?= (!empty($Section_err)) ? 'has-error' : ''; ?>">
                                        <label>Section</label>
                                        <input type="text" name="Section" class="form-control" value="<?= $Section; ?>">
                                        <span class="help-block"><?= $Section_err;?></span>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="student.php" class="btn btn-default" style="color:red;">Cancel</a>
                                </form>
      </div>
      </div>
    </div>
  </div>
</div>