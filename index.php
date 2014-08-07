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
    <!--<script src="js/jquery-1.11.1.js"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
    <!--<script src="js/angular.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script>
    <script src="js/ui-utils-0.1.1/ui-utils.js"></script>
    <script src="js/app.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <!--<script src="js/jquery.backstretch.min.js"></script>-->
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
    <script src="js/jquery.scrollto.js"></script>
    <link href="css/global.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/idangerous.swiper.css">
    <script defer src="js/idangerous.swiper.js"></script>
    <script>

        var topicApp = angular.module('topicApp', ['ui.utils'], function($locationProvider) {
          $locationProvider.html5Mode(true);
        });


        topicApp.controller('topicCtrl', function ($scope,$http,$location){

$scope.loadData = function () {
$http({method: 'GET', url: 'getTopics.php'}).success(function(data) {
    $scope.numbers = data;
  });
};

$scope.loadData();

//$scope.numbers = [{"0":"206-000-0008","connection":"206-000-0008","1":"dandelion","topic":"dandelion"},{"0":"206-000-0008","connection":"206-000-0008","1":"burdock","topic":"burdock"},{"0":"206-000-0008","connection":"206-000-0008","1":"cinnamon","topic":"cinnamon"},{"0":"206-000-0003","connection":"206-000-0003","1":"jasmine","topic":"jasmine"},{"0":"206-000-0003","connection":"206-000-0003","1":"mint","topic":"mint"},{"0":"206-000-0003","connection":"206-000-0003","1":"earlgray","topic":"earlgray"}];

//$scope.numbers = "topic in myArray|unique:'connection'";
//alert($scope.numbers);
/*
            $scope.numbers = [
        {
            "number" : "2060000002",
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
            "number" : "2060000001",
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
            "number" : "2060000003",
            "topics" : [
            {
                "topic" : "Dark Souls 2",
                "status" : "active",
                "category" : "game"
            }
            ]
        },
        {
            "number" : "2060000004",
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
            "number" : "2060000005",
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
            "number" : "2060000006",
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
    */
//$scope.hotlist = [{"label":"Ichiro"},{"label":"Seattle"},{"label":"available column"},{"label":"Hisashi Iwakuma"}];

        $scope.hotlist = [{"label":"Ichiro"},{"label":"Seattle"},{"label":"available column"},{"label":"Hisashi Iwakuma"},{"label":"Bobble Head"},{"label":"Jiman Choi"},{"label":"Infielders"},{"label":"Top 20 Prospects"},{"label":"Bobble Head"},{"label":"vs Athletics"},{"label":"Cano"},{"label":"Jones"},{"label":"Montero"},{"label":"Seager"},{"label":"Saunders"},{"label":"Bloomquist"}];

        $scope.topic_distance=0;
        $scope.scrollImages= function(distance, duration) {
            $scope.$apply();
            if($scope.topic_distance>200){
                //console.log("shifting");
                $scope.topicShift();
                $scope.topic_distance=0;
            }else if($scope.topic_distance<1){
                $("#imgs2").css("transition-duration", 0 + "s");
                //inverse the number we set in the css
                var value = (distance < 0 ? "" : "-") + Math.abs(distance).toString();
                $("#imgs2").css("transform", "translate(" + value + "px,0)");
                $scope.topic_distance++;
            }else{
                $("#imgs2").css("transition-duration", (duration / 1000).toFixed(1) + "s");
                //inverse the number we set in the css
                var value = (distance < 0 ? "" : "-") + Math.abs(distance).toString();
                $("#imgs2").css("transform", "translate(" + value + "px,0)");
                $scope.topic_distance++;
            }
        }

        setInterval(function(){$scope.scrollImages($scope.topic_distance, 25)},5);

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
            console.log("temp="+temp);
            $scope.numbers[topicRow].topics.unshift(temp);

        }

        $scope.myTopic = $location.search()['topic'];

        $scope.widget = {inputValue: 'whatever'};

        $scope.filterTopic=function($mySearchWord){
        //alert("hello");
        console.log("$mySearchWord="+$mySearchWord);
            $scope.myTopic = $mySearchWord;
        }


    });

    topicApp.controller('TopicSubmitController', function ($scope,$http,$timeout) {

        $scope.submitForm = function() {
            
            console.log("posting data....");
            $scope.myTopics.myID = "206-000-000"+(Math.floor(Math.random() * 10));
            $http.post('submitTopics.php', JSON.stringify($scope.myTopics)).success(function(){
                console.log("success");
                angular.element(".starter-template").html("<span style='color:#fff;'>Thanks! Your topics have been created below.</span>");
                $scope.loadData();
            });

        };
/*
        $scope.createRow = function(myID){
            console.log("id = "+myID);
            var tempID={"number" : "My ID "+myID,"topics" : 
            []};
            //$scope.numbers.push(tempID);
            $scope.numbers[0]=tempID;

            if($scope.myTopics.topic1){
                $scope.tempTopic1={
                    "topic" : $scope.myTopics.topic1,
                    "status" : "active",
                    "category" : "education"
                }
                $scope.numbers[0]["topics"].push($scope.tempTopic1);
            }
            if($scope.myTopics.topic2){
                $scope.tempTopic2={
                    "topic" : $scope.myTopics.topic2,
                    "status" : "active",
                    "category" : "education"
                }
                $scope.numbers[0]["topics"].push($scope.tempTopic2);
            }
            if($scope.myTopics.topic3){
                $scope.tempTopic3={
                    "topic" : $scope.myTopics.topic3,
                    "status" : "active",
                    "category" : "education"
                }
                $scope.numbers[0]["topics"].push($scope.tempTopic3);
            }

            $scope.$apply();
            //scope.myTopics.myID;
        }*/

    });

    topicApp.controller('QueryCntl', function ($scope,$location,sharedProperties){
        //console.log("$location.search()['topic'];= "+$location.search()['topic']);
        $scope.target = $location.search()['topic'];
        $scope.myTopic = $scope.target;
        $scope.both = sharedProperties.setProperty() + $scope.myTopic;
    });

    topicApp.controller('ScrollController', ['$scope', '$location', '$anchorScroll','$timeout',
    function ($scope, $location, $anchorScroll, $timeout) {
      $scope.chatStart = function(myChat) {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        angular.element("#search_result_1").text("loading search results...");
        angular.element("#search_result_2").text("loading search results...");
        $location.hash('chat');

        // call $anchorScroll()
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
            }, 5000);


        }, 5000);

        

        //$scope.$apply();

        //console.log("scope apply");

      }

    }]);

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

