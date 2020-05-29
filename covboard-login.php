<?php
	include("includes/utility.php");
	include("includes/headers.php");
	include("includes/navbar.php");
	if(!isset($_SESSION['user_id']))
	{
		?>
		<div class="m-5 p-5 text-center">
			<p>Looks like you aren't logged in</p>
			<h5 class="mt-3">Please login to start working</h5>
			<a href="<?=baseurl()?>/login.php" class="mt-3">Click here</a>
		</div>

		<?php
	}
	else
	{
		if(isset($_REQUEST['project_code']))
		{
			if(isset($_REQUEST['status']))
			{
				if($_REQUEST['status'] == 'fail')
				{
					?>
					<script>
						alert("Invalid password or project code");
					</script>
					<?php
				}
			}
			if(isset($_REQUEST['status']))
			{
				if($_REQUEST['status'] == 'notuser')
				{
					?>
					<script>
						alert("You are trying to access a covboard of which you are not a part of. You can join the project if you want to work on it");
					</script>
					<?php
				}
			}
			?>
			<div class="row p-5" style="background: #a5cecd!important;">
				<h4 class="col-12 mt-3 text-center">Please enter covboard credentials</h4>
				<div class="col-sm-4 mt-2 bg-white shadow-md rounded offset-md-4 pt-4">
					<form class="p-5" method="POST" action="<?=baseurl()?>/includes/covboard_login_db.php">
						<div class="form-group">
						    <label>Project code</label>
						    <input type="text" name="project_code" class="form-control" readonly value="<?=$_REQUEST['project_code']?>">
					  	</div>
					  	<div class="form-group">
						    <label>Projcet password</label>
						    <input type="password" name="project_password" class="form-control" placeholder="Password" required>
					  	</div>
					  	<div class="mb-3 text-center">
						  <small>Not on covboard? <a href="#">Join now</a></small>
						</div>
						<div class="form-group text-center">
						  <input type="submit" class="btn btn-primary" name="submit" value="Start covboard"/>
						</div>
					</form>
				</div>
			</div>
			<?php
		}
	}
?>
<?php
	include("includes/footer.php");
?>