
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
                           Students
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


             <div class="col-lg-12">
                  <h2>Add new Records</h2>
                      <div class="col-lg-6">

                        <form role="form" method="post" action="transac.php?action=add">
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="Full Name" name="Fullname">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="ID" name="ID">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Username" name="Username">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Password" name="Password">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Section" name="Section">
                            </div> 
                            <button type="submit" class="btn btn-default">Save Record</button>
                            <button type="reset" class="btn btn-default">Clear Entry</button>


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

