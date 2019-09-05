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
    }

    $scope.closeTorre = function()
    {
        $scope.panelTorre = false;
        $scope.ocultaDetalleOficina = false;
    }

    $scope.formTorre = function()
    {
        $scope.enableFormTorre = true;
    }

    $scope.cancelAddTorre = function()
    {
        $scope.enableFormTorre = false;
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

        if(tipocontrol == '2')
        {
            $scope.muestraMensajeCarga = 'Cargando Oficinas ...';

            var promiseData = $http.post(baseurl + controller + 'readbyidoficina', { id_oficina : idSource });

            promiseData.then((response) => {
                
                if(response.data.status)
                {
                    $scope.nombreTorre = response.data.rows[0].nombre_torre;
                    $scope.nombreOficina = response.data.rows[0].oficina;
                    $scope.pisoNivel = response.data.rows[0].piso_nivel;
                    $scope.area = response.data.rows[0].area;
                    $scope.integrantesOficina = response.data.integrantes;
                    $scope.resultResource = true;
                }

                $scope.muestraMensajeCarga = 'No hay datos que mostrar';
            });            
        }        
    }

    $scope.ocultaDetalleOficina = false;
    $scope.ocultaFormCreacionOficina = false;

    $scope.addOffice = function()
    {
        $scope.ocultaDetalleOficina = true;
        $scope.ocultaFormCreacionOficina = true;
        $scope.panelTorre = false;
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
                if(response.status)
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
        $scope.recordCreated = false;
        $scope.ocultaDetalleOficina = false;
        $scope.ocultaFormCreacionOficina = false;   
    }

    $scope.closeAddOffice = function()
    {
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
    }

    $scope.cancelDelete = function()
    {
        $scope.selectedIdResource = "";
    }

    $scope.deleteProcessOficina = function()
    {

    }
    
}]);