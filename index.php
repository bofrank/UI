<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
?>
<!DOCTYPE html>
<html ng-app="topicApp" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>TopicB</title>
    
    <script src="js/swfobject.js"></script>
    <!--<link href="css/flexslider.css" rel="stylesheet">-->
    <link href="css/starter-template.css" rel="stylesheet">
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0-rc.2/angular-animate.min.js"></script>-->
    <script src="js/ui-utils-0.1.1/ui-utils.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular-sanitize.js"></script>-->
    <script src="js/app.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="pp/prettiffy.css" rel="stylesheet">
    <script src="pp/prettify.js"></script>
    <script src="js/jquery.scrollto.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.flexslider.min.js"></script>
    <script src="js/designr.js"></script>
    <script src="js/jquery.watermark.js"></script>
    <script src="js/common.js"></script>
    <script src="js/jquery.timer.js"></script>
    <link href="css/global.css" rel="stylesheet">
    <!--<link href="css/animate.css" rel="stylesheet">-->
    
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    
    <script>

        var topicApp = angular.module('topicApp',['ui.utils'], function($locationProvider) {
          $locationProvider.html5Mode(true);
        });

        topicApp.controller('topicCtrl', function ($scope,$http,$location,$anchorScroll,$timeout,$sce){

            $scope.loadData = function () {
            $http({method: 'GET', url: 'getTopics.php', params: { 'topicb': new Date().getTime() }}).success(function(data) {
                $scope.numbers = data;
                 //$scope.$apply();
                $scope.loadDataHotList();
              });
            };

            $scope.loadData();
            setInterval(function(){$scope.loadData();},5000);

            $scope.loadDataHotList = function () {
            $http({method: 'GET', url: 'getHotTopics.php', params: { 'topicb': new Date().getTime() }}).success(function(data) {
                $scope.hotlist = data;
                numberFormat();
                showImages();
              });
            };

            $scope.hotlist = $scope.numbers;
            $scope.topic_distance=0;
            $scope.tempWidth=0;

            $scope.scrollImages = function() {
                $scope.tempWidth = parseInt($("#imgs2 li div a").first().css("width"),10);
                $scope.topicWidth = $scope.tempWidth+10;

                $("#imgs2").css("transition-duration", "1s");
                $("#imgs2").css("transform", "translate(-"+$scope.topicWidth+"px,0)");
                $("#imgs2").one('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', 
                    function() {
                        $scope.topicShift();
                        $("#imgs2").css("transition-duration", "0s");
                        $("#imgs2").css("transform", "translate(0px,0)");
                        $scope.$apply();
                    }
                );
                
            }

            $scope.timerHotTopic = $.timer(function() {
                $scope.scrollImages();
            });
            $scope.timerHotTopic.set({time:3000,autostart:true});

            $scope.resumeHotTopics = function(){  
                $scope.topic_distance=0;
                $scope.timerHotTopic.play();
            }

            $scope.topicShift = function($myEvent){  
                var temp = $scope.hotlist.shift();
                $scope.hotlist.push(temp);
            }

            $scope.topicAdd = function($myEvent){  
                //add functionailty for adding topics to the list
            }

            $scope.arrayObjectIndexOf=function(arr, obj){
                for(var i = 0; i < arr.length; i++){
                    if(angular.equals(arr[i], obj)){
                        return i;
                    }
                };
                return -1;
            }

            $scope.scrollLeft=function(topicRow){

                var temp = $scope.numbers[topicRow].topics.shift();
                $scope.numbers[topicRow].topics.push(temp);

            }

            $scope.scrollRight=function(topicRow){

                var temp = $scope.numbers[topicRow].topics.pop();
                $scope.numbers[topicRow].topics.unshift(temp);

            }

            $scope.myTopic = $location.search()['topic'];

            $scope.widget = {inputValue: 'whatever'};

            $scope.filterTopic=function($mySearchWord){

                $scope.myTopic = $mySearchWord;
                
                angular.element("#search_result_1,#search_result_2").parent().show();
                angular.element("#search_result_1,#search_result_2").text("loading search results...");
                $location.hash('hottopics');

                // call $anchorScroll()
                $anchorScroll();
                
                angular.element("#gsc-i-id1").val($mySearchWord);
                angular.element(".gsc-search-button").trigger( "click" );

                $timeout(function() {
                    angular.element(".gsc-cursor-box").css("display","none");
                    angular.element(".gsc-search-box,#resInfo-0,.gsc-above-wrapper-area-container,.gcsc-branding,.gsc-above-wrapper-area,.gs-image,.gsc-thumbnail-inside,.gsc-url-top").css("display","none");

                    $scope.results=[];

                    angular.element(".gs-snippet").each(function(index){
                        $scope.results.push($(this).text().replace(/"/g, ''));
                    });

                    $timeout(function() {

                        angular.element("#search_result_1").text($scope.results[0]);
                        angular.element("#search_result_2").text($scope.results[1]);

                    }, 2000);

                }, 2000);

            }

            $scope.filterTapId = function(whatever){
                var tempMyID = angular.element("#myTapidDisplay").html();
                return (whatever.tapid != tempMyID);
            }

            $scope.submitFormOnRefresh = function(){
                if(sessionStorage.topic1){
                    
                    $scope.myTopics = JSON.stringify({topic1:sessionStorage.topic1,topic2:sessionStorage.topic2,topic3:sessionStorage.topic3,myID:sessionStorage.tapid});

                    $scope.myTopics.myID = sessionStorage.tapid;

                    $http.post('submitTopics.php', $scope.myTopics).success(function(){

                        angular.element(".starter-template").html("<span class='message-create'>Your topics have been recreated below.</span>");
                        $scope.loadData();
                        
                        angular.element("#topic1button").html(sessionStorage.topic1);
                        angular.element("#topic2button").html(sessionStorage.topic2);
                        angular.element("#topic3button").html(sessionStorage.topic3);

                        $scope.myIdDisplay2 = sessionStorage.tapid.slice(0, 3) + "-" + sessionStorage.tapid.slice(3);
                        $scope.myIdDisplay3 = $scope.myIdDisplay2.slice(0, 7) + "-" + $scope.myIdDisplay2.slice(7);
                        angular.element("#myIdDisplay").html("My ID: "+$scope.myIdDisplay3);

                        angular.element("#myTopicsDisplay").attr("style","display:block;margin-bottom:90px;");

                        angular.element("#myTapidDisplay").html($scope.myTopics.myID);

                        angular.element("#myPasswordDisplay").html("my cookie is "+sessionStorage.mycookie);

                        angular.element("#callchat").attr("style","display:block;").attr("style","background:none;");

                        $("#phoneBox").attr("src","flashphone/index.php?c="+sessionStorage.mycookie);

                        togglePad();
                        //openPad();
                        $("#chatBox").attr("src","index_chat.php?chatter="+sessionStorage.tapid+"&chatee="+sessionStorage.tapid+"&topicinit=notopic");
                        openChat();
                        toggleChat();

                        setInterval(function(){$scope.checkTopics()},10000);
                    });
                }
            }

            $scope.submitFormOnRefresh();

            $scope.checkTopics = function(){
                $http({method: 'GET', url: 'getMyTopics.php?t='+sessionStorage.tapid, params: { 'topicb': new Date().getTime() }}).success(function(data2) {

                    $scope.dataMyTopics = data2;
                    for(var h=1;h<4;h++){
                        $("#topic"+h+"button").attr("class","btn btn-primary btn-s topic-button ui-link "+$scope.dataMyTopics[h-1].chatstate);
                   
                        if($scope.dataMyTopics[h-1].chatstate=="pending"){
                            //show pending icon
                            //angular.element("#topic"+h+"icon").attr("class","icon-pending");

                            angular.element("#topic"+h+"icon").attr("style","width:16px;height:16px;visibility:visible;margin-left:-15px;margin-top:-28px;");
                            var $cb = $("#chatBox");
                            $cb[0].contentWindow.$("#message_box .system_msg").text("Someone wants to chat about "+$("#topic"+h+"button").text()+" Click the topic above to start chatting.");
                        }else{
                            angular.element("#topic"+h+"icon").attr("style","width:16px;height:16px;visibility:hidden;margin-left:-15px;margin-top:-28px;");
                        }
                    
                    }
                });
            }

        });

        topicApp.controller('TopicSubmitController', function ($scope,$http,$timeout) {

            $scope.callCreateTapid = function(){
                
                if(sessionStorage.refTopic1){
                    $scope.callCreateTapidFromReference();
                }else{
                    //angular.element("#topic1").triggerHandler('change');
                    //$scope.myTopics="";
                    //$scope.myTopics.topic1=angular.element("#topic1").val();
                    var $is_topic=angular.element("#topic1").val();
                    
                    if($is_topic){
                        $scope.myCookie = $scope.makeid();

                        angular.element("#phoneBox").attr("src","flashphone/index.php?c="+$scope.myCookie);
                        angular.element("#myIdDisplay").html("My ID: "+$scope.myTapId+" My Password:"+$scope.myCookie);
                        togglePad();
                        angular.element("#myTopicsDisplay").attr("style","display:block;margin-bottom:90px;");
                        angular.element("#phoneBox").load(function(){
                          $scope.submitForm();
                        });
                    }
                }
                    
            };

            $scope.callCreateTapidFromReference = function(){
                
                //var $is_topic=angular.element("#topic1").val();

                //angular.element("#topic1").triggerHandler('change');
                //$scope.myTopics="";
                //$scope.myTopics.topic1=angular.element("#topic1").val();

                //if($is_topic){

                    $scope.myTopics = {};

                    $scope.myTopics.topic1=sessionStorage.refTopic1;
                    $scope.myTopics.topic2=sessionStorage.refTopic2;
                    $scope.myTopics.topic3=sessionStorage.refTopic3;

                    $scope.myTopics.myID="0001112222";

                    //$scope.myTopics = JSON.stringify({topic1:sessionStorage.refTopic1,topic2:sessionStorage.refTopic2,topic3:sessionStorage.refTopic3,myID:"0001112222"});
                    
                    //console.log("scope.myTopics.myID="+$scope.myTopics.myID);
                    
                    $scope.myCookie = $scope.makeid();

                    angular.element("#phoneBox").attr("src","flashphone/index.php?c="+$scope.myCookie);
                    
                    angular.element("#phoneBox").load(function(){
                        
                        togglePad();
                        angular.element("#myTopicsDisplay").attr("style","display:block;margin-bottom:90px;");
                        var $newBox = $("#phoneBox");
                        $scope.myTopics.myID = $newBox[0].contentWindow.red5phone_getConfig().tapid;
                        angular.element("#myIdDisplay").html("My ID: "+$scope.myTopics.myID+" My Password:"+$scope.myCookie);
                        $scope.submitForm();
                    });

                //}
                    
            };

            $scope.makeid = function()
            {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for( var i=0; i < 23; i++ )
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }

            $scope.submitForm = function(){
                //console.log("submitForm called");
                $scope.myTopics.myID = angular.element('#phoneBox')[0].contentWindow.red5phone_getConfig().tapid;
                //console.log("scope.myTopics.myID="+$scope.myTopics.myID);
                sessionStorage.tapid=$scope.myTopics.myID;

                $http.post('submitTopics.php', JSON.stringify($scope.myTopics)).success(function(){
                    //console.log("success");
                    angular.element(".starter-template").html("<span class='message-create'>Thanks! Your topics have been created below.</span>");
                    $scope.loadData();
                    
                        sessionStorage.topic1=$scope.myTopics.topic1;
                        sessionStorage.topic2=$scope.myTopics.topic2;
                        sessionStorage.topic3=$scope.myTopics.topic3;
                    

                    angular.element("#topic1button").html($scope.myTopics.topic1);

                    if(sessionStorage.topic2=="undefined"){
                        sessionStorage.topic2="blank";
                        angular.element("#topic2button").attr("style","display:none;");
                    }else{
                        angular.element("#topic2button").html($scope.myTopics.topic2);
                    }

                    if(sessionStorage.topic3=="undefined"){
                        sessionStorage.topic3="blank";
                        angular.element("#topic3button").attr("style","display:none;");
                    }else{
                        angular.element("#topic3button").html($scope.myTopics.topic3);
                    }

                    $scope.myIdDisplay = $scope.myTopics.myID;
                    $scope.myIdDisplay2 = $scope.myIdDisplay.slice(0, 3) + "-" + $scope.myIdDisplay.slice(3);
                    $scope.myIdDisplay3 = $scope.myIdDisplay2.slice(0, 7) + "-" + $scope.myIdDisplay2.slice(7);
                    angular.element("#myIdDisplay").html("My ID: "+$scope.myIdDisplay3);

                    angular.element("#myTopicsDisplay").attr("style","display:block;margin-bottom:90px;");

                    angular.element("#myTapidDisplay").html($scope.myTopics.myID);

                    angular.element("#myPasswordDisplay").html("my cookie is "+$scope.myCookie);

                    angular.element("#callchat").attr("style","display:block;").attr("style","background:none;");

                    sessionStorage.mycookie=$scope.myCookie;

                    $("#chatBox").attr("src","index_chat.php?chatter="+$scope.myTopics.myID+"&chatee="+$scope.myTopics.myID+"&topicinit=notopic");
                    openChat();
                    toggleChat();

                    setInterval(function(){$scope.checkTopics()},10000);

                });

            };

            $scope.checkTopics = function(){
                $http({method: 'GET', url: 'getMyTopics.php?t='+$scope.myTopics.myID, params: { 'topicb': new Date().getTime() }}).success(function(data2) {
                    $scope.dataMyTopics = data2;
                    for(var h=1;h<4;h++){
                        $("#topic"+h+"button").attr("class","btn btn-primary btn-s topic-button ui-link "+$scope.dataMyTopics[h-1].chatstate);
                   
                        if($scope.dataMyTopics[h-1].chatstate=="pending"){
                            //show pending icon
                            //angular.element("#topic"+h+"icon").attr("class","icon-pending");

                            angular.element("#topic"+h+"icon").attr("style","width:16px;height:16px;visibility:visible;margin-left:-15px;margin-top:-28px;");
                            var $cb2 = $("#chatBox");
                            $cb2[0].contentWindow.$("#message_box .system_msg").text("Someone wants to chat about "+$("#topic"+h+"button").text()+" Click the topic above to start chatting.");
                        }else{
                            angular.element("#topic"+h+"icon").attr("style","width:16px;height:16px;visibility:hidden;margin-left:-15px;margin-top:-28px;");
                        }
                    
                    }
                });
            }

        });


        topicApp.controller('QueryCntl', function ($scope,$location,sharedProperties){
            $scope.target = $location.search()['topic'];
            $scope.myTopic = $scope.target;
            $scope.both = sharedProperties.setProperty() + $scope.myTopic;
        });

        topicApp.controller('ScrollController', ['$scope', '$location', '$anchorScroll','$timeout',
            function ($scope, $location, $anchorScroll, $timeout) {
                $scope.chatStart = function(myChat) {
                    // set the location.hash to the id of
                    // the element you wish to scroll to.
                    openChat();
                    angular.element("#search_result_1,#search_result_2").parent().show();
                    angular.element("#search_result_1,#search_result_2").text("loading search results...");
                    $location.hash('hottopics');

                    $anchorScroll();
                    //console.log("start chat for "+myChat);
                    
                    angular.element("#gsc-i-id1").val(myChat);
                    angular.element(".gsc-search-button").trigger( "click" );

                    $timeout(function() {
                        angular.element(".gsc-cursor-box").css("display","none");
                        angular.element(".gsc-search-box,#resInfo-0,.gsc-above-wrapper-area-container,.gcsc-branding,.gsc-above-wrapper-area,.gs-image,.gsc-thumbnail-inside,.gsc-url-top").css("display","none");

                        $scope.results=[];

                        angular.element(".gs-snippet").each(function(index){
                            $scope.results.push($(this).text().replace(/"/g, ''));
                        });

                        $timeout(function() {

                            angular.element("#search_result_1").text($scope.results[0]);
                            angular.element("#search_result_2").text($scope.results[1]);

                        }, 2000);


                    }, 2000);

                }

            }]
        );

        topicApp.service('sharedProperties', function () {
            var property = 'First';

            return {
                getProperty: function () {
                    return property;
                },
                setProperty: function(value) {
                    property = value;
                }
            };
        });

        function Ctrl2($scope, sharedProperties) {
            $scope.prop2 = "Second";
            $scope.both = sharedProperties.getProperty() + $scope.prop2;
        }   

        $( document ).ready(function() {
            $("#myTapidDisplay").text(sessionStorage.tapid);
            $("#myPasswordDisplay").text(sessionStorage.mycookie);
            
            $(".ui-loader ").css("display","none");
            $('#input_search').watermark('Search');
            $('#topic1').watermark('Enter Your Topic (required)');
            $('#topic2').watermark('Enter Another Topic');
            $('#topic3').watermark('Enter Another Topic');

            function searchMe(keyword){

                $("#gsc-i-id1").val(keyword);
                $(".gsc-search-button").trigger( "click" );

                setTimeout(function(){refine()}, 3000);

            }

            function refine(){
                $(".gsc-cursor-box").css("display","none");
                $(".gsc-search-box,#resInfo-0,.gsc-above-wrapper-area-container,.gcsc-branding,.gsc-above-wrapper-area,.gs-image,.gsc-thumbnail-inside,.gsc-url-top").css("display","none");

                var $results=[];
                    $(".gs-snippet").each(function(index){
                    $results.push($(this).text().replace(/"/g, ''));
                });

                $("#search_result_1").text($results[0]);
                $("#search_result_2").text($results[1]);

            }
/*
            $("#topic1").keydown(function() {
              $("#submit").css("display","block");
            });
*/
            $("#dialog").dialog({autoOpen:false});

            //get topic from url
            var urlTopic = getUrlParameter('topic');
            var urlImage = getUrlParameter('image');

            function getUrlParameter(sParam)
            {
                var sPageURL = window.location.search.substring(1);
                var sURLVariables = sPageURL.split('&');
                for (var i = 0; i < sURLVariables.length; i++) 
                {
                    var sParameterName = sURLVariables[i].split('=');
                    if (sParameterName[0] == sParam) 
                    {
                        return sParameterName[1];
                    }
                }
            }

            if(urlTopic){
                $("#submit").css("display","block");
                if(sessionStorage.refTopic1==undefined){
                    sessionStorage.refTopic1=urlTopic;
                    $("#topic1").val(sessionStorage.refTopic1);
                }else if(sessionStorage.refTopic2==undefined){
                    sessionStorage.refTopic2=urlTopic;
                    $("#topic1").val(sessionStorage.refTopic1);
                    $("#topic2").val(sessionStorage.refTopic2);
                }else if(sessionStorage.refTopic3==undefined){
                    sessionStorage.refTopic3=urlTopic;
                    $("#topic1").val(sessionStorage.refTopic1);
                    $("#topic2").val(sessionStorage.refTopic2);
                    $("#topic3").val(sessionStorage.refTopic3);
                }
                
            }

            if(urlImage){
                if(sessionStorage.refImage1==undefined){
                    sessionStorage.refImage1=urlImage;
                    sessionStorage.refTopic1=urlImage;
                    $("#image1").css("height","100px");
                    $("#image1").attr("src",sessionStorage.refImage1);
                }else if(sessionStorage.refImage2==undefined){
                    sessionStorage.refImage2=urlImage;
                    sessionStorage.refTopic2=urlImage;
                    $("#image1").css("height","100px");
                    $("#image2").css("height","100px");
                    $("#image1").attr("src",sessionStorage.refImage1);
                    $("#image2").attr("src",sessionStorage.refImage2);
                }else if(sessionStorage.refImage3==undefined){
                    sessionStorage.refImage3=urlImage;
                    sessionStorage.refTopic3=urlImage;
                    $("#image1").css("height","100px");
                    $("#image2").css("height","100px");
                    $("#image3").css("height","100px");
                    $("#image1").attr("src",sessionStorage.refImage1);
                    $("#image2").attr("src",sessionStorage.refImage2);
                    $("#image3").attr("src",sessionStorage.refImage3);
                }
                $("#topic1,#topic2,#topic3").hide();
                $("#submit").css("display","block");
            }
                        
        });
        
        var chatActive = "no";
        var voiceActive = "no";
        function openPad(){
            $("#pad").css("height","400px");
        }
        function togglePad(){
            $('#chat').insertAfter('#pad');
            if($("#pad").css("height")=="0px"){
                $("#pad").css("height","400px");
                $("#pad").css("margin-left","auto");
                $("#pad").css("margin-right","auto");
            }
        }
        function toggleChat(){
            $('#chat').insertBefore('#pad');
        }
        function openChat(){
            $("#chatContainer").show();
        }
        function numberFormat(){
            $('.number').text(function(i, text) {
                return text.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
            });
        }
        /*
        function showImages(){
            $('.topic-button').text(function(i, html) {
                var tempText = $.trim(html);
                tempText=tempText.substring(0,4);
                console.log("html="+tempText.substring(0,4));
                if(tempText=="http"){
                    //console.log("text="+$.trim(text));
                    return "<img src='"+html+"' />";
                }
            });
        }*/
        function showImages(){
            $('.topic-button').each(function(index) {
                //console.log( index + ": " + $( this ).text() );
                var thisHTML=$(this).html();
                var tempText = $.trim(thisHTML);
                var tempText2 = tempText;
                tempText=tempText.substring(0,4);
                //console.log("html="+tempText.substring(0,4));
                if(tempText=="http"){
                    //console.log("text="+$.trim(text));
                    $(this).html("<img src='"+tempText2+"' style='height:50px;width:100%;' />");
                    $(this).css("padding","2px").css("height","56px");
                    $("#myIdDisplay").parent().css("height","86px");
                }
            }); 
        }
        function confirmCall(id2call,buttonObj,topicinit){
            //$(this).parent().parent().children().eq(0).text().trim(); is the first topic
            //if ($(buttonObj).hasClass("available")){
            var r=confirm("Do you want to call about these topics?");
            if (r == true) {
                //mark tapid and topics as chatting so that noone else can connect ensuring one 2 one
                //$(buttonObj).addClass("chatting");

                var t1 = $(buttonObj).parent().parent().children().eq(0).text().trim();
                var t2 = $(buttonObj).parent().parent().children().eq(1).text().trim();
                var t3 = $(buttonObj).parent().parent().children().eq(2).text().trim();

                $.ajax({url:"stateUpdate.php?topic="+t1+'&state=chatting'});
                $.ajax({url:"stateUpdate.php?topic="+t2+'&state=chatting'});
                $.ajax({url:"stateUpdate.php?topic="+t3+'&state=chatting'});

                $("#callchat").css("display","block");
                $("#buttonOpenPad").css("display","block");
                togglePad();
                
                if(sessionStorage.topic1){
                    //do nothing
                }else{
                    voiceActive = "yes";
                    //get cookie
                    var newCookie = makeIDonClick();
                    //load phone
                    $("#phoneBox").attr("src","flashphone/index.php?c="+newCookie);
                    //put load function here
                    $("#phoneBox").load(function(){
                      //confirmChat(chosenTapid,buttonObj);
                      var $f = $("#phoneBox");
                        var chosenTapid2 = $f[0].contentWindow.red5phone_getConfig().tapid;
                        $("#chatBox").attr("src","index_chat.php?tapid="+chosenTapid2+"&topic="+id2call+"&topicinit="+topicinit);
                        openChat();
                        chatActive = "yes";
                        //$http({method: 'GET', url: 'stateUpdate.php?topic='+chosenTopic+'&state=pending'});
                        //$.ajax({url:"stateUpdate.php?topic="+chosenTopic+'&state=pending'});

                    });
                }
            }

            /*
        }else{
            alert("connection is busy");
        }*/

        }

        function openDialog(myTapid,id2call,buttonObj){

            var t1 = $(buttonObj).parent().parent().children().eq(0).text().trim();
            var t2 = $(buttonObj).parent().parent().children().eq(1).text().trim();
            var t3 = $(buttonObj).parent().parent().children().eq(2).text().trim();
            $("#dialog").dialog("open");

        }

        function callTapId(id2call){

            //alert("tapid to call="+id2call);

            var targetTapid = id2call.replace(/-/g, "");

            var u=confirm("Do you want to call about these topics?");
            if (u == true) {
                $("#callchat").css("display","block");
                $("#buttonOpenPad").css("display","block");
                togglePad();

                if(sessionStorage.topic1){
                    var $x = $("#phoneBox");
                    var chosenTapid4 = $x[0].contentWindow.red5phone_getConfig().tapid;
                    $("#chatBox").attr("src","index_chat.php?chatter="+chosenTapid4+"&chatee="+targetTapid+"&topicinit=notopic");
                    openChat();
                    //toggleChat();
                    chatActive = "yes";

                    
                    $("#phoneBox").attr("src","flashphone/index.php?c="+sessionStorage.mycookie+"&callee="+targetTapid);

                }else{
                    voiceActive = "yes";
                    //get cookie
                    var newCookie = makeIDonClick();
                    //load phone
                    $("#phoneBox").attr("src","flashphone/index.php?c="+newCookie+"&callee="+targetTapid);
                    //put load function here
                    $("#phoneBox").load(function(){

                        var $j = $("#phoneBox");
                        var chosenTapid5 = $j[0].contentWindow.red5phone_getConfig().tapid;
                        $("#chatBox").attr("src","index_chat.php?chatter="+chosenTapid5+"&chatee="+targetTapid+"&topicinit=notopic");
                        openChat();
                        //toggleChat();
                        chatActive = "yes";

                    });
                }
            }

        }

        function confirmChat(myTapid,buttonObj){
            if ($(buttonObj).hasClass("available")){
                //store topic somewhere so that on close that topic can be set to available
                var topicinit = $.trim($(buttonObj).text());
                var targetTapid = $(buttonObj).parent().parent().parent().children(":eq(0)").text();
                targetTapid = targetTapid.replace(/-/g, "");

                $("#myChosenTopicDisplay").text(topicinit);

                var r=confirm("Do you want to chat about these topics?");
                if (r == true) {
                    //mark tapid and topics as chatting so that noone else can connect ensuring one 2 one
                    //$(buttonObj).addClass("chatting");

                    $.ajax({url:"stateUpdate.php?topic="+topicinit+'&state=pending'});

                    $("#callchat").css("display","block");
                    $("#buttonOpenPad").css("display","block");
                    togglePad();
                    
                    if(sessionStorage.topic1){
                        //console.log("session storage is true");
                        var $z = $("#phoneBox");
                        var chosenTapid3 = $z[0].contentWindow.red5phone_getConfig().tapid;
                        $("#chatBox").attr("src","index_chat.php?chatter="+chosenTapid3+"&chatee="+targetTapid+"&topicinit="+topicinit);
                        openChat();
                        toggleChat();
                        chatActive = "yes";
                    }else{
                        //console.log("session storage is false");
                        voiceActive = "yes";
                        //get cookie
                        var newCookie = makeIDonClick();
                        //load phone
                        $("#phoneBox").attr("src","flashphone/index.php?c="+newCookie);
                        //put load function here
                        $("#phoneBox").load(function(){
                          //confirmChat(chosenTapid,buttonObj);
                          var $f = $("#phoneBox");
                            var chosenTapid2 = $f[0].contentWindow.red5phone_getConfig().tapid;
                            $("#chatBox").attr("src","index_chat.php?chatter="+chosenTapid2+"&chatee="+targetTapid+"&topicinit="+topicinit);
                            openChat();
                            toggleChat();
                            chatActive = "yes";
                            //$http({method: 'GET', url: 'stateUpdate.php?topic='+chosenTopic+'&state=pending'});
                            //$.ajax({url:"stateUpdate.php?topic="+chosenTopic+'&state=pending'});

                        });
                    }
                }

            }else{
                alert("chat is busy");
            }

        }

        function startChat(myTapid,buttonObj){
  
                //store topic somewhere so that on close that topic can be set to available
                var topicinit = $.trim($(buttonObj).text());
                var targetTapid = $(buttonObj).parent().parent().parent().children(":eq(0)").text();
                targetTapid = targetTapid.replace(/-/g, "");

                $("#myChosenTopicDisplay").text(topicinit);

                var r=confirm("Do you want to chat about these topics?");
                if (r == true) {
                    //mark tapid and topics as chatting so that noone else can connect ensuring one 2 one
                    //$(buttonObj).addClass("chatting");
                    
                    //reset topics on starting chat
                    if(sessionStorage.topic1!=topicinit){
                        $.ajax({url:"stateUpdate.php?topic="+sessionStorage.topic1+'&state=available'});
                    }
                    if(sessionStorage.topic2!=topicinit){
                        $.ajax({url:"stateUpdate.php?topic="+sessionStorage.topic2+'&state=available'});
                    }
                    if(sessionStorage.topic3!=topicinit){
                        $.ajax({url:"stateUpdate.php?topic="+sessionStorage.topic3+'&state=available'});
                    }

                    $.ajax({url:"stateUpdate.php?topic="+topicinit+'&state=chatting'});
                    

                    voiceActive = "yes";
                    //get cookie
                    
                      //confirmChat(chosenTapid,buttonObj);
                      var $f = $("#phoneBox");
                        var chosenTapid2 = $f[0].contentWindow.red5phone_getConfig().tapid;
                        $("#chatBox").attr("src","index_chat.php?chatter="+chosenTapid2+"&chatee="+targetTapid+"&topicinit="+topicinit);
                        openChat();
                        chatActive = "yes";
                        //$http({method: 'GET', url: 'stateUpdate.php?topic='+chosenTopic+'&state=pending'});
                        //$.ajax({url:"stateUpdate.php?topic="+chosenTopic+'&state=pending'});

                }

        }

        function requestChat(chosenTapid,chosenTopic){
            //var chosenTopic = $.trim($(buttonObj).text());
            $("#myChosenTopicDisplay").text(chosenTopic);
            //console.log("chosenTopic ="+chosenTopic);
            var q=confirm("Do you want to chat about "+chosenTopic+"?");
            if (q == true) {
                //$(buttonObj).addClass("pending");
                $("#callchat").css("display","block");
                $("#buttonOpenChat").css("display","block");
                $("#chatBox").attr("src","index_chat.php?chatter="+chosenTapid+"&chatee="+chosenTopic);
                openChat();
                chatActive = "yes";
                //$http({method: 'GET', url: 'stateUpdate.php?topic='+chosenTopic+'&state=pending'});
                $.ajax({url:"stateUpdate.php?topic="+chosenTopic+'&state=pending'});
            }
        }

        function makeIDonClick()
            {
                var text2 = "";
                var possible2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for( var m=0; m < 23; m++ )
                    text2 += possible2.charAt(Math.floor(Math.random() * possible2.length));

                return text2;
            }

        //runs when browser is refreshed and closed
        $(window).on('beforeunload', function(){
            
            var nocache = new Date().getTime();

            var tempMyID = $("#myTapidDisplay").text();
            $.ajax({url:"removeTopics.php?t="+tempMyID+"&cache="+nocache});
            var tempTopic = $("#myChosenTopicDisplay").text();
            $.ajax({url:"stateUpdate.php?topic="+tempTopic+"&state=available&cache="+nocache});

            

            //if no local data then destroytapid
            if(sessionStorage.topic1){
                //do nothing
            }else{
                
                $.ajax({url:"flashphone/destroytapid.php?t="+tempMyID+"&cache="+nocache});
            }
            
            //return "Are you sure you want to leave?";
        });


        (function() {
            var cx = '014075365742795005565:u_j5gof9ikc';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                '//www.google.com/cse/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
          })();
          
    </script>

</head>

<body ng-controller="topicCtrl" style="height:100%;">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div class="logo-container">
                <a class="navbar-brand scrollto" href="#home"><img src="images/logo.gif" alt="TopicB" /></a>
            </div>
        </div>
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <!--<li id="navTalk"><a class="scrollto" href="#phonepad" id="nav_connect">Talk</a></li>-->
            <li id="navTopics"><a class="scrollto" href="#hottopics">Topics</a></li>
            <li id="navCategories"><a class="scrollto" href="#categories">Categories</a></li>
            <li id="navHowTo"><a class="scrollto" href="#howto">How To Use</a></li>
            <!--<li id="navAbout"><a class="scrollto" href="#about">About</a></li>-->
            <li id="navCode"><a class="scrollto" href="#getCode">Put This on Your Site</a></li>
            <li id="nav-search" class="search-box"><form ng-submit="filterTopic(inputValue)"><input id="input_search" ng-model="inputValue" class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset search-input" type="text"></form></li><i id="nav-search-icon" class="fa fa-search" ng-click="filterTopic(inputValue)"></i>
          </ul>
        </div>
      </div>
    </div>

      <div id="home" class="starter-template">
        <div class="topic-input-container">

            <form id="TopicSubmitForm" class="form-inline" ng-submit="callCreateTapid(myTopics)" ng-controller="TopicSubmitController">
                <div class="form-group">
                    <input id="topic1" type="text" data-ng-model="myTopics.topic1" name="form.topic1" class="form-control topic-input" maxlength="16" autofocus />
                </div>
                <div class="form-group">
                    <input id="topic2" type="text" data-ng-model="myTopics.topic2" name="form.topic2" class="form-control topic-input" maxlength="16" />
                </div>
                <div class="form-group">
                    <input id="topic3" type="text" data-ng-model="myTopics.topic3" name="form.topic3" class="form-control topic-input" maxlength="16" />
                </div>

                <div>
                    <img id="image1" src="" style="height:0px;margin:10px;" />
                    <img id="image2" src="" style="height:0px;margin:10px;" />
                    <img id="image3" src="" style="height:0px;margin:10px;" />
                </div>

                <div class="form-group">
                  <input type="submit" id="submit" value="GO" class="btn btn-primary btn-s btn-submit" ng-click="submit" />
                </div>
            </form>

      </div>

    </div>

        <div style="clear:both;"></div>

    <div class="topics" ng-controller="TopicSubmitController" style="display:none;" id="myTopicsDisplay">

    <ul>
        <li class="imgs row">

            <div class="number" id="myIdDisplay" style="text-align:center;">
                My ID: 
            </div>

            <ul ng-model="myTopics" style="text-align:center;">
                <li class="column">
                  <a class="btn btn-primary btn-s topic-button" id="topic1button" onclick="startChat($(this).parent().parent().parent().children(':first-child').text(),$(this))">
                    this is topic 1
                  </a>
                  <img id="topic1icon" src="images/pending.png" style="width:16px;height:16px;visibility:hidden;margin-left:-15px;margin-top:-28px;" alt="pending" />
                </li>
                <li class="column">
                  <a class="btn btn-primary btn-s topic-button" id="topic2button" onclick="startChat($(this).parent().parent().parent().children(':first-child').text(),$(this))">
                    this is topic 2
                  </a>
                  <img id="topic2icon" src="images/pending.png" style="width:16px;height:16px;visibility:hidden;margin-top:-28px;" alt="pending" />
                </li>
                <li class="column">
                  <a class="btn btn-primary btn-s topic-button" id="topic3button" onclick="startChat($(this).parent().parent().parent().children(':first-child').text(),$(this))">
                    this is topic 3
                  </a>
                  <img id="topic3icon" src="images/pending.png" style="width:16px;height:16px;visibility:hidden;margin-top:-28px;" alt="pending" />
                </li>
            </ul>

        </li>
    </ul>

</div>
<div style="clear:both;"></div>
    <div>
        <ul id="hottopics" >
            <li class="row hottopic-row">

              <div class="hottopic-row-title">
                    <i class="fa fa-fire"></i> HotTopics
                  </div>
              <div style="clear:both;"></div>

              <ul class="row_hot" id="imgs2" style="background:none;">
                <li ng-repeat="whatever2 in hotlist|filter:'!blank'|limitTo:10 track by $index">

                  <div class="hottopic-container" ng-controller="ScrollController">
                    <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(whatever2.topic)">
                        {{whatever2.topic}}
                    </a>
                  </div>
           
                </li>

              </ul>

            </li>
        </ul>
    </div>

<div style="clear:both;"></div>

<div id="contentTopics" class="topics">

    <ul id="content" ng-model="numbers">
        <li ng-repeat="whatever in numbers|filter:filterTapId" class="imgs row">
            <div class="number" onclick="callTapId($(this).text())">{{whatever.tapid}}</div>
            <!--<div class="number" onclick="alert('Please choose a topic.')">{{whatever.tapid}}</div>-->
            <div style="clear:both;"></div>

            <ul data-ng-show="whatever" class="row_topic">
                <li ng-repeat="topics in whatever.topics|filter:'!blank' track by $index" ng-controller="ScrollController" class="column">
                  <a class="scrollto ui-link btn btn-primary btn-s topic-button {{topics.chatstate}}" onclick="confirmChat($(this).parent().parent().parent().children(':first-child').text(),$(this),$(this))" >
                    {{topics.topic}}
                  </a>
                </li>
            </ul>

        </li>
    </ul>

</div>

    <section id="callchat" style="background:none;margin:10px auto;text-align:center;display:none;">

        <div style="width:100%;">
            <div id="buttonOpenPad" class="container" onClick="togglePad();" style="text-align:center;width:50%;height:50px;float:left;margin-top:20px;">

                <a class="ui-link btn btn-primary btn-s btn-connect"><img src="images/phone.png" style="margin:-5px 5px 0px 0px;" />TopicB Phone</a>

            </div>
            <div id="buttonOpenChat" class="container" onClick="toggleChat()" style="text-align:center;float:left;height:50px;display:block;width:50%;margin-top:20px;">

                <a class="ui-link btn btn-primary btn-s btn-connect"><img src="images/chat.png" style="margin:-7px 5px 0px 0px;" />Chat</a>

            </div>
            <div style="clear:both;"></div>
        </div>

    </section> 

    <section id="chat" class="section-chat" ng-controller="ScrollController">
        
        <div id="chatContainer" class="container" style="display:none;">

                <div style="display:none;">
                    <gcse:search></gcse:search>
                </div>

                <div class="search-result-box">
                    
                    <div id="search_result_1" class="search-result-text">
                    </div>

                </div>
                <div class="search-result-box">
                    
                    <div id="search_result_2" class="search-result-text">
                    </div>

                </div>

                <iframe id="chatBox" src=""></iframe>

        </div>

    </section>

    <section id="pad" style="margin:10px auto;text-align:center;margin-top:10px;width:246px;height:0px;">
        <iframe id="phoneBox" src="" scrolling="no" width="246" height="400" border="0" style="width:246px;height:400px;border:none;"></iframe>
    </section> 

    

    <section id="ad" class="navbar-fixed-bottom section-ad">

        <div class="container">

            <img src="images/ad.jpg" class="ad-img" alt="ad" />

        </div>

    </section>  


    <section id="categories" class="section-categories">

        <div class="container">

            <div class="scrollimation fade-left">
                <h2>Categories</h2>

                <div class="categories-container">
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('food')">
                            food
                        </a>
                    </div>
                </div>
            
            </div>

        </div>

    </section>

    <section id="howto" class="section-howto">

        <div class="container">

            <div class="scrollimation fade-left" >
                <h2>How To Use</h2>

                <h3>
                    TopicB helps people create conversations on topics through voice and chat.
                </h3>

                <h4>
                    1. Create by entering at least one topic.
                    </h4>
                    <h5>
                    Your topics will be created for other people to connect to.
                </h5>

               
                    <div style="float:left;margin-top:55px;color:#317eac;">
                        <i class="fa fa-arrow-right" style="font-size:30px;"></i>
                    </div>
                    <div>
                        <img src="images/howto1.jpg" alt="enter a topic" />
                    </div>
                
                <br>
                <br>

                <h4>
                    2. Click on a topic.</h4>
                    <h5>
                    You can click on someone else's topic and start chatting or talking with them.
                </h5>
                

             
                    <div style="float:left;margin-top:20px;color:#317eac;">
                        <i class="fa fa-arrow-right" style="font-size:30px;"></i>
                    </div>
                    <div>
                        <img src="images/howto2.jpg" alt="click on a topic" />
                    </div>
               
                <br>
                <br>

                <h4>
                    3. Click on a number.
                </h4>
                <h5>
                    You can click on a number to talk to someone about the topics under that number.
                </h5>

             
                    <div style="float:left;margin-top:-3px;color:#317eac;">
                        <i class="fa fa-arrow-right" style="font-size:30px;"></i>
                    </div>
                    <div>
                        <img src="images/howto2.jpg" alt="click on a number" />
                    </div>
                    <div style="clear:both;"></div>
                    <h5>Click "allow" on the phone pad.</h5>
                    <div>
                        <img src="images/howto4.jpg" alt="click allow">
                    </div>
                    <h5>Dial the number for the topic you would like to talk about.</h5>
                    <div>
                        <img src="images/howto5.jpg" alt="enter the number" />
                    </div>
                    <div style="clear:both;"></div>
            
                <br>
                <br>

                <h4>
                    4. Click on a Hot Topic for more information about that topic.
                    </h4>
                    <h5>
                    You can click on a Hot Topic and more information will be shown below.
                </h5>

             
                    <div style="float:left;margin-top:18px;color:#317eac;">
                        <i class="fa fa-arrow-right" style="font-size:30px;"></i>
                    </div>
                    <div>
                        <img src="images/howto3.jpg" alt="click on hot topic" />
                    </div>
                
                <br>
                <br>
            
            </div>

        </div>

    </section>

    <section id="partners" class="section-getcode" style="display:none;">

        <div class="container">

            <div class="scrollimation fade-left">
                <h2>TopicB Partners</h2>

                <div>
                    <img src="images/partners/littleuncle.png" />
                </div>
            
            </div>

        </div>

    </section>

    <section id="getCode" class="section-getcode">

        <div class="container">

            <div class="scrollimation fade-left">
                <h2>Put TopicB on Your Site</h2>

                <h3>
                    Copy the code below and paste into your website.
                </h3>
                <div>
                    <pre><code>
                        &lt;iframe width=&quot;320&quot; height=&quot;540&quot; src=&quot;http://topicb.com&quot; style=&quot;width:320px;height:540px;border:none;&quot;&gt;&lt;/iframe&gt;
                    </code></pre>
                </div>
            
            </div>

        </div>

    </section>

<section id="privacy" style="display:none;">

        <div class="container">

            <div class="scrollimation fade-left" >
                <h1>Privacy and Terms of Service</h1>

                <h2>
                    1. Your Acceptance
                </h2>

                <p>
                    This is an agreement between TopicB, INC. a Washington corporation ("TopicB"), the owner and operator of www.TopicB.com (the "TopicB Site"), the TopicB software &amp; Services, and you ("you" or "You"), a user of the Service. BY USING THE SERVICE, YOU ACKNOWLEDGE AND AGREE TO THESE TERMS OF SERVICE, AND TOPICB'S PRIVACY POLICY, WHICH CAN BE FOUND AT <a class="scrollto" href="#privacypolicy">http://www.TopicB.com/#privacypolicy</a>, AND WHICH ARE INCORPORATED HEREIN BY REFERENCE. If you choose to not agree with any of these terms, you may not use the Service. 
                </p>

                <h2>
                    2. TopicB Service
                </h2>

                <p>
                    These Terms of Service apply to all users of the TopicB Service. Information provided by our users through the TopicB Service may contain links to third party websites that are not owned or controlled by TopicB. TopicB has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party websites. In addition, TopicB will not and cannot censor or edit the content of any third-party site. By using the Service, you expressly acknowledge and agree that TopicB shall not be responsible for any damages, claims or other liability arising from or related to your use of any third-party website. 
                </p>

                <h2>
                    3. TopicB Access
                </h2>

                <p>
                    A. Subject to your compliance with these Terms of Service, TopicB hereby grants you permission to use the Service, provided that: (i) your use of the Service as permitted is solely for your personal use, and you are not permitted to resell or charge others for use of or access to the Service, or in any other manner inconsistent with these Terms of Service; (ii) you will not duplicate, transfer, give access to, copy or distribute any part of the Service in any medium without TopicB's prior written authorization; (iii) you will not attempt to reverse engineer, alter or modify any part of the Service; and (iv) you will otherwise comply with the terms and conditions of these Terms of Service and Privacy Policy. 
                    <br>
                    <br>
B. In order to access and use the features of the Service, you acknowledge and agree that You or/and your machine what you are using provide TopicB with your input information such as Inputting Topics by yourself, your connection information and others such as IP address, Machine ID. We do not collect names, addresses or email addresses, phone number just internet connection information and machine ID. You are solely responsible for the status messages or/and voice that you submit and that are used on the TopicB Service. You must notify TopicB immediately of any breach of security or unauthorized use of your machine. Although TopicB will not be liable for your losses caused by any unauthorized use of your temporary account, you may be liable for the losses of TopicB or others due to such unauthorized use. And, TopicB has the right to stop the TopicB service to anyone at any time. TopicB provide IDs or telephone numbers on a temporary basis not intended for an extended use. TopicB defines what the time limit is for use.
<br>
<br>
C. You agree not to use or launch any automated system, including without limitation, "robots," "spiders," "offline readers," etc. or "load testers" such as wget, apache bench, mswebstress, httpload, blitz, Xcode Automator, Android Monkey, etc., that accesses the Service in a manner that sends more request messages or/and voice to the TopicB servers in a given period of time than a human can reasonably produce in the same period by using a TopicB application, and you are forbidden from ripping the content unless specifically allowed. Notwithstanding the foregoing, TopicB grants the operators of public search engines permission to use spiders to copy materials from the website for the sole purpose of creating publicly available searchable indices of the materials, but not caches or archives of such materials. TopicB reserves the right to revoke these exceptions either generally or in specific cases. While we don't disallow the use of sniffers such as Ethereal, tcpdump or HTTPWatch in general, we do disallow any efforts to reverse-engineer our system, our protocols, or explore outside the boundaries of the normal requests made by TopicB clients. We have to disallow using request modification tools such as fiddler or whisker, or the like or any other such tools activities that are meant to explore or harm, penetrate or test the site. You must secure our permission before you measure, test, health check or otherwise monitor any network equipment, servers or assets hosted on our domain. You agree not to collect or harvest any personally identifiable information, including IP address, from the Service, nor to use the communication systems provided by the Service for any commercial solicitation or spam purposes. You agree not to spam, or solicit for commercial purposes, any users of the Service. 
                </p>

                <h2>
                    4. Intellectual Property Rights
                </h2>

                <p>
                    The design of the TopicB Service along with TopicB created text, scripts, graphics, interactive features and the like, except Status Submissions (as defined below), and the trademarks, service marks and logos contained therein ("Marks"), are owned by or licensed to TopicB, subject to copyright and other intellectual property rights under United States and foreign laws and international conventions. The Service is provided to you AS IS for your information and personal use only. TopicB reserves all rights not expressly granted in and to the Service. You agree to not engage in the use, copying, or distribution of any of the Service other than expressly permitted herein, including any use, copying, or distribution of Status Submissions of third parties obtained through the Service for any commercial purposes. 
                </p>

                <h2>
                    5. User Status Submissions
                </h2>

                <p>
                    A. The TopicB Service allows TopicB users to submit status text and other communications submitted by you. These Status Submissions may be hosted, shared, and/or published as part of the TopicB Service, and may be visible to other users of the Service in their machine and which you have not expressly blocked. For clarity, direct messages, direct voice, location data and photos or files that you send directly to other TopicB users will only be viewable by those TopicB user(s) or group(s) you directly send such information; but Status Submissions such as your input topics may be globally viewed by TopicB users. Currently, we have no method of providing different levels of visibility of your Status Submissions among users - you acknowledge and agree that any Status Submissions may be globally viewed by users, so don't submit or post status messages such as your topics or profile photos that you don't want to be seen globally. A good rule of thumb is if you don't want the whole world to know something or see something, don't submit it as a Status Submission to the Service. You understand that whether or not such Status Submissions are published, TopicB does not guarantee any confidentiality with respect to any submissions. 
                    <br>
                    <br>
B. You shall be solely responsible for your own Status Submissions and the consequences of posting or publishing them. Because TopicB is only acting as a repository of data, user submitted statuses do not necessarily represent the views or opinions of TopicB, and TopicB makes no guarantees as to the validity, accuracy or legal status of any status. In connection with Status Submissions, you affirm, represent, and/or warrant that: (i) you own or have the necessary licenses, rights, consents, and permissions to use and authorize TopicB to use all patent, trademark, trade secret, copyright or other proprietary rights in and to any and all Status Submissions to enable inclusion and use of the Status Submissions in the manner contemplated by the Service and these Terms of Service; and (ii) you have the written consent, release, and/or permission of each and every identifiable individual person in the Status Submission to use the name or likeness of each and every such identifiable individual person to enable inclusion and use of the Status Submissions in the manner contemplated by the Service and these Terms of Service. To be clear: you retain all of your ownership rights in your Status Submissions, but you have to have the rights in the first place. However, by submitting the Status Submissions to TopicB, you hereby grant TopicB a worldwide, non-exclusive, royalty-free, sublicenseable and transferable license to use, reproduce, distribute, prepare derivative works of, display, and perform the Status Submissions in connection with the TopicB Service and TopicB's (and its successor's) business, including without limitation for promoting and redistributing part or all of the TopicB Service (and derivative works thereof) in any media formats and through any media channels. You also hereby grant each subscriber to your status on the TopicB Service a non-exclusive license to access your Status Submissions through the Service. The foregoing license granted by you terminates once you remove or delete a Status Submission from the TopicB Service. 
<br>
<br>
C. In connection with Status Submissions, you further agree that you will not: (i) submit material that is copyrighted, protected by trade secret or otherwise subject to third party proprietary rights, including privacy and publicity rights, unless you are the owner of such rights or have permission from their rightful owner to post the material and to grant TopicB all of the license rights granted herein; (ii) publish falsehoods or misrepresentations that could damage TopicB or any third party; (iii) submit material that is unlawful, obscene, defamatory, libelous, threatening, harassing, hateful, racially or ethnically offensive, or encourages conduct that would be considered a criminal offense, give rise to civil liability, violate any law, or is otherwise inappropriate; (iv) post advertisements or solicitations of business; (v) impersonate another person; (vi) send or store material containing software viruses, worms, Trojan horses or other harmful computer code, files, scripts, agents or programs; (vii) interfere with or disrupt the integrity or performance of the Service or the data contained therein; or (viii) attempt to gain unauthorized access to the Service or its related systems or networks. 
<br>
<br>
D. Adult content must be identified as such. TopicB does not endorse any Status Submission or any opinion, recommendation, or advice expressed therein, and TopicB expressly disclaims any and all liability in connection with Status Submissions. TopicB does not permit copyright infringing activities and infringement of intellectual property rights via its Service, and TopicB will remove all content and Status Submissions if properly notified that such content or Status Submission infringes on another's intellectual property rights. To file a copyright infringement notification, please send a written communication that includes substantially the following (see Section 512(c)(3) of the Digital Millennium Copyright Act): (i) A physical or electronic signature of a person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed; (ii) Identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works at a single online site are covered by a single notification, a representative list of such works; (iii) Identification of the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit the service provider to locate the material, including the mobile phone number of the TopicB user allegedly infringing the copyrighted work; (iv) Information reasonably sufficient to permit the service provider to contact the complaining party, such as an address, telephone number, and, if available, an electronic mail address at which the complaining party may be contacted; (v) A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law; and (vi) A statement that the information in the notification is accurate, and under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed. Such takedown notices may be emailed to support at TopicB.com. TopicB reserves the right to remove content and Status Submissions without prior notice. TopicB may also terminate a user's access to the Service, if they are determined to be a repeat infringer, or for any or no reason, including being annoying. A repeat infringer is a User who has been notified of infringing activity more than once and/or has had a Status Submission removed from the Service more than twice. An annoying person is anyone who is (capriciously or not) determined to be annoying by authorized TopicB employees, agents, subagents, superagents or superheros. TopicB also reserves the right to decide whether content or a Status Submission is appropriate and complies with these Terms of Service for violations other than copyright infringement and violations of intellectual property law, such as, but not limited to excessive length or limited interest. TopicB may remove such Status Submissions and/or terminate a User's access for uploading such material in violation of these Terms of Service at any time, without prior notice and at its sole discretion. 
<br>
<br>
E. You understand that when using the TopicB Service you will be exposed to Status Submissions from a variety of sources, and that TopicB is not responsible for the accuracy, usefulness, safety, or intellectual property rights of or relating to such Status Submissions, and that such Status Submissions are not the responsibility of TopicB. You further understand and acknowledge that you may be exposed to Status Submissions that are inaccurate, offensive, indecent, or objectionable, and you agree to waive, and hereby do waive, any legal or equitable rights or remedies you have or may have against TopicB with respect thereto, and agree to indemnify and hold TopicB, its officers, directors, employees, agents, affiliates, and/or licensors, harmless to the fullest extent allowed by law regarding all matters related to your use of the TopicB Service. 
<br>
<br>
F. TopicB permits you to link to materials on the Service for personal purposes only. TopicB reserves the right to discontinue any aspect of the TopicB Service at any time. 
                </p>
                <h2>
                    6. Warranty Disclaimer
                </h2>

                <p>
                    YOU AGREE THAT YOUR USE OF THE TOPICB SERVICE SHALL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, TOPICB, ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SERVICE AND YOUR USE THEREOF. TOPICB MAKES NO WARRANTIES OR REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THIS SERVICE'S CONTENT AND ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ANY (I) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT, (II) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF OUR SERVICE, (III) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, (IV) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM OUR SERVICE, (IV) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH OUR SERVICE THROUGH THE ACTIONS OF ANY THIRD PARTY, AND/OR (V) ANY ERRORS OR OMISSIONSIN ANY CONTENT OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE TOPICB SERVICE. TOPICB DOES NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY PRODUCT OR SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY THROUGH THE TOPICB SERVICE OR ANY HYPERLINKED WEBSITE OR FEATURED IN ANY USER STATUS SUBMISSION OR OTHER ADVERTISING, AND TOPICB WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES. AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN ANY ENVIRONMENT, YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE APPROPRIATE. AND AGAIN, USE THIS JUST FOR FUN.
                </p>
                <h2>
                    7. Limitation of Liability
                </h2>

                <p>
                    IN NO EVENT SHALL TOPICB, ITS OFFICERS, DIRECTORS, EMPLOYEES, OR AGENTS, BE LIABLE TO YOU FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES WHATSOEVER RESULTING FROM ANY (I) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT, (II) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF OUR SERVICE, (III) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, (IV) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM OUR SERVERS, (IV) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE, WHICH MAY BE TRANSMITTED TO OR THROUGH OUR SERVICE BY ANY THIRD PARTY, (V) ANY ERRORS OR OMISSIONS IN ANY CONTENT OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF YOUR USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE TOPICB CLIENT, WHETHER BASED ON WARRANTY, CONTRACT, TORT, OR ANY OTHER LEGAL THEORY, AND WHETHER OR NOT THE COMPANY IS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES, AND/OR (VI) THE DISCLOSURE OF INFORMATION PURSUANT TO THESE TERMS OF SERVICE OR PRIVACY POLICY. THE FOREGOING LIMITATION OF LIABILITY SHALL APPLY TO THE FULLEST EXTENT PERMITTED BY LAW IN THE APPLICABLE JURISDICTION. 
                    <br>
                    <br>
YOU SPECIFICALLY ACKNOWLEDGE THAT TOPICB SHALL NOT BE LIABLE FOR USER SUBMISSIONS OR THE DEFAMATORY, OFFENSIVE, OR ILLEGAL CONDUCT OF ANY THIRD PARTY AND THAT THE RISK OF HARM OR DAMAGE FROM THE FOREGOING RESTS ENTIRELY WITH YOU. 
The Service is controlled and offered by TopicB from its facilities in the United States of America. TopicB makes no representations that the TopicB Service is appropriate or available for use in other locations. Those who access or use the TopicB Service from other jurisdictions do so at their own volition and are responsible for compliance with local law. 
                </p>

                <h2>
                    8. Indemnity
                </h2>

                <p>
                    You agree to defend, indemnify and hold harmless TopicB, its parent corporation, officers, directors, employees and agents, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses (including but not limited to attorney's fees) arising from: (i) your use of and access to the TopicB Service; (ii) your violation of any term of these Terms of Service; (iii) your violation of any third party right, including without limitation any copyright, property, or privacy right; or (iv) any claim that one of your Status Submissions caused damage to a third party. This defense and indemnification obligation will survive these Terms of Service and your use of the TopicB Service. We don't support or encourage illegal consumption of alcohol or tobacco, so there. 
                </p>

                <h2>
                    9. Ability to Accept Terms of Service
                </h2>

                <p>
                    You affirm that you are either more than 16 years of age, or an emancipated minor, or possess legal parental or guardian consent, and are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations, and warranties set forth in these Terms of Service, and to abide by and comply with these Terms of Service. In any case, you affirm that you are at least 16 years old as the TopicB Service is not intended for children under 16. If you are under 16 years of age, you are not permitted to use the TopicB Service. You further represent and warrant that you are not located in a country that is subject to a U.S. Government embargo, or that has been designated by the U.S. Government as a” terrorist-supporting” country, and that you are not listed on any U.S. Government list of prohibited or restricted parties. TopicB is the developer of the Service, with an address at 999 Third Avenue, Suite 700, Seattle, WA 98104, info at TopicB.com.
                </p>

                <h2>
                    10. Assignment
                </h2>

                <p>
                    These Terms of Service, and any rights and licenses granted hereunder, may not be transferred or assigned by you, but may be assigned by TopicB without restriction. 
                </p>

                <h2>
                    11. General
                </h2>

                <p>
                    You agree that: (i) the TopicB Service shall be deemed solely based in Washington; (ii) the TopicB Service shall be deemed a passive server that does not give rise to personal jurisdiction over TopicB, either specific or general, in jurisdictions other than Washington; and (iii) that you agree to subject to the jurisdiction of Washington in the event of any legal dispute. These Terms of Service shall be governed by the internal substantive laws of the State of Washington, without respect to its conflict of laws principles. Any claim or dispute between you and TopicB that arises in whole or in part from the TopicB Service shall be decided exclusively by a court of competent jurisdiction located in King County, Washington. These Terms of Service, together with the Privacy Policy at http://www.TopicB.com/legal/#Privacy and any other legal notices published by TopicB, including, but not limited to an end user license agreement, shall constitute the entire agreement between you and TopicB concerning the TopicB Service. If any provision of these Terms of Service is deemed invalid by a court of competent jurisdiction, the invalidity of such provision shall not affect the validity of the remaining provisions of these Terms of Service, which shall remain in full force and effect. No waiver of any term of this these Terms of Service shall be deemed a further or continuing waiver of such term or any other term, and TopicB's failure to assert any right or provision under these Terms of Service shall not constitute a waiver of such right or provision. TopicB reserves the right to amend or modify these Terms of Service at any time, and it is your responsibility to review these Terms of Service for any changes. If you do not agree to the revised Terms, your only recourse is to discontinue the use of the TopicB Service. Your continued use of the TopicB Service following any amendment of these Terms of Service will signify your assent to and acceptance of its revised terms. YOU AND TOPICB AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE TOPICB SERVICE MUST COMMENCE WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION ACCRUES. OTHERWISE, SUCH CAUSE OF ACTION IS PERMANENTLY BARRED. 
                </p>

                <div id="privacypolicy"></div>
                
                <br>
                <h2>
                    Privacy Notice
                </h2>

                <p>
                    TopicB Inc. ("TopicB") recognizes that its customers, visitors and users, want to know what's up with privacy. TopicB provides this Privacy Policy to help you make an informed decision about whether to use or continue using the TopicB Site, TopicB Software and/or the TopicB Service. If you do not agree to our practices, please do not use the TopicB Site, TopicB Software,or TopicB Service. 
This Privacy Policy is incorporated into and is subject to the TopicB Terms of Service. Your use of the TopicB Site, TopicB Software and the TopicB Service and any personal information you provide on the TopicB Site or TopicB Service remains subject to the terms of this Privacy Policy and our Terms of Service. 
Please note that any Status Submissions or other content posted at the direction or discretion of users of the TopicB Service becomes published content and is not considered personally identifiable information subject to this Privacy Policy. 
                </p>

                <h2>
                    What Does This Privacy Policy Cover?
                </h2>

                <p>
                    This Privacy Policy is part of TopicB's Terms of Service and covers the treatment of user information, including personally identifying information, obtained by TopicB, including information obtained when you access the TopicB's Site, use the TopicB Service or any other software provided by TopicB. 
This Privacy Policy does not apply to the practices of companies that TopicB does not own or control, or to individuals whom TopicB does not employ or manage, including any of the third parties to which TopicB may disclose user information as set forth in this Privacy Policy.  
                </p>

                <h2>
                    The Information TopicB Collects
                </h2>

                <p>
                    TopicB may obtain the following types of information from or concerning you or your device, which may include information that can be used to identify you as specified below ("Personally Identifying Information"): 
                    <br>
                    <br>
<span style="font-weight:bold;">User Provided Information:</span> You provide certain Personally Identifiable Information, such as your mobile phone number, push notification name (if applicable), billing information (if applicable) and device information to TopicB when choosing to participate in various uses of the TopicB Service, such as registering as a user, updating your status or requesting status for your contacts. In order to provide the TopicB Service, TopicB will periodically access your address book or contact list on your device to locate the mobile phone numbers of other TopicB users ("in-network" numbers), or otherwise categorize other mobile phone numbers as "out-network" numbers, which are stored as one-way irreversibly hashed values. 
<br>
<br>
<span style="font-weight:bold;">Cookies Information:</span> When you visit the TopicB Site, we may send one or more cookies - a small text file containing a string of alphanumeric characters - to your computer that uniquely identifies your browser. TopicB uses both session cookies and persistent cookies. A persistent cookie remains after you close your browser. Persistent cookies may be used by your browser on subsequent visits to the site. Persistent cookies can be removed by following your web browser help file directions. A session cookie is temporary and disappears after you close your browser. You can reset your web browser to refuse all cookies or to indicate when a cookie is being sent. However, the TopicB Site may not function properly if the ability to accept cookies is disabled. 
<br>
<br>
<span style="font-weight:bold;">Log File Information:</span> When you use the TopicB Site, our servers automatically record certain information that your web browser sends whenever you visit any website. These server logs may include information such as your web request, Internet Protocol ("IP") address, browser type, browser language, referring / exit pages and URLs, platform type, number of clicks, domain names, landing pages, pages viewed and the order of those pages, the amount of time spent on particular pages, the date and time of your request, one or more cookies that may uniquely identify your browser, your phone number, ID number you are requesting the status of and various status information. When you use the TopicB Service, our servers log certain general information that our application sends whenever a message and/or voice is sent or received, or if you update or request any status information, including time and date stamps and the ID numbers the messages and/or voice were sent from and to.  
                </p>

                <h2>
                    The Information TopicB Does Not Collect
                </h2>

                <p>
                    TopicB does not collect names, emails, addresses or other contact information from its users' device address book or contact lists. 
                    <br>
                    <br>
The contents of messages that have been delivered by the TopicB Service are not copied, kept or archived by TopicB in the normal course of business. The TopicB Service is meant to be a SMS replacement, using data service through a user's device (either via cell network or wifi). Users type their messages, which are sent via data service to our servers, and routed to the intended recipient (who must also be a TopicB user or others), if that recipient is online. If the recipient is not online, the undelivered message is held in TopicB's server until it can be delivered. If the message is undelivered for thirty (1) days, the undelivered message is deleted from our servers. Once a message has been delivered, it no longer resides on our servers. The contents of any delivered messages are not kept or retained by TopicB — the only records of the content of any delivered messages reside directly on the sender's and recipient's mobile devices (and which may be deleted at the user's option). Notwithstanding the above, TopicB may retain date and time stamp information associated with successfully delivered messages and the ID numbers involved in the messages, as well as any other information which TopicB is legally compelled to collect. Files that are sent through the TopicB Service will reside on our servers after delivery for a short period of time, but are deleted and stripped of any identifiable information within a short period of time in accordance with our general retention policies. 
<br>
                    <br>
The contents of voices that have been delivered by the TopicB Service are not copied, kept or archived by TopicB in the normal course of business. The TopicB Service is meant to be a phone replacement, using data service through a user's device (either via cell network or wifi). Users talk their voice, which are sent via data service to our servers, and routed to the intended recipient (who must also be a TopicB user or others), if that recipient is online or ready to catch a phone call (if applicable). The contents of any voice call are not kept or retained by TopicB — the only records of the content of any delivered voice call reside directly on the sender's and recipient's devices (and which may be deleted at the user's option) (if applicable). Notwithstanding the above, TopicB may retain date and time stamp information associated with successfully real-time voice call and the ID numbers involved in the voice, as well as any other information which TopicB is legally compelled to collect. Files that are sent through the TopicB Service will reside on our servers after delivery for a short period of time, but are deleted and stripped of any identifiable information within a short period of time in accordance with our general retention policies. 
                </p>

                <h2>
                    The Way TopicB Uses Information
                </h2>

                <p>
                    If you submit Personally Identifiable Information to us through the TopicB Site, or TopicB Service, then we use your personal information to operate, maintain, and provide to you the features and functionality of the TopicB Site and TopicB Service. Any billing information that may be collected from you will be deleted thirty (30) days after the termination of your account with TopicB. Any Personally Identifiable Information or status content that you voluntarily disclose on the TopicB Service becomes publicly available and may be collected and used by other users of the TopicB Service (unless such user is blocked by you). We may, however, use your mobile phone number (or email address, if provided) without further consent for non-marketing or administrative purposes (such as notifying you of major TopicB Site or TopicB Service changes or for customer service purposes). We may use both your Personally Identifiable Information and certain non-personally-identifiable information (such as anonymous user usage data, cookies, IP addresses, browser type, clickstream data, etc.) to improve the quality and design of the TopicB Site and TopicB Service and to create new features, promotions, functionality, and services by storing, tracking, and analyzing user preferences and trends. Hopefully we improve the TopicB Site and Service and don't make it suck worse. We may use cookies and log file information to: (a) remember information so that you will not have to re-enter it during your visit or the next time you use the TopicB Service or TopicB Site; (b) provide custom, personalized content and information; (c) monitor individual and aggregate metrics such as total number of visitors, pages viewed, etc.; and (d) track your entries, submissions, views and such.  
                </p>

                <h2>
                    When TopicB Discloses Information
                </h2>

                <p>
                    Other users of the TopicB Service may see your Status Submissions in a way that is consistent with the use of the TopicB Service. For example, a status of "Can't talk, please SMS instead" set by phone number will be available to every user of the TopicB Service who has that ID number or contact list. 
                    <br>
                    <br>
We do not sell or share your Personally Identifiable Information such as mobile phone number (if applicable) with other third-party companies for their commercial or marketing use without your consent or except as part of a specific program or feature for which you will have the ability to opt-in or opt-out. We may share your Personally Identifiable Information with third party service providers to the extent that it is reasonably necessary to perform, improve or maintain the TopicB Service. We may share non-personally-identifiable information (such as anonymous User usage data, referring / exit pages and URLs, platform types, asset views, number of clicks, etc.) with interested third-parties to assist them in understanding the usage patterns for certain content, services, advertisements, promotions, and/or functionality on the TopicB Site. We may collect and release Personally Identifiable Information and/or non-personally-identifiable information if required to do so by law, or in the good-faith belief that such action is necessary to comply with state and federal laws (such as U.S. Copyright Law), international law or respond to a court order, subpoena, or search warrant or equivalent, or where in our reasonable belief, an individual's physical safety may be at risk or threatened. TopicB also reserves the right to disclose Personally Identifiable Information and/or non-personally-identifiable information that TopicB believes, in good faith, is appropriate or necessary to enforce our Terms of Service, take precautions against liability, to investigate and defend itself against any third-party claims or allegations, to assist government enforcement agencies, to protect the security or integrity of the TopicB Site or our servers, and to protect the rights, property, or personal safety of TopicB, our users or others. 
                </p>

                <h2>
                    Your Choices
                </h2>

                <p>
                    You may, of course, decline to submit Personally Identifiable Information through the TopicB Site or the TopicB Service, in which case TopicB may not be able to provide certain services to you. If you do not agree with our Privacy Policy or Terms of Service, please delete your account, uninstall the TopicB application and discontinue use of the TopicB Service; your continued usage of the TopicB Service will signify your assent to and acceptance of our Privacy Policy and Terms of Service. Please contact TopicB via email to support at topicb.com or available web forms with any questions or comments about this Privacy Policy, your personal information, your consent. 
                </p>

                <h2>
                    Third-party Advertisers, Links to Other Sites
                </h2>

                <p>
                    <a href="http://blog.whatsapp.com/?p=245" target="_blank">We are fans of advertising</a>. 
                </p>

                <h2>
                    Our Commitment To Data Security
                </h2>

                <p>
                    TopicB uses commercially reasonable physical, managerial, and technical safeguards to preserve the integrity and security of your personal information. We cannot, however, ensure or warrant the security of any information you transmit to TopicB and you do so at your own risk. Using unsecured wifi or other unprotected networks to submit messages through the TopicB Service is never recommended. Once we receive your transmission of information, TopicB makes commercially reasonable efforts to ensure the security of our systems. However, please note that this is not a guarantee that such information may not be accessed, disclosed, altered, or destroyed by breach of any of our physical, technical, or managerial safeguards. If TopicB learns of a security systems breach, then we may attempt to notify you electronically so that you can take appropriate protective steps. TopicB may post a notice on the TopicB Site or through the TopicB Service if a security breach occurs. 
                </p>

                <h2>
                    Our Commitment To Childrens' Privacy
                </h2>

                <p>
                    Protecting the privacy of young children is especially important. For that reason, TopicB does not knowingly collect or maintain Personally Identifiable Information or non-personally-identifiable information on the TopicB Site or TopicB Service from persons under 16 years of age, and no part of the TopicB Service is directed to or intended to be used by persons under 16. If you are under 16 years of age, then please do not use the TopicB Service or access the TopicB Site at any time or in any manner. If TopicB learns that Personally Identifiable Information of persons under 16 years of age has been collected on the TopicB Site or TopicB Service, then TopicB may deactivate the account and/or make the status submissions inaccessible (if applicable). 
                </p>

                <h2>
                    Special Note to International Users
                </h2>

                <p>
                    The TopicB Site and Service are hosted in the United States and are intended for and directed to users in the United States. If you are a user accessing the TopicB Site and Service from the European Union, Asia, or any other region with laws or regulations governing personal data collection, use, and disclosure, that differ from United States laws, please be advised that through your continued use of the TopicB Site and Service, which are governed by Washington law, this Privacy Policy, and our Terms of Service, you are transferring your personal information to the United States and you expressly consent to that transfer and consent to be governed by Washington law for these purposes. 
                </p>

                <h2>
                    In the Event of Merger, Sale, or Bankruptcy
                </h2>

                <p>
                    In the event that TopicB is acquired by or merged with a third party entity, we reserve the right to transfer or assign the information we have collected from our users as part of such merger, acquisition, sale, or other change of control. In the (hopefully) unlikely event of our bankruptcy, insolvency, reorganization, receivership, or assignment for the benefit of creditors, or the application of laws or equitable principles affecting creditors' rights generally, we may not be able to control how your personal information is treated, transferred, or used. 
                </p>

                <h2>
                    Changes and updates to this Privacy Notice
                </h2>

                <p>
                    This Privacy Policy may be revised periodically and this will be reflected by the "effective date" below. Please revisit this page to stay aware of any changes. Your continued use of the TopicB Site and TopicB Service constitutes your agreement to this Privacy Policy and any amendments. 
                    <br>
                    <br>
                    <br>

Date Last Modified:<br><br>
This Privacy Notice was last modified September 30th, 2014
                </p>
            
            </div>

        </div>

    </section>

<br>
<br>
<div style="text-align:center;">
<div onclick="$('#privacy').toggle();" style="color:#fff;cursor:pointer;">Privacy and Terms of Service</div>
&copy;copyright 2014 TopicB <a href="mailto:&#105;&#110;&#102;&#111;&#064;&#116;&#111;&#112;&#105;&#099;&#098;&#046;&#099;&#111;&#109;" style="color:#fff;">&#105;&#110;&#102;&#111;&#064;&#116;&#111;&#112;&#105;&#099;&#098;&#046;&#099;&#111;&#109;</a>
</div>
<br>
<br>

<div id="dialog" title="Dialog Title">
    Please choose a topic.
    
</div>

    <div>
    <div id="myTapidDisplay"></div>
    <div id="myPasswordDisplay"></div>
    <div id="myChosenTopicDisplay"></div>
</div>
<br>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-53853189-1', 'auto');
      ga('send', 'pageview');

    </script>


  </body>
</html>
