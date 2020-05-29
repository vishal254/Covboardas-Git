<?php

	include("db_connection.php");
	$sql_check = "SELECT * FROM task_assign WHERE task_id = ".$_REQUEST['task_id']." AND user_id = ".$_REQUEST['user_id'];
	$result = $conn->query($sql_check);
	if($result->num_rows > 0)
	{
		echo "This task is already assigned to the user";
	}
	else
	{
		$sql = "INSERT INTO task_assign(task_id, user_id) VALUES(".$_REQUEST['task_id'].", ".$_REQUEST['user_id'].")";
		$result = $conn->query($sql);
		if($result)
		{
			echo "Task assigned successfully";
		}
		else
			echo "Failed to assign task right now, try again later";

	}
	

?>