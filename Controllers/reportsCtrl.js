

var reportsCtrl = AngularOneApp.controller('reportsCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data, $filter) {
    //initially set those objects to null to avoid undefined error
	
    $scope.logoutUser = function () {
		//alert('fromm reports ctrl');
        $rootScope.$emit('logoutEvent',{});
    };
	
	function LoadMddata()
	{
			Data.Addtoast("info","Loading Chart");
			Data.get('sampleHightChartData').then(function (results) {
				//alert(results.Data);
				
						eval("var chart = new Highcharts.Chart("+results.Data+");");
						Data.Addtoast("info","Chart Loaded");
            });
				//alert(angular.element('dataTables-example').dataTable());
				angular.element('dataTables-example').dataTable();
	}
	
	LoadMddata();
	
});

