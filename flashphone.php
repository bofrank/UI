<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>FlashPhone5</title>
	<meta name="description" content="" />
	
	<script src="js/swfobject.js"></script>
	<script>
		var flashvars = {
		};
		var params = {
			menu: "false",
			scale: "noScale",
			allowFullscreen: "true",
			allowScriptAccess: "always",
			bgcolor: "",
			wmode: "direct" // can cause issues with FP settings & webcam
		};
		var attributes = {
			id:"FlashPhone5"
		};
		swfobject.embedSWF(
			"FlashPhone5.swf", 
			"altContent", "100%", "100%", "10.0.0", 
			"expressInstall.swf", 
			flashvars, params, attributes);
	</script>
	<style>
		html, body { height:100%; overflow:hidden; }
		body { margin:0; }
	</style>
	<script type="text/javascript">

		var strTapId, strPassWord;
		
<?php

$cookie = 2;

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

		function red5phone_getConfig()
		{
			var callee = '';
		
			return {
				callee: callee,
				tapid: strTapId,
				password: strPassWord
			};
		}
		
	</script>
</head>
<body>
	<div id="altContent">
		<h1>FlashPhone5</h1>
		<p><a href="http://www.adobe.com/go/getflashplayer">Get Adobe Flash player</a></p>
	</div>
</body>
</html>
