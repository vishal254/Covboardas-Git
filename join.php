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
		if(isset($_REQUEST['status']))
			{
				if($_REQUEST['status'] == 'fail')
				{
					?>
					<script>
						alert("Unable to join covboard right now, try again later");
					</script>
					<?php
				}
				if($_REQUEST['status'] == 'invalid')
				{
					?>
					<script>
						alert("Invalid password or project code");
					</script>
					<?php
				}
			}
		?>
			<div class="row p-5" style="background: #a5cecd!important;">
				<h4 class="col-12 mt-3 text-center">Enter details to join</h4>
				<div class="col-sm-4 mt-2 bg-white shadow-md rounded offset-md-4 pt-4">
					<form class="p-5" method="POST" action="<?=baseurl()?>/includes/join_db.php">
						<div class="form-group">
						    <label>Project code</label>
						    <?php
						    	if(isset($_REQUEST['project_code']))
						    	{
						    		?>
								    <input type="text" name="project_code" class="form-control" readonly value="<?=$_REQUEST['project_code']?>">
						    		<?php
						    	}
						    	else
						    	{
						    		?>
								    <input type="text" name="project_code" class="form-control" required>
						    		<?php
						    	}
						    ?>
					  	</div>
					  	<div class="form-group">
						    <label>Projcet password</label>
						    <input type="password" name="project_password" class="form-control" placeholder="Password" required>
					  	</div>
						<div class="form-group text-center">
						  <input type="submit" class="btn btn-primary" name="submit" value="Join covboard"/>
						</div>
					</form>
				</div>
			</div>
			<?php
	}
?>
<?php
	include("includes/footer.php");
?>