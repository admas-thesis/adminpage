
<?php
       
       include('../includes/db_conn.php');
       include('../includes/header.php');
       
        ?>  
<div id="page-wrapper">
    

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Instructors
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


             <div class="col-lg-12">
                        <h2>List of Instructors</h2> <a href="../actions/add.php?action=add" type="button" class="btn btn-xs btn-info">Add New</a>
                                
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
             <?php                  
                $query = 'SELECT * FROM instructors';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['ins_name'].'</td>';
                            echo '<td>'. $row['username'].'</td>';
                            echo '<td> <a type="button" class="btn btn-xs btn-info" href="../actions/searchfrm.php?action=edit & id='.$row['ins_id'] . '" > View </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-warning" href="../actions/edit.php?action=edit & id='.$row['ins_id'] . '"> EDIT </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="../actions/del.php?type=instructors&delete & id=' . $row['ins_id'] . '">DELETE </a> </td>';
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
