<div class="row" ng-show="mipersonal">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Resumen de Registros Mi Personal</h3>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Empleado</th>
                            <th scope="col" class="sort" data-sort="budget">Cédula</th>
                            <th scope="col" class="sort" data-sort="budget">Entrada</th>
                            <th scope="col" class="sort" data-sort="status">Salida</th>
                            <th scope="col" class="sort" data-sort="status">Sede</th>
                            <th scope="col" class="sort" data-sort="status">ARL</th>
                            <th scope="col" class="sort" data-sort="status">EPS</th>
                            <th scope="col" class="sort" data-sort="status">Estado</th>                            
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr ng-repeat="rows in registrosMiPersonal">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <a href="javascript:" class="avatar rounded-circle mr-3">
                                        <div ng-if="rows.photo_personal == '0'">
                                            <img alt="{{rows.nombres_personal}}" src="<?php echo BASE_URL ?>Content/assets/img/empleado.png">    
                                        </div>
                                        <div ng-if="rows.photo_personal != '0'">
                                            <img alt="{{rows.nombres_personal}}" src="http://api.sigga.com.co/Content/{{ rows.photo_personal }}" height="48" width="48">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{rows.nombres_personal}} {{ rows.apellidos_personal }}</span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                {{rows.cedula_personal}}
                            </td>
                            <td class="budget">
                                <strong>{{rows.fecha_ingreso}}</strong>
                            </td>
                            <td class="budget">
                                <strong class="{{(rows.fecha_salida == '0000-00-00 00:00:00') ? 'text-primary' : ''}}">{{rows.fecha_salida | notDateRegister | uppercase}}</strong>
                            </td>
                            <td class="budget">
                                {{rows.nombre_sede}}
                            </td>
                            <td class="budget">
                                {{rows.nombre_arl}}
                            </td>
                            <td class="budget">
                                {{rows.nombre_eps}}
                            </td>
                            <td class="status">
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