<!doctype>
<html>
	<head>
		<title>chat</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/jquery.watermark.js"></script>
		<script>
			$(document).ready(function() {

				function makeid()
				{

				    var ray = Math.floor(Math.random() * 255);
				    var gun = Math.floor(Math.random() * 255);
				    var blaster = Math.floor(Math.random() * 255);

				    myChatID="rgba("+ray+","+gun+","+blaster+",0.3)";

				    $("#color").val(myChatID);
				}
				var userid = makeid();

				$("#messages").load("ajaxLoad.php?myChatID="+myChatID);

				$("#userArea").submit(function(){

					$.post("ajaxPost.php",$("#userArea").serialize(),function(data){
						$("#messages").append("<div class='search-result-box' style='background-color:rgba(227,255,241,0.5);margin-left:20px;'><div class='search-result-text'>" + data + "</div>");
						$('#myMessage').val('');
					});
					return false;
				});

				setInterval(function() {
      			$("#messages").load("ajaxLoad.php?myChatID="+myChatID);
      			$('#wrapper').scrollTop($('#wrapper').height()+500);
				}, 8000);

				$('#myMessage').watermark('Start Typing...');

			});

		</script>
		<style>
			body{
		    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		    font-size: 18px;
		    line-height: 1.42857;
			}
			.search-result-box{
			    background-color: rgba(255,255,255,0.3);
			    border-radius:5px;
			    margin-top:10px;
			    padding:10px;
			}
			.search-result-text{
			    color:#fff;
			}
			.search_ID{
			    color:#fff;
			    font-size:16px;
			}
			.form-control{
				background:none !important;
		    background-image: none;
		    border: 1px solid #fff;
		    border-radius: 4px;
		    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
		    color: #fff;
		    display: inline;
		    font-size: 18px;
		    height: 38px;
		    line-height: 1.42857;
		    padding: 8px 12px;
		    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
		    width: 74%;
		    float:left;
			}
			.btn-send {
		    background-image: linear-gradient(#fff, #d9edee);
		    color: #666666;
		    font-size: 16px;
		    height: 38px;
		    line-height: 20px;
		    text-align: center;
		    width: 24%;
		    min-width:60px;
		    border: 1px solid transparent;
		    border-radius: 4px;
		    cursor: pointer;
		    display: inline-block;
		    margin-bottom: 0;
		    padding: 8px 12px;
		    text-align: center;
		    vertical-align: middle;
		    white-space: nowrap;
		    float:right;
			}
		</style>
	</head>
	<body>

		<!-- wrapper for scrolling -->
		<div id="wrapper" style="height:400px;overflow:auto;margin-left:-8px;">
			<!-- display -->
			<div id="messages" style="margin-right:10px;margin-top:17px;"></div>

			<!-- post -->
			<form id="userArea" class="form-inline" style="margin-top:10px;margin-right:10px;">

				<label style="color:#fff;"></label>
				<input type="text" maxlength="255" name="messages" class="form-control" id="myMessage" />
				<input type="hidden" maxlength="255" name="color" id="color" />

				<label></label>
				<input type="submit" class="btn-send" value="SEND" />

			</form>
			<a name='end'></a>
		</div>

	</body>
</html>