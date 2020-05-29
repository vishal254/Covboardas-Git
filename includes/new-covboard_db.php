<?php
	if(!isset($_REQUEST['submit']))
		die("access denied");

	include("db_connection.php");
	include("utility.php");
	function generateCode($string, $wordLimit = 0){
	    $separator = '-';
	    if($wordLimit != 0){
	        $wordArr = explode(' ', $string);
	        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
	    }
	    $quoteSeparator = preg_quote($separator, '#');
	    $trans = array(
	        '&.+?;'                    => '',
	        '[^\w\d _-]'            => '',
	        '\s+'                    => $separator,
	        '('.$quoteSeparator.')+'=> $separator
	    );
	    $string = strip_tags($string);
	    foreach ($trans as $key => $val){
	        $string = preg_replace('#'.$key.'#i', $val, $string);
	    }
	    $string = strtolower($string);
	    return trim(trim($string, $separator));
	}
	$project_code = generateCode($_REQUEST['project']." ".$_REQUEST['creater_id']);
	$sql = "INSERT INTO project(project_name, project_code, project_password, project_deadline, project_description, is_completed, project_progress, creater_id) VALUES('".$_REQUEST['project']."', '$project_code', '".$_REQUEST['password']."', '".$_REQUEST['deadline']."', '".$_REQUEST['description']."', 0, 0, '".$_REQUEST['creater_id']."')";

	$result = $conn->query($sql);
	if($result == 1)
	{
		$project_sql = "SELECT project_id FROM project WHERE project_code = '".$project_code."' AND creater_id = ".$_REQUEST['creater_id'];
		$result = $conn->query($project_sql);
		if($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();
			$assign_sql = "INSERT INTO project_assign(user_id, project_id) VALUES(".$_REQUEST['creater_id'].", ".$row['project_id'].")";
			if($conn->query($assign_sql))
			{
				$cov = "location:../covboard/".$project_code;
				$path = "../projects/".$project_code;
				if(mkdir($path))
				{
					$d_sql = "INSERT INTO directories(d_name, project_id) VALUES('".$project_code."', ".$row['project_id'].")";
					$conn->query($d_sql);
				}

				header($cov);
			}
			else
			{
				header("location:../new-covboard.php?status=fail");
			}
			
		}
		
	}
	else
	{
		header("location:../new-covboard.php?status=fail");
	}
?>