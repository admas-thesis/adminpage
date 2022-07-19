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
        
        <?php include 'includes/css_style/style_modal.php'; ?>
       
        <!-- style css php -->
        <?php include_once 'includes/css_style/style.php';?>

         <!-- library css -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
		<!-- end style css php -->
	<body>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'includes/sidebar/nav_home.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'includes/sidebar/navbar.php';?>
                <!-- end navbar -->
		
			<h3 class="titulo-tabla">Home</h3>
				<hr>
				<div class="card">
					<div class="card-body">
      					<form method="POST" action="actions/addpost.php">
							<div class="form-group">
                              <input class="form-control" placeholder="Post Here" name="post" required>
                            </div> 
            				<div>
                			<button type="submit" name="add" class="btn btn-primary">Post</a>
            				</div>
						</form>
					</div>
				</div>
		<br>
		<hr>
		<h3 class="titulo-tabla">Recent Posts</h3>
		<hr>
		<?php 
			$sql = "SELECT * from notifications order by post_date  desc";
			$query = $conection_db->query($sql);
			while($row = $query->fetch_assoc()){
				?>
					<div class="card" id="<?php echo $row['note_id'] ?>">
						<div class="card-header">
									<img class="img-circle" alt="U" src="assets/img/logo.jpg" width="3%">
									<span class="username"><a href="#"><?php echo $row['user'] ?></a></span>
									<span class="description">Posted - <?php echo $row['post_date']."/" .$row['post_hour']?></span>
									<div class="dropdown" style="float: right">
									<button type="button" class="btn btn-tool" data-toggle="dropdown" title="Manage">
										<i class="fa fa-ellipsis-v"></i>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#edit_<?php echo $row['note_id'];?>" data-bs-toggle="modal">Edit</a>
										<a class="dropdown-item" href="#delete_<?php echo $row['note_id'];?>" data-bs-toggle="modal">Delete</a>
									</div>
									<?php include('actions/actionpost.php'); ?>
						</div>
						<div class="card-body">
									<p class="card-text"><?php echo $row['Message'] ?></p>
						</div>
					</div>
					<br>
				<?php
				}
				?>
<br>
<br>
     
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