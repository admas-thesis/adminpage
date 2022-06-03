
<?php
       
       include('../includes/db_conn.php');
       
        ?>  
           <html>
<head>
    
    <title>Admin Page</title>
    
</head>
<body>
    <div class="container">
    <h1 class="page-header text-center">Home</h1>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
                        <a href="student/student.php"><i class="fa fa-fw fa-user"></i> Students</a>
                        <a href="instructor/instructor.php"><i class="fa fa-fw fa-check"></i> Instructors</a>
                        <a href="attendance/attendance.php"><i class="fa fa-fw fa-users"></i> Attendance</a>
                        <a href="course/course.php"><i class="fa fa-fw fa-book"></i> Courses</a>
                        <a href="section/section.php"><i class="fa fa-fw fa-bars"></i> Sections</a>
            
                    </li>
                    
                </ul>
            </div>
    </nav>
    </div>

            <!--custom javascript-->
     <script src="../Assets/js/jquery.js"></script>
     <script src="../Assets/js/script.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../Assets/js/plugins/morris/raphael.min.js"></script>
    <script src="../Assets/js/plugins/morris/morris.min.js"></script>
    <script src="../Assets/js/plugins/morris/morris-data.js"></script>
    <script src="../Assets/jquery/jquery.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Assets/datatable/jquery.dataTables.min.js"></script>
    <script src="../Assets/datatable/dataTable.bootstrap.min.js"></script>


</body>
</html>