<div class="row">    
    <!-- Eps -->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">EPS</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-click="showPanelBusqueda()" ng-hide="showBusquedaEps"><i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="hidePanelBusqueda()" ng-show="showBusquedaEps"><i class="fa fa-search-minus"></i></button>
                        <button class="btn btn-sm btn-info" ng-hide="muestraFormEps" ng-click="showFormEps()"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-show="muestraFormEps" ng-click="hideFormEps()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-header py-0" ng-show="showBusquedaEps">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchEps" type="search" class="form-control" placeholder="Buscar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body customScroll {{ setScroll(eps) }}" ng-class="{'removeScroll' : searchEps.length > 0}">
                <alert-message type="{{type}}" message="{{message}}" ng-if="isEmptyEps"></alert-message>
                <ul class="list-group list-group-flush list my--3" ng-hide="muestraFormEps">
                    <li class="list-group-item px-0 hover" ng-if="eps.length == 0">
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <small>No hay EPS</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 hover" ng-if="eps.length > 0" ng-repeat="items in eps | filter :searchEps" ng-click="showOptionsList(items.id_sg_eps)">
                        <div class="row align-items-center" ng-hide="selectedRow == items.id_sg_eps">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar rounded-circle">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/eps.png" />
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ items.nombre_eps }}</a>
                                </h4>
                                <span class="text-{{ (items.id_sg_estado == 1) ? 'success' : 'danger' }}" ng-if="true">●</span>
                                <small ng-if="items.id_sg_estado == 1">Activa</small><br>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <button type="button" class="btn btn-sm btn-danger" ng-if="seeOptions == items.id_sg_eps" ng-click="selectRowDeleteEps(items.id_sg_eps)"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-sm btn-default" ng-if="seeOptions == items.id_sg_eps" ng-click="selectRowEditEps(items.id_sg_eps, items.nombre_eps)"><i class="fa fa-pen"></i></button>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-if="selectedRow == items.id_sg_eps">
                            <div class="col">
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar esta EPS ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deleteEps(items.id_sg_eps)">Si, Borrala</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeleteEps()">No, Cancelalo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <form name="eps" action="javascript:" autocomplete="off" ng-if="muestraFormEps">
                    <input ng-model="formEps.uid" type="hidden" name="uid" value="{{uid}}" ng-init="formEps.uid = this.uid">
                    <input ng-model="formEps.idEps" type="hidden" name="idEps" value="{{idEps}}">
                    <div class="form-group">
                        <label class="form-control-label">Nombre EPS</label>
                        <input ng-model="formEps.nombreEps" type="text" name="nombreEps" class="form-control required" ng-init="formEps.nombreEps = editEps">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createEps()" ng-if="formEps.idEps == 0">Registrar EPS</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-click="editEpsForm()" ng-if="formEps.idEps != 0">Actualizar EPS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Eps -->
    <!-- ARL -->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">ARL</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-click="showPanelBusquedaArl()" ng-hide="showBusquedaArl"><i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="hidePanelBusquedaArl()" ng-show="showBusquedaArl"><i class="fa fa-search-minus"></i></button>
                        <button class="btn btn-sm btn-info" ng-hide="muestraFormArl" ng-click="showFormArl()"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-show="muestraFormArl" ng-click="hideFormArl()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-header py-0" ng-show="showBusquedaArl">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchArl" type="search" class="form-control" placeholder="Buscar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body customScroll {{ setScroll(arl) }}" ng-class="{'removeScroll' : searchArl.length > 0}">
                <alert-message type="{{type}}" message="{{message}}" ng-if="isEmptyArl"></alert-message>
                <ul class="list-group list-group-flush list my--3" ng-hide="muestraFormArl">
                    <li class="list-group-item px-0 hover" ng-if="arl.length == 0">
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <small>No hay ARL</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 hover" ng-if="arl.length > 0" ng-repeat="items in arl | filter : searchArl" ng-click="showOptionsArl(items.id_sg_arl)">
                        <div class="row align-items-center" ng-hide="selectedRowArl == items.id_sg_arl">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/arl.png" />
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ items.nombre_arl }}</a>
                                </h4>
                                <span class="text-{{ (items.id_sg_estado == 1) ? 'success' : 'danger' }}" ng-if="true">●</span>
                                <small ng-if="items.id_sg_estado == 1">Activa</small><br>
                            </div>
                            <div class="col text-right mr-3">
                                <button type="button" class="btn btn-sm btn-danger" ng-if="seeOptionsArl == items.id_sg_arl" ng-click="selectRowDeleteArl(items.id_sg_arl)"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-sm btn-default" ng-if="seeOptionsArl == items.id_sg_arl" ng-click="selectRowEditArl(items.id_sg_arl, items.nombre_arl)"><i class="fa fa-pen"></i></button>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-if="selectedRowArl == items.id_sg_arl">
                            <div class="col">
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar esta Torre ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deleteArl(items.id_sg_arl)">Si, Borrala</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeleteArl()">No, Cancelalo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <form name="arl" action="javascript:" autocomplete="off" ng-if="muestraFormArl">
                    <input ng-model="formArl.uid" type="hidden" name="uid" value="{{uid}}" ng-init="formArl.uid = this.uid">
                    <input ng-model="formArl.idArl" type="hidden" name="idArl" value="{{idArl}}">
                    <div class="form-group">
                        <label class="form-control-label">Nombre ARL</label>
                        <input ng-model="formArl.nombreArl" type="text" name="nombreArl" class="form-control required" ng-init="formArl.nombreArl = nombreArl">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createArl()" ng-if="formArl.idArl == 0">Registrar ARL</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-click="updateArl()" ng-if="formArl.idArl != 0">Actualizar ARL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end ARL -->
    <!-- personalControl -->
    <div class="col-lg-6">
        <?php Core\Views::add('app.cms.dashboard.configuracion.components.control', ['id_sg_usuario' => $id_sg_usuario]); ?>
    </div>
    <!-- end personalControl -->
    <!-- Cargos -->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Cargos</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-click="showPanelBusquedaCargo()" ng-hide="showBusquedaCargo"><i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="hidePanelBusquedaCargo()" ng-show="showBusquedaCargo"><i class="fa fa-search-minus"></i></button>
                        <button class="btn btn-sm btn-info" ng-hide="muestraFormCargo" ng-click="showFormCargo()"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-show="muestraFormCargo" ng-click="hideFormCargo()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-header py-0" ng-show="showBusquedaCargo">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchCargo" type="search" class="form-control" placeholder="Buscar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body customScroll {{ setScroll(cargos) }}" ng-class="{'removeScroll' : searchCargo.length > 0}">
                <alert-message type="{{type}}" message="{{message}}" ng-if="isEmptyCargo"></alert-message>
                <ul class="list-group list-group-flush list my--3" ng-hide="muestraFormCargo">
                    <li class="list-group-item px-0 hover" ng-if="cargos.length == 0">
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <small>No hay cargos</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 hover" ng-if="cargos.length > 0" ng-repeat="items in cargos | filter : searchCargo" ng-click="showOptionsCargo(items.id_sg_cargo)">
                        <div class="row align-items-center" ng-hide="selectedRowCargo == items.id_sg_cargo">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar rounded-circle">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/cargo.png" />
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ items.nombre_cargo }}</a>
                                </h4>
                                <span class="text-{{ (items.id_sg_estado == 1) ? 'success' : 'danger' }}" ng-if="true">●</span>
                                <small ng-if="items.id_sg_estado == 1">Activa</small><br>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <button type="button" class="btn btn-sm btn-danger" ng-if="seeOptionsCargo == items.id_sg_cargo" ng-click="selectRowDeleteCargo(items.id_sg_cargo)"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-sm btn-default" ng-if="seeOptionsCargo == items.id_sg_cargo" ng-click="selectRowEditCargo(items.id_sg_cargo, items.nombre_cargo)"><i class="fa fa-pen"></i></button>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-if="selectedRowCargo == items.id_sg_cargo">
                            <div class="col">
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar esta EPS ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deleteCargo(items.id_sg_cargo)" ng-disabled="btnDeleteCargo != 'Si, Borralo'">{{ btnDeleteCargo }}</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeleteCargo()">No, Cancelalo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <form name="cargo" action="javascript:" autocomplete="off" ng-if="muestraFormCargo">
                    <input ng-model="formCargos.uid" type="hidden" name="uid" value="{{uid}}" ng-init="formCargos.uid = this.uid">
                    <input ng-model="formCargos.idCargo" type="hidden" name="idCargo" value="{{formCargos.idCargo}}">
                    <div class="form-group">
                        <label class="form-control-label">Nombre Cargo</label>
                        <input ng-model="formCargos.nombreCargo" type="text" name="nombreCargo" class="form-control required" ng-init="formCargos.nombreCargo = editCargo">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createCargo()" ng-if="formCargos.idCargo == 0">Registrar Cargo</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-click="updateCargo()" ng-if="formCargos.idCargo != 0">Actualizar Cargo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Cargos -->
    <!-- Actividades -->
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Actividades</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-click="showPanelBusquedaActividad()" ng-hide="showBusquedaActividad"><i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="hidePanelBusquedaActividad()" ng-show="showBusquedaActividad"><i class="fa fa-search-minus"></i></button>
                        <button class="btn btn-sm btn-info" ng-hide="muestraFormActividad" ng-click="showFormActividad()"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-show="muestraFormActividad" ng-click="hideFormActividad()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-header py-0" ng-show="showBusquedaActividad">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchActividad" type="search" class="form-control" placeholder="Buscar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body customScroll {{ setScroll(actividades) }}" ng-class="{'removeScroll' : searchActividad.length > 0}">
                <alert-message type="{{type}}" message="{{message}}" ng-if="isEmptyActividad"></alert-message>
                <ul class="list-group list-group-flush list my--3" ng-hide="muestraFormActividad">
                    <li class="list-group-item px-0 hover" ng-if="actividades.length == 0">
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <small>No hay actividades</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 hover" ng-if="actividades.length > 0" ng-repeat="items in actividades | filter : searchActividad" ng-click="showOptionsActividad(items.id_sg_tipo_de_actividad)">
                        <div class="row align-items-center" ng-hide="selectedRowActividad == items.id_sg_tipo_de_actividad">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar rounded-square">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/actividad.png" />
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ items.nombre_actividad }}</a>
                                </h4>
                                <span class="text-{{ (items.id_sg_estado == 1) ? 'success' : 'danger' }}" ng-if="true">●</span>
                                <small ng-if="items.id_sg_estado == 1">Activa</small><br>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <button type="button" class="btn btn-sm btn-danger" ng-if="seeOptionsActividad == items.id_sg_tipo_de_actividad" ng-click="selectRowDeleteActividad(items.id_sg_tipo_de_actividad)"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-sm btn-default" ng-if="seeOptionsActividad == items.id_sg_tipo_de_actividad" ng-click="selectRowEditActividad(items.id_sg_tipo_de_actividad, items.nombre_actividad)"><i class="fa fa-pen"></i></button>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-if="selectedRowActividad == items.id_sg_tipo_de_actividad">
                            <div class="col">
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar esta EPS ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deleteActividad(items.id_sg_tipo_de_actividad)" ng-disabled="btnDeleteActividad != 'Si, Borralo'">{{ btnDeleteActividad }}</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeleteActividad()">No, Cancelalo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <form name="actividad" action="javascript:" autocomplete="off" ng-if="muestraFormActividad">
                    <input ng-model="formActividad.uid" type="hidden" name="uid" value="{{uid}}" ng-init="formActividad.uid = this.uid">
                    <input ng-model="formActividad.idActividad" type="hidden" name="idActividad" value="{{formActividad.idActividad}}">
                    <div class="form-group">
                        <label class="form-control-label">Nombre Actividad</label>
                        <input ng-model="formActividad.nombreActividad" type="text" name="nombreActividad" class="form-control required" ng-init="formActividad.nombreActividad = editActividad">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createActividad()" ng-if="formActividad.idActividad == 0">Registrar Actividad</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-click="updateActividad()" ng-if="formActividad.idActividad != 0">Actualizar Actividad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Actividades -->
</div>
