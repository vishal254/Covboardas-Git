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
	$sql = "INSERT INTO project_comments(project_id, user_id, user_comment, c_date) VALUES(".$_SESSION['project_id'].", ".$_SESSION['user_id'].", '".$comment."', '".$date."')";
	echo $sql;
	if($conn->query($sql))
	{
		$l = "location:".baseurl()."/covboard/".$_SESSION['project_code']."/success";
	}
	else
	{
		$l = "location:".baseurl()."/covboard/".$_SESSION['project_code']."/fail";
	}
	echo $l;
	header($l);
?>