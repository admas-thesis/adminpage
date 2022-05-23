<?php      
    include('db_conn.php');  
    $email = $_POST['email'];
	  $password = $_POST['password'];
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($db, $email);  
        $password = mysqli_real_escape_string($db, $password);  
      
        $sql = "select * from students where username = '$email' and password = '$password'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
           header("Location:../pages/home.php");
        }  
        else{  
           header("Location: ../index.php?error=Incorect email or password&email=$email");
        }     