<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Usuarios
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.usuarios.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}