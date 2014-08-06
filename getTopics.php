<?php

include "config.php"; 

/* this returns everything */

/*
$DB->Query("SELECT * FROM topicb.topics");
$result = json_encode($DB->get());
print_r($result);
*/

/* this selects the topics */
/*
$DB->Query("SELECT topic FROM topicb.topics");
$result = json_encode($DB->get());
print_r($result);
*/

$DB->Query("SELECT connection,topic FROM topicb.topics");
$result = json_encode($DB->get());
echo $result;

/*
//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

//$arr = Array ( [0] => earlgray [topic] => earlgray [1] => 206-000-0003 [connection] => 206-000-0003 [2] => [category] => [3] => [state] =>);

//$arr = Array('0' => 'earlgray', 'topic' => 'earlgray', '1' => '206-000-0003', 'connection' => '206-000-0003');

//$result = strval($arr);

//Array ( [0] => earlgray [topic] => earlgray [1] => 206-000-0003 [connection] => 206-000-0003 [2] => [category] => [3] => [state] => ) 

//$result = json_encode($arr);


//$db->query('SELECT * FROM someplace');

//$result = $DB->get('topicb.topics');
/*
if ($result = mysqli_query($DB, "SELECT * FROM topicb.topics")) {
    printf("Select returned %d rows.\n", mysqli_num_rows($result));


}
*/

//echo "<br><br>--------------------------------------------------------<br><br><table>";

//echo $result;

/*
$i=0;

foreach($result as $topic=>$connection) {
   echo "$topic : $connection <br>";
}
*/
/*
while ($row=mysql_fetch_row($result)){
	$result_topic=$row[0];
	$result_connection=$row[1];
	echo "<tr><td>$result_topic</td><td>$result_connection</td></tr>"; 
}
echo "</table>";
*/
//echo "result = ".$result;

?>