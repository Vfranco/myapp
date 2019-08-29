<div id="verEmpleados" ng-hide="showDetailsEmpleado">
    <div class="card" ng-class="{'flipInY animated' : showDetailsEmpleado == true}">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Residente</h5>
                </div>
                <div class="col text-right">
                    <button class="btn btn-sm btn-info ng-hide" ng-click="editEmpleado()" ng-show="enableDetails">Editar</button>
                    <button class="btn btn-sm btn-danger ng-hide" ng-click="cancelDetail()" ng-show="enableDetails"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="card-header py-0">

        </div>
        <div class="card-body">
            <!-- List group -->
            
        </div>
    </div>
</div>