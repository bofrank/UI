<?php

include "config.php"; 

$tapid = $_GET['tapid'];
$state = $_GET['state'];

$DB->Query("UPDATE topics SET state = '$state' WHERE tapid = '$tapid'");

?>