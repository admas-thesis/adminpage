<!DOCTYPE html>
<html lang="en">


<?php
       
       include('../includes/db_conn.php');
include('../includes/header.php');
       
        ?>  
<body>


    <?php 
$query = 'SELECT * FROM students
              WHERE
              stud_id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['stud_id'];
                $i= $row['stud_name'];
                $a=$row['id_no'];
                $b=$row['username'];
                $c=$row['password'];
                $d=$row['sections_sec_id'];
             
              }
              
              $id = $_GET['id'];
         
?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Student
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


             <div class="col-lg-12">
                  <h2>Edit Records</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="edit1.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Full Name" name="Fullname" value="<?php echo $i; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="ID" name="ID" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Username" name="Username" value="<?php echo $b; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Password" name="Password" value="<?php echo $c; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Section" name="Section" value="<?php echo $d; ?>">
                            </div> 
                            <button type="submit" class="btn btn-default">Update Record</button>
                         


                      </form>  
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

