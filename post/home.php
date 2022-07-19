<?php
include 'db_connect.php';
?>
<style>
	.left-panel{
		width: calc(25%);
		height: calc(100% - 3rem);
		overflow: auto;
		position: fixed;
	}
	.center-panel{
		left: calc(25%);
		width: calc(50%);
		height: calc(100% - 3rem);
		overflow: auto;
		position: fixed;
	}
	.side-nav:hover,.post-link:hover{
		background: #00000026
	}
</style>
<div class="d-flex w-100 h-100">
		
	</div>
	<div class="center-panel py-3 px-2">
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="card card-widget">
					<div class="card-body">
						<div class="container-fluid">
							<div class="d-flex w-100">
								<div class="rounded-circle mr-1" style="width: 30px;height: 30px;top:-5px;left: -40px">
					                  <img src="assets/uploads/" class="image-fluid image-thumbnail rounded-circle" alt="" style="max-width: calc(100%);height: calc(100%);">
				                </div>
				                <button class="btn btn-default ml-4 text-left" id="write_post" type="button" style="width:calc(80%);border-radius: 50px !important;"><span>What's on your mind, </span></button>
							</div>
							<hr>
							<div class="d-flex w-100 justify-content-center">
								<a href="javascript:void(0)" id="upload_post" class="text-dark post-link px-3 py-1" style="border-radius: 50px !important;"> Post</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 

			$posts = $conn->query("SELECT * from notifications order by post_date  desc");
			while($row=$posts->fetch_assoc()):
			$row['Message'] = str_replace("\n","<br/>",$row['Message']);
			?>
			<div class="col-md-12">
				
			<div class="card card-widget post-card" data-id="<?php echo $row['note_id'] ?>">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="assets/uploads/" alt="U">
                  <span class="username"><a href="#"><?php echo $row['user'] ?></a></span>
                  <span class="description">Posted - <?php echo date("M d,Y h:i a",strtotime($row['post_date'])) ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                	<div class="dropdown">
	                  <button type="button" class="btn btn-tool" data-toggle="dropdown" title="Manage">
	                    <i class="fa fa-ellipsis-v"></i>
	                  </button>
	                  <div class="dropdown-menu">
              			<a class="dropdown-item edit_post" data-id="<?php echo $row['note_id'] ?>" href="javascript:void(0)">Edit</a>
              			<a class="dropdown-item delete_post" data-id="<?php echo $row['note_id'] ?>" href="javascript:void(0)">Delete</a>
	                  </div>
	                  </div>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p class="content-field"><?php echo $row['Message'] ?></p>

              	<a href="javascript:void(0)" class="d-none show-content" >Show More</a>

				</div>
              <!-- /.card-body -->
            </div>
			</div>
		<?php endwhile; ?>
			
		</div>
	</div>
</div>
<style>
	.gallery__img {
	    width: 100%;
	    height: 100%;
	    object-fit: cover;
	}
	.gallery {
	    display: grid;
	    grid-template-columns: repeat(2, 50%);
	    grid-template-rows: repeat(2, 30vh);
	    grid-gap: 3px;
	    grid-row-gap: 3px;
	}
	.gallery__item{
		margin: 0
	}
</style>
</div>
</div>
<script>
	
	$('#write_post').click(function(){
		uni_modal("<center><b>Create Post</b></center></center>","create_post.php")
	})
	$('.edit_post').click(function(){
		uni_modal("<center><b>Edit Post</b></center></center>","create_post.php?id="+$(this).attr('data-id'))
	})
	$('.delete_post').click(function(){
	_conf("Are you sure to delete this post?","delete_post",[$(this).attr('data-id')])
	})
	function delete_post($id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_post',
				method:'POST',
				data:{id:$id},
				success:function(resp){
					if(resp==1){
						alert_toast("Data successfully deleted",'success')
						setTimeout(function(){
							location.reload()
						},1500)

					}
				}
			})
		}
	$('#upload_post').click(function(){
		uni_modal("<center><b>Create Post</b></center></center>","create_post.php?upload=1")
	})
	$('.content-field').each(function(){
		var dom = $(this)[0]
		var divHeight = dom.offsetHeight
		if(divHeight > 117){
			$(this).addClass('truncate-5')
			$(this).parent().children('.show-content').removeClass('d-none')
		}
	})
	$('.show-content').click(function(){
		var txt = $(this).text()
		if(txt == "Show More"){
			$(this).parent().children('.content-field').removeClass('truncate-5')
			$(this).text("Show Less")
		}else{
			$(this).parent().children('.content-field').addClass('truncate-5')
			$(this).text("Show More")
		}
	})
</script>