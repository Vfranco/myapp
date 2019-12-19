<!-- personal de control -->
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="h3 mb-0">Personal de Control</h5>
            </div>
            <div class="col text-right">
                <button class="btn btn-sm btn-info" ng-click="enableSearchPersonalControl = true" ng-hide="enableSearchPersonalControl"><i class="fa fa-search"></i></button>
                <button class="btn btn-sm btn-danger" ng-click="enableSearchPersonalControl = false" ng-show="enableSearchPersonalControl"><i class="fa fa-search-minus"></i></button>
                <button class="btn btn-sm btn-info" ng-hide="showFormPersonalControl" ng-click="formPersonalControl()"><i class="fa fa-plus"></i></button>
                <button class="btn btn-sm btn-danger" ng-show="showFormPersonalControl" ng-click="hidePersonalControl()"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
    <div class="card-header py-0" ng-show="enableSearchPersonalControl">
        <form action="javascript:" method="post" autocomplete="off">
            <div class="form-group mb-0">
                <div class="input-group input-group-lg input-group-flush">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fas fa-search"></span>
                        </div>
                    </div>
                    <input ng-model="searchPersonalControl" type="search" class="form-control" placeholder="Buscar" ng-disabled="personalControl.length <= 0">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body" ng-show="showFormPersonalControl">
        <alert-message type="{{type}}" message="{{message}}" ng-if="isEmptyControl"></alert-message>
        <form name="control" action="javascript:" autocomplete="off">
            <input ng-model="formControl.uid" type="hidden" name="uid" value="{{uid}}" ng-init="formControl.uid = this.uid">
            <input ng-model="formControl.idControl" type="hidden" name="idControl" value="{{idControl}}" ng-init="formControl.idControl = formControl.idControl">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Cedula</label>
                        <input ng-model="formControl.cedula" type="number" name="cedula" class="form-control required" ng-init="formControl.cedula = ''">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Nombres</label>
                        <input ng-model="formControl.nombres" type="text" name="nombres" class="form-control required" ng-init="formControl.nombres = ''">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Apellidos</label>
                        <input ng-model="formControl.apellidos" type="text" name="apellidos" class="form-control required" ng-init="formControl.apellidos = ''">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Correo</label>
                        <input ng-model="formControl.correo" type="email" name="correo" class="form-control required" ng-init="formControl.correo = ''">
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input ng-model="formControl.status" class="custom-control-input" id="status" type="checkbox" ng-checked="formControl.status" ng-init="formControl.status = false">
                        <label class="custom-control-label" for="status">Activo</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Cargo</label>
                        <select ng-model="formControl.cargo" name="cargo" class="form-control" ng-init="formControl.cargo = ''">
                            <option value="">Cargo</option>
                            <option value="{{ items.id_sg_cargo }}" ng-repeat="items in cargos">{{ items.nombre_cargo }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Usuario</label>
                        <input ng-model="formControl.usuario" type="text" name="usuario" class="form-control required" ng-init="formControl.usuario = ''">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Contraseña</label>
                        <input ng-model="formControl.passone" type="password" name="passone" class="form-control required" ng-init="formControl.passone = ''">
                    </div>
                    <div class="form-group" ng-class="{'has-danger' : formControl.passtwo != formControl.passone}">
                        <label class="form-control-label">Confirmar Contraseña</label>
                        <input ng-model="formControl.passtwo" type="password" name="passtwo" class="form-control required" ng-class="{'is-invalid' : formControl.passtwo != formControl.passone}" ng-init="formControl.passtwo = ''">
                        <div class="invalid-feedback" ng-if="formControl.passtwo != formControl.passone">Contraseñas no coinciden</div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right" ng-click="createPersonalControl()" ng-if="formControl.idControl == 0" ng-disabled="formControl.passtwo != formControl.passone || btnCreatePersonal != 'Registrar'">{{ btnCreatePersonal }}</button>
                        <button type="submit" class="btn btn-primary pull-right" ng-click="updatePersonalControl()" ng-if="formControl.idControl != 0" ng-disabled="formControl.passtwo != formControl.passone || btnUpdatePersonal != 'Actualizar'">{{ btnUpdatePersonal }}</button>
                        <button type="reset" class="btn btn-default pull-left">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive" ng-hide="showFormPersonalControl">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="list">
                <tr ng-if="personalControl.length == 0">
                    <th scope="row" class="text-center" colspan="5">No hay personal de control registrado</th>
                </tr>
                <tr ng-show="selectedRowControl != 0">
                    <td colspan="6">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="row alert alert-danger">
                                    <div class="col-12 text-center mb-2"><span class="text-sm">Estas seguro de eliminar este Personal de Control ?</span></div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-danger" ng-click="deletePersonalControl()" ng-disabled="btnDeleteControl != 'Si, Borralo'">{{ btnDeleteControl }}</button>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-sm btn-warning" ng-click="cancelDeletePersonal()">No, Cancelalo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr ng-if="personalControl.length > 0" ng-repeat="rows in personalControl | filter : searchPersonalControl" ng-hide="selectedRowControl == rows.id_sg_personal_control">
                    <th scope="row">
                        <div class="media align-items-center">
                            <a href="javascript:" class="avatar mr-3">
                                <img alt="Image placeholder" src="<?php echo BASE_URL ?>Content/assets/img/control.png">
                            </a>
                            <div class="media-body">
                                <span class="name mb-0 text-sm">{{ rows.cedula_control }}</span>
                            </div>
                        </div>
                    </th>
                    <td class="budget">
                        {{ rows.nombres_control }}
                    </td>
                    <td>
                        {{ rows.apellidos_control }}
                    </td>
                    <td>
                        {{ rows.cargo }}
                    </td>
                    <td>
                        {{ rows.estado }}
                    </td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="javascript:" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="javascript:" ng-click="selectRowCargo(rows.id_sg_personal_control)"><i class="fa fa-trash"></i> Eliminar</a>
                                <a class="dropdown-item" href="javascript:" ng-click="selectRowCargoEdit(rows.id_sg_personal_control)"><i class="fa fa-pen"></i> Editar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end personal de control -->