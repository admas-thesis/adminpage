<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
// Include config file
require_once "includes/config.php";
 
// Define variables and initialize with empty values
$Fullname     = $ID     = $Username     = $Password     = $Section    = "";
$Fullname_err = $ID_err = $Username_err = $Password_err = $Section_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    $id = $_POST["id"];
    
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
        // Prepare an update statement
        $sql = "UPDATE students SET stud_name=?, id_no=?, username=?, password=?, sections_sec_id=? WHERE stud_id=?";

        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $Fullname, $ID, $Username, $Password, $Section, $param_id);
            
              // Set parameters
              $Fullname   = $Fullname;
              $ID         = $ID;
              $Username   = $Username;
              $Password   = $Password;
              $Section    = $Section;
              $param_id   = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Records updated successfully. Redirect to landing page
                header("location: form.php");
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
else
{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
    {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM students WHERE stud_id = ?";
        if($stmt = mysqli_prepare($conection_db, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                     // Retrieve individual field value
                     $Fullname   = $row["stud_name"];
                     $ID         = $row["id_no"];
                     $Usename    = $row["username"];
                     $Password   = $row["password"];
                     $Section    = $row["sections_sec_id"];

                }
                else
                {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            }
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close conection_db
        mysqli_close($conection_db);
    }
    else
    {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}

?>


<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Dashboard</title>
<!-- style css php -->
<?php include_once 'includes/css_style/style.php';?>
<!-- add style css -->
<!-- end style css php -->
	<body>
    <style>
        .help-block{
            color:red;
        }
    </style>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'includes/sidebar/nav_form.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="wrapper wrapper-content">
                    <div class="signup-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header">
                                    <h2>Update Record</h2>
                                </div>
                                <p>Please fill this form and submit to update student record in the database.</p>
                                <form action="" method="post">
                                <div class="form-group <?= (!empty($Fullname_err)) ? 'has-error' : ''; ?>">
                                        <label>Full Name</label>
                                        <input type="text" name="Fullname" class="form-control" value="<?= $row["stud_name"]; ?>">
                                        <span class="help-block"><?= $Fullname_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($ID_err)) ? 'has-error' : ''; ?>">
                                        <label>Student ID</label>
                                        <input type="text" name="ID" class="form-control" value="<?= $row["id_no"]; ?>">
                                        <span class="help-block"><?= $ID_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($Username_err)) ? 'has-error' : ''; ?>">
                                        <label>Username</label>
                                        <input type="text" name="Username" class="form-control" value="<?= $row["username"]; ?>">
                                        <span class="help-block"><?= $Username_err;?></span>
                                    </div>
                                    <div class="form-group <?= (!empty($Password_err)) ? 'has-error' : ''; ?>">
                                        <label>Password</label>
                                        <input type="password" name="Password" class="form-control" value="<?= $row["password"]; ?>">
                                        <span class="help-block"><?= $Password_err;?></span>
                                    </div>
                                    <div class="form-group<?= (!empty($Section_err)) ? 'has-error' : ''; ?>">
                                        <label>Section</label>
                                        <input type="text" name="Section" class="form-control" value="<?= $row["sections_sec_id"]; ?>">
                                        <span class="help-block"><?= $Section_err;?></span>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $id; ?>"/>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    <a href="form.php" class="btn btn-default" style="color:red;">Cancel</a>
                                </form>
                            </div>
                    </div>        
                </div>
                </div>
            </div>
                <!-- footer -->
                <?php include_once 'includes/footer/footer.php';?>
				<!-- end footer -->
			</div>
		</div>
	</body>
</html>

