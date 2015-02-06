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

$DB->Query("UPDATE topics SET score = score - 1 WHERE topic = '".$topic."' ");

?>