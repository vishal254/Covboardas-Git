<?php
	include("includes/utility.php");
	include("includes/headers.php");
	if(!isset($_SESSION['project_id']) || !isset($_SESSION['task_id']))
		die("access denied");
	
	include("includes/navbar.php");
	include("includes/db_connection.php");
?>
<div class="row">
	<?php
		if($_REQUEST['task_id'] != $_SESSION['task_id'])
		{
			?>
			<div class="col-12 text-center p-5">
				<h4>Invalid Task id</h4>
			</div>
			<?php
		}
		else
		{
			if(isset($_REQUEST['status']))
			{
				$l = baseurl()."/task/".$_SESSION['task_id'];
				if($_REQUEST['status'] == 'success')
				{
					?>
					<script>
						alert("Modifications added to task successfully");
						window.location = "<?=$l?>";
					</script>
					<?php
				}
				if($_REQUEST['status'] == 'fail')
				{
					?>
					<script>
						alert("Failed to add changes");
						window.location = "<?=$l?>";
					</script>
					<?php
				}
			}
			$sql = "SELECT t.task_name, t.task_description, p.project_deadline, t.task_progress FROM project_task_list ptl INNER JOIN task t ON t.task_id = ptl.task_id INNER JOIN project p ON ptl.project_id = p.project_id WHERE ptl.project_id = ".$_SESSION['project_id']."  AND ptl.task_id = ".$_SESSION['task_id'];
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$date = date_create($row['project_deadline']);
			$date = date_format($date,"d M Y");
			$task_progress = $row['task_progress'];
			?>
			<div class="col-12 pt-5 bg-white text-center">
				<div class="deadline">
					Due:<?=$date?>
				</div>
				<h4 class="mt-5"><?=$row['task_name']?></h4>
				<p class="pl-5 pr-5 pb-5 mt-1">
					<?=$row['task_description']?>
				</p>
			</div>
			<div class="progress col-12 mb-2">
			  <div class="progress-bar progress-bar-stripd bg-success text-dark" role="progressbar" style="width: <?=$row['task_progress']?>%;"><?=$row['task_progress']?>% completed</div>
			</div>
			<div class="col-sm-8  extra-light-bg p-3">
				<h5 class="mt-2 mb-2 text-center">Files associated with task are: </h5>
				<div id="directory" class="p-3"></div>
			</div>
			<div class="col-sm-4 p-4 text-white member-section right-sidebar-color-2">
				<?php
					$sql = "SELECT u.user_name, u.email FROM users u INNER JOIN task_assign t_a ON t_a.user_id = u.user_id WHERE t_a.task_id = ".$_SESSION['task_id'];
					$result = $conn->query($sql);
					?>
					<h5 class="text-center">Task members</h5>
						<ul class="text-success ">
							<?php
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										?>
										<li>
											<div  class="btn btn-secondary btn-block">
											  <?=$row['user_name']?>
											  <p class="m-0 p-0">( <?=$row['email']?> )</p>
											</div>
										</li>
										<?php
									}
								}
								else
								{
									?>
									<li class="no-project text-center p-2">
										No Member available
									</li>
									<?php
								}
							?>
						</ul>
			</div>

			<script>
				$(window).on('load',function(){
			        $.ajax({
			        	url:"<?=baseurl()?>/includes/ajax_display_files.php",
			        	method:"POST",
			        	data:{project_id:<?=$_SESSION['project_id']?>, task_id:<?=$_SESSION['task_id']?>},
			        	success:function(data)
			        	{
			        		$('#directory').html(data);
			        	}
			        })
			      })
			</script>
			<?php
		}
	?>
</div>
<div class="row  extra-light-bg">
	<div class="col-12 p-5 text-center">
		<h4 class="mt-3">Upload your task files below</h4>
		<form action="<?=baseurl()?>/includes/upload_files.php" method="POST" enctype="multipart/form-data">
			<!-- <input type="file" name="file" class="form-control p-1" required> -->
			<!-- <input type="submit" name="submit" value="Upload File" class="btn btn-outline-primary mt-2" required> -->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
				  	<input type="submit" name="submit" value="Upload File" class="input-group-text" required>
				</div>
			  <div class="custom-file">
			    <input type="file" class="custom-file-input" name="file" required>
			    <label class="custom-file-label text-center">Choose file</label>
			  </div>
			  
			</div>
		</form>
	</div>
	<div class="col-12">
		<form class="p-5 theme-bg" action="<?=baseurl()?>/includes/mark_progress.php" method="POST">
			<label class="text-white">Define task progress</label>
			<input type="range" name="task_progress" class="custom-range" min="0" max="100" value="<?=$task_progress?>">
			<textarea class="form-control" name="comment" rows="4" placeholder="Enter task comment"></textarea>
			<div class="text-center">
				<input type="submit" name="submit" value="Mark progess" class="btn btn-outline-light mt-2" required>
			</div>
		</form>
	</div>
	<div class="col-12 p-5 extra-light-bg">
		<h4 class="text-center">Comments</h4>
		<div class="row pl-md-5 pt-3 pr-md-5 pl-sm-2 pr-sm-2">
			<?php
				$sql = "SELECT u.user_name, u.user_img, c.user_comment, c.c_date FROM users u INNER JOIN comments c ON c.user_id = u.user_id WHERE c.task_id = ".$_SESSION['task_id']." ORDER BY c.c_date DESC";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						?>
						<!-- comment start -->
						<div class="col-12 bg-white rounded shadow-md mb-1">
				  			<img src="<?=baseurl()?>/assets/img/user_images/<?=$row['user_img']?>" class="m-2 rounded" width="50px" height="50px">
				  			<b><?=$row['user_name']?></b> <small class="text-secondary"><i><?=$row['c_date']?></i></small>
				  			<p class="ml-5 pl-4">
				  				<?=$row['user_comment']?>
				  			</p>
				  		</div>
				  		<!-- comment ends -->
						<?php
					}
				}
			?>
		</div>
	</div>
</div>
<?php
	include("includes/footer.php");
?>