/*
    function QueryCntl($scope, $location) {
      $scope.target = $location.search()['topic'];
      //$scope.myTopic = $location.search()['topic'];
    }*/

</script>
<script>
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
    function scrollImages(distance, duration) {
        imgs.css("transition-duration", (duration / 1000).toFixed(1) + "s");

        //inverse the number we set in the css
        var value = (distance < 0 ? "" : "-") + Math.abs(distance).toString();
        imgs.css("transform", "translate(" + value + "px,0)");
    }

    $( document ).ready(function() {
        //setInterval(function(){nextImage()},2000);
        $(".ui-loader ").css("display","none");
        $('#input_search').watermark('Search');
        $('#topic1').watermark('Enter Your Topic (required)');
        $('#topic2').watermark('Enter Another Topic');
        $('#topic3').watermark('Enter Another Topic');
        $("#chatBox").attr("src", "http://www.bofrank.com/chat/index.php#end");

        //var tempID = "206-000-000"+(Math.floor(Math.random() * 10));
        //$('#myIDinput').attr("value","tempID");

        setTimeout(function(){searchMe("phad thai")}, 3000);


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
            
        //console.log($results[1]);

        }

        
        

    });

        

    function openPad(){
        $("#pad").toggle();
        //$('#phonepad').scrollTop(100);
    }
/*
    function openTopics(){
        if($("#contentTopics").css("height")=="69px"){
            $("#contentTopics").css("height","400px").css("overflow","visible");
            $("#labelOpen").css("display","none");
            $("#labelClose").css("display","block");
        }else{
            $("#contentTopics").css("height","69px").css("overflow","hidden");
            $("#labelOpen").css("display","block");
            $("#labelClose").css("display","none");
        }
    }
*/
/*
    function openTopics(){
        if($("#contentTopics").css("height")=="205px"){
            $("#contentTopics").addClass("contentTopicsOpen");
        }else{
            $("#contentTopics").removeClass("contentTopicsOpen");
        }
    }
*/
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

