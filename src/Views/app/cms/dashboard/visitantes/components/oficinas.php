<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">                
                <h5 class="h3 mb-0">Mis Oficinas</h5>                
            </div>
            <div class="col d-flex justify-content-center">                
                <a href="javascript:" class="btn btn-sm btn-info" ng-hide="showCreateForm">Todos</a>
                <a href="javascript:" class="btn btn-sm btn-primary" ng-hide="showCreateForm" ng-click="addOffice()">Añadir</a>
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
                    <input ng-model="searchResource" type="search" class="form-control" placeholder="Buscar" ng-disabled="!loadDataResource">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body customScroll {{ setScroll(dataResource) }}" ng-class="{'removeScroll' : searchResource.length > 0}">
        <!-- List group -->
        <ul class="list-group list-group-flush list my--3">
            <li class="list-group-item px-0" ng-if="!loadDataResource">
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
            <li class="list-group-item px-0 hover" ng-click="showDetails(rows.id_sg_oficina)" ng-show="loadDataResource" ng-repeat="rows in dataResource | filter:searchResource as result">
                <div class="row align-items-center" ng-hide="selectedIdResource == rows.id_sg_oficina">
                    <div class="col-auto">
                        <a href="javascript:" class="avatar rounded-circle">
                            <img src="<?php echo BASE_URL; ?>Content/assets/img/oficinas.png" />
                        </a>
                    </div>
                    <div class="col ml--2">
                        <h4 class="mb-0">
                            <a href="javascript:">{{ rows.area }}</a>
                        </h4>
                        <span class="text-success" ng-if="rows.id_sg_estado == '1'">●</span>
                        <small ng-if="rows.id_sg_estado == '1'">Activo</small>
                        <span class="text-danger" ng-if="rows.id_sg_estado == '2'">●</span>
                        <small ng-if="rows.id_sg_estado == '2'">Inactivo</small>
                        <br>
                        <small><a href="javascript:">Piso {{ rows.piso_nivel }} N {{rows.piso_nivel}}</a></small>
                    </div>
                    <div class="col d-flex justify-content-center">                        
                        <button type="button" class="btn btn-sm btn-danger" ng-if="seeDetails == rows.id_sg_oficina" ng-click="selectItem(rows.id_sg_oficina)"><i class="fa fa-trash"></i></button>
                        <a href="#verOficinas" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-if="seeDetails == rows.id_sg_oficina" ng-click="requestDetails(rows.id_sg_oficina)">Ver</a>
                    </div>
                </div>
                <div class="row align-items-center" ng-class="{'bounce animated' : selectedIdResource == rows.id_sg_oficina}" ng-show="selectedIdResource == rows.id_sg_oficina">
                    <div class="col">
                        <div class="row alert alert-danger">
                            <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Empleado ?</span></div>
                            <div class="col text-center">
                                <button class="btn btn-sm btn-danger" ng-click="deleteProcessOficina(rows.id_sg_oficina)">Si, Borralo</button>
                            </div>
                            <div class="col text-center">
                                <button class="btn btn-sm btn-warning" ng-click="cancelDelete(rows.id_sg_oficina)">No, Cancelalo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li ng-hide="searchResource.length == 0" ng-if="result.length == 0" class="list-group-item px-0 hover" ng-model="result">
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