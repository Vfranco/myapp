<div class="header bg-{{background}} pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-12">
                    <h6 class="h2 text-white d-inline-block mb-0">Monitor</h6>                    
                    <a href="javascript:" class="btn btn-sm btn-info" ng-click="showMiPersonal()">Mi Personal</a>
                    <a href="javascript:" class="btn btn-sm btn-primary" ng-click="showMisVisitantes()">Mis Visitantes</a>
                    <a href="javascript:" class="btn btn-sm btn-warning" ng-click="showMisContratistas()">Mis Contratistas</a>
                </div>                
            </div>
            <!-- personal -->
            <?php Core\Views::add('app.cms.dashboard.control.components.personal'); ?>
            <!-- end personal -->

            <!-- visitantes -->
            <?php Core\Views::add('app.cms.dashboard.control.components.visitantes'); ?>
            <!-- end visitantes -->

            <!-- contratistas -->
            <?php Core\Views::add('app.cms.dashboard.control.components.contratistas'); ?>
            <!-- end contratistas -->
        </div>
    </div>
</div>
<!-- grid -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <!-- mi personal -->
            <?php Core\Views::add('app.cms.dashboard.control.components.gridpersonal'); ?>
            <!-- mi personal -->

            <!-- mis visitantes -->
            <?php Core\Views::add('app.cms.dashboard.control.components.gridvisitantes'); ?>
            <!-- mis visitantes -->

            <!-- mis contratistas -->
            <?php Core\Views::add('app.cms.dashboard.control.components.gridcontratistas'); ?>
            <!-- mis contratistas -->
        </div>
    </div>
</div>