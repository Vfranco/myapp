<?php

namespace Models\Empresa;

use Core\Helper;
use Models\Usuario\ModelUsuario;

class ModelEmpresa extends Helper
{
    static function ObtenerListadoEmpresas($user)
    {
        $empresas = Helper::simpleQuery(
            "id_sg_empresa, id_sg_estado, nombre_empresa",
            "sg_empresas",
            "id_sg_usuario = '". $user ."'"
        );

        return $empresas;
    }
}