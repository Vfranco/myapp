<div class="header bg-mipersonal pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Mi Personal</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="javascript:">Resumen General</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- resumen empresas por usuario -->
            <div class="row">
                <div ng-if="!loadDataEmpresas" class="col-xl-2 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center" ng-if="!loadDataEmpresas">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/load-empresa.svg" style="height: 61px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div ng-show="loadDataEmpresas" class="col-xl-3 col-md-6" ng-repeat="rows in dataEmpresas">
                    <div class="card card-stats" ng-if="rows.estado == '1'">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-sm">Mi Empresa</h5>
                                    <span class="h2 font-weight-bold mb-0">{{rows.empresa}}</span>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm d-flex justify-content-center">
                                <span class="text-nowrap">Estado</span>
                                <span class="text-info ml-2" ng-if="rows.estado == '1'">Activa</span>
                                <a href="#editarEmpresa" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary ml-2" ng-click="editarEmpresa()">Editar Empresa</a>
                                <a href="#crearSedes" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary ml-2" ng-click="editarSede()">Crear Sedes</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Mis Empleados</h5>                                    
                                    <!-- <span class="h2 font-weight-bold mb-0"><?php echo Models\Actividades\ModelActividades::totalEmpleados($userid, 'totalEmpleados'); ?></span> -->
                                    <span class="h2 font-weight-bold mb-0">{{dataEmpleados.length}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-badge"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap">Detalles Empleados</span>
                                <a href="#todosLosEmpleados" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary ml-2" ng-click="verMisEmpleados()">Todos mis Empleados</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Actividades</h5>
                                    <span class="h2 font-weight-bold mb-0"><?php echo Models\Actividades\ModelActividades::totalActividades($userid, 'totalActividades'); ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-bullet-list-67"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap">Detalles Registros</span>
                                <a href="#ampliarActividades" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary ml-2" ng-click="seeDetailsInOut()">Todas las Actividades</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"><?php echo Models\Usuario\ModelUsuario::ObtenerPlanByEmpresa($userid)[0]['nombre_plan']; ?></h5>
                                    <span class="h2 font-weight-bold mb-0">{{ <?php echo Models\Usuario\ModelUsuario::ObtenerPlanByEmpresa($userid)[0]['costo']; ?> | currency}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm d-flex justify-content-left">
                                <span class="text-wrap">Paquete: tienes <?php echo Models\Usuario\ModelUsuario::ObtenerPlanByEmpresa($userid)[0]['registros']; ?> actividades</span>
                                <a href="javascript:" class="btn btn-sm btn-primary ml-2" ng-click="showPlanesData()">Más Planes</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- aqui inicia el contenido -->
<div class="container-fluid mt--6">
    <div id="crearEmpleados" class="row">
        <div class="col-lg-4" ng-hide="showListEmpleados">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0">Mi Personal</h5>
                            <span class="badge badge-info badge-md">{{ result.length }} <span ng-if="searchEmpleado.length > 0">Coincidencia</span></span>
                            <span class="badge badge-success badge-md" ng-if="deleteSuccess">{{ reloadingEmpleados }}</span>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="#todosLosEmpleados" du-smooth-scroll du-scrollspy class="btn btn-sm btn-info" ng-click="verMisEmpleados()" ng-hide="showCreateForm">Todos</a>
                            <a href="#agregarEmpleado" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-click="addEmpleado()" ng-hide="showCreateForm">Añadir</a>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">
                    <form action="javascript:" method="post" autocomplete="off">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-lg input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-search"></span>
                                    </div>
                                </div>
                                <input ng-model="searchEmpleado" type="search" class="form-control" placeholder="Buscar Empleado" ng-disabled="!loadDataEmpleados">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body customScroll {{ setScroll(dataEmpleados) }}" ng-class="{'removeScroll' : searchEmpleado.length > 0}">
                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0" ng-if="!loadDataEmpleados">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="javascript:" class="avatar avatar-load rounded-circle">
                                        <img src="" />
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="javascript:"><span class="badge badge-primary badge-pill text-muted-load">loading informacion from server</span></a>
                                    </h4>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Cargando datos</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Esperando Respuesta</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Del Servidor ............</span></small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0 hover" ng-click="showDetails(rows.id_sg_personal)" ng-show="loadDataEmpleados" ng-repeat="rows in dataEmpleados | filter:searchEmpleado as result">
                            <div class="row align-items-center" ng-hide="selectedId == rows.id_sg_personal">
                                <div class="col-auto">
                                    <a href="javascript:" class="avatar rounded-circle">
                                        <img src="<?php echo BASE_URL; ?>Content/assets/img/empleado.png" />
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="javascript:">{{ rows.empleado }}</a>
                                    </h4>
                                    <span class="text-success" ng-if="rows.id_sg_estado == '1'">●</span>
                                    <small ng-if="rows.id_sg_estado == '1'">Activo</small>
                                    <span class="text-danger" ng-if="rows.id_sg_estado == '2'">●</span>
                                    <small ng-if="rows.id_sg_estado == '2'">Inactivo</small>
                                    <br>
                                    <small><a href="mailto:{{rows.correo_personal}}">{{ rows.correo_personal }}</a></small>
                                    <br>
                                    <small>{{rows.nombre_sede}}</small>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <a href="https://api.whatsapp.com/send?phone=57{{rows.telefono_personal}}" target="_blank" class="btn btn-sm btn-success" ng-if="seeDetails == rows.id_sg_personal" ng-hide="rows.id_sg_estado == '2'"><i class="fa fa-comment"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" ng-if="seeDetails == rows.id_sg_personal" ng-click="selectItem(rows.id_sg_personal)"><i class="fa fa-trash"></i></button>
                                    <a href="#verEmpleados" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-if="seeDetails == rows.id_sg_personal" ng-click="requestDetails(rows.id_sg_personal)">Ver</a>
                                </div>
                            </div>
                            <div class="row align-items-center" ng-class="{'bounce animated' : selectedId == rows.id_sg_personal}" ng-show="selectedId == rows.id_sg_personal">
                                <div class="col">
                                    <div class="row alert alert-danger">
                                        <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Empleado ?</span></div>
                                        <div class="col text-center">
                                            <button class="btn btn-sm btn-danger" ng-click="deleteProcessEmpleado(rows.id_sg_personal, rows.nombres_personal, rows.apellidos_personal)">Si, Borralo</button>
                                        </div>
                                        <div class="col text-center">
                                            <button class="btn btn-sm btn-warning" ng-click="cancelProcess(rows.id_sg_personal)">No, Cancelalo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li ng-hide="searchEmpleado.length == 0" ng-if="result.length == 0" class="list-group-item px-0 hover" ng-model="result">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="javascript:" class="avatar avatar-load rounded-circle">
                                        <img src="" />
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="javascript:"><span class="badge badge-primary badge-pill text-muted-load">loading informacion from server</span></a>
                                    </h4>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Cargando datos</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Esperando Respuesta</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Del Servidor ............</span></small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- editaEmpresa -->
        <div id="editarEmpresa" class="col-lg-4" ng-hide="showEditaDataEmpresa">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0">Mi Empresa <span class="text-sm text-muted">Actualiza los datos</span></h5>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-danger" ng-click="closeEditEmpresa()"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">

                </div>
                <div class="card-body">
                    <div class="alert alert-{{ typeMessage }} text-center" ng-if="errorCreated">{{ errorMessageEmpresa }}</div>
                    <!-- Form Edit Empresa -->
                    <?php
                    Core\Form::createSimpleForm([
                        'id'        => 'frm-edita-empresa',
                        'action'    => 'javascript:',
                        'css'       => 'none'
                    ])->formInputs([
                        ''   => [
                            'type'      => 'hidden',
                            'name'      => 'id_cms_empresas',
                            'css'       => '',
                            'labelCss'  => '',
                            'col'       => '',
                            'value'     => "{{ idEmpresa }}"
                        ],
                        'Nombres Empresa'   => [
                            'type'      => 'text',
                            'name'      => 'nombreEmpresa',
                            'css'       => 'form-control required',
                            'labelCss'  => 'form-control-label',
                            'col'       => 'col-sm-8',
                            'value'     => "{{ empresa }}",
                        ],
                        'NIT'   => [
                            'type'      => 'text',
                            'name'      => 'nitEmpresa',
                            'css'       => 'form-control required',
                            'labelCss'  => 'form-control-label',
                            'col'       => 'col-sm-8',
                            'value'     => "{{ nit }}",
                        ],
                        'Correo'   => [
                            'type'      => 'text',
                            'name'      => 'emailEmpresa',
                            'css'       => 'form-control required',
                            'labelCss'  => 'form-control-label',
                            'col'       => 'col-sm-8',
                            'value'     => "{{ correo }}",
                        ],
                        'Direccion Empresa'   => [
                            'type'      => 'text',
                            'name'      => 'dirEmpresa',
                            'css'       => 'form-control required',
                            'labelCss'  => 'form-control-label',
                            'col'       => 'col-sm-8',
                            'value'     => "{{ direccion }}",
                        ]
                    ])->setButtons([
                        '{{ btnUpdateEmpresa }}'  => [
                            'type'      => 'submit',
                            'id'        => 'btn-edita-empresa',
                            'css'       => 'btn btn-primary pull-right',
                            'event'     => 'ng-click="editaempresa()"'
                        ]
                    ]);
                    ?>
                </div>
            </div>
        </div>
        <!-- crud Sedes -->
        <div id="crearSedes" class="col-lg-4" ng-hide="showEditaDataSedes">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0">Mis Sedes <span class="text-sm text-muted">Gestiona tus sedes</span></h5>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-primary" ng-click="addSede()">Añadir Sede</button>
                            <button class="btn btn-sm btn-danger" ng-click="closeSede()"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="alert alert-{{typeMessage}} mt-2 text-center" ng-if="deleteSuccessSede">{{ reloadingSede }}</div>
                </div>
                <div class="card-header py-0">
                    <form action="javascript:" method="post" autocomplete="off">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-lg input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fas fa-search"></span>
                                    </div>
                                </div>
                                <input ng-model="searchSedes" type="search" class="form-control" placeholder="Buscar Sede">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body customScroll {{ setScroll(dataSedes) }}" ng-class="{'removeScroll' : searchSedes.length > 0}">
                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0" ng-if="dataSedes.length <= 0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="javascript:" class="avatar avatar-load rounded-circle">
                                        <img src="" />
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="javascript:"><span class="badge badge-primary badge-pill text-muted-load">loading informacion from server</span></a>
                                    </h4>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Cargando datos</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Esperando Respuesta</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Del Servidor ............</span></small>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0 hover" ng-click="showDetails(rows.id_sg_sede)" ng-repeat="rows in dataSedes | filter:searchSedes as resultsede">
                            <div class="row align-items-center" ng-hide="selectedId == rows.id_sg_sede">
                                <div class="col-auto">
                                    <a href="javascript:" class="avatar rounded-circle">
                                        <img src="<?php echo BASE_URL; ?>Content/assets/img/sedes.png" />
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="javascript:">{{ rows.nombre_sede }}</a>
                                    </h4>
                                    <span class="text-success" ng-if="rows.id_sg_estado == '1'">●</span>
                                    <small ng-if="rows.id_sg_estado == '1'">Activa</small>
                                    <span class="text-danger" ng-if="rows.id_sg_estado == '2'">●</span>
                                    <small ng-if="rows.id_sg_estado == '2'">Inactiva</small>
                                    <br>
                                    <small><a href="http://maps.google.com/?q={{rows.direccion_sede}}" target="_blank">{{ rows.direccion_sede }}</a></small>
                                    <br>
                                    <small>{{rows.telefono_sede}}</small>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-neutral" ng-if="seeDetails == rows.id_sg_sede" ng-click="editSede(rows.id_sg_sede)"><i class="fa fa-pen"></i></button>
                                    <a href="http://maps.google.com/?q={{rows.direccion_sede | encodeUri }}" target="_blank" ng-if="seeDetails == rows.id_sg_sede" class="btn btn-sm btn-primary"><i class="ni ni-pin-3"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" ng-if="seeDetails == rows.id_sg_sede" ng-click="selectItem(rows.id_sg_sede)"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="row align-items-center" ng-class="{'bounce animated' : selectedId == rows.id_sg_sede}" ng-show="selectedId == rows.id_sg_sede">
                                <div class="col">
                                    <div class="row alert alert-danger">
                                        <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar esta Sede ?</span></div>
                                        <div class="col text-center">
                                            <button class="btn btn-sm btn-danger" ng-click="deleteProcessSede(rows.id_sg_sede)">Si, Borralo</button>
                                        </div>
                                        <div class="col text-center">
                                            <button class="btn btn-sm btn-warning" ng-click="cancelProcess(rows.id_sg_sede)">No, Cancelalo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li ng-hide="searchSedes.length == 0" ng-if="resultsede.length == 0" class="list-group-item px-0 hover">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="javascript:" class="avatar avatar-load rounded-circle">
                                        <img src="" />
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="javascript:"><span class="badge badge-primary badge-pill text-muted-load">loading informacion from server</span></a>
                                    </h4>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Cargando datos</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Esperando Respuesta</span></small>
                                    <br>
                                    <small><span class="badge badge-primary badge-pill text-muted-load">Del Servidor ............</span></small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- crud Sedes -->
        <div class="col-lg-4" ng-hide="showCreaDataSedes">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0">Mis Sedes <span class="text-sm text-muted">Crea una nueva Sede</span></h5>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-danger" ng-click="cancelAddSede()"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">

                </div>
                <div class="card-body">
                    <div class="alert alert-{{ typeMessage }} text-center" ng-if="errorCreatedSede">{{ errorMessageSede }}</div>
                    <div ng-if="!createdSede">
                        <?php
                        Core\Form::createSimpleForm([
                            'id'        => 'frm-create-sede',
                            'action'    => 'javascript:',
                            'css'       => 'none'
                        ])->formInputs([
                            ''   => [
                                'type'      => 'hidden',
                                'name'      => 'idUser',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "{{ uid }}"
                            ],
                            'Nombre Sede'   => [
                                'type'      => 'text',
                                'name'      => 'nombreSede',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'ngmodel'   => "sede"
                            ],
                            'Direccion'   => [
                                'type'      => 'text',
                                'name'      => 'dirSede',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Telefono'   => [
                                'type'      => 'text',
                                'name'      => 'telefonoSede',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ]
                        ])->setButtons([
                            'Crea mi Sede'  => [
                                'type'      => 'submit',
                                'id'        => 'btn-create-empresa',
                                'css'       => 'btn btn-primary pull-right',
                                'event'     => 'ng-click="createSede()"'
                            ],
                            'Cancelar'      => [
                                'type'  => 'reset',
                                'css'   => 'btn btn-default',
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="row alert alert-info" ng-show="createdSede">
                        <div class="col-12 text-center">
                            <div class="col text-center mb-2"><span class="text-sm">Deseas registrar otra sede ?</span></div>
                        </div>
                        <div class="col">
                            <button class="btn btn-sm btn-neutral" ng-click="doneSede()">No, ya termine</button>
                        </div>
                        <div class="col text-center">
                            <button class="btn btn-sm btn-primary ml-5" ng-click="anotherSede()">Si, una más</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- edita sede -->
        <div class="col-lg-4" ng-hide="showFormEditaSede">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0">Mis Sedes <span class="text-sm text-muted">Actualiza tu Sede</span></h5>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-danger" ng-click="cancelAddSede()"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">

                </div>
                <div class="card-body">
                    <div class="alert alert-{{ typeMessage }} text-center" ng-if="errorCreatedSede">{{ errorMessageSede }}</div>
                    <div>
                        <?php
                        Core\Form::createSimpleForm([
                            'id'        => 'frm-edita-sede',
                            'action'    => 'javascript:',
                            'css'       => 'none'
                        ])->formInputs([
                            ''   => [
                                'type'      => 'hidden',
                                'name'      => 'idSede',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "{{ idSede }}"
                            ],
                            'Nombre Sede'   => [
                                'type'      => 'text',
                                'name'      => 'nombreSede',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ nombreSede }}"
                            ],
                            'Direccion'   => [
                                'type'      => 'text',
                                'name'      => 'dirSede',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ dirSede }}"
                            ],
                            'Telefono'   => [
                                'type'      => 'text',
                                'name'      => 'telefonoSede',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ telefonoSede }}"
                            ]
                        ])->setButtons([
                            'Actualiza mi Sede'  => [
                                'type'      => 'submit',
                                'id'        => 'btn-edita-sede',
                                'css'       => 'btn btn-primary pull-right',
                                'event'     => 'ng-click="editProcessData()"'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- detalle de empleados -->
        <div id="verEmpleados" class="col-lg-4" ng-hide="showDetailsEmpleado">
            <div class="card" ng-class="{'flipInY animated' : showDetailsEmpleado == true}">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0">Detalle Empleados</h5>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-info" ng-click="editEmpleado()" ng-show="enableDetails">Editar</button>
                            <button class="btn btn-sm btn-danger" ng-click="cancelDetail()" ng-show="enableDetails"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">

                </div>
                <div class="card-body">
                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--4">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center" ng-hide="enableDetails">
                                <span class="col-lg-12 text-center">No se muestran detalles</span>
                            </div>
                            <div class="row align-items-center" ng-show="enableDetails">
                                <div class="col text-center">
                                    <div ng-if="photo == 0">
                                        <img src="<?php echo BASE_URL ?>Content/assets/img/empleado-default.jpg" class="rounded img-fluid">    
                                    </div>
                                    <div ng-if="photo != 0">
                                        <img src="<?php echo API_REST ?>Content/{{ photo }}" class="rounded img-fluid">    
                                    </div>                                    
                                    <label for="uploadfile" class="btn btn-sm btn-success mt-2"><i class="fa fa-image"></i></label>
                                    <input id="uploadfile" type="file" name="file[]" style="display: none;">
                                </div>
                                <div class="col">
                                    <div class="my-4">
                                        <span class="h6 surtitle text-muted">
                                            Cédula
                                        </span>
                                        <div class="h3">{{ cedula }}</div>
                                    </div>
                                    <div class="my-4">
                                        <span class="h6 surtitle text-muted">
                                            Nombres y Apellidos
                                        </span>
                                        <div class="h3">{{ nombresApellidos }}</div>
                                    </div>
                                    <div class="my-4">
                                        <span class="h6 surtitle text-muted">
                                            Direccion
                                        </span>
                                        <div class="h3">{{ direccion }}</div>
                                    </div>
                                    <div class="my-4">
                                        <span class="h6 surtitle text-muted">
                                            Telefono
                                        </span>
                                        <div class="h3">{{ telefono }}</div>
                                    </div>
                                    <div class="my-4">
                                        <span class="h6 surtitle text-muted">
                                            Correo
                                        </span>
                                        <div class="h3">{{ correo }}</div>
                                    </div>
                                    <div class="my-4">
                                        <span class="h6 surtitle text-muted">
                                            Sede
                                        </span>
                                        <div class="h3">{{ nombresede }}</div>
                                    </div>
                                    <div class="my-4">
                                        <label class="custom-toggle custom-toggle-success">
                                            <input type="checkbox" ng-checked="estado == '1'" ng-click="activateEmpleado(estado, uid)">
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- registra empleado -->
        <div id="agregarEmpleado" class="col-lg-4" ng-show="showCreateForm">
            <div class="card" ng-class="{'bounce animated' : showCreateForm == true}">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="h3 mb-0">Registra tu Empleado</h5>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-sm btn-primary" ng-click="comebackToDetails()">Regresar</button>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">

                </div>
                <div class="card-body">
                    <div class="alert alert-{{ typeMessage }} text-center" ng-if="setMessage">{{ messageText }}</div>
                    <div ng-hide="keepRegistering">
                        <?php

                        Core\Form::createSimpleForm([
                            'id'        => 'frm-create-empleado',
                            'action'    => 'javascript:',
                            'css'       => 'none'
                        ])->formInputs([
                            '1'   => [
                                'type'      => 'hidden',
                                'name'      => 'idEmpresa',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "{{ uid }}"
                            ],
                            '2'   => [
                                'type'      => 'hidden',
                                'name'      => 'arl',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "1"
                            ],
                            '3'   => [
                                'type'      => 'hidden',
                                'name'      => 'eps',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "1"
                            ],
                            'Sedes'   => [
                                'type'      => 'select',
                                'name'      => 'sede',
                                'css'       => 'form-control required comboBoxSedesCreate',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'data'      => Models\Combos\ModelCombos::ComboSedes($userid)
                            ],
                            'Cédula'   => [
                                'type'      => 'number',
                                'name'      => 'cedula',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Nombres'   => [
                                'type'      => 'text',
                                'name'      => 'nombres',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Apellidos'   => [
                                'type'      => 'text',
                                'name'      => 'apellidos',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Direccion'   => [
                                'type'      => 'text',
                                'name'      => 'direccion',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Telefono'   => [
                                'type'      => 'number',
                                'name'      => 'telefono',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Email'   => [
                                'type'      => 'text',
                                'name'      => 'email',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'ngmodel'   => 'ng-model="email" ng-keyup="checkEmail()"'
                            ]
                        ])->setButtons([
                            'Registrar'  => [
                                'type'      => 'submit',
                                'id'        => 'btn-create-empleado',
                                'css'       => 'btn btn-primary pull-right',
                                'event'     => 'ng-click="createEmpleado()"',
                                'ngdisabled'=> 'ng-disabled="btnRegistraEmpleado"'
                            ],
                            'Cancelar'      => [
                                'type'  => 'reset',
                                'css'   => 'btn btn-default',
                            ]
                        ]);
                        ?>
                    </div>                    
                    <div class="row alert alert-info" ng-show="keepRegistering">
                        <div class="col-12 text-center mb-2"><span class="text-sm">Deseas registrar un empleado más ?</span></div>
                        <div class="col text-center">
                            <button class="btn btn-sm btn-neutral" ng-click="done()">No, ya termine</button>
                        </div>
                        <div class="col text-center">
                            <button class="btn btn-sm btn-primary ml-5" ng-click="another()">Si, uno más</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- editaEmpleado -->
        <div class="col-lg-4" ng-show="showEditForm">
            <div class="card" ng-class="{'bounce animated' : showEditForm == true}">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="h3 mb-0">Actualiza tu Empleado</h5>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-sm btn-neutral" ng-click="comebackToDetails()">Regresar</button>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">

                </div>
                <div class="card-body">
                    <div class="alert alert-{{ typeMessage }} text-center" ng-if="setMessage">{{ messageText }}</div>
                    <div ng-hide="keepRegistering">
                        <?php
                        Core\Form::createSimpleForm([
                            'id'        => 'frm-edita-empleado',
                            'action'    => 'javascript:',
                            'css'       => 'none'
                        ])->formInputs([
                            ''   => [
                                'type'      => 'hidden',
                                'name'      => 'id_cms_empleado',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "{{ uid }}"
                            ],
                            'Sedes'   => [
                                'type'      => 'select',
                                'name'      => 'sede',
                                'css'       => 'form-control required comboBoxSedeEdit',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'ngmodel'   => "sede",
                                'data'      => Models\Combos\ModelCombos::ComboSedes($userid)
                            ],
                            'Cédula'   => [
                                'type'      => 'number',
                                'name'      => 'cedula',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ cedula }}"
                            ],
                            'Nombres'   => [
                                'type'      => 'text',
                                'name'      => 'nombres',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ nombres }}"
                            ],
                            'Apellidos'   => [
                                'type'      => 'text',
                                'name'      => 'apellidos',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ apellidos }}"
                            ],
                            'Direccion'   => [
                                'type'      => 'text',
                                'name'      => 'direccion',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ direccion }}"
                            ],
                            'Telefono'   => [
                                'type'      => 'number',
                                'name'      => 'telefono',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ telefono }}"
                            ],
                            'Email'   => [
                                'type'      => 'text',
                                'name'      => 'email',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => "{{ correo }}",
                                'ngmodel'   => 'ng-model="email" ng-keyup="checkEmail()"'                                
                            ]
                        ])->setButtons([
                            'Actualizar'  => [
                                'type'  => 'submit',
                                'id'    => 'btn-edit-empleado',
                                'css'   => 'btn btn-primary pull-right',
                                'event' => 'ng-click="editaEmpleado()"',
                                'ngdisabled'=> 'ng-disabled="btnActualizaEmpleado"'
                            ],
                            'Cancelar'      => [
                                'type'  => 'reset',
                                'css'   => 'btn btn-default',
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detalles de Entrada y Salida -->
        <div class="col-lg-8" ng-show="showDetailsActivitys">
            <div class="row" ng-hide="showGraphics">
                <div class="col">
                    <div class="card bg-gradient-default">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Hoy</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">Entradas (<?php echo Models\Actividades\ModelActividades::visitasHoy($userid, 'visitasHoy', 'fecha_ingreso'); ?>)</span>
                                    <br>
                                    <span class="h2 font-weight-bold mb-0 text-white">Salidas (<?php echo Models\Actividades\ModelActividades::visitasHoy($userid, 'visitasHoy', 'fecha_salida'); ?>)</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="ni ni-badge"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <!-- <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap text-light">Desde el ultimo mes</span> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-gradient-default">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Ayer</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">Entradas (<?php echo Models\Actividades\ModelActividades::visitasAyer($userid, 'visitasAyer', 'fecha_ingreso'); ?>)</span>
                                    <br>
                                    <span class="h2 font-weight-bold mb-0 text-white">Salidas (<?php echo Models\Actividades\ModelActividades::visitasAyer($userid, 'visitasAyer', 'fecha_salida'); ?>)</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="ni ni-badge"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <!-- <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap text-light">Desde el ultimo mes</span> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-gradient-default">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Este Mes</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">Entradas (<?php echo Models\Actividades\ModelActividades::visitasMes($userid, 'esteMes', 'fecha_ingreso'); ?>)</span>
                                    <br>
                                    <span class="h2 font-weight-bold mb-0 text-white">Salidas (<?php echo Models\Actividades\ModelActividades::visitasMes($userid, 'esteMes', 'fecha_salida'); ?>)</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                        <i class="ni ni-badge"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <!-- <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap text-light">Desde el ultimo mes</span> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" ng-hide="showGraphics">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Entrada/Salida Empleados Detalles</h3>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-info btn-round btn-icon tooltip-message" data-toggle="tooltip" data-placement="top" title="Ver Graficas" ng-click="showResumeGraphics()"><i class="ni ni-chart-pie-35"></i></button>
                            <button class="btn btn-sm btn-default btn-round btn-icon tooltip-message" data-toggle="modal" data-target="#modal-notification" data-toggle="tooltip" data-placement="top" title="Generar PDF"><i class="fas fa-file-pdf"></i></button>
                            <!-- <a href="javascript:" class="btn btn-sm btn-default btn-round btn-icon tooltip-message" ng-click="generateReportPDF()" data-toggle="tooltip" data-placement="top" title="Descargar PDF">
                                <span class="btn-inner--icon"><i class="fas fa-file-pdf"></i></span>
                            </a> -->
                            <a href="javascript:" class="btn btn-sm btn-success btn-round btn-icon tooltip-message" data-toggle="modal" data-target="#modal-notification" data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Descargar Reporte de Visitas">
                                <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                            </a>
                            <a href="javascript:" class="btn btn-sm btn-danger btn-round btn-icon" ng-click="closeDetailsInOut()">
                                <span class="btn-inner--text"><i class="fa fa-times"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="ampliarActividades" class="table-responsive customScroll">
                    <table id="table-in-out" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th ng-show="cedulaCheck">Cédula</th>
                                <th ng-show="nombresCheck">Nombres</th>
                                <th ng-show="apellidosCheck">Apellidos</th>
                                <th ng-show="sedeCheck">ARL</th>
                                <th ng-show="sedeCheck">EPS</th>
                                <th ng-show="sedeCheck">Sede Asignada</th>
                                <th ng-show="sedeCheck">Sede Visitada</th>                                
                                <th ng-show="entradaCheck">Entrada</th>
                                <th ng-show="salidaCheck">Salida</th>
                                <th ng-show="salidaCheck">Duración</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-if="dataVisitasEmpleado.length == 0">
                                <td colspan="7" class="text-center">
                                    <span class="badge badge-default">No se registran Visitas</span>
                                </td>
                            </tr>
                            <tr ng-repeat="rows in dataVisitasEmpleado">
                                <td class="table-user" ng-show="cedulaCheck">
                                    <b>{{ rows.cedula_personal }}</b>
                                </td>
                                <td ng-show="nombresCheck">
                                    {{ rows.nombres_personal }}
                                </td>
                                <td ng-show="apellidosCheck">
                                    {{ rows.apellidos_personal }}
                                </td>
                                <td ng-show="apellidosCheck">
                                    {{ rows.nombre_arl }}
                                </td>
                                <td ng-show="apellidosCheck">
                                    {{ rows.nombre_eps }}
                                </td>
                                <td ng-show="sedeCheck">
                                    {{ rows.nombre_sede }}
                                </td>
                                <td ng-show="sedeCheck">
                                    {{ rows.sede_visitada }}
                                </td>
                                <td class="table-actions" ng-show="entradaCheck">
                                    <strong>{{ rows.fecha_ingreso }}</strong> <span class="badge badge-success"><i class="ni ni-bold-up"></i></span>
                                </td>
                                <td class="table-actions" ng-show="salidaCheck">
                                    <strong>{{ rows.fecha_salida }}</strong> <span class="badge badge-danger"><i class="ni ni-bold-down"></i></span>
                                </td>
                                <td ng-show="salidaCheck">
                                    {{ rows.fecha_ingreso | getTimeElapsed:rows.fecha_salida }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" ng-show="showGraphics">
                <div class="col-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="surtitle">Detalles por Sede</h6>
                                    <h5 class="h3 mb-0">Resumen de Entradas/Salidas</h5>
                                </div>
                                <div class="col text-right">
                                    <button class="btn btn-sm btn-danger" ng-click="closeShowGraphics()"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive customScroll">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Sede</th>
                                        <th scope="col">Entradas/Salidas (Personal)</th>
                                        <th scope="col">Entradas/Salidas (Sedes Visitadas)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-if="reporteVisitasSedes.length <= 0">
                                        <th colspan="3" class="text-center">No hay datos que mostrar</th>
                                    </tr>
                                    <tr ng-repeat="rows in reporteVisitasSedes">
                                        <th scope="row">{{ rows.sede }}</th>
                                        <td>{{ rows.sede_personal }}</td>
                                        <td>{{ rows.sede_visitada }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="surtitle">Detalles por Sede</h6>
                            <h5 class="h3 mb-0">Grafica Barras</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="surtitle">Detalles por Sede</h6>
                            <h5 class="h3 mb-0">Grafica Lineal</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chart-lines" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="surtitle">Detalles por Sede</h6>
                            <h5 class="h3 mb-0">Grafica Torta</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chart-pie" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="surtitle">Detalles por Sede (Visitada)</h6>
                            <h5 class="h3 mb-0">Grafica Barras</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chart-bars-visitada" class="chart-canvas-visitada"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="surtitle">Detalles por Sede (Visitada)</h6>
                            <h5 class="h3 mb-0">Grafica Torta</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chart-pie-visitada" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="surtitle">Detalles por Sede (Visitada)</h6>
                            <h5 class="h3 mb-0">Grafica Lineal</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chart-lines-visitada" class="chart-canvas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Entrada y Salida de Empleados -->
        <div class="col-lg-4" ng-hide="customReportInOut">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="h3 mb-0">Historico Entrada/Salida</h5>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#ampliarActividades" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-show="enableDetails" ng-click="seeDetailsInOut()" ng-if="dataResumenActividades.length > 0">Ampliar Detalle</a>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">
                    <input type="hidden" name="idEmpleado" value="{{ idEmpleado }}">
                </div>
                <div class="card-body customScroll {{ setScroll(dataResumenActividades) }}">
                    <div class="row align-items-center" ng-if="dataResumenActividades.length <= 0">
                        <span class="col-lg-12 text-center">No se muestran entradas/salidas</span>
                    </div>
                    <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed" ng-show="enableDetails" ng-repeat="rows in dataResumenActividades">
                        <div class="timeline-block">
                            <span class="timeline-step badge-success">
                                <i class="ni ni-bell-55"></i>
                            </span>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between pt-1">
                                    <div>
                                        <span class="text-muted text-sm font-weight-bold">Registro</span>
                                    </div>
                                    <div class="text-right">
                                        <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ rows.fecha_registro | timeAgo }}</small>
                                    </div>
                                </div>
                                <h6 class="text-sm mt-1 mb-0">Entrada / Salida</h6>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-info text-size-13">{{ rows.fecha_ingreso }}</span>
                                    <span class="badge badge-pill badge-danger text-size-13">{{ rows.fecha_salida | notDateRegister }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reporte Personalizado -->
        <div class="col-lg-4" ng-show="customReport">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="h3 mb-0">Reporte Personalizado</h5>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-sm btn-info tooltip-message" ng-click="seeDetailsInOut()" data-toggle="tooltip" data-placement="top" title="Recargar Reporte"><i class="fa fa-redo-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-header py-0">
                    <input type="hidden" name="idEmpleado" value="{{ idEmpleado }}">
                </div>
                <div class="card-body">
                    <form id="frm-generate-report" action="javascript:" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" name="sg.cedula_personal" id="cedula" type="checkbox" ng-checked="cedulaCheck" ng-model="cedulaCheck">
                                    <label class="custom-control-label" for="cedula">Cédula</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" name="sg.nombres_personal" id="nombres" type="checkbox" ng-checked="nombresCheck" ng-model="nombresCheck">
                                    <label class="custom-control-label" for="nombres">Nombres</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" name="sg.apellidos_personal" id="apellidos" type="checkbox" ng-checked="apellidosCheck" ng-model="apellidosCheck">
                                    <label class="custom-control-label" for="apellidos">Apellidos</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" name="ss.nombre_sede" id="sede" type="checkbox" ng-checked="sedeCheck" ng-model="sedeCheck">
                                    <label class="custom-control-label" for="sede">Sede</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" name="smp.fecha_ingreso" id="entrada" type="checkbox" ng-checked="entradaCheck" ng-model="entradaCheck">
                                    <label class="custom-control-label" for="entrada">Entrada</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" name="smp.fecha_salida" id="salida" type="checkbox" ng-checked="salidaCheck" ng-model="salidaCheck">
                                    <label class="custom-control-label" for="salida">Salida</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="desde">Empleado</label>
                                    <select name="sede" class="form-control comboBoxEmpleados" ng-model="empleadoOption">
                                        <option value="">Seleccione tu Empleado</option>
                                        <option value="*">Todos</option>
                                        <?php foreach (Models\Combos\ModelCombos::ComboEmpleados($userid) as $id => $prop) : ?>
                                            <option value="<?php echo $prop['id'] ?>"><?php echo $prop['prop']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="desde">Sede</label>
                                    <select name="sede" class="form-control comboBoxSedes" ng-model="sedeOption">
                                        <option value="">Seleccione la Sede</option>
                                        <option value="*">Todos</option>
                                        <?php foreach (Models\Combos\ModelCombos::ComboSedes($userid) as $id => $prop) : ?>
                                            <option value="<?php echo $prop['id'] ?>"><?php echo $prop['prop']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="desde">Entradas/Salidas</label>
                                    <select name="entradasalida" class="form-control entradaSalida" ng-model="entradaSalidaOption">
                                        <option value="">Escoje Entradas/Salidas</option>                                        
                                        <option value="smp.fecha_ingreso">Entradas</option>
                                        <option value="smp.fecha_salida">Salidas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="desde">Desde</label>
                                    <input ng-model="fechaDesde" class="form-control datepicker required" placeholder="Desde" type="date" name="desde" value="2019-07-01">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="hasta">Hasta</label>
                                    <input ng-model="fechaHasta" class="form-control datepicker required" placeholder="Hasta" type="date" name="hasta" value="2019-07-31">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger" ng-show="showMessageErrorReporte">Por favor, selecciona los criterios</div>
                            </div>
                            <div class="col">
                                <a href="#ampliarActividades" du-smooth-scroll du-scrollspy class="btn btn-default pull-right" ng-click="generateReporte()">Generar Reporte</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Detalles de Empleados -->
        <div id="todosLosEmpleados" class="col-lg-8" ng-show="showResumeEmpleados">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-0">Todos mis Empleados</h3>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-sm btn-success tooltip-message" ng-click="exportToExcel('empleados/readbyempresa', '#todos-mis-empleados thead tr th', { uid : uid })" data-toggle="tooltip" data-placement="top" title="Descargar Excel Empleados"><i class="fa fa-file-excel"></i></button>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-notification">Importar</button>
                            <a href="javascript:" class="btn btn-sm btn-danger btn-round btn-icon" ng-click="closeDetailsInOut()">
                                <span class="btn-inner--text"><i class="fa fa-times"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive customScroll {{ setScroll(dataEmpleados) }}" ng-class="{'removeScroll' : searchEmpleado.length > 0}">
                    <table id="todos-mis-empleados" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Sede</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-if="dataDetalleEmpleados.length == 0 && loadDetalleEmpleados == false">
                                <td colspan="7" class="text-center">
                                    <span class="badge badge-default">No se registran Empleados</span>
                                </td>
                            </tr>
                            <tr ng-if="loadDetalleEmpleados">
                                <td colspan="7" class="text-center">
                                    <span class="badge badge-default">Cargando...</span>
                                </td>
                            </tr>
                            <tr class="hover" ng-repeat="rows in dataDetalleEmpleados | filter:searchEmpleado" ng-click="showDetails(rows.id_sg_personal)">
                                <td class="table-user">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/empleado.png" class="avatar rounded-circle mr-3">
                                    <b>{{ rows.cedula_personal }}</b>
                                </td>
                                <td>{{ rows.nombres_personal }}</td>
                                <td>{{ rows.apellidos_personal }}</td>
                                <td>{{ rows.nombre_sede }}</td>
                                <td>{{ rows.correo_personal }}</td>
                                <td>{{ rows.telefono_personal }}</td>
                                <td>
                                    <span class="badge badge-pill badge-success" ng-if="rows.id_sg_estado == '1'">Activo</span>
                                    <span class="badge badge-pill badge-danger" ng-if="rows.id_sg_estado == '2'">Inactivo</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col align-self-center mt-4" ng-show="showPlanes">
            <div class="pricing card-group flex-column flex-md-row mb-3">
                <div class="card card-pricing border-0 text-center mb-4">
                    <div class="card-header bg-transparent">
                        <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">Plan Plus</h4>
                    </div>
                    <div class="card-body px-lg-7">
                        <div class="display-2">$650.000</div>
                        <span class="text-muted">Inversión</span>
                        <ul class="list-unstyled my-4">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-terminal"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">10.000 Actividades</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-pen-fancy"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">40 Registros promedio al Día</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">1 año</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">Terminal de Registro (App Android)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">Recepción ó Portería</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">App para Empleados o Residentes</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">CMS Gestión Administrativa, MultiUsuarios</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">Información en la Nube, Reportes y Graficas Gerenciales</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-primary mb-3">Adquirir Plan!</button>
                    </div>                    
                </div>
                <div class="card card-pricing bg-gradient-primary zoom-in shadow-lg rounded border-0 text-center mb-4">
                    <div class="card-header bg-transparent">
                        <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Plan Pro</h4>
                    </div>
                    <div class="card-body px-lg-7">
                        <div class="display-2 text-white">$1.550.000</div>
                        <span class="text-muted text-white">Inversión</span>
                        <ul class="list-unstyled my-4">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-terminal"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">10.000 Actividades</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-pen-fancy"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">40 Registros promedio al Día</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">1 año</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">Terminal de Registro (App Android)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">Recepción ó Portería</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">App para Empleados o Residentes</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">CMS Gestión Administrativa, MultiUsuarios</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2 text-white">Información en la Nube, Reportes y Graficas Gerenciales</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-primary mb-3">Adquirir Plan!</button>
                    </div> 
                    <div class="card-footer bg-transparent">
                        <a href="#!" class="text-white">Contact sales</a>
                    </div>
                </div>
                <div class="card card-pricing border-0 text-center mb-4">
                    <div class="card-header bg-transparent">
                        <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">Plan Premium</h4>
                    </div>
                    <div class="card-body px-lg-7">
                        <div class="display-2">$3.300.000</div>
                        <span class="text-muted">Inversión</span>
                        <ul class="list-unstyled my-4">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-terminal"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">10.000 Actividades</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-pen-fancy"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">40 Registros promedio al Día</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">1 año</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">Terminal de Registro (App Android)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">Recepción ó Portería</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">App para Empleados o Residentes</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">CMS Gestión Administrativa, MultiUsuarios</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                            <i class="fas fa-hdd"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="pl-2">Información en la Nube, Reportes y Graficas Gerenciales</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="button" class="btn btn-primary mb-3">Adquirir Plan!</button>
                    </div> 
                    <div class="card-footer">
                        <a href="#!" class="text-light">Request a demo</a>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<?php Core\Views::add('app.cms.dashboard.empresas.components.modals'); ?>