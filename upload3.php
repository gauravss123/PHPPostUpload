<?php

function errorDescript($errno){
switch ($errno){
  case 0:
      return " Upload successfull";
  case 1:
      return " The file size is greater than the allowed limit";
  case 2:
      return " The file size is greater than the allowed limit";
  case 3:
      return " Only partial upload could be completed";
  case 4:
      return " No file uploaded";
  case 6:
      return " Temporary storage location missing";
  case 7:
      return " Could not write to disk";
  case 8:
      return " File upload stopped by a php extension";
  }
}

function fileUploadStat($key){   
$count=count($_SESSION[$key]["files"]);
$response="";
$current = $_SESSION[$key]["bytes_processed"];
$total = $_SESSION[$key]["content_length"];
$progress=$current < $total ? ceil($current / $total * 100) : 100;
$fileNo=0;
if($fileNo<$count){
  for($i=$fileNo;$i<$count;$i++){
    if($_SESSION[$key]["files"][$i]["done"]==1){
      $error=$_SESSION[$key]["files"][$i]["error"];
      $response.=$_SESSION[$key]["files"][$i]["name"].errorDescript($error).",";
      ++$_SESSION['fileTransfer'];
    }
  }
}
$response=$progress.",".$response;
$_SESSION['fileTransferStat']=$response;
return $response;
}
  
session_start();
$key = ini_get("session.upload_progress.prefix") . "myForm";
if (!empty($_SESSION[$key])) {
  $response=fileUploadStat($key);
  echo $response;
}
else
  echo ('candyman');

?>