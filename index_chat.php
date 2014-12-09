<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8' />
<!--<link href="css/global.css" rel="stylesheet">-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/global.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
.system_msg{color: #ddd;font-style: italic;float:left;width:95%;}
.user_message{color: #fff;}
.btn-call{
  background-image: linear-gradient(#87FC70, #0BD318);
  border: 2px solid #fff;
  color: #fff;
  cursor: pointer;
  font-family: "Titillium Web",sans-serif;
  font-size: 20px;
  height: 40px;
  line-height: 20px;
  text-align: center;
  width: 100%;
}
.btn-call:hover{
  border: 2px solid #fff;
}
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

$chatter = $_GET["chatter"];
$chatee = $_GET["chatee"];
if (($_GET["topicinit"]=="")||($_GET["topicinit"]==null)) {
    $topicinit = "image";
}else{
	$topicinit = $_GET["topicinit"];
}
if (($_GET["NFID"]=="")||($_GET["NFID"]==null)) {
  $NFID = $_GET["chatter"];
}else{
	$NFID = $_GET["NFID"];
}

//$tempStr = substr($tapid, 7);
//$handle = $tempStr." : ".$topic;

if($topicinit=="notopic"){
	$topic="block";
}

$handle = $chatter.":".$chatee." : ".$topicinit;
//$DB->Query("UPDATE topicb.topics SET chatstate='chatting' WHERE topic='$topic'");

//$colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
//$user_colour = array_rand($colours);
$user_colour = $NFID;
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script language="javascript" type="text/javascript">  

var numDispay1 = "";
var numDispay2 = "";
var ucolor = "";
var chatteeNum = "";

$(document).ready(function(){
	//create a new WebSocket object.
	//alert("chosen topic is "+parent.$("#myChosenTopicDisplay").text());
	var wsUri = "ws://54.68.58.129:8000/server_chat.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		$('#message_box').append("<div class=\"system_msg\"><?php echo trim($topicinit);?> Chat </div><div style=\"float:left;cursor:pointer;\" onclick=\"window.parent.favSave('<?php echo trim($topicinit);?>');\"><i class=\"fa fa-thumbs-o-up\" style=\"color:#ddd;font-size:25px;margin-left:-10px;\"></i></div><div style=\"clear:both;\"></div>"); //notify user
	}

	$('#send-btn').click(function(){ //use clicks message send button	
		sendMessageChat();
	});

	$('#message').keypress(function(event) {
        if (event.keyCode == 13) {
            sendMessageChat();
        }else{
        	$('#send-btn').show();
					$('#iconCall').hide(); 
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
		color : '<?php echo $user_colour;?>'
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));

		$('#send-btn').hide();
		$('#iconCall').show();

	}
	
	//#### Message received from server?
	websocket.onmessage = function(ev) {
		var msg = JSON.parse(ev.data); //PHP sends Json data
		var type = msg.type; //message type
		var umsg = msg.message; //message text
		

		if(type == 'usermsg')
		{

			var uname = msg.name; //user name

			ucolor = msg.color;

			var displayID = "";
			if(uname){
				displayID = uname.substring(0, 10);
			}

			//add dashes to make id look like phone number
			var tempNum="<?php echo $NFID;?>";

			//create display for chattee
			if(ucolor){
				numDispay1 = ucolor.slice(0,3)+"-"+ucolor.slice(3,6)+"-"+ucolor.slice(6,15);
			}
			//create display for chatter
			numDispay2 = tempNum.slice(0,3)+"-"+tempNum.slice(3,6)+"-"+tempNum.slice(6,15);

			if(displayID == '<?php echo $NFID;?>'){
				$('#message_box').append("<div class=\"message-box\" style='margin-left:20px;'><span class=\"user_name\" style=\"color:#fff\"><div style=\"color:#fff;display:none;font-size:10px;line-height:5px;\">chatter:"+numDispay2+"</div><span style='display:none;'>"+uname+"</span></span> <span class=\"user_message\">"+umsg+"</span></div>");
			}else{
				$('#message_box').append("<div class=\"message-box\" style='margin-right:20px;'><span class=\"user_name\" style=\"color:#fff\"><div style=\"color:#fff;display:none;font-size:10px;line-height:5px;\">chattee:"+numDispay1+"</div><span style='display:none;'>"+uname+"</span></span> <span class=\"user_message\">"+umsg+"</span></div>");
				//set var for chattee phone number
				chatteeNum = numDispay1;
				if(numDispay1){
					$('#iconCall').show();
				}
			}
			/*
			if(umsg==null){
				parent.$("#topic1button").removeClass("chatting").removeClass("pending");
				parent.$("#topic2button").removeClass("chatting").removeClass("pending");
				parent.$("#topic3button").removeClass("chatting").removeClass("pending");
			}*/

		}
		/*
		if(type == 'system')
		{
			$('#message_box').append("<div class=\"system_msg\">this is a sys msg"+umsg+"</div>");
		}
		*/
		$('#message').val(''); //reset text
		$(document).scrollTop($(document).height());
		$(".user_name:not(:contains('<?php echo trim($chatter);?>')):not(:contains('<?php echo trim($chatee);?>'))").parent().hide();
		$(".user_name:not(:contains('<?php echo trim($topicinit);?>'))").parent().hide();
		//$(".user_name:not(:contains('<?php echo trim($tempStr);?>')):not(:contains('<?php echo trim($tapid);?>'))").parent().hide();

	};
	
/*
	websocket.onerror	= function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");}; 
	websocket.onclose 	= function(ev){$('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");}; 
*/

	websocket.onerror	= function(ev){
		//$('#message_box').append("<div class=\"system_error\">Oops "+ev.data+"</div>");
		//$('#message_box').append("<div class=\"system_error\">Oops "+ev.data+"</div>");
	};
	sessionStorage.counter=0;
	websocket.onclose = function(ev){
		$('#message_box').append("<div class=\"system_msg\">Sorry, Chat is unavailable at the moment.</div>");
		if(sessionStorage.counter==0){
			$.ajax({url:"http://www.bofrank.com/chat_down.php"});
			$.ajax({url:"server_chat.php"});
			location.reload();
		}
		sessionStorage.counter++;
	};

});
</script>

<div id="message_box"></div>
<div style="margin-top:10px;">
	<input type="hidden" name="name" id="name" placeholder="Your Name" maxlength="10" style="width:20%" value="<?php echo $handle ?>"  />
	<input type="text" name="message" id="message" placeholder="Message" maxlength="80" class="form-control message-input ng-pristine" style="width:68%;float:left;margin-left:10px;" />
	<button id="send-btn" class="btn" style="width:70px;display:none;">Send</button>
	<div style="float:left;display:none;" id="iconCall"><i style="font-size:40px;color:#fff;cursor:pointer;" class="fa fa-phone" onclick="window.parent.voiceStart(chatteeNum);"></i></div>
		
</div>


</body>
</html>