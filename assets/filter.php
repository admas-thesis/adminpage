<?php
  
  sleep(1);
  include_once('includes/db/config.php');
  $request=$_POST['request'];
  $query="select * from students where sections_sec_id ='$request'";
  $output=mysqli_query($conection_db,$query);
  ?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Full Name</th>
                                        <th>Student ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                   <?php
                                    while($row = mysqli_fetch_assoc($output)){
                                    ?>
                                    <td><?php echo $row['stud_id']; ?></td>
                                    <td><?php echo $row['stud_name']; ?></td>
                                    <td><?php echo $row['id_no']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['sections_sec_id']; ?></td>
                                    <td>
                                        <a href="#view_<?php echo $row['stud_id']; ?>" data-bs-toggle="modal"><i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>
                                        <a href="#edit_<?php echo $row['stud_id']; ?>" data-bs-toggle="modal"><i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>
                                        <a href="#delete_<?php echo $row['stud_id']; ?>" data-bs-toggle="modal"><i class='fa fa-trash' aria-hidden='true' style='color:red'></i></a>
                                    </td>
                                         <?php include('actions/actionstud.php'); ?>

                                </tr>
                         <?php
                            }
                            ?>
                    </tbody>
                        
                            <button type="button" class="btn btn-success pull-left" data-bs-toggle="modal" data-bs-target="#addstud">Add New Student</button>
                            <a href="print/printstud.php" class="btn btn-success pull-right"><span class="fa fa-print"></span> Print</a>
     </table>