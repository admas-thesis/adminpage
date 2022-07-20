<?php
     include_once('includes/db/config.php');

     if(!empty($_POST["section_id"])){ 
        // Fetch state data based on the specific country 
        $query="select course_id, course_code, course_name from course_comb join courses on courses_course_id = course_id where sections_sec_id = '$_POST[section_id]' ";
        $result = $conection_db->query($query); 
        echo($query);
         
        // Generate HTML of state options list 
        if($result->num_rows > 0){ 
            while($fetchco = $result->fetch_assoc()){
                ?>
                <option value="<?php echo $fetchco['course_id']; ?>" ><?php echo $fetchco['course_code']; ?>: <?php echo $fetchco['course_name']; ?> </option>; 
            <?php
            } 
        }else{ 
            ?>
            <option value="<?php echo $_POST["section_id"]; ?>" </option> 
        <?php
        }
    }
     ?>