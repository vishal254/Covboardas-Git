<?php
	include("includes/utility.php");
	include("includes/headers.php");
	include("includes/navbar.php");
	if(isset($_REQUEST['status']))
	{
		if($_REQUEST['status'] == 'fail')
		{
			?>
			<script>
				alert("Invalid email or password");
			</script>
			<?php
		}
		if($_REQUEST['status'] == 'success')
		{
			?>
			<script>
				alert("Account created, login to continue");
			</script>
			<?php
		}
	}
?>
<div style="background: #c9d6ff; background: -webkit-linear-gradient(to right, #c9d6ff, #e2e2e2);background: linear-gradient(to right, #c9d6ff, #e2e2e2);" class="row p-5">

	<div class="col-md-5" style="padding-top: 50px;">
		<h4 class="text-center text-secondary">Let's get you log in!</h4>
		<form class="pt-4 pb-5 pr-5 pl-5" method="POST" action="includes/login_db.php">
			<div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
		  	</div>
		  	<div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
		  	</div>
		  	<div class="mb-3">
			  <small>Not on covboard? <a href="<?=baseurl()?>/sign-up.php">Join now</a></small>
			</div>
		  <input type="submit" class="btn btn-primary" name="submit" value="Login Now"/>
		</form>
	</div>
	<div class="col-md-7" style="background: url('<?=baseurl()?>/assets/img/log-in.png'); background-position: 70%; background-repeat: no-repeat; background-size: 55%;">
		
	</div>
</div>
<?php
	include("includes/footer.php");
?>