<?php

include "config.php"; 

$tapid = $_GET['tapid'];

$DB->Query("DELETE FROM topics WHERE tapid = '$tapid'");

?>