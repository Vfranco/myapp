app.controller('terminales', ['$scope', '$http', 'Core', 'Form', '$timeout', 'Route', function($scope, $http, Core, Form, $timeout, Route){
    
    $scope.terminales = [];
    $scope.loadTerminales = false;
    $scope.showMessageEmpty = true;
    $scope.showGridTerminales = false;    
    $scope.formTerminal = {};
    $scope.emptyFormTerminal = {};
    $scope.uid = uid;
    $scope.enableSearchTerminal = false;
    $scope.searchTerminal = '';
    $scope.idTerminal = 0;
    $scope.searchTerminal = '';

    $scope.loadCreatedTerminals = function(){
        let promiseCreatedTerminals = $http.post(baseurl + 'UsuariosTerminal/ReadById', { uid : uid });

        $scope.loadTerminales = true;

        promiseCreatedTerminals.then(response => {
            
            if(response.data.status)
                $scope.terminales = response.data.rows;

            $scope.loadTerminales = true;
        });
    }

    $scope.loadCreatedTerminals();

    $scope.setForm = function(formTerminal){
        $scope.emptyFormTerminal = formTerminal;
    }

    $scope.showFormTerminal = false;
    $scope.statusCreatedTerminal = false;
    $scope.terminalMessage = '';
    
    $scope.showFormCreateTerminal = function(){
        $scope.showFormTerminal = true;
        $scope.showMessageEmpty = false;
        $scope.showGridTerminales = true;
        $scope.statusCreatedTerminal = false;

        $scope.formTerminal = {
            idTerminal      : 0,
            arl             : false,
            confirm         : "",
            cursos          : false,
            eps             : false,
            status          : false,
            nombreUsuario   : "",
            passone         : "",
            photo           : false,
            sede            : "",
            tipo            : "",
            uid             : uid
        };
    }

    $scope.hideFormCreateTerminal = function(){
        $scope.showFormTerminal = false;
        $scope.showGridTerminales = false;
    }

    $scope.isEmpty = false;
    $scope.btnCreateTerminal = 'Registrar Terminal';

    $scope.createTerminal = function(){

        if(Form.checkFormObject($scope.formTerminal))
        {
            $scope.message = 'Por favor, ingresa los datos de tu terminal';
            $scope.type = 'danger';
            $scope.isEmpty = true;            
        }
        else
        {
            $scope.btnCreateTerminal = 'Registrando ...';
            let promiseCreateTerminal = $http.post(baseurl + 'UsuariosTerminal/CreateUserTerminal', $scope.formTerminal);

            promiseCreateTerminal.then((response) => {
                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.createdTerminal = true;
                    $scope.showGridTerminales = false;
                    $scope.loadCreatedTerminals();

                    $scope.formTerminal = {
                        idTerminal      : 0,
                        arl             : false,
                        confirm         : "",
                        cursos          : false,
                        eps             : false,
                        status          : false,
                        nombreUsuario   : "",
                        passone         : "",
                        photo           : false,
                        sede            : "",
                        tipo            : "",
                        uid             : uid
                    };
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmpty = true;
                }

                $scope.btnCreateTerminal = 'Registrar Terminal';
            });
        }

        $timeout(() => {
            $scope.isEmpty = false;
        }, 2500);
    }

    $scope.cancelCreateTerminal = function(){
        $scope.showFormTerminal = false;        
        $scope.showGridTerminales = false;
    }

    $scope.comeBackCreatedTerminal = function(){
        $scope.showGridTerminales = false;
        $scope.showFormTerminal = false;
        $scope.showMessageEmpty = false;
    }

    $scope.seeOptions = 0;
    $scope.selectedRow = 0;

    $scope.showOptionsList = function(id){
        $scope.seeOptions = id;
    }

    $scope.selectRowDeleteTerminal = function(id){
        $scope.selectedRow = id;
    }

    $scope.btnDeleteTerminal = 'Si, Borralo';

    $scope.deleteTerminal = function(id){
        $scope.btnDeleteTerminal = 'Eliminando ...';

        Route.post('UsuariosTerminal/DeleteTerminal', { id : id }).then(response => {
            if(response.data.status)
            {
                $scope.selectedRow = 0;
                $scope.loadCreatedTerminals();
            }

            $scope.btnDeleteTerminal = 'Si, Borralo';
        });
    }

    $scope.cancelDeleteTerminal = function(){
        $scope.selectedRow = 0;
    }

    $scope.loadFormEdit = 'pen';

    $scope.selectRowEditTerminal = function(id){
        $scope.loadFormEdit = 'ellipsis-h';

        Route.post('UsuariosTerminal/ReadByEdit', { id : id}).then(response => {
            if(response.data.status)
            {
                let data = response.data.rows[0];
                let dataForm = JSON.parse(response.data.rows[0].formulario);

                $scope.formTerminal = {
                    idTerminal      : data.id_sg_terminal_usuario,
                    arl             : dataForm.arl,
                    confirm         : data.recovery,
                    cursos          : dataForm.cursos,
                    eps             : dataForm.eps,
                    status          : (data.id_sg_estado == 1) ? true : false,
                    nombreUsuario   : data.usuario,
                    passone         : data.recovery,
                    photo           : dataForm.photo,
                    sede            : data.id_sg_sede,
                    tipo            : data.id_sg_tipo_control,
                    uid             : uid
                };

                $scope.showFormTerminal = true;
                $scope.showGridTerminales = true;
                $scope.loadFormEdit = 'pen';                
            }
        });
    }

    $scope.btnUpdateTerminal = 'Actualizar Terminal';

    $scope.updateTerminal = function(){

        $scope.btnUpdateTerminal = 'Actualizando ...';

        Route.post('UsuariosTerminal/UpdateTerminal', $scope.formTerminal).then(response => {
            if(response.data.status)
            {
                $scope.btnUpdateTerminal = 'Actualizar Terminal';
                $scope.showFormTerminal = false;
                $scope.showGridTerminales = false;

                $scope.loadCreatedTerminals();
            }
        });
    }
}]);