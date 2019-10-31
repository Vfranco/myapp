app.directive('comboBox', ['$rootScope', '$http', function($rootScope, $http){
    return {
        restrict    : "AE",
        scope       : {
            label       : "@",
            route       : "@",
            name        : "@",
            required    : "@",
            ngModel     : "=?bind"
        },
        template    : `<label class="form-control-label">{{label}}</label>
                        <select ng-model="ngModel" name="{{name}}" class="form-control" ng-class="{'required' : required}">
                            <option value="">{{ label }}</option>
                            <option value="{{item.id}}" ng-repeat="item in data">{{ item.prop }}</option>
                        </select>`,
        link        : function(scope, element, attrs)
        {
            scope.label     = attrs.label;
            scope.name      = attrs.name;
            scope.data      = [];
            scope.required  = attrs.required;
            scope.model     = attrs.model;

            var route = attrs.route;

            var promiseGetDataToCombo = $http.post(baseurl + route, { uid : uid});

            promiseGetDataToCombo.then((response) => {
                if(response.data.status)
                    scope.data = response.data.combo;
            }); 
        }
    }
}]);