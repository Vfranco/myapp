<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Personal
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.personal.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}