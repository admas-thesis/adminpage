<?php
    
    include_once('includes/db/config.php');
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Page</title>
        <!-- style css php -->
        <?php include_once 'includes/css_style/style.php';?>

         <!-- library css -->
    
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
        <!-- end style css php -->
    <body>
        <div id="wrapper">
            <!-- nav -->
            <?php include_once 'includes/sidebar/nav_attendance.php';?>
            <!-- end nav -->
            <div id="page-wrapper" class="gray-bg dashbard-1">
                 <!-- navbar -->
                 <?php include_once 'includes/sidebar/navbar.php';?>
                <!-- end navbar -->
                <h3 class="titulo-tabla">Attendance List</h3>


    <div class="container">
    <form  method="POST" id="attendance">  
    <input type="hidden" name="action" value="getattendance">
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                <select class="custom-select" name="course" id="course">
                       <option value="" disabled= ""selected="">Select Course</option>
                        <?php 
                        $co ="SELECT * FROM courses";
                        $coout = $conection_db->query($co);
                        while($fetchco = $coout->fetch_assoc()){
                        ?>
                        <option value="<?php echo $fetchco['course_id']; ?>" ><?php echo $fetchco['course_code']; ?>: <?php echo $fetchco['course_name']; ?> </option>
                    <?php
                        }
                        ?>
                    </select>
                </div>
 

    
                <div class="col-md-3">
                <select class="custom-select" name="section" id="section">
                        <option value="" disabled= ""selected="">Select Section</option>
                        <?php 
                        $result ="SELECT * FROM sections";
                        $output = $conection_db->query($result);
                        while($fetch = $output->fetch_assoc()){
                        ?>
                        <option value="<?php echo $fetch['sec_id']; ?>" ><?php echo $fetch['sec_name']; ?> </option>
                    <?php
                        }
                        ?>
                </select>
                </div>
                <input type="submit" value="Submit" class="btn btn-success">
        </div>
    </div>
    </form>

    <br>
    <div class="row">
       
               <div id="marksdata"></div>

       
         </div>
</div>
        <?php include_once 'includes/footer/footer.php';?>
                <!-- end footer -->
            </div>
        </div>
        <!-- <script> js php import</script> -->
        <?php include_once 'includes/script/js.php';?>

        <!-- library js -->
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
        
        <!-- internal script -->
        <script src="assets/js/export.js"></script>
    </body>
</html>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>


    <script>
        $(document).ready(function() {
            $('#attendance').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                url: 'filter2.php',
                type: 'post',
                data: $('#attendance').serialize(),
                dataType: 'json',
                    
                success: function(data) {
                    console.log(data);
                    alert(data);
                    if(data['status'] == "1"){
                    allhtml=  
                    
                        "<table class='table table-bordered table-responsive'><thead>"+ "<tr>"+
                          "<th scope='col'>Index</th>"+
                          "<th scope='col'>Status</th>"+
                          "<th scope='col'>Student ID</th>"+
                          "<th scope='col'>Session</th>"+
                        "</tr>"+
                    "</thead>"+
                "<tbody>";
                          
                
                        atdlist='';
                        var counter=0;
                        for(atdkey in data['atd_list']) {
                        console.log(atdkey);
                                  atdlist +="<tr>"+
                                    "<td>"+data['atd_list'][atdkey].att_id+"</td>"+
                                    "<td>"+data['atd_list'][atdkey].status+"</td>"+
                                    "<td>"+data['atd_list'][atdkey].students_id_no+"</td>"+
                                    "<td>"+data['atd_list'][atdkey].session_ses_id+"</td>"+
                                "</tr>";
                               }
                            allhtml += stdlist+"</tbody>"+
                            "</table>";
               

                    $('#marksdata').html(allhtml);
                  }else{
                     $('#marksdata').html("No record Found!");
                  }
               },
               error:function(){
                  alert('error');
               }
            
        });
    });
});
    </script>
</body>
</html>