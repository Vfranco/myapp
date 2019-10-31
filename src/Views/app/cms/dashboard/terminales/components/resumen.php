<div class="col-xl-3">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="h3 mb-0">Terminales</h5>
                </div>                
            </div>
        </div>
        <div class="card-header py-0">
            <form action="javascript:" method="post" autocomplete="off">
                <div class="form-group mb-0">
                    <div class="input-group input-group-lg input-group-flush">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-search"></span>
                            </div>
                        </div>
                        <input ng-model="searchTerminal" type="search" class="form-control" placeholder="Buscar" ng-disabled="terminales.length <= 0">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0 hover" ng-if="terminales.length <= 0">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <small>No hay terminales</small>
                        </div>
                    </div>
                </li>
                <li class="list-group-item px-0 hover" ng-if="terminales.length > 0" ng-repeat="rows in terminales | filter : searchTerminal" ng-click="showOptionsList(rows.id_sg_terminal_usuario)">
                    <div class="row align-items-center" ng-hide="selectedRow == rows.id_sg_terminal_usuario">
                        <div class="col-auto">
                            <a href="javascript:" class="avatar rounded-circle">
                                <img src="<?php echo BASE_URL; ?>Content/assets/img/terminal.png" />
                            </a>
                        </div>
                        <div class="col ml--2">
                            <h4 class="mb-0">
                                <a href="javascript:">{{ rows.nombre_sede }}</a>
                            </h4>
                            <span class="text-{{(rows.id_sg_estado == 1) ? 'success' : 'warning'}}">●</span>
                            <small>{{(rows.id_sg_estado == 1) ? 'Activa' : 'Inactiva'}}</small><br>                                              
                        </div>
                        <div class="col text-right d-flex">
                            <button type="button" class="btn btn-sm btn-danger" ng-if="seeOptions == rows.id_sg_terminal_usuario" ng-click="selectRowDeleteTerminal(rows.id_sg_terminal_usuario)"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-sm btn-default" ng-if="seeOptions == rows.id_sg_terminal_usuario" ng-click="selectRowEditTerminal(rows.id_sg_terminal_usuario)" ng-disabled="loadFormEdit != 'pen'"><i class="fa fa-{{ loadFormEdit }}"></i></button>
                        </div>
                    </div>
                    <div class="row align-items-center" ng-if="selectedRow == rows.id_sg_terminal_usuario">
                        <div class="col">
                            <div class="row alert alert-danger">
                                <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar esta Terminal ?</span></div>
                                <div class="col text-center">
                                    <button class="btn btn-sm btn-danger" ng-click="deleteTerminal(rows.id_sg_terminal_usuario)" ng-disabled="btnDeleteTerminal != 'Si, Borralo'">{{ btnDeleteTerminal }}</button>
                                </div>
                                <div class="col text-center">
                                    <button class="btn btn-sm btn-warning" ng-click="cancelDeleteTerminal()">No, Cancelalo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>