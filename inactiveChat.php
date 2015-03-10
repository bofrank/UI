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

	$DB->Query("SELECT * FROM topics");

	//$DB->Query("UPDATE topics SET activated='$time'");

	$result = $DB->get();

	for($i=0;$i<count($result);$i++){
		$difference = $time-$result[$i]['activated'];
		$topic = $result[$i]['topic'];

		if($difference<10){
			//echo "true and the difference for ".$topic." is ".$difference."<br>";
		}else{
			//echo "false and the difference for ".$topic." is ".$difference."<br>";
			//$DB->Query("DELETE FROM topics WHERE topic = '$topic'");
			$DB->Query("UPDATE topics SET chatstate = 'inactive' WHERE topic = '".$topic."' ");
		}
	}
	sleep(3);
}

?>