<?php

session_start();
 
$key = ini_get("session.upload_progress.prefix") . "myForm";
if (!empty($_SESSION[$key])) {
    $current = $_SESSION[$key]["bytes_processed"];
    $total = $_SESSION[$key]["content_length"];
    //echo $current < $total ? ceil($current / $total * 100) : 100;
    print_r ($_SESSION[$key]);
}
else {
    echo 100;
}

?>