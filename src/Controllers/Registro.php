<?php

namespace Controllers;

use Core\{ Views, ActionFilters, Helper};
use AppLib\Http\{Response, Request, Redirect};
use Models\Combos\ModelCombos;

class Registro
{
    static function CreaCuenta()
    {
        return Views::add('app.cms.login.registro', ['planes' => ModelCombos::ComboPlanes()]);
    }

    static function Created()
    {
        return Views::add('app.cms.login.created');
    }
}