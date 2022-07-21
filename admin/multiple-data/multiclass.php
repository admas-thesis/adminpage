<?php
include_once('includes/db/config.php');
// Initialize the session
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Admin Page</title>
  </head>
  <body>
  <?php include 'includes/nav/nav.php'; ?>
  
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Assign Multiple Classes.
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">ADD MORE</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="multiclass1.php" method="POST">
                        
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                        <select class="form-select" name="course[]" required>
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
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                    <select class="form-select" name="instructor[]" required>
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
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-2">
                                        <select class="form-select" name="section[]" required>
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
                                </div>
                            </div>

                           
                            <div class="paste-new-forms"></div>

                            <button type="submit" name="save" class="btn btn-primary">Save Multiple Data</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                    <div class="col-md-3">\
                                        <div class="form-group mb-2">\
                                        <select class="form-select" name="course[]" required>\
                                    <option value="">Select course</option>\
                                    <?php 
                                        $co ="SELECT * FROM courses";
                                        $coout = $conection_db->query($co);
                                        while($fetchco = $coout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchco['course_id']; ?>" ><?php echo $fetchco['course_code']; ?>: <?php echo $fetchco['course_name']; ?> </option>\
                                    <?php
                                        }
                                        ?>
                                    </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-3">\
                                        <div class="form-group mb-2">\
                                        <select class="form-select" name="instructor[]" required>\
                                    <option value="">Select Instructor</option>\
                                    <?php 
                                        $ins ="SELECT * FROM instructors";
                                        $insout = $conection_db->query($ins);
                                        while($fetchins = $insout->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $fetchins['ins_id']; ?>" ><?php echo $fetchins['ins_name']; ?> </option>\
                                    <?php
                                        }
                                        ?>
                                    </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-3">\
                                        <div class="form-group mb-2">\
                                        <select class="form-select" name="section[]" required>\
                                        <option value="" disabled= ""selected="">Select Section</option>\
                                        <?php 
                                        $sec ="SELECT * FROM sections";
                                        $secout = $conection_db->query($sec);
                                        while($fetchsec = $secout->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $fetchsec['sec_id']; ?>" ><?php echo $fetchsec['sec_name']; ?> </option>\
                                        <?php
                                        }
                                        ?>
                                        </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-3">\
                                        <div class="form-group mb-2">\
                                            <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>




