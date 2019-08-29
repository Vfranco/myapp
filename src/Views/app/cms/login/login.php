<?php Core\Views::addLayout('app.header') ?>

<body class="bg-default" ng-controller="login">
	<div class="main-content">
		<!-- Navbar -->
		<nav d="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
			<div class="container px-4">
				<a class="navbar-brand no-uppercase" href="/">
					<!-- <img src="../assets/img/brand/white.png" /> -->Sigga
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-collapse-main">
					<!-- Collapse header -->
					<div class="navbar-collapse-header d-md-none">
						<div class="row">
							<div class="col-6 collapse-brand">
								<a href="/">
									<!-- <img src="../assets/img/brand/blue.png"> -->Sigga
								</a>
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
							<a href="/registro/creacuenta" class="btn btn-primary btn-icon">
								<span class="nav-link-inner--text">Crea tu cuenta</span>
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
		<div class="header bg-gradient-primary py-7 py-lg-8">
			<div class="container">
				<div class="header-body text-center">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-8">
							<h1 class="text-white">Bienvenido a <?php echo APP_TITLE; ?></h1>
							<p class="text-lead text-light">Sistema de gestión de actividades y control de personal para su empresa</p>
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
								<img class="img-fluid" src="<?php echo BASE_URL; ?>Content/assets/img/sigga-logo-2.png" style="height: 191px;">
								<!-- <a href="/" class="btn btn-neutral btn-icon">									
									<span class="btn-inner--text"><?php echo APP_TITLE; ?></span>
								</a> -->
							</div>
						</div>
						<div class="card-body px-lg-5 py-lg-4">
							<div class="text-center text-muted mb-4">
								<small>Tu Usuario registrado</small>
							</div>
							<form id="frm-init-login" role="form" action="javascript:" method="post" autocomplete="off" ng-submit="dologin()">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-circle-08"></i></span>
										</div>
										<input ng-model="user" class="form-control required" name="userAcl" placeholder="Tu Correo Registrado" type="email" ng-disabled="btnStatusLogin">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input ng-model="pass" class="form-control required" name="passAcl" placeholder="Contraseña" type="password" ng-disabled="btnStatusLogin">
									</div>
								</div>
								<div class="custom-control custom-control-alternative custom-checkbox">
									<input class="custom-control-input" id=" customCheckLogin" type="checkbox">
									<label class="custom-control-label" for=" customCheckLogin">
										<span class="text-muted">Recordarme</span>
									</label>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary my-4" ng-disabled="btnStatusLogin" ng-cloak>{{ btnStart }}</button>
								</div>
							</form>
							<div class="alert alert-danger text-center" ng-show="statusError" role="alert" ng-cloak>{{ messageError }}</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<a href="javascript:" class="text-light"><small>Olvidaste tu contraseña ?</small></a>
						</div>
						<div class="col-6 text-right">
							<a href="/registro/creacuenta" class="text-light"><small>Crea tu cuenta Sigga</small></a>
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