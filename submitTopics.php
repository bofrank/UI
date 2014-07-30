<?php

include "config.php"; 

//use this if post is JSON
//$json = $_POST['myTopics'];


$json = file_get_contents('php://input');
//$json = '{"topic1":"apple"}';
$obj = json_decode($json);
$topic1 = $obj->{topic1};

$DB->Query("INSERT INTO topics(topic) VALUES('$topic1')");

echo "posted $topic1";

?>