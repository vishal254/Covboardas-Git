<?php
	include("includes/utility.php");
	include("includes/headers.php");
	if(!isset($_SESSION['project_id']) || !isset($_REQUEST['task_id']))
		die("access denied");
	
	include("includes/navbar.php");
	include("includes/db_connection.php");
	$sql = "SELECT p_t_l.task_id, t.task_password, t.is_private, t.task_name FROM project_task_list p_t_l INNER JOIN task t ON t.task_id = p_t_l.task_id WHERE p_t_l.task_id = ".$_REQUEST['task_id']." AND p_t_l.project_id = ".$_SESSION['project_id'];
	$result = $conn->query($sql);
	if($result->num_rows < 1)
	{
		echo "<p class='text-center m-5'>Task is not associated with your project: <code>".$_SESSION['project_code']."</code></p>";
	}
	else
	{
		if(isset($_REQUEST['s']))
		{
			if($_REQUEST['s'] == 'fail')
			{
				?>
				<script>
					alert("Wrong password");
				</script>
				<?php
			}
		}
		$row = $result->fetch_assoc();
		if($row['is_private'] == 1)
		{
			?>
			<div class="row p-5" style="background: #a5cecd!important;">
				<h5 class="col-12 mt-4 text-center">Enter task password</h5>
				<div class="col-sm-4 mt-2 bg-white shadow-md rounded offset-md-4 pt-4">
					<form class="pl-5 pr-5 pt-3 pb-5" method="POST" action="<?=baseurl()?>/includes/task_login_db.php">
						<h4 class="text-center"><?=$row['task_name']?></h4>
						<input type="hidden" name="task_id" class="form-control" value="<?=$_REQUEST['task_id']?>">
						<div class="form-group mt-4">
							<input type="password" name="password" class="form-control" placeholder="Password" required>
						</div>
					  	<div class="mb-3 text-center">
						  <small>Go back to covboard <a href="<?=baseurl()?>/covboard/<?=$_SESSION['project_code']?>">click here</a></small>
						</div>
						<div class="form-group text-center">
							<input type="submit" class="btn btn-primary" name="submit" value="Explore task"/>
						</div>
					</form>
				</div>
			</div>
			<?php
		}
		else
		{
			// is a public task
			$l = "location:".baseurl()."/task/".$_REQUEST['task_id'];
			echo $l;
			$_SESSION['task_id'] = $_REQUEST['task_id'];
			header($l);
			
		}
	}

?>
<?php
	include("includes/footer.php");
?>