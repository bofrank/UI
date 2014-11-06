<!DOCTYPE html>
<html ng-app="topicApp" lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>iPhone</title>
	
	<script type="text/javascript">

		var strTapId, strPassWord;
		
<?php

$cookie = 50;

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
			location.href = "login://" + strTapId + "?" + strPassWord;
		}

		function logout()
		{
			location.href = "logout://1";
		}

		function showdialpad()
		{
			location.href = "showdialpad://1";
		}

		function call(tapIdCallee)
		{
    	tapIdCallee = tapIdCallee.replace(/-/g, "");
    	location.href = "callnumber://" + tapIdCallee;
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
