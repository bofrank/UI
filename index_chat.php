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
				    var hex1 = "";
				    var hex2 = "";
				    var possible = "abcdef";
				  
				    hex1 = possible.charAt(Math.floor(Math.random() * possible.length));
				    hex2 = possible.charAt(Math.floor(Math.random() * possible.length));
				    text=hex1+hex2+hex1+hex2+hex1+hex2;

				    $("#color").val(text);
				}
				var userid = makeid();

				$("#messages").load("ajaxLoad.php");

				$("#userArea").submit(function(){

					$.post("ajaxPost.php",$("#userArea").serialize(),function(data){
						$("#messages").append("<div>" + data + "</div>");
					});
					return false;
				});

				setInterval(function() {
      			$("#messages").load("ajaxLoad.php");
      			$('#wrapper').scrollTop($('#wrapper').height()+300);
				}, 3000);

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
			    font-weight: bold;
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
		    width: 100%;
			}
		</style>
	</head>
	<body>

		<!-- wrapper for scrolling -->
		<div id="wrapper" style="height:400px;overflow:auto;">
			<!-- display -->
			<div id="messages"></div>

			<!-- post -->
			<form id="userArea" class="form-inline" style="margin-top:10px;">

				<label style="color:#fff;">Your Message:</label>
				<input type="text" maxlength="255" name="messages" class="form-control" id="myMessage"  />
				<input type="hidden" maxlength="255" name="color" id="color" />

				<label></label>
				<input type="submit" value="" style="background:url(images/send.jpg) no-repeat;width:85px;height:55px;border:none;cursor:pointer;margin-top:10px;" />

			</form>
			<a name='end'></a>
		</div>

	</body>
</html>