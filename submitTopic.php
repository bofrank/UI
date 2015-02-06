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
$tapid = $_GET["tapid"];
$score = $_GET["score"];
$image = $_GET["image"];

if($image = undefined){
	$image = "http://topicb.com/images/blank.jpg";
}


//get existing topics
$DB->Query("SELECT * FROM topicb.topics");

$result = $DB->get();

$counter = 0;

for($i=0;$i<count($result);$i++){

  if ($topic == $result[$i]['topic']){
  	echo "topic exists";
  	$counter++;
  }
	
}

if($counter == 0){

	$DB->Query("INSERT INTO topics (topic,tapid,score,image) VALUES('$topic','$tapid','$score','$image')");
	echo "topic created = ".$topic;

}



?>