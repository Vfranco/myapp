app.controller('visitantes', ['$scope', '$http', 'rx', 'Form', '$timeout', function ($scope, $http, rx, Form, $timeout) {

    var controller = (tipocontrol == '1') ? 'apartamentos/' : 'oficinas/';
    $scope.uid = uid;

    $scope.dataResource = [];
    $scope.loadDataResource = false;
    $scope.searchResource = "";
    $scope.selectedIdResource = "";    
    $scope.cedula = 0;
    $scope.telefono = 0;
    $scope.showCreateForm = false;
    $scope.seeDetails = 0;
    $scope.resultResource = false;
    $scope.panelTorre = false;
    $scope.enableFormTorre = false;
    $scope.muestraMensajeCarga = 'No hay datos que mostrar';
    $scope.idOficina = 0;    
    $scope.searchEmpleado = '';
    $scope.searchTorre = '';
    $scope.searchIntegrante = '';    

    var promiseData = $http.post(baseurl + controller + 'readbyid', { uid: uid });

    promiseData.then((response) => {

        if (response.data.status)
        {
            $scope.dataResource = response.data.rows;            
            $scope.loadDataResource = true;
        }
        else
            $scope.loadDataResource = false;
        
    });

    $scope.openTorre = function()
    {
        $scope.panelTorre = true;
        $scope.ocultaDetalleOficina = true;
        $scope.enableFormTorre = false;
        $scope.ocultaDetalleOficina = true;
        $scope.ocultaFormCreacionOficina = false;
        $scope.integrantesOficina = [];
    }

    $scope.item = '';
    $scope.piso = '';    
    $scope.disableInputs = false;

    $scope.changeFormTorre = function()
    {
        let textSelected = $('#idTorre option:selected').text()

        if(textSelected == 'N/A')
        {
            $scope.piso = 'N/A';
            $scope.disableInputs = true;
        }
        else
        {
            $scope.piso = '';            
            $scope.disableInputs = false;

            if($scope.item == 2)
                $scope.enableFormTorre = true;
            else
                $scope.enableFormTorre = false;
        }        
    }

    $scope.closeTorre = function()
    {
        $scope.panelTorre = false;
        $scope.ocultaDetalleOficina = false;
    }

    $scope.cancelAddTorre = function()
    {
        $scope.enableFormTorre = false;
        $scope.item = "";
    }

    $scope.createdTorre = false;
    $scope.muestraErrorTorre = false;
    $scope.mensajeErrorTorre = '';
    $scope.tipoMensaje = ''    ;

    $scope.createTorre = function()
    {
        var torre = Form.OnSubmitForm({
            form    : '#frm-create-torre',
            css     : '.required',
            route   : baseurl + 'torres/create',
            fields  : '',
            clear   : true
        });

        if(torre == true)
        {
            $scope.muestraErrorTorre = true;
            $scope.mensajeErrorTorre = 'Por favor, ingresa los datos de la torre';
            $scope.tipoMensaje = 'danger';
        }
        else
        {
            torre.then((response) => {

                if(response.data.status)
                {
                    $scope.muestraErrorTorre = true;
                    $scope.mensajeErrorTorre = response.data.message;
                    $scope.tipoMensaje = 'success';
                    $scope.enableFormTorre = false;
                    $scope.item = "";
                    $scope.readTorres();
                }
            });
        }

        $timeout(() => {
            $scope.muestraErrorTorre = false;
        }, 2500);
    }

    $scope.dataTorres = [];

    $scope.readTorres = function()
    {
        if(tipocontrol == '2')
        {
            var promiseObtenerTorres = $http.post(baseurl + 'torres/readbyid', { uid : uid });

            promiseObtenerTorres.then((response) => {

                if(response.data.status)                
                    $scope.dataTorres = response.data.rows;                    
            });
        }
        else
        {
            var promiseObtenerTorres = $http.post(baseurl + 'torres/readbyid', { uid : uid });

            promiseObtenerTorres.then((response) => {

                if(response.data.status)                
                    $scope.dataTorres = response.data.rows;
            });
        }
    }

    $scope.readOficinas = function()
    {
        var promiseData = $http.post(baseurl + controller + 'readbyid', { uid: uid });

        promiseData.then((response) => {

            if (response.data.status)
            {
                $scope.dataResource = response.data.rows;            
                $scope.loadDataResource = true;
            }
            else
                $scope.loadDataResource = false;
            
        });
    }

    $scope.readTorres();

    $scope.selectedTorre = 0;

    $scope.detallesTorre = function(idTorre)
    {
        $scope.selectedTorre = idTorre;
    }

    $scope.showDeleteOption = function(idTorre)
    {
        $scope.torreToDelete = idTorre;
    }

    $scope.cancelTorreDelete = function()
    {
        $scope.torreToDelete = 0;
    }

    $scope.deleteTorre = function(idTorre)
    {
        var promiseDeleteTorre = $http.post(baseurl + 'torres/delete', {idTorre : idTorre});

        promiseDeleteTorre.then((response) => {

            if(response.data.status)
            {
                $scope.muestraErrorTorre = true;
                $scope.tipoMensaje = 'success';
                $scope.mensajeErrorTorre = response.data.message;
                $scope.torreToDelete = 0;
                $scope.readTorres();
            }
            else
            {
                $scope.muestraErrorTorre = true;
                $scope.tipoMensaje = 'danger';
                $scope.mensajeErrorTorre = response.data.message;
            }
        });

        $timeout(() => {
            $scope.muestraErrorTorre = false;
        }, 2500);
    }

    $scope.showDetails = function (idSource)
    {
        $scope.seeDetails = idSource;
    }

    $scope.selectItem = function(idSource)
    {
        $scope.selectedIdResource = idSource;        
    }

    $scope.nombreTorre = '';
    $scope.nombreOficina = '';
    $scope.pisoNivel = '';
    $scope.area = '';    
    $scope.integrantesOficina = [];    

    $scope.requestDetails = function(idSource)
    {
        $scope.ocultaDetalleOficina = false;
        $scope.ocultaFormCreacionOficina = false;
        $scope.panelTorre = false;
        $scope.listarIntegrantes = false;

        if(tipocontrol == '2')
        {
            $scope.muestraMensajeCarga = 'Cargando Oficinas ...';

            var promiseData = $http.post(baseurl + controller + 'readbyidoficina', { id_oficina : idSource });

            promiseData.then((response) => {
                
                if(response.data.status)
                {
                    $scope.idOficina = response.data.rows[0].id_sg_oficina;
                    $scope.nombreTorre = response.data.rows[0].nombre_torre;
                    $scope.nombreOficina = response.data.rows[0].oficina;
                    $scope.pisoNivel = response.data.rows[0].piso_nivel;
                    $scope.area = response.data.rows[0].area;
                    $scope.integrantesOficina = response.data.integrantes;
                    $scope.resultResource = true;

                    $('#idTorre').val(response.data.rows[0].id_sg_torre).change();
                    $scope.item = response.data.rows[0].id_sg_torre;
                    $scope.piso = response.data.rows[0].piso_nivel;
                    $scope.oficina = response.data.rows[0].oficina;
                    $scope.area = response.data.rows[0].area;
                }
                
                $scope.muestraMensajeCarga = 'No hay datos que mostrar';
            });            
        }
        else
        {
            $scope.muestraMensajeCarga = 'Cargando Oficinas ...';

            var promiseData = $http.post(baseurl + controller + 'readbyidoficina', { id_oficina : idSource });

            promiseData.then((response) => {
                
                if(response.data.status)
                {
                    $scope.idOficina = response.data.rows[0].id_sg_oficina;
                    $scope.nombreTorre = response.data.rows[0].nombre_torre;
                    $scope.nombreOficina = response.data.rows[0].oficina;
                    $scope.pisoNivel = response.data.rows[0].piso_nivel;
                    $scope.area = response.data.rows[0].area;
                    $scope.integrantesOficina = response.data.integrantes;
                    $scope.resultResource = true;

                    $('#idTorre').val(response.data.rows[0].id_sg_torre).change();
                    $scope.item = response.data.rows[0].id_sg_torre;
                    $scope.piso = response.data.rows[0].piso_nivel;
                    $scope.oficina = response.data.rows[0].oficina;
                    $scope.area = response.data.rows[0].area;
                }
                
                $scope.muestraMensajeCarga = 'No hay datos que mostrar';
            });
        }        
    }

    $scope.ocultaDetalleOficina = false;
    $scope.ocultaFormCreacionOficina = false;
    $scope.buttonCreateOficina = true;

    $scope.addOffice = function()
    {
        $scope.buttonCreateOficina = true;
        $scope.ocultaDetalleOficina = true;
        $scope.ocultaFormCreacionOficina = true;
        $scope.panelTorre = false;

        $scope.item = '';
        $scope.piso = '';
        $scope.oficina = '';
        $scope.area = '';
    }

    $scope.oficinaMessage = '';
    $scope.showMessageOficina = false;
    $scope.recordCreated = false;

    $scope.createOficina = function()
    {
        var oficina = Form.OnSubmitForm({
            form    : '#frm-create-oficina',
            css     : '.required',
            route   : baseurl + 'oficinas/create',
            fields  : '',
            clear   : false
        });

        if(oficina == true)
        {
            $scope.oficinaMessage = 'Por favor, ingresa los datos de la oficina';
            $scope.showMessageOficina = true;
        }
        else
        {
            oficina.then((response) => {
                if(response.data.status)
                {
                    $scope.oficinaMessage = response.data.message;
                    $scope.recordCreated = true;
                    Form.resetForm('#frm-create-oficina');

                    var promiseData = $http.post(baseurl + controller + 'readbyid', { uid: uid });

                    promiseData.then((response) => {

                        if (response.data.status)
                        {
                            $scope.dataResource = response.data.rows;
                            $scope.loadDataResource = true;
                        }
                        else
                            $scope.loadDataResource = false;
                        
                    });
                }
            });
        }
    }

    $scope.borraMensajeError = function()
    {
        $scope.showMessageOficina = false;
    }

    $scope.borraMensajeSuccess = function()
    {
        Form.resetForm('#frm-create-oficina');
        $scope.recordCreated = false;
        $scope.ocultaDetalleOficina = false;
        $scope.ocultaFormCreacionOficina = false;                
        $scope.disableInputs = false;   
    }

    $scope.another = function()
    {
        Form.resetForm('#frm-create-oficina');
        $scope.recordCreated = false;        
        $scope.disableInputs = false;
    }

    $scope.closeAddOffice = function()
    {        
        $scope.disableInputs = false;
        $scope.ocultaDetalleOficina = false;
        $scope.ocultaFormCreacionOficina = false;
    }

    $scope.setScroll = function(data)
    {
        if(data.length > 5)
            return 'setScroll';
    }

    $scope.cierraDetalles = function()
    {
        $scope.resultResource = false;
        $scope.integrantesOficina = [];
    }

    $scope.cancelDelete = function()
    {
        $scope.selectedIdResource = "";
    }

    $scope.resetForm = function()
    {
        $scope.item = '';
        $scope.piso = '';
        $scope.disableInputs = false;
    }

    $scope.mensajeErrorOficina = '';
    $scope.muestraErrorOficina = false;
    $scope.typeAlert = '';

    $scope.deleteProcessOficina = function(idOficina)
    {
        var promiseDeleteOficina = $http.post(baseurl + 'oficinas/delete', { id_sg_oficina : idOficina });

        promiseDeleteOficina.then((response) => {
            if(response.data.status)
            {                
                $scope.mensajeErrorOficina = response.data.message;
                $scope.muestraErrorOficina = true;
                $scope.typeAlert = 'success';
                $scope.disableInputs = false;
                $scope.readOficinas();
            }
            else
            {
                $scope.mensajeErrorOficina = response.data.message;
                $scope.muestraErrorOficina = true;
                $scope.typeAlert = 'danger';                
                $scope.disableInputs = false;
            }

            $timeout(() => {
                $scope.muestraErrorOficina = false;                
            }, 2500)
        });
    }

    $scope.editarOficina = function()
    {
        $scope.requestDetails($scope.idOficina);
        $scope.buttonCreateOficina = false;
        $scope.ocultaDetalleOficina = true;
        $scope.ocultaFormCreacionOficina = true;
    }

    $scope.messageEmpleados = '';
    $scope.dataEmpleados = [];

    $scope.readEmpleados = function()
    {
        var requestEmpleados = $http.post(baseurl + 'empleados/readbyempresa', { uid : uid });
        $scope.messageEmpleados = 'Verificando ...';

        requestEmpleados.then((response) => {
            
            if(response.data.status)
            {
                $scope.loadDataEmpleados = true;
                $scope.dataEmpleados = response.data.rows;
                $scope.messageEmpleados = ''
            }
            else
            {
                $scope.loadDataEmpleados = false;
                $scope.messageEmpleados = 'No encontramos empleados';
            }
        });
    }

    $scope.readEmpleados();
    $scope.listarIntegrantes = false;

    $scope.abrirIntegrantes = function()
    {
        $scope.listarIntegrantes = true;
        $scope.ocultaDetalleOficina = true;
    }

    $scope.cierraIntegrantes = function()
    {
        $scope.listarIntegrantes = false;
        $scope.ocultaDetalleOficina = false;
    }

    $scope.selectedEmpleado = 0;    

    $scope.muestraAsignacion = function(idEmpleado)
    {
        $scope.selectedEmpleado = idEmpleado;
    }

    $scope.asignaEmpleado = function(idEmpleado)
    {
        $scope.asignacionEmpleado = idEmpleado;        
    }

    $scope.cancelAsignacion = function()
    {
        $scope.asignacionEmpleado = 0;
    }

    $scope.asignadoEmpleado = false;
    $scope.muestraErrorAsignacion = false;
    $scope.mensajeErrorAsignacion = '';
    $scope.tipoMensaje = '';

    $scope.procesaAsignacion = function(idOficina, idEmpleado)
    {
        var asignaEmpleadoOficina = $http.post(baseurl + 'oficinas/asignaempleado', { idEmpleado : idEmpleado, idOficina : idOficina, idUser : uid })

        asignaEmpleadoOficina.then((response) => {
            if(response.data.status)
            {
                $scope.asignadoEmpleado = true;
                $scope.asignacionEmpleado = 0;
                $scope.muestraErrorAsignacion = true;
                $scope.mensajeErrorAsignacion = response.data.message;
                $scope.tipoMensaje = 'success';
                $scope.requestDetails(idOficina);
            }
            else
            {
                $scope.muestraErrorAsignacion = true;
                $scope.mensajeErrorAsignacion = response.data.message;
                $scope.tipoMensaje = 'danger';
            }
        });

        $timeout(() => {
            $scope.muestraErrorAsignacion = false;
        }, 2500);
    }
    
    $scope.empleadoAsignado = 0;

    $scope.removerEmpleadoOficina = function(idEmpleado)
    {
        $scope.empleadoAsignado = idEmpleado;
    }

    $scope.cancelaRemover = function()
    {
        $scope.empleadoAsignado = 0;
    }

    $scope.eliminaEmpleadoOficina = function(idEmpleado, idOficina)
    {
        var promiseDeleteAsignacion = $http.post(baseurl + 'oficinas/deleteasignacion', { id_sg_personal : idEmpleado });

        promiseDeleteAsignacion.then((response) => {
            if(response.data.status)
            {
                $scope.requestDetails(idOficina);
                $scope.empleadoAsignado = 0;
            }
        });
    }

    $scope.btnActualizaOficina = 'Actualizar';

    $scope.updateOficina = function()
    {
        var oficina = Form.OnSubmitForm(
        {
            form    : '#frm-create-oficina',
            css     : '.required',
            route   : baseurl + 'oficinas/update',
            fields  : '',
            clear   : false
        });

        if(oficina == true)
        {
            return false;
        }
        else
        {
            $scope.btnActualizaOficina = 'Actualizando ...';

            oficina.then((response) => {
                if(response.data.status)
                {
                    $scope.oficinaMessage = response.data.message;
                    $scope.recordCreated = true;
                    $scope.readOficinas();
                }

                $scope.btnActualizaOficina = 'Actualizar';
            });
        }
    }

    $scope.noMostrarOficinas = false;    
    $scope.detalleOficinas = [];
    $scope.loadDetalleOficinas = false;
    $scope.enableSearch = false;

    $scope.showDetallesOficinas = function()
    {
        $scope.detalleOficinas = [];
        $scope.noMostrarOficinas = true;
        $scope.loadDetalleOficinas = true;

        var promiseDataOficinasDetalle = $http.post(baseurl + 'oficinas/resumenempleadosoficina', { idUser : uid });
        
        promiseDataOficinasDetalle.then((response) => {
            if(response.data.status)            
                $scope.detalleOficinas = response.data.rows;
            else            
                $scope.detalleOficinas = [];

            $scope.loadDetalleOficinas = false;
        })
    }

    $scope.closeDetalleOficinas = function()
    {
        $scope.noMostrarOficinas = false;
    }

    $scope.enableSearchOption = function()
    {
        $scope.enableSearch = true;
    }

    $scope.closeSearchOption = function()
    {
        $scope.enableSearch = false;
    }

    $scope.resumenActividades = false;

    $scope.showResumenActividades = function()
    {
        $scope.resumenActividades = true;
    }

}]);