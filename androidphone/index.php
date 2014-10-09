<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<title>AndroidPhone</title>
	
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/global.css" rel="stylesheet">

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

	<div class="container-logo" onClick="window.location = '.'">
	  <img src="images/logo.gif" alt="TopicB" />
	</div>

	<div class="buttons">
			<div class="container btn-reload" onClick="window.location = '.'">

		    <a class="ui-link btn btn-primary btn-s btn-main">Reload App</a>

			</div>
			<div style="clear:both;"></div>
	    <div class="container btn-container" onClick="login();">

	        <a class="ui-link btn btn-primary btn-s btn-main">Login</a>

	    </div>
	    <div class="container btn-container" onClick="logout();">

	        <a class="ui-link btn btn-primary btn-s btn-main">Logout</a>

	    </div>
	    <div style="clear:both;"></div>
	    <div class="container btn-container" onClick="showdialpad();">

	        <a class="ui-link btn btn-primary btn-s btn-main">Show Dialpad</a>

	    </div>
	    <div class="container btn-container" onClick="call();">

	        <a class="ui-link btn btn-primary btn-s btn-main">Call</a>

	    </div>
	    <div style="clear:both;"></div>
	</div>

</body>
</html>
