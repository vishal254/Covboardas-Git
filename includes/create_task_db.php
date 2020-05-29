<?php
	session_start();
	if(!isset($_REQUEST['submit']))
		die("access denied");
	else
	{
		echo "<pre>";
		include("db_connection.php");
		if(isset($_REQUEST['check']))
			$sql = "INSERT INTO task(task_name, task_description, is_private, task_password) VALUES('".$_REQUEST['task_name']."', '".$_REQUEST['task_description']."', 1, '".$_REQUEST['project_password']."')";
		else
			$sql = "INSERT INTO task(task_name, task_description) VALUES('".$_REQUEST['task_name']."', '".$_REQUEST['task_description']."')";
		$result = $conn->query($sql);
		if($result == 1)
		{
			$sql = "SELECT task_id, task_name FROM task WHERE task_name = '".$_REQUEST['task_name']."' AND task_description = '".$_REQUEST['task_description']."'";
			echo $sql;
			$result = $conn->query($sql);
			if($result->num_rows == 1)
			{
				$row = $result->fetch_assoc();
				$sql = "INSERT INTO project_task_list(project_id, task_id) VALUES(".$_SESSION['project_id'].", ".$row['task_id'].")";
				echo $sql;
				$result = $conn->query($sql);
				if($result == 1)
				{
					$path = "../projects/".$_SESSION['project_code']."/".$row['task_name'];
					echo $path;
					if(mkdir($path))
					{
						$d_sql = "INSERT INTO sub_directories(sub_d_name, task_id, project_id) VALUES('".$row['task_name']."', ".$row['task_id'].", ".$_SESSION['project_id'].")";
						echo $d_sql;
						$conn->query($d_sql);
					}
					$l = "location:../covboard/".$_SESSION['project_code']."?status=success";
					header($l);
				}
				else
				{
					header("location:../create-task.php?status=fail");
				}

			}
			else
			{
				header("location:../create-task.php?status=fail");
			}
		}
		else
		{
			header("location:../create-task.php?status=fail");
		}
	}
?>