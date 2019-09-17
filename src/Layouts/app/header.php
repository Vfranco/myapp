<!DOCTYPE html>
<html ng-app="sigga">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-Xss-Protection" content="'1; mode=block' always">
  <meta http-equiv="X-Content-Type-Options" content="'nosniff' always">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="SIGGA, Sistema de Control de Accesos">
  <meta name="author" content="AREATIC S.A.S">
  <meta name="theme-color" content="#6d118b">
  <link rel="icon" type="image/png" href="favicon.ico"/>
  <title><?php echo APP_TITLE; ?></title>
  <?php Core\Html::app('lib/angularjs/angular');?>
  <?php Core\Html::app('lib/angularjs/angular-animate.min');?>
  <?php Core\Html::app('lib/angularjs/angular-route');?>
  <?php Core\Html::app('lib/angularjs/angular-infinite-scroll');?>
  <?php Core\Html::app('lib/angularjs/angular-scroll.min');?>  
  <?php Core\Html::app('lib/rxjs/rx.all');?>
  <?php Core\Html::app('lib/rxjs/rx.angular.min');?>
  <?php Core\Html::app('lib/rxjs/rx.dom');?>
  <?php Core\Html::app('lib/moment/moment.min');?>
  <?php Core\Html::app('lib/moment/moment.locale.min');?>  
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <?php Core\Html::app('lib/Crypto/base64');?>
  <?php Core\Html::app('lib/Crypto/Crypto');?>
  <?php Core\Html::css("vendor/nucleo/css/nucleo"); ?>
  <?php Core\Html::css("vendor/@fortawesome/fontawesome-free/css/all.min"); ?>
  <?php Core\Html::css("css/argon.min"); ?>
  <?php Core\Html::css("css/app"); ?>
  <?php if(Core\ActionFilters::noSession('sigga:usr')):?>
    <?php Core\Html::app('app');?>
  <?php else: ?>      
    <?php Core\Views::add('route'); ?>
  <?php endif; ?>  
  <script type="text/javascript">
    /** Sigga 1.0 beta */
    var uid = '<?php echo (!isset($_SESSION['sigga:usr'])) ? '' : $_SESSION['sigga:usr']; ?>';
    var baseurl = '<?php echo API_REST; ?>';
    var iduser = '' ;
    /** Sigga 1.0 beta */
    moment.locale('es');
  </script>
</head>