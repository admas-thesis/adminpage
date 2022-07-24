<?php
include_once('includes/db/config.php');
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin2"]) || $_SESSION["loggedin2"] !== true){
  header("location: ./index.php");
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
  <style>
.carousel-item {
  height: 32rem;
  position: relative;
}
#first{
  background-color: black;
}
#second{
  background-color: brown;
}
#third{
  background-color: pink;
}
#fourth{
  background-color: gray;
}
#fifth{
  background-color: darkblue;
}
#sixth{
  background-color: black;
}
</style>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" id="first">
      <div class="carousel-caption text-start d-none d-md-block">
        <h3>Notifications.</h3>
        <p>Check out the latest news in our post page.</p>
        <a href="post.php" type="button" class="btn btn-success">Post</a>
      </div>
    </div>
    <div class="carousel-item" id="second">
      <div class="carousel-caption text-start d-none d-md-block">
        <h3>Our Students.</h3>
        <p>We have some of the brightest and talented students in the country.</p>
        <a href="student.php" type="button" class="btn btn-success">Students</a>
      </div>
    </div>
    <div class="carousel-item" id="third">
      <div class="carousel-caption d-none d-md-block">
        <h3>Our Courses.</h3>
        <p>Here are the courses we give in the computer science department.</p>
        <a href="course.php" type="button" class="btn btn-success">Courses</a>
      </div>
    </div>
  <div class="carousel-item" id="fourth">
      <div class="carousel-caption d-none d-md-block">
        <h3>Classes.</h3>
        <p>See the sections and thier assigned instructors per course.</p>
        <a href="class.php" type="button" class="btn btn-success">Classes</a>
      </div>
    </div>
    <div class="carousel-item" id="fifth">
      <div class="carousel-caption text-end d-none d-md-block">
        <h3>Attendance.</h3>
        <p>Get the report for students attendance.</p>
        <a href="attendance.php" type="button" class="btn btn-success">Attendance</a>
      </div>
    </div>
  <div class="carousel-item" id="sixth">
      <div class="carousel-caption text-end d-none d-md-block">
        <h5>About Us</h5>
        <p>Get to know students who helped us develope this website.</p>
        <a href="about.php" type="button" class="btn btn-success">About</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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