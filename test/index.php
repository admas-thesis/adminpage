<?php
session_start();
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: admin/home.php");
  exit;
}
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin2"]) && $_SESSION["loggedin2"] === true){
  header("location: instructor/home.php");
  exit;
}
// Include config file
require_once "admin/includes/db/config.php";

if(isset($_POST['submit1'])){

   $email = mysqli_real_escape_string($conection_db, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM admins WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conection_db, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

        session_start();
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $row['id'];
        $_SESSION["email"] = $row['email'];                        
        
        // Redirect user to home page
        header("location: admin/home.php");
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
if(isset($_POST['submit2'])){

  $email = mysqli_real_escape_string($conection_db, $_POST['email']);
  $pass = md5($_POST['password']);

  $select = " SELECT * FROM instructors WHERE username = '$email' && password = '$pass' ";

  $result = $conection_db->query($select);

  if(mysqli_num_rows($result) > 0){

        $row = $result->fetch_assoc();

        // Password is correct, so start a new session
        session_start();
        // Store data in session variables
        $_SESSION["ins_name"] = $row['ins_name'];
        $_SESSION["id"] = $row['ins_id'];
        $_SESSION["email"] = $row['username'];    
        $_SESSION["loggedin2"] = true;
                                
        
        // Redirect user to home page
        header("location: instructor/home.php");
    
  }else{
     $error2[] = 'incorrect email or password!';
  }

};
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="form-structor">
<form action="" method="post">
	<div class="login2">
		<h2 class="form-title" id="login2"><span>or</span>Admin</h2>
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span style="color: red;" class="error-msg">'.$error.'</span>';
         };
      };
      ?>
		<div class="form-holder">
			<input type="email" name="email" class="input" placeholder="Username"/>
			<input type="password" name="password" class="input" placeholder="Password" />
		</div>
		<button type="submit" name="submit1" class="submit-btn">Log In</button>
	</div>
  </form>
  <form  action="" method="post">
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Instructor</h2>
      <?php
      if(isset($error2)){
         foreach($error2 as $error2){
            echo '<span style="color: red;" class="error-msg">'.$error2.'</span>';
         };
      };
      ?>
			<div class="form-holder">
				<input type="email" name="email" class="input" placeholder="Username" />
				<input type="password" name="password" class="input" placeholder="Password" />
			</div>
			<button type="submit" name="submit2" class="submit-btn">Log in</button>
		</div>
	</div>
  <form>
</div>

</body>
</html>
 
