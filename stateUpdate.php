<?php

include("mysqli.class.php"); 
include("data.php");

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

$topic = $_GET["topic"];
$state = $_GET["state"];

$DB->Query("UPDATE topics SET state = '$state' WHERE topic = '$topic'");

?>