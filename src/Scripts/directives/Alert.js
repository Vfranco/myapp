app.directive('alertMessage', ['$rootScope', function($rootScope){
    return {
        restrict    : "E",
        scope       : {
            type    : "@",
            message : "@"            
        },
        template    : '<div class="alert alert-{{type}} text-center">{{message}}</div>',
        link        : function(scope, element, attrs)
        {
            scope.type = attrs.type;
            scope.message = attrs.message;            
        }
    }
}]);