<?php
?>
<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			
			function checkActivity(){
				$.ajax({url:"tc_destroy.php?time="+Date.now()});
			}

			setInterval(function(){checkActivity();},5000);

		</script>
	</head>
	<body>

	</body>
</html>

