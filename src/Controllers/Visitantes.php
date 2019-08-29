<?php

namespace Controllers;

use Core\Views;

class Visitantes
{
    static function Index()
    {
        Views::add('app.cms.dashboard.visitantes.index');
    }
}