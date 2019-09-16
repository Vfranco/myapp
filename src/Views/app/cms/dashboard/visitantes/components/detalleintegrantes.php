<!-- listado de integrantes -->
<div class="col-lg-8" ng-show="noMostrarOficinas">
    <div id="detalleintegrantes">
        <div class="card">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-0">Detalle de Oficinas y Empleados</h3>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info" ng-click="enableSearchOption()" ng-hide="enableSearch"><i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-warning" ng-click="closeSearchOption()" ng-show="enableSearch"><i class="fa fa-search-minus"></i></button>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-notification"><i class="fa fa-file-excel"></i></button>
                        <a href="javascript:" class="btn btn-sm btn-danger btn-round btn-icon" ng-click="closeDetalleOficinas()"><span class="btn-inner--text"><i class="fa fa-times"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="card-header py-0" ng-show="enableSearch">
                <form action="javascript:" method="post" autocomplete="off">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchDataEmpleado" type="search" class="form-control" placeholder="Buscar" ng-disabled="!loadDataResource">
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive customScroll {{ setScroll(detalleOficinas) }}" ng-class="{'removeScroll' : searchDataEmpleado.length > 0}">
                <table id="detalles-mis-oficinas" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Cédula</th>
                            <th>Empleado</th>
                            <th>Torre</th>
                            <th>Sede</th>
                            <th>Piso</th>
                            <th>Oficina</th>
                            <th>Área</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-if="detalleOficinas.length == 0 && loadDetalleOficinas == false">
                            <td colspan="8" class="text-center">
                                <span class="badge badge-default">No hay registros</span>
                            </td>
                        </tr>
                        <tr ng-if="loadDetalleOficinas">
                            <td colspan="8" class="text-center">
                                <span class="badge badge-default">Cargando...</span>
                            </td>
                        </tr>
                        <tr ng-if="result <= 0">
                            <td colspan="8" class="text-center">
                                <span class="badge badge-default">No se encontraron datos</span>
                            </td>
                        </tr>
                        <tr class="hover" ng-repeat="rows in detalleOficinas | filter:searchDataEmpleado as result">
                            <td class="table-user">
                                <img src="<?php echo BASE_URL; ?>Content/assets/img/empleado.png" class="avatar rounded-circle mr-3">
                                <b>{{ rows.cedula_personal }}</b>
                            </td>
                            <td>{{ rows.empleado }}</td>
                            <td>{{ rows.torre }}</td>
                            <td>{{ rows.nombre_sede }}</td>
                            <td>{{ rows.piso_nivel }}</td>
                            <td>{{ rows.oficina }}</td>
                            <td>{{ rows.area }}</td>
                            <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-notification"><i class="fa fa-tasks"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- detalle de integrantes -->
<div class="col-lg-4">
    <div id="resumenIntegrantes">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0 d-flex justify-content-center mr-5">Integrantes {{ area }}</h5>
                    </div>
                    <div class="col text-right">
                        <a href="#detalleintegrantes" du-smooth-scroll du-scrollspy class="btn btn-sm btn-primary" ng-click="showDetallesOficinas()">Ampliar Detalle</a>
                    </div>
                </div>
            </div>
            <div class="card-header py-0">
                <form action="javascript:" method="post" autocomplete="off" ng-show="integrantesOficina.length > 0">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-search"></span>
                                </div>
                            </div>
                            <input ng-model="searchIntegrante" type="search" class="form-control" placeholder="Buscar" ng-disabled="!loadDataResource">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body customScroll {{ setScroll(integrantesOficina) }}" ng-class="{'removeScroll' : searchIntegrante.length > 0}">
                <div class="row align-items-center" ng-hide="integrantesOficina.length > 0 || searchIntegrante.length > 0">
                    <div class="col-lg-12 text-center">No hay datos que mostrar</div>
                </div>
                <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed" ng-repeat="rows in integrantesOficina | filter:searchIntegrante as result">
                    <div class="timeline-block">
                        <span class="timeline-step badge-success">
                            <i class="ni ni-circle-08"></i>
                        </span>
                        <div class="timeline-content">
                            <div class="d-flex justify-content-between pt-1">
                                <div>
                                    <span class="text-muted text-sm font-weight-bold">Integrante</span>
                                </div>
                                <div class="text-right">
                                    <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ rows.fecha_registro | timeAgo }}</small>
                                </div>
                            </div>
                            <h6 class="text-sm mt-1 mb-0">{{ rows.empleado }}</h6>
                            <div class="mt-3">
                                <span class="badge badge-pill badge-primary text-size-13">{{ rows.nombre_empresa }}</span>
                                <span class="badge badge-pill badge-primary text-size-13">{{ rows.nombre_sede }}</span>
                                <span class="badge badge-pill badge-primary text-size-13">{{ rows.area }}</span>
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-sm btn-outline-primary">Sigga</button>
                                <button type="button" class="btn btn-sm btn-outline-warning" ng-click="removerEmpleadoOficina(rows.id_sg_personal)">Remover</button>
                                <button type="button" class="btn btn-sm btn-danger" ng-show="empleadoAsignado == rows.id_sg_personal" ng-click="eliminaEmpleadoOficina(rows.id_sg_personal, rows.id_sg_oficina)">Si</button>
                                <button type="button" class="btn btn-sm btn-info" ng-show="empleadoAsignado == rows.id_sg_personal" ng-click="cancelaRemover()">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Core\Views::add('app.cms.dashboard.empresas.components.modals'); ?>