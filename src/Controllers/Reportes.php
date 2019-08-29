<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Reportes
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.reportes.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}