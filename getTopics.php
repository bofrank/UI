<?php

include "config.php"; 

$result = $DB->Query("SELECT * FROM topicb.topics WHERE connection = '206-000-0008');

echo "result = ".$result;

?>