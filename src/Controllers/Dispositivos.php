<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Dispositivos
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.dispositivos.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}