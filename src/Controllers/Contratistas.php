<?php

namespace Controllers;

use Core\Views;
use Models\Usuario\ModelUsuario;

class Contratistas
{
    static function Index()
    {
        return Views::add('app.cms.dashboard.contratistas.index', ModelUsuario::ObtenerPerfilUsuario($_SESSION['sigga:usr']));
    }
}