<?php
   include_once('includes/db/config.php');
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])){
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Admin Page</title>
  </head>
  <body>
  <?php include 'includes/nav/nav.php'; ?>
  <div class="container">
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
<br>
<br>   
</div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>