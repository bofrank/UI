<?php

include "config.php"; 

//use this if post is JSON
//$json = $_POST['myTopics'];


$json = file_get_contents('php://input');
//$json = '{"topic1":"apple"}';
$obj = json_decode($json);
$topic1 = $obj->{topic1};
$topic2 = $obj->{topic2};
$topic3 = $obj->{topic3};
$myConnection = $obj->{myID};

if($topic1){
	$DB->Query("INSERT INTO topics(topic,connection) VALUES('$topic1','$myConnection')");
}
if($topic2){
	$DB->Query("INSERT INTO topics(topic,connection) VALUES('$topic2','$myConnection')");
}
if($topic3){
	$DB->Query("INSERT INTO topics(topic,connection) VALUES('$topic3','$myConnection')");
}

echo "posted $topic1";

?>