<?php

include("mysqli.class.php"); 

$username = "root";
$password = "hamburg3r!";
$hostname = "127.0.0.1"; 

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

$DB->Query("SELECT * FROM topicb.topics");

$result = $DB->get();
//echo "<br><br>array values = ";

//print_r(array_values($result1));
//echo "<br><br>result length is = ".count($result);
//echo "<br><br>result[0][tapid]= ".$result[0]['tapid'];
$resultJSON = json_encode($result);
//echo "<br><br>json result = ".$resultJSON;

$dataFormated = array();

for($i=0;$i<count($result);$i++){

           
        $dataFormated[$i]['topic'] = $result[$i]['topic'];
    


}

//$result[$i]['topic'];
/*
$dataFormatedArray = array_values($dataFormated);
echo "<br><br><br>array_values= ";
echo $dataFormatedArray;
*/
//echo "<br><br><br>json_encode= ";
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

//echo "<br><br>result2[0]= ".$result2[0];

//echo "<br><br>result2[0][tapid]= ".$result2[0]['tapid'];
/*
$i=0;

$rows = array();
$rows[$i]["tapid"] = $r[0];
echo "<br><br>first value is = ".$rows[0]["tapid"];
*/

//store processed query results in array
/*
$rows = array();
//$r=$DB->get();
//fetch first result to initialize process
if($r = mysql_fetch_array($DB->get())){
    //Holds value of current tapid we are considering
    $current = $r[0];
    echo "first row is ".$current ."<br>";
    $rows[$i]["tapid"] = $r[0];
        //nested array
    $rows[$i]["topics"] = array(array(
        "topic" => $r[1],
        "status" => $r[2],
        "category" => $r[3]
    ));
//}
//Iterate through rest of the returned rows

while($r = mysql_fetch_array($DB->get())){
    //increment if we encounter a new tapid value
    
    if($current != $r[0]){
        echo "i=".$i."<br>";
        $i++;
            $current = $r[0];
        $rows[$i]["tapid"] = $r[0];
        $rows[$i]["topics"] = array(array(
            "topic" => $r[1],
            "status" => $r[2],
            "category" => $r[3]
        ));
    //otherwise append new topic to existing topics array
    } else {
        $rows[$i]["topics"][] = array(
            "topic" => $r[1],
            "status" => $r[2],
            "category" => $r[3]
        );
    }
}


//$result = json_encode($DB->get());
//echo $result;
echo "rows=".$rows."<br>";
echo "rows[0]=".$rows[0]."<br>";
echo json_encode($rows);

//echo "end";
*/
/*
 db screenshot: https://github.com/bofrank/UI/blob/master/images/db.png
*/

/* 
	currently returns the following example data which is displayed here: bit.ly/1s4Epnm 
*/

/*

[
	{"0":"206-000-0005","connection":"206-000-0005","1":"Seattle","topic":"Seattle"},
	{"0":"206-000-0005","connection":"206-000-0005","1":"LA","topic":"LA"},
	{"0":"206-000-0005","connection":"206-000-0005","1":"SF","topic":"SF"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"Mariners","topic":"Mariners"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"Seahawks","topic":"Seahawks"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"Sounders","topic":"Sounders"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"trumpet","topic":"trumpet"},
	{"0":"206-000-0001","connection":"206-000-0001","1":"Bootstrapping","topic":"Bootstrapping"},
	{"0":"206-000-0001","connection":"206-000-0001","1":"Angel Investor","topic":"Angel Investor"},
	{"0":"206-000-0001","connection":"206-000-0001","1":"Runway","topic":"Runway"}
]

*/


/* would like the data to be in the following format */

/*

[
  {
    "connection" : "2060000002",
    "topics" : [
    {
        "topic" : "hamburger",
        "state" : "available",
        "category" : "food"
    },
    {
        "topic" : "Mariners",
        "state" : "waiting",
        "category" : "sports"
    },
    {
        "topic" : "Ichiro",
        "state" : "available",
        "category" : "sports"
    }
    ]
  },
  {
    "connection" : "2060000001",
    "topics" : [
    {
        "topic" : "World Advertising Congress",
        "state" : "active",
        "category" : "advertising"
    },
    {
        "topic" : "Digital Strategies",
        "state" : "available",
        "category" : "technology"
    },
    {
        "topic" : "Multi-Channel Experience",
        "state" : "available",
        "category" : "technology"
    }
    ] 
  },
  {
    "connection" : "2060000003",
    "topics" : [
    {
        "topic" : "Dark Souls 2",
        "state" : "active",
        "category" : "game"
    }
    ]
  }
];

*/


?>