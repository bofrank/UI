<?php

include("mysqli.class.php"); 
include("data.php");

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

for ($i=0; $i <= 10; $i++) {	
	//$time = $_GET["time"];
	$time = time();

	$DB->Query("UPDATE tc SET updated='$time'");

	$DB->Query("SELECT * FROM tc");

	$result = $DB->get();

	for($i=0;$i<count($result);$i++){
		$difference = $result[$i]['updated']-$result[$i]['created'];
		$tapid = $result[$i]['tapid'];

		if($difference<10){
			echo "true and the difference for ".$tapid." is ".$difference."<br>";
		}else{
			echo "false and the difference for ".$tapid." is ".$difference."<br>";
			$DB->Query("DELETE FROM topics WHERE tapid = '$tapid'");
			$DB->Query("DELETE FROM tc WHERE tapid = '$tapid'");
		}
	}
	sleep(3);
}

?>