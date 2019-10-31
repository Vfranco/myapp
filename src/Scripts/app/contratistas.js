app.controller('contratistas', ['$scope', '$http', 'Core', 'Form', function($scope, $http, Core, Form){

    $scope.dataProveedores = [];
    $scope.loadDataProveedores = false;

    $scope.getResumeProveedores = function()
    {
        let promiseDataProveedores = $http.post(baseurl + 'proveedores/readbyid', { uid : uid });

        promiseDataProveedores.then((response) => {
            if(response.data.status)
                $scope.dataProveedores = response.data.rows;
        });
    }

    $scope.getResumeProveedores();

    $scope.openFormContratistas = false;
    $scope.closeFormContratistas = true;

    $scope.showFormContratistas = function(){
        $scope.openFormContratistas = true;
    }

    $scope.hideFormContratistas = function(){
        $scope.closeFormContratistas = false;
    }

}]);