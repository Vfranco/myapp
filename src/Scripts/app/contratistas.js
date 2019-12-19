app.controller('contratistas', ['$scope', '$http', 'Core', 'Form', 'Route', '$timeout', function ($scope, $http, Core, Form, Route, $timeout) {

    $scope.dataProveedores = [];
    $scope.loadDataProveedores = false;
    $scope.searchProveedor = '';
    $scope.searchContratista = '';
    $scope.uid = uid;
    $scope.formEmpresa = {};
    $scope.formContratista = {};
    $scope.formContratista.idcontratista = 0;
    $scope.dataEmpresas = [];
    $scope.eps = [];
    $scope.arl = [];
    $scope.contratistas = [];

    $scope.getResumeProveedores = function () {
        let promiseDataProveedores = Route.post('Proveedores/ReadById', { uid: uid });

        promiseDataProveedores.then((response) => {
            if (response.data.status)
                $scope.dataProveedores = response.data.combo;

            $scope.loadDataProveedores = false;
        });
    }

    $scope.getResumenEmpresas = function () {
        let promiseDataEmpresas = Route.post('Proveedores/ReadEmpresas', { uid: uid });

        promiseDataEmpresas.then(response => {
            if (response.data.status)
                $scope.dataEmpresas = response.data.rows;
        });
    }

    Route.post('Configuracion/ReadEps', { uid : uid }).then(response => {
        if(response.data.status)
            $scope.eps = response.data.rows;
        else
            $scope.eps = [];        
    });

    Route.post('Configuracion/ReadArl', { uid : uid }).then(response => {
        if(response.data.status)
            $scope.arl = response.data.rows;
        else
            $scope.arl = [];
    });

    $scope.getResumeProveedores();
    $scope.getResumenEmpresas();

    $scope.showFormCreateContratista = false;
    $scope.showFormCreateEmpresa = false;
    $scope.showDetalleContratista = true;

    $scope.showFormContratistas = function () {
        $scope.showFormCreateEmpresa = false;
        $scope.showDetalleContratista = false;
        $scope.showFormCreateContratista = true;

        $scope.formContratista = {
            idcontratista   : 0,
            uid             : uid, 
            cedula          : "", 
            nombres         : "",              
            correo          : "",
            empresa         : "", 
            eps             : "", 
            arl             : "",
            expedicion      : "",
            estado          : false
        }
    }

    $scope.hideFormCreateEmpresa = function () {
        $scope.showDetalleContratista = true;
        $scope.showFormCreateContratista = false;
        $scope.showFormCreateEmpresa = false;
    }

    $scope.showFormEmpresa = function () {
        $scope.showFormCreateContratista = false;
        $scope.showDetalleContratista = false;
        $scope.showFormCreateEmpresa = true;

        $scope.formEmpresa = {
            idempresa   : 0,
            uid         : uid,
            nombre      : "",
            nit         : "",
            direccion   : "",
            telefono    : "",
            correo      : ""
        }
    }

    $scope.isEmptyEmpresa = false;
    $scope.isEmptyContratista = false;
    $scope.type = '';
    $scope.message = '';

    $scope.createEmpresa = function () {

        if (Form.checkFormObject($scope.formEmpresa)) {
            $scope.isEmptyEmpresa = true;
            $scope.type = 'danger';
            $scope.message = 'Ingrese los valores de la empresa';
        }
        else {
            Route.post('Proveedores/CreateEmpresa', $scope.formEmpresa).then(response => {
                if (response.data.status) {
                    $scope.isEmptyEmpresa = true;
                    $scope.type = 'success';
                    $scope.message = response.data.message;
                    $scope.getResumenEmpresas();
                    $scope.getResumeProveedores();

                    $scope.formEmpresa = {
                        idempresa   : 0,
                        uid         : uid,
                        nombre      : "",
                        nit         : "",
                        direccion   : "",
                        telefono    : "",
                        correo      : ""
                    }
                }
                else {
                    $scope.isEmptyEmpresa = true;
                    $scope.type = 'danger';
                    $scope.message = response.data.message;
                }
            });
        }

        $timeout(() => {
            $scope.isEmptyEmpresa = false;
        }, 2000)
    }

    $scope.createContratista = function () {

        if (Form.checkFormObject($scope.formContratista)) {
            $scope.isEmptyContratista = true;
            $scope.type = 'danger';
            $scope.message = 'Ingrese los datos del contratista';
        }
        else {
            Route.post('Proveedores/CreateContratista', $scope.formContratista).then(response => {
                if (response.data.status) {
                    $scope.isEmptyContratista = true;
                    $scope.type = 'success';
                    $scope.message = response.data.message;

                    $scope.formContratista = {
                        idcontratista   : 0,
                        uid             : uid, 
                        cedula          : "", 
                        nombres         : "",                          
                        correo          : "", 
                        empresa         : "", 
                        eps             : "", 
                        arl             : "",
                        expedicion      : "",
                        estado          : false
                    }
                }
                else {
                    $scope.isEmptyContratista = true;
                    $scope.type = 'danger';
                    $scope.message = response.data.message;
                }
            });
        }

        $timeout(() => {
            $scope.isEmptyContratista = false;
        }, 2500)
    }

    $scope.selectedIdResource = 0;
    $scope.seeDetails = 0;

    $scope.showButtonOptions = function(idProveedor){
        $scope.seeDetails = idProveedor;
    }

    $scope.selectItem = function(idProveedor){
        $scope.selectedIdResource = idProveedor;
    }

    $scope.cancelDelete = function(){
        $scope.selectedIdResource = 0;
    }

    $scope.showDetalleEmpresas = 'No se muestran detalles';
    $scope.resultDetallEmpresa = false;

    $scope.requestDetails = function(idProveedor){

        $scope.showDetalleEmpresas = 'Cargando detalles ...';

        Route.post('Proveedores/Read', { id : idProveedor }).then(response => {
            if(response.data.status)
            {
                let data = response.data.rows[0];

                $scope.nombre = data.nombre_proveedor;
                $scope.nit = data.nit_proveedor;
                $scope.direccion = data.direccion_proveedor;
                $scope.telefono = data.telefono_proveedor;
                $scope.correo = data.correo_proveedor;
                $scope.contratistas = response.data.integrantes;

                $scope.resultDetallEmpresa = true;
                $scope.showFormCreateEmpresa = false;
                $scope.showDetalleContratista = true;
                $scope.showFormCreateContratista = false;
            }

            $scope.showDetalleEmpresas = 'No se muestran detalles';
        });
    }

    $scope.hideDetallesEmpresa = function(){
        $scope.resultDetallEmpresa = false;
    }

    $scope.loadFormEdit = 'pen';
    $scope.editForm = false;

    $scope.enableFormToEdit = function(){
        $scope.loadFormEdit = 'ellipsis-h';        

        Route.post('Proveedores/Read', { id : $scope.seeDetails }).then(response => {
            if(response.data.status)
            {
                let data = response.data.rows[0];

                $scope.formEmpresa = {
                    idempresa   : data.id_sg_mi_proveedor,
                    uid         : uid,
                    nombre      : data.nombre_proveedor,
                    nit         : parseInt(data.nit_proveedor),
                    direccion   : data.direccion_proveedor,
                    telefono    : parseInt(data.telefono_proveedor),
                    correo      : data.correo_proveedor
                }

                $scope.editForm = true;
                $scope.showDetalleContratista = false;
                $scope.showFormCreateEmpresa = true;
                $scope.loadFormEdit = 'pen';
            }            
        });
    }

    $scope.btnUpdateEmpresa = 'Actualizar Empresa';

    $scope.updateEmpresa = function(){

        if(Form.checkFormObject($scope.formEmpresa))
        {
            $scope.isEmptyContratista = true;
            $scope.type = 'danger';
            $scope.message = 'Ingrese los datos de la empresa';
        }
        else
        {
            $scope.btnUpdateEmpresa = 'Actualizando ...';

            Route.post('Proveedores/UpdateEmpresa', $scope.formEmpresa).then(response => {
                if(response.data.status)
                {
                    $scope.isEmptyContratista = true;
                    $scope.type = 'success';
                    $scope.message = response.data.message;
                    $scope.getResumenEmpresas();
                    $scope.getResumeProveedores();
                    $scope.requestDetails($scope.formEmpresa.idempresa);
                }

                $scope.btnUpdateEmpresa = 'Actualizar Empresa';
            });
        }
    }

    $scope.muestraErrorEmpresa = false;
    $scope.typeAlert = '';
    $scope.mensajeErrorEmpresa = '';

    $scope.deleteEmpresa = function(idProveedor){
        Route.post('Proveedores/DisableEmpresa', { id : idProveedor }).then(response => {
            if(response.data.status)
            {
                $scope.getResumenEmpresas();
                $scope.getResumeProveedores();
                $scope.selectedIdResource = 0;
                $scope.seeDetails = 0;
            }
            else
            {
                $scope.muestraErrorEmpresa = true;
                $scope.typeAlert = 'danger';
                $scope.mensajeErrorEmpresa = response.data.message;
            }
        });

        $timeout(() => {
            $scope.muestraErrorEmpresa = false;
        }, 3000);
    }

    $scope.enableSearchContratista = false;

    $scope.showSearchContratista = function(){
        $scope.enableSearchContratista = true;
    }

    $scope.hideSearchContratista = function(){
        $scope.enableSearchContratista = false;
    }

    $scope.seeDetallesContratista = 0;
    $scope.selectedIdContratista = 0;

    $scope.showOptionsContratista = function(idContratista){
        $scope.seeDetallesContratista = idContratista;
    }

    $scope.selectItemContratista = function(idContratista){
        $scope.selectedIdContratista = idContratista;
    }

    $scope.cancelDeleteContratista = function(){
        $scope.selectedIdContratista = 0;
    }

    $scope.loadFormEditContratista = 'pen';
    $scope.loadEditContratista = false;

    $scope.requestDetailsContratista = function(idContratista){
        
        $scope.loadFormEditContratista = 'ellipsis-h';

        Route.post('Proveedores/ReadByContratista', { id : idContratista }).then(response => {
            if(response.data.status)
            {
                let data = response.data.rows[0];

                $scope.formContratista = {
                    idcontratista   : data.id_sg_personal_proveedor,
                    uid             : uid, 
                    cedula          : parseInt(data.cedula_proveedor), 
                    nombres         : data.nombres_personal,                     
                    correo          : data.correo_personal, 
                    empresa         : data.id_sg_mi_proveedor, 
                    eps             : data.id_sg_eps, 
                    arl             : data.id_sg_arl,
                    expedicion      : data.expedicion_cedula
                }
                
                $scope.loadEditContratista = true;
                $scope.showFormCreateContratista = true;
                $scope.showDetalleContratista = false;
                $scope.loadFormEditContratista = 'pen';               
            }
        });
    }

    $scope.btnEliminaContratista = 'Si, Eliminalo';

    $scope.deleteContratista = function(idContratista, idProveedor){

        $scope.btnEliminaContratista = 'Eliminando ...';

        Route.post('Proveedores/DeleteContratista', { id : idContratista }).then(response => {
            if(response.data.status)            
                $scope.requestDetails(idProveedor);
            else
            {
                $scope.muestraErrorEmpresa = true;
                $scope.typeAlert = 'warning';
                $scope.mensajeErrorEmpresa = response.data.message;
            }

            $scope.btnEliminaContratista = 'Si, Eliminalo';
            $timeout(() => {
                $scope.muestraErrorEmpresa = false;
            }, 2800);
        });
    }

    $scope.updateContratista = function(){
        if(Form.checkFormObject($scope.formContratista))
        {
            $scope.isEmptyContratista = true;
            $scope.type = 'danger';
            $scope.message = 'Ingrese los datos del contratista';
        }
        else
        {
            Route.post('Proveedores/UpdateContratista', $scope.formContratista).then(response => {
                if(response.data.status)
                {
                    $scope.isEmptyContratista = true;
                    $scope.type = 'success';
                    $scope.message = response.data.message;
                    $scope.getResumenEmpresas();
                    $scope.getResumeProveedores();
                    $scope.requestDetails($scope.formContratista.empresa);

                    $scope.showDetalleContratista = true;
                    $scope.showFormCreateContratista = false;
                }                
            });
        }
    }
}]);