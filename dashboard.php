<?php
	include("includes/utility.php");
	include("includes/headers.php");
	include("includes/navbar.php");
	if(!isset($_SESSION['user_id']))
	{
		header("location:login.php");
	}
	else
	{

		if(isset($_REQUEST['status']))
		{
			if($_REQUEST['status'] == 'success')
			{
				?>
				<script>
					alert("Login successfull, here is your dashboard");
					window.location = "<?=baseurl()?>/dashboard.php";
				</script>
				<?php
			}
		}
		?>
		<div class="row" style="background: #404040!important;">
			<div class="col-sm-9 pb-5">
				<h4 class="m-4 text-white">Welcome to your dashboard <b><?=$_SESSION['user_name']?></b></h4>
				<?php
				include("includes/db_connection.php");
				$sql = "SELECT p.project_name, p.project_description, p.project_code FROM project_assign p_u_assign INNER JOIN users u ON p_u_assign.user_id = u.user_id INNER JOIN project p ON p_u_assign.project_id = p.project_id WHERE u.user_id = ".$_SESSION['user_id']." AND p.is_completed != 1";
				$sql_complete = "SELECT p.project_name, p.project_code FROM project_assign p_u_assign INNER JOIN users u ON p_u_assign.user_id = u.user_id INNER JOIN project p ON p_u_assign.project_id = p.project_id WHERE u.user_id = ".$_SESSION['user_id']." AND p.is_completed = 1";
				?>
				<div class="ml-4 m-2" style="font-family: helvetica;">
					You are associated with the following covboards:
				</div>
				<?php
				$result = $conn->query($sql);
				if($result->num_rows == 0)
				{
					?>
					<div class="col-10 ml-4 p-4 mt-3 text-center text-secondary no-project">
						<h6>You don't have any covboard projects</h6>
						<b><a href="<?=baseurl()?>/new-covboard.php" class="text-light"><kbd>Create one now &#8853;</kbd></a></b>
					</div>
					<?php
				}
				else
				{
					while($row = $result->fetch_assoc())
					{
						?>
						<div class="col-10 ml-4 p-4 mt-4 row text-secondary my-shadow">
							<div class="col-12 mb-2">
								<b><?=$row['project_name']?></b>
							</div>
							<p class="col-sm-10">
								<?=$row['project_description']?>
							</p>
							<div class="col-sm-2"><a href="<?=baseurl()?>/covboard/<?=$row['project_code']?>" class="text-light btn-block btn btn-outline-secondary">Open</a></div>
						</div>
						<?php
					}
					?>
					<div class="col-10 ml-4 p-4 mt-4 text-center text-secondary no-project">
						<b><a href="<?=baseurl()?>/new-covboard.php" class="text-light"><kbd>Create new covboard &#8853;</kbd></a></b>
					</div>
					<?php
				} ?>
			</div>
			<!-- side bar to show the completed covboards -->
			<div class="col-sm-3 right-sidebar-color pb-4">
				<p class="m-4 text-center text-light">Completed Covboards</p>
				<?php
					$result = $conn->query($sql_complete);
					if($result->num_rows == 0)
					{
						?>
						<div class="col-10 ml-4 p-4 mt-3 text-center text-secondary no-project">
							<h6>No completed covboards available</h6>
						</div>
						<?php
					}
					else
					{
						?>
						<ul class="list-group bg-transparent list-group-flush">
						<?php
						while($row = $result->fetch_assoc())
						{
							?>
							<li class="list-group-item text-success bg-transparent">
								<b>&#9989;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
								<a href="<?=baseurl()?>/covboard/<?=$row['project_code']?>" class="text-success"><?=$row['project_name']?></a>
							</li>
							<?php
						}
						?>						  
						</ul>
						<?php
					}

				?>
			</div>
			
		</div>
			<?php
	}
?>
<?php
	include("includes/footer.php");
?>