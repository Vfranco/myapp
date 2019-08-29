<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="h3 mb-0">Mis Apartamentos</h5>
                <!-- <span class="badge badge-info badge-md">{{ result.length }} <span ng-if="searchEmpleado.length > 0">Coincidencia</span></span> -->
                <!-- <span class="badge badge-success badge-md" ng-if="deleteSuccess">{{ reloadingEmpleados }}</span> -->
            </div>
            <div class="col d-flex justify-content-center">
                <a href="javascript:" class="btn btn-sm btn-info" ng-hide="showCreateForm">Todos</a>
                <a href="javascript:" class="btn btn-sm btn-primary" ng-hide="showCreateForm">Añadir</a>
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
            <li class="list-group-item px-0 hover" ng-click="showDetails(rows.id_cms_empleado)" ng-show="loadDataEmpleados" ng-repeat="rows in dataEmpleados | filter:searchEmpleado as result">
                <div class="row align-items-center" ng-hide="selectedId == rows.id_cms_empleado">
                    <div class="col-auto">
                        <a href="javascript:" class="avatar rounded-circle">
                            <img src="<?php echo BASE_URL; ?>Content/assets/img/empleado.png" />
                        </a>
                    </div>
                    <div class="col ml--2">
                        <h4 class="mb-0">
                            <a href="javascript:">{{ rows.empleado }}</a>
                        </h4>
                        <span class="text-success" ng-if="rows.cms_estados_id_cms_estado == '1'">●</span>
                        <small ng-if="rows.cms_estados_id_cms_estado == '1'">Activo</small>
                        <span class="text-danger" ng-if="rows.cms_estados_id_cms_estado == '2'">●</span>
                        <small ng-if="rows.cms_estados_id_cms_estado == '2'">Inactivo</small>
                        <br>
                        <small><a href="mailto:{{rows.email_empleado}}">{{ rows.email_empleado }}</a></small>
                        <br>
                        <small>{{rows.nombre_sede}}</small>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <a href="https://api.whatsapp.com/send?phone=57{{rows.telefono_empleado}}" target="_blank" class="btn btn-sm btn-success" ng-if="seeDetails == rows.id_cms_empleado" ng-hide="rows.cms_estados_id_cms_estado == '2'"><i class="fa fa-comment"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" ng-if="seeDetails == rows.id_cms_empleado" ng-click="selectItem(rows.id_cms_empleado)"><i class="fa fa-trash"></i></button>
                        <a href="#verEmpleados" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-if="seeDetails == rows.id_cms_empleado" ng-click="requestDetails(rows.id_cms_empleado)">Ver</a>
                    </div>
                </div>
                <!-- <div class="row align-items-center" ng-class="{'bounce animated' : selectedId == rows.id_cms_empleado}" ng-show="selectedId == rows.id_cms_empleado">
                    <div class="col">
                        <div class="row alert alert-danger">
                            <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Empleado ?</span></div>
                            <div class="col text-center">
                                <button class="btn btn-sm btn-danger" ng-click="deleteProcessEmpleado(rows.id_cms_empleado, rows.nombres_empleado, rows.apellidos_empleado)">Si, Borralo</button>
                            </div>
                            <div class="col text-center">
                                <button class="btn btn-sm btn-warning" ng-click="cancelProcess(rows.id_cms_empleado)">No, Cancelalo</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </li>
            <!-- <li ng-hide="searchEmpleado.length == 0" ng-if="result.length == 0" class="list-group-item px-0 hover" ng-model="result">
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
            </li> -->
        </ul>
    </div>
</div>