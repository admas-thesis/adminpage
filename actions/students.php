
<?php
       
       include('../includes/db_conn.php');
       include('../includes/header.php');
       
        ?>  
<body>

    <div id="page-wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Home</a>
                <a class="navbar-brand" href="index.php">Students</a>
                <a class="navbar-brand" href="../Instructors/index.php">Instructors</a>
                <a class="navbar-brand" href="../Attendance/index.php">Attendance</a>
                <a class="navbar-brand" href="../../logout.php" >Logout</a>
            </div>
     
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Students</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         STUDENTS
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


             <div class="col-lg-12">
                        <h2>List of Students</h2> <a href="Students/add.php?action=add" type="button" class="btn btn-xs btn-info">Add New</a>
                                
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Student ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Section</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
             <?php                  
                $query = 'SELECT * FROM students';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['stud_name'].'</td>';
                            echo '<td>'. $row['id_no'].'</td>';
                            echo '<td>'. $row['username'].'</td>';
                            echo '<td>'. $row['password'].'</td>';
                            echo '<td>'. $row['sections_sec_id'].'</td>';
                            echo '<td> <a type="button" class="btn btn-xs btn-info" href="searchfrm.php?action=edit & id='.$row['stud_id'] . '" > View </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-warning" href="edit.php?action=edit & id='.$row['stud_id'] . '"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="del.php?type=students&delete & id=' . $row['stud_id'] . '">DELETE </a> </td>';
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../Assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../Assets/js/plugins/morris/raphael.min.js"></script>
    <script src="../Assets/js/plugins/morris/morris.min.js"></script>
    <script src="../Assets/js/plugins/morris/morris-data.js"></script>

</body>

</html>
