app.controller('configuracion', ['$scope', 'Core', 'Form', '$http', '$timeout', 'Route', function($scope, Core, Form, $http, $timeout, Route){
    
    $scope.eps = [];
    $scope.arl = [];
    $scope.personalControl = [];
    $scope.cargos = [];
    $scope.actividades = [];
    $scope.formEps = {};
    $scope.formCargos = {};
    $scope.formActividad = {};
    $scope.emptyFormEps = {};
    $scope.isEmptyEps = false;
    $scope.isEmptyArl = false;
    $scope.isEmptyCargo = false;
    $scope.isEmptyActividad = false;
    $scope.uid = uid;
    $scope.editEps = '';
    $scope.editArl = '';
    $scope.editCargo = '';
    $scope.editActividad = '';
    $scope.formEps.idEps = 0;
    $scope.formArl = {};
    $scope.formArl.idArl = 0;
    $scope.formCargos.idCargo = 0;
    $scope.formActividad.idActividad = 0;
    $scope.formControl = {};    
    $scope.formControl.idControl = 0;
    $scope.isEmptyControl = false;
    $scope.searchPersonalControl = '';
    $scope.enableSearchPersonalControl = false;
    $scope.searchCargo = '';
    $scope.searchArl = '';
    $scope.searchEps = '';
    $scope.searchActividad = '';

    $scope.setScroll = function(data)
    {
        if(data.length > 3)
            return 'setScrollConfig';
    }

    $scope.promiseDataServer = function(route, data)
    {
        return $http.post(baseurl + route, data);
    }

    $scope.promiseDataServer('configuracion/readeps', { uid : uid }).then(response => {
        if(response.data.status)
            $scope.eps = response.data.rows;
        else
            $scope.eps = [];
    });

    $scope.promiseDataServer('configuracion/readarl', { uid : uid }).then(response => {
        if(response.data.status)
            $scope.arl = response.data.rows;
        else
            $scope.arl = [];
    });

    $scope.promiseDataServer('configuracion/readpersonalcontrol', {uid : uid}).then(response => {
        if(response.data.status)
            $scope.personalControl = response.data.rows;
        else
            $scope.personalControl = [];
    });

    Route.post('configuracion/readcargos', { uid : uid }).then(response => {
        if(response.data.status)
            $scope.cargos = response.data.rows;
        else
            $scope.cargos = [];
    });

    Route.post('configuracion/readactividades', { uid : uid }).then(response => {
        if(response.data.status)
            $scope.actividades = response.data.rows;
        else
            $scope.actividades = [];
    });

    $scope.muestraFormEps = false;
    $scope.muestraFormCargo = false;
    $scope.muestraFormActividad = false;

    $scope.showFormEps = function(){
        $scope.editEps = '';
        $scope.formEps.idEps = 0;
        $scope.muestraFormEps = true;
    }

    $scope.showFormCargo = function(){
        $scope.editCargo = '';
        $scope.formCargos.idCargo = 0;
        $scope.muestraFormCargo = true;
    }

    $scope.showFormActividad = function(){
        $scope.editActividad = '';
        $scope.formActividad.idActividad = 0;
        $scope.muestraFormActividad = true;
    }

    $scope.hideFormEps = function(){
        $scope.muestraFormEps = false;        
        $scope.formEps.nombreEps = '';
    }

    $scope.hideFormCargo = function(){
        $scope.muestraFormCargo = false;        
        $scope.formCargos.nombreCargo = '';
    }

    $scope.hideFormActividad = function(){
        $scope.muestraFormActividad = false;
        $scope.formActividad.nombreActividad = '';
    }

    $scope.showBusquedaEps = false;
    $scope.showBusquedaArl = false;
    $scope.showBusquedaCargo = false;
    $scope.showBusquedaActividad = false;

    $scope.showPanelBusqueda = function(){
        $scope.showBusquedaEps = true;
        $scope.muestraFormEps = false;
    }

    $scope.showPanelBusquedaArl = function(){
        $scope.showBusquedaArl = true;
        $scope.muestraFormArl = false;
    }

    $scope.showPanelBusquedaCargo = function(){
        $scope.showBusquedaCargo = true;
        $scope.muestraFormCargo = false;
    }

    $scope.showPanelBusquedaActividad = function(){
        $scope.showBusquedaActividad = true;
        $scope.muestraFormActividad = false;
    }

    $scope.hidePanelBusqueda = function(){
        $scope.showBusquedaEps = false;
    }

    $scope.hidePanelBusquedaArl = function(){
        $scope.showBusquedaArl = false;
    }

    $scope.hidePanelBusquedaCargo = function(){
        $scope.showBusquedaCargo = false;
    }

    $scope.hidePanelBusquedaActividad = function(){
        $scope.showBusquedaActividad = false;
    }

    $scope.setForm = function(formEps){
        $scope.emptyFormEps = formEps;
    }

    $scope.createEps = function(){        
        
        if(Form.checkFormObject($scope.formEps))
        {
            $scope.message = 'Por favor, ingresa el nombre de la EPS que deseas registrar';
            $scope.type = 'danger';
            $scope.isEmptyEps = true;

            $timeout(() => {
                $scope.isEmptyEps = false;
                $scope.hideFormEps();
            }, 2000);
        }
        else
        {
            $scope.promiseDataServer('configuracion/createeps', $scope.formEps).then(response => {
                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyEps = true;
                    $scope.formEps.nombreEps = '';

                    $scope.promiseDataServer('configuracion/readeps', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.eps = response.data.rows;
                        else
                            $scope.eps = [];        
                    });
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyEps = true;
                }
            });

            $timeout(() => {
                $scope.isEmptyEps = false;
                $scope.hideFormEps();
            }, 2000);
        }
    }

    $scope.seeOptions = 0;
    $scope.selectedRow = 0;

    $scope.showOptionsList = function(id){
        $scope.seeOptions = id;
    }

    $scope.selectRowDeleteEps = function(id){
        $scope.selectedRow = id;
    }

    $scope.cancelDeleteEps = function(){
        $scope.selectedRow = 0;
    }

    $scope.selectRowEditEps = function(id, nombreEps){
        $scope.muestraFormEps = true;
        $scope.formEps.idEps = id;
        $scope.editEps = nombreEps;
    }

    $scope.deleteEps = function(id){
        $scope.promiseDataServer('configuracion/deleteeps', { ideps : id }).then((response) => {
            if(response.data.status)
            {
                $scope.promiseDataServer('configuracion/readeps', { uid : uid }).then(response => {
                    if(response.data.status)
                        $scope.eps = response.data.rows;
                    else
                        $scope.eps = [];
                });
            }
        });
    }

    $scope.editEpsForm = function(){        

        if(Form.checkFormObject($scope.formEps))
        {
            $scope.message = 'Por favor, ingresa el nombre de la EPS que deseas registrar';
            $scope.type = 'danger';
            $scope.isEmptyEps = true;

            $timeout(() => {
                $scope.isEmptyEps = false;
                $scope.hideFormEps();
            }, 2000);
        }
        else
        {
            $scope.promiseDataServer('configuracion/updateeps', $scope.formEps).then(response => {

                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyEps = true;
                    $scope.formEps.nombreEps = '';                    

                    $scope.promiseDataServer('configuracion/readeps', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.eps = response.data.rows;
                        else
                            $scope.eps = [];        
                    });

                    $scope.isEmptyEps = false;
                    $scope.hideFormEps();
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyEps = true;
                }
            });
        }
    }

    $scope.seeOptionsArl = 0;
    $scope.seeOptionsCargo = 0;
    $scope.seeOptionsActividad = 0;
    $scope.selectedRowArl = 0;
    $scope.selectedRowCargo = 0;
    $scope.selectedRowActividad = 0;
    $scope.muestraFormArl = false;

    $scope.showFormArl = function(){
        $scope.nombreArl = '';
        $scope.formArl.idArl = 0;
        $scope.muestraFormArl = true;
    }

    $scope.hideFormArl = function(){
        $scope.muestraFormArl = false;
    }

    $scope.createArl = function(){

        if(Form.checkFormObject($scope.formArl)){
            $scope.message = 'Por favor, ingresa el nombre de la ARL que deseas registrar';
            $scope.type = 'danger';
            $scope.isEmptyArl = true;

            $timeout(() => {
                $scope.isEmptyArl = false;
                $scope.hideFormEps();
            }, 2000);
        }
        else
        {
            $scope.promiseDataServer('configuracion/createarl', $scope.formArl).then((response) => {
                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyArl = true;
                    $scope.nombreArl = '';
                    $scope.muestraFormArl = false;

                    $scope.promiseDataServer('configuracion/readarl', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.arl = response.data.rows;
                        else
                            $scope.arl = [];
                    });
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyArl = true;
                }
            });
        }

        $timeout(() => {
            $scope.isEmptyArl = false;            
        }, 2000);
    }

    $scope.showOptionsArl = function(id){
        $scope.seeOptionsArl = id;
    }

    $scope.showOptionsCargo = function(id){        
        $scope.seeOptionsCargo = id;
    }

    $scope.showOptionsActividad = function(id){
        $scope.seeOptionsActividad = id;
    }

    $scope.selectRowDeleteArl = function(id){
        $scope.selectedRowArl = id;
    }

    $scope.selectRowDeleteCargo = function(id){
        $scope.selectedRowCargo = id;
    }

    $scope.selectRowDeleteActividad = function(id){
        $scope.selectedRowActividad = id;
    }

    $scope.selectRowEditArl = function(id, nombreArl){
        $scope.muestraFormArl = true;
        $scope.formArl.idArl = id;
        $scope.nombreArl = nombreArl;
    }

    $scope.selectRowEditCargo = function(id, nombreCargo){
        $scope.muestraFormCargo = true;
        $scope.formCargos.idCargo = id;
        $scope.editCargo = nombreCargo;
    }

    $scope.selectRowEditActividad = function(id, nombreActividad){
        $scope.muestraFormActividad = true;
        $scope.formActividad.idActividad = id;
        $scope.editActividad = nombreActividad;
    }

    $scope.deleteArl = function(id){
        $scope.promiseDataServer('configuracion/deletearl', { idarl : id }).then((response) => {
            if(response.data.status)
            {
                $scope.promiseDataServer('configuracion/readarl', { uid : uid }).then(response => {
                    if(response.data.status)
                        $scope.arl = response.data.rows;
                    else
                        $scope.arl = [];
                });     
            }
        });
    }

    $scope.cancelDeleteArl = function(){
        $scope.selectedRowArl = 0;
    }

    $scope.cancelDeleteCargo = function(){
        $scope.selectedRowCargo = 0;
    }

    $scope.cancelDeleteActividad = function(){
        $scope.selectedRowActividad = 0;
    }

    $scope.updateArl = function(){
        if(Form.checkFormObject($scope.formArl))
        {
            $scope.message = 'Por favor, ingresa el nombre de la ARL que deseas registrar';
            $scope.type = 'danger';
            $scope.isEmptyArl = true;

            $timeout(() => {
                $scope.isEmptyArl = false;
                $scope.hideFormArl();
            }, 2000);
        }
        else
        {
            $scope.promiseDataServer('configuracion/updatearl', $scope.formArl).then(response => {

                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyArl = true;
                    $scope.formArl.nombreArl = '';

                    $scope.promiseDataServer('configuracion/readarl', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.arl = response.data.rows;
                        else
                            $scope.arl = [];
                    }); 

                    $scope.isEmptyArl = false;
                    $scope.hideFormArl();
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyArl = true;
                }
            });
        }
    }

    $scope.showFormPersonalControl = false;

    $scope.formPersonalControl = function(){
        $scope.showFormPersonalControl = true;
    }

    $scope.hidePersonalControl = function(){
        $scope.showFormPersonalControl = false;

        $scope.formControl = {
            cedula      : "",
            nombres     : "",
            apellidos   : "",
            correo      : "",
            status      : false,
            cargo       : "",
            usuario     : "",
            passone     : "",
            passtwo     : "",
            idControl   : 0,
            uid         : uid
        }        
    }

    $scope.btnCreatePersonal = 'Registrar';

    $scope.createPersonalControl = function(){
        
        if(Form.checkFormObject($scope.formControl))
        {
            $scope.message = 'Por favor, ingrese los datos del empleado de control';
            $scope.type = 'danger';
            $scope.isEmptyControl = true;            
        }
        else
        {
            $scope.btnCreatePersonal = 'Creando ...';

            Route.post('configuracion/createpersonalcontrol', $scope.formControl).then(response => {
                if(response.data.status)
                {
                    $scope.promiseDataServer('configuracion/readpersonalcontrol', {uid : uid}).then(response => {
                        if(response.data.status)
                            $scope.personalControl = response.data.rows;
                        else
                            $scope.personalControl = [];

                        $scope.btnCreatePersonal = 'Registrar';
                        $scope.showFormPersonalControl = false;
                        $scope.formControl = {
                            cedula      : "",
                            nombres     : "",
                            apellidos   : "",
                            correo      : "",
                            status      : false,
                            cargo       : "",
                            usuario     : "",
                            passone     : "",
                            passtwo     : "",
                            idControl   : 0,
                            uid         : uid
                        }                        
                    });
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyControl = true;
                    $scope.btnCreatePersonal = 'Registrar';
                }
            });
        }

        $timeout(() => {
            $scope.isEmptyControl = false;
        }, 2000)
    }

    $scope.createCargo = function(){

        if(Form.checkFormObject($scope.formCargos))
        {
            $scope.message = 'Por favor, ingresa el nombre del Cargo que deseas registrar';
            $scope.type = 'danger';
            $scope.isEmptyCargo = true;

            $timeout(() => {
                $scope.isEmptyCargo = false;
                $scope.hideFormCargo();
            }, 3500);
        }
        else
        {
            $scope.promiseDataServer('configuracion/createcargo', $scope.formCargos).then(response => {
                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyCargo = true;
                    $scope.formEps.nombreEps = '';

                    Route.post('configuracion/readcargos', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.cargos = response.data.rows;
                        else
                            $scope.cargos = [];                            
                    });
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyCargo = true;
                }
            });

            $timeout(() => {
                $scope.isEmptyCargo = false;
                $scope.hideFormCargo();
            }, 2500);
        }
    }

    $scope.btnDeleteCargo = 'Si, Borralo';
    $scope.btnDeleteActividad = 'Si, Borralo'    ;

    $scope.deleteCargo = function(idcargo){

        $scope.btnDeleteCargo = 'Eliminando ...';

        Route.post('configuracion/deletecargo', { idcargo : idcargo }).then(response => {
            if(response.data.status)
            {
                $scope.promiseDataServer('configuracion/readcargos', { uid : uid }).then(response => {
                    if(response.data.status)
                        $scope.cargos = response.data.rows;
                    else
                        $scope.cargos = [];
                });
            }

            $scope.btnDeleteCargo = 'Si, Borralo';
        });
    }

    $scope.updateCargo = function(){
        if(Form.checkFormObject($scope.formCargos))
        {
            $scope.message = 'Por favor, este campo no puede estar vacio';
            $scope.type = 'danger';
            $scope.isEmptyCargo = true;

            $timeout(() => {
                $scope.isEmptyCargo = false;
                $scope.hideFormCargo();
            }, 2000);
        }
        else
        {
            Route.post('configuracion/updatecargo', $scope.formCargos).then(response => {

                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyCargo = true;
                    $scope.formCargos.nombreCargo = '';

                    $scope.promiseDataServer('configuracion/readcargos', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.cargos = response.data.rows;
                        else
                            $scope.cargos = [];
                    }); 

                    $scope.isEmptyCargo = false;
                    $scope.hideFormCargo();
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyCargo = true;
                }
            });
        }
    }

    $scope.selectedRowControl = 0;

    $scope.selectRowCargo = function(id){        
        $scope.selectedRowControl = id;
    }

    $scope.cancelDeletePersonal = function(){
        $scope.selectedRowControl = 0;
    }

    $scope.btnDeleteControl = 'Si, Borralo';

    $scope.deletePersonalControl = function(){
        let idControl = $scope.selectedRowControl;

        $scope.btnDeleteControl = 'Eliminando ...';

        Route.post('configuracion/deletepersonalcontrol', { id : idControl }).then(response => {
            if(response.data.status)
            {
                $scope.promiseDataServer('configuracion/readpersonalcontrol', {uid : uid}).then(response => {
                    if(response.data.status)
                        $scope.personalControl = response.data.rows;
                    else
                        $scope.personalControl = [];

                    $scope.btnDeleteControl = 'Si, Borralo';
                    $scope.selectedRowControl = 0;
                });
            }            
        });
    }    

    $scope.selectRowCargoEdit = function(idPersonalControl){
        
        Route.post('configuracion/readpersonalbyid', { id : idPersonalControl }).then(response => {
            if(response.data.status)
            {                
                $scope.formControl.idControl = response.data.rows[0].id_sg_personal_control;
                $scope.formControl.status = (response.data.rows[0].id_sg_estado == '1') ? true : false;
                $scope.formControl.cedula = parseInt(response.data.rows[0].cedula_control);
                $scope.formControl.nombres = response.data.rows[0].nombres_control;
                $scope.formControl.apellidos = response.data.rows[0].apellidos_control;
                $scope.formControl.correo = response.data.rows[0].correo_control;
                $scope.formControl.cargo = response.data.rows[0].id_sg_cargo;
                $scope.formControl.usuario = response.data.rows[0].usuario;
                $scope.formControl.passone = response.data.rows[0].recovery;
                $scope.formControl.passtwo = response.data.rows[0].recovery;

                $scope.formPersonalControl();                
            }
        })
    }

    $scope.btnUpdatePersonal = 'Actualizar';

    $scope.updatePersonalControl = function(){
        if(Form.checkFormObject($scope.formControl))
        {
            $scope.message = 'Por favor, ingresa los datos del personal';
            $scope.type = 'danger';
            $scope.isEmptyControl = true;
        }
        else
        {
            $scope.btnUpdatePersonal = 'Actualizando ...';

            Route.post('configuracion/updatepersonalcontrol', $scope.formControl).then(response => {
                if(response.data.status)
                {                    
                    $scope.showFormPersonalControl = false;
                    $scope.btnUpdatePersonal = 'Actualizar';

                    $scope.promiseDataServer('configuracion/readpersonalcontrol', {uid : uid}).then(response => {
                        if(response.data.status)
                            $scope.personalControl = response.data.rows;
                        else
                            $scope.personalControl = [];
                    });

                    $scope.isEmptyControl = false;
                }
            });
        }
    }

    $scope.createActividad = function(){

        if(Form.checkFormObject($scope.formActividad))
        {
            $scope.message = 'Por favor, ingresa el nombre de la Actividad que deseas registrar';
            $scope.type = 'danger';
            $scope.isEmptyActividad = true;

            $timeout(() => {
                $scope.isEmptyActividad = false;
                $scope.hideFormCargo();
            }, 3500);
        }
        else
        {
            $scope.promiseDataServer('configuracion/createactividad', $scope.formActividad).then(response => {
                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyActividad = true;
                    $scope.formActividad.nombreActividad = '';

                    Route.post('configuracion/readactividades', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.actividades = response.data.rows;
                        else
                            $scope.actividades = [];                            
                    });
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyActividad = true;
                }
            });

            $timeout(() => {
                $scope.isEmptyActividad = false;
                $scope.hideFormActividad();
            }, 2500);
        }
    }

    $scope.updateActividad = function(){
        if(Form.checkFormObject($scope.formActividad))
        {
            $scope.message = 'Por favor, este campo no puede estar vacio';
            $scope.type = 'danger';
            $scope.isEmptyActividad = true;

            $timeout(() => {
                $scope.isEmptyActividad = false;
                $scope.hideFormActividad();
            }, 2000);
        }
        else
        {
            Route.post('configuracion/updateactividad', $scope.formActividad).then(response => {

                if(response.data.status)
                {
                    $scope.message = response.data.message;
                    $scope.type = 'success';
                    $scope.isEmptyActividad = true;
                    $scope.formActividad.nombreActividad = '';

                    $scope.promiseDataServer('configuracion/readactividades', { uid : uid }).then(response => {
                        if(response.data.status)
                            $scope.actividades = response.data.rows;
                        else
                            $scope.actividades = [];
                    }); 

                    $scope.isEmptyActividad = false;
                    $scope.hideFormActividad();
                }
                else
                {
                    $scope.message = response.data.message;
                    $scope.type = 'danger';
                    $scope.isEmptyActividad = true;
                }
            });
        }
    }

    $scope.deleteActividad = function(idactividad){

        $scope.btnDeleteActividad = 'Eliminando ...';

        Route.post('configuracion/deleteactividad', { idactividad : idactividad }).then(response => {
            if(response.data.status)
            {
                $scope.promiseDataServer('configuracion/readactividades', { uid : uid }).then(response => {
                    if(response.data.status)
                        $scope.actividades = response.data.rows;
                    else
                        $scope.actividades = [];
                });
            }

            $scope.btnDeleteActividad = 'Si, Borralo';
        });
    }
}]);