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
		if(isset($_SESSION['project_id']))
		{
			if(isset($_REQUEST['status']))
			{
				if($_REQUEST['status'] == 'fail')
				{
					?>
					<script>
						alert("Unable to create your task right now");
					</script>
					<?php
				}
			}
			?>
			<div class="row p-5" style="background: #a5cecd!important;">
				<h5 class="col-12 mt-3 text-center">It's cool to break project into subtasks :)</h5>
				<div class="col-sm-4 mt-2 bg-white shadow-md rounded offset-md-4 pt-4">

					<form class="p-5" method="POST" action="<?=baseurl()?>/includes/create_task_db.php">
						<p>Project code: <code><?=$_SESSION['project_code']?></code></p>
						<div class="form-group">
						    <label>Task name</label>
						    <input type="text" name="task_name" class="form-control" required>
					  	</div>
					  	<div class="form-group">
						    <label>Task Description</label>
						    <input type="text" name="task_description" class="form-control" required>
					  	</div>
					  	<div class="form-group text-secondary" id="password-field" style="display: none;">
						    <input type="password" name="project_password" class="form-control" placeholder="Password">&#128274;
					  	</div>
					  	<div class="form-group">
						    <input type="checkbox" name="check" value="1" id="myCheck" onclick="myFunction()">
						    <label>&nbsp;&nbsp;&nbsp;Set password for task</label>
					  	</div>
						<div class="form-group text-center">
						  <input type="submit" class="btn btn-primary" name="submit" value="Create Task"/>
						</div>
					</form>
				</div>
			</div>
			<script>
				function myFunction() {
					var checkBox = document.getElementById("myCheck");
					
					var text = document.getElementById("password-field");
				  	if (checkBox.checked == true){
						text.style.display = "block";
				  	} else {
				    	text.style.display = "none";
				  	}
				}
			</script>
			<?php
		}
	}
?>