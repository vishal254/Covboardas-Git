<?php
	if(!isset($_REQUEST['submit']))
		die("access denied");
	session_start();
	include("db_connection.php");
	include("utility.php");
	echo "<pre>";
	print_r($_REQUEST);
	print_r($_SESSION);

	date_default_timezone_set('Asia/Kolkata');

	// get the current time  
	$date = date('Y-m-d H:i:s');
	$comment = $conn->real_escape_string($_REQUEST['comment']);
	$sql = "INSERT INTO comments(project_id, task_id, user_id, user_comment, c_date) VALUES(".$_SESSION['project_id'].", ".$_SESSION['task_id'].", ".$_SESSION['user_id'].", '".$comment."', '".$date."')";
	if($conn->query($sql))
	{
		$sql = "UPDATE task SET task_progress = '".$_REQUEST['task_progress']."' WHERE task_id = ".$_SESSION['task_id'];
		if($conn->query($sql))
			$l = "location:".baseurl()."/task/".$_SESSION['task_id']."/success";
		else
			$l = "location:".baseurl()."/task/".$_SESSION['task_id']."/fail";
	}
	else
	{
		$l = "location:".baseurl()."/task/".$_SESSION['task_id']."/fail";
	}
	header($l);



?>