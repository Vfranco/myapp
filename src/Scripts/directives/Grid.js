app.directive('gridDataThead', ['$rootScope', 'Core', function($rootScope, Core){
    return {
        restrict    : "A",
        link        : function(scope, element, attrs)
        {
            $rootScope.fieldsOfReports = Core.getTheadList(element, 'get-head');
        }
    }
}]);