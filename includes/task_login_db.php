<?php
	if(!isset($_REQUEST['submit']))
		die("access denied");
	else
	{
		include("db_connection.php");

		session_start();
		$sql = "SELECT * FROM task WHERE task_id = ".$_REQUEST['task_id']." AND task_password = '".$_REQUEST['password']."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			$_SESSION['task_id'] = $_REQUEST['task_id'];
			$l = "location:../task/".$_REQUEST['task_id'];
			header($l);
		}
		else
		{
			$l = "location:../task-login/".$_REQUEST['task_id']."/fail";
			header($l);
		}
	}

?>