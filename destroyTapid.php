<?php

if( isset($_GET["t"]) )
{
	$tapid = $_GET["t"];
}
else
{
	$tapid = "07074896100";
}

$socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
socket_connect( $socket, "127.0.0.1", 8010 );

socket_write( $socket, "command=destroy_tap_id&tapid=$tapid" );

$buf = socket_read( $socket, 2048 );
echo $buf;

socket_close( $socket );
?>