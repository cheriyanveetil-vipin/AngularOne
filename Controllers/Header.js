AngularOneApp.directive('headerHtml', function($rootScope) { 
  return { 
    restrict: 'E', 
    //scope: { 
    //  info: '=' 
   // }, 
    templateUrl: 'Views/Common/Header.html' ,
	 controller: ["$scope", "$rootScope", function($scope, $rootScope) {
                
                
                $scope.logoutuserifany = function() {
					//alert('fromm header');
                    $rootScope.$emit('logoutEvent',{});
                }
            }]
  }; 
});