<?php

if( isset($_GET["c"]) )
{
	$cookie = $_GET["c"];
}
else
{
	$cookie = 1;
}

$socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
socket_connect( $socket, "172.31.27.57", 8010 );

socket_write( $socket, "command=create_tap_id&cookie=$cookie" );

$buf = socket_read( $socket, 2048 );
echo $buf;

socket_close( $socket );
?>