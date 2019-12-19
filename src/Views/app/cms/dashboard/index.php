<?php Core\Views::addLayout('app.header'); ?>

<body>
    <?php if (!Models\Usuario\ModelUsuario::verificarEmpresas($id_sg_usuario) || !Models\Usuario\ModelUsuario::verificarUnidad($id_sg_usuario) || !Models\Usuario\ModelUsuario::verificarProveedor($id_sg_usuario)) : ?>
        <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <div class="sidenav-header d-flex align-items-center">
                    <a class="navbar-brand" href="javascript:">
                        <img src="<?php echo BASE_URL; ?>Content/assets/img/sigga-logo-2.png" class="navbar-brand-img">
                    </a>
                    <div class="ml-auto">
                        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-inner">
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <?php if (isset($_SESSION['sigga:owner'])) : ?>
                                    <?php Models\Menu\ModelMenu::BuildMenuFromUser($_SESSION['sigga:usr']); ?>
                                    <!-- <a class="nav-link" href="#!/control">
                                        <i class="ni ni-ui-04 text-info"></i>
                                        <span class="nav-link-text">Entrada/Salidas</span>
                                    </a> -->
                                    <a class="nav-link" href="#!/monitor">
                                        <i class="ni ni-sound-wave text-success"></i>
                                        <span class="nav-link-text">Monitor</span>
                                    </a>
                                <?php else : ?>
                                    <?php Models\Menu\ModelMenu::BuildMenuFromUser($id_sg_usuario); ?>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <h6 class="navbar-heading p-0 text-muted">Mas Opciones</h6>
                        <ul class="navbar-nav mb-md-3">
                            <li class="nav-item">
                                <a class="nav-link" href="/authentication/logout">
                                    <i class="ni ni-button-power"></i>
                                    <span class="nav-link-text">Desconectarme</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-misvisitantes border-bottom padding-4">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none"><span class="text-white">Sigga</span></li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="javascript:" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="<?php echo BASE_URL ?>Content/assets/img/sigga-logo-profile.png">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?php echo $email; ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bienvenido!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Mi Perfil</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="/authentication/logout" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Desconectarme</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div ng-view>

        </div>
    </div>
    <?php Core\Views::addLayout('app.footer'); ?>
</body>

</html>