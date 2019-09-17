<div class="col-lg-4">
    <div id="formCreateApto">
        <div class="card" ng-show="detalleApto">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Detalle Apartamentos</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-click="openEditForm()" ng-show="opcionesApto"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-sm btn-default" ng-click="addResidente()" ng-show="opcionesApto"><i class="fa fa-user-plus"></i></button>
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
</div>