<div class="col-lg-4" ng-hide="noMostrarOficinas">
    <div ng-hide="ocultaDetalleOficina">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Detalles de Oficina</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-show="resultResource" ng-click="editarOficina()"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-sm btn-primary" ng-show="resultResource" ng-click="abrirIntegrantes()"><i class="fa fa-user-plus"></i></button>
                        <button class="btn btn-sm btn-danger" ng-show="resultResource" ng-click="cierraDetalles()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-header py-0">

            </div>
            <div id="verOficinas" class="card-body">
                <div class="row align-items-center" ng-hide="resultResource">
                    <div class="col-lg-12 text-center">{{ muestraMensajeCarga }}</div>
                </div>
                <div class="row" ng-show="resultResource">
                    <div class="col text-center">
                        <img src="<?php echo BASE_URL ?>Content/assets/img/oficina_real.jpg" class="rounded img-fluid">
                    </div>
                    <div class="col">
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Torre
                            </span>
                            <div class="h3">{{ nombreTorre }}</div>
                        </div>
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Piso
                            </span>
                            <div class="h3">{{ pisoNivel }}</div>
                        </div>
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Oficina
                            </span>
                            <div class="h3">{{ nombreOficina }}</div>
                        </div>
                        <div class="my-4">
                            <span class="h6 surtitle text-muted">
                                Nombre Oficina / Área
                            </span>
                            <div class="h3">{{ area }}</div>
                        </div>                        
                        <div class="my-4">
                            <a href="#resumenIntegrantes" du-smooth-scroll du-scrollspy class="btn btn-sm btn-outline-default">Ver Integrantes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="creaOficinas" class="card" ng-show="ocultaFormCreacionOficina">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Registra áreas de trabajo</h5>
                </div>
                <div class="col text-right">
                    <button class="btn btn-sm btn-warning" ng-show="enableFormTorre" ng-click="cancelAddTorre()">Cancelar</button>
                    <button class="btn btn-sm btn-danger" ng-show="ocultaDetalleOficina" ng-click="closeAddOffice()"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-danger" ng-show="showMessageOficina">
                <span class="alert-inner--icon"><i class="ni ni-fat-remove"></i></span>
                <span class="alert-inner--text"><strong>Alerta!</strong> {{ oficinaMessage }}</span>
                <button type="button" class="close" ng-click="borraMensajeError()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div ng-hide="recordCreated">
                <form id="frm-create-oficina" action="javascript:" method="post" autocomplete="off" ng-hide="enableFormTorre">
                    <div class="box-body">
                        <div style="display: none;">
                            <label class=""></label>
                            <input type="hidden" name="idUser" class="" value="{{uid}}" autocomplete="off">
                            <input type="hidden" name="idOficina" value="{{idOficina}}" ng-if="!buttonCreateOficina">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Torre</label>
                            <select id="idTorre" name="idTorre" class="form-control" ng-change="changeFormTorre()" ng-model="item">
                                <option value="2" ng-if="dataTorres.length >= 0" ng-hide="!buttonCreateOficina">Añadir Torre</option>
                                <option value="" selected>Selecciona tu Torre</option>
                                <option value="{{ items.id_sg_torre }}" ng-repeat="items in dataTorres">{{ items.nombre_torre }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Piso</label>
                            <input type="text" name="pisoNivel" class="form-control required" ng-model="piso" ng-readonly="disableInputs" value="{{piso}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Oficina</label>
                            <input type="text" name="nombreOficina" class="form-control required" ng-model="oficina" value="{{oficina}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Nombre Oficina / Área</label>
                            <input type="text" name="areaOficina" class="form-control required" ng-model="area" value="{{area}}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createOficina()" ng-if="buttonCreateOficina">Registrar</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-click="updateOficina(idOficina)" ng-if="!buttonCreateOficina" ng-disabled="btnActualizaOficina != 'Actualizar'">{{ btnActualizaOficina }}</button>
                        <button type="reset" class="btn btn-default" ng-click="resetForm()">Cancelar</button>
                    </div>
                </form>
                <div ng-show="enableFormTorre">
                    <div class="alert alert-{{tipoMensaje}} text-center" ng-show="muestraErrorTorre">{{ mensajeErrorTorre }}</div>
                    <?php
                    Core\Form::createSimpleForm([
                        'id'        => 'frm-create-torre',
                        'action'    => 'javascript:',
                        'css'       => 'none'
                    ])->formInputs([
                        ''   => [
                            'type'      => 'hidden',
                            'name'      => 'idUser',
                            'css'       => '',
                            'labelCss'  => '',
                            'col'       => '',
                            'value'     => "{{ uid }}"
                        ],
                        'Nombre de la Torre'   => [
                            'type'      => 'text',
                            'name'      => 'nombreTorre',
                            'css'       => 'form-control required',
                            'labelCss'  => 'form-control-label',
                            'col'       => 'col-sm-8'
                        ]
                    ])->setButtons([
                        'Registrar Torre'  => [
                            'type'      => 'submit',
                            'id'        => 'btn-create-torre',
                            'css'       => 'btn btn-primary pull-right',
                            'event'     => 'ng-click="createTorre()"'
                        ],
                        'Cancelar'      => [
                            'type'  => 'reset',
                            'css'   => 'btn btn-default',
                        ]
                    ]);
                    ?>
                </div>
            </div>
            <div class="alert alert-success" ng-show="recordCreated">
                <span class="alert-inner--icon"><i class="ni ni-check-bold"></i></span>
                <span class="alert-inner--text"><strong>Bien!</strong> {{ oficinaMessage }}</span>
                <button type="button" class="close" ng-click="borraMensajeSuccess()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row alert alert-info" ng-show="recordCreated">
                <div class="col-12 text-center mb-2"><span class="text-sm">Deseas registrar una oficina más ?</span></div>
                <div class="col text-center">
                    <button class="btn btn-sm btn-neutral" ng-click="borraMensajeSuccess()">No, ya termine</button>
                </div>
                <div class="col text-center">
                    <button class="btn btn-sm btn-primary ml-5" ng-click="another()">Si, uno más</button>
                </div>
            </div>
        </div>
    </div>
    <!-- torres -->
    <div id="verTorres" ng-show="panelTorre">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Mis Torres</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-warning" ng-click="cancelAddTorre()" ng-show="enableFormTorre">Cancelar</button>
                        <button class="btn btn-sm btn-danger" ng-click="closeTorre()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <!-- searcher -->
            <div class="card-header py-0" ng-hide="enableFormTorre">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchTorre" type="search" class="form-control" placeholder="Buscar" ng-disabled="!loadDataResource">
                        </div>
                    </div>
                </form>
            </div>
            <!-- end searcher -->
            <div class="card-body customScroll {{ setScroll(dataTorres) }}" ng-class="{'removeScroll' : searchTorre.length > 0}">
                <div class="alert alert-{{tipoMensaje}} text-center" ng-show="muestraErrorTorre">{{ mensajeErrorTorre }}</div>
                <!-- show -->
                <div ng-hide="enableFormTorre">
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0 hover" ng-if="dataTorres.length == 0">
                            <div class="row">
                                <div class="col-lg-12 text-center">No hay torres registradas</div>
                            </div>
                        </li>
                        <li class="list-group-item px-0 hover" ng-click="detallesTorre(rows.id_sg_torre)" ng-repeat="rows in dataTorres | filter:searchTorre" ng-if="dataTorres.length > 0">
                            <div class="row align-items-center" ng-hide="torreToDelete == rows.id_sg_torre">
                                <div class="col-auto">
                                    <a href="javascript:" class="avatar rounded-circle">
                                        <img src="<?php echo BASE_URL; ?>Content/assets/img/oficinas.png" />
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="javascript:">{{ rows.nombre_torre }}</a>
                                    </h4>
                                    <span class="text-success" ng-if="rows.id_sg_estado == '1'">●</span>
                                    <small ng-if="rows.id_sg_estado == '1'">Activa</small>
                                    <span class="text-danger" ng-if="rows.id_sg_estado == '2'">●</span>
                                    <small ng-if="rows.id_sg_estado == '2'">Inactiva</small>
                                </div>
                                <div class="col text-right mr-3">
                                    <button type="button" class="btn btn-sm btn-danger" ng-if="selectedTorre == rows.id_sg_torre" ng-click="showDeleteOption(rows.id_sg_torre)"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="row align-items-center" ng-class="{'bounce animated' : torreToDelete == rows.id_sg_torre}" ng-show="torreToDelete == rows.id_sg_torre">
                                <div class="col">
                                    <div class="row alert alert-danger">
                                        <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar esta Torre ?</span></div>
                                        <div class="col text-center">
                                            <button class="btn btn-sm btn-danger" ng-click="deleteTorre(rows.id_sg_torre)">Si, Borrala</button>
                                        </div>
                                        <div class="col text-center">
                                            <button class="btn btn-sm btn-warning" ng-click="cancelTorreDelete(rows.id_sg_torre)">No, Cancelalo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end show -->
            </div>
        </div>
    </div>
    <!-- integrantes -->
    <div id="verIntegrantes" ng-show="listarIntegrantes">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Mi Personal</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-warning" ng-hide="enableFormIntegrantes" ng-click="cierraIntegrantes()">Cancelar</button>
                        <button class="btn btn-sm btn-danger" ng-click="cierraIntegrantes()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="alert alert-{{tipoMensaje}} text-center mt-3" ng-if="muestraErrorAsignacion">{{ mensajeErrorAsignacion }}</div>
            </div>
            <!-- searcher -->
            <div class="card-header py-0" ng-hide="enableFormTorre">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchPersonal" type="search" class="form-control" placeholder="Buscar" ng-disabled="!loadDataResource">
                        </div>
                    </div>
                </form>
            </div>
            <!-- end searcher -->
            <div class="card-body customScroll {{ setScroll(dataEmpleados) }}" ng-class="{'removeScroll' : searchPersonal.length > 0}">
                <ul class="list-group list-group-flush list my--3">
                    <li class="list-group-item px-0 hover" ng-if="dataEmpleados.length == 0">
                        <div class="row">
                            <div class="col-lg-12 text-center">No hay empleados registrados en <span class="badge badge-info">Mi Personal</span></div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 hover" ng-if="dataEmpleados.length > 0" ng-click="muestraAsignacion(rows.id_sg_personal)" ng-repeat="rows in dataEmpleados | filter:searchPersonal as result">
                        <div class="row align-items-center" ng-hide="asignacionEmpleado == rows.id_sg_personal">
                            <div class="col-auto">
                                <a href="javascript:" class="avatar rounded-circle"><img src="<?php echo BASE_URL; ?>Content/assets/img/empleado.png" /></a>
                            </div>
                            <div class="col ml--2">
                                <h4 class="mb-0">
                                    <a href="javascript:">{{ rows.empleado }}</a>
                                </h4>
                                <small>{{ rows.correo_personal }}</small><br>
                                <small>{{ rows.nombre_sede }}</small><br>
                                <span class="text-success" ng-if="rows.id_sg_estado == '1'">●</span>
                                <small ng-if="rows.id_sg_estado == '1'">Activo</small>
                                <span class="text-danger" ng-if="rows.id_sg_estado == '2'">●</span>
                                <small ng-if="rows.id_sg_estado == '2'">Inactivo</small>
                            </div>
                            <div class="col text-right mr-3">
                                <button type="button" class="btn btn-sm btn-primary" ng-if="selectedEmpleado == rows.id_sg_personal" ng-click="asignaEmpleado(rows.id_sg_personal)"><i class="ni ni-building"></i></button>
                            </div>
                        </div>
                        <div class="row align-items-center" ng-class="{'bounce animated' : asignacionEmpleado == rows.id_sg_personal}" ng-show="asignacionEmpleado == rows.id_sg_personal">
                            <div class="col">
                                <div class="row alert alert-default">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Deseas asignar este empleado a la Oficina {{area}}</span></div>
                                    <div class="col text-center">
                                        <form id="frm-asigna-empleado" action="javascript:" method="post">
                                            <input type="hidden" class="required" name="idUser" value="{{ uid }}">
                                            <input type="hidden" class="required" name="idOficina" value="{{ idOficina }}" ng-model="idOficina">
                                            <input type="hidden" class="required" name="idEmpleado" value="{{ rows.id_sg_personal }}">
                                            <button class="btn btn-sm btn-primary" ng-click="procesaAsignacion(idOficina, rows.id_sg_personal)">Si, Asignar</button>
                                        </form>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="cancelAsignacion()">No, Cancelalo</button>
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