<?php

include("mysqli.class.php"); 
include("data.php");

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

$json = file_get_contents('php://input');
//$json = '{"topic1":"apple"}';
$obj = json_decode($json);
$topic1 = $obj->{topic1};
$topic2 = $obj->{topic2};
$topic3 = $obj->{topic3};
$myConnection = $obj->{myID};

if($topic1){
	$DB->Query("INSERT INTO topics(topic,tapid,chatstate) VALUES('$topic1','$myConnection','available')");
}else{
	$DB->Query("INSERT INTO topics(topic,tapid,chatstate) VALUES('blank','$myConnection','available')");
}
if($topic2){
	$DB->Query("INSERT INTO topics(topic,tapid,chatstate) VALUES('$topic2','$myConnection','available')");
}else{
	$DB->Query("INSERT INTO topics(topic,tapid,chatstate) VALUES('blank','$myConnection','available')");
}
if($topic3){
	$DB->Query("INSERT INTO topics(topic,tapid,chatstate) VALUES('$topic3','$myConnection','available')");
}else{
	$DB->Query("INSERT INTO topics(topic,tapid,chatstate) VALUES('blank','$myConnection','available')");
}

echo "posted $topic1";

?>