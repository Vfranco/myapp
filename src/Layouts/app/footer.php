<?php Core\Html::js("vendor/jquery/dist/jquery.min"); ?>
<?php Core\Html::js("vendor/bootstrap/dist/js/bootstrap.bundle.min"); ?>
<?php Core\Html::js("vendor/js-cookie/js.cookie"); ?>
<?php Core\Html::js("vendor/jquery.scrollbar/jquery.scrollbar.min"); ?>
<?php Core\Html::js("vendor/jquery-scroll-lock/dist/jquery-scrollLock.min"); ?>
<?php Core\Html::js("vendor/select2/dist/js/select2.min"); ?>
<?php Core\Html::js("vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min"); ?>
<?php Core\Html::js("vendor/nouislider/distribute/nouislider.min"); ?>
<?php Core\Html::js("vendor/bootstrap-notify/bootstrap-notify.min"); ?>
<!-- Optional JS -->
<?php Core\Html::js("vendor/chart.js/dist/Chart.min"); ?>
<?php Core\Html::js("vendor/chart.js/dist/Chart.extension"); ?>
<!-- Argon JS -->
<?php Core\Html::js("js/argon.min"); ?>
<!-- Controllers -->
<?php if(Core\ActionFilters::noSession('sigga:usr')):?>
    <?php Core\Html::app("production/sigga-factorys.min"); ?>
    <?php Core\Html::app("production/sigga-login.min"); ?>    
<?php else: ?>
    <?php Core\Html::app("production/app-directives.min"); ?>
    <?php Core\Html::app("production/app-factorys.min"); ?>
    <?php Core\Html::app("production/app-filters.min"); ?>    
    <?php Core\Html::app("production/app.min"); ?>
<?php endif; ?>
