<?php 

     include_once('includes/db/config.php');


    if(isset($_POST['action'])) {
        if($_POST['action'] == "getattendance") {
            $course          = $_POST['course'];
            $section        = $_POST['section'];

            $query = "SELECT * FROM attendance WHERE course = '".$course."' AND section = '".$section."' ";
            
            $data = array();
            $atd_all = $conection_db->query($query);
            if($atd_all->num_rows > 0) {
                $all_rows = [];

                while($users = $atd_all->fetch_assoc()) {
                    array_push($all_rows, $users);
                }
                $data['status']='1';
                $data['atd_list']=$all_rows;

            }else{
                $data['status']='0';
            }
            echo json_encode($data);
            }

        }

?>