<?php
include_once('includes/db/config.php');
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../index.php");
    exit;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/7d2ab7bb7f.js" crossorigin="anonymous"></script>
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
                        <h4>Insert Multiple Students.
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">ADD MORE</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="multistud1.php" method="POST">
                        
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                        <input class="form-control" placeholder="Abebe Abebe" name="fullname[]" pattern="([A-Za-z]{1,20})( )([A-Za-z]{1,20})"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                        <input class="form-control" placeholder="0000/00" name="Id[]" pattern="([0-9]{4})/([0-9]{2})" title="four digits followed by / and two digits" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                        <input class="form-control" placeholder="Abebe@admas" name="username[]" pattern="([A-Za-z0-9-_]{1,10})@admas" title="less than 10 characters followed by @admas" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                        <input type="password" class="form-control" placeholder="Password" name="password" pattern=".{6}" title="only six characters allowed" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                        <input class="form-control" placeholder="Abebe Abebe" name="fullname[]" pattern="([A-Za-z]{1,20})( )([A-Za-z]{1,20})"  required>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                        <input class="form-control" placeholder="0000/00" name="Id[]" pattern="([0-9]{4})/([0-9]{2})" title="four digits followed by / and two digits" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                        <input class="form-control" placeholder="Abebe@admas" name="username[]" pattern="([A-Za-z0-9-_]{1,10})@admas" title="less than 10 characters followed by @admas" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                        <input type="password" class="form-control" placeholder="Password" name="password[]" pattern=".{6}" title="only six characters allowed" required>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
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
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>
    <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="https://Admasuniversity.com" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <span class="mb-3 mb-md-0 text-muted"><img class="rounded-circle" alt="U" src="assets/img/logo.jpg" width="7%"></span>
        <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Admas University</span>
      </a>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/admasuniversityethiopia/"><i class="fa-brands fa-facebook"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/channel/UCEQxceYklbTjcayMFi6JPWw"><i class="fa-brands fa-youtube"></i></a></li>
    </ul>
  </footer>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



