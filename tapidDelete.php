<?php

include "config.php"; 

$id = $_GET['tapid'];

$DB->Query("DELETE FROM topics WHERE tapid = '$tapid'");

?>