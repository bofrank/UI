<?php

include "configChat.php"; 

$message = $_POST["messages"];
$color = $_POST["color"];

$DB->Query("INSERT INTO messages(message, color) VALUES('$message','$color')");

echo $message;

?>