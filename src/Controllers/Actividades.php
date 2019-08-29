<?php

namespace Controllers;

use Core\{ Views, ActionFilters};
use Models\Actividades\ModelActividades;
use AppLib\Http\{Response, Request};

class Actividades
{
    static function ReportByDate()
    {
        ActionFilters::Get();
        ActionFilters::SessionActive();

        Response::status(200)->json(ModelActividades::ReportByDate(Request::phpInput()));
    }
}