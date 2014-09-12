<?php

include "configChat.php"; 

$id = $_POST['id'];

$DB->Query("DELETE FROM messages WHERE id = '$id'");

?>