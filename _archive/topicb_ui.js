topicApp.controller('TopicSubmitController', function ($scope,$http) {

    $scope.submitForm = function() {
        console.log("posting data....");
        $http.post('submitTopics.php', JSON.stringify($scope.myTopics)).success(function(){
            console.log("data saved");
            angular.element(".message").html("<span>Thanks! Your topics have been created below.</span>");
        });
    };

});

topicApp.controller('CloseAppController', function ($scope,$http) {

    $scope.closeApp = function() {
        console.log("closing app....");
        $http.post('releaseID.php', JSON.stringify($scope.myID)).success(function(){
            console.log("releasing ID");
            angular.element(".message").html("<span>Thanks for using TopicB!.</span>");
        });
    };

});