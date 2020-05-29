<body>
	<nav class="navbar navbar-expand-lg sticky-top navbar-height navbar-light shadow bg-white">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?=baseurl();?>/">
				<img src="<?=baseurl();?>/assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
				<b>Covboard</b>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content: flex-end;">
				<ul class="navbar-nav right-menu">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							More
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?=baseurl()?>/sign-up.php" style="cursor: pointer;">Sign up</a>
							<?php
								if(isset($_SESSION['user_id']))
								{
									?>
										<a class="dropdown-item" href="<?=baseurl()?>/includes/logout_db.php" style="cursor: pointer;">Logout</a>
									<?php
								}
							?>
						</div>
						
					</li>
					<li class="nav-item">
						<a class="nav-link" title="start working remotely on project using project code" href="<?=baseurl()?>/join-covboard.php">Join project</a>
					</li>
					<?php
						if(isset($_SESSION['user_id']))
						{
							?>
								<li class="nav-item">
									<a class="nav-link" href="#"><?=$_SESSION['user_name']?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?=baseurl()?>/dashboard.php">Dashboard</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?=baseurl()?>/new-covboard.php">New covboard &#10010;
									</a>
								</li>
							<?php
						}
						else
						{
							?>
								<li class="nav-item">
									<a class="nav-link" href="<?=baseurl()?>/login.php">Log in</a>
								</li>
							<?php
						}
					?>
				</ul>
			</div>
		</div>
	</nav>