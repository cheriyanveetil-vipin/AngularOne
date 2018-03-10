<!DOCTYPE html>
<html lang="en" ng-app="AngularOneApp">

  <head>
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
          <title>AngularOne</title>
          <!-- Bootstrap -->
          <link href="css/bootstrap.min.css" rel="stylesheet"/>
            <link href="css/custom.css" rel="stylesheet"/>
              <link href="css/toaster.css" rel="stylesheet"/>
			  <link rel="stylesheet" href="css/ngtable.css"/>
			  <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
            <script src="http://code.highcharts.com/adapters/standalone-framework.js"></script>
				<script src="https://code.highcharts.com/highcharts.js"></script>
				<script src="https://code.highcharts.com/modules/exporting.js"></script>
              </head>

  <body ng-cloak="">
    
	<header-html title="vipin"></header-html> 
    
      <div class="container" style="margin-top:20px;">
		
        <div data-ng-view="" id="ng-view" class="slide-animation"></div>
		

      </div>
    </body>
  <toaster-container toaster-options="{'time-out': 3000}"></toaster-container>
  <!-- Libs -->
  <script src="assets/plugins/jquery-1.10.2.js"></script>
  <script src="js/angular.min.js"></script>
  <script src="js/angular-route.min.js"></script>
  <script src="js/angular-animate.min.js" ></script>
  <script src="js/toaster.js"></script>
  <script src="js/ngtable.js"></script>
  <script src="js/underscore.js"></script>
  <script src="Controllers/app.js"></script>
  <script src="Controllers/data.js"></script>
  <script src="Controllers/directives.js"></script>
  <script src="Controllers/Header.js"></script>
  <script src="Controllers/authCtrl.js"></script>
  <script src="Controllers/reportsCtrl.js"></script>
   <script src="Controllers/logoutCtrl.js"></script>

  <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>


</html>

