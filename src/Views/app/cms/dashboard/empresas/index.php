<?php if(count(Models\Empresa\ModelEmpresa::ObtenerListadoEmpresas($id_sg_usuario)) <= 0): ?>
    <?php Core\Views::add('app.cms.dashboard.empresas.components.asisstant', ['email' => $email]) ?>
<?php else: ?>
    <?php Core\Views::add('app.cms.dashboard.empresas.components.mipersonal', ['userid' => $id_sg_usuario]) ?>
<?php endif; ?>