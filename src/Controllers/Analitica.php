<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Usuario\ModelUsuario;

class Analitica
{
    static function Index()
    {
        ActionFilters::Post();
        ActionFilters::SessionActive();

        return Views::add('app.cms.dashboard.analitica.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}