<?php
	session_start();
	if(!isset($_REQUEST['submit']))
		die("access denied");
	print_r($_REQUEST);
	include("db_connection.php");
	$check_sql = "SELECT p.project_id FROM project_assign p_a INNER JOIN project p ON p_a.project_id = p.project_id INNER JOIN users u ON u.user_id = p_a.user_id WHERE p.project_code = '".$_REQUEST['project_code']."' AND u.user_id = ".$_SESSION['user_id'];
	$result = $conn->query($check_sql);
	if($result->num_rows < 1)
	{
		echo "You are not a part of this covboard.";
		$l = "location:../enter/".$_REQUEST['project_code']."/notuser";
		header($l);

	}
	else
	{
		$sql = "SELECT project_id FROM project WHERE project_code = '".$_REQUEST['project_code']."' AND project_password = '".$_REQUEST['project_password']."'";
		$result = $conn->query($sql);
		if($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();
			$_SESSION['project_id'] = $row['project_id'];
			$_SESSION['project_code'] = $_REQUEST['project_code'];
			$l = "location:../covboard/".$_REQUEST['project_code'];
			echo $l;
			header($l);
		}
		else
		{
			$l = "location:../enter/".$_REQUEST['project_code']."/fail";
			echo $l;
			header($l);
		}
	}
?>