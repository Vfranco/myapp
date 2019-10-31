<div class="header bg-misterminales pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Resumenes -->
            <?php Core\Views::add('app.cms.dashboard.terminales.components.general', ['id_sg_usuario' => $id_sg_usuario]); ?>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <?php Core\Views::add('app.cms.dashboard.terminales.components.resumen', ['id_sg_usuario' => $id_sg_usuario]); ?>
        <?php Core\Views::add('app.cms.dashboard.terminales.components.terminal', ['id_sg_usuario' => $id_sg_usuario]); ?>
    </div>
</div>
