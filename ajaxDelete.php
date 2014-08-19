<?php

include "config.php"; 

$id = $_POST['id'];

$DB->Query("DELETE FROM messages WHERE id = '$id'");

?>