<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0 d-flex justify-content-center mr-5">Integrantes {{ area }}</h5>
                </div>
                <div class="col text-right">
                    <button class="btn btn-sm btn-primary">Ampliar Detalle</button>
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