<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8' />
<!--<link href="css/global.css" rel="stylesheet">-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/global.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript">
window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o?o:e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({QJf3ax:[function(t,e){function n(t){function e(e,n,a){t&&t(e,n,a),a||(a={});for(var c=s(e),f=c.length,u=i(a,o,r),d=0;f>d;d++)c[d].apply(u,n);return u}function a(t,e){f[t]=s(t).concat(e)}function s(t){return f[t]||[]}function c(){return n(e)}var f={};return{on:a,emit:e,create:c,listeners:s,_events:f}}function r(){return{}}var o="nr@context",i=t("gos");e.exports=n()},{gos:"7eSDFh"}],ee:[function(t,e){e.exports=t("QJf3ax")},{}],3:[function(t){function e(t,e,n,i,s){try{c?c-=1:r("err",[s||new UncaughtException(t,e,n)])}catch(f){try{r("ierr",[f,(new Date).getTime(),!0])}catch(u){}}return"function"==typeof a?a.apply(this,o(arguments)):!1}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function n(t){r("err",[t,(new Date).getTime()])}var r=t("handle"),o=t(5),i=t("ee"),a=window.onerror,s=!1,c=0;t("loader").features.err=!0,window.onerror=e;try{throw new Error}catch(f){"stack"in f&&(t(1),t(4),"addEventListener"in window&&t(2),window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&t(3),s=!0)}i.on("fn-start",function(){s&&(c+=1)}),i.on("fn-err",function(t,e,r){s&&(this.thrown=!0,n(r))}),i.on("fn-end",function(){s&&!this.thrown&&c>0&&(c-=1)}),i.on("internal-error",function(t){r("ierr",[t,(new Date).getTime(),!0])})},{1:8,2:5,3:9,4:7,5:22,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],4:[function(t){function e(){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var n=t("ee"),r=t("handle"),o=t(1);t("loader").features.stn=!0,t(2),n.on("fn-start",function(t){var e=t[0];e instanceof Event&&(this.bstStart=Date.now())}),n.on("fn-end",function(t,e){var n=t[0];n instanceof Event&&r("bst",[n,e,this.bstStart,Date.now()])}),o.on("fn-start",function(t,e,n){this.bstStart=Date.now(),this.bstType=n}),o.on("fn-end",function(t,e){r("bstTimer",[e,this.bstStart,Date.now(),this.bstType])}),n.on("pushState-start",function(){this.time=Date.now(),this.startPath=location.pathname+location.hash}),n.on("pushState-end",function(){r("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),"addEventListener"in window.performance&&(window.performance.addEventListener("webkitresourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.webkitClearResourceTimings()},!1),window.performance.addEventListener("resourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.clearResourceTimings()},!1)),document.addEventListener("scroll",e,!1),document.addEventListener("keypress",e,!1),document.addEventListener("click",e,!1)}},{1:8,2:6,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],5:[function(t,e){function n(t){i.inPlace(t,["addEventListener","removeEventListener"],"-",r)}function r(t){return t[1]}var o=(t(1),t("ee").create()),i=t(2)(o),a=t("gos");if(e.exports=o,n(window),"getPrototypeOf"in Object){for(var s=document;s&&!s.hasOwnProperty("addEventListener");)s=Object.getPrototypeOf(s);s&&n(s);for(var c=XMLHttpRequest.prototype;c&&!c.hasOwnProperty("addEventListener");)c=Object.getPrototypeOf(c);c&&n(c)}else XMLHttpRequest.prototype.hasOwnProperty("addEventListener")&&n(XMLHttpRequest.prototype);o.on("addEventListener-start",function(t){if(t[1]){var e=t[1];"function"==typeof e?this.wrapped=t[1]=a(e,"nr@wrapped",function(){return i(e,"fn-",null,e.name||"anonymous")}):"function"==typeof e.handleEvent&&i.inPlace(e,["handleEvent"],"fn-")}}),o.on("removeEventListener-start",function(t){var e=this.wrapped;e&&(t[1]=e)})},{1:22,2:23,ee:"QJf3ax",gos:"7eSDFh"}],6:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window.history,["pushState"],"-")},{1:23,2:22,ee:"QJf3ax"}],7:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window,["requestAnimationFrame","mozRequestAnimationFrame","webkitRequestAnimationFrame","msRequestAnimationFrame"],"raf-"),n.on("raf-start",function(t){t[0]=r(t[0],"fn-")})},{1:23,2:22,ee:"QJf3ax"}],8:[function(t,e){function n(t,e,n){var r=t[0];"string"==typeof r&&(r=new Function(r)),t[0]=o(r,"fn-",null,n)}var r=(t(2),t("ee").create()),o=t(1)(r);e.exports=r,o.inPlace(window,["setTimeout","setInterval","setImmediate"],"setTimer-"),r.on("setTimer-start",n)},{1:23,2:22,ee:"QJf3ax"}],9:[function(t,e){function n(){c.inPlace(this,d,"fn-")}function r(t,e){c.inPlace(e,["onreadystatechange"],"fn-")}function o(t,e){return e}var i=t("ee").create(),a=t(1),s=t(2),c=s(i),f=s(a),u=window.XMLHttpRequest,d=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"];e.exports=i,window.XMLHttpRequest=function(t){var e=new u(t);try{i.emit("new-xhr",[],e),f.inPlace(e,["addEventListener","removeEventListener"],"-",function(t,e){return e}),e.addEventListener("readystatechange",n,!1)}catch(r){try{i.emit("internal-error",[r])}catch(o){}}return e},window.XMLHttpRequest.prototype=u.prototype,c.inPlace(XMLHttpRequest.prototype,["open","send"],"-xhr-",o),i.on("send-xhr-start",r),i.on("open-xhr-start",r)},{1:5,2:23,ee:"QJf3ax"}],10:[function(t){function e(t){if("string"==typeof t&&t.length)return t.length;if("object"!=typeof t)return void 0;if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if("undefined"!=typeof FormData&&t instanceof FormData)return void 0;try{return JSON.stringify(t).length}catch(e){return void 0}}function n(t){var n=this.params,r=this.metrics;if(!this.ended){this.ended=!0;for(var i=0;c>i;i++)t.removeEventListener(s[i],this.listener,!1);if(!n.aborted){if(r.duration=(new Date).getTime()-this.startTime,4===t.readyState){n.status=t.status;var a=t.responseType,f="arraybuffer"===a||"blob"===a||"json"===a?t.response:t.responseText,u=e(f);if(u&&(r.rxSize=u),this.sameOrigin){var d=t.getResponseHeader("X-NewRelic-App-Data");d&&(n.cat=d.split(", ").pop())}}else n.status=0;r.cbTime=this.cbTime,o("xhr",[n,r,this.startTime])}}}function r(t,e){var n=i(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}if(window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)){t("loader").features.xhr=!0;var o=t("handle"),i=t(2),a=t("ee"),s=["load","error","abort","timeout"],c=s.length,f=t(1);t(4),t(3),a.on("new-xhr",function(){this.totalCbs=0,this.called=0,this.cbTime=0,this.end=n,this.ended=!1,this.xhrGuids={}}),a.on("open-xhr-start",function(t){this.params={method:t[0]},r(this,t[1]),this.metrics={}}),a.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),a.on("send-xhr-start",function(t,n){var r=this.metrics,o=t[0],i=this;if(r&&o){var f=e(o);f&&(r.txSize=f)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(i.params.aborted=!0),("load"!==t.type||i.called===i.totalCbs&&(i.onloadCalled||"function"!=typeof n.onload))&&i.end(n)}catch(e){try{a.emit("internal-error",[e])}catch(r){}}};for(var u=0;c>u;u++)n.addEventListener(s[u],this.listener,!1)}),a.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),a.on("xhr-load-added",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),a.on("xhr-load-removed",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),a.on("addEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-added",[t[1],t[2]],e)}),a.on("removeEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-removed",[t[1],t[2]],e)}),a.on("fn-start",function(t,e,n){e instanceof XMLHttpRequest&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),a.on("fn-end",function(t,e){this.xhrCbStart&&a.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}},{1:"XL7HBI",2:11,3:9,4:5,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],11:[function(t,e){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");return!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname),r.sameOrigin=!e.hostname||e.hostname===document.domain&&e.port===n.port&&e.protocol===n.protocol,r}},{}],12:[function(t,e){function n(t){return function(){r(t,[(new Date).getTime()].concat(i(arguments)))}}var r=t("handle"),o=t(1),i=t(2);"undefined"==typeof window.newrelic&&(newrelic=window.NREUM);var a=["setPageViewName","trackUserAction","finished","traceEvent","inlineHit","noticeError"];o(a,function(t,e){window.NREUM[e]=n("api-"+e)}),e.exports=window.NREUM},{1:21,2:22,handle:"D5DuLP"}],gos:[function(t,e){e.exports=t("7eSDFh")},{}],"7eSDFh":[function(t,e){function n(t,e,n){if(r.call(t,e))return t[e];var o=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:o,writable:!0,enumerable:!1}),o}catch(i){}return t[e]=o,o}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],D5DuLP:[function(t,e){function n(t,e,n){return r.listeners(t).length?r.emit(t,e,n):(o[t]||(o[t]=[]),void o[t].push(e))}var r=t("ee").create(),o={};e.exports=n,n.ee=r,r.q=o},{ee:"QJf3ax"}],handle:[function(t,e){e.exports=t("D5DuLP")},{}],XL7HBI:[function(t,e){function n(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:i(t,o,function(){return r++})}var r=1,o="nr@id",i=t("gos");e.exports=n},{gos:"7eSDFh"}],id:[function(t,e){e.exports=t("XL7HBI")},{}],G9z0Bl:[function(t,e){function n(){var t=l.info=NREUM.info;if(t&&t.licenseKey&&t.applicationID&&f&&f.body){s(h,function(e,n){e in t||(t[e]=n)}),l.proto="https"===p.split(":")[0]||t.sslForHttp?"https://":"http://",a("mark",["onload",i()]);var e=f.createElement("script");e.src=l.proto+t.agent,f.body.appendChild(e)}}function r(){"complete"===f.readyState&&o()}function o(){a("mark",["domContent",i()])}function i(){return(new Date).getTime()}var a=t("handle"),s=t(1),c=(t(2),window),f=c.document,u="addEventListener",d="attachEvent",p=(""+location).split("?")[0],h={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-536.min.js"},l=e.exports={offset:i(),origin:p,features:{}};f[u]?(f[u]("DOMContentLoaded",o,!1),c[u]("load",n,!1)):(f[d]("onreadystatechange",r),c[d]("onload",n)),a("mark",["firstbyte",i()])},{1:21,2:12,handle:"D5DuLP"}],loader:[function(t,e){e.exports=t("G9z0Bl")},{}],21:[function(t,e){function n(t,e){var n=[],o="",i=0;for(o in t)r.call(t,o)&&(n[i]=e(o,t[o]),i+=1);return n}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],22:[function(t,e){function n(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(0>o?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=n},{}],23:[function(t,e){function n(t){return!(t&&"function"==typeof t&&t.apply&&!t[i])}var r=t("ee"),o=t(1),i="nr@wrapper",a=Object.prototype.hasOwnProperty;e.exports=function(t){function e(t,e,r,a){function nrWrapper(){var n,i,s,f;try{i=this,n=o(arguments),s=r&&r(n,i)||{}}catch(d){u([d,"",[n,i,a],s])}c(e+"start",[n,i,a],s);try{return f=t.apply(i,n)}catch(p){throw c(e+"err",[n,i,p],s),p}finally{c(e+"end",[n,i,f],s)}}return n(t)?t:(e||(e=""),nrWrapper[i]=!0,f(t,nrWrapper),nrWrapper)}function s(t,r,o,i){o||(o="");var a,s,c,f="-"===o.charAt(0);for(c=0;c<r.length;c++)s=r[c],a=t[s],n(a)||(t[s]=e(a,f?s+o:o,i,s,t))}function c(e,n,r){try{t.emit(e,n,r)}catch(o){u([o,e,n,r])}}function f(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){u([r])}for(var o in t)a.call(t,o)&&(e[o]=t[o]);return e}function u(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=r),e.inPlace=s,e.flag=i,e}},{1:22,ee:"QJf3ax"}]},{},["G9z0Bl",3,10,4]);
;NREUM.info={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",licenseKey:"ab60d03792",applicationID:"7083603",sa:1,agent:"js-agent.newrelic.com/nr-536.min.js"}
</script>
<style type="text/css">
<!--
body{
	background:none;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
	color:#9ea3ab;
	font-size:15px;
}
.chat_wrapper .message_box {
	background: none;
	height: 150px;
	overflow: auto;
	padding: 10px;
	border: 2px solid #9ea3ab;
	color:#9ea3ab;
}
.chat_wrapper .panel input{
	padding: 2px 2px 2px 5px;
	border: 2px solid #9ea3ab;
	color:#9ea3ab;
}
.system_msg{color: #ddd;font-style: italic;float:left;width:95%;}
.user_message{color: #000;}
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
.form-control::-moz-placeholder{
	 color: #9ea3ab;
	 font-size:14px;
}
.form-control{
	 color: #9ea3ab;
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
	//if(strpos($topicinit, 'http') === 0){$topicinit = '<img src="'.$topicinit.'" />';}
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
		//$('#message_box').append("<div class=\"system_msg\"><?php echo trim($topicinit); ?> Chat </div><div style=\"clear:both;\"></div>"); //notify user
	}

	$('#send-btn').click(function(){ //use clicks message send button	
		sendMessageChat();
	});

	$('#message').keypress(function(event) {
        if (event.keyCode == 13) {
            sendMessageChat();
        }else{
        	//$('#send-btn').show();
					//$('#iconCall').hide(); 
        }
    });

	function voiceRequest(chatteeNum){
		$('#message').val("incoming");
		sendMessageChat();
		window.parent.voiceStart(chatteeNum);
	};

	$("#iconCall").click(function() {
  	voiceRequest(chatteeNum);
	});

	function sendMessageChat(){
		//var mymessage = $('#message').val(); //get message text
		var mymessage = $('#alias').val() + ': ' + $('#message').val();
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
		//websocket.send("hello");

		//$('#send-btn').hide();
		//$('#iconCall').show();

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
				$('#message_box').append("<div class=\"message-box\" style='margin-left:20px;'><span class=\"user_name\" style=\"color:#bfbebe\"><div style=\"color:#bfbebe;display:none;font-size:10px;line-height:5px;\">me:"+numDispay2+"</div><span style='display:none;'>"+uname+"</span></span> <span class=\"user_message\">"+umsg+"</span></div>");
			}else{
				$('#message_box').append("<div class=\"message-box\" style='margin-right:20px;'><span class=\"user_name\" style=\"color:#bfbebe\"><div style=\"color:#bfbebe;display:none;font-size:10px;line-height:5px;\">id:"+numDispay1+"</div><span style='display:none;'>"+uname+"</span></span> <span class=\"user_message\">"+umsg+"</span></div>");
				//set var for chattee phone number
				chatteeNum = numDispay1;
				if(numDispay1){
					//$('#iconCall').show();
				}
				if(umsg=="incoming"){
					window.parent.voiceIncoming();
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
			//$.ajax({url:"http://www.bofrank.com/chat_down.php"});
			//$.ajax({url:"server_chat.php"});
			//location.reload();
		}
		sessionStorage.counter++;
	};

});



</script>
<div style="margin-bottom:5px;">
	<div style="font-size:14px;margin-left:1px;">
		<!--<i class="fa fa-circle"></i>&nbsp;Chat With The Author (currently offline)-->
		Sorry, chat is unavailable at the moment.
		<br/>
		<span style="color:#000;"><i class="fa fa-comment-o"></i>&nbsp;1,745 messages</span>
	</div>
</div>
<span style="color:#000;">Your Name:</span> <input type="text" name="alias" id="alias" placeholder="Guest" maxlength="10" class="form-control" style="width:140px;color:#9ea3ab;border:solid 2px;padding:3px 4px;height:24px;font-size:14px;" value="Guest" />

<div id="message_box"></div>
<div style="margin-top:5px;">
	<input type="hidden" name="name" id="name" placeholder="Your Name" maxlength="10" style="width:20%;" value="<?php echo $handle ?>" />
	<input type="text" name="message" id="message" placeholder="Start typing to chat ..." maxlength="80" class="form-control message-input ng-pristine" style="width:68%;float:left;background:#fff;margin-right:10px;color:#000;border:solid 2px #9ea3ab;padding: 0px 6px;height:28px;font-size:14px;" />
	<button id="send-btn" class="btn" style="width:70px;background:#229eff;font-size:14px;color:#fff;padding:3px;">Send</button>
	<div style="float:left;display:none;" id="iconCall"><i style="font-size:40px;color:#fff;cursor:pointer;" class="fa fa-phone"></i></div>
	<div>
		<span style="font-size:12px;">chat will not be recorded and removed when leaving room</span>
	</div>
		
</div>


</body>
</html>