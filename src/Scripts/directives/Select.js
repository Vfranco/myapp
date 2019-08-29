app.directive('selectOption', ['$rootScope', function($rootScope){
    return {
        restrict    : 'E',
        scope       : {
            label   : '@',
            name    : '@',
            data    : '@'            
        },
        template    :'<label class="c-field__label" ng-if="properties.label">{{properties.label}}</label>'+
                        '<select class="c-select select-ajax" ng-class="{required:properties.required}" name="{{properties.name}}">'+
                        '<option value="">Seleccione ... </option>'+
                        '<option value="{{items.id}}" ng-repeat="items in properties.data" ng-click="selectOption()">{{ items.prop }}</option>'+
                    '</select>',
        link        : function(scope, element, attrs)
        {
            scope.properties = {
                label       : attrs.label,
                required    : true,
                name        : attrs.name,
                data        : JSON.parse(attrs.data)                
            };

            $('.select-ajax').select2({
                width           : '100%',                
                containerCssClass   : "select-ajax"
            });
        }
    }
}]);