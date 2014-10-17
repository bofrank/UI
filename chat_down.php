<?php

	$to = "12062355455@tmomail.net";
	$subject = "Chat Server Down";
	$body = "The chat server needs to be restarted on ".date('l jS \of F Y h:i:s A');
	$headers = "From:Chat Server";

	if (mail($to,$subject,$body,$headers)) {
    echo("thank you");
  }else{
    echo("Your email did not go through.");
  }

?>