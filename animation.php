<html>
<head>
	<script src="js/jquery-1.11.1.js"></script>
	<script src="js/angular.js"></script>
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
    <link rel="stylesheet" href="css/idangerous.swiper.css">
    <script defer src="js/idangerous.swiper.js"></script>

	<script>
		$( document ).ready(function() {
			$("#imgs2").css("transition-duration", "2s");
			$("#imgs2").css("transform", "translate(-100px,0)");
		});	
  </script>


</head>
<body>

<div>

	<ul class="row_hot" id="imgs2" style="background:none;">
    <li ng-repeat="hotitem in hotlist|limitTo:10">

      <div class="number hottopic-container" ng-controller="ScrollController">
        <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(hotitem.topic)">
            test 1
        </a>
      </div>

      <div class="number hottopic-container" ng-controller="ScrollController">
        <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(hotitem.topic)">
            test 2
        </a>
      </div>

      <div class="number hottopic-container" ng-controller="ScrollController">
        <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(hotitem.topic)">
            test 3
        </a>
      </div>

      <div class="number hottopic-container" ng-controller="ScrollController">
        <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(hotitem.topic)">
            test 4
        </a>
      </div>

      <div class="number hottopic-container" ng-controller="ScrollController">
        <a class="scrollto ui-link btn btn-primary btn-s hottopic-button" ng-click="chatStart(hotitem.topic)">
            test 5
        </a>
      </div>

    </li>
  </ul>


</div>

</body>
</html>