<?php

namespace Models\Combos;

use Core\Helper;
use Models\Empresa\ModelEmpresa;

class ModelCombos extends Helper
{
    static function ComboPlanes()
    {
        return Helper::fetch(
            "id_sg_plan, id_sg_estado, nombre_plan",
            "sg_mis_planes"            
        );
    }

    static function ComboSedes($user)
    {
        $idEmpresa = ModelEmpresa::ObtenerListadoEmpresas($user);

        return Helper::simpleQuery(
            "id_sg_sede as id, nombre_sede as prop",
            "sg_sedes",
            "id_sg_empresa = '". $idEmpresa[0]['id_sg_empresa'] ."'"
        );
    }

    static function ComboEmpleados($user)
    {
        $idEmpresa = ModelEmpresa::ObtenerListadoEmpresas($user);

        return Helper::simpleQuery(
            "id_sg_personal as id, CONCAT(nombres_personal, ' ', apellidos_personal) as prop",
            "sg_mi_personal",
            "id_sg_empresa = '". $idEmpresa[0]['id_sg_empresa'] ."'"
        );
    }
}