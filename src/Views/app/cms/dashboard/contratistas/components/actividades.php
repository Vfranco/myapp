<div class="col-lg-4" ng-hide="showFormCreateContratista">
    <div id="verIntegrantes">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Mis Contratistas</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-info btn-sm" ng-if="!enableSearchContratista" ng-click="showSearchContratista()" ng-show="resultDetallEmpresa"><i class="fa fa-search"></i></button>
                        <button class="btn btn-danger btn-sm" ng-if="enableSearchContratista" ng-click="hideSearchContratista()"><i class="fa fa-search-minus"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-header py-0" ng-show="enableSearchContratista">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchContratista" type="search" class="form-control" placeholder="Buscar" ng-disabled="dataEmpresas.length == 0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="text-center" ng-if="!resultDetallEmpresa">{{ showDetalleEmpresas }}</div>
                <ul class="list-group list-group-flush list my--3" ng-show="resultDetallEmpresa">
                    <li class="list-group-item px-0" ng-if="contratistas.length == 0">
                        <div class="text-center">No hay registros que mostrar</div>
                    </li>
                    <li class="list-group-item px-0 hover" ng-repeat="rows in contratistas | filter : searchContratista" ng-click="showOptionsContratista(rows.id_sg_personal_proveedor)">
                        <div class="row align-items-center" ng-hide="selectedIdContratista == rows.id_sg_personal_proveedor">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar rounded-circle">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/contratista.png" />
                                </a>
                            </div>
                            <div class="col-lg-6 ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ rows.contratista }}</a>
                                </h4>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-primary text-size-13">{{ rows.nombre_eps }}</span>
                                    <span class="badge badge-pill badge-primary text-size-13">{{ rows.nombre_arl }}</span>
                                    <span class="badge badge-pill badge-primary text-size-13">{{ rows.cedula_proveedor }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center">
                                <button type="button" class="btn btn-sm btn-danger" ng-if="seeDetallesContratista == rows.id_sg_personal_proveedor" ng-click="selectItemContratista(rows.id_sg_personal_proveedor)"><i class="fa fa-trash"></i></button>
                                <a href="javascript:" class="btn btn-sm btn-default" ng-if="seeDetallesContratista == rows.id_sg_personal_proveedor" ng-click="requestDetailsContratista(rows.id_sg_personal_proveedor)"><i class="fa fa-{{loadFormEditContratista}}"></i></a>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-show="selectedIdContratista == rows.id_sg_personal_proveedor">
                            <div class="col">
                                <div class="alert alert-{{typeAlert}} text-center" ng-if="muestraErrorEmpresa">{{ mensajeErrorEmpresa }}</div>
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Contratista ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deleteContratista(rows.id_sg_personal_proveedor, rows.id_sg_mi_proveedor)">{{btnEliminaContratista}}</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeleteContratista(rows.id_sg_personal_proveedor)">No, Cancelalo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>