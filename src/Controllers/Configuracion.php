<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Configuracion
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.configuracion.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}