<div class="row" ng-show="misvisitantes">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Resumen de Registros Mis Visitantes</h3>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Visitante</th>
                            <th scope="col" class="sort" data-sort="budget">Cédula</th>
                            <th scope="col" class="sort" data-sort="status">Entrada</th>
                            <th scope="col" class="sort" data-sort="status">Salida</th>
                            <th scope="col" class="sort" data-sort="status">Torre</th>
                            <th scope="col" class="sort" data-sort="status">Piso</th>
                            <th scope="col" class="sort" data-sort="status">Oficina</th>
                            <th scope="col" class="sort" data-sort="status">Área</th>
                            <th scope="col" class="sort" data-sort="status">Estado</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr ng-repeat="rows in registrosMisVisitantes">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <a href="javascript:" class="avatar rounded-circle mr-3">
                                        <div ng-if="rows.photo == '0'">
                                            <img alt="{{rows.nombres_visitante}}" src="<?php echo BASE_URL ?>Content/assets/img/empleado.png">
                                        </div>
                                        <div ng-if="rows.photo != '0'">
                                            <img alt="{{rows.nombres_visitante}}" src="http://api.sigga.com.co/Content/{{ rows.photo }}" height="48" width="48">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{rows.nombres_visitante}}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{rows.cedula}}
                            </td>
                            <td class="budget">
                                <strong>{{rows.fecha_visita}}</strong>
                            </td>
                            <td class="budget">
                                <strong class="{{(rows.salida_visita == '0000-00-00 00:00:00') ? 'text-primary' : ''}}">{{rows.salida_visita | notDateRegister | uppercase}}</strong>
                            </td>
                            <td class="budget">
                                {{rows.nombre_torre}}
                            </td>
                            <td class="budget">
                                {{rows.piso_nivel}}
                            </td>
                            <td class="budget">
                                {{rows.oficina}}
                            </td>
                            <td class="budget">
                                {{rows.area}}
                            </td>
                            <td class="budget">
                                <span class="text-{{ (rows.estado_salida == 0) ? 'success' : 'danger'  }} mr-2"><i class="fa fa-arrow-{{ (rows.estado_salida == 0) ? 'up' : 'down'  }}"></i> {{ (rows.estado_salida == 0) ? 'Ingreso' : 'Salida'  }}</span>
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-primary" href="javascript:" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="javascript:">Dar Salida</a>
                                    </div> -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>