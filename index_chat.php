<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8' />
<!--<link href="css/global.css" rel="stylesheet">-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/global.css" rel="stylesheet">
<style type="text/css">
<!--
body{
	background:none;
}
.chat_wrapper .message_box {
	background: none;
	height: 150px;
	overflow: auto;
	padding: 10px;
	border: 1px solid #999999;
}
.chat_wrapper .panel input{
	padding: 2px 2px 2px 5px;
}
.system_msg{color: #ddd;font-style: italic;}
.user_message{color: #fff;}
-->
</style>
</head>
<body>	
<?php 

include("mysqli.class.php"); 
include("data.php");

$config = array();
$config['host'] = $hostname;
$config['user'] = $username;
$config['pass'] = $password;
$config['table'] = 'topicb';

$DB = new DB($config);

$tapid = $_GET["tapid"];
$topic = $_GET["topic"];
$tempStr = substr($tapid, 7);
$handle = $tempStr." : ".$topic;

//$DB->Query("UPDATE topicb.topics SET chatstate='chatting' WHERE topic='$topic'");

$colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
$user_colour = array_rand($colours);
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script language="javascript" type="text/javascript">  
/*
$(window).on('beforeunload', function(){
    
    //$http({method: 'GET', url: 'removeTopic.php?topic=<?php echo trim($topic);?>'});
    //$.ajax({url:"removeTopic.php?topic=<?php echo trim($topic);?>"});
    $.ajax({url:"stateUpdate.php?topic=<?php echo trim($topic);?>&state=available'})";

};
*/
/*
$(window).on('beforeunload', function(){
	$.ajax({url:"removeTopic.php?topic=<?php echo trim($topic);?>"});
});
*/
$(document).ready(function(){
	//create a new WebSocket object.
	//alert("chosen topic is "+parent.$("#myChosenTopicDisplay").text());
	var wsUri = "ws://54.68.58.129:8000/server_chat.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		$('#message_box').append("<div class=\"system_msg\"><?php echo trim($tapid);?></div>"); //notify user
	}

	$('#send-btn').click(function(){ //use clicks message send button	
		sendMessageChat();
	});

	$('#message').keypress(function(event) {
        if (event.keyCode == 13) {
            sendMessageChat();
        }
    });

	function sendMessageChat(){
		var mymessage = $('#message').val(); //get message text
		var myname = $('#name').val(); //get user name
		
		if(myname == ""){ //empty name?
			alert("Enter your Name please!");
			return;
		}
		if(mymessage == ""){ //emtpy message?
			alert("Enter Some message Please!");
			return;
		}
		
		//prepare json data
		var msg = {
		message: mymessage,
		name: myname,
		color : '<?php echo $colours[$user_colour]; ?>'
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));
	}
	
	//#### Message received from server?
	websocket.onmessage = function(ev) {
		var msg = JSON.parse(ev.data); //PHP sends Json data
		var type = msg.type; //message type
		var umsg = msg.message; //message text
		var uname = msg.name; //user name
		var ucolor = msg.color; //color

		

		if(type == 'usermsg')
		{
			$('#message_box').append("<div class=\"message-box\"><span class=\"user_name\" style=\"color:#fff\">"+uname+"</span> <span style=\"color:#fff;\">:</span> <span class=\"user_message\">"+umsg+"</span></div>");
			if(umsg==null){
				parent.$("#topic1button").removeClass("chatting").removeClass("pending");
				parent.$("#topic2button").removeClass("chatting").removeClass("pending");
				parent.$("#topic3button").removeClass("chatting").removeClass("pending");

			}
		}
		/*
		if(type == 'system')
		{
			$('#message_box').append("<div class=\"system_msg\">this is a sys msg"+umsg+"</div>");
		}
		*/
		$('#message').val(''); //reset text
		$(document).scrollTop($(document).height());
		$(".user_name:not(:contains('<?php echo trim($topic);?>'))").parent().hide();
	};
	
	websocket.onerror	= function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");}; 
	websocket.onclose 	= function(ev){$('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");}; 

});
</script>

<div id="message_box"></div>
<div style="margin-top:10px;">
<input type="hidden" name="name" id="name" placeholder="Your Name" maxlength="10" style="width:20%" value="<?php echo $handle ?>"  />
<input type="text" name="message" id="message" placeholder="Message" maxlength="80" style="width:60%" class="form-control message-input ng-pristine" />
<button id="send-btn" class="btn btn-primary btn-s btn-submit" style="width:70px;height:38px;margin-top:-5px">Send</button>
</div>


</body>
</html>