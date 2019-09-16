<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Bienvenido a Sigga!</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <!-- resumen empresas por usuario -->
    <div class="row">
        <div class="col-lg-6 offset-md-3" ng-show="increase == 0">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="h3 mb-0">Te damos la bienvenida a Sigga</h5>
                        </div>
                        <div class="col-4">
                            <h5 class="h3 mb-0 pull-right">Escoge tu mejor opción</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center">
                    <img class="img-fluid" src="<?php echo BASE_URL; ?>Content/assets/img/sigga-logo-2.png" style="height: 191px;">
                    <p class="card-text mb-6">Gracias por registrarte en <strong>Sigga</strong>. Queremos darte las mejores y más fáciles opciones para la gestión de tu personal, contratistas y/o visitantes; te invitamos a escoger tu módulo de preferencia presionando el botón <strong>Empezar!</strong></p>
                    <div class="row">
                        <?php if(Models\Usuario\ModelUsuario::verificarEmpresas($id_sg_usuario)): ?>
                        <div class="col-lg-4 col-xs-12">
                            <div class="card card-pricing bg-gradient-info border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Mi Personal</h4>
                                </div>
                                <div class="card-body">
                                    <span class="text-white">Gestiona tu personal, valida su entrada y salida, acceso controlado</span>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-primary mb-3" ng-click="next('mipersonal')">Empezar!</button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(Models\Usuario\ModelUsuario::verificarUnidad($id_sg_usuario)): ?>
                        <div class="col-lg-4 col-xs-12">
                            <div class="card card-pricing bg-misvisitantes border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Mis Visitantes</h4>
                                </div>
                                <div class="card-body">
                                    <span class="text-white">Controla tus visitas, autoriza entradas, administra tu unidad residencial u oficinas</span>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-primary mb-3" ng-click="next('visitantes')">Empezar!</button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(Models\Usuario\ModelUsuario::verificarProveedor($id_sg_usuario)): ?>
                        <!-- <div class="col-lg-4 col-xs-12">
                            <div class="card card-pricing bg-gradient-warning border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Mis Contratistas</h4>
                                </div>
                                <div class="card-body">
                                    <span class="text-white">Administra tus contratistas, gestiona su acceso, verifica los requisitos</span>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <button type="button" class="btn btn-primary mb-3">Empezar!</button>
                                </div>
                            </div>
                        </div> -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-md-3" ng-show="increase == 1 && modulo == 'mipersonal'">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="h3 mb-0">Te damos la bienvenida a Sigga</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center" ng-hide="createdEmpresa">
                            <h5 class="h3 mb-3">Tu Empresa</h5>
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>Content/assets/img/empresa.png">
                            <p class="card-text mb-3">Para proceder a crear tu empresa en <strong>Sigga</strong>, por favor, ingresa los siguientes datos.</p>
                            <div class="alert alert-info" ng-if="showBackMessage">Guardamos tu progreso, no se que paso la ultima vez, pero quedaste aqui y ahora puedes continuar!</div>
                            <div class="alert alert-danger" ng-if="errorCreated">{{ errorMessageEmpresa }}</div>
                        </div>
                        <div class="col mb-6">
                            <div ng-if="!createdEmpresa">
                                <?php

                                Core\Form::createSimpleForm([
                                    'id'        => 'frm-create-empresa',
                                    'action'    => 'javascript:',
                                    'css'       => 'none'
                                ])->formInputs([
                                    ''   => [
                                        'type'      => 'hidden',
                                        'name'      => 'usuario',
                                        'css'       => '',
                                        'labelCss'  => '',
                                        'col'       => '',
                                        'value'     => "{{ uid }}"
                                    ],
                                    'u'   => [
                                        'type'      => 'hidden',
                                        'name'      => 'tiporegistro',
                                        'css'       => '',
                                        'labelCss'  => '',
                                        'col'       => '',
                                        'value'     => "{{ tiporegistro }}"
                                    ],
                                    'Nombre Empresa'   => [
                                        'type'      => 'text',
                                        'name'      => 'nombreEmpresa',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8',
                                        'ngmodel'   => "empresa",
                                    ],
                                    'NIT'   => [
                                        'type'      => 'number',
                                        'name'      => 'nitEmpresa',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8'
                                    ],
                                    'Correo'   => [
                                        'type'      => 'email',
                                        'name'      => 'emailEmpresa',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8',
                                        'value'     => $email
                                    ],
                                    'Celular'   => [
                                        'type'      => 'number',
                                        'name'      => 'celularEmpresa',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8'
                                    ],
                                    'Direccion Empresa'   => [
                                        'type'      => 'text',
                                        'name'      => 'dirEmpresa',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8'
                                    ]
                                ])->setButtons([
                                    'Crea mi Empresa'  => [
                                        'type'      => 'submit',
                                        'id'        => 'btn-create-empresa',
                                        'css'       => 'btn btn-primary pull-right',
                                        'event'     => 'ng-click="createempresa()"',
                                        'notify'    => [
                                            'message'   => "Bien, la empresa ha sido creada"
                                        ]
                                    ],
                                    'Cancelar'      => [
                                        'type'  => 'reset',
                                        'css'   => 'btn btn-default',
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="row" ng-show="createdEmpresa">
                                <div class="col-lg-6 offset-md-3 mt-6">
                                    <div class="card card-pricing bg-gradient-success border-0 text-center mb-4">
                                        <div class="card-header bg-transparent">
                                            <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Bien! hemos registrado tu empresa</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class=" text-white">Muy bien sigamos adelante</span>
                                                </div>
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-primary mb-3 mt-5" ng-click="next('mipersonal')">Siguiente Paso</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <a href="#!" class=" text-white">Sigga</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-neutral" ng-click="prev()">Regresar a la Bienvenida</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-md-3" ng-show="increase == 2 && modulo == 'mipersonal'">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="h3 mb-0">Te damos la bienvenida a Sigga</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3 text-center" ng-if="!createdSede">
                            <h5 class="h3 mb-3">Tus Sedes</h5>
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>Content/assets/img/sedes.png">
                            <p class="card-text">Crea las sedes de tu empresa, si solo tienes una sede crea está como principal.</p>
                            <div class="alert alert-danger" ng-if="errorCreatedSede">{{ errorMessageSede }}</div>
                        </div>
                        <div class="col">
                            <div ng-if="!createdSede">
                                <?php
                                Core\Form::createSimpleForm([
                                    'id'        => 'frm-create-sede',
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
                                    'Nombre Sede'   => [
                                        'type'      => 'text',
                                        'name'      => 'nombreSede',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8',
                                        'ngmodel'   => "sede"
                                    ],
                                    'Direccion'   => [
                                        'type'      => 'text',
                                        'name'      => 'dirSede',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8'
                                    ],
                                    'Telefono'   => [
                                        'type'      => 'number',
                                        'name'      => 'telefonoSede',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8'
                                    ]
                                ])->setButtons([
                                    'Crea mi Sede'  => [
                                        'type'      => 'submit',
                                        'id'        => 'btn-create-empresa',
                                        'css'       => 'btn btn-primary pull-right',
                                        'event'     => 'ng-click="createSede()"'
                                    ],
                                    'Cancelar'      => [
                                        'type'  => 'reset',
                                        'css'   => 'btn btn-default',
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="row" ng-show="createdSede">
                                <div class="col-lg-6 offset-md-3 mt-6">
                                    <div class="card card-pricing bg-gradient-success border-0 text-center mb-4">
                                        <div class="card-header bg-transparent">
                                            <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Bien! hemos registrado tu Sede</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class=" text-white">Es hora de empezar nuestro viaje</span>
                                                </div>
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-primary mb-3 mt-5" ng-click="getInSigga()">Entrar a Sigga!</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <a href="#!" class=" text-white">Sigga</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-md-3" ng-show="increase == 1 && modulo == 'visitantes'">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="h3 mb-0">Te damos la bienvenida a Sigga</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3 text-center">
                            <h5 class="h3">Que deseas registrar</h5>
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>Content/assets/img/sigga-logo-2.png" style="height: 170px;">
                            <p class="card-text"><strong>Escoje el tipo de registros que deseas llevar.</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="card border">
                                <div class="card-header">
                                    <h5 class="h3 mb-0 text-center">Tu Unidad Residencial</h5>
                                </div>
                                <div class="card-body text-center">
                                    <img class="img-fluid mb-3" src="<?php echo BASE_URL; ?>Content/assets/img/unidad_residencial.png">
                                    <p class="card-text mb-4">Si deseas tener un control total en tu <strong>Unidad Residencial</strong>, conocer en tiempo real tus visitas, comunicarte con tus residentes y solicitar autorizacion de acceso.</p>
                                    <button class="btn btn-primary" ng-click="next('visitantes', 'residencial')">Has click aqui</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card border">
                                <div class="card-header">
                                    <h5 class="h3 mb-0 text-center">Tu Empresa y Oficinas</h5>
                                </div>
                                <div class="card-body text-center">
                                    <img class="img-fluid mb-3" src="<?php echo BASE_URL; ?>Content/assets/img/company.png">
                                    <p class="card-text mb-4">Administra las visitas de tu <strong>Empresa</strong> de forma eficiente y controlada, lleva un registro en tiempo real de las personas que visitan tus <strong>Oficinas</strong>.</p>
                                    <button class="btn btn-primary" ng-click="next('visitantes', 'empresa')">Has click aqui</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-md-3" ng-show="increase == 2 && modulo == 'visitantes'">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6" ng-if="tipoRegistroSigga == 'residencial'">
                            <h5 class="h3 mb-0">Registra tu Unidad Residencial</h5>
                        </div>
                        <div class="col-6" ng-if="tipoRegistroSigga == 'empresa'">
                            <h5 class="h3 mb-0">Registra tu Empresa y Oficinas</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="h3 mb-0 text-right">Paso 1 de 3</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center" ng-hide="createdUnidad || errorCreatedEmpresaVisitante">
                        <img class="img-fluid mb-3" src="<?php echo BASE_URL; ?>Content/assets/img/unidad_residencial.png" ng-if="tipoRegistroSigga == 'residencial'">
                        <img class="img-fluid mb-3" src="<?php echo BASE_URL; ?>Content/assets/img/company.png" ng-if="tipoRegistroSigga == 'empresa'">
                        <p class="card-text mb-4">Puedes registrar los datos básicos de tu Unidad Residencial con el siguiente formulario.</p>
                        <div class="alert alert-warning" ng-if="errorCreated">{{ errorMessageUnidad }}</div>
                    </div>
                    <div ng-if="tipoRegistroSigga == 'residencial'" ng-hide="createdUnidad">
                        <?php
                        Core\Form::createSimpleForm([
                            'id'        => 'frm-create-unidad',
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
                            'u'   => [
                                'type'      => 'hidden',
                                'name'      => 'tiporegistro',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "{{ tiporegistro }}"
                            ],
                            'Nit de la Unidad'   => [
                                'type'      => 'number',
                                'name'      => 'nitUnidad',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Nombre de la Unidad'   => [
                                'type'      => 'text',
                                'name'      => 'nombreUnidad',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Dirección Unidad'   => [
                                'type'      => 'text',
                                'name'      => 'direccionUnidad',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Correo'   => [
                                'type'      => 'email',
                                'name'      => 'emailUnidad',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => $email
                            ],
                            'Celular'   => [
                                'type'      => 'number',
                                'name'      => 'telefonoUnidad',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ]
                        ])->setButtons([
                            'Registra mi Unidad'  => [
                                'type'      => 'submit',
                                'id'        => 'btn-create-empresa',
                                'css'       => 'btn btn-primary pull-right',
                                'event'     => 'ng-click="createUnidadResidencial()"'
                            ],
                            'Cancelar'      => [
                                'type'  => 'reset',
                                'css'   => 'btn btn-default',
                            ]
                        ]);
                        ?>                        
                    </div>
                    <div class="row" ng-show="createdUnidad">
                        <div class="col-lg-6 offset-md-3 mt-6">
                            <div class="card card-pricing bg-gradient-success border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Bien! hemos registrado tu Unidad</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class=" text-white">Tu Unidad ha sido registrada, puedes continuar</span>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary mb-3 mt-5" ng-click="getInSigga()">Entrar a Sigga!</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="javascript:" class=" text-white">Sigga</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div ng-if="tipoRegistroSigga == 'empresa'" ng-hide="errorCreatedEmpresaVisitante">
                        <?php

                        Core\Form::createSimpleForm([
                            'id'        => 'frm-create-empresa-visitante',
                            'action'    => 'javascript:',
                            'css'       => 'none'
                        ])->formInputs([
                            ''   => [
                                'type'      => 'hidden',
                                'name'      => 'usuario',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "{{ uid }}"
                            ],
                            'u'   => [
                                'type'      => 'hidden',
                                'name'      => 'tiporegistro',
                                'css'       => '',
                                'labelCss'  => '',
                                'col'       => '',
                                'value'     => "{{ tiporegistro }}"
                            ],
                            'Nombre Empresa'   => [
                                'type'      => 'text',
                                'name'      => 'nombreEmpresa',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'ngmodel'   => "empresa",
                            ],
                            'NIT'   => [
                                'type'      => 'number',
                                'name'      => 'nitEmpresa',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Correo'   => [
                                'type'      => 'email',
                                'name'      => 'emailEmpresa',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8',
                                'value'     => $email
                            ],
                            'Celular'   => [
                                'type'      => 'number',
                                'name'      => 'celularEmpresa',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ],
                            'Direccion Empresa'   => [
                                'type'      => 'text',
                                'name'      => 'dirEmpresa',
                                'css'       => 'form-control required',
                                'labelCss'  => 'form-control-label',
                                'col'       => 'col-sm-8'
                            ]
                        ])->setButtons([
                            'Crea mi Empresa'  => [
                                'type'      => 'submit',
                                'id'        => 'btn-create-empresa',
                                'css'       => 'btn btn-primary pull-right',
                                'event'     => 'ng-click="createEmpresaVisitante()"',
                                'notify'    => [
                                    'message'   => "Bien, la empresa ha sido creada"
                                ]
                            ],
                            'Cancelar'      => [
                                'type'  => 'reset',
                                'css'   => 'btn btn-default',
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="row" ng-show="errorCreatedEmpresaVisitante">
                        <div class="col-lg-6 offset-md-3 mt-6">
                            <div class="card card-pricing bg-gradient-success border-0 text-center mb-4">
                                <div class="card-header bg-transparent">
                                    <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Bien! hemos registrado tu empresa</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class=" text-white">Muy bien sigamos adelante</span>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary mb-3 mt-5" ng-click="next('visitantes', 'empresa')">Siguiente Paso</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="#!" class=" text-white">Sigga</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-md-3" ng-show="increase == 3 && modulo == 'visitantes'">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="h3 mb-0">Te damos la bienvenida a Sigga</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3 text-center" ng-hide="createdSedeVisitante">
                            <h5 class="h3 mb-3">Tus Sedes</h5>
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>Content/assets/img/sedes.png">
                            <p class="card-text">Crea las sedes de tu empresa. Si solo tienes una sede, crea esta como principal.</p>
                            <div class="alert alert-danger" ng-if="errorCreatedSedeVisitante">{{ errorMessageSedeVisitante }}</div>
                        </div>
                        <div class="col">
                            <div ng-if="!createdSedeVisitante">
                                <?php
                                Core\Form::createSimpleForm([
                                    'id'        => 'frm-create-sede-visitante',
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
                                    'Nombre Sede'   => [
                                        'type'      => 'text',
                                        'name'      => 'nombreSede',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8',
                                        'ngmodel'   => "sede"
                                    ],
                                    'Direccion'   => [
                                        'type'      => 'text',
                                        'name'      => 'dirSede',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8'
                                    ],
                                    'Telefono'   => [
                                        'type'      => 'number',
                                        'name'      => 'telefonoSede',
                                        'css'       => 'form-control required',
                                        'labelCss'  => 'form-control-label',
                                        'col'       => 'col-sm-8'
                                    ]
                                ])->setButtons([
                                    'Crea mi Sede'  => [
                                        'type'      => 'submit',
                                        'id'        => 'btn-create-empresa',
                                        'css'       => 'btn btn-primary pull-right',
                                        'event'     => 'ng-click="createSedeVisitante()"'
                                    ],
                                    'Cancelar'      => [
                                        'type'  => 'reset',
                                        'css'   => 'btn btn-default',
                                    ]
                                ]);
                                ?>
                            </div>
                            <div class="row" ng-show="createdSedeVisitante">
                                <div class="col-lg-6 offset-md-3 mt-6">
                                    <div class="card card-pricing bg-gradient-success border-0 text-center mb-4">
                                        <div class="card-header bg-transparent">
                                            <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Bien! hemos registrado tu Sede</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span class=" text-white">Es hora de empezar nuestro viaje</span>
                                                </div>
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-primary mb-3 mt-5" ng-click="getInSigga()">Entrar a Sigga!</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <a href="#!" class=" text-white">Sigga</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>