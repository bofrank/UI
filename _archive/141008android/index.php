<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>AndroidPhone</title>
	
	<style>
		html, body { height:100%; overflow:hidden; }
		body { margin:0; }
	</style>
	<script type="text/javascript">

		var strTapId, strPassWord;
		
<?php

$cookie = 10;

$socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
socket_connect( $socket, "172.31.27.57", 8010 );

socket_write( $socket, "command=create_tap_id&cookie=$cookie" );

$buf = socket_read( $socket, 2048 );
#echo $buf;

parse_str($buf, $array);

socket_close( $socket );

echo "strTapId = '".$array['tapid']."';\n";
echo "strPassWord = '".$array['password']."';\n";
?>

		function login()
		{
			tap.callback( "{ actionType:'login', tapid: '" + strTapId + "', password: '" + strPassWord + "' }" );
		}

		function logout()
		{
			tap.callback( "{ actionType:'logout' }" );
		}

		function showdialpad()
		{
			tap.callback( "{ actionType:'showdialpad' }" );
		}

		function call()
		{
 	 		tap.callback( "{ actionType:'call', callnumber:'8987770001' }" );
		}
		
	</script>
</head>
<body>

	<h1>
	<a href=".">Reload</a><br><br>
	<a href="javascript:login()">Login</a><br><br>
	<a href="javascript:logout()">Logout</a><br><br>
	<a href="javascript:showdialpad()">Show Dialpad</a><br><br>
	<a href="javascript:call()">Call</a><br>

	</h1>

</body>
</html>
