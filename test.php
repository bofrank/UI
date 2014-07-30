<?php

//$json=array("apple","banana","cherry");

$json = '{0: "peach"}';
$obj = json_decode($json);
$topic1 = $obj->{0};

echo $topic1."hi";

?>