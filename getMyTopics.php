<?php

include("mysqli.class.php"); 
include("data.php");

$tapid = $_GET["t"];

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

$DB->Query("SELECT * FROM topics WHERE tapid='$tapid'");

$result = $DB->get();

$resultJSON = json_encode($result);

$dataFormated = array();

for($i=0;$i<count($result);$i++){
           
    $dataFormated[$i]['chatstate'] = $result[$i]['chatstate'];

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