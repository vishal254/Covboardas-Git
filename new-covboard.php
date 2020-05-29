<?php
	include("includes/utility.php");
	include("includes/headers.php");
	include("includes/navbar.php");
	if(isset($_REQUEST['status']))
	{
		if($_REQUEST['status'] == 'success')
		{
			?>
			<script>
				alert("Failed to create your Covboard, please try again");
			</script>
			<?php
		}
	}
?>
<div style="background: url('<?=baseurl()?>/assets/img/new-board-2.png'); background-size: 50%; background-position:90% 60%; background-repeat: no-repeat;" class="row">
	<h3 class="col-12 text-center mt-5">
		Wohoo! You are making a new covboard !
	</h3>
	<?php if(!isset($_SESSION['user_id'])){
		?>
			<div class="col-12 text-danger mt-3 text-center"><h6>( To make a covboard you need to be <a href="<?=baseurl()?>/login.php">Logged in</a> )</h6></div>
		<?php
	}?>
	<div class="col-md-5" style="padding-top: 50px;">
		<form class="pt-4 pb-5 pr-5 pl-5" method="POST" action="includes/new-covboard_db.php">
			<fieldset <?php if(!isset($_SESSION['user_id'])){ echo "disabled"; }?>>
				<div class="form-group">
				    <label>Covboard Name *</label>
				    <input type="text" name="project" class="form-control" required>
			  	</div>
			  	<?php
			  		if(isset($_SESSION['user_id']))
			  		{
			  			?>
			  			<input type="hidden" name="creater_id" value="<?=$_SESSION['user_id']?>">
			  			<?php
			  		}
			  	?>
			  	<div class="form-group">
				    <label>Description *</label>
				    <textarea name="description" rows="4" class="form-control bg-transparent" placeholder="This project is to...."></textarea>
			  	</div>
			  	<div class="form-group">
				    <label>Project Deadline *</label>
					<input type="date" name="deadline" class="form-control">
			  	</div>
			  	
			  	<div class="row">
				  	<div class="form-group col-sm-12">
					    <label>Covboard Password *</label>
					    <input type="password" name="password" class="form-control" required>
				  	</div>
			  	</div>
			  	<div>
				  	<small>Field marked <kbd>*</kbd> are required</small>
			  	</div>
			  <input type="submit" class="btn mt-4 btn-outline-dark" name="submit" value="Create covboard now"/>
			</fieldset>
		</form>
	</div>
</div>
<?php
	include("includes/footer.php");
?>