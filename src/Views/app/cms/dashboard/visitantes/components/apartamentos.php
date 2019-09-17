<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Mis Apartamentos</h5>                    
                </div>
                <div class="col d-flex">
                    <a href="javascript:" class="btn btn-sm btn-primary ml-8" ng-click="openAddApto()">Crear Aptos</a>
                    <!-- <a href="javascript:" class="btn btn-sm btn-primary" ng-click="openAddTorre()">Crear Torres</a> -->
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
                        <input ng-model="searchApartamento" type="search" class="form-control" placeholder="Buscar Empleado" ng-disabled="!loadDataApartamentos">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body customScroll {{ setScroll(dataApartamentos) }}" ng-class="{'removeScroll' : searchApartamento.length > 0}">
            <!-- List group -->
            <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0" ng-if="!loadDataApartamentos">
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
                <li class="list-group-item px-0 hover" ng-click="mostrarDetalles(rows.id_sg_apto)" ng-show="loadDataApartamentos" ng-repeat="rows in dataApartamentos">
                    <div class="row align-items-center" ng-hide="selectIdApto == rows.id_sg_apto">
                        <div class="col-auto">
                            <a href="javascript:" class="avatar rounded-circle">
                                <img src="<?php echo BASE_URL; ?>Content/assets/img/residente.png" />
                            </a>
                        </div>
                        <div class="col ml--2">
                            <h4 class="mb-0">
                                <a href="javascript:">Apto ({{ rows.numero_apto }})</a>
                            </h4>
                            <span class="text-success" ng-if="rows.id_sg_estado == '4'">●</span>
                            <small ng-if="rows.id_sg_estado == '4'">Arrendado</small>
                            <span class="text-danger" ng-if="rows.id_sg_estado == '5'">●</span>
                            <small ng-if="rows.id_sg_estado == '5'">Descocupado</small>
                            <br>
                            <small><a href="javascript:">Piso {{ rows.piso_apto }}</a></small>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-sm btn-danger" ng-if="verDetalle == rows.id_sg_apto" ng-click="selectItem(rows.id_sg_apto)"><i class="fa fa-trash"></i></button>
                            <a href="javascript:" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-if="verDetalle == rows.id_sg_apto" ng-click="requestDetalles(rows.id_sg_apto)">Ver</a>
                        </div>
                    </div>
                    <div class="row align-items-center" ng-show="selectIdApto == rows.id_sg_apto">
                        <div class="col">
                            <alert-message type="{{type}}" message="{{ messageDeleteApto }}" ng-show="showMessageDeleteApto"></alert-message>
                            <div class="row alert alert-danger">
                                <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Apartamento ?</span></div>
                                <div class="col text-center">
                                    <button class="btn btn-sm btn-danger" ng-click="deleteProcessApto(rows.id_sg_apto)">Si, Borralo</button>
                                </div>
                                <div class="col text-center">
                                    <button class="btn btn-sm btn-warning" ng-click="cancelDelete()">No, Cancelalo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>            
        </div>
    </div>
</div>