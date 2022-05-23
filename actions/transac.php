
<?php
       
       include('../includes/db_conn.php');
       include('../includes/header.php');
        ?>   
<body>

     <?php
                        $sname = $_POST['Fullname'];
                        $sid = $_POST['ID'];
                        $uname = $_POST['Username'];
                        $pass = $_POST['Password'];
                        $sec = $_POST['Section'];
                
                    switch($_GET['action']){
                        case 'add':         
                                $query = "INSERT INTO students
                                (stud_name, id_no, username, password, sections_sec_id)
                                VALUES ('".$sname."','".$sid."','".$uname."','".$pass."','".$sec."')";
                                mysqli_query($db,$query)or die ('Error in updating Database');
                            
                        break;
                                    
                        }
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
               
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "../index.php";
		</script>
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

