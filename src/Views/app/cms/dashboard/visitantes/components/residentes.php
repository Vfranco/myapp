<div class="col-lg-4" ng-hide="panelApto">
    <div id="formCreateApto">
        <div class="card" ng-show="detalleApto">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Detalle Apartamentos</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-click="openEditForm()" ng-show="opcionesApto"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-sm btn-default" ng-click="addResidente()" ng-show="opcionesApto"><i class="fa fa-th-list"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="cancelEditApto()" ng-show="opcionesApto"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row align-items-center" ng-hide="resultDataApto">
                    <div class="col-lg-12 text-center">{{ muestraMensajeCarga }}</div>
                </div>
                <div class="row" ng-show="resultDataApto">
                    <div class="col text-center">
                        <img src="<?php echo BASE_URL ?>Content/assets/img/apto_real.jpg" class="rounded img-fluid">
                    </div>
                    <div class="col">
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Torre
                            </span>
                            <div class="h3">{{ dataDetalles.nombre_torre }}</div>
                        </div>
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Piso
                            </span>
                            <div class="h3">{{ dataDetalles.piso_apto }}</div>
                        </div>
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Apartamento
                            </span>
                            <div class="h3">{{ dataDetalles.numero_apto }}</div>
                        </div>
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Estado
                            </span>
                            <div class="h3">{{ (dataDetalles.id_sg_estado == '4') ? 'Arrendando' : 'Desocupado' }}</div>
                        </div>
                        <div class="my-4">
                            <a href="javascript:" du-smooth-scroll du-scrollspy class="btn btn-sm btn-outline-default">Ver Residente</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- creacion Apto -->
    <div id="formCreateApto">
        <div class="card" ng-show="estadoFormApto">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">{{ (showEditFormApto) ? 'Actualizar Apartamento' : 'Registrar Apartamento' }}</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-danger" ng-click="closeAddApto()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <alert-message type="{{type}}" message="{{ messageErrorApto }}" ng-show="showMessageApto"></alert-message>
                <form id="frm-create-apto" action="javascript:" method="post" autocomplete="off">
                    <div style="display: none;">
                        <label class=""></label>
                        <input type="hidden" name="idUser" value="{{uid}}" autocomplete="off">
                    </div>
                    <div style="display: none;" ng-if="showEditFormApto">
                        <label class=""></label>
                        <input type="hidden" name="idApto" value="{{idApto}}" autocomplete="off" ng-model="idApto">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Torre</label>
                        <select id="torreApto" class="form-control required" name="torre" ng-change="openAddTorre()" ng-model="torre">
                            <option value="2" ng-if="dataTorres.length >= 0">Añadir Torre</option>
                            <option value="0" ng-if="dataTorres.length >= 0">Añadir Residente</option>
                            <option value="" selected>Selecciona tu Torre</option>
                            <option value="{{items.id_sg_torre}}" ng-repeat="items in dataTorres">{{ items.nombre_torre }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Estado Apartamento</label>
                        <select id="estadoApto" class="form-control required" name="estado" ng-model="estadoapto">
                            <option value="0" selected>Escoge el estado</option>
                            <option value="4">Arrendado</option>
                            <option value="5">Desocupado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Piso</label>
                        <input type="text" name="pisoApartamento" class="form-control required" ng-model="pisoapto" value="{{ pisoapto }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Numero de Apartamento</label>
                        <input type="text" name="numeroApartamento" class="form-control required" ng-model="nombreapto" value="{{ nombreapto }}">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createApto()" ng-if="!showEditFormApto" ng-disabled="btnCreateApto != 'Registrar'">{{ btnCreateApto }}</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-click="updateApto(idApto)" ng-if="showEditFormApto" ng-disabled="btnActualizaApto != 'Actualizar'">{{ btnActualizaApto }}</button>
                        <button type="reset" class="btn btn-default">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Apto -->
    <!-- formTorre -->
    <div class="formCreaTorres">
        <div class="card" ng-show="estadoFormTorre">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Registra tu Torre</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-danger" ng-click="closeAddTorre()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <alert-message type="{{type}}" message="{{ messageErrorTorre }}" ng-show="showMessageTorre"></alert-message>
                <form id="frm-create-torre" action="javascript:" method="post" autocomplete="off">
                    <div style="display: none;">
                        <label class=""></label>
                        <input type="hidden" name="idUser" class="" value="{{uid}}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Nombre de la Torre</label>
                        <input type="text" name="nombreTorre" class="form-control required">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createTorre()" ng-disabled="btnCreateTorre !== 'Registrar Torre'">{{ btnCreateTorre }}</button>
                        <button type="reset" class="btn btn-default">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- endTorre -->
    <!-- crateResidente -->
    <div id="formCreaResidente">
        <div class="card" ng-show="estadoFormResidente">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Registra Residente</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-danger" ng-click="closeAddResidente()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <alert-message type="{{type}}" message="{{ messageErrorResidente }}" ng-show="showMessageResidente"></alert-message>
                <form id="frm-create-residente" action="javascript:" method="post" autocomplete="off">
                    <input type="hidden" name="uid" value="{{uid}}">
                    <div class="form-group">
                        <label class="form-control-label">Cedula</label>
                        <input type="number" name="cedula" class="form-control required">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Nombres</label>
                        <input type="text" name="nombres" class="form-control required">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control required">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Correo</label>
                        <input type="text" ng-keyup="checkEmail()" name="correo" class="form-control required" ng-model="correo">
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createResidente()" ng-disabled="btnDisableCreate">{{ btnCreateResidente }}</button>
                        <button type="reset" class="btn btn-default">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- endCreateResidente -->

    <!-- listadoResidentes -->
    <div id="detalleResidentes">
        <div class="card" ng-show="showDetallesResidente">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Mis Residentes</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-warning" ng-click="openFormResidente()" ng-show="showDetallesResidente"><i class="fa fa-user-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="closeListResidente()" ng-show="showDetallesResidente"><i class="fa fa-times"></i></button>
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
                            <input ng-model="searchResidente" type="search" class="form-control" placeholder="Buscar Residente" ng-disabled="!loadDataResidentes">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body customScroll {{ setScroll(dataResidentes) }}" ng-class="{'removeScroll' : searchResidente.length > 0}">
                <!-- List group -->
                <ul class="list-group list-group-flush list my--3">
                    <li class="list-group-item px-0" ng-if="!loadDataResidentes">
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
                    <li class="list-group-item px-0 hover" ng-click="mostrarDetalles(rows.id_sg_residente)" ng-show="loadDataResidentes" ng-repeat="rows in dataResidentes">
                        <div class="row align-items-center" ng-hide="selectIdResidente == rows.id_sg_residente || selectIdResidenteAsignar == rows.id_sg_residente">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar rounded-circle">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/inquilino.png" />
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ rows.nombres_residente }} {{ rows.apellidos_residente }}</a>
                                </h4>                                
                                <small>{{ rows.cedula_residente }}</small><br>
                                <small><a href="javascript:">{{ rows.correo_residente }}</a></small>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <button type="button" class="btn btn-sm btn-danger" ng-if="verDetalle == rows.id_sg_residente" ng-click="selectResidente(rows.id_sg_residente)"><i class="fa fa-trash"></i></button>
                                <a href="javascript:" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-if="verDetalle == rows.id_sg_residente" ng-click="asignaResidente(rows.id_sg_residente)"><i class="ni ni-key-25"></i></a>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-show="selectIdResidente == rows.id_sg_residente">
                            <div class="col">
                                <alert-message type="{{type}}" message="{{ messageDeleteResidente }}" ng-show="showmessageDeleteResidente"></alert-message>
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Residente ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deleteProcessResidente(rows.id_sg_residente)">Si, Borralo</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeleteResidente()">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-show="selectIdResidenteAsignar == rows.id_sg_residente">
                            <div class="col">
                                <alert-message type="{{type}}" message="{{ messageAsignaResidente }}" ng-show="showMessageAsignaResidente"></alert-message>
                                <div class="row alert alert-default">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Deseas asignar a este Residente al Apto {{ nombreapto }} ?</span></div>
                                    <div class="col text-center">
                                        <form id="frm-asigna-residente" action="javscript:" method="post">
                                            <input type="hidden" class="required" name="idTorre" value="{{ torre }}">
                                            <input type="hidden" class="required" name="idApto" value="{{ idApto }}">                                            
                                            <input type="hidden" class="required" name="uid" value="{{ uid }}">
                                            <button class="btn btn-sm btn-primary" ng-click="processAsignacion(rows.id_sg_residente)" ng-disabled="btnAsignacion != 'Si, Asignalo'">{{ btnAsignacion }}</button>
                                        </form>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="cancelAsignacion()">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end listadoResidentes -->
    <!-- listadoResidentes -->
    <div id="detalleResidentes">
        <div class="card" ng-show="showDetallesTorres">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Mis Torres</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-primary" ng-click="openAddTorreList()" ng-show="showDetallesTorres"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="closeListTorre()" ng-show="showDetallesTorres"><i class="fa fa-times"></i></button>
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
                            <input ng-model="searchTorre" type="search" class="form-control" placeholder="Buscar Torre" ng-disabled="!loadDataTorres">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body customScroll {{ setScroll(dataTorres) }}" ng-class="{'removeScroll' : searchTorre.length > 0}">
                <!-- List group -->
                <ul class="list-group list-group-flush list my--3">
                    <li class="list-group-item px-0" ng-if="!loadDataTorres">
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
                    <li class="list-group-item px-0 hover" ng-click="mostrarBotonesTorre(rows.id_sg_torre)" ng-show="loadDataTorres" ng-repeat="rows in dataTorres">
                        <div class="row align-items-center" ng-hide="selectIdTorre == rows.id_sg_torre">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar rounded-square">
                                    <img src="<?php echo BASE_URL; ?>Content/assets/img/torre.png" />
                                </a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ rows.nombre_torre }}</a>
                                </h4>                                
                                <small>{{ rows.fecha_registro | timeElapsed }}</small><br>                                
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-sm btn-danger" ng-if="verBotones == rows.id_sg_torre" ng-click="selectTorre(rows.id_sg_torre)"><i class="fa fa-trash"></i></button>                                
                            </div>
                        </div>
                        <div class="row align-items-center" ng-show="selectIdTorre == rows.id_sg_torre">
                            <div class="col">
                                <alert-message type="{{type}}" message="{{ messageDeleteTorre }}" ng-show="showMessageDeleteTorre"></alert-message>
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Apartamento ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deleteProcessTorre(rows.id_sg_torre)">Si, Borralo</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeleteTorre()">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end listadoResidentes -->
</div>