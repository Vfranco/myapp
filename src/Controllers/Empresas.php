<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Empresas
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.empresas.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}