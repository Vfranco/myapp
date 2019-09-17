<script type="text/javascript">    
<?php if(Core\ActionFilters::noSession('sigga:usr')): ?>
    var route = '/';    
<?php else: ?>
        var app = angular.module('sigga', ['ngRoute', 'duScroll', 'rx']);
        var tipocontrol = '<?php echo Models\Usuario\ModelUsuario::checkTipoControl(Models\Usuario\ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr'])['id_sg_usuario'])[0]['id_sg_tipo_control']; ?>';        
        app.config(['$routeProvider', '$httpProvider', '$compileProvider', function($routeProvider, $httpProvider, $compileProvider){

            $compileProvider.debugInfoEnabled(false);
            $compileProvider.commentDirectivesEnabled(false);
            $compileProvider.cssClassDirectivesEnabled(false);

            $httpProvider.defaults.headers.common = {
                'X-Requested-With'  : 'XHRHttpRequest'
            };

            $routeProvider.when('/', {})
<?php foreach(Models\Usuario\ModelUsuario::ObtenerRutas($_SESSION['sigga:usr']) as $route): ?>
    <?php if($route['estado'] == '1'):?>        
        .when('<?php echo $route['route']; ?>', { templateUrl : '<?php echo $route['route']?>/index', controller : '<?php echo str_replace('/', '', $route['route']); ?>' })
    <?php endif; ?>
<?php endforeach; ?>.otherwise({ redirecTo : '/' });
}]);
<?php endif; ?>
</script>