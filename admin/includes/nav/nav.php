<nav class="navbar sticky-top navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="rounded-circle" alt="U" src="assets/img/logo.jpg" width="7%"></a>
            <!-- Mobile Menu Toggle Button -->
            <button style="width: 3%; border: none;" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span style="width: 100%;" class="navbar-toggler-icon"></span>
            </button>
            <!-- Menus List -->
            <div class="offcanvas offcanvas-end shadow bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-body">
                <h3>Menu</h3><br>
                    <ul class="navbar-nav">
                        <li><a href="home.php"> <span class="item-text">Home</span></a></li>
                        <li><a href="post.php"><span class="item-text">Post</span></a></li>
                        <li><a href="student.php"><span class="item-text">Students</span></a></li>
                        <li><a href="instructor.php"> <span class="item-text">Instructors</span></a></li>
                        <li><a href="section.php"> <span class="item-text">Sections</span></a></li>
                        <li><a href="course.php"> <span class="item-text">Courses</span></a></li>
                        <li><a href="class.php"><span class="item-text">Classes</span></a></li>
                        <li><a href="attendance.php"><span class="item-text">Attendance</span></a></li>
                        <li><a href="about.php"> <span class="item-text">About</span></a></li>
                        <br><br><br><br><br><li><hr class="dropdown-divider"></li>
                        <li><a href="setting.php"><span class="item-text">Settings</span></a></li>
                        <li><a href="../logout.php"><span class="item-text">Log out</span></a></li>
                    </ul>
              </div>
            </div>
</div>
</nav>
<style>
ul li a {
    font-size: 15px;
    text-decoration: none;
    color: white;
    display: block;
    padding: 8px 0px;
    transition: 0.1s;
}

ul li a:hover {
    background-color: black;
    border-radius: 0.5px;
}

.offcanvas {
    color: white;
    width: 150px;
    border: none;
}

.offcanvas ul li a span {
    font-size: 15px;
    position: relative;
    top: -4px;
    transition: 0.1s;
}

.offcanvas.show ul li a:hover span {
    padding-left: 10px;
}

.dropdown-toggle::after {
    position: relative;
    top: 3px;
}

.btn-group a{
    text-decoration: none;
}
</style>