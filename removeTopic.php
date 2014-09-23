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

//$DB->Query("DELETE FROM topics WHERE topic = '$topic'");
$DB->Query("UPDATE topicb.topics SET chatstate='available' WHERE topic='$topic'");

?>