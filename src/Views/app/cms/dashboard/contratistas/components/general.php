<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Mis Contratistas</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="javascript:">Resumen General</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?php if (!Models\Usuario\ModelUsuario::verificarUnidad($id_sg_usuario)) : ?>
                            <h5 class="card-title text-uppercase text-muted mb-0"><?php echo Models\Usuario\ModelUsuario::checkTipoControl($id_sg_usuario)[0]['tipo_control']; ?></h5>
                            <span class="h2 font-weight-bold mb-0"><?php echo Models\Usuario\ModelUsuario::ObtenerUnidadResidencial($id_sg_usuario)[0]['nombre_unidad']; ?></span>
                        <?php else : ?>
                            <h5 class="card-title text-uppercase text-muted mb-0"><?php echo Models\Usuario\ModelUsuario::checkTipoControl($id_sg_usuario)[0]['tipo_control']; ?></h5>
                            <span class="h2 font-weight-bold mb-0"><?php echo Models\Usuario\ModelUsuario::ObtenerEmpresa($id_sg_usuario)[0]['nombre_empresa']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-app"></i>
                        </div>
                    </div>                    
                </div>
                <p class="mt-3 mb-0 text-sm d-flex">
                    <a href="javascript:" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-notification">Gestionar</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Mis Proveedores</h5>
                        <span class="h2 font-weight-bold mb-0">6</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-building"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm d-flex">
                    <a href="javascript:" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-notification">Detalles</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Entrada/Salidas</h5>
                        <span class="h2 font-weight-bold mb-0">1</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-chart-bar-32"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm d-flex">
                    <a href="javascript:" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-notification">Detalles</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0"><?php echo Models\Usuario\ModelUsuario::ObtenerPlanByEmpresa($id_sg_usuario)[0]['nombre_plan']; ?></h5>
                        <span class="h2 font-weight-bold mb-0">{{ <?php echo Models\Usuario\ModelUsuario::ObtenerPlanByEmpresa($id_sg_usuario)[0]['costo']; ?> | currency }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                            <i class="ni ni-money-coins"></i>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Mas información click</span>
                    <a href="javascript:" class="btn btn-sm btn-primary ml-2">Planes</a>
                </p>
            </div>
        </div>
    </div>
</div>