<?php 
include("utility.php"); 
error_reporting(0);
include("db_connection.php");
session_start();
$sql = "SELECT d.d_name, sub_d_name FROM directories d INNER JOIN sub_directories s_d ON s_d.project_id = d.project_id WHERE s_d.project_id = ".$_SESSION['project_id']." AND s_d.task_id = ".$_SESSION['task_id'];
$result = $conn->query($sql);
if($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	$path = "../projects/".$row['d_name']."/".$row['sub_d_name'];
	?>
	<div id="container" class="text-center table-responsive">
		<table class="sortable table table-striped" style="height: 50vh!important; overflow-y: scroll;">
			<thead>
				<tr>
					<th>#</th>
					<th>Filename</th>
					<th>Type</th>
				</tr>
			</thead>
			<tbody>
				<?php
		        // Opens directory
				$myDirectory=opendir($path);

		        // Gets each entry
				while($entryName=readdir($myDirectory)) {
					$dirArray[]=$entryName;
				}

		        // Finds extensions of files
				function findexts ($filename) {
					$filename=strtolower($filename);
					$exts=explode('.', $filename);
					if(count($exts) == 1)
					{
						return "&lt;directory&gt;";
					}
					$n=count($exts)-1;
					$exts=$exts[$n];
					return $exts;
				}

		        // Closes directory
				closedir($myDirectory);

		        // Counts elements in array
				$indexCount=count($dirArray);

		  //       // Sorts files
				// sort($dirArray);

		        // Loops through the array of files
				for($index=0; $index < $indexCount; $index++) {

		          // Allows ./?hidden to show hidden files
					if($_SERVER['QUERY_STRING']=="hidden")
						{$hide="";
					$ahref="./";
					$atext="Hide";}
					else
						{$hide=".";
					$ahref="./?hidden";
					$atext="Show";}
					if(substr("$dirArray[$index]", 0, 1) != $hide) {

		          // Gets File Names
						$name=$dirArray[$index];
						$namehref=$dirArray[$index];

		          // Gets Extensions 
						$extn=findexts($dirArray[$index]); 

		          // Separates directories
						if(is_dir($path.$dirArray[$index])) {
							$extn="&lt;Directory&gt;"; 
							$size="&lt;Directory&gt;"; 
							$class="dir";
						} else {
							$class="file";
						}

		          // Cleans up . and .. directories 
						if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
						if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}

		          // Print 'em
						echo("
							<tr class='$class'>
							<td>$index</td>
							<td><a href='$path/$namehref' target='_blank'>$name</a></td>
							<td><a href='$path/$namehref' target='_blank'>$extn</a></td>
							</tr>");
					}
				}
				?>
			</tbody>
		</table>		    
	</div>
	<?php
}
else
{
	echo "Failed to load";
}

?>