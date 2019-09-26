app.controller('residencial', ['$scope', '$http', 'Core', 'Form', '$timeout', function($scope, $http, Core, Form, $timeout){
    
    $scope.uid = uid;
    $scope.dataApartamentos = [];
    $scope.dataTorres = [];
    $scope.dataResidentes = [];
    $scope.dataIntegrantes = [];
    $scope.loadDataApartamentos = false;
    $scope.loadDataTorres = false;
    $scope.cedula = 0;
    $scope.telefono = 0;
    $scope.torre = '';
    $scope.dataResource = [];
    $scope.searchApartamento = '';
    $scope.pisoapto = 0;
    $scope.searchTorre = '';    

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
            {
                $scope.dataTorres = response.data.rows;
                $scope.loadDataTorres = true;
            }
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
            $scope.showDetallesTorres = false;
        }
        
        if($scope.torre == '0')
        {
            $scope.estadoFormResidente = true;
            $scope.estadoFormApto = false;            
            $scope.estadoFormTorre = false;
            $scope.showDetallesTorres = false;
        }        
    }

    $scope.openAddTorreList = function()
    {
        $scope.estadoFormApto = false;
        $scope.estadoFormTorre = true;
        $scope.showDetallesTorres = false;
    }

    $scope.closeAddTorre = function()
    {
        $scope.estadoFormApto = true;
        $scope.estadoFormTorre = false;
    }

    $scope.showDetallesTorres = false;

    $scope.openTorre = function()
    {
        $scope.estadoFormApto = false;
        $scope.detalleApto = false;
        $scope.showDetallesResidente = false;
        $scope.showDetallesTorres = true;
    }

    $scope.closeListTorre = function()
    {
        $scope.detalleApto = true;
        $scope.showDetallesTorres = false;
    }

    $scope.selectIdTorre = 0;
    $scope.verBotones = 0;

    $scope.mostrarBotonesTorre = function(idTorre)
    {
        $scope.verBotones = idTorre;
    }

    $scope.selectTorre = function(idApto)
    {
        $scope.selectIdTorre = idApto;
    }

    $scope.cancelDeleteTorre = function()
    {
        $scope.selectIdTorre = 0;
    }

    $scope.messageDeleteTorre = false;
    $scope.showMessageDeleteTorre = '';    

    $scope.deleteProcessTorre = function(id)
    {
        var promiseDeleteTorre = $http.post(baseurl + 'torres/delete', { idTorre : id });

        promiseDeleteTorre.then((response) => {
            if(response.data.status)
            {
                $scope.type = 'success';
                $scope.showMessageDeleteTorre = true;
                $scope.messageDeleteTorre = response.data.message;                
            }
            else
            {
                $scope.type = 'danger';
                $scope.showMessageDeleteTorre = true;
                $scope.messageDeleteTorre = response.data.message;                
            }
        });

        $timeout(() => {            
            $scope.showMessageDeleteTorre = false;
            $scope.getTorres();
        }, 2500)
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
            clear   : true
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
        var createApto = Form.OnSubmitForm(
        {
            form    : '#frm-create-apto',
            css     : '.required',
            route   : baseurl + 'apartamentos/create',
            fields  : '',
            clear   : false
        });

        $scope.btnCreateApto = 'Registrando ...';

        if(createApto == true)
        {
            $scope.type = 'danger';
            $scope.messageErrorApto = 'Por favor, ingresa los datos del Apartamento';
            $scope.showMessageApto = true;
            $scope.btnCreateApto = 'Registrar';
        }
        else
        {
            createApto.then((response) => {
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
                    $scope.btnCreateApto = 'Registrar';
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

        $scope.gridApartamentos = false;
        $scope.detalleApto = true;
        $scope.estadoFormApto = false;
        $scope.showDetallesTorres = false;
        $scope.showDetallesResidente = false;

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

                $scope.dataIntegrantes = response.data.residentes;
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
        $scope.dataIntegrantes = [];
    }

    $scope.btnActualizaApto = 'Actualizar';

    $scope.updateApto = function()
    {
        var updateApto = Form.OnSubmitForm(
        {
            form    : '#frm-create-apto',
            css     : '.required',
            route   : baseurl + 'apartamentos/update',
            fields  : '',
            clear   : false
        });

        $scope.btnActualizaApto = 'Actualizando ...';

        if(updateApto == true)
        {
            $scope.type = 'danger';
            $scope.messageErrorApto = 'Por favor, ingresa los datos del Apartamento';
            $scope.showMessageApto = true;
            $scope.btnActualizaApto = 'Actualizar';
        }
        else
        {
            updateApto.then((response) => {
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
    $scope.messageDeleteApto = '';
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
                    $scope.estadoFormResidente = false;
                    $scope.estadoFormApto = false;
                    $scope.estadoFormResidente = false;
                    $scope.showDetallesResidente = true;
                    $scope.addResidente();

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
        $scope.estadoFormApto = false;
        $scope.estadoFormResidente = false;
        $scope.showDetallesResidente = true;
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

    $scope.setScroll = function(data)
    {
        if(data.length > 5)
            return 'setScroll';
    }

    $scope.showDetallesResidente = false;
    $scope.loadDataResidentes = false;

    $scope.addResidente = function()
    {
        $scope.showDetallesResidente = true;
        $scope.detalleApto = false;

        var promiseDataApartamentos = $http.post(baseurl + 'residentes/readbyid', { uid : uid });

        promiseDataApartamentos.then((response) => {
            if(response.data.status)
            {
                $scope.dataResidentes = response.data.rows;
                $scope.loadDataResidentes = true;
            }
        });
    }

    $scope.closeListResidente = function()
    {
        $scope.detalleApto = true;
        $scope.showDetallesResidente = false;
    } 
    
    $scope.selectIdResidente = 0;

    $scope.selectResidente = function(idResidente)
    {
        $scope.selectIdResidente = idResidente;
    }

    $scope.cancelDeleteResidente = function()
    {
        $scope.selectIdResidente = 0;
    }

    $scope.selectIdResidenteAsignar = 0;

    $scope.asignaResidente = function(idResidente)
    {
        $scope.selectIdResidenteAsignar = idResidente;
    }

    $scope.cancelAsignacion = function()
    {
        $scope.selectIdResidenteAsignar = 0;
    }

    $scope.btnAsignacion = 'Si, Asignalo';

    $scope.messageAsignaResidente = '';
    $scope.showMessageAsignaResidente = false;

    $scope.processAsignacion = function(idResidente)
    {
        var residente = $http.post(baseurl + 'residentes/asigna', { idResidente : idResidente, idApto : $scope.idApto, idTorre : $scope.torre, uid : uid });

        $scope.btnAsignacion = 'Asignado ...';

        if(residente == true)
        {
            return false;
        }
        else
        {
            residente.then((response) => {
                if(response.data.status)
                {
                    $scope.type = 'success';
                    $scope.messageAsignaResidente = response.data.message;
                    $scope.showMessageAsignaResidente = true;
                    $scope.requestDetalles($scope.idApto);
                    $scope.btnAsignacion = 'Si, Asignalo';
                }
                else
                {
                    $scope.type = 'danger';
                    $scope.messageAsignaResidente = response.data.message;
                    $scope.showMessageAsignaResidente = true;                    
                    $scope.btnAsignacion = 'Si, Asignalo';
                }
            });
        }

        $timeout(() => {
            $scope.showMessageAsignaResidente = false;
        }, 2500);
    }

    $scope.messageDeleteResidente = '';
    $scope.showmessageDeleteResidente = false;

    $scope.deleteProcessResidente = function(idResidente)
    {
        var promiseDataDeleteResidente = $http.post(baseurl + 'residentes/delete', { id : idResidente });

        promiseDataDeleteResidente.then(response => {
            if(response.data.status)
            {
                $scope.type = 'success';
                $scope.messageDeleteResidente = response.data.message;
                $scope.showmessageDeleteResidente = true;
                $scope.addResidente();
            }
            else
            {
                $scope.type = 'danger';
                $scope.messageDeleteResidente = response.data.message;
                $scope.showmessageDeleteResidente = true;
                $scope.addResidente();
            }
        });

        $timeout(() => {
            $scope.selectIdResidenteAsignar = 0;
            $scope.showmessageDeleteResidente = false;            
        }, 2500);
    }

    $scope.openFormResidente = function()
    {
        $scope.showDetallesResidente = false;
        $scope.detalleApto = false;
        $scope.estadoFormResidente = true;
    }

    $scope.residenteAsignado = 0;

    $scope.removerResidente = function(idResidente)
    {
        $scope.residenteAsignado = idResidente;        
    }

    $scope.cancelaRemover = function()
    {
        $scope.residenteAsignado = 0;
    }

    $scope.messageDeleteResidente = '';
    $scope.showMessageDeleteResidente = false;

    $scope.eliminaResidente = function(idResidente)
    {
        var promiseDeleteResidente = $http.post(baseurl + 'residentes/desasignar', { id : idResidente });

        promiseDeleteResidente.then((response) => {
            if(response.data.status)
            {
                $scope.type = 'success';
                $scope.messageDeleteResidente = response.data.message;
                $scope.showMessageDeleteResidente = true;
                $scope.dataIntegrantes = [];
            }
        });

        $timeout(() => {            
            $scope.showMessageDeleteResidente = false;
        }, 2500);
    }

    $scope.gridApartamentos = false;
    $scope.gridResidente = false;
    $scope.panelApto = false;
    $scope.panelResidente = false;
    $scope.panelDetalleResidente = false;

    $scope.closeDetalleApartamentos = function()
    {
        $scope.panelApto = false;
        $scope.panelResidente = false;
        $scope.gridApartamentos = false;
        $scope.panelDetalleResidente = false;
    }

    $scope.verGridApartamentos = function()
    {
        $scope.panelApto = true;
        $scope.panelResidente = true;
        $scope.gridApartamentos = true;
        $scope.panelDetalleResidente = true;
        $scope.gridResidentes = false;
    }

    $scope.gridDetalleResidentes = [];
    $scope.loadgridDetalleResidentes = false;

    $scope.verGridResidentes = function()
    {        
        $scope.panelApto = true;
        $scope.panelResidente = false;
        $scope.gridApartamentos = false;
        $scope.panelDetalleResidente = true;
        $scope.gridResidentes = true;

        var promiseDetalleResidentes = $http.post(baseurl + 'residentes/readresidentedetalles', { uid : uid });
        $scope.loadgridDetalleResidentes = true;

        promiseDetalleResidentes.then((response) => {
            if(response.data.status)
            {
                $scope.gridDetalleResidentes = response.data.rows;
                $scope.loadgridDetalleResidentes = false;
            }
        })
    }

    $scope.closeDetalleResidentes = function()
    {
        $scope.gridResidentes = false;
        $scope.panelApto = false;
        $scope.panelDetalleResidente = false;
    }
}]);