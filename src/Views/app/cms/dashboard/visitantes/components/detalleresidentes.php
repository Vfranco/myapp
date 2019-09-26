<div class="col-lg-8" ng-show="panelResidente">
    <div id="apartamentoDetalles">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Resumen de Apartamentos | <small class="badge badge-info">{{dataApartamentos.length}}</small></h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info"><i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="closeDetalleApartamentos()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive customScroll {{ setScroll(dataApartamentos) }}" ng-class="{'removeScroll' : searchDataApto.length > 0}">
                <table id="detalles-mis-oficinas" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Torre</th>
                            <th>Piso</th>
                            <th>Apartamento</th>
                            <th>Registro Sistema</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-if="dataApartamentos.length == 0 && loaddataApartamentos == false">
                            <td colspan="6" class="text-center">
                                <span class="badge badge-default">No hay registros</span>
                            </td>
                        </tr>
                        <tr ng-if="loaddataApartamentos">
                            <td colspan="6" class="text-center">
                                <span class="badge badge-default">Cargando...</span>
                            </td>
                        </tr>                        
                        <tr class="hover" ng-repeat="rows in dataApartamentos | filter:searchDataApto as result">
                            <td>{{ rows.nombre_torre }}</td>
                            <td>{{ rows.piso_apto }}</td>
                            <td>{{ rows.numero_apto }}</td>
                            <td>{{ rows.fecha_creacion }}</td>
                            <td><span class="badge badge-{{ (rows.id_sg_estado == 4) ? 'success' : 'danger'  }}">{{ (rows.id_sg_estado == 4) ? 'Arrendado' : 'Desocupado' }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- gridResidentes -->
<div class="col-lg-8" ng-show="gridResidentes">
    <div id="apartamentoDetalles">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Resumen de Residentes | <small class="badge badge-info">{{gridDetalleResidentes.length}}</small></h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info"><i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" ng-click="closeDetalleResidentes()"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive customScroll {{ setScroll(gridDetalleResidentes) }}" ng-class="{'removeScroll' : searchDataApto.length > 0}">
                <table id="detalles-mis-oficinas" class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Torre</th>
                            <th>Piso</th>
                            <th>Apto</th>
                            <th>Residente</th>                            
                            <th>Correo</th>
                            <th>Fecha Registro</th>                            
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-if="gridDetalleResidentes.length == 0 && loadgridDetalleResidentes == false">
                            <td colspan="7" class="text-center">
                                <span class="badge badge-default">No hay registros</span>
                            </td>
                        </tr>
                        <tr ng-if="loadgridDetalleResidentes">
                            <td colspan="7" class="text-center">
                                <span class="badge badge-default">Cargando...</span>
                            </td>
                        </tr>
                        <tr ng-if="result <= 0">
                            <td colspan="7" class="text-center">
                                <span class="badge badge-default">No se encontraron datos</span>
                            </td>
                        </tr>
                        <tr class="hover" ng-repeat="rows in gridDetalleResidentes | filter:searchDataApto as result">
                            <td>{{ rows.nombre_torre }}</td>
                            <td>{{ rows.piso_apto }}</td>
                            <td>{{ rows.numero_apto }}</td>
                            <td>{{ rows.residente }}</td>
                            <td>{{ rows.correo_residente }}</td>
                            <td>{{ rows.fecha_creacion | timeAgo }}</td>
                            <td><span class="badge badge-{{ (rows.id_sg_estado == 4) ? 'success' : 'danger'  }}">{{ (rows.id_sg_estado == 4) ? 'Arrendado' : 'Desocupado' }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- detalle residentes -->
<div class="col-lg-4" ng-hide="panelDetalleResidente">
    <div id="verIntegrantes">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0">Residente Detalles</h5>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-sm btn-info ng-hide">Editar</button>
                        <button class="btn btn-sm btn-danger ng-hide"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-header py-0">

            </div>
            <div class="card-body">
                <alert-message type="{{type}}" message="{{ messageDeleteResidente }}" ng-show="showMessageDeleteResidente"></alert-message>
                <div class="row align-items-center" ng-show="dataIntegrantes.length <= 0">
                    <div class="col-lg-12 text-center">{{ muestraMensajeCarga }}</div>
                </div>
                <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed" ng-repeat="rows in dataIntegrantes | filter:searchIntegrante as result">
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
                            <h6 class="text-sm mt-1 mb-0">{{ rows.residente }}</h6>
                            <div class="mt-3">
                                <span class="badge badge-pill badge-primary text-size-13">{{ rows.nombre_torre }}</span>
                                <span class="badge badge-pill badge-primary text-size-13">Piso {{ rows.piso_apto }}</span>
                                <span class="badge badge-pill badge-primary text-size-13">Apto {{ rows.numero_apto }}</span>
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-sm btn-outline-primary">Sigga</button>
                                <button type="button" class="btn btn-sm btn-outline-warning" ng-click="removerResidente(rows.id_sg_residente)">Retirar</button>
                                <button type="button" class="btn btn-sm btn-danger" ng-show="residenteAsignado == rows.id_sg_residente" ng-click="eliminaResidente(rows.id_sg_residente)">Si</button>
                                <button type="button" class="btn btn-sm btn-info" ng-show="residenteAsignado == rows.id_sg_residente" ng-click="cancelaRemover()">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>