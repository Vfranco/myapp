<div class="header bg-misterminales pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Resumenes -->
            <?php Core\Views::add('app.cms.dashboard.configuracion.components.general', ['id_sg_usuario' => $id_sg_usuario]); ?>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">    
    <?php Core\Views::add('app.cms.dashboard.configuracion.components.settings', ['id_sg_usuario' => $id_sg_usuario]); ?>
</div>