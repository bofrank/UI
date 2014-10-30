<?php

include("mysqli.class.php"); 
include("data.php");

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

$tapid = $_GET["tapid"];
$time = $_GET["time"];

$DB->Query("UPDATE tc SET created='$time' WHERE tapid='$tapid'");

?>