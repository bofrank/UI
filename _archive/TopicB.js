/* CaaS (Connection as a Service): TopicB method for users to create and connect to topics. */

//create the web app object with the ability for html5
<script>

var topicApp = angular.module('topicApp', [], function($locationProvider) {
  $locationProvider.html5Mode(true);
});

//create topic data controller
topicApp.controller('topicCtrl', function ($scope,$http){


	//get topic data
	$http.get('data.json').
  success(function(data, status, headers, config) {
    $scope.posts = data;
  }).
  error(function(data, status, headers, config) {
    // log error
    $("#error-display").val('error loading topics');
	});


	//add topic data
	$scope.topicAdd = function($myEvent,$newTopic){  

    $scope.numbers[topicRow].topics.push($newTopic);
    $scope.$apply();

  }

	//display topic search results
	$scope.topicFilter = function($myEvent,$results){  

    $(".snippet").each(function(index){
    	$results.push($(this).text().replace(/"/g, ''));
    });

    $("#search_result_1").text($results[0]);
    $("#search_result_2").text($results[1]);
    $scope.$apply();

  }


	//connect to topic
	$scope.topicConnect = function($myEvent,$userid){  

    $("#messages").load("ajaxLoad.php");

		$("#userArea").submit(function(){

			$.post("ajaxPost.php",$("#userArea").serialize(),function(data){
				$("#messages").append("<div>" + data + "</div>");
			});
			return false;
		});

  }


});

//create topic sorting
topicApp.controller('QueryCntl', function ($scope,$location,sharedProperties){
    $scope.target = $location.search()['topic'];
    $scope.myTopic = $scope.target;
    $scope.both = sharedProperties.setProperty() + $scope.myTopic;
});

</script>


/* CaaS (Connection as a Service): TopicB method loading connection from ajaxLoad.php. */

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

	$DB->Query("SELECT * FROM messages") or die (mysql_error());

	$data = $DB->Get();

	foreach($data as $key => $value)
	{
	echo "<div class='search-result-box'>".
	    "<div class='search_ID'>ID: ".
	        $value['connection'].
	    "</div>".
	    "<div class='search-result-text'>".
	    $value['message'].
	    "</div>".
		"</div>";

	}

?>


/* CaaS (Connection as a Service): TopicB method for sending to connection from ajaxPost.php. */

<?php

	$message = $_POST["messages"];
	$color = $_POST["connection"];

	$DB->Query("INSERT INTO messages(message, connection) VALUES('$message','$connection')");

	echo $message;

?>