<body ng-controller="topicCtrl" ng-init="myVar='test'" style="">

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
            <!--<div style="text-align:center;margin-left:-65px;width:100%;">-->
                <a class="navbar-brand scrollto" href="#home"><img src="images/logo_website.jpg" alt="TopicB" /></a>
            </div>
        </div>
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a class="scrollto" href="#phonepad" id="nav_connect">Talk</a></li>
            <!--
            <li><a class="scrollto" href="#content">Your Topics</a></li>
            <li><a class="scrollto" href="#hottopics">Hot Topics</a></li>
-->
            <li><a class="scrollto" href="#hottopics">Topics</a></li>
            <li><a class="scrollto" href="#categories">Categories</a></li>
            <li><a class="scrollto" href="#communicator">Communicator</a></li>
            <li><a class="scrollto" href="#HowToUse">How To Use</a></li>
            <li id="nav-search" class="" style="color:#666666;margin-top:15px;"><form ng-submit="filterTopic(inputValue)"><input id="input_search" ng-model="inputValue" class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset" type="text" style="color:#666666;margin-top:7px;margin-left:5px;"></form></li><i id="nav-search-icon" style="color:#e6881e;float:left;margin:20px 0 0 10px;cursor:pointer;font-size:26px;" class="fa fa-search" ng-click="filterTopic(inputValue)"></i>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" id="home">

      <div class="starter-template">
        <div style="text-align:center;margin:0px auto;width:100%;">

            <form class="form-inline" ng-submit="submitForm(myTopics)" ng-controller="TopicSubmitController">
                <div class="form-group">
                    <input id="topic1" type="text" data-ng-model="myTopics.topic1" name="form.topic1" class="form-control" style="width:250px;margin-right:10px;background:none;" />
                </div>
                <div class="form-group">
                    <input id="topic2" type="text" data-ng-model="myTopics.topic2" name="form.topic2" class="form-control" style="width:250px;margin-right:10px;background:none;" />
                </div>
                <div class="form-group">
                    <input id="topic3" type="text" data-ng-model="myTopics.topic3" name="form.topic3" class="form-control" style="width:250px;margin-right:10px;background:none;" />
                </div>
                <!--
                <div class="form-group">
                    <input id="myID" type="text" value="myTopics.myID" data-ng-model="myTopics.myID" name="form.myID" class="form-control" style="width:250px;margin-right:10px;background:none;" />
                </div>
            -->
                <div class="form-group">
                  <input type="submit" id="submit" value="" style="background:url(images/go_search.jpg) no-repeat;border:none;width:44px;height:29px;" ng-click="submit" />
                </div>
                
            </form>

        </div>

      </div>

    </div>


    <!-- hot topics -->
    <div  id="hottopics">
        <ul><!-- $('#hottopics').scope().numbers; -->
            <li class="row" style="transition-duration: 0.5s; transform: translate(0px, 0px);background: linear-gradient(180deg, #5a5c66, #cc0c38);border-top:solid 1px #fff;border-bottom:solid 1px #fff;margin:0px 0px 10px 0px;padding-left:10px;">

              <div class="number" style="color:#F9F2E7;margin-top:-2px;">
                <i class="fa fa-fire" style="color:#F9F2E7"></i> HotTopics
              </div>
              <div style="clear:both;"></div>

              <ul class="row_hot" id="imgs2" style="background:none;">
                <li ng-repeat="hotitem in hotlist|limitTo:10">

                  <div class="number" style="width:200px;display:inline;">
                    <a style="cursor:pointer;height:34px;text-align:center;font-size:20px;line-height:16px;" class="scrollto ui-link btn btn-primary btn-s" href="#chat">
                        {{hotitem.label}}
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
            <li id="imgs" ng-repeat="whatever in numbers|unique:'connection'" class="row">

                <div class="number">
                    <span onclick="confirm('TopicB Call?')">{{whatever.connection}}</span>
                </div>
                <div style="clear:both;"></div>

                <ul data-ng-show="whatever" class="row_topic" id="num{{whatever.topic}}">
                    <li ng-repeat="whatever2 in numbers|filter:whatever.connection" class="column" ng-controller="ScrollController">
                        <a style="cursor:pointer;height:34px;text-align:center;font-size:20px;line-height:16px;" class="scrollto ui-link btn btn-primary btn-s" ng-click="chatStart(whatever2.topic)">
                            {{whatever2.topic}}
                        </a>
                    </li>
                </ul>
