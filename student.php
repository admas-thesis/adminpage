<?php
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
    <style>
            #u
                {
                float:left;
                }
        </style>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Page</title>
        <!-- style css php -->
        <?php include_once 'includes/css_style/style.php';?>
		<!-- end style css php -->
	<body>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'includes/sidebar/nav_student.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'includes/sidebar/navbar.php';?>
                <!-- end navbar -->
                <h2 class="titulo-tabla">Sections</h2>
                <hr>
                
                <ul style="list-style-type:none" id="u">
                <h2>Regular</h2>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">1DRCS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">1DRCS2</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">2DRCS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">2DRCS2</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">3DRCS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">3DRCS2</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">4DRCS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs2.php">4DRCS2</a></li>
                </ul>

                <ul id="u"></ul>
                <ul id="u"></ul>
                <ul id="u"></ul>
                <ul id="u"></ul>
                <ul id="u"></ul>
                <ul id="u"></ul>
                
                <ul style="list-style-type:none" id="u">
                <h2>Extention</h2>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">1DECS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">1DECS2</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">2DECS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">2DECS2</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">3DECS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">3DECS2</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs1.php">4DECS1</a></li>
                <br>
                <li><a type="button" class="btn btn-dark" href="s4drcs2.php">4DECS2</a></li>
                </ul>

                <!-- footer -->
<?php include_once 'includes/footer/footer.php';?>
				<!-- end footer -->
			</div>
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'includes/script/js.php';?>
		<!-- <script> import</script> -->
	</body>
</html>