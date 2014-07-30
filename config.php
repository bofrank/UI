<?php

include('data.php'); 
include("mysqli.class.php"); 
//mysql_connect($servername, $adminname, $password) or die ("Could not connect to database.");
//mysql_select_db("bolinasf_bofrank_com_-_db") or die ("Could not select database.");

$config = array();
$config['host'] = $servername;
$config['user'] = $adminname;
$config['pass'] = $password;
$config['table'] = 'topicb';

// Then simply connect to your DB this way:
$DB = new DB($config);

?>