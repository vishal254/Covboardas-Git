<?php
	session_start();
	echo "<pre>";
	print_r($_REQUEST);
	print_r($_SESSION);
	if(!isset($_REQUEST['submit']))
		die("access denied");
	include("utility.php");
	include("db_connection.php");
	$sql = "SELECT project_id FROM project WHERE project_code = '".$_REQUEST['project_code']."' AND project_password = '".$_REQUEST['project_password']."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$check_sql = "SELECT p_assign_id FROM project_assign WHERE project_id = ".$row['project_id']." AND user_id = ".$_SESSION['user_id'];
		$result = $conn->query($check_sql);
		if($result->num_rows > 0)
		{
			$l = "location:".baseurl()."/covboard/".$_REQUEST['project_code'];
			header($l);
		}
		else
		{
			$insert_sql = "INSERT INTO project_assign(project_id, user_id) VALUES(".$row['project_id'].", ".$_SESSION['user_id'].")";
			$insert_result = $conn->query($insert_sql);
			$_SESSION['project_id'] = $row['project_id'];
			if($insert_result)
			{
				$l = "location:".baseurl()."/covboard/".$_REQUEST['project_code']."/success";
				header($l);
			}
			else
			{
				$l = "location:".baseurl()."/join-covboard/".$_REQUEST['project_code']."/fail";
				header($l);
			}
		}
	}
	else
	{
		$l = "location:".baseurl()."/join-covboard/".$_REQUEST['project_code']."/invalid";
		header($l);
	}

?>