<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Detalle Integrantes</h5>
                </div>
                <div class="col text-right">
                    <button class="btn btn-sm btn-primary">Ampliar Detalle</button>
                </div>
            </div>
        </div>
        <div class="card-header py-0">

        </div>
        <div class="card-body">
            <div class="row align-items-center" ng-hide="integrantesOficina.length > 0">
                <div class="col-lg-12 text-center">No hay datos que mostrar</div>
            </div>
            <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed" ng-repeat="rows in integrantesOficina">
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
                        <h6 class="text-sm mt-1 mb-0">{{ rows.nombres_personal }} {{ rows.apellidos_personal }}</h6>
                        <div class="mt-3">
                            <span class="badge badge-pill badge-info text-size-13">{{ rows.nombre_oficina }}</span>
                            <span class="badge badge-pill badge-danger text-size-13">Extensión {{ rows.extension }}</span>                            
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-sm btn-outline-primary">Sigga</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>