<style>
@import url("https://fonts.googleapis.com/css?family=Fira+Sans");
html, body {
  position: relative;
  min-height: 100vh;
  background-color: #E1E8EE;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Fira Sans", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.form-structor {
  background-color: #222;
  border-radius: 15px;
  height: 550px;
  width: 350px;
  position: relative;
  overflow: hidden;
}
.form-structor::after {
  content: "";
  opacity: 0.8;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-repeat: no-repeat;
  background-position: left bottom;
  background-size: 500px;
  background-color: #000;
}
.form-structor .login2 {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  width: 65%;
  z-index: 5;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login2.slide-up {
  top: 5%;
  -webkit-transform: translate(-50%, 0%);
  -webkit-transition: all 0.3s ease;
}
.form-structor .login2.slide-up .form-holder, .form-structor .login2.slide-up .submit-btn {
  opacity: 0;
  visibility: hidden;
}
.form-structor .login2.slide-up .form-title {
  font-size: 1em;
  cursor: pointer;
}
.form-structor .login2.slide-up .form-title span {
  margin-right: 5px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login2 .form-title {
  color: white;
  font-size: 1.7em;
  text-align: center;
}
.form-structor .login2 .form-title span {
  color: rgb(255, 255, 255);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login2 .form-holder {
  border-radius: 15px;
  background-color: black;
  overflow: hidden;
  margin-top: 50px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login2 .form-holder .input {
  background-color: white;
  color: black;
  border: 0;
  outline: none;
  box-shadow: none;
  display: block;
  height: 30px;
  line-height: 30px;
  padding: 8px 15px;
  border-bottom: 1px solid #eee;
  width: 100%;
  font-size: 12px;
}
.form-structor .login2 .form-holder .input:last-child {
  border-bottom: 0;
}
.form-structor .login2 .form-holder .input::-webkit-input-placeholder {
  color: black;
}
.form-structor .login2 .submit-btn {
  background-color: white;
  color: black;
  border: 0;
  border-radius: 15px;
  display: block;
  margin: 15px auto;
  padding: 15px 45px;
  width: 100%;
  font-size: 13px;
  font-weight: bold;
  cursor: pointer;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login2 .submit-btn:hover {
  transition: all 0.3s ease;
  background-color: white;
}
.form-structor .login {
  position: absolute;
  top: 20%;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #fff;
  z-index: 5;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login::before {
  content: "";
  position: absolute;
  left: 50%;
  top: -20px;
  -webkit-transform: translate(-50%, 0);
  background-color: #fff;
  width: 200%;
  height: 250px;
  border-radius: 50%;
  z-index: 4;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center {
  position: absolute;
  top: calc(50% - 10%);
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  width: 65%;
  z-index: 5;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .form-title {
  color: #000;
  font-size: 1.7em;
  text-align: center;
}
.form-structor .login .center .form-title span {
  color: black;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .form-holder {
  border-radius: 15px;
  background-color: black;
  border: 1px solid #eee;
  overflow: hidden;
  margin-top: 50px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .form-holder .input {
  background-color: black;
  color: white;
  border: 0;
  outline: none;
  box-shadow: none;
  display: block;
  height: 30px;
  line-height: 30px;
  padding: 8px 15px;
  border-bottom: 1px solid #eee;
  width: 100%;
  font-size: 12px;
}
.form-structor .login .center .form-holder .input:last-child {
  border-bottom: 0;
}
.form-structor .login .center .form-holder .input::-webkit-input-placeholder {
  color: white;
}
.form-structor .login .center .submit-btn {
  background-color: black;
  color: white;
  border: 0;
  border-radius: 15px;
  display: block;
  margin: 15px auto;
  padding: 15px 45px;
  width: 100%;
  font-size: 13px;
  font-weight: bold;
  cursor: pointer;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login .center .submit-btn:hover {
  transition: all 0.3s ease;
  background-color: black;
}
.form-structor .login.slide-up {
  top: 90%;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .center {
  top: 10%;
  -webkit-transform: translate(-50%, 0%);
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .form-holder, .form-structor .login.slide-up .submit-btn {
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .form-title {
  font-size: 1em;
  margin: 0;
  padding: 0;
  cursor: pointer;
  -webkit-transition: all 0.3s ease;
}
.form-structor .login.slide-up .form-title span {
  margin-right: 5px;
  opacity: 1;
  visibility: visible;
  -webkit-transition: all 0.3s ease;
}
 </style>


<script>
	console.clear();
	
	const loginBtn = document.getElementById('login');
	const login2Btn = document.getElementById('login2');
	
	loginBtn.addEventListener('click', (e) => {
		let parent = e.target.parentNode.parentNode;
		Array.from(e.target.parentNode.parentNode.classList).find((element) => {
			if(element !== "slide-up") {
				parent.classList.add('slide-up')
			}else{
				login2Btn.parentNode.classList.add('slide-up')
				parent.classList.remove('slide-up')
			}
		});
	});
	
	login2Btn.addEventListener('click', (e) => {
		let parent = e.target.parentNode;
		Array.from(e.target.parentNode.classList).find((element) => {
			if(element !== "slide-up") {
				parent.classList.add('slide-up')
			}else{
				loginBtn.parentNode.parentNode.classList.add('slide-up')
				parent.classList.remove('slide-up')
			}
		});
	});
	</script>