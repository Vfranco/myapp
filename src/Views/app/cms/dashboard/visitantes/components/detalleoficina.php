<div id="verOficinas" ng-hide="ocultaDetalleOficina">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Detalles de Oficina</h5>
                </div>
                <div class="col text-right">
                    <button class="btn btn-sm btn-primary" ng-show="resultResource">Añadir Integrante</button>
                    <button class="btn btn-sm btn-danger" ng-show="resultResource" ng-click="cierraDetalles()"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="card-header py-0">

        </div>
        <div class="card-body">
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
                            Nombre Torre
                        </span>
                        <div class="h3">{{ nombreTorre }}</div>
                    </div>
                    <div class="my-4">
                        <span class="h6 surtitle text-muted">
                            Nombre Oficina
                        </span>
                        <div class="h3">{{ nombreOficina }}</div>
                    </div>
                    <div class="my-4">
                        <span class="h6 surtitle text-muted">
                            Piso
                        </span>
                        <div class="h3">{{ pisoNivel }}</div>
                    </div>
                    <div class="my-4">
                        <span class="h6 surtitle text-muted">
                            Area
                        </span>
                        <div class="h3">{{ area }}</div>
                    </div>                    
                    <div class="my-4">
                        <label class="custom-toggle custom-toggle-success">
                            <input type="checkbox" ng-checked="estado == '1'" ng-click="activateEmpleado(estado, uid)" checked="checked">
                            <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" ng-show="ocultaFormCreacionOficina">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="h3 mb-0">Registra áreas de trabajo</h5>
            </div>
            <div class="col text-right">
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
            <form id="frm-create-oficina" action="javascript:" method="post" autocomplete="off">
                <div class="box-body">
                    <div style="display: none;">
                        <label class=""></label>
                        <input type="hidden" name="idUser" class="" value="{{uid}}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Torre o Edificio</label>
                        <select name="idTorre" class="form-control">
                            <option value="" selected>Selecciona tu Torre</option>
                            <option value="{{ items.id_sg_torre }}" ng-repeat="items in dataTorres">{{ items.nombre_torre }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Piso o Nivel</label>
                        <input sede="" type="text" name="pisoNivel" class="form-control required">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Oficina</label>
                        <input sede="" type="text" name="nombreOficina" class="form-control required">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Area</label>
                        <input type="text" name="areaOficina" class="form-control required">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right" ng-click="createOficina()">Registrar</button>
                    <button type="reset" class="btn btn-default">Cancelar</button>
                </div>
            </form>
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
                    <h5 class="h3 mb-0">Torres</h5>
                </div>
                <div class="col text-right">
                    <button class="btn btn-sm btn-primary" ng-click="formTorre()" ng-hide="enableFormTorre">Añadir Torre</button>
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
                        <input ng-model="searchResource" type="search" class="form-control" placeholder="Buscar" ng-disabled="!loadDataResource">
                    </div>
                </div>
            </form>
        </div>
        <!-- end searcher -->
        <div class="card-body">
            <div class="alert alert-{{tipoMensaje}} text-center" ng-show="muestraErrorTorre">{{ mensajeErrorTorre }}</div>
            <!-- create -->
            <div ng-show="enableFormTorre">
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
            <!-- end create -->
            <!-- show -->
            <div ng-hide="enableFormTorre">
                <ul class="list-group list-group-flush list my--3">
                    <li class="list-group-item px-0 hover" ng-if="dataTorres.length == 0">
                        <div class="row">
                            <div class="col-lg-12 text-center">No hay torres registradas</div>
                        </div>
                    </li>
                    <li class="list-group-item px-0 hover" ng-click="detallesTorre(rows.id_sg_torre)" ng-repeat="rows in dataTorres" ng-if="dataTorres.length > 0">
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