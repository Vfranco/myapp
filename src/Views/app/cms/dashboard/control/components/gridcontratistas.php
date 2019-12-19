<div class="row" ng-show="miscontratistas">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Resumen de Registros Mis Contratistas</h3>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Contratista</th>
                            <th scope="col" class="sort" data-sort="status">Empleado</th>
                            <th scope="col" class="sort" data-sort="status">Cédula</th>
                            <th scope="col" class="sort" data-sort="status">Entrada</th>
                            <th scope="col" class="sort" data-sort="status">Salida</th>
                            <th scope="col" class="sort" data-sort="status">Estado</th>
                            <th scope="col" class="sort" data-sort="status">ARL</th>
                            <th scope="col" class="sort" data-sort="status">EPS</th>
                            <th scope="col" class="sort" data-sort="status">Estado ARL</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr ng-repeat="rows in registrosMisContratistas">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <a href="javascript:" class="avatar rounded-circle mr-3">
                                        <div ng-if="rows.photo == 'photo'">
                                            <img alt="{{rows.nombre_proveedor}}" src="<?php echo BASE_URL ?>Content/assets/img/empleado.png">
                                        </div>
                                        <div ng-if="rows.photo != 'photo'">
                                            <img alt="{{rows.nombre_proveedor}}" src="http://api.sigga.com.co/Content/{{ rows.photo }}" height="48" width="48">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ rows.nombre_proveedor }}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{rows.nombres_personal}}
                            </td>
                            <td class="budget">
                                {{rows.cedula_proveedor}}
                            </td>
                            <td class="budget">
                                <strong>{{rows.fecha_entrada}}</strong>
                            </td>
                            <td class="budget">
                                <strong class="{{(rows.fecha_salida == '0000-00-00 00:00:00') ? 'text-primary' : ''}}">{{rows.fecha_salida | notDateRegister | uppercase}}</strong>
                            </td>
                            <td class="budget">
                                <span class="text-{{ (rows.estado_salida == 0) ? 'success' : 'danger'  }} mr-2"><i class="fa fa-arrow-{{ (rows.estado_salida == 0) ? 'up' : 'down'  }}"></i> {{ (rows.estado_salida == 0) ? 'Ingreso' : 'Salida'  }}</span>
                            </td>
                            <td class="budget">
                                {{rows.nombre_arl}}
                            </td>
                            <td class="budget">
                                {{rows.nombre_eps}}
                            </td>
                            <td class="budget">
                                <span class="text-{{ (rows.estado_arl == '1') ? 'success' : 'danger'  }} mr-2"><i class="fa fa-{{ (rows.estado_arl == '1') ? 'check' : 'times'  }}"></i> {{ (rows.estado_arl == '1') ? 'Activa' : 'Inactiva'  }}</span>
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