<?php
include("../data/data.php"); 
$date = date("Ymd");
mysql_connect($servername, $adminname, $password) or die ("Could not connect to database.");
mysql_select_db("bolinasf_bofrank_com_-_db") or die ("Could not select database.");
mysql_query("INSERT INTO highscoreinfex2 (username, score, date) VALUES('$username','$score','$date')");
?>
