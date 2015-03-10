<?php

include("mysqli.class.php"); 
include("data.php");

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

$state = $_GET["state"];
$topic = $_GET["topic"];
$time = $_GET["time"];

//get existing topics
$DB->Query("SELECT * FROM topicb.topics");

$result = $DB->get();

$DB->Query("UPDATE topics SET chatstate = '".$state."' WHERE topic = '".$topic."' ");
$DB->Query("UPDATE topics SET activated = '".$time."' WHERE topic = '".$topic."' ");

//send mail to my phone saying someone is chatting
file_get_contents("http://bofrank.com/sendMessage.php?message=".$topic);

?>