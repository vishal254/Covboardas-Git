<?php 
session_start();
include("includes/utility.php");
include("includes/db_connection.php");
if(!isset($_REQUEST['project_code']))
  die("access denied");
$sql = "SELECT d.d_name FROM directories d INNER JOIN project p ON p.project_id = d.project_id WHERE p.project_code = '".$_REQUEST['project_code']."'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
  // Create zip
  function createZip($zip,$dir){
    if (is_dir($dir)){

      if ($dh = opendir($dir)){
       while (($file = readdir($dh)) !== false){
         
         // If file
         if (is_file($dir.$file)) {
          if($file != '' && $file != '.' && $file != '..'){
           
           $zip->addFile($dir.$file);
         }
       }else{
            // If directory
        if(is_dir($dir.$file) ){

          if($file != '' && $file != '.' && $file != '..'){

                // Add empty directory
            $zip->addEmptyDir($dir.$file);

            $folder = $dir.$file.'/';
            
                // Read data of the folder
            createZip($zip,$folder);
          }
        }
        
      }
      
    }
    closedir($dh);
  }
}
}

  $row = $result->fetch_assoc();
  $zip = new ZipArchive();
  $filename = "./".$row['d_name'].".zip";
  echo $filename;

  if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
  }

  $dir = 'projects/'.$row['d_name']."/";

  // Create zip
  createZip($zip,$dir);

  $zip->close();




// Download Created Zip file

$filename = $row['d_name'].".zip";

if (file_exists($filename)) {
  echo "file toh h";
 header('Content-Type: application/zip');
 header('Content-Disposition: attachment; filename="'.basename($filename).'"');
 header('Content-Length: ' . filesize($filename));

 flush();
 readfile($filename);
     // delete file
 unlink($filename);
 
}  
}