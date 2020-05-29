<?php
	session_start();
	print_r($_REQUEST);
	print_r($_FILES);
	if(!isset($_REQUEST['submit']))
	{
		die("access denied");
	}
	include("db_connection.php");
	$sql = "SELECT d.d_name, sub_d_name FROM directories d INNER JOIN sub_directories s_d ON s_d.project_id = d.project_id WHERE s_d.project_id = ".$_SESSION['project_id']." AND s_d.task_id = ".$_SESSION['task_id'];
	echo "<pre>";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$location = "../projects/".$row['d_name']."/".$row['sub_d_name']."/".$_FILES['file']['name'];
	echo $location;
	$res = move_uploaded_file($_FILES['file']['tmp_name'] , $location);
	if($res)
	{
		$l = "location:../task/".$_SESSION['task_id']."/success";
		header($l);
	}
	else
	{
		$l = "location:../task/".$_SESSION['task_id']."/fail";
		header($l);
	}

	

?>