<!--
                <div class="leftArrow">
                    <i class="fa fa-arrow-left" style="position:relative;top:-62px;cursor:pointer;color:#32a5e7;font-size:37px;" ng-click="scrollRight($index)"></i>
                </div>
                <div class="rightArrow">
                    <i class="fa fa-arrow-right" style="position:relative;top:-62px;cursor:pointer;color:#32a5e7;font-size:37px;padding-left:5px;background:#d9edee;" ng-click="scrollLeft($index)"></i>
                -->
                    <!--
                    <img src="images/arrow_right.png" style="position:relative;top:-62px;cursor:pointer;width:25px;height:29px;" ng-click="scrollLeft($index)" />-->
                <!--</div>-->
                <div style="clear:both;"></div>

            </li>
            <!--<button ng-click="loadData()">Refresh</button>-->
        </ul>

    </div>
    <!-- $(this).parent().parent('.row_topic').css('margin-left','0px') -->
    <!--
    <div style="text-align:center;cursor:pointer;" onclick="openTopics()" >
      <div id="labelOpen" style="border-bottom:solid 5px #d9edee;margin-top:2px;background:#d9edee;width:100%;height:0px;"></div>
      <img src="images/tab.png" style="margin-top:-14px;" />
    </div>
-->
    <section id="phonepad" style="background:none;margin:10px auto;text-align:center;">

        <div class="container" onclick="openPad()" style="text-align:center;">

            <a style="cursor:pointer;height:34px;text-align:center;font-size:20px;line-height:16px;width:100%;" class="scrollto ui-link btn btn-primary btn-s" href="#chat">Connect to a Number</a>

        </div>
        <div id="pad" class="container" style="display:none;">

            <img src="images/phone.jpg" style="width:100%;" />

        </div>

    </section> 


    <section id="chat" style="background:none;margin-top:0px;" ng-controller="ScrollController">

        <div class="container">

            <div>

                <div>

                    <div style="display:none;">
                        <gcse:search></gcse:search>
                    </div>

                    <div class="search-result-box">
                        <div class="search_ID">
                            <span onclick="confirm('TopicB Call?')">ID: 206-223-8529</span> 
                        </div>
                        <div id="search_result_1" class="search-result-text">
                        </div>
                    </div>
                    <div class="search-result-box">
                        <div class="search_ID">
                            <span onclick="confirm('TopicB Call?')">ID: 206-223-8529</span> 
                        </div>
                        <div id="search_result_2" class="search-result-text">
                        </div>
                    </div>

                    <iframe id="chatBox" src="" style="height:400px;width:100%;"></iframe>

                </div>
            
            </div>

        </div>

    </section>

    <section id="ad" class="navbar-fixed-bottom" style="background:#000;max-height:60px;margin:0px;padding:0px;text-align:center;">

        <div class="container">

            <img src="images/ad.jpg" style="max-width:468px;max-height:60px;" />

        </div>

    </section>  

    <section id="categories" style="background:#ffffff;padding:50px;margin-top:100px;">

        <div class="container" class="scrollimation fade-left">

            <div >
                <h2>Categories</h2>

                <h3>
                    This section will list all of the categories.
                </h3>
            
            </div>

        </div><!--End container -->

    </section>

    <section id="communicator" style="background:#ffffff;padding:50px;margin-top:100px;height:400px;">

        <div class="container">

            <div class="scrollimation fade-left" >
                <h2>Get the App</h2>

                <h3>
                    This section will link to the Communicator.
                </h3>
            
            </div>

        </div><!--End container -->

    </section>

    <section id="HowToUse" style="background:#ffffff;padding:50px;margin-top:100px;height:400px;">

        <div class="container">

            <div class="scrollimation fade-left" >
                <h2>How To Use</h2>

                <h3>
                    This section will explain how to use TopicB in connecting with people on a particular subject that you would like to discuss.
                </h3>
            
            </div>

        </div><!--End container -->

    </section>


    <section id="getCode" style="background:#ffffff;padding:50px;margin-top:100px;height:400px;">

        <div class="container">

            <div class="scrollimation fade-left" >
                <h2>Put TopicB on Your Site</h2>

                <h3>
                    This section will show how to put TopicB on a site.
                </h3>
                <div ng-controller="QueryCntl">
                    Target: {{target}}<br/>
                </div>
            
            </div>

        </div><!--End container -->

    </section>

  </body>
</html>
