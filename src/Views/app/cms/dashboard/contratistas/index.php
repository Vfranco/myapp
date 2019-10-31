<div class="header bg-miscontratistas pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Resumenes -->
            <?php Core\Views::add('app.cms.dashboard.contratistas.components.general', ['id_sg_usuario' => $id_sg_usuario]); ?>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <?php Core\Views::add('app.cms.dashboard.contratistas.components.proveedores', ['id_sg_usuario' => $id_sg_usuario]); ?>
        <?php Core\Views::add('app.cms.dashboard.contratistas.components.detalleproveedores', ['id_sg_usuario' => $id_sg_usuario]); ?>
        <?php Core\Views::add('app.cms.dashboard.contratistas.components.actividades', ['id_sg_usuario' => $id_sg_usuario]); ?>
    </div>
</div>