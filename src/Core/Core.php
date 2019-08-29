<?php

namespace Core;

use Core\{Views, ActionFilters};

class Core
{
    static function ApplicationStart()
    {
        session_start();

        return new Server(
        [
            'method'    => REQUEST_METHOD,
            'route'     => REQUEST_URI,
            'landing'   => function()
            {
                ActionFilters::rebootSession('sigga:usr');
                Views::add('app.cms.login.login');
            }
        ]);
    }
}

Core::ApplicationStart();