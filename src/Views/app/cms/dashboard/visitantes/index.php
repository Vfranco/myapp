<div class="header bg-misvisitantes pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Resumenes -->            
            <?php Core\Views::add('app.cms.dashboard.visitantes.components.general', ['id_sg_usuario' => $id_sg_usuario]); ?>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <!-- Tarjetas Administrativas -->
    <div class="row">
        <div class="col-lg-4">
            <?php if(Models\Usuario\ModelUsuario::checkTipoControl($id_sg_usuario)[0]['elementos'] === 'Apartamentos &oacute; Casas'):?>
                <?php Core\Views::add('app.cms.dashboard.visitantes.components.apartamentos', ['id_sg_usuario' => $id_sg_usuario]); ?>
            <?php else: ?>
                <?php Core\Views::add('app.cms.dashboard.visitantes.components.oficinas', ['id_sg_usuario' => $id_sg_usuario]); ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4">
            <?php if(Models\Usuario\ModelUsuario::checkTipoControl($id_sg_usuario)[0]['elementos'] === 'Apartamentos &oacute; Casas'):?>
                <?php Core\Views::add('app.cms.dashboard.visitantes.components.residentes', ['id_sg_usuario' => $id_sg_usuario]); ?>
            <?php else: ?>
                <?php Core\Views::add('app.cms.dashboard.visitantes.components.detalleoficina', ['id_sg_usuario' => $id_sg_usuario]); ?>
            <?php endif; ?>
        </div>
        <div class="col-lg-4">
            <?php if(Models\Usuario\ModelUsuario::checkTipoControl($id_sg_usuario)[0]['elementos'] === 'Apartamentos &oacute; Casas'):?>
                <?php Core\Views::add('app.cms.dashboard.visitantes.components.detalleresidentes', ['id_sg_usuario' => $id_sg_usuario]); ?>
            <?php else: ?>
                <?php Core\Views::add('app.cms.dashboard.visitantes.components.detalleintegrantes', ['id_sg_usuario' => $id_sg_usuario]); ?>
            <?php endif; ?>
        </div>
    </div>
</div>