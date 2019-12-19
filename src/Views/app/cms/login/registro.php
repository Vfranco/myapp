<?php Core\Views::addLayout('app.header') ?>

<body class="bg-default" ng-controller="registro">
    <div class="main-content">
        <!-- Navbar -->
        <nav d="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
            <div class="container px-4">
                <a class="navbar-brand no-uppercase" href="/">Sigga</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="/">Sigga</a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Navbar items -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">							
							<a href="/" class="btn btn-primary btn-icon">								
								<span class="nav-link-inner--text">Inicia Sesión</span>
							</a>
						</li>
                    </ul>
                    <hr class="d-lg-none" />
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Danos un me gusta">
                                <i class="fab fa-facebook-square"></i>
                                <span class="nav-link-inner--text d-lg-none">Facebook</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Siguenos en Instagram">
                                <i class="fab fa-instagram"></i>
                                <span class="nav-link-inner--text d-lg-none">Instagram</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Twitteame">
                                <i class="fab fa-twitter-square"></i>
                                <span class="nav-link-inner--text d-lg-none">Twitter</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-gradient-primary py-6 py-lg-7">
            <div class="container">
                <div class="header-body text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-8">
                            <h1 class="text-white">Crea tu cuenta <?php echo APP_TITLE; ?></h1>
                            <p class="text-lead text-light">Escoge el paquete que más se ajuste a tus necesidades, y empieza a usar Sigga</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 mt-5">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-transparent" style="padding: 0px;">
                            <div class="btn-wrapper text-center">
                                <img class="img-fluid" src="<?php echo BASE_URL; ?>Content/assets/img/sigga-logo-2.png" style="height: 150px;">
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-4">
                            <div class="text-center text-muted mb-4" ng-hide="createdUser">
                                <small>Ingresa tus datos</small>
                            </div>
                            <div ng-hide="createdUser">
                                <form id="frm-init-register" role="form" action="javascript:" method="post" autocomplete="off" ng-submit="doRegister()">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                            </div>
                                            <input ng-model="nombres" class="form-control required" name="nombres" placeholder="Nombres" type="text" ng-disabled="btnStatusRegister">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                            </div>
                                            <input ng-model="apellidos" class="form-control required" name="apellidos" placeholder="Apellidos" type="text" ng-disabled="btnStatusRegister">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input ng-model="correo" class="form-control required" ng-class="{'is-valid' : emailExist}" name="correo" placeholder="Tu correo, será tu usuario Sigga" type="text" ng-disabled="btnStatusRegister" ng-keyup="checkEmail()">
                                            <div class="text-center" ng-if="emailExist" ng-class="{'valid-feedback' : emailExist}" ng-cloak>
                                                {{ messageEmailExist }}
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input ng-model="pass" class="form-control required" name="pass" placeholder="Crea tu contraseña Sigga" type="password" ng-disabled="btnStatusRegister">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input ng-model="confirm" class="form-control required" name="confirm" placeholder="Confirma tu contraseña" type="password" ng-disabled="btnStatusRegister">
                                        </div>
                                    </div>
                                    <!-- <div class="text-muted font-italic mb-3" ng-if="pass.length > 0" ng-cloak><small>tu contraseña: <span class="text-success font-weight-700">{{ howStrongIsPassword() }}</span></small></div> -->
                                    <div class="text-muted font-italic mb-3" ng-if="confirm.length > 0" ng-cloak><small>Confirmación: <span class="text-success font-weight-700">{{ comparePasswords() }}</span></small></div>
                                    <div class="form-group mb-3">
                                        <label class="form-control-label" for="planComboBox">Tu Paquete</label>
                                        <select ng-model="plan" class="form-control required" id="planComboBox" name="plan">
                                            <option value="">Selecciona tu Paquete</option>
                                            <?php foreach($planes as $id => $plan):?>
                                                <?php if($plan['id_sg_estado'] == 1):?>
                                                    <option value="<?php echo $plan['id_sg_plan']; ?>" ng-selected="true"><?php echo $plan['nombre_plan']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>                                
                                    <div class="row my-4">
                                        <div class="col-12">
                                            <div class="custom-control custom-control-alternative custom-checkbox">
                                                <input class="custom-control-input" id="customCheckRegister" type="checkbox" ng-model="acceptTerms" ng-checked="accepTerms">
                                                <label class="custom-control-label" for="customCheckRegister">
                                                    <span class="text-muted">Manifiesto estar de acuerdo, con los <a href="javascript:">Terminos y condiciones de Sigga</a></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4" ng-disabled="btnRegister" ng-cloak><i class="ni ni-send"></i> {{ btnStart }}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="alert alert-{{typeError}} text-center" ng-show="statusError" role="alert" ng-cloak> {{ messageError }}</div>
                            <div ng-show="createdUser">
                                <div class="row">
                                    <div class="col text-center">
                                        <a href="/" class="btn btn-primary">Inicia Sesión con tu Cuenta Sigga!</a>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">						
						<div class="col text-right">
							<a href="/" class="text-light"><small>¿ Ya tienes una cuenta ?</small></a>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-3">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">AREATIC S.A.S</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
							<a href="https://apps.co" class="nav-link font-weight-bold text-primary" target="_blank">Certificados Apps.co Ministerio de las TIC</a>
						</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank"><?php echo APP_TITLE . " " . CMS_VERSION; ?> beta</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php Core\Views::addLayout('app.footer') ?>
</body>

</html>