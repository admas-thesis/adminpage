
<?php
       
       include('../includes/db_conn.php');
       include('../includes/header.php');
       
        ?>  
<body>
<div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Sections
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


             <div class="col-lg-12">
                        <h2>List of Sections</h2> <a href="Students/add.php?action=add" type="button" class="btn btn-xs btn-info">Add New</a>
                                
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Section Name</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
             <?php                  
                $query = 'SELECT * FROM sections';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['sec_name'].'</td>';
                            echo '<td> <a type="button" class="btn btn-xs btn-info" href="searchfrm.php?action=edit & id='.$row['sec_name'] . '" > View </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-warning" href="edit.php?action=edit & id='.$row['sec_name'] . '"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="del.php?type=students&delete & id=' . $row['sec_name'] . '">DELETE </a> </td>';
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
