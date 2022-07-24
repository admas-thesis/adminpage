<?php
   include_once('includes/db/config.php');
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin2"]) || $_SESSION["loggedin2"] !== true){
	header("location: ./index.php");
	exit;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/7d2ab7bb7f.js" crossorigin="anonymous"></script>
    <title>Admin Page</title>
  </head>
  <body>
  <?php include 'includes/nav/nav.php'; ?>
  <div class="container">
  <div class="row align-items-start">
    <div class="col">
	<?php  
                       if(isset($_SESSION['message'])){
                           ?>
                           <div class="alert alert-warning alert-dismissible fade show" role="alert">
                               <?php echo $_SESSION['message']; ?>
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                           <?php
                           unset($_SESSION['message']);
                       }
                ?>
			<h4>Post</h4>
				<hr>
				<div class="card">
					<div class="card-body">
      					<form method="POST" action="actions/addpost.php">
							<div class="form-group">
                              <input class="form-control" placeholder="Post Here" name="post" required>
                            </div>
							<br> 
            				<div>
                			<button type="submit" name="add" class="btn btn-primary">Post</a>
            				</div>
						</form>
					</div>
				</div>
		<br>
		<hr>
		<h4>Your Posts</h4>
		<hr>
		<?php 
			$sql = "SELECT * from notifications where user = '".$_SESSION['ins_name']."' order by post_date  desc";
			$query = $conection_db->query($sql);
			while($row = $query->fetch_assoc()){
				?>
					<div class="card" id="<?php echo $row['note_id'] ?>">
						<div class="card-header">
									<img class="rounded-circle" alt="U" src="assets/img/logo.jpg" width="3%">
									<span class="username"><a style="text-decoration: none; font-size: 15px;" href="#"><?php echo $row['user'] ?></a></span>
									<span style="font-size: 12px;" class="description">Posted - <?php echo $row['post_date']."/" .$row['post_hour']?></span>
									<div class="dropdown" style="float: right">
									<button type="button" class="btn btn-tool" data-bs-toggle="dropdown" id="dropdownMenuButton1">
										<i class="fa fa-ellipsis-v"></i>
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
										<a class="dropdown-item" href="#edit_<?php echo $row['note_id'];?>" data-bs-toggle="modal">Edit</a>
										<a class="dropdown-item" href="#delete_<?php echo $row['note_id'];?>" data-bs-toggle="modal">Delete</a>
									</div>
									<?php include('actions/actionpost.php'); ?>
						</div>
						<div class="card-body">
									<p style="font-size: 14px;" class="card-text"><?php echo $row['Message'] ?></p>
						</div>
					</div>
					<br>
				<?php
				}
				?>   
    </div>
    <div class="col">
	<h4>Recent Posts</h4>
		<hr>
		<?php 
			$sql = "SELECT * from notifications order by post_date  desc";
			$query = $conection_db->query($sql);
			while($row = $query->fetch_assoc()){
				?>
					<div class="card" id="<?php echo $row['note_id'] ?>">
						<div class="card-header">
									<img class="rounded-circle" alt="U" src="assets/img/logo.jpg" width="3%">
									<span class="username"><a style="text-decoration: none; font-size: 15px;" href="#"><?php echo $row['user'] ?></a></span>
									<span style="font-size: 12px;" class="description">Posted - <?php echo $row['post_date']."/" .$row['post_hour']?></span>		
						</div>
						<div class="card-body">
									<p style="font-size: 14px;" class="card-text"><?php echo $row['Message'] ?></p>
						</div>
					</div>
					<br>
				<?php
				}
				?>   
    </div>
  </div>
</div>
				
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="https://Admasuniversity.com" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <span class="mb-3 mb-md-0 text-muted"><img class="rounded-circle" alt="U" src="assets/img/logo.jpg" width="7%"></span>
        <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Admas University</span>
      </a>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/admasuniversityethiopia/"><i class="fa-brands fa-facebook"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/channel/UCEQxceYklbTjcayMFi6JPWw"><i class="fa-brands fa-youtube"></i></a></li>
    </ul>
  </footer>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>