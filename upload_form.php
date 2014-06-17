<?php
/* function to restructure */
$response="";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["file"])) {

function arrayFileOrg($file){   
  $key= count($file["file"]["name"]);  
  $intKey=0;
  $files=array();
  
     while($intKey<$key){
      //echo $file["file"]["name"][$intKey]."<br>";
	//for safe file name
	$name = preg_replace("/[^A-Z0-9._-]/i", "_", $file["file"]["name"][$intKey]);
	$files[$intKey]=array(
	    'name' => $name,
	    'type' => $file["file"]["type"][$intKey],
	    'tmp_name' => $file["file"]["tmp_name"][$intKey],
	    'error' => $file["file"]["error"][$intKey],
	    'size' => $file["file"]["size"][$intKey]
	    );
	 //echo $intKey."<br>";
	 $intKey=$intKey+1;
	}
  return $files;	
  }
     $files =array();
     $files = arrayFileOrg($_FILES);
 foreach($files as $x => $fileNum){
  if ($fileNum["error"] > 0) {
    $response.="Return Code: " . $fileNum["error"].", "; 
    //echo "Return Code: " . $fileNum["error"] . "<br>";
  } else {
    /*echo "Upload: " . $fileNum["name"] . "<br>";*/
    echo"<br>";
    $fileName=preg_replace("/[^A-Z0-9._-]/i", "_",$fileNum["name"]);
    if (file_exists("upload/" . $fileName)) {
    unlink("upload/$fileName");
    //echo $fileNum["name"] . " already exists. and deletd";echo"<br>";
    }// else {
      $success=move_uploaded_file($fileNum["tmp_name"],
      "upload/" . $fileNum["name"]);
      if($success){
      $response="success, ";/*
      echo "Stored in: " . "upload/" . $fileNum["name"];echo"<br>";
      echo"<br>";*/
      }
      else{
      $response="fail, ";
      //echo("Unable to upload");
    }
  //}
 }
}}
?>
<html>
 <head>
 </head>
 <body>
  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" id="myForm" enctype="multipart/form-data" >
   <input type="hidden" value="myForm" name="<?php echo ini_get("session.upload_progress.name"); ?>">
   <input type="file" name="file[]"><br>
   <input type="file" name="file[]"><br>
   <input type="file" name="file[]"><br>
   <input type="file" name="file[]"><br>
   <input type="submit" value="Start Upload"><br>	
   <input type="text" id='demo' /><br>
   <input type="text" id='demo23' value="<?php echo htmlentities($response); ?>"/><br>
   <textarea cols = "75" rows="25" id ="demo1"></textarea>
   <textarea cols = "75" rows="25" id ="demo2"></textarea>
  </form>
  <script type="text/javascript" src="script.js"></script>
 </body>
</html>