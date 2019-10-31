<div class="col-xl-9">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Gestiona tus Terminales</h5>
                </div>
                <div class="col text-right">
                    <button class="btn btn-sm btn-info" ng-click="enableSearchTerminal = true" ng-hide="enableSearchTerminal"><i class="fa fa-search"></i></button>
                    <button class="btn btn-sm btn-danger" ng-click="enableSearchTerminal = false" ng-show="enableSearchTerminal"><i class="fa fa-search-minus"></i></button>
                    <button class="btn btn-sm btn-info" ng-hide="showGridTerminales" ng-click="showFormCreateTerminal()"><i class="fa fa-plus"></i></button>
                    <button class="btn btn-sm btn-danger" ng-show="showGridTerminales" ng-click="hideFormCreateTerminal()"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="card-header py-0" ng-show="enableSearchTerminal">
            <form action="javascript:" method="post" autocomplete="off">
                <div class="form-group mb-0">
                    <div class="input-group input-group-lg input-group-flush">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-search"></span>
                            </div>
                        </div>
                        <input ng-model="searchTerminal" type="search" class="form-control" placeholder="Buscar" ng-disabled="terminales.length <= 0">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body" ng-show="showGridTerminales">
            <alert-message type="{{type}}" message="{{message}}" ng-show="isEmpty"></alert-message>
            <!-- estado-tres : formulario -->
            <form name="terminal" action="javascript:" autocomplete="off">
                <input ng-model="formTerminal.uid" type="hidden" name="uid" value="{{uid}}" ng-init="formTerminal.uid = this.uid">
                <input ng-model="formTerminal.idTerminal" type="hidden" name="idterminal" value="{{idTerminal}}" ng-init="formTerminal.idTerminal = this.idTerminal">
                <div class="row" ng-show="showFormTerminal">
                    <div class="col-lg-5">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="form-control-label">Usuario de la Terminal</label>
                                <input ng-model="formTerminal.nombreUsuario" type="text" name="nombreUsuario" class="form-control required" ng-init="formTerminal.nombreUsuario = ''">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Contraseña</label>
                                <input ng-model="formTerminal.passone" type="password" name="passone" class="form-control required" ng-init="formTerminal.passone = ''">
                            </div>
                            <div class="form-group" ng-class="{'has-danger' : formTerminal.confirm != formTerminal.passone}">
                                <label class="form-control-label">Confirmar Contraseña</label>
                                <input ng-model="formTerminal.confirm" type="password" name="confirm" class="form-control required" ng-class="{'is-invalid' : formTerminal.confirm != formTerminal.passone}" ng-init="formTerminal.confirm = ''">
                                <div class="invalid-feedback" ng-if="formTerminal.confirm != formTerminal.passone">Contraseñas no coinciden</div>
                            </div>
                            <div class="form-group">
                                <combo-box bind="formTerminal.sede" label="Sedes" name="sede" route="Sedes/ReadById" required="true" ng-init="formTerminal.sede = ''"></combo-box>
                            </div>
                            <div class="form-group">
                                <combo-box bind="formTerminal.tipo" label="Tipo de Registro" name="tipo" route="UsuariosTerminal/ReadTiposControl" required="true" ng-init="formTerminal.tipo = ''"></combo-box>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <!-- mensaje de confirmacion -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="h3 mb-0">Configuracion de Terminal</h5>
                            </div>
                            <div class="card-body">
                                <div ng-show="statusCreatedTerminal" ng-class="{'text-center' : statusCreatedTerminal}">
                                    <img class="card-img-top" src="<?php echo BASE_URL ?>Content/assets/img/{{ (statusCreatedTerminal) ? 'checked' : 'robot' }}.png" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width:140px;">
                                    <h5 class="h2 card-title mb-0 text-center">{{ (statusCreatedTerminal) ? 'Bien!' : 'Ooops' }}</h5>
                                    <div class="col-xl-12">
                                        <small class="text-muted">{{ (statusCreatedTerminal) ? 'Has registrado exitosamente tu terminal' : 'Debes contar con una terminal creada para configurarla' }}</small>
                                        <br>
                                        <button class="btn btn-sm btn-success mt-3" ng-show="statusCreatedTerminal" ng-click="comeBackCreatedTerminal()">Volver</button>
                                    </div>
                                </div>
                                <div class="row" ng-hide="statusCreatedTerminal">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input ng-model="formTerminal.photo" class="custom-control-input" id="foto" type="checkbox" ng-checked="formTerminal.photo" ng-init="formTerminal.photo = false">
                                            <label class="custom-control-label" for="foto">Registrar Foto</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input ng-model="formTerminal.arl" class="custom-control-input" id="arl" type="checkbox" ng-checked="formTerminal.arl" ng-init="formTerminal.arl = false">
                                            <label class="custom-control-label" for="arl">ARL</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input ng-model="formTerminal.status" class="custom-control-input" id="status" type="checkbox" ng-checked="formTerminal.status" ng-init="formTerminal.status = false">
                                            <label class="custom-control-label" for="status">{{ (formTerminal.status) ? 'Activa' : 'Inactiva' }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input ng-model="formTerminal.cursos" class="custom-control-input" id="cursos" type="checkbox" ng-checked="formTerminal.cursos" ng-init="formTerminal.cursos = false">
                                            <label class="custom-control-label" for="cursos">Cursos</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input ng-model="formTerminal.eps" class="custom-control-input" id="eps" type="checkbox" ng-checked="formTerminal.eps" ng-init="formTerminal.eps = false">
                                            <label class="custom-control-label" for="eps">EPS</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="btn btn-primary pull-right" ng-click="createTerminal()" ng-if="formTerminal.idTerminal == 0" ng-disabled="formTerminal.confirm != formTerminal.passone || btnCreateTerminal != 'Registrar Terminal'">{{ btnCreateTerminal }}</button>
                                        <button type="submit" class="btn btn-primary pull-right" ng-click="updateTerminal()" ng-if="formTerminal.idTerminal != 0" ng-disabled="formTerminal.confirm != formTerminal.passone || btnUpdateTerminal != 'Actualizar Terminal'">{{ btnUpdateTerminal }}</button>
                                        <button type="reset" class="btn btn-default" ng-click="cancelCreateTerminal()">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end mensaje de confirmacion -->
                        </div>
                    </div>
            </form>
            <!-- end estado-tres : formulario -->
        </div>
    </div>
    <!-- estado-dos : con datos -->
    <div class="table-responsive" ng-hide="showGridTerminales">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Sede</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Estado Terminal</th>
                    <th scope="col">Mi Personal E/S</th>
                    <th scope="col">Mis Visitantes E/S</th>
                    <th scope="col">Mis Contratistas E/S</th>
                </tr>
            </thead>
            <tbody class="list">
                <tr ng-if="terminales.length == 0">
                    <th scope="row" class="text-center" colspan="6">No hay terminales registradas</th>
                </tr>
                <tr ng-repeat="rows in terminales | filter : searchTerminal">
                    <th scope="row">
                        <div class="media align-items-center">
                            <a href="#" class="avatar mr-3">
                                <img alt="Image placeholder" src="<?php echo BASE_URL ?>Content/assets/img/online-banking.png">
                            </a>
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ rows.nombre_sede }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">
                        {{ rows.nombre_empresa }}
                    </td>
                    <td>
                        {{ (rows.id_sg_estado == 1) ? 'Activa' : 'Inactiva' }}
                    </td>
                    <td>
                        {{ rows.entrada_mi_personal }}
                    </td>
                    <td>
                        {{ rows.entradas_visitantes }}
                    </td>
                    <td>
                        {{ rows.entradas_contratistas }}
                    </td>                    
                </tr>
            </tbody>
        </table>
    </div>
    <!-- end -->
</div>