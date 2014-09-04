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
    <link rel="icon" href="../../favicon.ico">

    <title>TopicB</title>

    <link href="css/flexslider.css" rel="stylesheet">
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0-rc.2/angular-animate.min.js"></script>-->
    <!--<script src="js/angular.js"></script>-->
    <script src="js/swfobject.js"></script>
    <script src="js/ui-utils-0.1.1/ui-utils.js"></script>
    <script src="js/app.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="pp/prettiffy.css" rel="stylesheet">
    <script src="pp/prettify.js"></script>
    <script src="js/touchSwipe.js"></script>
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
    <link rel="stylesheet" href="css/idangerous.swiper.css">
    <script defer src="js/idangerous.swiper.js"></script>
    <script>

        var topicApp = angular.module('topicApp',['ui.utils'], function($locationProvider) {
          $locationProvider.html5Mode(true);
        });


        topicApp.controller('topicCtrl', function ($scope,$http,$location,$anchorScroll,$timeout){

            $scope.loadData = function () {
            $http({method: 'GET', url: 'getTopics.php'}).success(function(data) {
                $scope.numbers = data;
                $scope.loadDataHotList();
              });
            };

            $scope.loadData();

            $scope.loadDataHotList = function () {
            $http({method: 'GET', url: 'getHotTopics.php'}).success(function(data) {
                $scope.hotlist = data;
              });
            };

$scope.hotlist = $scope.numbers;

/*
//prefered format

            $scope.numbers = [
        {
            "tapid" : "2060000002",
            "topics" : [
            {
                "topic" : "hamburger",
                "status" : "available",
                "category" : "food"
            },
            {
                "topic" : "Mariners",
                "status" : "waiting",
                "category" : "sports"
            },
            {
                "topic" : "Ichiro",
                "status" : "available",
                "category" : "sports"
            },
            {
                "topic" : "Seattle",
                "status" : "available",
                "category" : "travel"
            },
            {
                "topic" : "Food Trucks",
                "status" : "available",
                "category" : "food"
            },
            {
                "topic" : "Profitability",
                "status" : "available",
                "category" : "business"
            },
            {
                "topic" : "Exit Strategy",
                "status" : "available",
                "category" : "business"
            },
            {
                "topic" : "Start Ups",
                "status" : "available",
                "category" : "business"
            },
            {
                "topic" : "Bootstrapping",
                "status" : "available",
                "category" : "business"
            },
            {
                "topic" : "Runway",
                "status" : "available",
                "category" : "business"
            },
            {
                "topic" : "VC",
                "status" : "available",
                "category" : "business"
            }
            ]
        },
        {
            "tapid" : "2060000001",
            "topics" : [
            {
                "topic" : "World Advertising Congress",
                "status" : "active",
                "category" : "advertising"
            },
            {
                "topic" : "Digital Strategies",
                "status" : "available",
                "category" : "technology"
            },
            {
                "topic" : "Multi-Channel Experience",
                "status" : "available",
                "category" : "technology"
            }
            ]   
        },
        {
            "tapid" : "2060000003",
            "topics" : [
            {
                "topic" : "Dark Souls 2",
                "status" : "active",
                "category" : "game"
            }
            ]
        },
        {
            "tapid" : "2060000004",
            "topics" : [
            {
                "topic" : "MBA",
                "status" : "available",
                "category" : "education"
            },
            {
                "topic" : "informations",
                "status" : "available",
                "category" : "technology"
            },
            {
                "topic" : "Business Management",
                "status" : "available",
                "category" : "education"
            }
            ]
        },
        {
            "tapid" : "2060000005",
            "topics" : [
            {
                "topic" : "COC",
                "status" : "active",
                "category" : "game"
            },
            {
                "topic" : "running",
                "status" : "waiting",
                "category" : "sports"
            }
            ]
        },
        {
            "tapid" : "2060000006",
            "topics" : [
            {
                "topic" : "UCLA",
                "status" : "active",
                "category" : "education"
            },
            {
                "topic" : "X-Men",
                "status" : "available",
                "category" : "game"
            }
            ]
        }

    ];
    $scope.hotlist = [
        {"topic" : "hamburger"},{"topic" : "hotdog"},{"topic" : "taco"}
    ];
*/
            $scope.topic_distance=0;
            $scope.tempWidth=0;


            $scope.scrollImages = function() {
                $scope.tempWidth = parseInt($("#imgs2 li div a").first().css("width"),10);
                console.log("temp width = "+$scope.tempWidth);
                $scope.topicWidth = $scope.tempWidth+10;
                console.log("topic width = "+$scope.topicWidth);

                $("#imgs2").css("transition-duration", "1s");
                //$("#imgs2").css("transform", "translate(-200px,0)");
                $("#imgs2").css("transform", "translate(-"+$scope.topicWidth+"px,0)");
                //$("#imgs2").
                console.log("positioned");
                $("#imgs2").one('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', 
                    function() {
                        $scope.topicShift();
                        console.log("shifted");
                        $("#imgs2").css("transition-duration", "0s");
                        $("#imgs2").css("transform", "translate(0px,0)");
                        console.log("re-positioned");
                        $scope.$apply();
                    }
                );

                console.log("done");
                
            }

            $scope.timerHotTopic = $.timer(function() {
                //console.log("timer called");
                $scope.scrollImages();
            });
            $scope.timerHotTopic.set({time:3000,autostart:true});
            console.log("timer set");

            

            $scope.resumeHotTopics = function(){  
                console.log("stopping");
                $scope.topic_distance=0;
                $scope.timerHotTopic.play();
            }

                    

            $scope.topicShift = function($myEvent){  
                console.log("shifting");
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
                console.log("temp="+temp);
                $scope.numbers[topicRow].topics.unshift(temp);

            }

            $scope.myTopic = $location.search()['topic'];

            $scope.widget = {inputValue: 'whatever'};

            $scope.filterTopic=function($mySearchWord){
                //alert("hello");
                console.log("$mySearchWord="+$mySearchWord);
                $scope.myTopic = $mySearchWord;
                
                angular.element("#search_result_1,#search_result_2").parent().show();
                angular.element("#search_result_1,#search_result_2").text("loading search results...");
                $location.hash('hottopics');

                // call $anchorScroll()
                $anchorScroll();
                console.log("start chat for "+$mySearchWord);
                
                angular.element("#gsc-i-id1").val($mySearchWord);
                angular.element(".gsc-search-button").trigger( "click" );
                
                console.log("search for "+$mySearchWord);

                $timeout(function() {
                    angular.element(".gsc-cursor-box").css("display","none");
                    angular.element(".gsc-search-box,#resInfo-0,.gsc-above-wrapper-area-container,.gcsc-branding,.gsc-above-wrapper-area,.gs-image,.gsc-thumbnail-inside,.gsc-url-top").css("display","none");

                    console.log("hiding gs stuff");

                    $scope.results=[];
                    console.log("constructed array");

                    angular.element(".gs-snippet").each(function(index){
                        $scope.results.push($(this).text().replace(/"/g, ''));
                    });
                    console.log("pushed results");

                    $timeout(function() {
                        console.log('update with timeout fired');
                        angular.element("#search_result_1").text($scope.results[0]);
                        angular.element("#search_result_2").text($scope.results[1]);
                        console.log("displayed results");
                    }, 2000);

                }, 2000);

            }
        });

        topicApp.controller('TopicSubmitController', function ($scope,$http,$timeout) {

            $scope.submitForm = function() {
                
                console.log("posting data....");
                $scope.myTopics.myID = "206-000-000"+(Math.floor(Math.random() * 10));
                $http.post('submitTopics.php', JSON.stringify($scope.myTopics)).success(function(){
                    console.log("success");
                    angular.element(".starter-template").html("<span class='message-create'>Thanks! Your topics have been created below.</span>");
                    $scope.loadData();
                });

            };

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
                    angular.element("#search_result_1,#search_result_2").parent().show();
                    angular.element("#search_result_1,#search_result_2").text("loading search results...");
                    $location.hash('hottopics');

                    $anchorScroll();
                    console.log("start chat for "+myChat);
                    
                    angular.element("#gsc-i-id1").val(myChat);
                    angular.element(".gsc-search-button").trigger( "click" );
                    
                    console.log("search for "+myChat);

                    $timeout(function() {
                        angular.element(".gsc-cursor-box").css("display","none");
                        angular.element(".gsc-search-box,#resInfo-0,.gsc-above-wrapper-area-container,.gcsc-branding,.gsc-above-wrapper-area,.gs-image,.gsc-thumbnail-inside,.gsc-url-top").css("display","none");

                        console.log("hiding gs stuff");

                        $scope.results=[];
                        console.log("constructed array");

                        angular.element(".gs-snippet").each(function(index){
                            $scope.results.push($(this).text().replace(/"/g, ''));
                        });
                        console.log("pushed results");

                        $timeout(function() {
                            console.log('update with timeout fired');
                            angular.element("#search_result_1").text($scope.results[0]);
                            angular.element("#search_result_2").text($scope.results[1]);
                            console.log("displayed results");
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

        $(".row_topic").each(function(){
            // Bind the swipeHandler callback function to the swipe event on div.box
            $(this).on("swipe",swipeHandler);

            // Callback function references the event target and adds the 'swipe' class to it
            function swipeHandler(event){
                //$( event.target ).addClass( "swipe" );
                $.event.special.swipe.start;
            };
        });
    </script>
    <script id='code_1'>
        var IMG_WIDTH = 180;
        var currentImg = 0;
        var maxImages = 10;
        var speed = 500;

        var imgs;

        var swipeOptions = {
            triggerOnTouchEnd: true,
            swipeStatus: swipeStatus,
            allowPageScroll: "vertical",
            threshold: 75
        };
/*
        $("ul.row_topic").each(function () {
            //imgs = $("#imgs");
            //imgs = $(this);
            $(this).swipe(swipeOptions);
        });
*/

    /**
     * Catch each phase of the swipe.
     * move : we drag the div
     * cancel : we animate back to where we were
     * end : we animate to the next image
     */
        function swipeStatus(event, phase, direction, distance) {
            //If we are moving before swipe, and we are going L or R in X mode, or U or D in Y mode then drag.
            if (phase == "move" && (direction == "left" || direction == "right")) {
                var duration = 0;

                if (direction == "left") {
                    scrollImages((IMG_WIDTH * currentImg) + distance, duration);
                } else if (direction == "right") {
                    scrollImages((IMG_WIDTH * currentImg) - distance, duration);
                }

            } else if (phase == "cancel") {
                scrollImages(IMG_WIDTH * currentImg, speed);
            } else if (phase == "end") {
                if (direction == "right") {
                    previousImage();
                } else if (direction == "left") {
                    nextImage();
                }
            }
        }

        function previousImage() {
            currentImg = Math.max(currentImg - 1, 0);
            scrollImages(IMG_WIDTH * currentImg, speed);
        }

        function nextImage() {
            currentImg = Math.min(currentImg + 1, maxImages - 1);
            scrollImages(IMG_WIDTH * currentImg, speed);
            
        }

        /**
         * Manually update the position of the imgs on drag
         */
         /*
        function scrollImages(distance, duration) {
            imgs.css("transition-duration", (duration / 1000).toFixed(1) + "s");

            //inverse the number we set in the css
            var value = (distance < 0 ? "" : "-") + Math.abs(distance).toString();
            imgs.css("transform", "translate(" + value + "px,0)");
        }
*/
        $( document ).ready(function() {
            //setInterval(function(){nextImage()},2000);
            $(".ui-loader ").css("display","none");
            $('#input_search').watermark('Search');
            $('#topic1').watermark('Enter Your Topic (required)');
            $('#topic2').watermark('Enter Another Topic');
            $('#topic3').watermark('Enter Another Topic');
            $("#chatBox").attr("src", "index_chat.php#end");
            
            //var tempID = "206-000-000"+(Math.floor(Math.random() * 10));
            //$('#myIDinput').attr("value","tempID");

            //setTimeout(function(){searchMe("phad thai")}, 3000);


            //$(".gsc-control-cse").css("display","none");


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

            // delete tapid on closing browser
            window.onbeforeunload = function (e) {
                var e = e || window.event;

                // For IE and Firefox prior to version 4
                if (e) {

                    e.returnValue = 'Any string';
                }

                // For Safari
                return 'Any string';
            };
            
            
                        
        });

        
        function openPad(){
            $("#buttonOpenPad").hide();
            $("#pad").show();
            $("#buttonOpenChat").show();
            $("#chatContainer").hide();
            $("#buttonOpenChat").css("float","none");
        }
        function openChat(){
            $("#buttonOpenPad").show();
            $("#pad").hide();
            $("#buttonOpenChat").hide();
            $("#chatContainer").show();
            $("#buttonOpenPad").css("float","none");
        }

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
          
          /*
          //handle swf file for communicator
            var flashvars = {
            };
            var params = {
                menu: "false",
                scale: "noScale",
                allowFullscreen: "true",
                allowScriptAccess: "always",
                bgcolor: "",
                wmode: "direct" // can cause issues with FP settings & webcam
            };
            var attributes = {
                id:"FlashPhone5"
            };
            swfobject.embedSWF(
                "FlashPhone5.swf", 
                "altContent", "100%", "100%", "10.0.0", 
                "expressInstall.swf", 
                flashvars, params, attributes);
                */
            //handle rest of communicator begin
            /*php
            $cookie = 1;
            
            $socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
            socket_connect( $socket, "127.0.0.1", 8010 );
            
            socket_write( $socket, "command=create_tap_id&cookie=$cookie" );
            
            $buf = socket_read( $socket, 2048 );
            #echo $buf;
            
            parse_str($buf, $array);
            
            socket_close( $socket );
            
            echo "strTapId = '".$array['tapid']."';\n";
            echo "strPassWord = '".$array['password']."';\n";
            ?>*/
            /*
                    function red5phone_getConfig()
                    {
                        var callee = '';
                    
                        return {
                            callee: callee,
                            tapid: strTapId,
                            password: strPassWord
                        };
                    }
            //handle rest of communicator end
*/
    </script>

</head>

<body ng-controller="topicCtrl" ng-init="myVar='test'">

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
            <li id="navTalk"><a class="scrollto" href="#phonepad" id="nav_connect">Talk</a></li>
            <li id="navTopics"><a class="scrollto" href="#hottopics">Topics</a></li>
            <li id="navCategories"><a class="scrollto" href="#categories">Categories</a></li>
            <!--<li id="navCommunicator"><a class="scrollto" href="#communicator">Communicator</a></li>-->
            <li id="navAbout"><a class="scrollto" href="#about">About</a></li>
            <li id="navCode"><a class="scrollto" href="#getCode">Put This on Your Site</a></li>
            <li id="nav-search" class="search-box"><form ng-submit="filterTopic(inputValue)"><input id="input_search" ng-model="inputValue" class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset search-input" type="text"></form></li><i id="nav-search-icon" class="fa fa-search" ng-click="filterTopic(inputValue)"></i>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" id="home">
<br>

version .201

      <div class="starter-template">
        <div class="topic-input-container">

            <form class="form-inline" ng-submit="submitForm(myTopics)" ng-controller="TopicSubmitController">
                <div class="form-group">
                    <input id="topic1" type="text" data-ng-model="myTopics.topic1" name="form.topic1" class="form-control topic-input" maxlength="16" />
                </div>
                <div class="form-group">
                    <input id="topic2" type="text" data-ng-model="myTopics.topic2" name="form.topic2" class="form-control topic-input" maxlength="16" />
                </div>
                <div class="form-group">
                    <input id="topic3" type="text" data-ng-model="myTopics.topic3" name="form.topic3" class="form-control topic-input" maxlength="16" />
                </div>
                <div class="form-group">
                  <input type="submit" id="submit" value="" class="topic-submit" ng-click="submit" />
                </div>
            </form>

        </div>

      </div>

    </div>

    <!-- hot topics -->
    <!--
    <div id="hottopics">
        <ul ng-model="numbers">
            <li class="row hottopic-row">

              <div class="number hottopic-row-title">
                <i class="fa fa-fire"></i> HotTopics
              </div>
              <div style="clear:both;"></div>

              <ul class="row_hot" id="imgs2" style="background:none;" data-ng-show="whatever" >
                <li ng-repeat="topics in whatever.topics|limitTo:10 track by $index">

                  <div class="number hottopic-container" ng-controller="ScrollController" >
                    <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(topics.topic)">
                        {{topics.topic}}
                    </a>
                  </div>
           
                </li>
              </ul>

            </li>
        </ul>
    </div>
-->

<div>
    <ul id="hottopics" ><!-- $('#hottopics').scope().numbers; -->
        <li class="row hottopic-row">

          <div class="number hottopic-row-title">
                <i class="fa fa-fire"></i> HotTopics
              </div>
          <div style="clear:both;"></div>

          <ul class="row_hot" id="imgs2" style="background:none;">
            <li ng-repeat="whatever2 in hotlist|limitTo:10 track by $index">

              <div class="number hottopic-container" ng-controller="ScrollController" >
                <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(whatever2.topic)">
                {{whatever2.topic}}
            </a>
              </div>
       
            </li>
        </ul>
          </ul>

        </li>
    </ul>
</div>

    <div style="clear:both;"></div>
<!--
    <div id="contentTopics" class="topics">

        <ul id="content" ng-model="numbers">
            <li id="imgs" ng-repeat="whatever in numbers|filter:myTopic|unique:'tapid'" class="row">

                <div class="number">
                    <span onclick="confirm('TopicB Call?')">{{whatever.tapid}}</span>
                </div>
                <div style="clear:both;"></div>

                <ul data-ng-show="whatever" class="row_topic" id="num{{whatever.topic}}">
                    <li ng-repeat="whatever2 in numbers|filter:whatever.tapid" class="column" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s topic-button" ng-click="chatStart(whatever2.topic)" onclick="confirm('Chat with "+{{whatever.tapid}}+" about"+ {{whatever2.topic}}+"?')">
                            {{whatever2.topic}}
                        </a>
                    </li>
                </ul>


                <div style="clear:both;"></div>

            </li>

        </ul>

    </div>
-->

<div id="contentTopics" class="topics">

    <ul id="content" ng-model="numbers">
        <li id="imgs" ng-repeat="whatever in numbers track by $index" class="row">

            <div class="number">
                {{whatever.tapid}}
            </div>
            <div style="clear:both;"></div>

            <ul data-ng-show="whatever" class="row_topic" id="">
                <li ng-repeat="topics in whatever.topics track by $index" ng-controller="ScrollController" class="column">
                  <a class="scrollto ui-link btn btn-primary btn-s topic-button">
                    {{topics.topic}}
                  </a>
                </li>

            </ul>

        </li>
    </ul>

</div>

    <section id="callchat" style="background:none;margin:10px auto;text-align:center;">

        <div style="width:100%;">
            <div id="buttonOpenPad" class="container" onClick="openPad()" style="text-align:center;width:50%;height:200px;float:left;margin-top:20px;">

                <a class="ui-link btn btn-primary btn-s btn-connect" href="#pad">TopicB Phone<br><img src="images/phone.png" /></a>

            </div>
            <div id="buttonOpenChat" class="container" onClick="openChat()" style="text-align:center;float:left;height:200px;display:block;width:50%;margin-top:20px;">

                <a class="ui-link btn btn-primary btn-s btn-connect" href="#chat">Chat<br><img src="images/chat.png" /></a>

            </div>
        </div>

        <div style="clear:both;"></div>

        <div id="pad" class="container" style="display:none;">
        <!--
        <iframe id="callBox" width="250" height="475" src="http://54.187.211.169/flashphone/5.php" scrolling="no" style="border:none;"></iframe>
        -->
       <!-- 
        <object data="FlashPhone5.swf" id="FlashPhone5" type="application/x-shockwave-flash" height="500" width="300"><param value="false" name="menu"><param value="noScale" name="scale"><param value="true" name="allowFullscreen"><param value="always" name="allowScriptAccess"><param value="" name="bgcolor"><param value="direct" name="wmode"></object>
        -->

           <input id="" type="text" name="" class="form-control topic-input" style="margin-top:10px;" maxlength="32" />

        <a class="btn btn-primary btn-s btn-pad">
            1
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            2
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            3
        </a>
        <br />
        <a class="btn btn-primary btn-s btn-pad">
            4
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            5
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            6
        </a>
        <br />
        <a class="btn btn-primary btn-s btn-pad">
            7
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            8
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            9
        </a>
        <br />
        <a class="btn btn-primary btn-s btn-pad" style="font-size:54px;line-height:34px;">
            *
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            0
        </a>
        <a class="btn btn-primary btn-s btn-pad" style="font-size:24px;line-height:12px;">
            #
        </a>
        <br />
        <a class="btn btn-primary btn-s btn-pad btn-go">
            GO!
        </a>
        <a class="btn btn-primary btn-s btn-pad">
            &#9003;
        </a>
        <a class="btn btn-primary btn-s btn-pad btn-stop">
            STOP
        </a>


        </div>




<div style="clear:both;"></div>

    </section> 


    <section id="chat" class="section-chat" ng-controller="ScrollController">
        
        <div id="chatContainer" class="container" style="display:none;">

            <div>

                <div>

                    <div style="display:none;">
                        <gcse:search></gcse:search>
                    </div>

                    <div class="search-result-box">
                        <!--<div class="search_ID">
                            <span>Loading Search Results ...</span> 
                        </div>-->
                        <div id="search_result_1" class="search-result-text">
                        </div>
                    </div>
                    <div class="search-result-box">
                        <!--<div class="search_ID">
                            <span>Loading Search Results ...</span> 
                        </div>-->
                        <div id="search_result_2" class="search-result-text">
                        </div>
                    </div>

                    <iframe id="chatBox" src="" onload="this.contentWindow.document.documentElement.scrollTop=100" scrolling="no"></iframe>

                </div>
            
            </div>

        </div>

    </section>

    <section id="ad" class="navbar-fixed-bottom section-ad">

        <div class="container">

            <img src="images/ad.jpg" class="ad-img" />

        </div>

    </section>  


    <section id="categories" class="section-categories">

        <div class="container" class="scrollimation fade-left">

            <div >
                <h2>Categories</h2>

                <h3 class="categories-container">
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('food')">
                            food
                        </a>
                    </div>
                    <!--
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('sports')">
                            sports
                        </a>
                    </div>
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('news')">
                            news
                        </a>
                    </div>
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('weather')">
                            weather
                        </a>
                    </div>
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('cars')">
                            cars
                        </a>
                    </div>
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('law')">
                            law
                        </a>
                    </div>
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('travel')">
                            travel
                        </a>
                    </div>
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('pets')">
                            pets
                        </a>
                    </div>
                    <div class="category-container" ng-controller="ScrollController">
                        <a class="scrollto ui-link btn btn-primary btn-s category-button" ng-click="chatStart('friends')">
                            friends
                        </a>
                    </div>
-->

                </h3>
            
            </div>

        </div>

    </section>

<!--
    <section id="communicator" style="background:#ffffff;padding:50px;margin-top:100px;height:400px;">

        <div class="container">

            <div class="scrollimation fade-left" >
                <h2>Get the App</h2>

                <h3>
                    This section will link to the Communicator.
                </h3>
            
            </div>

        </div>

    </section>
-->

    <section id="about" class="section-about">

        <div class="container">

            <div class="scrollimation fade-left" >
                <h2>About</h2>

                <h3>
                    TopicB helps people create conversations on topics through voice and chat.
                </h3>

                <p>
                    <a class="scrollto" href="#home">Enter a topic above</a> that you would like to talk about or choose from the available topics listed. You can immediately chat with someone right now on the topic that you have chosen!
                </p>
            
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
                        &lt;iframe width=&quot;320&quot; height=&quot;540&quot; src=&quot;http://default-environment-ufabpzscgt.elasticbeanstalk.com&quot; style=&quot;width:320px;height:540px;border:none;&quot;&gt;&lt;/iframe&gt;
                    </code></pre>
                </div>
            
            </div>

        </div>

    </section>

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
