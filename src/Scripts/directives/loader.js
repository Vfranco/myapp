app.directive('cpLoadingRoute', ['$rootScope', function($rootScope){
    return {
        restrict    : "A",
        link        : function(scope, element)
        {
            $rootScope.stateChange = false;

            var onLoading = $rootScope.$on('$routeChangeStart', function(){                
                $rootScope.stateChange = false;                
            });

            var onSuccess = $rootScope.$on('$routeChangeSuccess', function(){                
                $rootScope.stateChange = true;                
            });

            scope.$on('$destroy', onLoading);
            scope.$on('$destroy', onSuccess);
        }
    };
}]);