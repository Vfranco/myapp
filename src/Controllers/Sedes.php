<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Sedes
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.sedes.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}