sigga.controller('registro', ['$scope', '$http', 'Core', 'Form', function($scope, $http, Core, Form){

    $scope.statusError = false;
    $scope.showStrongPassword = false;
    $scope.btnStatusRegister = false;
    $scope.messageError = '';
    $scope.btnStart = 'Crear mi Cuenta';
    $scope.pass = '';
    $scope.btnRegister = true;
    $scope.acceptTerms = false;
    $scope.typeError = 'danger';
    $scope.createdUser = false;
    $scope.correo = '';
    $scope.badEmail = true;
    $scope.emailExist = false;
    $scope.messageEmailExist = '';

    $scope.checkEmail = function()
    {
        if(Core.isEmpty($scope.correo))
        {
            $scope.emailExist = false;
            $scope.messageEmailExist = '';
        }
        else
        {
            if($scope.correo.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/))
            {
                var promiseGetEmail = $http.post(baseurl + 'usuarios/checkemail', { correo : $scope.correo });

                promiseGetEmail.then(function(response){
                    if(response.data.status)
                    {
                        $scope.emailExist = true;                        
                        $scope.messageEmailExist = response.data.message;
                    }
                    else
                    {
                        $scope.emailExist = true;
                        $scope.messageEmailExist = response.data.message;
                    }
                });
            }
        }
    }

    $scope.doRegister = function()
    {
        if(Form.validate('#frm-init-register', '.required'))
        {
            $scope.statusError = true;
            $scope.messageError = 'Por favor, ingresa tus datos para crear tu cuenta';
        }
        else
        {
            if(!$scope.acceptTerms)
            {
                $scope.statusError = true;
                $scope.typeError = 'danger';
                $scope.messageError = 'Por favor, acepta nuestro terminos y condiciones';
            }
            else
            {
                $scope.btnStart = 'Estamos creado tu cuenta ...';
                $scope.btnStatusRegister = true;
                $scope.btnRegister = true;

                var dataToCreateUser = {
                    nombres     : $scope.nombres,
                    apellidos   : $scope.apellidos,
                    correo      : $scope.correo,
                    plan        : $scope.plan,
                    pass        : CryptoJS.MD5($scope.pass).toString()
                }

                var requestCreateAccount = $http.post(baseurl + 'usuarios/create', dataToCreateUser);

                requestCreateAccount.then(function(response){
                    if(response.data.status)
                    {
                        $scope.statusError = true;
                        $scope.typeError = 'success';
                        $scope.messageError = 'Hemos creado tu cuenta Sigga!';
                        $scope.createdUser = true;
                    }
                    else
                    {
                        $scope.statusError = true;
                        $scope.typeError = 'danger';
                        $scope.messageError = response.data.message;
                    }

                    $scope.btnStart = 'Crear mi Cuenta';
                    $scope.btnStatusRegister = false;                    
                });
            }            
        }
    }

    $scope.comparePasswords = function()
    {
        if($scope.confirm != $scope.pass)
        {
            $scope.btnRegister = true;
            return 'Las contraseñas no coinciden';
        }

        $scope.btnRegister = false;
        return 'Bien, coinciden';
    }

    $scope.howStrongIsPassword = function()
    {
        if(Core.isEmpty($scope.pass) || $scope.pass.length <= 0)
        {
            $scope.btnRegister = true;
            return;
        }
            
        else if($scope.pass.length <= 4)
        {
            return 'Muy Debil';
        }
        else if($scope.pass.length >= 5)
        {
            if($scope.pass.match(/[\d+]/g))
            {
                if($scope.pass.match(/[\w+].+[\d+]/g))
                {
                    if($scope.pass.match(/[*@"#$%&/)(]/))
                    {
                        $scope.btnRegister = false;
                        return 'Esa es una buena contraseña';
                    }
                    else
                    {
                        if(!$scope.pass.match(/0-9/g))
                        {
                            if(!$scope.pass.match(/[\w+]/g))
                                return 'Muy Fuerte';
                            else
                            {
                                $scope.btnRegister = false;
                                return 'Algo Fuerte';
                            }
                        }
                        else                            
                            return 'Va bien, un caracter especial, y estaria lista!';
                    }
                }
                else
                {
                    if($scope.pass.match(/[w+].+[\d+]*./g))
                    {
                        $scope.btnRegister = true;
                        return 'Combinala, con letras tambien';
                    }
                    else
                    {
                        if($scope.pass.match(/0-9/g))
                        {
                            $scope.btnRegister = true;
                            return 'Bien, esa es una buena contraseña';
                        }
                        else
                        {
                            $scope.btnRegister = true;
                            return 'Algun, numero estaria bien';
                        }
                    }
                }
            }
            else
            {
                $scope.btnRegister = true;
                return 'Medio Fuerte';
            }
        }
    }
}]);