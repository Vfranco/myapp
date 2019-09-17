<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Residencial
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.visitantes.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}