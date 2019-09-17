app.controller('residencial', ['$scope', '$http', 'Core', 'Form', '$timeout', function($scope, $http, Core, Form, $timeout){
    
    $scope.uid = uid;
    $scope.dataApartamentos = [];
    $scope.dataTorres = [];
    $scope.loadDataApartamentos = false;
    $scope.cedula = 0;
    $scope.telefono = 0;
    $scope.torre = '';
    $scope.dataResource = [];
    $scope.searchApartamento = '';
    $scope.pisoapto = 0;

    $scope.getApartamentos = function()
    {
        var promiseDataApartamentos = $http.post(baseurl + 'apartamentos/readbyid', { uid : uid });

        promiseDataApartamentos.then((response) => {
            if(response.data.status)
            {
                $scope.dataApartamentos = response.data.rows;
                $scope.dataResource = response.data.rows;
                $scope.loadDataApartamentos = true;
            }
        });
    }

    $scope.getTorres = function()
    {
        var promiseDataTorres = $http.post(baseurl + 'torres/readbyid', {uid : uid});

        promiseDataTorres.then((response) => {
            if(response.data.status)
                $scope.dataTorres = response.data.rows;
        });
    }

    $scope.getApartamentos();
    $scope.getTorres();

    $scope.detalleApto = true;
    $scope.estadoFormApto = false;
    $scope.estadoFormTorre = false; 

    $scope.openAddApto = function()
    {        
        $scope.torre = '';
        $scope.pisoapto = 0;
        $scope.nombreapto = '';
        $scope.estadoapto = '0';
        $scope.detalleApto = false;
        $scope.estadoFormApto = true;
        $scope.showEditFormApto = false;
    }

    $scope.closeAddApto = function()
    {
        $scope.detalleApto = true;
        $scope.estadoFormApto = false;
    }

    $scope.openAddTorre = function()
    {
        if($scope.torre == '2')
        {
            $scope.estadoFormApto = false;
            $scope.estadoFormTorre = true;
        }
        
        if($scope.torre == '0')
        {
            $scope.estadoFormApto = false;
            $scope.estadoFormResidente = true;
        }
    }

    $scope.closeAddTorre = function()
    {
        $scope.estadoFormApto = true;
        $scope.estadoFormTorre = false;
    }

    $scope.btnCreateTorre = 'Registrar Torre';
    $scope.showMessageTorre = false;
    $scope.type = '';

    $scope.createTorre = function()
    {
        var torre = Form.OnSubmitForm(
        {
            form    : '#frm-create-torre',
            css     : '.required',
            route   : baseurl + 'torres/create',
            fields  : '',
            clear   : false
        });

        $scope.btnCreateTorre = 'Registrando ...';

        if(torre == true)
        {
            $scope.type = 'danger';
            $scope.messageErrorTorre = 'Por favor, ingrese el nombre de la torre';
            $scope.showMessageTorre = true;
            $scope.btnCreateTorre = 'Registrar Torre';
        }
        else
        {
            torre.then((response) => {
                if(response.data.status)
                {
                    $scope.type = 'success';
                    $scope.messageErrorTorre = response.data.message;
                    $scope.showMessageTorre = true;
                    $scope.btnCreateTorre = 'Registrar Torre';
                    $scope.getTorres();
                }
                else
                {
                    $scope.type = 'danger';
                    $scope.messageErrorTorre = response.data.message;
                    $scope.showMessageTorre = true;
                }
            });
        }

        $timeout(() => {
            $scope.showMessageTorre = false;
        }, 2500);
    }

    $scope.btnCreateApto = 'Registrar';
    $scope.messageErrorApto = '';
    $scope.showMessageApto = false;
    $scope.type = '';

    $scope.createApto = function()
    {
        var torre = Form.OnSubmitForm(
        {
            form    : '#frm-create-apto',
            css     : '.required',
            route   : baseurl + 'apartamentos/create',
            fields  : '',
            clear   : false
        });

        $scope.btnCreateApto = 'Registrando ...';

        if(torre == true)
        {
            $scope.type = 'danger';
            $scope.messageErrorApto = 'Por favor, ingresa los datos del Apartamento';
            $scope.showMessageApto = true;
            $scope.btnCreateApto = 'Registrar';
        }
        else
        {
            torre.then((response) => {
                if(response.data.status)
                {
                    $scope.type = 'success';
                    $scope.messageErrorApto = response.data.message;
                    $scope.showMessageApto = true;
                    $scope.btnCreateApto = 'Registrar';
                    $scope.closeAddApto();
                    $scope.getApartamentos();
                    Form.resetForm('#frm-create-apto');
                }
                else
                {
                    $scope.type = 'danger';
                    $scope.messageErrorApto = response.data.message;
                    $scope.showMessageApto = true;
                }
            });
        }

        $timeout(() => {
            $scope.showMessageApto = false;
        }, 2500);
    }

    $scope.verDetalle = 0;
    $scope.selectIdApto = 0;
    $scope.muestraMensajeCarga = 'No hay detalles que mostrar';
    $scope.resultDataApto = false;
    $scope.dataDetalles = [];

    $scope.mostrarDetalles = function(idApto)
    {
        $scope.verDetalle = idApto;
    }

    $scope.opcionesApto = false;

    $scope.requestDetalles = function(idApto)
    {
        var promiseDetalleAptos = $http.post(baseurl + 'apartamentos/readbyidapto', { id : idApto });

        $scope.detalleApto = true;
        $scope.estadoFormApto = false;
        $scope.muestraMensajeCarga = 'Cargando detalles ...';

        promiseDetalleAptos.then((response) => {
            if(response.data.status)
            {
                $scope.dataDetalles = response.data.rows[0];
                $scope.resultDataApto = true;

                $scope.idApto = $scope.dataDetalles.id_sg_apto;
                $scope.torre = $scope.dataDetalles.id_sg_torre;
                $('#estadoApto').val($scope.dataDetalles.id_sg_estado).change();
                $scope.pisoapto = parseInt($scope.dataDetalles.piso_apto);
                $scope.nombreapto = $scope.dataDetalles.numero_apto;
            }

            $scope.opcionesApto = true;
            $scope.muestraMensajeCarga = 'No hay detalles que mostrar';
        });
    }

    $scope.showEditFormApto = false;

    $scope.openEditForm = function()
    {
        $scope.requestDetalles($scope.idApto);
        $scope.estadoFormApto = true;
        $scope.detalleApto = false;
        $scope.showEditFormApto = true;
    }

    $scope.cancelEditApto = function()
    {        
        $scope.resultDataApto = false;
        $scope.opcionesApto = false;
    }

    $scope.btnActualizaApto = 'Actualizar';

    $scope.updateApto = function()
    {
        var torre = Form.OnSubmitForm(
        {
            form    : '#frm-create-apto',
            css     : '.required',
            route   : baseurl + 'apartamentos/update',
            fields  : '',
            clear   : false
        });

        $scope.btnActualizaApto = 'Actualizando ...';

        if(torre == true)
        {
            $scope.type = 'danger';
            $scope.messageErrorApto = 'Por favor, ingresa los datos del Apartamento';
            $scope.showMessageApto = true;
            $scope.btnActualizaApto = 'Actualizar';
        }
        else
        {
            torre.then((response) => {
                if(response.data.status)
                {
                    $scope.type = 'success';
                    $scope.messageErrorApto = response.data.message;
                    $scope.showMessageApto = true;
                    $scope.btnActualizaApto = 'Actualizar';                    
                    $scope.getApartamentos();
                    Form.resetForm('#frm-create-apto');
                }
                else
                {
                    $scope.type = 'danger';
                    $scope.messageErrorApto = response.data.message;
                    $scope.showMessageApto = true;
                    $scope.btnActualizaApto = 'Actualizar';
                }
            });
        }

        $timeout(() => {
            $scope.showMessageApto = false;
        }, 2500);
    }

    $scope.selectItem = function(idApto)
    {
        $scope.selectIdApto = idApto;
    }

    $scope.type = 'danger';
    $scope.messageDeleteApto = 'Por favor, ingresa los datos del Apartamento';
    $scope.showMessageDeleteApto = false;

    $scope.deleteProcessApto = function(idApto)
    {
        var promiseDeleteApto = $http.post(baseurl + 'apartamentos/delete', { id : idApto });

        promiseDeleteApto.then((response) => {
            if(response.data.status)
            {
                $scope.type = 'success';
                $scope.messageDeleteApto = response.data.message;
                $scope.showMessageDeleteApto = true;
                $scope.resultDataApto = false;
                $scope.getApartamentos();
            }
            else
            {
                $scope.type = 'danger';
                $scope.messageDeleteApto = response.data.message;
                $scope.showMessageDeleteApto = true;
            }
        });

        $timeout(() => {
            $scope.showMessageDeleteApto = false;
        }, 3000);
    }

    $scope.cancelDelete = function()
    {
        $scope.selectIdApto = 0;
    }

    $scope.btnCreateResidente = 'Registrar Residente';
    $scope.btnDisableCreate = true;
    $scope.messageErrorResidente = '';
    $scope.showMessageResidente = false;

    $scope.createResidente = function()
    {
        var residente = Form.OnSubmitForm(
        {
            form    : '#frm-create-residente',
            css     : '.required',
            route   : baseurl + 'residentes/create',
            fields  : '',
            clear   : false
        });

        $scope.btnCreateResidente = 'Registrando ...';
        $scope.btnDisableCreate = true;

        if(residente == true)
        {
            $scope.type = 'danger';
            $scope.messageErrorResidente = 'Por favor, ingresa los datos del Apartamento';
            $scope.showMessageResidente = true;
            $scope.btnCreateResidente = 'Registrar Residente';
        }
        else
        {
            residente.then((response) => {
                if(response.data.status)
                {
                    $scope.type = 'success';
                    $scope.messageErrorResidente = response.data.message;
                    $scope.showMessageResidente = true;
                    $scope.btnCreateResidente = 'Registrar Residente';
                    $scope.estadoFormApto = true;
                    $scope.estadoFormResidente = false;
                    Form.resetForm('#frm-create-residente');
                }
                else
                {
                    $scope.type = 'danger';
                    $scope.messageErrorResidente = response.data.message;
                    $scope.showMessageResidente = true;
                    $scope.btnDisableCreate = false;
                    $scope.btnCreateResidente = 'Registrar Residente';
                }
            });
        }

        $timeout(() => {
            $scope.showMessageResidente = false;
        }, 2500);
    }

    $scope.closeAddResidente = function()
    {
        $scope.estadoFormResidente = false;
    }

    $scope.correo = '';

    $scope.checkEmail = function()
    {
        $scope.btnDisableCreate = true;

        if($scope.correo.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/))
        {
            $scope.btnDisableCreate = false;
        }
        else
        {
            $scope.btnDisableCreate = true;
        }
    }

    $scope.addResidente = function()
    {
        
    }

}]);