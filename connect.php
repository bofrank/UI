<?php

include("mysqli.class.php"); 

/*
include("mysqli.class.php"); 

$DBServer = '54.68.58.129'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'root';
$DBPass   = 'hamburg3r!';
$DBName   = 'topicb';

echo "vars set"; 

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
 
echo "conn=$conn"; 

// check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
*/
/*
echo "start<br><br>";

$username = "root";
$password = "hamburg3r!";
$hostname = "127.0.0.1"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
  
echo "Connected to MySQL<br><br>";

echo "end<br><br>";
*/
echo "start<br><br>";

$username = "root";
$password = "hamburg3r!";
$hostname = "127.0.0.1"; 

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

// Then simply connect to your DB this way:
$DB = new DB($config);


$DB->Query("SELECT * FROM topicb.topics");

$result = $DB->get();

$dataFormated = array();

for($i=0;$i<count($result);$i+=3){

    $dataFormated[$i]['tapid'] = $result[$i]['tapid'];
    $dataFormated[$i]['topics']=array();

    for($j=$i;$j<$i+3;$j++){            
        $dataFormated[$i]['topics'][$j]['topic'] = $result[$j]['topic'];
        $dataFormated[$i]['topics'][$j]['category'] = $result[$j]['category'];
    }

    $dataFormated[$i]['state'] = $result[$i]['state'];


}

echo json_encode(fix_keys($dataFormated));

function fix_keys($array) {
    $numberCheck = false;
    foreach ($array as $k => $val) {
        if (is_array($val)){
            $array[$k] = fix_keys($val); //recurse
        }
        if(is_numeric($k)){
            $numberCheck = true;
        }
    }
    if($numberCheck === true){
        return array_values($array);
    } else {
        return $array;
    }
}


?>