sigga.controller('login', ['$scope', 'Core', 'Form', '$http', '$window', function($scope, Core, Form, $http, $window){

    $scope.statusError = false;
    $scope.btnStatusLogin = false;
    $scope.messageError = '';
    $scope.btnStart = 'Ingresar';
    
    $scope.dologin = function()
    {
        if(Form.validate('#frm-init-login', '.required'))
        {
            $scope.statusError = true;
            $scope.messageError = 'Ingrese sus datos, para crear su cuenta';
        }
        else
        {
            $scope.btnStatusLogin = true;
            $scope.btnStart = '...';

            var promiseLogin = $http.post('/authentication/login', { userAcl : $scope.user, passAcl : CryptoJS.MD5($scope.pass).toString() });

            promiseLogin.then(function(response){
                if(!response.data.status)
                {
                    $scope.statusError = true;
                    $scope.messageError = (Core.isEmpty(response.data.message)) ? 'Usuario no registrado, crea tu cuenta Sigga' : response.data.message;
                    $scope.btnStatusLogin = false;
                    $scope.btnStart = 'Ingresar';
                }
                else
                {
                    $scope.btnStart = 'Ingresando ...';

                    var promiseCreateSesion = $http.post('/authentication/createsesion', { email : $scope.user });

                    promiseCreateSesion.then(function(response){
                        
                        if(response.data.status)                        
                            $window.location.href = response.data.redirect;

                        $scope.btnStatusLogin = true;
                    });
                }
            });            
        }
    }
}]);