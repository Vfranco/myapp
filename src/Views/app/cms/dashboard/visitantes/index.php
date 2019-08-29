<div class="header bg-misvisitantes pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Resumenes -->
            <?php Core\Views::add('app.cms.dashboard.visitantes.components.general'); ?>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <!-- Tarjetas Administrativas -->
    <div class="row">
        <div class="col-4">
            <?php Core\Views::add('app.cms.dashboard.visitantes.components.apartamentos'); ?>
        </div>
        <div class="col-4">
            <?php Core\Views::add('app.cms.dashboard.visitantes.components.residentes'); ?>
        </div>
        <div class="col-4">
            <?php Core\Views::add('app.cms.dashboard.visitantes.components.detalle'); ?>
        </div>
    </div>
</div>