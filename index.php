<?php
	include("includes/utility.php");
	include("includes/headers.php");
	include("includes/navbar.php");
?>	
<div class="row">
	<div class="col-12">
		<div class="jumbotron p-5 text-white jumbotron-fluid"  style="background: url('<?=baseurl()?>/assets/img/bg.jpg'); background-size: cover;">
		    <h1 class="display-4 mt-5"><b>CovBoard</b></h1>
		    <p class="lead mb-5">
		    	The simplest way to work remotely on a project
		    </p>
		</div>
	</div>
	<div class="col-12 mt-3 mb-3">
		<h1 class="text-center" style="font-family: Arial; font-weight: bolder;">Key Features</h1>
		<p class="text-center pl-5 pr-5" style="font-size: 20px;">We’ve got you completely covered, mobile, web and chrome extension. You don't need anything else to work remotely now. Develop projects together, right from home</p>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4 text-center p-5">
				<img src="<?=baseurl()?>/assets/img/icon1.png">
				<h5 class="mt-3">Work on multiple projects</h5>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4 text-center p-5">
				<img src="<?=baseurl()?>/assets/img/icon2.png">
				<h5 class="mt-3">Break project into sub tasks</h5>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4 text-center p-5">
				<img src="<?=baseurl()?>/assets/img/icon3.png">
				<h5 class="mt-3">Create your project team</h5>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4 text-center p-5">
				<img src="<?=baseurl()?>/assets/img/icon4.png">
				<h5 class="mt-3">Control task access</h5>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4 text-center p-5">
				<img src="<?=baseurl()?>/assets/img/icon5.png">
				<h5 class="mt-3">Assign tasks to project mates</h5>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-4 text-center p-5">
				<img src="<?=baseurl()?>/assets/img/icon6.png">
				<h5 class="mt-3">See progress for each task</h5>
			</div>
		</div>
	</div>
	<div class="dashboard-section col-12 pt-5 pl-5">
		<div class="row">
			<div class="col-sm-12 col-md-9 pb-5">
				<h2 class="pt-5">Can't wait enough to see your dashboard ?</h2>
				<p class="pt-5">
					Well you don't need to wait that long, just open your dashboard now and see the list of all the covboards (projects) avilable. You can open any covboard and simply start working upon your expected task. It's that simple.<br/>
					Dashboard is the place to find the list of all the available covbaords of which you are a part of.
					Open any covboard from there and login into it and start contributing to that covboard.
				</p>
				<p class="move"><b>Visit dashboard now <a href="<?=baseurl()?>/dashboard.php">Click here</a></b> </p>
			</div>
			<div class="col-sm-12 pb-5 col-md-3" style="background-image: url('<?=baseurl()?>/assets/img/dashboard.png'); background-repeat: no-repeat; background-size: 40vh; background-position: 60% 2px; min-height: 200px;">
				
			</div>
		</div>
	</div>
	<!-- <div class="col-12 p-5 text-center">
		<hr>
		<h3 class="mt-5">Let's get you on board !</h3>
		<p class="mt-2">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<a href="<?=baseurl()?>/login.php"><h2 style="display: inline-block;">Login</h2></a> and start developing now
	</div> -->
	<div class="col-12 p-5 electron-bg text-center" style="background: url('<?=baseurl()?>/assets/img/pattern2.png');">
		<h3 class="mt-5 pl-5 pr-5 pt-5"><kbd>How to work?</kbd></h3>
		<div class="pt-5 pb-5">
			<h2 style="font-family: helvetica; letter-spacing: 2px; word-spacing: 7px;">Join your remote projects using "project code"</h2>
			<i>Enter credentials and join, yes it is just that simple </i>
			<a href="<?=baseurl()?>/join-covboard.php">Try it now</a>
		</div>
		<!-- <hr>
		<h3 class="mt-5 pl-5 pr-5 pt-5"><kbd>Communication?</kbd></h3>
		<div class="pt-5 pb-5">
			<h2 style="font-family: helvetica; letter-spacing: 2px; word-spacing: 7px;">We got you covered!</h2>
			<i>In your task or project section, submit comments whenever you want </i>
			<a href="<?=baseurl()?>/join-covboard.php">Click here</a>
		</div> -->
	</div>
	<!-- sign up section starts -->
	<div class="col-sm-12 col-md-3 dashboard-section" style="background-image: url('<?=baseurl()?>/assets/img/customer.png'); background-repeat: no-repeat; background-size: 14vw; background-position: 50% 42px; min-height: 200px;">
	</div>
	<div class="col-sm-12 dashboard-section col-md-9 p-md-4 pb-5">
		<h2 class="text-right pr-5 pt-4">What? you don't have an account :( </h2>
		<p class="pt-5 text-right pr-5 pl-5">
			Just enter your email and password to create a new covboard account and get access to all the exciting features. Nothing can be that simple!
		</p>
		<p class="text-right pr-5 pl-5"><b><a href="<?=baseurl()?>/sign-up.php">Sign up now</a></b> </p>
	</div>
	<!-- sign-up section ends -->
	<div class="col-12 p-5 electron-bg text-center" style="background: url('<?=baseurl()?>/assets/img/pattern2.png');">
		<h3 class="mt-5 pl-5 pr-5 pt-5"><kbd>Let's begin?</kbd></h3>
		<div class="pt-5 pb-5">
			<h2 style="font-family: helvetica; letter-spacing: 2px; word-spacing: 7px;">Let's start by creating a new covboard</h2>
			<i>Create a brand new covboard and ask your project mates to join </i>
			<a href="<?=baseurl()?>/new-covboard.php">Create new</a>
		</div>
		<!-- <hr>
		<h3 class="mt-5 pl-5 pr-5 pt-5"><kbd>Communication?</kbd></h3>
		<div class="pt-5 pb-5">
			<h2 style="font-family: helvetica; letter-spacing: 2px; word-spacing: 7px;">We got you covered!</h2>
			<i>In your task or project section, submit comments whenever you want </i>
			<a href="<?=baseurl()?>/join-covboard.php">Click here</a>
		</div> -->
	</div>
</div>
<?php
	include("includes/footer.php");
?>