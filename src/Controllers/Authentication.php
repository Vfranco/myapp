<?php

namespace Controllers;

use Core\{ Views, ActionFilters, Helper};
use AppLib\Http\{Response, Request, Redirect};
use Models\Usuario\ModelUsuario;

class Authentication
{
    static function Login()
    {
        ActionFilters::Get();
        Response::status(200)->json(Request::apiResource(Request::phpInput(), API_REST . 'authentication/cmslogin'));
    }

    static function Register()
    {
        return Views::add('app.cms.login.register');
    }

    static function CreateSesion()
    {
        $user = Request::phpInput();
        
        if(!preg_match('/@/', $user['email']))
        {
            $_SESSION['sigga:usr'] = $user['email'];

            $owner = ModelUsuario::ObtenerUsuarioControl($user['email']);
            $_SESSION['sigga:owner'] = $owner['creado_por'];

            $redirect = BASE_URL . 'dashboard/index/' . $owner['creado_por'] . '#!/monitor';
            Response::status(200)->json(['status' => true, 'redirect' => $redirect]);
        }
        else
        {
            $_SESSION['sigga:usr'] = Helper::encodeData($user['email']);            

            $getEntryPoint = ModelUsuario::ObtenerPerfilUsuario(Helper::encodeData($user['email']));
            $redirect = BASE_URL . 'dashboard/index/' . Helper::encodeData($user['email']) . $getEntryPoint['entrypoint'];
    
            Response::status(200)->json(['status' => true, 'redirect' => $redirect]);
        }        
    }

    static function Logout()
    {
        session_destroy();
        Redirect::RedirectTo('');
    }
}