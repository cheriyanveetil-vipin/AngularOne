AngularOneApp.controller('logoutCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    
    function logout()
	{
		//alert('came');
		$scope.logincount=0;
        Data.get('logout').then(function (results) {
            Data.toast(results);
            $location.path('login');
        });
    }
	
	logout();
	
});