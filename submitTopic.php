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
$ip = $_GET["ip"];

if($image == undefined){
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

	$url = 'https://api.monkeylearn.com/api/v1/categorizer/cl_5icAVzKR/classify_text/';
	$data = array('text' => $topic);

	$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n".
            "Authorization:token 825fe2c297e090d8c2b73a5adf0e17ee01a59b02\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$json_output = json_decode(trim($result),TRUE);

	$category = $json_output['result'][0]['label'];

	$DB->Query("INSERT INTO topics (topic,tapid,category,score,image,ip) VALUES('$topic','$tapid','$category','$score','$image','$ip')");
	echo "topic created = ".$topic;

}



?>