app.controller('empresas', ['$scope', '$http', 'Form', '$timeout', 'Core', '$window', '$location', '$document', function ($scope, $http, Form, $timeout, Core, $window, $location, $document) {

    $scope.dataEmpresas = [];
    $scope.loadDataEmpresas = false;
    $scope.emptyStatus = false;
    $scope.showCreateForm = false;
    $scope.uid = uid;
    $scope.setMessage = false;
    $scope.typeMessage = '';
    $scope.messageText = '';
    $scope.searchEmpleado = '';
    $scope.showEditForm = false;
    $scope.showDetailsEmpleado = false;
    $scope.triggerSearch = false;
    $scope.result = [];
    $scope.messageConfirm = false;
    $scope.idEmpleado = 0;
    $scope.customReport = false;
    $scope.showResumeEmpleados = false;
    $scope.customReportInOut = false;
    $scope.keepRegistering = false;
    $scope.sede = '';
    $scope.dataSedes = [];
    $scope.deleteSuccessSede = false;
    $scope.showFormEditaSede = true;
    $scope.showPlanes = false;   
    $scope.tiporegistro = 1;
    $scope.cedula = 0;
    $scope.telefono = 0;

    var request = $http.post(baseurl + 'empresas/readbyuser', {uid : uid})

    request.then((response) => {

        if(response.data.status)
        {
            $scope.dataEmpresas = response.data.rows;

            for(var i in $scope.dataEmpresas)
            {
                if($scope.dataEmpresas[i].estado)
                    $scope.emptyStatus = true;
            }
        }

        $scope.loadDataEmpresas = true;
    });

    $scope.dataEmpleados = [];
    $scope.loadDataEmpleados = false;
    $scope.messageEmpleados = ''
    $scope.seeDetails = 0;

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
    $scope.startToSearch = false;

    $scope.$watch('result', function(newValue, oldValue){        
        
        if(newValue.length == oldValue.length)
            return;
        else
        {      
            if(newValue.length == oldValue.length)
            {
                console.log('call');
            }
        }
    });    

    $scope.showDetails = function(id)
    {        
        $scope.showCreateForm = false;
        $scope.showPlanes = false;
        $scope.seeDetails = id;
    }

    $scope.enableDetails = false;

    $scope.requestDetails = function(idempleado)
    {
        $scope.idEmpleado = idempleado;
        $scope.showResumeEmpleados = false;
        $scope.customReportInOut = false;
        $scope.showEditaDataEmpresa = true;
        $scope.showEditaDataSedes = true;
        $scope.showPlanes = false;

        var requestDetails = $http.post(baseurl + 'empleados/readbyid', { id_cms_empleado : idempleado });

        requestDetails.then((response) => {
            
            if(response.data.status)
            {
                $scope.nombresApellidos = response.data.rows[0].nombres_personal + ' ' + response.data.rows[0].apellidos_personal;
                $scope.direccion = response.data.rows[0].direccion_personal;
                $scope.telefono = response.data.rows[0].telefono_personal;
                $scope.correo = response.data.rows[0].correo_personal;
                $scope.email = response.data.rows[0].correo_personal;
                $scope.photo = response.data.rows[0].photo_personal;
                $scope.enableDetails = true;

                $scope.uid = response.data.rows[0].id_sg_personal;
                $scope.sede = response.data.rows[0].id_sg_sede.toString();
                $scope.nombresede = response.data.rows[0].nombre_sede;
                $scope.cedula = response.data.rows[0].cedula_personal;
                $scope.nombres = response.data.rows[0].nombres_personal;
                $scope.apellidos = response.data.rows[0].apellidos_personal;
                $scope.direccion = response.data.rows[0].direccion_personal;
                $scope.telefono = response.data.rows[0].telefono_personal;
                $scope.correo = response.data.rows[0].correo_personal;
                $scope.estado = response.data.rows[0].id_sg_estado;

                $scope.showDetailsEmpleado = false;
                $scope.showEditForm = false;
            }            
        });

        $scope.requestActividades(idempleado);
    }

    $scope.dataResumenActividades = [];

    $scope.requestActividades = function(uid)
    {
        var requestActividades = $http.post(baseurl + 'registros/obtenervisitas', { id_cms_empleado : uid });

        requestActividades.then(function(response){

            if(response.data.status)            
                $scope.dataResumenActividades = response.data.rows;            
            else            
                $scope.dataResumenActividades = [];            
        });
    }

    $scope.cancelDetail = function()
    {
        $scope.uid = uid;
        $scope.enableDetails = false;
        $scope.idEmpleado = 0;
        Form.resetForm('#frm-edita-empleado');
    }

    $scope.addEmpleado = function()
    {
        $scope.email = '';
        $scope.uid = uid;
        $scope.keepRegistering = false;
        $scope.showDetailsEmpleado = true;
        $scope.showEditForm = false;
        $scope.showCreateForm = true;
        $scope.showResumeEmpleados = false;       
        $scope.customReportInOut = false;
        $scope.showEditaDataEmpresa = true;
        $scope.showEditaDataSedes = true;
        $scope.showCreaDataSedes = true;
        $scope.showPlanes = false;
    }

    $scope.editEmpleado = function()
    {
        $scope.showDetailsEmpleado = true;
        $scope.enableDetails = false;
        $scope.showEditForm = true;
        $scope.keepRegistering = false;
        $scope.showPlanes = false;
    }

    $scope.comebackToDetails = function()
    {
        $scope.uid = uid;
        $scope.showDetailsEmpleado = false;
        $scope.showCreateForm = false;
        $scope.showEditForm = false;
        $scope.showPlanes = false;
        Form.resetForm('#frm-edita-empleado');
    }

    $scope.btnRegistraEmpleado = true;
    $scope.btnActualizaEmpleado = false;
    $scope.email = '';

    $scope.checkEmail = function()
    {
        $scope.btnRegistraEmpleado = true;

        if($scope.email.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/))
        {
            $scope.btnActualizaEmpleado = false;
            $scope.btnRegistraEmpleado = false;
        }
        else
        {
            $scope.btnRegistraEmpleado = true;        
            $scope.btnActualizaEmpleado = true;
        }
    }

    $scope.createEmpleado = function()
    {
        var empleado = Form.OnSubmitForm({
            form    : '#frm-create-empleado',
            css     : '.required',
            route   : baseurl + 'empleados/create',
            fields  : '',
            clear   : false
        });

        if(empleado == true)
        {
            $scope.setMessage = true;
            $scope.typeMessage = 'danger';
            $scope.messageText = 'Por favor, Ingrese los Datos';

            $timeout(function(){
                $scope.setMessage = false;                
            }, 2500);
        }
        else
        {
            empleado.then(function(response){

                if(response.data.status)
                {
                    $scope.setMessage = true;
                    $scope.typeMessage = 'success';
                    $scope.messageText = 'Has registrado tu empleado!';

                    $scope.readEmpleados();
                    $scope.keepRegistering = true;                    
                    addOptionComboBox('.comboBoxEmpleados', response.data.append.id, response.data.append.prop);                   

                    Form.resetForm('#frm-create-empleado');

                    $timeout(function(){
                        $scope.setMessage = false;
                    })
                }
                else
                {
                    $scope.setMessage = true;
                    $scope.typeMessage = 'danger';
                    $scope.messageText = response.data.message;

                    $timeout(function(){
                        $scope.setMessage = false;
                    }, 2500);
                }
            });
        }
    }

    $scope.done = function()
    {
        $scope.setMessage = false;
        $scope.showCreateForm = false;
        $scope.showEditForm = false;
        $scope.showDetailsEmpleado = false;
        $scope.keepRegistering = false;
        $scope.showPlanes = false;
    }

    $scope.another = function()
    {
        $scope.uid = uid;
        $scope.keepRegistering = false;
        $scope.showDetailsEmpleado = true;
        $scope.showEditForm = false;
        $scope.showCreateForm = true;
        $scope.showResumeEmpleados = false;       
        $scope.customReportInOut = false;
        $scope.setMessage = false;
        $scope.showPlanes = false;
    }

    $scope.editaEmpleado = function()
    {
        var empleado = Form.OnSubmitForm({
            form    : '#frm-edita-empleado',
            css     : '.required',
            route   : baseurl + 'empleados/update',
            fields  : '',
            clear   : false
        });

        if(empleado == true)
        {
            $scope.setMessage = true;
            $scope.typeMessage = 'danger';
            $scope.messageText = 'Por favor, Ingrese los Datos';

            $timeout(function(){
                $scope.setMessage = false;
            }, 2500);
        }
        else
        {
            empleado.then(function(response){

                if(response.data.status)
                {
                    $scope.setMessage = true;
                    $scope.typeMessage = 'success';
                    $scope.messageText = response.data.message;

                    $scope.readEmpleados();
                    $scope.keepRegistering = true;

                    $timeout(function(){
                        $scope.setMessage = false;
                        $scope.showCreateForm = false;
                        $scope.showEditForm = false;
                        $scope.showDetailsEmpleado = false;
                        $scope.enableDetails = false;
                    }, 2500);
                }
                else
                {
                    $scope.setMessage = true;
                    $scope.typeMessage = 'danger';
                    $scope.messageText = response.data.message;

                    $timeout(function(){
                        $scope.setMessage = false;
                    }, 2500);
                }
            });
        }
    }

    $scope.activateEmpleado = function(estado, uid)
    {
        if(estado == '1')
        {
            var requestToDisable = $http.post(baseurl + 'empleados/disable', { id_cms_empleado : uid, state : '2' });

            requestToDisable.then(function(response)
            {
                if(response.data.status)                
                    $scope.readEmpleados();
            });

            $scope.estado = '2';
        }
        else
        {
            var requestToDisable = $http.post(baseurl + 'empleados/disable', { id_cms_empleado : uid, state : '1' });

            requestToDisable.then(function(response)
            {
                if(response.data.status)                
                    $scope.readEmpleados();                
            });

            $scope.estado = '1';
        }
    }

    $scope.showListEmpleados = false;
    $scope.dataVisitasEmpleado = [];
    $scope.reporteVisitasSedes = [];

    $scope.seeDetailsInOut = function()
    {
        $scope.showDetailsActivitys = true;
        $scope.showListEmpleados = true;
        $scope.showDetailsEmpleado = true;
        $scope.showResumeEmpleados = false;
        $scope.customReportInOut = true;
        $scope.customReport = true;
        $scope.showCreateForm = false;
        $scope.showEditaDataEmpresa = true;
        $scope.showEditaDataSedes = true;
        $scope.showEditForm = false;

        $scope.cedulaCheck = true;
        $scope.nombresCheck = true;
        $scope.apellidosCheck = true;    
        $scope.sedeCheck = true;
        $scope.entradaCheck = true;
        $scope.salidaCheck = true;
        $scope.showPlanes = false;

        var requestDataFromVisitas = $http.post(baseurl + 'registros/obtenervisitas', { id_cms_empresa : uid });

        requestDataFromVisitas.then(function(response){
            
            if(response.data.status)            
                $scope.dataVisitasEmpleado = response.data.rows;            
        });

        var requestDataReporteBySedes = $http.post(baseurl + 'reportes/reporteporsedes', { id_cms_empresa : uid });
        var labels = [];
        var visitas = [];
        var visitadas = [];

        requestDataReporteBySedes.then(function(response){
            if(response.data.status)
            {
                $scope.reporteVisitasSedes = response.data.rows;
                var inc = 1;       

                for(var i in $scope.reporteVisitasSedes)
                {
                    labels.push($scope.reporteVisitasSedes[i].sede);
                    visitas.push(parseInt($scope.reporteVisitasSedes[i].sede_personal));                    
                    visitadas.push(parseInt($scope.reporteVisitasSedes[i].sede_visitada));
                }

                chartBarras(labels, visitas, '#chart-bars');
                chartLines(labels, visitas, '#chart-lines');
                chartPie(labels, visitas, '#chart-pie');
                chartLines(labels, visitadas, '#chart-lines-visitada');
                chartBarras(labels, visitadas, '#chart-bars-visitada');
                chartPie(labels, visitadas, '#chart-pie-visitada');
                
            }
            else
                $scope.reporteVisitasSedes = [];
        });
    }

    var chartBarras = function(labels, data, idElement)
    {
        var $chart = $(idElement);

        var ordersChart = new Chart($chart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Visitas',
                    data: data
                }]
            }
        });

        $chart.data('chart', ordersChart);
    }

    var chartLines = function(labels, data, idElement)
    {
        var $line = $(idElement);                

        var salesChart = new Chart($line, {
            type: 'line',
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: Charts.colors.gray[200],
                            zeroLineColor: Charts.colors.gray[200]
                        },
                        ticks: {

                        }
                    }]
                }
            },
            data: {
                labels: labels,
                datasets: [{
                    label: 'Performance',
                    data: data
                }]
            }
        });
        
        $line.data('chart', salesChart);
    }

    var chartPie = function(labels, data, idElement)
    {
        var $chart = $(idElement);

        var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var pieChart = new Chart($chart, {
			type: 'pie',
			data: {
				labels: labels,
				datasets: [{
					data: data,
					backgroundColor: [
						Charts.colors.theme['danger'],
						Charts.colors.theme['warning'],
						Charts.colors.theme['success'],
						Charts.colors.theme['primary'],
						Charts.colors.theme['info'],
					],
					label: 'Dataset 1'
				}],
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		});

		$chart.data('chart', pieChart);
    }

    $scope.closeShowGraphics = function()
    {
        $scope.showGraphics = false;
        $scope.showPlanes = false;
    }

    $scope.closeDetailsInOut = function()
    {
        $scope.showListEmpleados = false;
        $scope.showDetailsEmpleado = false;
        $scope.showResumeEmpleados = false;
        $scope.customReportInOut = false;
        $scope.customReport = false;
        $scope.showPlanes = false;
        $scope.showDetailsActivitys = false;        
    }

    $scope.selectedId;

    $scope.selectItem = function(idEmpleado)
    {
        $scope.selectedId = idEmpleado;        
    }    

    $scope.deleteSuccess = false;
    $scope.reloadingEmpleados = '';

    $scope.deleteProcessEmpleado = function(idEmpleado, nombres, apellidos)
    {
        var deleteEmpleado = $http.post(baseurl + 'empleados/delete', { id_cms_empleado : idEmpleado });
        var nombresEmpleado = nombres + ' ' + apellidos;

        $scope.deleteSuccess = true;
        $scope.reloadingEmpleados = 'Actualizando ...';
        
        deleteEmpleado.then(function(response){

            if(response.data.status)
            {                
                $scope.readEmpleados();
                $scope.reloadingEmpleados = 'Empleado Eliminado';

                clearOptionComboBoxValue('.comboBoxEmpleados', nombresEmpleado);

                $scope.enableDetails = false;

                $timeout(function(){
                    $scope.deleteSuccess = false;
                }, 2500);                
            }
        });
    }    

    $scope.cancelProcess = function(idEmpleado)
    {
        $scope.selectedId = "";        
    }

    $scope.customeReport = function()
    {
        $scope.customReport = true;
        $scope.customReportInOut = true;
        $scope.showPlanes = false;
    }

    $scope.closeCustomReport = function()
    {
        $scope.customReport = false;
        $scope.customReportInOut = false;
        $scope.showPlanes = false;
    }

    $scope.dataDetalleEmpleados = [];
    $scope.loadDetalleEmpleados = false;
    
    $scope.verMisEmpleados = function()
    {
        $scope.loadDetalleEmpleados = true;
        $scope.showDetailsEmpleado = true;
        $scope.showResumeEmpleados = true;
        $scope.customReport = false;
        $scope.customReportInOut = true;
        $scope.showListEmpleados = false;
        $scope.dataDetalleEmpleados = [];
        $scope.showEditaDataEmpresa = true;
        $scope.showEditaDataSedes = true;
        $scope.showCreateForm = false;
        $scope.showPlanes = false;
        $scope.showDetailsActivitys = false;

        var requestDataEmpleadoDetalles = $http.post(baseurl + 'empleados/readbyempresa', {uid : uid});

        requestDataEmpleadoDetalles.then(function(response){
            if(response.data.status)            
                $scope.dataDetalleEmpleados = response.data.rows;
            else
                $scope.dataDetalleEmpleados = [];

            $scope.loadDetalleEmpleados = false;
        });
    }

    $scope.setScroll = function(data)
    {
        if(data.length > 5)
            return 'setScroll';
    }

    $scope.increase = 0;    
    $scope.createdEmpresa = false;
    $scope.showBackMessage = false;
    $scope.modulo = '';

    $scope.recoveryStep = function()
    {
        var getStep = $window.localStorage.getItem('paso');
        
        if(Core.isEmpty(getStep))
            $scope.increase = 0;
        else
        {
            var steps = JSON.parse(getStep);
            $scope.increase = steps.paso;
            $scope.modulo = steps.modulo;
            $scope.showBackMessage = steps.left;
            $scope.tipoRegistroSigga = steps.tipo;
        }
    }    

    $scope.next = function(modulo, tipo)
    {
        $scope.modulo = modulo;
        $scope.tipoRegistroSigga = tipo;

        switch(modulo)
        {
            case 'mipersonal':

                    $scope.increase++;

                    var getStep = $window.localStorage.getItem('paso');
                    var steps = JSON.parse(getStep);

                    if(steps == null)
                    {
                        var steps = {
                            paso        : $scope.increase,
                            modulo      : modulo,
                            left        : true,
                            executed    : true,
                            uid         : $scope.uid
                        }
    
                        $scope.updateTipoRegistro({
                            tiporegistro    : 1,
                            entrypoint      : '#!/empresas',
                            user            : uid
                        });
                    }
                    else
                    {
                        if(steps.executed)
                        {
                            var steps = {
                                paso        : $scope.increase,
                                modulo      : modulo,
                                left        : true,
                                executed    : true,
                                uid         : $scope.uid
                            }
                        }
                    }

                    $window.localStorage.setItem('paso', JSON.stringify(steps));

                break;

            case 'visitantes':
                
                    $scope.increase++;

                    var getStep = $window.localStorage.getItem('paso');
                    var steps = JSON.parse(getStep);

                    if(steps == null)
                    {
                        var steps = {
                            paso        : $scope.increase,
                            modulo      : modulo,
                            left        : true,
                            executed    : true,
                            uid         : $scope.uid
                        }
                
                        $scope.updateTipoRegistro({
                            tiporegistro    : 2,
                            entrypoint      : '#!/visitantes',
                            user            : uid,
                            control         : 1
                        });
                    }
                    else
                    {                        
                        if(steps.executed)
                        {
                            switch(tipo)
                            {
                                case 'residencial':

                                    var steps = {
                                        paso        : $scope.increase,
                                        modulo      : modulo,
                                        left        : true,
                                        executed    : true,
                                        tipo        : tipo,
                                        uid         : $scope.uid
                                    }

                                    $scope.updateTipoControl({
                                        user    : uid,
                                        control : 1
                                    });

                                break;

                                case 'empresa':

                                    var steps = {
                                        paso        : $scope.increase,
                                        modulo      : modulo,
                                        left        : true,
                                        executed    : true,
                                        tipo        : tipo,
                                        uid         : $scope.uid
                                    }

                                    $scope.updateTipoControl({
                                        user    : uid,
                                        control : 2
                                    });

                                break;
                            }                            
                        }
                    }

                    $window.localStorage.setItem('paso', JSON.stringify(steps));

                break;

            case 'proveedores':

                    $scope.increase++;
                    
                    var steps = {
                        paso        : $scope.increase,
                        modulo      : modulo,
                        left        : true,
                        executed    : true,
                        uid         : $scope.uid
                    }

                    $scope.updateTipoRegistro({
                        tiporegistro    : 2,
                        entrypoint      : '#!/proveedores',
                        user            : uid,
                        control         : 2,
                        uid             : $scope.uid
                    });

                    $window.localStorage.setItem('paso', JSON.stringify(steps));

                break;

            default:
                break;
        }        
    }

    $scope.updateTipoRegistro = function(formData)
    {        
        var promiseUpdateTipoRegistro = $http.post(baseurl + 'usuarios/updatetiporegistro', formData);

        promiseUpdateTipoRegistro.then(function(response)
        {
            if(response.data.status)
                return true;
        });
    }

    $scope.updateTipoControl = function(formData)
    {
        var promiseUpdateTipoControl = $http.post(baseurl + 'usuarios/updatetipocontrol', formData);

        promiseUpdateTipoControl.then(function(response){

            if(response.data.status)
                return true;
        });
    }

    $scope.prev = function()
    {
        $scope.increase--;

        var steps = {
            paso    : $scope.increase,
            left    : true
        }

        $window.localStorage.setItem('paso', steps);
    }

    $scope.recoveryStep();

    $scope.errorMessageEmpresa = '';
    $scope.errorMessageUnidad = '';
    $scope.errorCreated = false;
    $scope.createUnidad = false;

    $scope.createUnidadResidencial = function()
    {
        var unidad = Form.OnSubmitForm({
            form    : '#frm-create-unidad',
            css     : '.required',
            route   : baseurl + 'unidad/create',
            fields  : '',
            clear   : false
        });

        if(unidad == true)
        {
            $scope.errorMessageUnidad = 'Por favor, Ingresa los datos de tu empresa';
            $scope.errorCreated = true;
        }
        else
        {
            unidad.then(function(response){
                
                if(response.data.status)
                {
                    $scope.createdUnidad = true;
                    Form.resetForm('#frm-create-unidad');
                }
                else
                {
                    $scope.errorMessageUnidad = 'Ocurrio algo!, no hemos podido crear tu Unidad, porfavor intentalo de nuevo';
                    $scope.errorCreated = true;
                }
            });
        }
    }

    $scope.createempresa = function()
    {
        var empresa = Form.OnSubmitForm({
            form    : '#frm-create-empresa',
            css     : '.required',
            route   : baseurl + 'empresas/create',
            fields  : '',
            clear   : false
        });

        if(empresa == true)
        {
            $scope.errorMessageEmpresa = 'Por favor, Ingresa los datos de tu empresa';
            $scope.errorCreated = true;
        }
        else
        {
            empresa.then(function(response){

                if(response.data.status)
                {
                    $scope.createdEmpresa = true;
                    Form.resetForm('#frm-create-empresas');
                }
                else
                {
                    $scope.errorMessageEmpresa = response.data.message;
                    $scope.errorCreated = true;
                }
            });
        }
    }

    $scope.errorMessageEmpresaVisitante = '';
    $scope.errorCreatedEmpresaVisitante = false;
    
    $scope.createEmpresaVisitante = function()
    {
        var empresa = Form.OnSubmitForm({
            form    : '#frm-create-empresa-visitante',
            css     : '.required',
            route   : baseurl + 'empresas/create',
            fields  : '',
            clear   : false
        });

        if(empresa == true)
        {
            $scope.errorMessageEmpresaVisitante = 'Por favor, Ingresa los datos de tu empresa';
            $scope.errorCreatedEmpresaVisitante = true;
        }
        else
        {
            empresa.then(function(response){

                if(response.data.status)
                {
                    $scope.errorCreatedEmpresaVisitante = true;
                    Form.resetForm('#frm-create-empresa-visitante');
                }
                else
                {
                    $scope.errorMessageEmpresaVisitante = response.data.message;
                    $scope.errorCreatedEmpresaVisitante = true;
                }
            });
        }
    }

    $scope.btnUpdateEmpresa = 'Actualiza mi Empresa';

    $scope.editaempresa = function()
    {
        $scope.btnUpdateEmpresa = 'Actualizando...';

        var empresa = Form.OnSubmitForm({
            form    : '#frm-edita-empresa',
            css     : '.required',
            route   : baseurl + 'empresas/update',
            fields  : '',
            clear   : false
        });

        if(empresa == true)
        {
            $scope.errorMessageEmpresa = 'Por favor, Ingresa los datos de tu empresa';
            $scope.typeMessage = 'danger';
            $scope.errorCreated = true;
        }
        else
        {
            empresa.then(function(response){

                if(response.data.status)
                {
                    $scope.errorCreated = true;
                    $scope.errorMessageEmpresa = response.data.message;
                    $scope.typeMessage = 'success';
                }
                else
                {
                    $scope.errorMessageEmpresa = response.data.message;
                    $scope.errorCreated = true;
                    $scope.typeMessage = 'danger';
                }
            });

            $scope.btnUpdateEmpresa = 'Actualiza mi Empresa';
        }
    }

    $scope.errorMessageSede = '';
    $scope.errorCreatedSede = false;
    $scope.createdSede = false;

    $scope.createSede = function()
    {
        var sedes = Form.OnSubmitForm({
            form    : '#frm-create-sede',
            css     : '.required',
            route   : baseurl + 'sedes/create',
            fields  : '',
            clear   : false
        });

        if(sedes == true)
        {
            $scope.errorMessageSede = 'Por favor, Ingresa los datos de tu sede';
            $scope.errorCreatedSede = true;
        }
        else
        {
            sedes.then(function(response){

                if(response.data.status)
                {                    
                    $scope.typeMessage = 'success';
                    $scope.errorMessageSede = response.data.message;
                    $scope.errorCreatedSede = true;
                    $scope.createdSede = true;
                    Form.resetForm('#frm-create-sede');
                }
                else
                {                    
                    $scope.typeMessage = 'danger';
                    $scope.errorMessageSede = response.data.message;
                    $scope.errorCreatedSede = true;
                }

                $scope.getDataSedes(uid, response.data.status);
            });
        }
    }

    $scope.errorMessageSedeVisitante = '';
    $scope.errorCreatedSedeVisitante = false;

    $scope.createSedeVisitante = function()
    {
        var sedes = Form.OnSubmitForm({
            form    : '#frm-create-sede-visitante',
            css     : '.required',
            route   : baseurl + 'sedes/create',
            fields  : '',
            clear   : false
        });

        if(sedes == true)
        {
            $scope.errorMessageSedeVisitante = 'Por favor, ingrese los datos';
            $scope.errorCreatedSedeVisitante = true;
        }
        else
        {
            sedes.then(function(response){

                if(response.data.status)
                {                    
                    $scope.typeMessage = 'success';
                    $scope.errorMessageSedeVisitante = response.data.message;
                    $scope.errorCreatedSedeVisitante = true;
                    $scope.createdSedeVisitante = true;
                    Form.resetForm('#frm-create-sede');
                }
                else
                {                    
                    $scope.typeMessage = 'danger';
                    $scope.errorMessageSedeVisitante = response.data.message;
                    $scope.errorCreatedSedeVisitante = true;
                }

                $scope.getDataSedes(uid, response.data.status);
            });
        }
    }

    $scope.getInSigga = function()
    {
        var getFromStorage = $window.localStorage.getItem('paso');
        var steps = JSON.parse(getFromStorage);

        switch(steps.modulo)
        {
            case 'mipersonal':
                $window.location.reload();
                $window.localStorage.removeItem('paso');
                location.reload();
                break;

            case 'visitantes':
                $location.path('/visitantes');
                $window.localStorage.removeItem('paso');
                location.reload();
                break;

            case 'proveedores':
                $location.path('/proveedores');
                $window.localStorage.removeItem('paso');
                break;
        }        
    }

    $scope.goToSection = function()
    {
        $location.hash('detalles');
        $anchorScroll();
    }

    $scope.showEditaDataEmpresa = true;
    $scope.showEditaDataSedes = true;
    
    $scope.loadDataSedes = false;
    $scope.messageSedes = '';    
    $scope.searchSedes = '';

    $scope.editarEmpresa = function()
    {
        $scope.showEditaDataEmpresa = false;
        $scope.showDetailsActivitys = false;        
        $scope.showDetailsEmpleado = true;
        $scope.customReportInOut = true;
        $scope.showEditaDataSedes = true;
        $scope.showResumeEmpleados = false;
        $scope.showListEmpleados = false;
        $scope.customReportInOut = true;
        $scope.customReport = false;
        $scope.showEditForm = false;
        $scope.showCreateForm = false;
        $scope.showPlanes = false;

        var requestEmpresaData = $http.post(baseurl + 'empresas/readbyid', {id_cms_empresas : uid});

        requestEmpresaData.then(function(response){
            if(response.data.status)
            {
                $scope.idEmpresa = response.data.rows[0].id_sg_empresa;
                $scope.empresa = response.data.rows[0].empresa;
                $scope.nit = response.data.rows[0].nit;
                $scope.correo = response.data.rows[0].email;
                $scope.direccion = response.data.rows[0].direccion;
                $scope.estado = response.data.rows[0].estado;
            }
        });
    }

    $scope.editarSede = function()
    {
        $scope.showDetailsActivitys = false;
        $scope.showEditaDataSedes = false;
        $scope.showDetailsEmpleado = true;
        $scope.customReportInOut = true;        
        $scope.showResumeEmpleados = false;
        $scope.showListEmpleados = false;
        $scope.customReportInOut = true;
        $scope.customReport = false;
        $scope.showEditForm = false;
        $scope.showCreateForm = false;
        $scope.showPlanes = false;

        $scope.getDataSedes(uid, false);
    }

    $scope.closeSede = function()
    {
        $scope.showEditaDataEmpresa = true;
        $scope.showDetailsEmpleado = false;
        $scope.customReportInOut = false;
        $scope.showEditaDataSedes = true;
        $scope.errorCreated = false;
        $scope.showPlanes = false;
    }

    $scope.closeEditEmpresa = function()
    {
        $scope.showEditaDataEmpresa = true;
        $scope.showDetailsEmpleado = false;
        $scope.customReportInOut = false;
        $scope.showEditaDataSedes = true;
        $scope.errorCreated = false;
        $scope.showPlanes = false;
    }

    $scope.getDataSedes = function(uid, add)
    {
        var requestDataSedes = $http.post(baseurl + 'sedes/readbyidempresa', { idusuario : uid });

        requestDataSedes.then(function(response)
        {
            if(response.data.status)
            {
                $scope.dataSedes = response.data.rows;

                if(add)
                {
                    addOptionComboBox('.comboBoxSedes', response.data.rows[0].id_sg_sede, response.data.rows[0].nombre_sede);
                    addOptionComboBox('.comboBoxSedeEdit', response.data.rows[0].id_sg_sede, response.data.rows[0].nombre_sede);
                    addOptionComboBox('.comboBoxSedesCreate', response.data.rows[0].id_sg_sede, response.data.rows[0].nombre_sede);
                }
                
            }
        });
    }

    $scope.showCreaDataSedes = true;
    
    $scope.addSede = function()
    {
        $scope.showCreaDataSedes = false;
        $scope.showEditaDataSedes = true;
        $scope.errorCreatedSede = false;
        $scope.showPlanes = false;
    }

    $scope.cancelAddSede = function()
    {
        $scope.showCreaDataSedes = true;
        $scope.showEditaDataSedes = false;
        $scope.createdSede = false;
        $scope.showFormEditaSede = true;
        $scope.showPlanes = false;
    }

    $scope.doneSede = function()
    {
        $scope.errorCreatedSede = true;
        $scope.cancelAddSede();
    }

    $scope.anotherSede = function()
    {
        $scope.errorCreatedSede = false;
        $scope.errorMessageSede = '';
        $scope.createdSede = false;

        $scope.addSede();
    }

    $scope.editSede = function(idSede)
    {
        $scope.showEditaDataSedes = true;
        $scope.showFormEditaSede = false;
        $scope.errorCreatedSede = false;
        $scope.showPlanes = false;

        var requestEditSede = $http.post(baseurl + 'sedes/readbyid', {id_cms_sede : idSede});

        requestEditSede.then(function(response){
            if(response.data.status)
            {
                Form.resetForm('#frm-edita-sede');
                $scope.idSede = response.data.rows[0].id_sg_sede;
                $scope.nombreSede = response.data.rows[0].nombre_sede;                
                $scope.dirSede = response.data.rows[0].direccion_sede;
                $scope.telefonoSede = response.data.rows[0].telefono_sede;
            }
        });
    }

    $scope.editProcessData = function()
    {
        var sedes = Form.OnSubmitForm({
            form    : '#frm-edita-sede',
            css     : '.required',
            route   : baseurl + 'sedes/update',
            fields  : '',
            clear   : false
        });

        if(sedes == true)
        {
            $scope.errorMessageSede = 'Por favor, Ingresa los datos de tu sede';
            $scope.errorCreatedSede = true;
        }
        else
        {
            sedes.then(function(response){

                if(response.data.status)
                {                    
                    $scope.typeMessage = 'success';
                    $scope.errorMessageSede = response.data.message;
                    $scope.errorCreatedSede = true;
                    $scope.createdSede = true;
                    
                    $scope.readEmpleados();
                }
                else
                {                    
                    $scope.typeMessage = 'danger';
                    $scope.errorMessageSede = response.data.message;
                    $scope.errorCreatedSede = true;
                }

                $scope.getDataSedes(uid);
            });
        }
    }

    $scope.deleteProcessSede = function(idSede)
    {
        var deleteSede = $http.post(baseurl + 'sedes/delete', { id_cms_sede : idSede });

        $scope.deleteSuccessSede = true;
        $scope.reloadingSede = 'Actualizando ...';
        $scope.typeMessage = 'info';

        deleteSede.then(function(response){

            if(response.data.status)
            {                
                $scope.getDataSedes(uid);
                $scope.reloadingSede = 'Sede Eliminada';

                $scope.enableDetails = false;
                $scope.selectedId = "";
                $scope.typeMessage = 'success';

                clearOptionComboBoxId('.comboBoxSedes', idSede);
                clearOptionComboBoxId('.comboBoxSedesCreate', idSede);

                $timeout(function(){
                    $scope.deleteSuccessSede = false;
                }, 2500);
            }
            else
            {
                $scope.reloadingSede = response.data.message;
                $scope.enableDetails = false;
                $scope.selectedId = "";
                $scope.typeMessage = 'danger';

                $timeout(function(){
                    $scope.deleteSuccessSede = false;
                }, 4000);
            }
        });
    }

    var clearOptionComboBoxId = function(combo, id)
    {
        $(combo + ' option[value="'+ id +'"]').each(function(){
            $(this).remove();
        });
    }

    var clearOptionComboBoxValue = function(combo, value)
    {
        $(combo + ' option').each(function()
        {
            if($(this).text() === value)            
                $(this).remove();            
        });
    }

    var addOptionComboBox = function(combo, id, prop)
    {
        $(combo).append('<option value="'+ id +'">'+ prop +'</option>');
    }

    $scope.arguments = [];

    $scope.cedulaCheck = true;
    $scope.nombresCheck = true;
    $scope.apellidosCheck = true;    
    $scope.sedeCheck = true;
    $scope.entradaCheck = true;
    $scope.salidaCheck = true;
    $scope.sedeOption = '';
    $scope.fechaDesde = '';
    $scope.fechaHasta = '';
    $scope.entradaSalidaOption = '';
    $scope.empleadoOption = '';
    $scope.showMessageErrorReporte = false;

    $scope.generateReporte = function()
    {
        var fields = Form.serializeForm('#frm-generate-report input[type="checkbox"]');
        $scope.arguments = [];

        if(Core.isEmpty($scope.sedeOption) || Core.isEmpty($scope.fechaDesde) || Core.isEmpty($scope.fechaHasta) || Core.isEmpty($scope.entradaSalidaOption))
            $scope.showMessageErrorReporte = true;
        else
        {
            $scope.showMessageErrorReporte = false;

            for(var i in fields)
            {
                if(fields[i] == "on")
                    $scope.arguments.push(i);
            }

            if(!Core.isEmpty($scope.empleadoOption))
            {
                var dataToSend = {
                    fields          : $scope.arguments.join(', '),
                    id_cms_empresa  : uid,
                    desde           : transformDate($scope.fechaDesde),
                    hasta           : transformDate($scope.fechaHasta),
                    sede            : $scope.sedeOption,
                    entradaSalida   : $scope.entradaSalidaOption,
                    empleado        : $scope.empleadoOption
                }
            }
            else
            {
                var dataToSend = {
                    fields          : $scope.arguments.join(', '),
                    id_cms_empresa  : uid,
                    desde           : transformDate($scope.fechaDesde),
                    hasta           : transformDate($scope.fechaHasta),
                    sede            : $scope.sedeOption,
                    entradaSalida   : $scope.entradaSalidaOption
                }
            }           

            var requestReporteData = $http.post(baseurl + 'registros/obtenerreporteactividades', dataToSend);

            $scope.dataVisitasEmpleado = [];

            requestReporteData.then(function(response)
            {
                if(response.data.status)
                    $scope.dataVisitasEmpleado = response.data.rows;
                else
                    $scope.dataVisitasEmpleado = [];
            });
        }
    }

    var transformDate = function(dateToConvert)
    {
        var dateData = new Date(dateToConvert);
        var newFormatDate = dateData.getFullYear() + '-' + (setZero(dateData.getMonth() + 1)) + '-' + setZero(dateData.getDate())

        return newFormatDate;
    }

    var setZero = function(number)
    {
        if(number < 10)
            return '0' + number;

        return number;
    }

    $scope.exportToExcel = function(route, table, obj)
    {
        var requestDataFromVisitas = $http.post(baseurl + route, obj);
        var fields = $(table);

        var titleHeads = [];

        for(var i = 0; i < fields.length; i++)
        {
            var title = fields[i];
            titleHeads.push(title.textContent);
        }        

        var dataToExcel = [];
        var innerData = [];

        dataToExcel.push(titleHeads);

        requestDataFromVisitas.then(function(response){
            
            if(response.data.status)            
            {
                $.each(response.data.rows, function(index, value){
                    innerData = [];
                    $.each(value, function(ind, val){
                        innerData.push(val);
                    });
                    dataToExcel.push(innerData);
                });
            }

            dataToExcel.push(innerData);

            var filename = 'Reporte_Mi_Personal.xlsx';
            var sheetname = 'Sigga_Mi_Personal';
            
            var wb = XLSX.utils.book_new(), ws = XLSX.utils.aoa_to_sheet(dataToExcel); 
            
            XLSX.utils.book_append_sheet(wb, ws, sheetname);
            XLSX.writeFile(wb, filename);
        });
    }

    $scope.generateReportPDF = function()
    {
        
    }

    $scope.showGraphics = false;

    $scope.showResumeGraphics = function()
    {
        $scope.showGraphics = true;
    }

    $scope.showPlanesData = function()
    {
        $scope.showPlanes = true;
        $scope.showListEmpleados = true;
        $scope.showDetailsEmpleado = true;
        $scope.customReportInOut = true;
        $scope.showDetailsActivitys = false;
        $scope.customReport = false;      
    }

    $('.tooltip-message').tooltip();
}]);