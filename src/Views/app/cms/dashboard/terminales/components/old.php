<div class="col-xl-9">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Gestiona tu Terminal</h5>
                </div>
                <div class="col text-right">

                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- mensaje de creacion -->
            <div class="row" ng-hide="showFormTerminal">
                <div class="col-lg-4 offset-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img class="card-img-top" src="<?php echo BASE_URL ?>Content/assets/img/astronomer.png" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width:140px;">
                            <h5 class="h2 card-title mb-0 text-center">Oops!</h5>
                            <div class="col-xl-12">
                                <small class="text-muted">No tienes terminales creadas</small>
                                <br>
                                <button class="btn btn-sm btn-info mt-3" ng-click="showFormCreateTerminal()">Crear mi terminal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end mensaje de creacion -->

            <!-- formulario de creacion -->
            <div class="row" ng-show="showFormTerminal">
                <div class="col-lg-5 mb-3">
                    <form id="frm-create-terminal" action="javascript:" class="none ng-pristine ng-valid" autocomplete="off">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="form-control-label">Usuario de la Terminal</label>
                                <input type="text" name="nombreUsuario" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Contraseña</label>
                                <input type="password" name="passone" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Confirmar Contraseña</label>
                                <input type="password" name="confirm" class="form-control required">
                            </div>
                            <div class="form-group">
                                <combo-box label="Sedes" name="sede" route="sedes/readbyid" required="true"></combo-box>
                            </div>
                        </div>                        
                    </form>
                </div>
                <div class="col-lg-7">
                    <!-- mensaje de confirmacion -->
                    <div class="card" ng-hide="configTerminal">
                        <div class="card-header">
                            <h5 class="h3 mb-0">Configuracion de Terminal</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div ng-show="statusCreatedTerminal" ng-class="{'text-center' : statusCreatedTerminal}">
                                <img class="card-img-top" src="<?php echo BASE_URL ?>Content/assets/img/{{ (statusCreatedTerminal) ? 'checked' : 'robot' }}.png" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width:140px;">
                                <h5 class="h2 card-title mb-0 text-center">{{ (statusCreatedTerminal) ? 'Bien!' : 'Ooops' }}</h5>
                                <div class="col-xl-12">
                                    <small class="text-muted">{{ (statusCreatedTerminal) ? 'Has creado tu usuario, procede a configurar tu terminal' : 'Debes contar con una terminal creada para configurarla' }}</small>
                                    <br>
                                    <button class="btn btn-sm btn-success mt-3" ng-show="statusCreatedTerminal" ng-click="comeBackCreatedTerminal()">Volver</button>
                                </div>
                                </div>    
                                <div class="row" ng-hide="statusCreatedTerminal">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="custom-control-input" id="foto" type="checkbox">
                                            <label class="custom-control-label" for="foto">Registrar Foto</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="custom-control-input" id="arl" type="checkbox">
                                            <label class="custom-control-label" for="arl">ARL</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="custom-control-input" id="cursos" type="checkbox">
                                            <label class="custom-control-label" for="cursos">Cursos</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="custom-control-input" id="eps" type="checkbox">
                                            <label class="custom-control-label" for="eps">EPS</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" ng-click="createTerminal()">Registrar Usuario</button>
                                        <button type="reset" class="btn btn-default" ng-click="cancelCreateTerminal()">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end mensaje de confirmacion -->
                    </div>
                </div>                
                <div class="row" ng-hide="true">
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo BASE_URL ?>Content/assets/img/mipersonal.png" alt="Image placeholder">
                            <div class="card-body text-center">
                                <h5 class="h2 card-title mb-0 text-center">Mi Personal</h5>
                                <div class="col-xl-12">
                                    <small class="text-muted">Gestiona entrada y salida de tus empleados</small>
                                    <br>
                                    <button class="btn btn-sm btn-info mt-3">Activar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo BASE_URL ?>Content/assets/img/visitantes.png" alt="Image placeholder">
                            <div class="card-body text-center">
                                <h5 class="h2 card-title mb-0">Mis Visitantes</h5>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <small class="text-muted">Gestiona entrada y salida de tus visitantes</small>
                                        <br>
                                        <button class="btn btn-sm btn-info mt-3">Activar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo BASE_URL ?>Content/assets/img/contratistas.png" alt="Image placeholder">
                            <div class="card-body text-center">
                                <h5 class="h2 card-title mb-0 text-center">Mis Contratistas</h5>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <small class="text-muted">Gestiona entrada y salida de tus contratistas</small>
                                        <br>
                                        <button class="btn btn-sm btn-info mt-3">Activar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>