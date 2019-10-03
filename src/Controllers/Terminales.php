<?php

namespace Controllers;

use Core\{Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Terminales
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.terminales.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}