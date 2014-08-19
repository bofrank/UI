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

include "config.php"; 

$DB->Query("SELECT * FROM messages ORDER BY id DESC LIMIT 5") or die (mysql_error());

$data = $DB->Get();

$data = array_reverse($data);

foreach($data as $key => $value)
{
	/*
	echo "<div style='background:#".$value['color']."'>".$value['message'].
	"<a class='delete' href='#' rel='".$value['id']."'>Delete</a></div>";
*/
echo "<div class='search-result-box'>".
    "<div class='search_ID'>ID: ".
        $value['color'].
    "</div>".
    "<div class='search-result-text'>".
        $value['message'].
    "</div>".
    "</div>";

}

?>