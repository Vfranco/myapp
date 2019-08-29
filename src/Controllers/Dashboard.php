<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Dashboard
{
    static function Index($user)
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.index', ModelUsuario::ObtenerPerfilUsuario($user));
    }
}