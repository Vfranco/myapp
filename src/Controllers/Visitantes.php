<?php

namespace Controllers;

use Core\Views;
use Models\Usuario\ModelUsuario;

class Visitantes
{
    static function Index()
    {
        Views::add('app.cms.dashboard.visitantes.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}