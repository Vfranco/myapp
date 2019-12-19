<!-- detalle contratistas -->
<div class="col-lg-4" ng-show="showDetalleContratista">
    <div id="verIntegrantes">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Detalle Empresa</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-info btn-sm" ng-show="resultDetallEmpresa" ng-click="enableFormToEdit()"><i class="fa fa-{{ loadFormEdit }}"></i></button>
                        <button class="btn btn-danger btn-sm" ng-show="resultDetallEmpresa" ng-click="hideDetallesEmpresa()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>            
            <div class="card-body">
                <div class="text-center" ng-hide="resultDetallEmpresa">{{ showDetalleEmpresas }}</div>
                <div class="row" ng-show="resultDetallEmpresa">
                    <div class="col text-center">
                        <img src="<?php echo BASE_URL ?>Content/assets/img/oficina_real.jpg" class="rounded img-fluid">
                    </div>
                    <div class="col">
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Nit
                            </span>
                            <div class="h3">{{ nit }}</div>
                        </div>
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Empresa
                            </span>
                            <div class="h3">{{ nombre }}</div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end detalle contratistas -->

<!-- proveedor -->
<div class="col-lg-8" ng-show="showFormCreateContratista">
    <div id="verIntegrantes">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Crear Contratista</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-danger" ng-click="hideFormCreateEmpresa()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <alert-message type="{{type}}" message="{{message}}" ng-show="isEmptyContratista"></alert-message>
                <form name="contratista" action="javascript:" method="post" autocomplete="off">
                    <input ng-model="formContratista.uid" type="hidden" name="uid" value="{{uid}}" ng-init="formContratista.uid = uid">
                    <input ng-model="formContratista.idcontratista" type="hidden" name="idcontratista" value="{{formContratista.idcontratista}}" ng-init="formContratista.idcontratista = 0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Empresa del Contratista</label>
                                <select name="empresa" class="form-control" ng-model="formContratista.empresa">
                                    <option value="">Selecciona Empresa</option>
                                    <option value="{{items.id}}" ng-repeat="items in dataProveedores">{{ items.prop }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">EPS</label>
                                <select name="empresa" class="form-control" ng-model="formContratista.eps">
                                    <option value="">Selecciona EPS</option>
                                    <option value="{{items.id_sg_eps}}" ng-repeat="items in eps">{{ items.nombre_eps }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">ARL</label>
                                <select name="empresa" class="form-control" ng-model="formContratista.arl">
                                    <option value="">Selecciona ARL</option>
                                    <option value="{{items.id_sg_arl}}" ng-repeat="items in arl">{{ items.nombre_arl }}</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Cedula</label>
                                <input type="number" name="cedula" class="form-control" ng-model="formContratista.cedula" ng-init="formContratista.cedula = ''">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Nombres y Apellidos</label>
                                <input type="text" name="nombres" class="form-control" ng-model="formContratista.nombres" ng-init="formContratista.nombres = ''">
                            </div>                            
                            <div class="form-group">
                                <label class="form-control-label">Correo</label>
                                <input type="email" name="correo" class="form-control" ng-model="formContratista.correo" ng-init="formContratista.correo = ''">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Fecha Expedición Cedula</label>
                                <input type="text" name="expedicion" class="form-control datepicker" ng-model="formContratista.expedicion" ng-init="formContratista.expedicion = ''">
                            </div>
                        </div>
                    </div>                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" ng-hide="loadEditContratista" ng-click="createContratista()">Registrar Contratista</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-show="loadEditContratista" ng-click="updateContratista()">Actualizar Contratista</button>
                        <button type="reset" class="btn btn-default pull-left">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end proveedor -->

<!-- empresas -->
<div class="col-lg-4" ng-show="showFormCreateEmpresa">
    <div id="verIntegrantes">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Registrar Empresa</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-danger" ng-click="hideFormCreateEmpresa()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <alert-message type="{{type}}" message="{{message}}" ng-show="isEmptyEmpresa"></alert-message>
                <form name="empresa" action="javascript:" method="post" autocomplete="off">
                    <input type="hidden" name="uid" ng-model="formEmpresa.uid" value="{{uid}}=" ng-init="formEmpresa.uid = uid">
                    <input type="hidden" name="idEmpresa" ng-model="formEmpresa.idempresa" value="{{formEmpresa.idempresa}}" ng-init="formEmpresa.idempresa = 0">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="form-control-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" ng-model="formEmpresa.nombre" ng-init="formEmpresa.nombre = ''">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NIT</label>
                            <input type="number" name="nit" class="form-control" ng-model="formEmpresa.nit" ng-init="formEmpresa.nit = ''">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Direccion</label>
                            <input type="text" name="direccion" class="form-control" ng-model="formEmpresa.direccion" ng-init="formEmpresa.direccion = ''">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Telefono</label>
                            <input type="number" name="telefono" class="form-control" ng-model="formEmpresa.telefono" ng-init="formEmpresa.telefono = ''">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Correo</label>
                            <input type="email" name="correo" class="form-control" ng-model="formEmpresa.correo" ng-init="formEmpresa.correo = ''">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" ng-hide="resultDetallEmpresa" ng-click="createEmpresa()">Registrar Empresa</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-show="resultDetallEmpresa" ng-click="updateEmpresa()" ng-disabled="btnUpdateEmpresa != 'Actualizar Empresa'">{{ btnUpdateEmpresa }}</button>
                        <button type="reset" class="btn btn-default pull-left">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end detalle empresas -->