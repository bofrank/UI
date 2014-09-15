<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {

		$(".delete").click(function(){

			var item = $(this).parent();
			var id = $(this).attr("rel");
			
			$.post('ajaxDelete.php',{'id':id},function(data){
				item.hide();
			});
		});

	});
</script>

<?php

include "configChat.php"; 

if( isset($_GET["myChatID"]) )
{
	$myChatID = $_GET["myChatID"];
}

$DB->Query("SELECT * FROM messages ORDER BY id") or die (mysql_error());

$data = $DB->Get();

//$data = array_reverse($data);

foreach($data as $key => $value)
{
	/*
	echo "<div style='background:#".$value['color']."'>".$value['message'].
	"<a class='delete' href='#' rel='".$value['id']."'>Delete</a></div>";
*/
if($value['color']==$myChatID){
		echo "<div class='search-result-box' style='background-color:rgba(227,255,241,0.5);margin-left:20px;'>".
	    "<div class='search-result-text'>".
	        $value['message'].
	    "</div>".
	    "</div>";
	}else{
		echo "<div class='search-result-box' style='background-color:rgba(227,255,241,0.2);margin-right:20px;'>".
	    "<div class='search-result-text'>".
	        $value['message'].
	    "</div>".
	    "</div>";
	}
}

?>