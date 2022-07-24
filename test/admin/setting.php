<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
 
// Include config file
require_once "includes/db/config.php";
require_once "../php_reset_password.php";
 
?>

<!DOCTYPE html>
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
  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="text-center">
    <a href="home.html" aria-label="Space">
        <img class="mb-3" src="assets/img/logo.jpg" alt="Logo" width="60" height="60">
    </a>
    </div>
<div class="mb-3">
  <div class="form-group" <?= (!empty($new_password_err)) ? 'has-error' : ''; ?>">
  <label for="exampleInputPassword1" class="form-label">Password</label>
  <input type="password" class="form-control" name="new_password" placeholder="New Password" value="<?= $new_password; ?>">	
  <span class="help-block"><?= $new_password_err; ?></span>
  </div>
</div>
  <div class="mb-3">
  <div class="form-group" <?= (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
  <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
  <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" value="<?= $confirm_password; ?>">
  <span class="help-block"><?= $confirm_password_err; ?></span>
  </div>
</div>
  <button type="submit" class="btn btn-primary">Reset Password</button>
</form>
</div>
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
